
<?php

spl_autoload_register('autoloader');

function autoloader() {
    include_once 'classes/Database.php';
}
include_once('classes/Database.php');
include_once('classes/Authentication.php');
Authentication::sec_session_start();
ob_start();
$db = Database::getDatabase();
if (Authentication::login_check($db->getMysqli()) === true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
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
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>

</head>

<body>

    <!-- Navigation -->     <!-- Header -->
<?php include("includes/header.php");?>
   <!--END NAV-->

   <!-- INTRO PAGE -->
<?php include("includes/intro.html");?>
  <!-- END INTRO-->
<?php include("includes/intro-content.php");?>

    <!-- Footer -->
<?php include("includes/footer.html");?>
    <!-- END FOOTER-->

    <!-- MODALS -->
<?php include("includes/modals.php");?>
    <!-- END MODALS -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>

</body>

</html>
