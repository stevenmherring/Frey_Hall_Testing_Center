<?php
spl_autoload_register('autoloader');
function autoloader() {
    include_once 'classes/Database.php';
}
include_once('classes/Database.php');
include_once('classes/Authentication.php');
ob_start();
Authentication::sec_session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src='js/loader.js'></script>
    <script src='js/bootstrap.js'></script>
    <!-- Navigation -->
    <?php include("includes/header.php");?>
    <!-- Header -->
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
   <!--END NAV-->
</head>

<script>
function view_student_appts(netID) {

jQuery( function(){
  jQuery("#adminContent").load('../admin-getappts.php', {netID : netID});//url to contents.php
});
}
</script>
<body>
    <div id="content" style="height: 720px">
      <?php
        if ( isset($_POST['netid']) ){
          echo'<script type="text/javascript"< view_student_appts();</script>';

        }
        if($logged == 'in') {
          if($_SESSION['auth'] == 0) {
              echo ' <section id="indexContent" style="padding: 75px"> ';
                include("admin-landing.php");
              echo '</section> ';
          } else if($_SESSION['auth'] == 1) {
            echo ' <section id="indexContent" style="padding: 75px"> ';
            include("faculty-landing.php");
            echo '</section> ';
          } else if($_SESSION['auth'] == 2) {
            echo ' <section id="indexContent" style="padding: 75px"> ';
            include("student-landing.php");
            echo '</section> ';
          }
        } else {
            include("includes/intro.php");
        }
      ?>
    </div>
    <!-- Footer -->
    <?php include("includes/footer.html");?>
    <!-- END FOOTER-->
<!-- MODALS -->
<?php include("includes/modals.php");?>
<!-- END MODALS -->
<script src="js/loader.js"></script>
</body>
</html>
