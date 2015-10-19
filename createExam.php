<?php
  include_once 'includes/db_connect.php';
  include_once 'includes/loginfunctions.php';
  sec_session_start();

  if (login_check($mysqli) == true) {
      $logged = 'in';
  } else {
      $logged = 'out';
  }
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Frey Hall Testing Center at Stony Brook University</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/landing-page.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <script type="text/JavaScript" src="js/sha512.js"></script>
  <script type="text/JavaScript" src="js/forms.js"></script>
</head>
<body>
<?php
        if (login_check($mysqli) == true) {
            if ($_SESSION['auth'] == 0) {
              // auth level 0 ADMIN
              header('Location: access-error.php');
            } else if($_SESSION['auth'] == 1) {
              // auth level 1 INSTRUCTOR
              echo file_get_contents('processExam.php');
            } else if($_SESSION['auth'] == 2) {
               //auth level 2 STUDENT
               header('Location: access-error.php');
             }

        } else {
                        header('Location: access-error.php');
                }
?>

<?php
$servername = "mysql2.cs.stonybrook.edu";
$username = "sachin";
$password = "108610059";
$dbname = "sachin";
// retrieves user input from textbox
if(! empty($_POST['examID'])){
    $examIDs = $_POST['examID'];
	//echo $examIDs;
	}
if(! empty($_POST['catalogueNumber'])){
    $catalogueNumbers = $_POST['catalogueNumber'];
	//echo $courseIDs;
	}
if(! empty($_POST['subj'])){
    $subjs = $_POST['subj'];
	//echo $professorIDs;
	}	
	
if(! empty($_POST['professorNetID'])){
    $professorNetIDs = $_POST['professorNetID'];
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
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlb = "SELECT numseats FROM freyhalltestingcenterroom";
$resultx = $conn->query($sqlb);
$numseats = mysqli_fetch_assoc($resultx);   // gets the available number of seats from freyhalltestingcenterroom table
echo "Available Seats: " . $numseats["numseats"];

if($numseats>0){
$sqb = "INSERT INTO exam (examID, catalogueNumber,subj,professorNetID,examStartDate,examEndDate,examStartTime,examEndTime,examDuration)
VALUES ('$examIDs', '$catalogueNumbers','$subjs','$professorNetIDs','$startDates','$endDates','$startTimes','$endTimes','$examDurations')";

$final=$conn->query($sqb);   // if there is available seats
}
if($numseats<0){
	echo "<div style ='font:30px Arial,tahoma,sans-serif;color:#ff0000;text-align:center;'> Error! No available seats</div>";
}

if($final){
	echo "<div style ='font:30px Arial,tahoma,sans-serif;color:#00FF00;text-align:center;'> Success! Exam Scheduled</div>";
}
else {
	echo "<div style ='font:30px Arial,tahoma,sans-serif;color:#ff0000;text-align:center;'> Error! ExamID already in use</div>";
}
?>

<br><br><br>

<?php
$sql = "SELECT examID,catalogueNumber,subj,professorNetID,examStartDate,examEndDate,examStartTime,examEndTime,examDuration,processed FROM exam";
$result = mysqli_query($conn, $sql);   

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "ExamID: " . $row["examID"]."&nbsp;&nbsp; Catalogue Number: " . $row["catalogueNumber"]."&nbsp;&nbsp; Subject: " . $row["subj"]. "&nbsp;&nbsp;&nbsp;&nbsp;Professor NetID: " . $row["professorNetID"]. "&nbsp;&nbsp;&nbsp;&nbsp;Start Date: " . $row["examStartDate"]. "&nbsp;&nbsp;&nbsp;&nbsp;Start Time: " . $row["examStartTime"]."&nbsp;&nbsp;&nbsp;&nbsp;End Date: ". $row["examEndDate"]. "&nbsp;&nbsp;&nbsp;&nbsp;End Time: " . $row["examEndTime"]. "&nbsp;&nbsp;&nbsp;&nbsp;Duration: " . $row["examDuration"]."&nbsp;&nbsp;&nbsp;&nbsp;Processed: " . $row["processed"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript"></script>

</body>
