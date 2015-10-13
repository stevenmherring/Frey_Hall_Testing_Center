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
$row = 0;
if (($handle = fopen("roster.csv", "r")) !== FALSE) {
    $data = fgetcsv($handle, 1000, ",");
    
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        if ($data[0] != null and $data[1] != null){
            $sql = "INSERT INTO roster(netID, classID)
            VALUES ('$data[0]', '$data[1]')";
            if ($conn->query($sql) === TRUE) {
                $row++;
            }
        }
    }
    fclose($handle);
    echo "There has been $row rows inserted into Roster";
}
$conn->close();
?>
