<?php
include("dbQueries.php");
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

try {
       $dbh=new PDO("mysql:host=mysql2.cs.stonybrook.edu;dbname=sachin","sachin","108610059");
} catch(PDOException $e) {
  $message = "Couldnt connect to db.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
$userRow=0;
$rosterRow=0;
$classRow=0;
$dbh->beginTransaction();
$userForm = $_POST['user_form'];
$rosterForm = $_POST['roster_form'];
$classForm = $_POST['class_form'];

if ($userForm!=null){
    if (($handle = fopen("$userForm", "r")) !== FALSE) {
        $data = fgetcsv($handle, 1000, ",");
        $sql = "DELETE FROM user";
        $result = $dbh->prepare($sql);
        if (!$result){
          $prepareFail = "Information NOT updated.";
          echo "<script type='text/javascript'>alert('$prepareFail');</script>";
          $dbh->rollback();
          $dbh = null;
          return;
        }
        //$conn->query($sql);
        $result->execute();
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if ($data[2]!=null){
                $sql = "INSERT INTO user(firstName, lastName, netID, email)
                VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')";
                $result = $dbh->prepare($sql);
                /*if ($conn->query($sql) === TRUE) {}*/
                if ($result->execute() === TRUE){
                  $stmtCSVlog = $transactionLogging;
                  $stmtCSVquery = $dbh->prepare($stmtCSVlog);
                  $transactionContent = "classID:" . $data[0] . "," . "subj:" . $data[1] . "," . "section:" . $data[2] .  "," . "catalogNumber:" . $data[3] .  "," . "instructorNetID:" . $data[4]  . ",";
                  $transactionType = "importcsv";
                  $now = time();
                  $userID = "placeholder";
                  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
                  $stmtCSVquery->execute(array($userID,$transactionType,$now,$transactionContent));
                  $userRow++;
                }


            }
        }

    }

    fclose($handle);
}

if ($rosterForm!=null){
    if (($handle = fopen($rosterForm, "r")) !== FALSE) {
        $data = fgetcsv($handle, 1000, ",");
        $sql = "DELETE FROM roster";
        $result = $dbh->prepare($sql);
        if (!$result){
          $prepareFail = "Information NOT updated.";
          echo "<script type='text/javascript'>alert('$prepareFail');</script>";
          $dbh->rollback();
          $dbh = null;
          return;
        }
        echo "use"; 
        //$conn->query($sql);
        $result->execute();
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[1]!=null){
                $sql = "INSERT INTO roster(netID, classID) VALUES ('$data[0]', '$data[1]')";
                $result = $dbh->prepare($sql);
                /*if ($conn->query($sql) === TRUE) {}*/
                if ($result->execute() === TRUE){
                    echo "$rosterRow";

                    $stmtCSVlog = $transactionLogging;
                  $stmtCSVquery = $dbh->prepare($stmtCSVlog);
                  $transactionContent = "netID:" . $data[0] . "," . "classID:" . $data[1] . ",";
                  $transactionType = "importcsv";
                  $now = time();
                  $userID = "placeholder";
                  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
                  $stmtCSVquery->execute(array($userID,$transactionType,$now,$transactionContent));
                  $rosterRow++;
                }


            }
        }

    }
    fclose($handle);
}

if ($classForm!=null){
    if (($handle = fopen("$classForm", "r")) !== FALSE) {
        $data = fgetcsv($handle, 1000, ",");
        $sql = "DELETE FROM class";
        $result = $dbh->prepare($sql);
        if (!$result){
          $prepareFail = "Information NOT updated.";
          echo "<script type='text/javascript'>alert('$prepareFail');</script>";
          $dbh->rollback();
          $dbh = null;
          return;
        }
        //$conn->query($sql);
        $result->execute();
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if ($data[0]!=null){
                $sql = "INSERT INTO class(classID, subj, section, instructorNetID)VALUES('$data[0]', '$data[1]','$data[2]', '$data[3]' )";
                $result = $dbh->prepare($sql);
                /*if ($conn->query($sql) === TRUE) {}*/
                if ($result->execute() === TRUE){
                  $stmtCSVlog = $transactionLogging;
                  $stmtCSVquery = $dbh->prepare($stmtCSVlog);
                  $transactionContent = "classID:" . $data[0] . "," . "subj:" . $data[1] . "," . "section:" . $data[2] .  "," . "instructorNetID:" . $data[3] ;
                  $transactionType = "importcsv";
                  $now = time();
                  $userID = "placeholder";
                  //"INSERT INTO transactionlog_tbl(userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";
                  $stmtCSVquery->execute(array($userID,$transactionType,$now,$transactionContent));
                  $userRow++;
                }


            }
        }
        fclose($handle);
    }
}

if ($userRow==0 and $rosterRow==0 and $classRow==0){
?> <h3>Import Failed or not files have been submitted</h3><?php
}
else{
?>
     <h3> Import Successful</h3>
     <p> You have sucessfully imported <?php echo $userRow ?> user rows, <?php echo $rosterRow ?> roster rows, and <?php echo $classRow ?> class rows for the <?php
    echo $_POST[term];?> term.</p>

<?php }
        $dbh->commit();
        $dbh=null;?>
