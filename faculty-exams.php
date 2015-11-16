<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
include_once('classes/User.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 1) : ?>

<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
  <?php
    $userExams = User::getExams($_SESSION['netid'],$_SESSION['auth']);
  ?>
  <link rel="stylesheet" type="text/css" href="css/sortable_table.css">
  <div class="facultyScheduleExamFormContainer">
      <table id="stops_table" class="sortable_table">
        <tbody>
          <tr>
            <th sort_expression="ClassID">ClassID</th>
            <th sort_expression="ExamStartDate">ExamStartDate</th>
            <th sort_expression="ExamEndDate">ExamEndDate</th>
            <th sort_expression="ExamDuration">ExamDuration</th>
            <th sort_expression="Processed">Processed</th>
            <th sort_expression="Processed">ExamID</th>
            <th sort_expression="Processed">Functions</th>
          </tr>
          <?php
              foreach ($userExams as $exam) {
          ?>
                  <tr>
                    <td><?php echo($exam['classID']);?></td>
                    <td><?php echo($exam['examStartDate']);?></td>
                    <td><?php echo($exam['examEndDate']);?></td>
                    <td><?php echo($exam['examDuration']);?></td>
                    <td><?php echo($exam['processed']);?></td>
                    <td><?php echo($exam['examID']);?></td>
                    <td>
                    <?php
                      if (strcmp($exam['processed'],"pending") === 0) :?>
                      <a href="#cancel_pending" data-toggle="modal" data-target="#cancel_pending">Delete Exam</a>
                      <?php endif; ?>

                      <a href="#view_attendance" data-toggle="modal" data-target="#view_attendance" onclick="view_exam_appts(<?php echo $exam['examID']?>)" >View Attendance</a>
                    </td>
                  </tr>
          <?php
              }
          ?>
          <script type="text/javascript" src="js/faculty-exams.js"></script>
