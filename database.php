<?php
$servername = "mysql2.cs.stonybrook.edu";
$username = "sachin";
$password = "108610059";
$dbname = "sachin";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//$link = mysql_connect('mysql2.cs.stonybrook.edu', 'sachin', '108610059');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqb = "INSERT INTO exam (examID, courseID, professorID,examStartDate,examEndDate,examStartTime,examEndTime,examDuration)
VALUES ('killer', 'CSE305','123845785','2102-08-12','2121-06-08','10:10:10','20:20:20','20')";

$conn->query($sqb);       // adds into database




$sql = "SELECT examID, courseID, professorID,examStartDate,examEndDate,examStartTime,examEndTime,examDuration FROM exam";
$result = mysqli_query($conn, $sql);   

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "ExamID: " . $row["examID"]. " - courseID: " . $row["courseID"]. " " . $row["professorID"]. " " . $row["examStartDate"]. " " . $row["examEndDate"]. $row["examStartTime"]. " " . $row["examEndTime"]. " " . $row["examDuration"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

