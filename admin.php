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
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Navigation -->     <!-- Header -->
    <?php include("includes/header.php");?>
    <!--END NAV-->

   <!-- INTRO PAGE -->
</head>
<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 0) : ?>
<body>
  <nav class="navbar navbar-student " role="navigation">
    <div class="container-fluid">
      <div class="collapse navbar-collapse collapse-buttons">
        <a class="navbar-brand" href="#" rel="home" title="Stony Brook Testing Center" >
          <b>Welcome, Admin!</b>
        </a>
        <form class="navbar-header pull-right" role="search">
          <span class='btn-group'>
          <ul id="anav" class="navbar-right ">

            <li><a href="student-exams.php" class="btn btn-danger">Pending Exams</a></li>
            <li><a href="superfluous.php" class="btn btn-danger">Superfluous Appointments</a></li>
            <li><a href="student-exams.php" class="btn btn-danger">View Appt</a></li>
            <li><a href="adminScheduleAppt.php" class="btn btn-danger">Schedule Appt</a></li>
            <li><a href="admin-editCenter.php" class="btn btn-danger">Edit Center</a></li>
            <li><a href="importdata.php" class="btn btn-danger">Import Data</a></li>
            <li><a href="student-pref.html" class="btn btn-danger">Utilization</a></li>
            <li><a href="reports.php" class="btn btn-danger">Generate Reports</a></li>

        </ul>
      </span>
        </form>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="filler"></div>
    </div>
  </div>

   <div id="adminContent" class="content container">
   <?php include('admin-landing.php'); ?>
   </div>

   <?php else : header('Location: access-error.php'); ?>
   <?php endif; ?>
<!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
<script src='js/loader.js'></script>
  <!-- Footer -->
  <?php include("includes/footer.html");?>
  <!-- END FOOTER-->

  <!-- MODALS -->
  <?php include("includes/modals.php");?>
  <!-- END MODALS -->
</body>

</html>
