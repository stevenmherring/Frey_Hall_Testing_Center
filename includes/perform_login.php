<?php
include_once 'db_connect.php';
include_once 'loginfunctions.php';

sec_session_start(); //call custom session start

if (isset($_POST['netid'], $_POST['p'])) {
    $password = $_POST['p']; //password hashed
    $netid = $_POST['netid'];
    $auth = $_POST['auth'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    if (login($netid, $password, $mysqli) == true) {
        //logged in
        header('Location: ../landing.php');
    } else {
        //not in
        header('Location: ../error.php?error=2');
    }
} else {
    //invalid returns
    header('Location: ../index.php');
    echo 'Invalid Request';
}
?>
