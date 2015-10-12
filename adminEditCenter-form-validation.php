<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html>
<body>
  <h3>Form submitted</h3>

<?php
include("dbQueries.php");
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
/*
        var inputSetasideSeats = document.forms["adminEditCenterForm"]["inputSetasideSeats"].value;
            var datePick_RangeClosedFrom = document.forms["adminEditCenterForm"]["datePick_RangeClosedFrom"].value;
                var datePick_RangeClosedTo = document.forms["adminEditCenterForm"]["datePick_RangeClosedTo"].value;
                    var datePick_ReservedTimePeriodFrom = document.forms["adminEditCenterForm"]["datePick_ReservedTimePeriodFrom"].value;
                        var datePick_ReservedTimePeriodTo = document.forms["adminEditCenterForm"]["datePick_ReservedTimePeriodTo"].value;
                            var reminderChoice = document.forms["adminEditCenterForm"]["reminderChoice"].value;
*/
$numseats = $_POST['numberOfSeats'];
echo "<script type='text/javascript'>alert('$numseats');</script>";
$numseats = strip_tags($numseats);
echo "<script type='text/javascript'>alert('$numseats');</script>";
$numseats = mysql_real_escape_string($numseats);
echo "<script type='text/javascript'>alert('$numseats');</script>";
//$numseats = mysql_real_escape_string(strip_tags(($_POST['numberOfSeats'])));
$numsetasideseats = mysql_real_escape_string(strip_tags(($_POST['inputSetasideSeats'])));
$hours_openfrom = mysql_real_escape_string(strip_tags(($_POST['hours_openfrom'])));
$hours_openuntil = mysql_real_escape_string(strip_tags(($_POST['hours_openuntil'])));
$gaptime = $_POST['gaptime'];
/* to do
$datePick_RangeClosedFrom = $_POST['datePick_RangeClosedFrom'];
$datePick_RangeClosedTo = $_POST['datePick_RangeClosedTo'];
$datePick_ReservedTimePeriodFrom = $_POST['datePick_ReservedTimePeriodFrom'];
$datePick_ReservedTimePeriodTo = $_POST['datePick_ReservedTimePeriodTo'];
*/
$servername = "localhost";
$username = "root";
$password = "physics123";
$dbname = "FreyHallTestingCenter";
/*
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  $message = "Couldnt connect to db.";
  echo '<script type="text/javascript">alert("'.$message.'");</script>';
  die("Connection failed: " . mysqli_connect_error());
} else {
  $success = "Successfully connected to db.";
  echo '<script type="text/javascript">alert("'.$success.'");</script>';
}
*/

try {
       $dbh=new PDO("mysql:host=localhost;dbname=FreyHallTestingCenter","root","physics123");
} catch(PDOException $e) {

  $message = "Couldnt connect to db.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}

//mysql_select_db($db_name) OR die(mysql_error());

$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$dbh->beginTransaction();

$roomInfo;
$q_edit_seatsHard = "update freyHallTestingCenterRoom set numseats = '{$numseats}';";

$query = $q_edit_seatsHard;
$result = $dbh->prepare($query);

echo "<script type='text/javascript'>alert('$numseats');</script>";
$result->execute();
/*
$query = $q_view_room;
$result = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$result->execute(array($roomInfo));

*/
$num = $result->rowCount();
echo "<script type='text/javascript'>alert('$num');</script>";

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
