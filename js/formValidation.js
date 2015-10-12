
function validateForm() {
    var numberOfSeats = document.forms["adminEditCenterForm"]["numberOfSeats"].value;
        var inputSetasideSeats = document.forms["adminEditCenterForm"]["inputSetasideSeats"].value;
            var datePick_RangeClosedFrom = document.forms["adminEditCenterForm"]["datePick_RangeClosedFrom"].value;
                var datePick_RangeClosedTo = document.forms["adminEditCenterForm"]["datePick_RangeClosedTo"].value;
                    var datePick_ReservedTimePeriodFrom = document.forms["adminEditCenterForm"]["datePick_ReservedTimePeriodFrom"].value;
                        var datePick_ReservedTimePeriodTo = document.forms["adminEditCenterForm"]["datePick_ReservedTimePeriodTo"].value;
                            var reminderChoice = document.forms["adminEditCenterForm"]["reminderChoice"].value;
    if (numberOfSeats == null || numberOfSeats == "") {
        alert("Number of seats must be filled out");
        return false;
    } if (inputSetasideSeats == null || inputSetasideSeats == "") {
        alert("Number of SetasideSeats must be filled out");
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
    } if (reminderChoice == null || reminderChoice == "") {
        alert("ReminderChoice must be filled out");
        return false;
    }
}
