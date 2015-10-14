<?php
  include_once 'includes/db_connect.php';
  include_once 'includes/loginfunctions.php';
  sec_session_start();

  if (login_check($mysqli) == true) {
      $logged = 'in';
  } else {
      $logged = 'out';
  }
?>

<?php if (login_check($mysqli) == true) : ?>
<h3>Create An Exam</h3>

<!-- Faculty Landing Page CSS -->
<link href="css/faculty-landing.css" rel="stylesheet">

<div class="facultyScheduleExamFormContainer">
<script type="text/javascript">
            function check()
            {
                var searchExamID = document.getElementById("examID").value;
                var searchCourseID = document.getElementById("courseID").value;
				var searchProfessorID = document.getElementById("professorID").value;
				var searchExamDuration = document.getElementById("examDuration").value;
				var searchStartDate = document.getElementById("startDate").value;
				var searchStartTime = document.getElementById("startTime").value;
				var searchEndDate = document.getElementById("endDate").value;
				var searchEndTime = document.getElementById("endTime").value;

				if(/^[a-zA-Z0-9]{6}$/.test(searchExamID) && /^[a-zA-Z0-9]{6}$/.test(searchCourseID)
					&& /^[0-9]{9}$/.test(searchProfessorID) && /^[0-9]{1,3}$/.test(searchExamDuration)
					&& /^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/.test(searchStartDate)
					&& /^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/.test(searchStartTime)
					&& /^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/.test(searchEndDate)
					&& /^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/.test(searchEndTime))
				{
                    return true;
                }
				else{
					alert('ExamID needs 6 characters \nCourseID needs 6 characters\nProfessorID needs 9 numbers \nExamDuration needs 1-3 numbers\nStart Date needs to be in yyyy-mm-dd form\nStart Time needs to be in hh:mm:ss form\nEnd Date needs to be in yyyy-mm-dd form\nEnd Time needs to be in hh:mm:ss form');

					return false;
				}
			}
        </script>



<form action="createExam.php" method="post" onSubmit="return check();">
	<p>
    <label> Exam Identifier: </label><input type="text" id="examID" name="examID" value="" size="25" maxlength="50" />
    </p>
    <p>
    <label> Course Identifier: </label><input type="text" id="courseID" name="courseID" value="" size="25" maxlength="50" />
    </p>
	<p>
    <label> ProfessorID: </label><input type="text" id="professorID" name="professorID" value="" size="25" maxlength="50" />
    </p>
    <p>
    <label> Exam Duration: </label><input type="text" id="examDuration" name="examDuration" value="" size="25" maxlength="50" />
    </p>
    <p>
    <label> Start date: </label><input type="text" id="startDate" name="startDate" value="" size="25" maxlength="50" />
    </p>
    <p>
    <label> Start time:  </label><input type="text" id="startTime"  name="startTime" value="" size="25" maxlength="50" />
    </p>
    <p>
    <label> End date: </label><input type="text" id="endDate" name="endDate" value="" size="25" maxlength="50" />
    </p>
   <p>
    <label> End time:  </label><input type="text" id="endTime" name="endTime" value="" size="25" maxlength="50" />
    </p>
    <input type="submit" name="submit" value="Schedule this exam" />
</form>
</div>
<?php else : header('Location: access-error.php'); ?>
<?php endif; ?>
