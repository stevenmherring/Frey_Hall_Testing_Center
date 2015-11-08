
function view_student_appts(netID) {

jQuery( function(){
  jQuery("#adminContent").load('../admin-getappts.php', {netID : netID});//url to contents.php
});
}
