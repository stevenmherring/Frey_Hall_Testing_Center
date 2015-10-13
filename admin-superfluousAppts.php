<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--HTML Design using Bootstrap for most of the heavy lifting. - Steven Herring
For CSE 308: Scott Stoller
Team:
Chris Ryan
Steven Herring
Steven Chin
Shi Lin Lu -->
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
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <script src='js/jquery.js'></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
  <!-- Navigation -->     <!-- Header -->
  <?php include("includes/header.html");?>
  <!--END NAV-->
</head>

<body>

  <nav class="navbar navbar-student" role="navigation">
    <div class="container">
      <a class="navbar-brand" href="#" rel="home" title="Stony Brook Testing Center" >
        <b>Welcome, Admin!</b>
      </a>
      <div class="collapse navbar-collapse collapse-buttons">
        <form class="navbar-form navbar-right" role="search">
          <ul id="anav" class="navbar-right">
            <li><a href="student-exams.php" class="btn btn-danger">Pending Exams</a></li>
            <li><a href="student-sched.html" class="btn btn-danger">Cancel Exam</a></li>
            <li>
              <a href="#" class="dropdown-toggle btn btn-danger" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Appointments<span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu right">
                <li><a href="#">View Appointments</a></li>
                <li><a href="#">Schedule Student</a></li>
                <li><a href="admin-superfluousAppts.php">Find Superfluous Appointments</a></li>
                <li><a href="#">Check-in</a></li>
                <li><a href="#">Check-in Student</a></li>
              </ul>
            </li>
            <li><a href="student-pref.html" class="btn btn-danger">Check-in Student</a></li>
            <li><a href="student-pref.html" class="btn btn-danger">Edit Center</a></li>
            <li><a href="importdata.php" class="btn btn-danger">Import Data</a></li>
            <li><a href="student-pref.html" class="btn btn-danger">Utilization</a></li>
            <li><a href="student-pref.html" class="btn btn-danger">Generate Reports</a></li>
        </ul>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="filler"></div>
    </div>
  </div>

 <div id="acontent" class="container" style="padding: 75px">
      <?php
$servername = "mysql2.cs.stonybrook.edu";
$username = "sachin";
$password = "108610059";
$dbname = "sachin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "SELECT *  FROM appointment a, exam e, roster r WHERE a.examID=e.examID AND e.classID=r.classID AND a.netID!=r.netID";
$sql = "UPDATE appointment, exam, roster SET status='super' WHERE appointment.examID = exam.examID AND exam.classID=roster.classID AND appointment.netID!=roster.netID";
$conn->query($sql);

// if super and want to change back due to updated DB
$sql2 = "UPDATE appointment, exam, roster SET status='open' WHERE appointment.examID = exam.examID AND exam.classID=roster.classID AND appointment.netID=roster.netID AND appointment.status='super'";
$conn->query($sql2);

echo "Superfluous appointments have been discovered and the database has been updated"; ?> <br>

     <button onclick="goBack()">Go Back</button>
     
     
     
 </div>
<!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
<script src='js/loader.js'></script>

</body>
<footer>
  <!-- Footer -->
  <?php include("includes/footer.html");?>
  <!-- END FOOTER-->

  <!-- MODALS -->
  <?php include("includes/modals.html");?>
  <!-- END MODALS -->
</footer>
</html>



<?php
$conn->close();
?>
