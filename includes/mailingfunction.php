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
    $emailArray = Database::mailUsers($exam);
    foreach ($emaailArray as $email){
      // Our email server is currently configured as a POSTFIX server which is authenticating through gmail services.
      // The associated email address is duoqueueprogramming@gmail.com and this is where all of the emails will be sent through.
      // Using the gmail interface allows for all of our emails to be logged in two places -- using rsyslog and gmails sent log.
      // Information for the email server is stored in /etc/postfix/main.cf . The passwords and information are stored in sasl_passwd
      // You can reconfigure the password by using $postmap sasl_passwd and then $service postmap restart $service postfix restart
      // The mailing service itself can be run as a crontab job using $crontab -l

      $to      =  $email;
      $subject = 'Your scheduled exam reminder.';
      $message = 'You have an exam scheduled today at the Frey Hall Testing Center';
      $headers = 'From: duoqueueprogramming@gmail.com' . "\r\n" .
          'Reply-To: duoqueueprogramming@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);
    }
  }

?>
