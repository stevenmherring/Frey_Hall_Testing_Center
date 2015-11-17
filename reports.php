<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
  if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['admin'] == true) : ?>

  <div class="reportDiv">
  <link href="css/faculty-landing.css" rel="stylesheet">
      <h1><center> Generate Reports </h1>
      <form name="generateReportForm" method = "post" action="report_day.php" onsubmit="" target="_blank">
      <form class="form-horizontal">
          <div class="form-group">
              <label for="report">Generate daily report.</label>
              <input name="term1" type="text" id="term1" placeholder="Spring-2015">
              <input type="submit" class="btn btn-primary" value="Submit">
              <input type="reset" class="btn btn-default" value="Reset">
          </div>
      </form>

      <form name="generateReportForm" method = "post" action="report_week.php" onsubmit="" target="_blank">
      <form class="form-horizontal">
          <div class="form-group">
              <label for="report">Generate weekly report.</label>
              <input name="term1" type="text" id="term1" placeholder="Spring-2015">
              <input type="submit" class="btn btn-primary" value="Submit" >
              <input type="reset" class="btn btn-default" value="Reset">
          </div>
      </form>

      <form name="generateReportForm" method = "post" action="report_term.php" onsubmit="" target="_blank">
      <form class="form-horizontal">
          <div class="form-group">
              <label for="report">Generate term report.</label>
              <input name="term1" type="text" id="term1" placeholder="Spring-2015">
              <input type="submit" class="btn btn-primary" value="Submit" >
              <input type="reset" class="btn btn-default" value="Reset">
          </div>
      </form>

      <form name="generateReportForm" method = "post" action="report_appointment.php" onsubmit="" target="_blank">
      <form class="form-horizontal">
          <div class="form-group">
              <label for="report">Generate appointment report.</label>
              <input name="term1" type="text" id="term1" placeholder="Spring-2015">
              <input name="term2" type="text" id="term2" placeholder="Fall-2016 (Appointment)">
              <input type="submit" class="btn btn-primary" value="Submit" >
              <input type="reset" class="btn btn-default" value="Reset">
          </div>
      </form>
  </div>

  <script>

  $(document).ready(function (){
    $('.datepicker').datepicker();
  });
  </script>

  <?php else : header('Location: access-error.php'); ?>
  <?php endif; ?>
