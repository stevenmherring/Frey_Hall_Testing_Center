<?php
include_once('../classes/Database.php');
include_once('../classes/Authentication.php');
Authentication::sec_session_start();
ob_start();
$db = Database::getDatabase();

if (isset($_POST['netid'], $_POST['p'])) {
    $password = $_POST['p']; //password hashed
    $netid = $_POST['netid'];

    if (Authentication::attempt_login($netid, $password, $db->getMysqli()) === true) {
        //logged in
        header('Location: ../index.php');
      //  header("Refresh:0");
    } else {
        //not in
        header('Location: ../error.php?error=2');
    }
} else {
    //invalid returns
    header('Location: ../error.php');
}
?>
