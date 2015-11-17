<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
include_once('classes/User.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['admin'] == true) : ?>

<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
  <?php
    $userExams = User::getExams($_SESSION['username'],$_SESSION['auth']);
  ?>
  <link rel="stylesheet" type="text/css" href="css/sortable_table.css">
  <div class="facultyScheduleExamFormContainer">
      <table id="stops_table" class="sortable_table">
        <tbody>
          <tr>
            <th sort_expression="From">From</th>
            <th sort_expression="To">To</th>
            <th sort_expression="Available">Available</th>
          </tr>
          <?php
              foreach ($userExams as $exam) {
          ?>
                  <tr>
                    <td><?php echo($exam['classID']);?></td>
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
