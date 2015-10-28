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


<?php
  include_once 'includes/db_connect.php';
  include_once 'includes/loginfunctions.php';
  sec_session_start();

  if (login_check($mysqli) == true) {
      $logged = 'in';
  } else {
      $logged = 'out';
  }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Frey Hall Testing Center</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script type="text/javascript">
    
    function check()
            {
                var checkStartHr= document.getElementById("apptHr").value;
                var checkStartMin= document.getElementById("apptMin").value;
                var startDate = document.getElementById("datepicker").value;
                var startTime = parseInt(checkStartHr)*60 + parseInt(checkStartMin);
                var startSplit = startDate.split('-');
                var endSplit =endDate.split('-');
//                var startHr = parseInt(checkStartHr);
//                var startMin = parseInt(checkStartMin);
//                var endHr = parseInt(checkEndHr);
//                var endMin = parseInt(checkEndMin);
                
                startSplit[0]= parseInt(startSplit[0]);
                startSplit[1]= parseInt(startSplit[1]);
                startSplit[2]= parseInt(startSplit[2]);
                endSplit[0]= parseInt(endSplit[0]);
                endSplit[1]= parseInt(endSplit[1]);
                endSplit[2]= parseInt(endSplit[2]);
               var state = true;
            
                
                if (state == true){
                    return true;
                }
                else{
                    alert('Your Exam start date/time must be before your end date/time minus exam duration');

					return false;
                }
                
			}
        </script>
    
</head>
<body>

     <?php if (login_check($mysqli) == true) : ?>
    
    <h3>Create Exam</h3>
    <div style="height: 500px">
       
    
        <form action="createAppt.php" method="post" onSubmit="return check();">
            <p>
                <label> Net ID (place holder): </label><input type="text" id="apptNetID" name="apptNetID" value="" maxlength="50" required/>
            </p>
            <p>
                <label> ExamID (Placeholder): </label><input type="text" id="classID" name="classID" value="" maxlength="50" required/>
            </p>
            
          <script>
          $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd"
                });
          });
          </script>
          </script>
        <p>Appointment Date: <input type="text" name="datepicker" id="datepicker"></p>
          <p>
    <label> Time:  </label>
        <select class="combobox" name="apptHr" id="apptHr" required>
            <option value="">Hr</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
        </select>
        <select class="combobox" name="apptMin" id="apptMin" required>
            <option value="">Min</option>
            <option value="00">00</option>
            <option value="30">30</option>
        </select>
<!--
        <select class="combobox" name="startAMPM" id="startAMPM">
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
-->
        
<!--
        <select class="combobox" name="endAMPM" id="endAMPM">
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
-->
    </p> 
            <input type="submit" name="submit" value="Schedule exam" />
            </form>
         </div>
    <?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
</body>
</html>

<?php
$dbh->commit();
        $dbh=null;?>