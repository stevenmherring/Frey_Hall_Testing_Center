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
  $reports = Reports::getDayReport($_POST['term1']);
?>
  <?php //loop through report array and print the information in some formatted matter
      foreach ($reports as $report) {
        //For each day, report the number of student appointments on that day.
  ?>
          <tr>
          <td><?php echo($report['date']);?></td>
          <td><?php echo($report['appointmentCount']);?></td>
          </td>
          </tr>
          <br>
 <?php
 }
 ?>


 <!-- jQuery -->
 <script src="js/jquery.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript"></script>
 <script type="text/javascript" src="js/faculty-exams.js"></script>
