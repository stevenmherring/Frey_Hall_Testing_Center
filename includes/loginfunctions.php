<?php
include_once 'psl-config.php';

/**
*Securely start sessions, rather than only use session_start() we use this function to elude javascript hax0rz
**/
function sec_session_start() {
    $session_name = 'sec_session_id';   //set session name
    $secure = SECURE;
    //disable js access to session data
    $httponly = true;
    //cookies only please, maybe some milk
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    //retrieve cookie params
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        $secure,
        $httponly);
    // sets session to the name of session defined above.
    session_name($session_name);
    session_start();            //securely start session
    session_regenerate_id(true);    //prevent session multiplication
}//sec_session_start

function login($netid, $password, $mysqli) {
  //prepared SQL statements to prevent injection attacks
    if ($stmt = $mysqli->prepare("SELECT id, username, email, password, salt, auth
        FROM members
        WHERE netid = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $netid);  //bind netid parameter
        $stmt->execute();    //execute query, store result.
        $stmt->store_result();

        //retrieve result data
        $stmt->bind_result($user_id, $username, $email, $db_password, $salt, $auth);
        $stmt->fetch();

        // shake some salt on password 
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // in the case of locking user accounts we would check if the account is locked from too many login attempts
            // this is likely not an issue with our application, but the check is here as we defined the possibilty in database
            if (checkBruteAttack($user_id, $mysqli) == true) {
                //account is locked, should probably handle this some way...for now, nothing. TODO: MAYBE - sherring
                return false;
            } else {
                //confirm login details
                if ($db_password == $password) {
                    //password is good
                    //TODO: understand XSS attacks - sherring
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                                                                "",
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['auth'] = $auth;
                    $_SESSION['email'] = $email;
                    $_SESSION['login_string'] = hash('sha512',
                              $password . $user_browser);
                    //complete successful login
                    return true;
                } else {
                    //bad password
                    //since i defined it in the database, might as well record it
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // bad user
            return false;
        }
    }
}//login

/*
*checks for unsuccessful login attempts in specified time period, im using 2 hours
*/
function checkBruteAttack($user_id, $mysqli) {
    $now = time();

    //count login attempts from last two hours.
    $valid_attempts = $now - (7200);
    //prepare sql statements
    if ($stmt = $mysqli->prepare("SELECT time
                             FROM login_attempts
                             WHERE user_id = ?
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
        //execute and store
        $stmt->execute();
        $stmt->store_result();
        // If there have been more than 3 failed logins
        if ($stmt->num_rows > 3) {
            return true;
        } else {
            return false;
        }
    }
}//check attack

/*
*check if user is logged in
*/
function login_check($mysqli) {
    //check that variables are set
    if (isset($_SESSION['user_id'],
                        $_SESSION['username'],
                        $_SESSION['email'],
                        $_SESSION['login_string'],
                        $_SESSION['auth'])) {

        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $auth = $_SESSION['auth'];
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password
                                      FROM members
                                      WHERE id = ? LIMIT 1")) {
            //bind userid to parameter
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   //execute the prepared query
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                //if user exists, get their data from return
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);

                if ($login_check == $login_string) {
                    // we in
                    return true;
                } else {
                    // not in
                    return false;
                }
            } else {
                // not in
                return false;
            }
        } else {
            // not in
            return false;
        }
    } else {
        // not in
        return false;
    }
}//login_check

/*
*this is a popular response to cross-site scripting attacks, so im going to employ it as well for more security.
*there are other approaches but to be honest, it seems like every approach leaves itself vulnerbale to everything else
*choosing the solution here is a a security version of russian roulette
*/
function esc_url($url) {
    if ('' == $url) {
        return $url;
    }
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
    $url = str_replace(';//', '://', $url);
    $url = htmlentities($url);
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}//esc_url
?>
