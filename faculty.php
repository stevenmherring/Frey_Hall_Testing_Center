<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
Authentication::sec_session_start();
$db = Database::getDatabase();
ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--HTML Design using Bootstrap for most of the heavy lifting. - Steven Herring
For CSE 308: Scott Stoller
Team:
Chris Ryan
Steven Herring
Steven Chin-->
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
    <script src="js/jquery.js"></script>

    <!-- Navigation -->     <!-- Header -->
    <?php include("includes/header.php");?>
    <!--END NAV-->

   <!-- INTRO PAGE -->
</head>

<body>
  <?php if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 1) : ?>
  <div class="container">
    <div class="row">
      <div class="filler"></div>
    </div>
  </div>

 <div id="fcontent" class="fcontent container">
 <?php include('faculty-classes.php');?>
 </div>

<?php else : ?>
<?php endif; ?>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/loader.js"></script>
    <!-- Footer -->
<?php include("includes/footer.html");?>
    <!-- END FOOTER-->

    <!-- MODALS -->
<?php include("includes/modals.php");?>
    <!-- END MODALS -->
</body>

</html>
