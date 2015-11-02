<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 0) : ?>

  <div class="reportDiv">
  <link href="css/faculty-landing.css" rel="stylesheet">
      <h1><center> Generate Reports </h1>
      <form name="generateReportForm" method = "post" action="reportFormValidation.php" onsubmit="return validateForm()">
      <form class="form-horizontal">
          <div class="form-group">
              <label for="report">Generate report for a specific term</label>
              <input name="term1" type="text" id="term1" placeholder="Spring-2015">
              <input name="term2" type="text" id="term2" placeholder="Fall-2016 (Appointment)">
          </div>
          <div>
              <input type="Daily-Report" class="btn btn-primary" value="Daily Report" >
          </div>
          <div>
              <input type="Weekly-Report" class="btn btn-primary" value="Weekly Report">
          </div>
          <div>
              <input type="Course-Report" class="btn btn-primary" value="Course Report" >
          </div>
          <div>
              <input type="Appointment-Report" class="btn btn-primary" value="Appointment Report" >
          </div>
          <div>
              <input type="reset" class="btn btn-default" value="Reset">
          </div>

      </form>
  </div>

  <!-- Bootstrap Core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script>

  $(document).ready(function (){
    $('.datepicker').datepicker();
  });
  </script>
    <script src="js/bootstrap.min.js"></script>
    <script src='js/formValidation.js'></script>

  <?php else : header('Location: access-error.php'); ?>
  <?php endif; ?>
