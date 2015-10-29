<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 0) : ?>
<!-- action="adminEditCenter-form-validation.php"  -->

<div class="facultyScheduleExamFormContainer">
<link href="css/faculty-landing.css" rel="stylesheet">
    <h1><center> Edit the Testing Center </h1>
    <form name="adminEditCenterForm" method = "post" action="adminEditCenter-form-validation.php" onsubmit="return validateForm()">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="gaptime">Gap Time (hh:mm) :</label>
                <input name="gaptime" type="text" id="gaptime" placeholder="0015">
            </div>
        <div class="form-group">
            <label for="inputNumberSeats">Number of seats:</label>
                <input name="numberOfSeats" type="text" id="inputNumberSeats" placeholder="64">
            </div>
        <div class="form-group">
            <label for="inputSetasideSeats">Number of setaside Seats:</label>
                <input name="inputSetasideSeats" type="text" id="inputSetasideSeats" placeholder="3">
            </div>
        <div class="form-group">
            <label for="hours_openfrom">Testing Center Opens at (hh:mm) :</label>
                <input name="hours_openfrom" type="text" id="hours_openfrom" placeholder="0800">
            </div>
        <div class="form-group">
            <label for="hours_openuntil">Testing Center Closes at (hh:mm):</label>
                <input name="hours_openuntil" type="text" id="hours_openuntil" placeholder="0500">
            </div>
            <div class="form-group">
                <label for="inputDateRangeClosedFrom">Date Testing Center Closed From:</label>
                <input name="datePick_RangeClosedFrom" type="text" class="datepicker" id="datePick_RangeClosedFrom">
            </div>
            <div class="form-group">
                <label for="inputDateRangeClosedFrom">Date Testing Center Closed Until:</label>
                <input name="datePick_RangeClosedTo" type="text"  class="datepicker" id="datePick_RangeClosedTo"></p>
            </div>
            <div class="form-group">
                <label for="timePeriods">Testing Center Reserved Time Period Froms:</label>
                  <input name="datePick_ReservedTimePeriodFrom" type="text"  class="datepicker" id="datePick_ReservedTimePeriodFrom">
                </div>
            <div class="form-group">
                <label for="timePeriods">Testing Center Reserved Time Period To:</label>
                  <input name="datePick_ReservedTimePeriodTo" type="text"  class="datepicker" id="datePick_ReservedTimePeriodTo">
                </div>
        <div class="form-group">
            <fieldset class="ui-field-contain">
              <label for="day">Reminder Interval: </label>
              <select name="reminderChoice" id="reminderChoice">
                <option value="dayOf">Day of Exam</option>
                <option value="dayBefore">Day before Exam</option>
                <option value="weekOf">Week of Exam</option>
              </select>
            </fieldset>
            </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Submit" >
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
  $("#datepicker").datepicker();
})


$(document).ready(function (){
  $('.datepicker').datepicker();
})
</script>
  <script src="js/bootstrap.min.js"></script>
  <script src='js/formValidation.js'></script>

<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
