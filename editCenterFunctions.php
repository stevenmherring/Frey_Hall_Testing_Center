<?php
  include("dbQueries.php");

  function initializeRoom($roomname) {

    $createRowQuery = $q_createrow_testingcenterroom;
    $createRowsuccess = $dbh->prepare($query);
    $createRowsuccess->execute(array($roomname));
    if (!$createRowsuccess){
      $error = "Something went wrong. Rolling back.";
      echo "<script type='text/javascript'>alert('$message');</script>";
      $dbh->rollback();
      $dbh = null;
      return;
    }
}
?>
