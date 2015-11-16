
function view_student_appts(netID) {

jQuery( function(){
  jQuery("#adminContent").load('../admin-getappts.php', {netID : netID});//url to contents.php
});
}

function checkInStudent(netID,apptID) {
        $.ajax({
            type: 'POST',
            url: 'checkin.php',
            data: {
              'netid' : netID,
              'apptid' : apptID,
            },
            success: function(data) {
                /* Do nothing */
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                if (textStatus == 'Unauthorized') {
                    alert('Unauthorized page post. Error: ' + errorThrown);
                } else {
                    alert('Something went wrong. We dont have anything cool to show here. Error: ' + errorThrown);
                }
            }
        });
}
