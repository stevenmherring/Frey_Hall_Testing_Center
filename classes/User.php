<?php

/*
 * Testing Center Class
 */
include_once('Database.php');
include_once('Error.php');
class User {



  /* Call this method to select all exams where this netid is a involved */
  public static function getExams($netid){
    $q_getmyexams = "SELECT * from roster r1 JOIN exam c1 JOIN members m1 ON c1.classID = r1.classID where m1.netID=?";
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
