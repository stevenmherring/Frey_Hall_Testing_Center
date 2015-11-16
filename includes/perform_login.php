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
        echo "<script type='text/javascript'>alert('Invalid credentials');</script>";
        header('Location: ../index.php');
    }
} else {
    //invalid returns
    echo "<script type='text/javascript'>alert('Invalid credentials');</script>";
    header('Location: ../index.php');
}
?>
