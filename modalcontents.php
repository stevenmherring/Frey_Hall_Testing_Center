
          <!-- Bootstrap Core JavaScript -->
          <script src="js/bootstrap.min.js"></script><?php
include_once('classes/User.php');
  /*
  $dom = new DOMDocument();
  $dom->loadHTMLfile('http://localhost:8085/faculty.php');
  */
  ?><h1 class="text-center"> Appointment Details for the Exam : <?php echo $_REQUEST["examID"] ?></h1>
  <?php
  $examforappt= $_REQUEST["examID"];
  //echo "<script type='text/javascript'>alert('$examforappt');</script>";
   $result = User::getAppointmentsForExam($examforappt);
    foreach ($result as $appt){
    ?>
    <div class='modal_form_row'>
      <label class='align_left'>Appointment made by student : <?php echo $appt['netID'] ?></label>
    </div>
    <?php
  }?>
