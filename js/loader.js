$(document).ready(function (){
  $("#content").load("student-landing.php");
});

$('ul#snav li a').click(function(){
  var page = $(this).attr('href');
  $('#content').load(page)

  return false;
});

$('ul#anav li a').click(function(){
  var page = $(this).attr('href');
  $('#adminContent').load(page)

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
