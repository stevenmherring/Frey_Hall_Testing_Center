<?php
include_once('../classes/Database.php');
include_once('../classes/Authentication.php');
Authentication::sec_session_start();

//retreive session parameters
$_SESSION = array();
$params = session_get_cookie_params();

//delete cookie
setcookie(session_name(),
        '', time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]);

//destroy session, return user to homepage
session_destroy();
header('Location: ../index.php');
?>
