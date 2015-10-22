<?php
include_once('classes/Database.php');
include_once('classes/Authentication.php');
Authentication::sec_session_start();
ob_start();
$db = Database::getDatabase();

  if (Authentication::login_check($db->getMysqli()) == true) {
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
        if (Authentication::login_check($db->getMysqli()) == true) {
            if ($_SESSION['auth'] == 0) {
              // auth level 0 ADMIN
              echo file_get_contents('admin-superfluousAppts.php');
            } else if($_SESSION['auth'] == 1) {
              // auth level 1 INSTRUCTOR
              header('Location: access-error.php');
            } else if($_SESSION['auth'] == 2) {
               //auth level 2 STUDENT
               header('Location: access-error.php');
             }

        } else {
                        header('Location: access-error.php');
                }
?>
