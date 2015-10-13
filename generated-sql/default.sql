
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `firstName` VARCHAR(50) NOT NULL,
    `lastName` VARCHAR(50) NOT NULL,
    `netId` VARCHAR(24) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`netId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- class
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `class`;

CREATE TABLE `class`
(
    `classID` VARCHAR(11) NOT NULL,
    `subject` VARCHAR(3) NOT NULL,
    `catalogNumber` INTEGER(3) NOT NULL,
    `section` VARCHAR(3) NOT NULL,
    `InstructorNetID` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`classID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- roster
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `roster`;

CREATE TABLE `roster`
(
    `classID` VARCHAR(11) NOT NULL,
    `subject` VARCHAR(3) NOT NULL,
    `catalogNumber` INTEGER(3) NOT NULL,
    `section` VARCHAR(3) NOT NULL,
    `instructorNetID` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`classID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- freyHallTestingCenterRoom
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `freyHallTestingCenterRoom`;

CREATE TABLE `freyHallTestingCenterRoom`
(
    `numseats` INTEGER(3) NOT NULL,
    `numsetasideseats` INTEGER(3) NOT NULL,
    `hours_openfrom` INTEGER(4) NOT NULL,
    `hours_openuntil` INTEGER(4) NOT NULL,
    `gaptime` INTEGER(4) NOT NULL,
    `reminderInterval` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`numseats`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
