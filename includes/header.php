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
                <?php
                        if (Authentication::login_check($db->getMysqli()) == true) {
                          if($_SESSION['admin'] == true) {
                            echo '
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="Admin"href="#">Admin Menu<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="anav">
                                <li id="nm"><a href="student-exams.php">Pending Exams</a></li>
                                <li><a href="#view_appointment" data-toggle="modal" data-toggle="tooltip" title="View Appointments" data-target="#view_appointment">View Appointment</a></li>
                                <li id="nm"><a href="admin-editCenter.php">Edit Center</a></li>
                                <li id="nm"><a href="importdata.php">Import Data</a></li>
                                <li id="nm"><a href="importdata.php">Utilization</a></li>
                                <li id="nm"><a href="reports.php">Generate Reports</a></li>
                              </ul>
                            </li> ';
                          } if($_SESSION['faculty'] == true) {
                            echo '
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculty Menu<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="fnav">
                                <li id="nm"><a href="faculty-createExamTest.php">Create Exam</a></li>
                                <li id="nm"><a href="createAdHoc.php">Create Ad Hoc Exam</a></li>
                                <li id="nm"><a href="faculty-exams.php">My Exams</a></li>
                              </ul>
                            </li> ';
                          } if($_SESSION['student'] == true) {
                            echo '
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="Student" href="#">Student Menu<span class="caret"></span></a>
                                <ul class="dropdown-menu" id="snav">
                                <li id="nm"><a href="student-exams-backup.php">Schedule Appointment</a></li>
                                <li id="nm"><a href="student-myexams.php">View Appointments</a></li>
                                <li id="nm"><a href="student-availableexams.php">View Available Exams</a></li>
                                <li id="nm"><a href="student-pref.html">Preferences</a></li>
                              </ul>
                            </li> ';
                          }
                          echo '
                          <li>
                              <a href="includes/perform_logout.php" data-toggle="tooltip" title="Logout">Logout</a>
                          </li> ';
                        }
                ?>

                <li><a href="index.php" data-toggle="tooltip" title="Home">Home</a></li>
                <li><a href="#contactUsModal" data-toggle="modal" data-toggle="tooltip" title="Contact Us" data-target="#contactUsModal">Contact us</a></li>
                <li><a href="#cancel_pending" data-toggle="modal" class="hidden" data-target="#cancel_pending"></a></li>
            </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
