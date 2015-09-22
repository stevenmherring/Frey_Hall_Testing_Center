$(document).ready(function (){
  $("#content").load("student-landing.php");
});

$('ul#snav li a').click(function(){
  var page = $(this).attr('href');
  $('#content').load(page)

  return false;
});
