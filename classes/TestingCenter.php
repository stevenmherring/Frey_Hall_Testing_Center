<?
/*
 * Testing Center Class
 */
 include_once('Database.php');
 include_once('Error.php');
class TestingCenter {

  private $numseats;
  private $numsetasideseats;
  private $daysFrom;
  private $daysUntil;
  private $hours_openfrom;
  private $hours_openuntil;
  private $gaptime;
  private $reminderInterval;
  private $roomname;
  private $testingcenter;

  public function __construct() {
    $this->roomname = "FreyHallTestingCenter";
  }

  public static function getTestingcenter(){
    $testingcenter = new TestingCenter();
    return $testingcenter;
  }

  public function getNumseats(Date $date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getseats = "SELECT numseats FROM freyhalltestingcenterroom where daysFrom = ?";
    $handle->beginTransaction();
    $result = $handle->prepare($q_getseats);
    if (!$result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
    $this->numseats = $result->fetch(PDO::FETCH_ASSOC);
    return $this->numseats;
  }

  public function getNumsetasideseats(Date $date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getsetasideseats = "SELECT numsetasideseats FROM freyhalltestingcenterroom where daysFrom = ?";
    $handle->beginTransaction();
    $result = $handle->prepare($q_getsetasideseats);
    if (!$result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
    $this->numsetasideseats = $result->fetch(PDO::FETCH_ASSOC);
    return $this->numsetasideseats;
  }

  public function getgapTime(Date $date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getgaptime = "SELECT gaptime FROM freyhalltestingcenterroom where daysFrom = ?";
    $handle->beginTransaction();
    $result = $handle->prepare($q_getgaptime);
    if (!$result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
    $this->gaptime = $result->fetch(PDO::FETCH_ASSOC);
    return $this->gaptime;
  }

  public function getreminderInterval(Date $date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getreminderinterval = "SELECT reminderinterval FROM freyhalltestingcenterroom where daysFrom = ?";
    $handle->beginTransaction();
    $result = $handle->prepare($q_getreminderinterval);
    if (!$result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
    $this->gaptime = $result->fetch(PDO::FETCH_ASSOC);
    return $this->gaptime;
  }

  public static function getClassSize($classID){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getclasssize = "SELECT * FROM roster WHERE classID = ?";
    $handle->beginTransaction();
    $result = $handle->prepare($q_getclasssize);
    if (!$result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($classID));
    $count = $result->rowCount();
    return $count;
  }

  public static function isOpen($date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_iscenteropen = "SELECT centerIsOpen from DATE where Date = ?";
    $handle->beginTransaction();
    $result = $handle->prepare($q_iscenteropne);
    $result->execute(array($date));
    return $result;
  }
  public static function getAppointmentsOnDate($date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getapptOnDate = "SELECT * FROM appointment WHERE dateOfExam = ?";
    $handle->beginTransaction();
    $result = $handle->prepare($q_getapptOnDate);
    if (!$result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
    $apptOnDate = array();
    $index = 0;
    while($value = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
      $apptOnDate[$index] = $value;
      $index++;
    }
    return $apptOnDate;
  }
  public static function getExamsOnDate ($date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getExamStartDate = "SELECT * FROM appointment WHERE examStartDate = ?";
    $q_getExamStopDate = "SELECT * FROM appointment WHERE examStopDate = ?";
    $handle->beginTransaction();
    $q_examsStartDate = $handle->prepare($q_getExamStartDate);
    $q_examsStopDate = $handle->prepare($q_getExamStopDate);
    $q_examsStartDate->execute(array($date));
    $q_examsStopDate->execute(array($date));
    $examsStartingOnDate = array();
    $examsStoppingOnDate = array();
    $index = 0;
    while($result = $q_examsStartDate->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
      $examsStartingOnDate[$index] = $result;
      $index++;
    }
    if (!$result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
    $examsOnDate = array();
    $index = 0;
    while($result = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
      $examsOnDate[$index] = $result;
      $index++;
    }
    return $examsOnDate;
  }

  public function getTakenSeats($date){

  }
  private function getOpenFrom($date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getopenfrom = "SELECT hours_openfrom from freyhalltestingcenterroom where daysFrom=?";
    $handle->beginTransaction();
    $result_openfrom = $handle->prepare($q_getopenfrom);
    if (!$result_openfrom){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $center_openfrom = $result_openfrom->execute(array($date));
    return $center_openfrom;
  }
  private function getOpenUntil($date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getopenuntil = "SELECT hours_openuntil from freyhalltestingcenterroom where daysFrom=?";
    $handle->beginTransaction();
    $result_openuntil = $handle->prepare($q_getopenuntil);
    if (!$result_openuntil){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $center_openuntil = $result_openuntil->execute(array($date));
    return $center_openuntil;
  }
  public function getTotalOpenTime($date){
    $center_openuntil = self::getOpenUntil($date);
    $center_openfrom = self::getOpenFrom($date);
    $center_hours = abs($center_openuntil - $center_openfrom);
    return $center_hours;
  }
  public function isEnoughSeatsForExam($date,$examToSchedule){

      // Check to see if the center is open on this date
      if (self::isOpen($date) == true){

      // Figure out how many seats we have in the testing center on this day
      $numberOfSeatsTotal = self::getNumseats($examToSchedule);

      // Figure out how many seats this exam takes
      $numberOfSeatsExamReq = self::getClassSize($classID);

      // Figure out if another exam is on the date, and how many seats they are using.
      $allExamsOnDate = self::getExamsOnDate($date);

      foreach ($allExamsOnDate as $exam){
        // Get the seat count in an exam already scheduled on date
        $seatsInExam = self::getClassSize($exam);
        // Take these seats away from number of total available
        $numberOfSeatsTotal = $numberOfSeatsTotal - $seatsInExam;
      }
      /* To do -- Steven Chin, Chris Ryan
      Check to see if there are appointments made in the other exams on this day
      in order to refine the number of seats that the other exams require.
      */
      // Check if this day can hold all of the seats required
      if ($umberOfSeatsTotal <= $numberOfSeatsExamReq){
        return true;
      } else {
        return false;
      }

  }
}

  public function getUtilization($date){
    // Utilization = the sum of all appointments, the appointment durations / number seats in the testing center * time the center is open
    $setOfApptsOnDay;
    $numberOfSeatsTotal = self::getNumSeats($date);
    $openTime = self::getOpenTime($date);
  }
}
