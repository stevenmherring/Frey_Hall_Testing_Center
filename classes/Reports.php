<?php
/*
 * Report Generation Static Class Design
 */
include_once('Database.php');
class Report {

  private function __construct() {}
  //class vars
  private static $initialized = false;
  /*
  * Give the class a static dp, every method must call initialize to determine it is instantiated
  */

  private static function intiliaze() {
    if(self::$initialized) {
      return;
    }
    //generate reports here
    //return them via other methods
    self::$initialized = true;
  }//initialize

  /*
  Generate reports. For each report, a specified term can be a past, current, or future term.
 For web­based systems, each report can simply be displayed in the browser, and the
 browser’s Save or Print function can be used to save it to a file. Non­web­based systems
 should also provide the ability to save a report to a file. Plain text format is acceptable,
 although better formatting (e.g., HTML) is preferable.
  */
  public static function getDayReport($term) {
    initialize();
    // a. For each day in a specified term, report the number of student appointments on that day.
    $db = Database::getDatabase();
    $q_getDays = "SELECT day FROM dates where term=?";
    $report = array();
    $handle = $db->getHandle();
    $handle->beginTransaction();
    $statement = $handle->prepare($q_getDays);
    if (!$statement){
      echo "<script type='text/javascript'>alert('errUpdate');</script>";
      exit;
    }
    $statement->execute(array($term));
    $index = 0;
    while($result = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
      $report[$index] = $result;
      $index++;
    }//while result != NULL
    return $report;
  }//getDayReport

  public static function getWeekReport() {
    // b. For each week in a specified term, report the number of student appointments that week
    //and the course identifiers of courses associated with any of those appointments.
  }//getWeekReport

  public static function getTermReport() {
    //c. For a specified term, report the courses that used the testing center in that term.
  }//getTermReport

  public static function getRangeReport() {
    // d. For a specified range of terms, report the total number of student appointments in each
    //term.
  }//getRangeReport

}//Class
?>
