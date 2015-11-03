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
    if ($!result){
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
    if ($!result){
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
    if ($!result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
    $this->gaptime = $result->fetch(PDO::FETCH_ASSOC);
    return $this->gaptime;
  }
}
