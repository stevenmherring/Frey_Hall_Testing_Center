<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html>
<body>
  <h3>Form submitted</h3>

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

$servername = "localhost";
$username = "root";
$password = "physics123";
$dbname = "FreyHallTestingCenter";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  $message = "Couldnt connect to db.";
  echo '<script type="text/javascript">alert("'.$message.'");</script>';
  die("Connection failed: " . mysqli_connect_error());
} else {
  $success = "Successfully connected to db.";
  echo '<script type="text/javascript">alert("'.$success.'");</script>';
}


try {
       $dbh=new PDO("mysql:host=localhost;dbname=FreyHallTestingCenter","root","physics123");
} catch(PDOException $e) {

  $message = "Couldnt connect to db.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}


//mysql_select_db($db_name) OR die(mysql_error());

$q_select_Room = "SELECT * FROM freyHallTestingCenterRoom";
$q_view_room = "DESCRIBE freyHallTestingCenterRoom";
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$dbh->beginTransaction();

$query = $q_view_room;
$result = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$roomInfo;
$result->execute(array($roomInfo));

$num = $result->rowCount();
echo "<script type='text/javascript'>alert('$num');</script>";

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
