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

$('ul#snav li a').click(function(){
  var page = $(this).attr('href');
  $('#scontent').load(page)

  return false;
});
$(document).ready(function (){
  $("#fcontent").load("faculty-classes.php");
});

$(document).ready(function (){
  $("#scontent").load("student-landing.php");
});
