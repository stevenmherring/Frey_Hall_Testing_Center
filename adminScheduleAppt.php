<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Frey Hall Testing Center</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    
</head>
<body>
    <?php
    include_once('classes/Authentication.php');
    include_once('classes/Database.php');
    $db = Database::getDatabase();
    Authentication::sec_session_start();
    if (Authentication::login_check($db->getMysqli()) == true && $_SESSION['auth'] == 0) : ?>
    
    <div id="adminContent" class="facultyScheduleExamFormContainer" >
        <h3>Create Appt</h3>
        
    <div style=height:500px>
    
        <form action="adminScheduleAppt2.php" method="post" onSubmit="return check();">
            <p>
                <label> What is the student's Net ID: </label><input type="text" id="apptNetID" name="apptNetID" value="" maxlength="50" required/>
            </p>
            <input type="submit" name="submit" value="Next" />
            </form>
    </div>
         </div>
    <?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
</body>
</html>

