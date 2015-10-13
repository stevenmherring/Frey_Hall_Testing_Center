 <?php
$servername = "mysql2.cs.stonybrook.edu";
$username = "sachin";
$password = "108610059";
$dbname = "sachin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "SELECT *  FROM appointment a, exam e, roster r WHERE a.examID=e.examID AND e.classID=r.classID AND a.netID!=r.netID";
$sql = "UPDATE appointment SET status='superf' FROM SELECT *  FROM appointment a, exam e, roster r WHERE a.examID=e.examID AND e.classID=r.classID AND a.netID!=r.netID";
$conn->query($sql);
$conn->close();
?>