<?php

/*
 * Testing Center Class
 */
include_once('Database.php');
include_once('Error.php');
class User {



  /* Call this method to select all exams where this netid is a involved */
  public static function getExams($netid){
    $q_getmyexams = "SELECT * FROM exam e1 INNER JOIN  class c1 ON c1.classID = e1.classID WHERE c1.instructorNetId=?";

    $myExams = array();
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $handle->beginTransaction();
    $statement = $handle->prepare($q_getmyexams);
    if (!$statement){
      echo "<script type='text/javascript'>alert($errFindExam);</script>";
    }
    $statement->execute(array($netid));
    $index = 0;
    while($result = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
      $myExams[$index] = $result;
      $index++;
    }
    return $myExams;
  }
  /* Call this method to select all appointments where this netid is a involved */
  public static function getAppointments($netid){
    $q_getmyappointments =  "SELECT * FROM appointment a1 WHERE a1.netID=?";
    $myExams = array();
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $handle->beginTransaction();
    $statement = $handle->prepare($q_getmyappointments);
    if (!$statement){
      echo "<script type='text/javascript'>alert($errFindExam);</script>";
    }
    $statement->execute(array($netid));
    $index = 0;
    while($result = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
      $myExams[$index] = $result;
      $index++;
    }
    return $myExams;
  }

  /* Call this method to select all exams where this netid is a involved */
  public static function deleteExam($examID){
    echo '<script type="text/javascript">alert("Entered delete exam");</script>';
    echo '<script type="text/javascript">alert('.$examID.');</script>';

    $q_deletemyexam = "DELETE from exam where examID=?";
    $db = Database::getDatabase();
    $handle = $db->getHandle();
    $handle->beginTransaction();
    $statement = $handle->prepare($q_deletemyexam);
    if (!$statement){
      echo "<script type='text/javascript'>alert($errDeleteExam);</script>";
    }
    $statement->execute(array($examID));
    $handle->commit();
  }

}

?>
