<?php
include_once('classes/User.php');
  ?><h3 font-size: 10px; class="text-center"> Appointment Details for the Exam : <?php echo $_REQUEST["examID"] ?></h1>
  <?php
  $examforappt= $_REQUEST["examID"];
   $result = User::getAppointmentsForExam($examforappt);
   $count = count($result);
   if ($count > 0){
          foreach ($result as $appt){
          ?>
          <div class='modal_form_row'>
            <label class='align_left'>Appointment made by student - <?php echo $appt['netID'] ?></label>
            <label class='align_left'>and Student Checked in : <?php
            if($appt['checkedin'] == 0){
              echo 'No';
            } else {
              echo 'Yes';
            }

            ?></label>
          </div>
          <?php
        }
        ?><button class="btn" data-dismiss="modal" data-target="#view_attendance"  aria-hidden="true">Cancel</button><?php
  } else {
   echo "<script type='text/javascript'>alert('Something is wrong with this exam, contact an administrator');</script>";
   ?><button class="btn" data-dismiss="modal" data-target="#view_attendance"  aria-hidden="true">Cancel</button><?php
  } ?>
