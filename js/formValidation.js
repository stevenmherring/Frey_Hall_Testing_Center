
function validateForm() {
    var gaptime = document.forms["adminEditCenterForm"]["gaptime"].value;
    var numberOfSeats = document.forms["adminEditCenterForm"]["numberOfSeats"].value;
    var inputSetasideSeats = document.forms["adminEditCenterForm"]["inputSetasideSeats"].value;
    var datePick_RangeClosedFrom = document.forms["adminEditCenterForm"]["datePick_RangeClosedFrom"].value;
    var datePick_RangeClosedTo = document.forms["adminEditCenterForm"]["datePick_RangeClosedTo"].value;
    var datePick_ReservedTimePeriodFrom = document.forms["adminEditCenterForm"]["datePick_ReservedTimePeriodFrom"].value;
    var datePick_ReservedTimePeriodTo = document.forms["adminEditCenterForm"]["datePick_ReservedTimePeriodTo"].value;
    var reminderChoice = document.forms["adminEditCenterForm"]["reminderChoice"].value;
                                var hours_openfrom = document.forms["adminEditCenterForm"]["hours_openfrom"].value;
                                    var hours_openuntil = document.forms["adminEditCenterForm"]["hours_openuntil"].value;
    if (gaptime == null || gaptime == "" || isNaN(gaptime)) {

        if (!isNaN(numberOfSeats)){
          alert("Gaptime must be a number");
        } else {
          alert("Gaptime must be filled out");
        }
        return false;
    } if (numberOfSeats == null || numberOfSeats == "" || isNaN(numberOfSeats)) {

        if (!isNaN(numberOfSeats)){
          alert("Number of seats must be a number");
        } else {
          alert("Number of seats must be filled out");
        }
        return false;
    }  if (hours_openfrom == null || hours_openfrom == "" || isNaN(hours_openfrom)) {

        if (!isNaN(hours_openfrom)){
          alert("Open from must be a number");
        } else {
          alert("Open from must be filled out");
        }
        return false;
    }  if (hours_openuntil == null || hours_openuntil == "" || isNaN(hours_openuntil)) {

        if (!isNaN(hours_openuntil)){
          alert("Closing hours  must be a number");
        } else {
          alert("Closing hours must be filled out");
        }
        return false;
    } if (inputSetasideSeats == null || inputSetasideSeats == "" || isNaN(inputSetasideSeats)) {

        if (!isNaN(inputSetasideSeats)){
          alert("Number of setasideseats must be a number");
        } else {
          alert("Number of SetasideSeats must be filled out");
        }
        return false;
    } if (datePick_RangeClosedFrom == null || datePick_RangeClosedFrom == "") {
        alert("Range closed from must be filled out");
        return false;
    } if (datePick_RangeClosedTo == null || datePick_RangeClosedTo == "") {
        alert("Range closed to must be filled out");
        return false;
    } if (datePick_ReservedTimePeriodFrom == null || datePick_ReservedTimePeriodFrom == "") {
        alert("Reserved time period from must be filled out");
        return false;
    } if (datePick_ReservedTimePeriodTo == null || datePick_ReservedTimePeriodTo == "") {
        alert("Reserved time period to must be filled out");
        return false;
    } if (reminderChoice == null || reminderChoice == "" || isNaN(reminderChoice)) {

        if (!isNaN(reminderChoice)){
          alert("Reminder Choice must be a number");
        } else {
          alert("Reminder Choice must be filled out");
        }
        return false;
    }
}
