$(document).ready(function (){
  $("#content").load("student-landing.php");
});

$('ul#snav li a').click(function(){
  var page = $(this).attr('href');
  $('#content').load(page)

  return false;
});

$(document).ready(function (){
  $("#fcontent").load("faculty-landing.php");
});

$('ul#fnav li a').click(function(){
  var page = $(this).attr('href');
  $('#fcontent').load(page)

  return false;
});
