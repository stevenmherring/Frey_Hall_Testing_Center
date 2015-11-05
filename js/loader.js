$(document).ready(function (){
  $("#content").load();
});

$('ul#snav li a').click(function(){
  var page = $(this).attr('href');
  $('#studentContent').load(page)

  return false;
});

$('ul#anav li a').click(function(){
  var page = $(this).attr('href');
  $('#adminContent').load(page)

  return false;
});

$('ul#fnav li a').click(function(){
  var page = $(this).attr('href');
  $('#facultyContent').load(page)

  return false;
});
