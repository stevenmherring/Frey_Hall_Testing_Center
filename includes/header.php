<?php
  include_once('classes/Database.php');
  include_once('classes/Authentication.php');
  $db = Database::getDatabase();
  Authentication::sec_session_start();
  if (Authentication::login_check($db->getMysqli()) == true) {
      $logged = 'in';
  } else {
      $logged = 'out';
  }
?>
<!-- Navigation -->
<!--<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">-->
<nav class=".navbar-modified-margin-bottom navbar-default" role="navigation">

    <div class="container-fluid topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="#" rel="home" title="Stony Brook Testing Center">
              <img class="logo img-responsive" src="img/logo.jpg" alt="" style="max-width:250px; margin-top: -13px;">
            </a>
        </div>
        <!-- nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <?php
                        if (Authentication::login_check($db->getMysqli()) == true) {
                          if($_SESSION['auth'] == 0) {
                            echo '
                            <li>
                                <a href="landing.php" data-toggle="tooltip" title="Landing">Admin</a>
                            </li> ';
                          } else if($_SESSION['auth'] == 1) {
                            echo '
                            <li>
                                <a href="landing.php" data-toggle="tooltip" title="Landing">Faculty</a>
                            </li> ';
                          } else if($_SESSION['auth'] == 2) {
                            echo '
                            <li>
                                <a href="landing.php" data-toggle="tooltip" title="Landing">Student</a>
                            </li> ';
                          }
                          echo '
                          <li>
                              <a href="includes/perform_logout.php" data-toggle="tooltip" title="Logout">Logout</a>
                          </li> ';
                        }
                ?>


                <li><a href="#contactUsModal" data-toggle="modal" data-target="#contactUsModal">Contact us</a></li>
                <li><a href="#cancel_pending" data-toggle="modal" class="hidden" data-target="#cancel_pending"></a></li>
            </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
