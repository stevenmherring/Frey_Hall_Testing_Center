
// Used clicked delete stop button
function cancel_pending_exam_clicked(id) {
  document.getElementById('cancel_exampending_id').value = id;
}


//Used clicked delete stop button
function handle_cancel_exam(form, exam) {
//  alert('Handle cancel exam');
  //alert(document.getElementById('cancel_exampending_id').value);
  var p = document.createElement("input");
  form.appendChild(p);
  p.name = "p";
  p.type = 'hidden';
  p.value = exam;

  form.submit();
  //document.getElementById("cancel_pending_form").submit();

}