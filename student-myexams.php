<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
include_once('classes/User.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 2) : ?>

<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
  <?php
    $userExams = User::getExams($_SESSION['username']);
  ?>
  <link rel="stylesheet" type="text/css" href="css/sortable_table.css">
  <div class="facultyScheduleExamFormContainer">
      <table id="student_exams_container" class="sortable_table">
        <tbody>
          <tr>
            <th sort_expression="ClassID">ClassID</th>
            <th sort_expression="ExamStartDate">ExamStartDate</th>
            <th sort_expression="ExamEndDate">ExamEndDate</th>
            <th sort_expression="ExamDuration">ExamDuration</th>
          </tr>
          <?php
              foreach ($userExams as $exam) {
          ?>
                  <tr>
                    <td><?php echo($exam['classID']);?></td>
                    <td><?php echo($exam['examStartDate']);?></td>
                    <td><?php echo($exam['examEndDate']);?></td>
                    <td><?php echo($exam['examDuration']);?></td>
                    <td>
                    <?php
                      if (strcmp($exam['processed'],"pending") === 0) :?>
                      <a href="#cancel_pending" data-toggle="modal" data-target="#cancel_pending">Delete appt</a>
                      <?php endif; ?>
                    </td>
                  </tr>
          <?php
              }
          ?>
          <!-- jQuery -->
          <script src="js/jquery.js"></script>

          <!-- Bootstrap Core JavaScript -->
          <script src="js/bootstrap.min.js"></script>
          <script type="text/javascript"></script>
          <script type="text/javascript" src="js/faculty-exams.js"></script>
