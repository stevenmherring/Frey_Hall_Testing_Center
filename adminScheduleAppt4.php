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
$examStartDate = $_POST[startDate];
$examNetID = $_POST[netID];
$examID = $_POST[examID];
$examDuration = $_POST[examDuration];
$examClassID = $_POST[examClassID];
$term;
$dayOfWeek =  date('l', strtotime( $examStartDate));
$examTotalTime = intval($examDuration);
$gaptime;    
    
$sql = "SELECT * FROM freyhalltestingcenterroom WHERE daysFrom<'$examStartDate' AND daysUntil< '$examStartDate'; ";
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

foreach($var as $getVal){
    $gaptime = $getVal["gaptime"];
}
$examTotalTime = $examTotalTime + intval(gaptime);

$examRemainder = $examTotalTime % 30;

$examIntervals = ($examTotalTime + (30-$examRemainder))/30;


$startDateSplit = explode("-",$examStartDate);
switch ($startDateSplit[1]){
    case '01':
        $term='wt';
    case '02':
        $term='sp';
    case '03':
        $term='sp';
    case '04':
        $term='sp';
    case '05':
        $term='sp';
    case '06':
        $term='sm';
    case '07':
        $term='sm';
    case '08':
        $term='sm';
    case '09':
        $term='fl';
    case '10':
        $term='fl';
    case '11':
        $term='fl';
    case '12':
        $term='fl';
            
}

$year=intval($startDateSplit[0]);
$year= $year-2000;
$term = $term . $year;

//if($examStartDate )

$sql = "SELECT * FROM date WHERE Date='$examStartDate' AND centerIsOpen=1; ";
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

$count = count($var);
echo $examStartDate . "<br>";
echo $count . "<br>";

$sql = "SELECT * FROM freyhalltestingcenterroom WHERE daysFrom<'$examStartDate' AND daysUntil> '$examStartDate'; ";
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


$numSeats;
foreach($var as $vars){
    $numSeats = $vars["numseats"];
}

//initialize all slot times
$time0 = $time1=$time2=$time3=$time4=$time5=$time6=$time7=$time8=$time9=$time10=$time11=$time12=$time13=$time14=$time15=$time16=$time17
        =$time18=$time19=$time20=$time21=$time22=$time23=$time24=$time25=$time26=$time27=$time28=$time29=$time30=$time31=$time32=$time33=$time34
        =$time35=$time36=$time37=$time38=$time39=$time40 = $time41=$time42=$time43=$time44=$time45=$time46=$time47=0;

//array for all available starting time slots
$allFreeTimes=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
$possibleApptTimes=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];



//check variables
echo "count " . $count . "<br>";
echo "numseats " . $numSeats ."<br>";
echo "start date " . $examStartDate ."<br>";
echo "day of week " . $dayOfWeek ."<br>";
echo "interval " . $examIntervals ."<br>";




if($count == 0 ){
    echo "passes IF <br>";
    $sql = "SELECT * FROM date WHERE Date='$dayOfWeek'; ";
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
    $getDayHrs = $result->fetchAll();


    
    foreach($getDayHrs as $testingRmTime){
        $time0=$testingRmTime['timeslot0'];
        $time1=$testingRmTime['timeslot1'];
        $time2=$testingRmTime['timeslot2'];
        $time3=$testingRmTime['timeslot3'];
        $time4=$testingRmTime['timeslot4'];
        $time5=$testingRmTime['timeslot5'];
        $time6=$testingRmTime['timeslot6'];
        $time7=$testingRmTime['timeslot7'];
        $time8=$testingRmTime['timeslot8'];
        $time9=$testingRmTime['timeslot9'];
        $time10=$testingRmTime['timeslot10'];
        $time11=$testingRmTime['timeslot11'];
        $time12=$testingRmTime['timeslot12'];
        $time13=$testingRmTime['timeslot13'];
        $time14=$testingRmTime['timeslot14'];
        $time15=$testingRmTime['timeslot15'];
        $time16=$testingRmTime['timeslot16'];
        $time17=$testingRmTime['timeslot17'];
        $time18=$testingRmTime['timeslot18'];
        $time19=$testingRmTime['timeslot19'];
        $time20=$testingRmTime['timeslot20'];
        $time21=$testingRmTime['timeslot21'];
        $time22=$testingRmTime['timeslot22'];
        $time23=$testingRmTime['timeslot23'];
        $time24=$testingRmTime['timeslot24'];
        $time25=$testingRmTime['timeslot25'];
        $time26=$testingRmTime['timeslot26'];
        $time27=$testingRmTime['timeslot27'];
        $time28=$testingRmTime['timeslot28'];
        $time29=$testingRmTime['timeslot29'];
        $time30=$testingRmTime['timeslot30'];
        $time31=$testingRmTime['timeslot31'];
        $time32=$testingRmTime['timeslot32'];
        $time33=$testingRmTime['timeslot33'];
        $time34=$testingRmTime['timeslot34'];
        $time35=$testingRmTime['timeslot35'];
        $time36=$testingRmTime['timeslot36'];
        $time37=$testingRmTime['timeslot37'];
        $time38=$testingRmTime['timeslot38'];
        $time39=$testingRmTime['timeslot39'];
        $time40=$testingRmTime['timeslot40'];
        $time41=$testingRmTime['timeslot41'];
        $time42=$testingRmTime['timeslot42'];
        $time43=$testingRmTime['timeslot43'];
        $time44=$testingRmTime['timeslot44'];
        $time45=$testingRmTime['timeslot45'];
        $time46=$testingRmTime['timeslot46'];
        $time47=$testingRmTime['timeslot47'];
    }
    //because new Date the student can pick any time
    $allFreeTimes=[$time0, $time1, $time2, $time3, $time4, $time5, $time6, $time7, $time8, $time9,
                $time10, $time11, $time12, $time13, $time14, $time15, $time16, $time17, $time18, $time19,
                $time20, $time21, $time22, $time23, $time24, $time25, $time26, $time27, $time28, $time29,
                $time30, $time31, $time32, $time33, $time34, $time35, $time36, $time37, $time38, $time39,
                $time40, $time41, $time42, $time43, $time44, $time45, $time46, $time47];
    
      for($counter =1; $counter <= $numSeats; $counter++){
       $sql = "INSERT INTO  date(Date, Term, centerIsOpen, timeslot0, timeslot1,timeslot2,
    timeslot3,timeslot4,timeslot5,timeslot6,timeslot7,timeslot8,timeslot9,timeslot10,
    timeslot11,timeslot12,timeslot13,timeslot14,timeslot15,timeslot16,timeslot17,timeslot18,
    timeslot19,timeslot20,timeslot21,timeslot22,timeslot23,timeslot24,timeslot25,timeslot26,
    timeslot27,timeslot28,timeslot29,timeslot30,timeslot31,timeslot32,timeslot33,
    timeslot34,timeslot35,timeslot36,timeslot37,timeslot38,timeslot39,timeslot40,timeslot41,
    timeslot42,timeslot43,timeslot44,timeslot45,timeslot46,timeslot47, seat)
       VALUES ('$examStartDate', '$term', 1, $time0, $time1,$time2,
    $time3,$time4,$time5,$time6,$time7,$time8,$time9,$time10,
    $time11,$time12,$time13,$time14,$time15,$time16,$time17,$time18,
    $time19,$time20,$time21,$time22,$time23,$time24,$time25,$time26,
    $time27,$time28,$time29,$time30,$time31,$time32,$time33,$time34,
    $time35,$time36,$time37,$time38,$time39,$time40,$time41,
    $time42,$time43,$time44,$time45,$time46,$time47, $counter); ";
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
    }
    
    
}
    //Day Already initialized in DB and now get all seats
    $sql = "SELECT * FROM date WHERE Date='$examStartDate'; ";
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
    $getDayHrs = $result->fetchAll();
    

    
    foreach($getDayHrs as $testingRmTime){
        $time0=$testingRmTime['timeslot0'];
        $time1=$testingRmTime['timeslot1'];
        $time2=$testingRmTime['timeslot2'];
        $time3=$testingRmTime['timeslot3'];
        $time4=$testingRmTime['timeslot4'];
        $time5=$testingRmTime['timeslot5'];
        $time6=$testingRmTime['timeslot6'];
        $time7=$testingRmTime['timeslot7'];
        $time8=$testingRmTime['timeslot8'];
        $time9=$testingRmTime['timeslot9'];
        $time10=$testingRmTime['timeslot10'];
        $time11=$testingRmTime['timeslot11'];
        $time12=$testingRmTime['timeslot12'];
        $time13=$testingRmTime['timeslot13'];
        $time14=$testingRmTime['timeslot14'];
        $time15=$testingRmTime['timeslot15'];
        $time16=$testingRmTime['timeslot16'];
        $time17=$testingRmTime['timeslot17'];
        $time18=$testingRmTime['timeslot18'];
        $time19=$testingRmTime['timeslot19'];
        $time20=$testingRmTime['timeslot20'];
        $time21=$testingRmTime['timeslot21'];
        $time22=$testingRmTime['timeslot22'];
        $time23=$testingRmTime['timeslot23'];
        $time24=$testingRmTime['timeslot24'];
        $time25=$testingRmTime['timeslot25'];
        $time26=$testingRmTime['timeslot26'];
        $time27=$testingRmTime['timeslot27'];
        $time28=$testingRmTime['timeslot28'];
        $time29=$testingRmTime['timeslot29'];
        $time30=$testingRmTime['timeslot30'];
        $time31=$testingRmTime['timeslot31'];
        $time32=$testingRmTime['timeslot32'];
        $time33=$testingRmTime['timeslot33'];
        $time34=$testingRmTime['timeslot34'];
        $time35=$testingRmTime['timeslot35'];
        $time36=$testingRmTime['timeslot36'];
        $time37=$testingRmTime['timeslot37'];
        $time38=$testingRmTime['timeslot38'];
        $time39=$testingRmTime['timeslot39'];
        $time40=$testingRmTime['timeslot40'];
        $time41=$testingRmTime['timeslot41'];
        $time42=$testingRmTime['timeslot42'];
        $time43=$testingRmTime['timeslot43'];
        $time44=$testingRmTime['timeslot44'];
        $time45=$testingRmTime['timeslot45'];
        $time46=$testingRmTime['timeslot46'];
        $time47=$testingRmTime['timeslot47'];
        $seat  =$testingRmTime['seat'];
        
        $allFreeTimes=[$time0, $time1, $time2, $time3, $time4, $time5, $time6, $time7, $time8, $time9,
                $time10, $time11, $time12, $time13, $time14, $time15, $time16, $time17, $time18, $time19,
                $time20, $time21, $time22, $time23, $time24, $time25, $time26, $time27, $time28, $time29,
                $time30, $time31, $time32, $time33, $time34, $time35, $time36, $time37, $time38, $time39,
                $time40, $time41, $time42, $time43, $time44, $time45, $time46, $time47];
        
        for($val=0; $val<(48-$examIntervals); $val++){
            
            if ($possibleApptTimes[$val]==0){
                $conditional = true;
                
                for($check=0; $check<$examIntervals; $check++){
                    $current = $val + $check;
                    if($allFreeTimes[$current]!=1){
                        $conditional = false;
                    }
                }
                if($conditional){
                    echo "seatnum = " . $seat . "val = " . $val . "<br>";
                    $possibleApptTimes[$val]=$seat;
                }
            }
        }
    } 

print_r($possibleApptTimes);
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

    
    <div id="adminContent" class="facultyScheduleExamFormContainer" >
        <h3>Create Appt</h3>
    <div style='height:500px'>
    
        <form action="createAppt.php" method="post">
            <p>
                Exam Duration: <?php echo $examDuration ?> <br>
                
            </p>
            
            
            
            <p>
                <label> Pick a desired time : </label>
                <select class="combobox" name="startTime" id="startTime" required>
                    <option value="">Choose an Appointment Time </option>
                  <?php  $timeStatement;
                    for($x=0; $x<48 ;$x++){
                        if($possibleApptTimes[intval($x)]!=0){               
                        switch (intval($x)){
                            case 0:
                                $timeStatement="12:00 AM";
                                break;
                            case 1:
                                $timeStatement="12:30 AM";
                                break;
                            case 2:
                                $timeStatement="01:00 AM";
                                break;
                            case 3:
                                $timeStatement="01:30 AM";
                                break;
                            case 4:
                                $timeStatement="02:00 AM";
                                break;
                            case 5:
                                $timeStatement="02:30 AM";
                                break;
                            case 6:
                                $timeStatement="03:00 AM";
                                break;
                            case 7:
                                $timeStatement="03:30 AM";
                                break;
                            case 8:
                                $timeStatement="04:00 AM";
                                break;
                            case 9:
                                $timeStatement="04:30 AM";
                                break;
                            case 10:
                                $timeStatement="05:00 AM";
                                break;
                            case 11:
                                $timeStatement="05:30 AM";
                                break;
                            case 12:
                                $timeStatement="06:00 AM";
                                break;
                            case 13:
                                $timeStatement="06:30 AM";
                                break;
                            case 14:
                                $timeStatement="07:00 AM";
                                break;
                            case 15:
                                $timeStatement="07:30 AM";
                                break;
                            case 16:
                                $timeStatement="08:00 AM";
                                break;
                            case 17:
                                $timeStatement="08:30 AM";
                                break;
                            case 18:
                                $timeStatement="09:00 AM";
                                break;
                            case 19:
                                $timeStatement="09:30 AM";
                                break;
                            case 20:
                                $timeStatement="10:00 AM";
                                break;
                            case 21:
                                $timeStatement="10:30 AM";
                                break;
                            case 22:
                                $timeStatement="11:00 AM";
                                break;
                            case 23:
                                $timeStatement="11:30 AM";
                                break;
                            case 24:
                                $timeStatement="12:00 PM";
                                break;
                            case 25:
                                $timeStatement="12:30 PM";
                                break;
                            case 26:
                                $timeStatement="13:00 PM";
                                break;
                            case 27:
                                $timeStatement="1:30 PM";
                                break;
                            case 28:
                                $timeStatement="2:00 PM";
                                break;
                            case 29:
                                $timeStatement="2:30 PM";
                                break;
                            case 30:
                                $timeStatement="3:00 PM";
                                break;
                            case 31:
                                $timeStatement="3:30 PM";
                                break;
                            case 32:
                                $timeStatement="4:00 PM";
                                break;
                            case 33:
                                $timeStatement="4:30 PM";
                                break;
                            case 34:
                                $timeStatement="5:00 PM";
                                break;
                            case 35:
                                $timeStatement="5:30 PM";
                                break;
                            case 36:
                                $timeStatement="6:00 PM";
                                break;
                            case 37:
                                $timeStatement="6:30 PM";
                                break;
                            case 38:
                                $timeStatement="7:00 PM";
                                break;
                            case 39:
                                $timeStatement="7:30 PM";
                                break;
                            case 40:
                                $timeStatement="8:00 PM";
                                break;
                            case 41:
                                $timeStatement="8:30 PM";
                                break;
                            case 42:
                                $timeStatement="9:00 PM";
                                break;
                            case 43:
                                $timeStatement="9:30 PM";
                                break;
                            case 44:
                                $timeStatement="10:00 PM";
                                break;
                            case 45:
                                $timeStatement="10:30 PM";
                                break;
                            case 46:
                                $timeStatement="11:00 PM";
                                break;
                            case 47:
                                $timeStatement="11:30 PM";   
                                break;
                            default:
                                $timeStatement="error";
                            }
                            //Return the seat number and the index, the index value is univerally known and can be replicated
                            ?> <option value="<?php echo $x . "-" . $possibleApptTimes[intval($x)] ;?>"><?php echo $timeStatement; ?></option>
                
                        <?php }
                    }
                    ?>
                    
                    
                </select>
            </p>        
                <input type="hidden" id="examNetID" name="examNetID" value="<?php echo $examNetID; ?>">
                <input type="hidden" id="examID" name="examID" value="<?php echo $examID; ?>">
                <input type="hidden" id="examStartDate" name="examStartDate" value="<?php echo $examStartDate; ?>">
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