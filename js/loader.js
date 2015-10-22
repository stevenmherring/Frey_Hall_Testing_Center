$(document).ready(function (){
  $("#content").load("student-landing.php");
});

$('ul#snav li a').click(function(){
  var page = $(this).attr('href');
  $('#content').load(page)

  return false;
});

$(document).ready(function (){
  $("#adminContent").load("admin-editCenter.php");
});

$('ul#anav li a').click(function(){
  var page = $(this).attr('href');
  $('#adminContent').load(page)

  return false;
});

$('ul#fnav li a').click(function(){
  var page = $(this).attr('href');
  $('#fcontent').load(page)

  return false;
});

$(document).ready(function (){
  $("#fcontent").load("faculty-landing.php");
});

$(document).ready(function (){
  $("#datepicker").datepicker();
})


$(document).ready(function (){
  $('.datepicker').datepicker();
})
