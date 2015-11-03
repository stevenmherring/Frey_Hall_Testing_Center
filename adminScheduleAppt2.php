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
$dbh->beginTransaction();

$sql = "SELECT * FROM roster r, user u, class c, exam e WHERE u.netID=r.netID AND u.netID='$_POST[apptNetID]' AND c.classID = r.classID AND e.classID=c.classID; ";
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
$var = $result->fetchAll();
 
  include_once 'includes/db_connect.php';
  include_once 'includes/loginfunctions.php';
  sec_session_start();

  if (login_check($mysqli) == true) {
      $logged = 'in';
  } else {
      $logged = 'out';
  }
?>

<head>
  <meta charset="utf-8">
  <title>Frey Hall Testing Center</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    
    
</head>
<body>
    
     <?php if (login_check($mysqli) == true) : ?>
    
    <div id="adminContent" class="facultyScheduleExamFormContainer" >
        <h3>Create Appt</h3>
    <div style='height:500px'>
    
        <form action="adminScheduleAppt3.php" method="post">
            <p>
                <label> Exam Name : </label>
                <select class="combobox" name="className" id="className" required>
                    <option value="">Choose an exam </option>
                    <?php foreach ($var as $vars) { ?>
            <option value="<?php echo $vars["examID"]; ?>"><?php  echo $vars["subj"] . $vars["catalogNumber"] . ":" . $vars["section"] . " - " . $vars["examName"]; ?></option> 
                    <?php } ?>
                </select>
            </p>        
           
            <input type="submit" name="submit" value="Next" />
            </form>
    </div>
         </div>
    <?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
</body>
</html>

<?php
$dbh->commit();
        $dbh=null;?>