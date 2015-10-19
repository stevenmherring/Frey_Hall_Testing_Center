<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet"> 
  <link href="css/landing-page.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <?php include("includes/header.html");?>
</head>

<?php
$servername = "mysql2.cs.stonybrook.edu";
$username = "sachin";
$password = "108610059";
$dbname = "sachin";
// retrieves user input from textbox
if(! empty($_POST['examID'])){
    $examIDs = $_POST['examID'];
	//echo $examIDs;
	}
	
	// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

$sqk = "DELETE FROM exam WHERE examID='$examIDs'";
	
$finals=$conn->query($sqk); 
    // deletes from database


if($finals){
	echo "<div style ='font:30px Arial,tahoma,sans-serif;color:#00FF00;text-align:center;'> Success! Exam Deleted</div>";
}
else {
	echo "<div style ='font:30px Arial,tahoma,sans-serif;color:#ff0000;text-align:center;'> Error Exam Does Not Exist! </div>";
}


$conn->close();

?>	
<br><br>
<?php
$servername = "mysql2.cs.stonybrook.edu";
$username = "sachin";
$password = "108610059";
$dbname = "sachin";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT examID, catalogueNumber,subj,professorNetID,examStartDate,examEndDate,examStartTime,examEndTime,examDuration,processed FROM exam";
$result = mysqli_query($conn, $sql);   

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "ExamID: " . $row["examID"]."&nbsp;&nbsp; Catalogue Number: " . $row["catalogueNumber"]."&nbsp;&nbsp; Subject: " . $row["subj"]. "&nbsp;&nbsp;&nbsp;&nbsp;Professor NetID: " . $row["professorNetID"]. "&nbsp;&nbsp;&nbsp;&nbsp;Start Date: " . $row["examStartDate"]. "&nbsp;&nbsp;&nbsp;&nbsp;Start Time: " . $row["examStartTime"]."&nbsp;&nbsp;&nbsp;&nbsp;End Date: ". $row["examEndDate"]. "&nbsp;&nbsp;&nbsp;&nbsp;End Time: " . $row["examEndTime"]. "&nbsp;&nbsp;&nbsp;&nbsp;Duration: " . $row["examDuration"]."&nbsp;&nbsp;&nbsp;&nbsp;Processed: " . $row["processed"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>










<footer>
  <?php include("includes/footer.html");?>
</footer>
</html>