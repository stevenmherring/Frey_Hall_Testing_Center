<?php
include_once('classes/User.php');
    $examID = $_POST['examtodelete'];
    echo "<script type='text/javascript'>alert('$examID');</script>";
    User::deleteExam($examID);
?>
