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

  }

  public static function getTestingcenter(){
    if ($testingcenter === null){
      return $testingcenter = new TestingCenter();
    } else {
      return $this->testingcenter;
    }

  }

  private function getNumseats(Date $date){
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $q_getseats = "SELECT * FROM freyhalltestingcenterroom where daysFrom = ?";
    $db->beginTransaction();
    $result = $db->prepare($q_getseats);
    if ($!result){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
    }
    $result->execute(array($date));
  }



}
