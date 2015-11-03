<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
include_once('classes/Reports.php');
include_once('classes/User.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
  if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 0) : ?>

<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>

<?php
  //echo $_POST['term1'];
  $reports = Reports::getWeekReport($_POST['term1']);
?>

 <?php
    for ($i = 0; $i < count($reports); $i++) {
      $total = 0;
      echo 'Week of ';
      echo $reports[$i]['$date'];
      echo ' through ';
      echo $reports[$i + 6]['$date'];
      echo '<br>';
      echo 'Classes with scheduled exams';
      echo $reports[$i]['$date'];
      echo $reports[$i]['$classList'];
      $total = $total + $reports[$i][$appointmentCount];
      echo 'Appointment Count: ';
      echo $total;
      $i++;
      echo '<br>';
      echo $reports[$i]['$date'];
      echo $reports[$i][$classList];
      $total = $total + $reports[$i][$appointmentCount];
      echo 'Appointment Count: ';
      echo $total;
      $i++;
      echo '<br>';
      echo $reports[$i]['$date'];
      echo $reports[$i][$classList];
      $total = $total + $reports[$i][$appointmentCount];
      echo 'Appointment Count: ';
      echo $total;
      $i++;
      echo '<br>';
      echo $reports[$i]['$date'];
      echo $reports[$i][$classList];
      $total = $total + $reports[$i][$appointmentCount];
      echo 'Appointment Count: ';
      echo $total;
      $i++;
      echo '<br>';
      echo $reports[$i]['$date'];
      echo $reports[$i][$classList];
      $total = $total + $reports[$i][$appointmentCount];
      echo 'Appointment Count: ';
      echo $total;
      $i++;
      echo '<br>';
      echo $reports[$i]['$date'];
      echo $reports[$i][$classList];
      $total = $total + $reports[$i][$appointmentCount];
      echo 'Appointment Count: ';
      echo $total;
      $i++;
      echo '<br>';
      echo $reports[$i]['$date'];
      echo $reports[$i][classList];
      $total = $total + $reports[$i][$appointmentCount];
      echo 'Appointment Count: ';
      echo $total;
      $i++;
      echo '<br>';
      echo 'Total Appointments: ';
      echo $total;
    }
?>


 <!-- jQuery -->
 <script src="js/jquery.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript"></script>
 <script type="text/javascript" src="js/faculty-exams.js"></script>
