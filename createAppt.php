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
$examStartDate = $_POST['examStartDate'];
$examValues = $_POST['startTime'];
$examID = $_POST['examID'];
$examNetID = $_POST['examNetID'];

$valuesSplit = explode("-",$examValues);

$examTime = $valuesSplit[0];
$seat = $valuesSplit[1];



echo $examTime . "<br>" . $seat;
$timeStatement;
switch (intval($examTime)){
    case 0:
        $timeStatement="00:00:00";
        break;
    case 1:
        $timeStatement="00:30:00";
        break;
    case 2:
        $timeStatement="01:00:00";
        break;
    case 3:
        $timeStatement="01:30:00";
        break;
    case 4:
        $timeStatement="02:00:00";
        break;
    case 5:
        $timeStatement="02:30:00";
        break;
    case 6:
        $timeStatement="03:00:00";
        break;
    case 7:
        $timeStatement="03:30:00";
        break;
    case 8:
        $timeStatement="04:00:00";
        break;
    case 9:
        $timeStatement="04:30:00";
        break;
    case 10:
        $timeStatement="05:00:00";
        break;
    case 11:
        $timeStatement="05:30:00";
        break;
    case 12:
        $timeStatement="06:00:00";
        break;
    case 13:
        $timeStatement="06:30:00";
        break;
    case 14:
        $timeStatement="07:00:00";
        break;
    case 15:
        $timeStatement="07:30:00";
        break;
    case 16:
        $timeStatement="08:00:00";
        break;
    case 17:
        $timeStatement="08:30:00";
        break;
    case 18:
        $timeStatement="09:00:00";
        break;
    case 19:
        $timeStatement="09:30:00";
        break;
    case 20:
        $timeStatement="10:00:00";
        break;
    case 21:
        $timeStatement="10:30:00";
        break;
    case 22:
        $timeStatement="11:00:00";
        break;
    case 23:
        $timeStatement="11:30:00";
        break;
    case 24:
        $timeStatement="12:00:00";
        break;
    case 25:
        $timeStatement="12:30:00";
        break;
    case 26:
        $timeStatement="13:00:00";
        break;
    case 27:
        $timeStatement="13:30:00";
        break;
    case 28:
        $timeStatement="14:00:00";
        break;
    case 29:
        $timeStatement="14:30:00";
        break;
    case 30:
        $timeStatement="15:00:00";
        break;
    case 31:
        $timeStatement="15:30:00";
        break;
    case 32:
        $timeStatement="16:00:00";
        break;
    case 33:
        $timeStatement="16:30:00";
        break;
    case 34:
        $timeStatement="17:00:00";
        break;
    case 35:
        $timeStatement="17:30:00";
        break;
    case 36:
        $timeStatement="18:00:00";
        break;
    case 37:
        $timeStatement="18:30:00";
        break;
    case 38:
        $timeStatement="19:00:00";
        break;
    case 39:
        $timeStatement="19:30:00";
        break;
    case 40:
        $timeStatement="20:00:00";
        break;
    case 41:
        $timeStatement="20:30:00";
        break;
    case 42:
        $timeStatement="21:00:00";
        break;
    case 43:
        $timeStatement="21:30:00";
        break;
    case 44:
        $timeStatement="22:00:00";
        break;
    case 45:
        $timeStatement="22:30:00";
        break;
    case 46:
        $timeStatement="23:00:00";
        break;
    case 47:
        $timeStatement="23:30:00";
        break;
    default:
        $timeStatement="error";
}


$sql = "INSERT INTO appointment(netID, seatNum, dateOfExam, timeOfExam, status, examID) VALUES ('$examNetID', '$seat', '$examStartDate', '$timeStatement', 'approved', '$examID')";
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

$timeslot = "timeslot" . $examTime;
echo $timeslot;


$sql = "UPDATE date SET $timeslot = 2 WHERE seat='$seat' AND Date = '$examStartDate' AND centerIsOpen = 1 ;";
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
