<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html>
<body>
  <h3>Form submitted</h3>

<?php
  include("dbQueries.php");
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');

  try {
         $dbh=new PDO("mysql:host=mysql2.cs.stonybrook.edu;dbname=sachin","sachin","108610059");
  } catch(PDOException $e) {

    $message = "Couldnt connect to db.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }

  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  /**************************************************************************
  *********************Getting all of the form information*******************
  /* Grabbing the form value of numberOfSeats from our adminEditCenterForm */
  $numseats = $_POST['numberOfSeats'];
  /*Strip tags- This function tries to return a string with all NULL bytes, HTML and PHP tags stripped from a given str.
  It uses the same tag stripping state machine as the fgetss() function.*/
  $numseats = strip_tags($numseats);

  $numsetasideseats = $_POST['inputSetasideSeats'];
  $numsetasideseats = strip_tags($numsetasideseats);

  $hours_openfrom = $_POST['hours_openfrom'];
  $hours_openfrom = strip_tags($hours_openfrom);

  $hours_openuntil = $_POST['hours_openuntil'];
  $hours_openuntil = strip_tags($hours_openuntil);

  $gaptime = $_POST['gaptime'];
  $gaptime = strip_tags($gaptime);

  $reminderInterval = $_POST['reminderChoice'];
  $reminderInterval = strip_tags($reminderInterval);

  /* to do these fields are not defined in the XML
  $datePick_RangeClosedFrom = $_POST['datePick_RangeClosedFrom'];
  $datePick_RangeClosedTo = $_POST['datePick_RangeClosedTo'];
  $datePick_ReservedTimePeriodFrom = $_POST['datePick_ReservedTimePeriodFrom'];
  $datePick_ReservedTimePeriodTo = $_POST['datePick_ReservedTimePeriodTo'];
  */

  $dbh->beginTransaction();
  $errUpdate = "Error updating a field";
  $stmt1 = $q_edit_seats;
  $result = $dbh->prepare($stmt1);
  if (!$result){

    echo "<script type='text/javascript'>alert('$errUpdate');</script>";
    $dbh->rollback();
    $dbh = null;
  }
  $result->execute(array($numseats));

  $stmt2 = $q_edit_numsetasideseats;
  $result2 = $dbh->prepare($stmt2);
  if (!$result2){

    echo "<script type='text/javascript'>alert('$errUpdate');</script>";
    $dbh->rollback();
    $dbh = null;
  }
  $result2->execute(array($numsetasideseats));


  $stmt3 = $q_edit_hours_openfrom;
  $result3 = $dbh->prepare($stmt3);
  if (!$result3){

    echo "<script type='text/javascript'>alert('$errUpdate');</script>";
    $dbh->rollback();
    $dbh = null;
  }
  $result3->execute(array($hours_openfrom));


  $stmt4 = $q_edit_hours_openuntil;
  $result4 = $dbh->prepare($stmt4);
  if (!$result4){

    echo "<script type='text/javascript'>alert('$errUpdate');</script>";
    $dbh->rollback();
    $dbh = null;
  }
  $result4->execute(array($hours_openuntil));


  $stmt5 = $q_edit_gaptime;
  $result5 = $dbh->prepare($stmt5);
  if (!$result5){

    echo "<script type='text/javascript'>alert('$errUpdate');</script>";
    $dbh->rollback();
    $dbh = null;
  }
  $result5->execute(array($gaptime));

  $stmt6 = $q_edit_reminderInterval;
  $result6 = $dbh->prepare($stmt6);
  if (!$result6){

    echo "<script type='text/javascript'>alert('$errUpdate');</script>";
    $dbh->rollback();
    $dbh = null;
  }
  $result6->execute(array($reminderInterval));

  $stmt7 = $transactionLogging;
  $transactionContent = "numseats:" . $numseats . "," . "numsetasideseats:" . $numsetasideseats . "," . "hours_openfrom:" . $hours_openfrom .  "," . "hours_openuntil:" . $hours_openuntil . "," . "gaptime:" . $gaptime . "," . "reminderInterval:" . $reminderInterval . "," ;
  $transactionType = "update";
  $now = time();
  $userID = "placeholder";
  $result7 = $dbh->prepare($stmt7);
  if (!$result7){

    echo "<script type='text/javascript'>alert('$errUpdate');</script>";
    $dbh->rollback();
    $dbh = null;
  }
  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
  $result7->execute(array($userID,$transactionType,$now,$transactionContent));

  /*
  $roomname = "freyhalltesting";

  $createRowQuery = $q_createrow_testingcenterroom;
  $createRowsuccess = $dbh->prepare($createRowQuery);

  $success = "create row test sucess";
  $createRowsuccess->execute(array($roomname));

  $query = $q_view_room;
  $result = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $result->execute(array($roomInfo));
  */

  $dbh->commit();
  $dbh = null;


?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
 <script src='js/loader.js'></script>
 <script src='js/formValidation.js'></script>
