<!-- Navigation -->
<script src='js/loader.js'></script>
<!--<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">-->
<nav class=".navbar-modified-margin-bottom navbar-default" role="navigation">
    <div class="container topnav">
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
                <li><a href="#view_appointment" data-toggle="modal" class="hidden" data-target="#view_appointment"></a></li>
            </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>

<?php
        if (Authentication::login_check($db->getMysqli()) == true) {
          if($_SESSION['auth'] == 0) {
            echo '
            <nav class="navbar navbar-student " role="navigation">
              <div class="container">
                <div class="collapse navbar-collapse collapse-buttons">
                  <a class="navbar-brand" href="#" rel="home" title="Stony Brook Testing Center" >
                    <b>Welcome,'?> <?php echo htmlentities($_SESSION["username"]); echo '</b>
                  </a>
                  <form class="navbar-header navbar-right" role="search">
                    <ul id="anav" class="navbar-right ">
                      <li><a href="student-exams.php" class="btn btn-danger">Pending Exams</a></li>
                      <li><a href="superfluous.php" class="btn btn-danger">Superfluous Appointments</a></li>
                      <li><a href="adminScheduleAppt.php" class="btn btn-danger">Schedule Appt</a></li>
                      <li><a href="admin-editCenter.php" class="btn btn-danger">Edit Center</a></li>
                      <li><a href="importdata.php" class="btn btn-danger">Import Data</a></li>
                      <li><a href="student-pref.html" class="btn btn-danger">Utilization</a></li>
                      <li><a href="reports.php" class="btn btn-danger">Generate Reports</a></li>

                  </ul>
                  </form>
              </div>
            </nav> '
            ;
          } else if($_SESSION['auth'] == 1) {
            echo '
            <nav class="navbar navbar-student" role="navigation">
            <div class="container">
              <a class="navbar-brand" href="#" rel="home" title="Stony Brook Testing Center" >
                <b>Welcome,'?> <?php echo htmlentities($_SESSION["username"]); echo '</b>
              </a>
              <div class="collapse navbar-collapse collapse-buttons">
                <form class="navbar-header navbar-right" role="search">
                  <ul id="fnav" class="navbar-right">
                  <li><a href="faculty-classes.php" class="btn btn-danger">Classes</a></li>
                  <li><a href="faculty-createExamTest.php" class="btn btn-danger">Create an exam</a></li>
                  <li><a href="createAdHoc.php" class="btn btn-danger">Create an Ad Hoc exam</a></li>
        		      <li><a href="faculty-month.php" class="btn btn-danger">Month view</a></li>
                  <li><a href="student-pref.html" class="btn btn-danger">Contact Students</a></li>
                  <li><a href="faculty-exams.php" class="btn btn-danger">My Exams</a></li>
                </ul>
                </form>
              </div>
            </div>
          </nav> '
            ;
          } else if($_SESSION['auth'] == 2) {
            echo '
            <nav class="navbar navbar-student" role="navigation">
              <div class="container">
                <a class="navbar-brand" href="#" rel="home" title="Stony Brook Testing Center" >
                  <b>Welcome,'?> <?php echo htmlentities($_SESSION["username"]); echo '</b>
                </a>
                <div class="collapse navbar-collapse collapse-buttons">
                  <form class="navbar-header navbar-right" role="search">
                  <ul id="snav" class="navbar-right">
                    <li><a href="student-exams-backup.php" class="btn btn-danger">Schedule Exam</a></li>
                    <li><a href="student-myexams.php" class="btn btn-danger">View Scheduled Exams</a></li>
                    <li><a href="student-availableexams.php" class="btn btn-danger">View Available Exams</a></li>
                    <li><a href="student-pref.html" class="btn btn-danger">Preferences</a></li>
                  </ul>
                  </form>
                </div>
              </div>
            </nav> '
            ;
          }
        }
?>
