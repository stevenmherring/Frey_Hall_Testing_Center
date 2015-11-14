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
$examAdHoc = $_POST['adhoc'];
$count = 0;

$examAdHocSplit = explode("\n", $examAdHoc);


$sql = "SELECT max(adHocID) FROM adHoc";
        $result = $dbh->prepare($sql);
        if (!$result){
          $prepareFail = "Information NOT updated.";
          echo "<script type='text/javascript'>alert('$prepareFail');</script>";
          $dbh->rollback();
          $dbh = null;
          return;
        }
        //$conn->query($sql);
     $result->execute($var);
$var = $result->fetchAll();
$newAdHocID = 0;
    $sql2 = "INSERT INTO adHoc(adHocID, netID, firstName, lastName) VALUES ($newAdHocID, '$persons[0]', '$persons[1]', '$persons[2]')";
foreach($var as $vars){
    $newAdHocID =$vars[0]+1;
}
$examStartTime = $examStartHr . ":" . $examStartMin . ":" . "00";
$examEndTime = $examEndHr . ":" . $examEndMin . ":" . "00";


var_dump($examAdHocSplit);

foreach($examAdHocSplit as $person){
    var_dump($person);
    echo "<br>";
    $persons = explode(", ", $person);
    $result2 = $dbh->prepare($sql2);
    if (!$result2){
      $prepareFail = "Information NOT updated.";
      echo "<script type='text/javascript'>alert('$prepareFail');</script>";
      $dbh->rollback();
      $dbh = null;
      return;
    }
    //$conn->query($sql);
    if ($result2->execute() === TRUE){
                  $stmtCSVlog = $transactionLogging;
                  $stmtCSVquery = $dbh->prepare($stmtCSVlog);
                  $transactionContent = "adHocID:" . $newAdHocID . "," . "netID:" . $persons[0] . "," . "firstName:" . $persons[1] .  "," . "lastName:" . $persons[2] .  ",";
                  $transactionType = "createAdHocMembers";
                  $now = time();
                  $userID = $_SESSION['netid'];
                  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
                  $stmtCSVquery->execute(array($userID,$transactionType,$now,$transactionContent));
                }
    $dbh->commit();
    $count=$count+1;

}
$sql3 = "INSERT INTO exam(examStartDate, examEndDate, examStartTime, examEndTime, examDuration, examName, classID) VALUES ('$examStartDate', '$examEndDate', '$examStartTime', '$examEndTime', $examDuration, '$examName', '$newAdHocID')";
    $result3 = $dbh->prepare($sql3);
    if (!$result3){
      $prepareFail = "Information NOT updated.";
      echo "<script type='text/javascript'>alert('$prepareFail');</script>";
      $dbh->rollback();
      $dbh = null;
      return;
    }
    //$conn->query($sql);
    if ($result3->execute() === TRUE){
                  $stmtCSVlog = $transactionLogging;
                  $stmtCSVquery = $dbh->prepare($stmtCSVlog);
                  $transactionContent = "adHocID:" . $newAdHocID . "," . "netID:" . $persons[0] . "," . "firstName:" . $persons[1] .  "," . "lastName:" . $persons[2] .  ",";
                  $transactionType = "createAdHocExam";
                  $now = time();
                  $userID = $_SESSION['netid'];
                  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
                  $stmtCSVquery->execute(array($userID,$transactionType,$now,$transactionContent));
                }

echo "You have inserted " . $count .  " person(s)";
$dbh->commit();
        $dbh=null;
?>
