$(document).ready(function (){
  $("#content").load();
});

$('ul#snav li#nm a').click(function(){
  var page = $(this).attr('href');
  $('#indexContent').load(page)

  return false;
});

$('ul#anav li#nm a').click(function(){
  var page = $(this).attr('href');
  $('#indexContent').load(page)

  return false;
});

$('ul#fnav li#nm a').click(function(){
  var page = $(this).attr('href');
  $('#indexContent').load(page)

  return false;
});
