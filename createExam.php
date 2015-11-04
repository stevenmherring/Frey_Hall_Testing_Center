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
$examName = $_POST['examName'];
$examDuration = $_POST['examDuration'];
$examStartDate = $_POST['startDate'];
$examEndDate = $_POST['endDate'];
$examStartHr = $_POST['startHr'];
$examStartMin = $_POST['startMin'];
$examEndHr = $_POST['endHr'];
$examEndMin = $_POST['endMin'];
$examClassID = $_POST['className'];



$examStartTime = $examStartHr . ":" . $examStartMin . ":" . "00";
$examEndTime = $examEndHr . ":" . $examEndMin . ":" . "00";


$sql = "INSERT INTO exam(examStartDate, examEndDate, examStartTime, examEndTime, examDuration, examName, classID) VALUES ('$examStartDate', '$examEndDate', '$examStartTime', '$examEndTime', $examDuration, '$examName', '$examClassID')";
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
                  $transactionContent = "examStartDate:" . $examStartDate . "," . "examEndDate:" . $examEndDate . "," . "examStartTime:" . $examStartTime .  "," . "examEndTime:" . $examEndTime .  "," . "ExamDuration:" . $examDuration  . "," . "ExamName:" . $examName  . "," . "ExamClassID:" . $examClassID  . ",";
                  $transactionType = "createExam";
                  $now = time();
                  $userID = $_SESSION['username'];
                  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
                  $stmtCSVquery->execute(array($userID,$transactionType,$now,$transactionContent));
                }

?> <h3>Exam Created</h3>
<?php
$dbh->commit();
        $dbh=null;
?>
