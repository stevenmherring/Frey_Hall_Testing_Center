<?php
include_once('classes/Authentication.php');
include_once('classes/Database.php');
include_once('classes/User.php');
include_once('classes/Error.php');
$db = Database::getDatabase();
Authentication::sec_session_start();
if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 0) :

  $q_checkin = "UPDATE exam SET processed="accepted" where examID=?";
  $handle = $db->getHandle();
  $handle->beginTransaction();
  $result = $handle->prepare($q_checkin);

  if (!$result){
    echo "<script type='text/javascript'>alert('errUpdate');</script>";
  }
  $result->execute(array($_POST[examid]);
  $handle->commit();
  if ($result){
    echo '<script type="text/javascript">alert("Exam acceptance succeeded")</script>';
  } else {
    echo '<script type="text/javascript">alert("Exam acceptance failed")</script>';
  }
 ?>

<?php else : echo '<script type="text/javascript">alert("Not authorized")</script>'; header('Location: access-error.php'); ?>
<?php endif; ?>
