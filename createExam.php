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
$examName = $_POST['examName'];
$examDuration = $_POST['examDuration'];
$examStartDate = $_POST['startDate'];
$examEndDate = $_POST['endDate'];
$examStartHr = $_POST['startHr'];
$examStartMin = $_POST['startMin'];
$examEndHr = $_POST['endHr'];
$examEndMin = $_POST['endMin'];

$examStartTime = $examStartHr . ":" . $examStartMin . ":" . "00";
$examEndTime = $examEndHr . ":" . $examEndMin . ":" . "00";

echo $examStartTime;
echo $examEndTime;

$sql = "INSERT INTO exam(examStartDate, examEndDate, examStartTime, examEndTime, examDuration, examName, classID) VALUES ('$examStartDate', '$examEndDate', '$examStartTime', '$examEndTime', $examDuration, '$examName', '11111-1111')";
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
echo "Exam Created";

$dbh->commit();
        $dbh=null;
?>
