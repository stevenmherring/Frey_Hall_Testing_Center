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
foreach($var as $vars){
    $newAdHocID =$vars[0]+1;
}
$examStartTime = $examStartHr . ":" . $examStartMin . ":" . "00";
$examEndTime = $examEndHr . ":" . $examEndMin . ":" . "00";




foreach($examAdHocSplit as $person){     
    $persons = explode(", ", $person);
    $sql2 = "INSERT INTO adHoc(adHocID, netID, firstName, lastName) VALUES ($newAdHocID, '$persons[0]', '$persons[1]', '$persons[2]')";
    $result2 = $dbh->prepare($sql2);
    if (!$result2){
      $prepareFail = "Information NOT updated.";
      echo "<script type='text/javascript'>alert('$prepareFail');</script>";
      $dbh->rollback();
      $dbh = null;
      return;
    }
    //$conn->query($sql);
    $result2->execute();
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
    $result3->execute();

echo "You have inserted " . $count .  " person(s)";
$dbh->commit();
        $dbh=null;
?>
