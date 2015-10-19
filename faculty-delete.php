<h3> Delete an Exam </h3>
<br>
<div class="facultyScheduleExamFormContainer">
<script type="text/javascript">
            function check()
            {
				var searchExamID = document.getElementById("examID").value;
				if(/^[a-zA-Z0-9]{6}$/.test(searchExamID))
				{
                    return true;
                }
				else{  
					alert('ExamID needs 6 characters'); 
                    
					return false;
				}
			}
        
		
		</script>	



<form action="deleteExam.php" method="post" onSubmit="return check();">

	<p>
    <label> Exam Identifier: </label><input type="text" id="examID" name="examID" value="" size="25" maxlength="50" />
    </p>
	<br>
	<input type="submit" name="submit" value="Delete this exam" />

</form>
</div>
