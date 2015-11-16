
// Used clicked delete stop button
function cancel_pending_exam_clicked(id) {
  document.getElementById('cancel_exampending_id').value = id;
}


//Used clicked cancel exam button
function cancel_exam(exam){

  /* Old code, was using a modal to post onto a page. Deprecated @5b5e3ecd7c7b242395f29c7146f63ec86a9260f2 for SPA.
  var p = document.createElement("input");
  form.appendChild(p);
  p.name = "p";
  p.type = 'hidden';
  p.value = exam;

  form.submit();
  */
  var dataToPost = $("#cancel_pending").serialize();
  $.ajax({
      type: 'POST',
      url: 'facultyexamdelete.php',
      data: {
        'examtodelete' : exam,
        },
      success: function(data) {
          /* Reload exams */
          var page = "faculty-exams.php";
          $('#facultyContent').load(page)
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
          if (textStatus == 'Unauthorized') {
              alert('Unauthorized page post. Error: ' + errorThrown);
          } else {
              alert('Something went wrong. We dont have anything cool to show here. Error: ' + errorThrown);
          }
      }
  });

}

//Used clicked view appointments for exam
function view_exam_appts(examIDforAppt) {
    //document.getElementById('examtoviewattendance').value = examIDforAppt;

  jQuery( function(){
    jQuery(".modal-attendance_details").html("<p>Loading Please wait...</p>");
    jQuery(".modal-attendance_details").load('../modalcontentsTable.php', {examID : examIDforAppt});//url to contents.php
  });


}
