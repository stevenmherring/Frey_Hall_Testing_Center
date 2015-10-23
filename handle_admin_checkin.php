<?php 
include("dbQueries.php");
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

try {
       $dbh=new PDO("mysql:host=mysql2.cs.stonybrook.edu;dbname=sachin","sachin","108610059");
} catch(PDOException $e) {
  $message = "Couldnt connect to db.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
$userRow=0;
$rosterRow=0;
$classRow=0;
$dbh->beginTransaction();
$userForm = $_POST['user_form'];
$rosterForm = $_POST['roster_form'];
$classForm = $_POST['class_form'];