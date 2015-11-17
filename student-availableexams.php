<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
include_once('classes/User.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['student'] == true) : ?>

<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
  <?php
    $userExams = User::getExams($_SESSION['netid'],$_SESSION['auth']);
  ?>
  <link rel="stylesheet" type="text/css" href="css/sortable_table.css">
  <div class="facultyScheduleExamFormContainer">
      <table id="student_exams_container" class="sortable_table">
        <tbody>
          <tr>
            <th sort_expression="ClassID">CourseName</th>
              <th sort_expression="ClassID">CourseNumber</th>
            <th sort_expression="ExamStartDate">ExamStartDate</th>
            <th sort_expression="ExamEndDate">ExamEndDate</th>
            <th sort_expression="ExamDuration">ExamStartTime</th>
            <th sort_expression="ExamDuration">ExamEndTime</th>
            <th sort_expression="ExamDuration">ExamDuration</th>
          </tr>
          <?php
              foreach ($userExams as $exam) {
                if ((User::hasAppointment($_SESSION['netid'],$exam['examID']))):


          ?>
                  <tr>
                    <td><?php echo($exam['subj']);?></td>
                    <td><?php echo($exam['catalogNumber']);?></td>
                    <td><?php echo($exam['examStartDate']);?></td>
                    <td><?php echo($exam['examEndDate']);?></td>
                    <td><?php echo($exam['examStartTime']);?></td>
                    <td><?php echo($exam['examEndTime']);?></td>
                    <td><?php echo($exam['examDuration']);?></td>
                  </tr>
          <?php
                else :?>
                  <tr>
                    <td><?php echo "You have an appointment for the exam '"; echo ($exam['subj']); echo ($exam['catalogNumber']); echo "' already scheduled.";?></td>
                    <td><?php echo "--";?></td>
                    <td><?php echo "--";?></td>
                    <td><?php echo "--";?></td>
                    <td><?php echo "--";?></td>
                    <td><?php echo "--";?></td>
                    <td><?php echo "--";?></td>
                  </tr>
                <?php
              endif;
              }
          ?>
