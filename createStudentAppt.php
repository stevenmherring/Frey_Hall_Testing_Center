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
$dbh->beginTransaction();
$examStartDate = $_POST['startDate'];
$examApptHr = $_POST['apptHr'];
$examApptMin = $_POST['apptMin'];
$examExamID = $_POST['examID'];
$examNetID = $_POST['netID'];

echo $examNetID . "asdasd";

$examTime = $examApptHr . ":" . $examApptMin . ":" . "00";

$sql = "INSERT INTO appointment(netID, seatNum, dateOfExam, timeOfExam, status, examID) VALUES ('$examNetID', '1', '$examStartDate', '$examTime', 'approved', '$examExamID')";
        $result = $dbh->prepare($sql);
        if (!$result){
          $prepareFail = "Information NOT updated.";
          echo "<script type='text/javascript'>alert('$prepareFail');</script>";
          $dbh->rollback();
          $dbh = null;
          return;
        }
        //$conn->query($sql);
$result->execute();
echo "Appt Created";

$dbh->commit();
        $dbh=null;
?>
