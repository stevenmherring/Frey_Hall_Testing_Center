<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html>
<body>
  <h3>Form submitted</h3>

<?php
  include("dbQueries.php");
  include("editcenterfunctions.php");
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  try {
         $dbh=new PDO("mysql:host=localhost;dbname=FreyHallTestingCenter","root","physics123");
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

  /* to do these fields are not defined in the XML
  $datePick_RangeClosedFrom = $_POST['datePick_RangeClosedFrom'];
  $datePick_RangeClosedTo = $_POST['datePick_RangeClosedTo'];
  $datePick_ReservedTimePeriodFrom = $_POST['datePick_ReservedTimePeriodFrom'];
  $datePick_ReservedTimePeriodTo = $_POST['datePick_ReservedTimePeriodTo'];
  */

  $dbh->beginTransaction();

  $roomname = "freyhalltesting";
  initializeRoom($roomname);
  $query = $q_edit_seats;
  $result = $dbh->prepare($query);



  echo "<script type='text/javascript'>alert('$numseats');</script>";
  $result->execute(array($numseats));
/*
$query = $q_view_room;
$result = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$result->execute(array($roomInfo));

*/
  $dbh->commit();
  $dbh = null;

  function initializeRoom($roomname) {

    $createRowQuery = $q_createrow_testingcenterroom;
    $createRowsuccess = $dbh->prepare($query);
    $createRowsuccess->execute(array($roomname));
    if (!$createRowsuccess){
      $error = "Something went wrong. Rolling back.";
      echo "<script type='text/javascript'>alert('$message');</script>";
      $dbh->rollback();
      $dbh = null;
      return;
    }
}

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
