
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
          <form class="form col-md-12 center-block">
          <div class='modal_form_row'>
            <div class="form-group">
            <label class=''>Appointment made by student - <?php echo $appt['netID'] ?></label><br></br>
            </div>
            <div class="form-group">
            <label class='align_left'>Seat - <?php echo $appt['seatNum'] ?></label><br></br>
            </div>
            <div class="form-group">
            <label class='align_left'>Status - <?php echo $appt['status'] ?></label><br></br>
            </div>
            <div class="form-group">
            <label class='align_left'>Appointment made by student - <?php echo $appt['timeOfExam'] ?></label><br></br>
            </div>
            <div class="form-group">
            <label class='align_left'>Student Checked in : <?php
            if($appt['checkedin'] == 0){
              echo 'No';
            } else {
              echo 'Yes';
            }

            ?></label>
            </div>
          </div>
          </div>
          <?php
        }
        ?><button class="btn" data-dismiss="modal" data-target="#view_attendance"  aria-hidden="true">Cancel</button><?php
  } else {
   echo "<script type='text/javascript'>alert('Something is wrong with this exam, contact an administrator');</script>";
   ?><button class="btn" data-dismiss="modal" data-target="#view_attendance"  aria-hidden="true">Cancel</button></div><?php
  } ?>
