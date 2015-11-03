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
  $reports = Reports::getTermReport($_POST['term1']);
?>
  <?php //loop through report array and print the information in some formatted matter
      $courseList = array();
      echo '-----';
      echo $_POST['term1'];
      echo '-----';
      echo '<br>';
      foreach ($reports as $report) { //populate courseList and increment it for each occurence. ?____?
  ?>
          <tr>
            <?php $courseList['$report[classID]'] = $courseList['$report[classID]'] + 1 ?>
          </td>
          </tr>
 <?php
 }
      foreach($courseList as $course) { //print each course element of the courseList
        echo $course;
      }
 ?>


 <!-- jQuery -->
 <script src="js/jquery.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript"></script>
 <script type="text/javascript" src="js/faculty-exams.js"></script>
