$(document).ready(function (){
  $("#content").load("student-landing.php");
});

$('a').click(function(){
  var page = $(this).attr('href');
  $('#content').load(page)

  return false;
});
