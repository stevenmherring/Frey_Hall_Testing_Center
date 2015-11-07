<?php
  /* TO DO - Steve Chin WINDOWS CRON JOB
   * This function requires two arguments posted into it.
   * $_POST['button_pressed'] as non null
   * $_POST[$examDate] needs to contain the string for when their exam is
   */
  // Code to use
  /*if(isset($_POST['button_pressed']))
  {
      $to      = 'triplefirstnames@gmail.com';
      $subject = 'Your exam is coming up !';
      $message = 'You have an exam on' . $_POST[$examDate];
      $headers = 'From: duoqueueprogramming@gmail.com' . "\r\n" .
          'Reply-To: duoqueueprogramming@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        $success = mail($to, $subject, $message, $headers);
      echo $success;
  }
  */
  include_once('../classes/Database.php');
  include_once('../classes/TestingCenter.php')
  // Linux cron job

  // Figure out todays date
  $today = getdate();
  $year = $today['year'];
  $month = $today['mon'];
  $monthday = $today['mday'];
  // Put todays date in YYYY-MM-DD format
  $todaysDate = $year . $month . $monthday;
  // Get all of the exams on this date
  $arrayOfExams = TestingCenter::getExamsOnDate($todaysDate);

  foreach ($arrayOfExams as $exam){
    // Email all of the class members that have an exam on todays date
    Database::mailUsers($exam);
  }

?>
