<?php
include_once 'db_connect.php';
include_once 'loginfunctions.php';

sec_session_start(); //call custom session start

if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; //password hashed

    if (login($email, $password, $mysqli) == true) {
        //logged in
        header('Location: ../index.php');
    } else {
        //not in
        header('Location: ../index.php?error=1');
    }
} else {
    //invalid returns
    header('Location: ../index.php');
    echo 'Invalid Request';
}
?>
