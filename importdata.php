<div id="adminContent" class="facultyScheduleExamFormContainer" style="padding: 75px">
     <div >
         <form action="handle_forms.php" method="POST">
            Submit a User CSV <input type="file" id="user_form" name="user_form" accept=".csv"><br><br>
            Submit a Roster CSV <input type="file" id="roster_form" name="roster_form" accept=".csv"><br><br>
            Submit a Class CSV <input type="file"id="class_form"  name="class_form" accept=".csv"><br><br>
            <select class="combobox" name="term">
             <option value="">Select A Term</option>
              <option value="Fall15">Fall 2015</option>
              <option value="Spring16">Spring 2016</option>
              <option value="Fall16">Fall 2016</option>
            </select>
            <input type="submit" value="Submit">
        </form>
     </div>
 </div>
