
<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
include_once('classes/User.php');
  ?><h3 font-size: 10px; class="text-center"> Appointment Details for the Exam : <?php echo $_REQUEST["examID"] ?></h1>
  <?php
  $examforappt= $_REQUEST["examID"];
   $result = User::getAppointmentsForExam($examforappt);
   $count = count($result);
   ?>
   <div class="modal-dialog">
  <?php
   if ($count > 0){
          foreach ($result as $appt){
          ?>
          <table id="appointment_table" class="sortable_table">
            <tr>
            <th sort_expression="NetID">ClassID</th>
            <th sort_expression="SeatNumber">ExamStartDate</th>
            <th sort_expression="Status">ExamEndDate</th>
            <th sort_expression="TimeOfExam">ExamDuration</th>
            <th sort_expression="CheckedIn">Processed</th>
            </tr>
            <td>
            <label class=''><?php echo $appt['netID'] ?></label>
            </td>
            <td>
            <label class='align_left'><?php echo $appt['seatNum'] ?></label>
            </td>
            <td>
            <label class='align_left'><?php echo $appt['status'] ?></label>
            </td>
            <td>
            <label class='align_left'><?php echo $appt['timeOfExam'] ?></label>
            </td>
            <td>
            <label class='align_left'><?php
            if($appt['checkedin'] == 0){
              echo 'No';
            } else {
              echo 'Yes';
            }

            ?></label>

            </td>
            </tr>
          </div>
          <?php
        }
        ?><button class="btn" data-dismiss="modal" data-target="#view_attendance"  aria-hidden="true">Cancel</button><?php
  } else {
   echo "<script type='text/javascript'>alert('Something is wrong with this exam, contact an administrator');</script>";
   ?><button class="btn" data-dismiss="modal" data-target="#view_attendance"  aria-hidden="true">Cancel</button></div><?php
  } ?>
