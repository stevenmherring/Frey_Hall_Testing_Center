<?php
$q_view_room = "DESCRIBE freyHallTestingCenterRoom";
$q_equipment_resetbid="update Equipment set BusID='' where BusID=?";
$q_edit_seats = "UPDATE freyHallTestingCenterRoom set numseats = ?;";
$q_edit_numsetasideseats =  "UPDATE freyHallTestingCenterRoom set numsetasideseats = ?;";
$q_edit_hours_openfrom =  "UPDATE freyHallTestingCenterRoom set hours_openfrom = ?;";
$q_edit_hours_openuntil =  "UPDATE freyHallTestingCenterRoom set hours_openuntil = ?;";
$q_edit_gaptime =  "UPDATE freyHallTestingCenterRoom set gaptime = ?;";
$q_edit_reminderInterval =  "UPDATE freyHallTestingCenterRoom set reminderInterval = ?;";
$transactionLogging = "INSERT INTO administratortransactionlog (userID,transactiontype,transactiontime,transactioncontent)VALUES(?,?,?,?)";


$q_createrow_testingcenterroom = "INSERT IGNORE INTO freyHallTestingCenterRoom (roomname) values (?)";
/* Create the administratortransactionlog
CREATE TABLE administratortransactionlog (
userID VARCHAR(15) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
transactiontype VARCHAR(15) NOT NULL,
transactiontime VARCHAR(15) NOT NULL,
transactioncontent VARCHAR(50) NOT NULL
)
*/
?>
