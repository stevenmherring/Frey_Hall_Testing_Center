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
$userRow=0;
$rosterRow=0;
$classRow=0;
if ($_POST[user_form]!=null){
    if (($handle = fopen("$_POST[user_form]", "r")) !== FALSE) {
        $data = fgetcsv($handle, 1000, ",");
        $sql = "DELETE FROM user";
        $conn->query($sql);
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if ($data[2]!=null){
                $sql = "INSERT INTO user(firstName, lastName, netID, email)
                VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')";
                if ($conn->query($sql) === TRUE) {
                    $userRow++;
                }
            }
        }
        fclose($handle);
    }
} else{
      $errUpdate = "chin fucked up";
      echo "<script type='text/javascript'>alert('$errUpdate');</script>";
}
if ($_POST[roster_form]!=null){
    if (($handle = fopen("$_POST[roster_form]", "r")) !== FALSE) {
        $data = fgetcsv($handle, 1000, ",");
        $sql = "DELETE FROM roster";
        $conn->query($sql);
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if ($data[0] != null and $data[1] != null){
                $sql = "INSERT INTO roster(netID, classID)
                VALUES ('$data[0]', '$data[1]')";
                if ($conn->query($sql) === TRUE) {
                    $rosterRow++;
                }
            }
        }
        fclose($handle);
    }
}else{
      $errUpdate = "chin fucked up";
      echo "<script type='text/javascript'>alert('$errUpdate');</script>";
}
if ($_POST[class_form]!=null){
    if (($handle = fopen("$_POST[class_form]", "r")) !== FALSE) {
        $data = fgetcsv($handle, 1000, ",");
        $sql = "DELETE FROM class";
        $conn->query($sql);
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if ($data[0]!= null){
                $sql = "INSERT INTO class(classID, subj, catalogNumber, section, instructorNetID)
                VALUES ('$data[0]', '$data[1]', $data[2], '$data[3]','$data[4]')";
                if ($conn->query($sql) === TRUE) {
                    $classRow++;
                }
            }
        }
        fclose($handle);
    }
}


?>
     <h3> Import Successful</h3>
     <p> You have sucessfully imported <?php echo $userRow ?> user rows, <?php echo $rosterRow ?> roster rows, and <?php echo $classRow ?> class rows for the <?php
    echo $_POST[term];?> term.</p>
     <button onclick="goBack()">Go Back</button>




<?php
$conn->close();
?>
