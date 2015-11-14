<?php
include("dbQueries.php");
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
include_once('classes/Authentication.php');
include_once('classes/Database.php');
$db = Database::getDatabase();
Authentication::sec_session_start();

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
$examSeatNum = 1;
$examStatus = 'pending';

$examTime = $examApptHr . ":" . $examApptMin . ":" . "00";

$sql = "INSERT INTO appointment(netID, seatNum, dateOfExam, timeOfExam, status, examID) VALUES ('$examNetID', '$examSeatNum', '$examStartDate', '$examTime', '$examStatus', '$examExamID')";
        $result = $dbh->prepare($sql);
        if (!$result){
          $prepareFail = "Information NOT updated.";
          echo "<script type='text/javascript'>alert('$prepareFail');</script>";
          $dbh->rollback();
          $dbh = null;
          return;
        }
        //$conn->query($sql);
if ($result->execute() === TRUE){
                  $stmtCSVlog = $transactionLogging;
                  $stmtCSVquery = $dbh->prepare($stmtCSVlog);
                  $transactionContent = "netID:" . $examNetID . "," . "seatNum:" . '$examSeatNum' . "," . "examStartDate:" . $examStartDate .  "," . "examTime:" . $examTime .  "," . "Status:" . $examStatus  . "," . "ExamID:" . $examExamID  . ",";
                  $transactionType = "createApptByStudent";
                  $now = time();
                  $userID = $_SESSION['netid'];
                  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
                  $stmtCSVquery->execute(array($userID,$transactionType,$now,$transactionContent));
                }
echo "Appt Created";

$dbh->commit();
        $dbh=null;
?>
