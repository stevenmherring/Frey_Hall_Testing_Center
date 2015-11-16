<?php
include("dbQueries.php");
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
include_once('classes/Authentication.php');
include_once('classes/Database.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 0) :
try {
       $dbh=new PDO("mysql:host=mysql2.cs.stonybrook.edu;dbname=sachin","sachin","108610059");
} catch(PDOException $e) {
  $message = "Couldnt connect to db.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
$dbh->beginTransaction();


$date = date("Y-m-d");

$sql = "SELECT * FROM exam WHERE examID=$_POST[className]";
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
$examStartDate;
$examEndDate;
$examStartTime;
$examEndTime;
$examDuration;
$examClassID;

foreach($var as $vars){
    $examStartDate = $vars["examStartDate"];
    $examEndDate = $vars["examEndDate"];
    $examStartTime = $vars["examStartTime"];
    $examEndTime = $vars["examEndTime"];
    $examDuration = $vars["examDuration"];
    $examClassID = $vars["classID"];
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
    
    
    <div id="adminContent" class="facultyScheduleExamFormContainer"  >
        <h3>Choose Your Appointment Day</h3>
    <div style='height:500px'>
            <form action="adminScheduleAppt4.php" method="post">
               <script>
                      $(function() {
                        $( "#startdatepicker" ).datepicker({
                            dateFormat: "yy-mm-dd",
                            minDate: '<?php echo $examStartDate ?>' ,
                            maxDate: '<?php echo $examEndDate ?>',
                            beforeShowDay: $.datepicker.noWeekends
                            });
                      });
                      </script>
                    <p>Appointment Date: <input type="text" name="startDate" id="startdatepicker"></p>
              
                <input type="hidden" id = "netID" name="netID" value="<?php echo $_POST[netID] ?>">
                <input type="hidden" id="examID" name="examID" value="<?php echo $_POST[className] ?>">
                <input type="hidden" id="examDuration" name="examDuration" value="<?php echo $examDuration ?>">
                <input type="hidden" id="examClassID" name="examClassID" value="<?php echo $examClassID ?>">
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
