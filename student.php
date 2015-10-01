
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

  <!-- Navigation -->     <!-- Header -->
  <?php include("includes/header.html");?>
  <!--END NAV-->
</head>

<body>

  <nav class="navbar navbar-student" role="navigation">
    <div class="container">
      <a class="navbar-brand" href="#" rel="home" title="Stony Brook Testing Center" >
        <b>Welcome, Student!</b>
      </a>
      <div class="collapse navbar-collapse collapse-buttons">
        <form class="navbar-form navbar-right" role="search">
        <ul id="snav" class="navbar-right">
          <li><a href="student-exams.php" class="btn btn-danger">Schedule Exam</a></li>
          <li><a href="student-sched.html" class="btn btn-danger">View Scheduled Exams</a></li>
          <li><a href="student-avail.html" class="btn btn-danger">View Available Exams</a></li>
          <li><a href="student-pref.html" class="btn btn-danger">Preferences</a></li>
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

 <div id="content" class="content container">
 <?php include('student-landing.php');?>
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
