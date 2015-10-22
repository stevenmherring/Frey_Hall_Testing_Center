<?php
  include_once 'includes/db_connect.php';
  include_once 'includes/loginfunctions.php';
  sec_session_start();

  if (Authentication::login_check($db->getMysqli() == true) {
      $logged = 'in';
  } else {
      $logged = 'out';
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/landing-page.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <?php include("includes/header.php");?>
</head>
<?php if (Authentication::login_check($db->getMysqli() == true && $auth == 1) : ?>
<body>
<?php
$servername = "mysql2.cs.stonybrook.edu";
$un = "sachin";
$pw = "108610059";
$dbname = "sachin";
// retrieves user input from textbox
if(! empty($_POST['examID'])){
    $examIDs = $_POST['examID'];
	//echo $examIDs;
	}
if(! empty($_POST['courseID'])){
    $courseIDs = $_POST['courseID'];
	//echo $courseIDs;
	}
if(! empty($_POST['professorID'])){
    $professorIDs = $_POST['professorID'];
	//echo $professorIDs;
	}
if(! empty($_POST['examDuration'])){
    $examDurations = $_POST['examDuration'];
	//echo $examDurations;
	}
if(! empty($_POST['startDate'])){
    $startDates = $_POST['startDate'];
	//echo $startDates;
	}
if(! empty($_POST['endDate'])){
    $endDates = $_POST['endDate'];
	//echo $endDates;
	}
if(! empty($_POST['startTime'])){
    $startTimes = $_POST['startTime'];
	//echo $startTimes;
	}
if(! empty($_POST['endTime'])){
    $endTimes = $_POST['endTime'];
	//echo $endTimes;
	}


	// Create connection
$conn = mysqli_connect($servername, $un, $pw, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqb = "INSERT INTO exam (examID, courseID, professorID,examStartDate,examEndDate,examStartTime,examEndTime,examDuration)
VALUES ('$examIDs', '$courseIDs','$professorIDs','$startDates','$endDates','$startTimes','$endTimes','$examDurations')";

$final=$conn->query($sqb);
$conn->query($sqb);       // adds into database

if($final){
	echo "<div style ='font:30px Arial,tahoma,sans-serif;color:#00FF00;text-align:center;'> Success! Exam Scheduled</div>";
}
else {
	echo "<div style ='font:30px Arial,tahoma,sans-serif;color:#ff0000;text-align:center;'> Error! ExamID already in use</div>";
}
?>
<br><br><br>

<?php
$sql = "SELECT examID, courseID, professorID,examStartDate,examEndDate,examStartTime,examEndTime,examDuration,processed FROM exam";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "ExamID: " . $row["examID"]."&nbsp;&nbsp; CourseID: " . $row["courseID"]. "&nbsp;&nbsp;&nbsp;&nbsp;ProfessorID: " . $row["professorID"]. "&nbsp;&nbsp;&nbsp;&nbsp;Start Date: " . $row["examStartDate"]. "&nbsp;&nbsp;&nbsp;&nbsp;Start Time: " . $row["examStartTime"]."&nbsp;&nbsp;&nbsp;&nbsp;End Date: ". $row["examEndDate"]. "&nbsp;&nbsp;&nbsp;&nbsp;End Time: " . $row["examEndTime"]. "&nbsp;&nbsp;&nbsp;&nbsp;Duration: " . $row["examDuration"]."&nbsp;&nbsp;&nbsp;&nbsp;Processed: " . $row["processed"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
<?php include("includes/footer.html");?>
</body>
</html>
