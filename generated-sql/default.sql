
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- address
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `Continent` VARCHAR(128) NOT NULL,
    `Country` VARCHAR(128) NOT NULL,
    `State` VARCHAR(128),
    `City` VARCHAR(128) NOT NULL,
    `Zip` INTEGER,
    `StreetName` VARCHAR(128) NOT NULL,
    `BuildingNumber` INTEGER NOT NULL,
    `ApartmentID` INTEGER,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- amenity
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `amenity`;

CREATE TABLE `amenity`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Name` VARCHAR(56) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    `Private` TINYINT(1) NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `PropertyID` (`PropertyID`),
    CONSTRAINT `amenity_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- appliance
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `appliance`;

CREATE TABLE `appliance`
(
    `ID` INTEGER NOT NULL,
    `Timestamp` DATE NOT NULL,
    `Name` VARCHAR(128) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    INDEX `PropertyID` (`PropertyID`),
    CONSTRAINT `appliance_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- authentication
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `authentication`;

CREATE TABLE `authentication`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `Email` VARCHAR(128) NOT NULL,
    `Password` VARCHAR(128) NOT NULL,
    `UserID` INTEGER NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cost
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cost`;

CREATE TABLE `cost`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Name` VARCHAR(56) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    `Cost` INTEGER NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `PropertyID` (`PropertyID`),
    CONSTRAINT `cost_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- email
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `email`;

CREATE TABLE `email`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `UserID` INTEGER NOT NULL,
    `Email` VARCHAR(128) NOT NULL,
    `Description` enum('general','tenant','landlord',''),
    PRIMARY KEY (`ID`),
    INDEX `UserID` (`UserID`),
    CONSTRAINT `email_ibfk_1`
        FOREIGN KEY (`UserID`)
        REFERENCES `user` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- fee
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `fee`;

CREATE TABLE `fee`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Name` VARCHAR(56) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    `Cost` INTEGER NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- issue
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `issue`;

CREATE TABLE `issue`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Name` VARCHAR(56) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    `Found` DATE NOT NULL,
    `Repaired` DATE NOT NULL,
    `Cost` INTEGER NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `PropertyID` (`PropertyID`),
    CONSTRAINT `issue_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- limitation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `limitation`;

CREATE TABLE `limitation`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Name` VARCHAR(56) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `PropertyID` (`PropertyID`),
    CONSTRAINT `limitation_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- lives
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lives`;

CREATE TABLE `lives`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `UserID` INTEGER NOT NULL,
    `Name` VARCHAR(128) NOT NULL,
    `TenantRelation` VARCHAR(128) NOT NULL,
    `Start` DATE NOT NULL,
    `End` DATE NOT NULL,
    `ActualEnd` DATE NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `UserID` (`UserID`),
    CONSTRAINT `lives_ibfk_1`
        FOREIGN KEY (`UserID`)
        REFERENCES `user` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- money
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `money`;

CREATE TABLE `money`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `UserID` INTEGER NOT NULL,
    `Send` TINYINT(1) NOT NULL,
    `Receive` TINYINT(1) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- owed
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `owed`;

CREATE TABLE `owed`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` INTEGER NOT NULL,
    `SenderID` INTEGER NOT NULL,
    `ReceiverID` INTEGER NOT NULL,
    `Amount` INTEGER NOT NULL,
    `DateDue` DATE NOT NULL,
    `Name` VARCHAR(56) NOT NULL,
    `Details` VARCHAR(128) NOT NULL,
    `PaymentID` INTEGER,
    PRIMARY KEY (`ID`),
    INDEX `PaymentID` (`PaymentID`),
    INDEX `ReceiverID` (`ReceiverID`),
    INDEX `SenderID` (`SenderID`),
    CONSTRAINT `owed_ibfk_1`
        FOREIGN KEY (`PaymentID`)
        REFERENCES `payment` (`ID`),
    CONSTRAINT `owed_ibfk_2`
        FOREIGN KEY (`ReceiverID`)
        REFERENCES `user` (`ID`),
    CONSTRAINT `owed_ibfk_3`
        FOREIGN KEY (`SenderID`)
        REFERENCES `user` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- payment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `SenderID` INTEGER NOT NULL,
    `ReceiverID` INTEGER NOT NULL,
    `OwedID` INTEGER NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `ReceiverID` (`ReceiverID`),
    INDEX `SenderID` (`SenderID`),
    INDEX `OwedID` (`OwedID`),
    CONSTRAINT `payment_ibfk_1`
        FOREIGN KEY (`ReceiverID`)
        REFERENCES `user` (`ID`),
    CONSTRAINT `payment_ibfk_2`
        FOREIGN KEY (`SenderID`)
        REFERENCES `user` (`ID`),
    CONSTRAINT `payment_ibfk_3`
        FOREIGN KEY (`OwedID`)
        REFERENCES `owed` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phone
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phone`;

CREATE TABLE `phone`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `UserID` INTEGER NOT NULL,
    `Number` VARCHAR(64) NOT NULL,
    `Description` enum('work','home','cell','') NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `UserID` (`UserID`),
    CONSTRAINT `phone_ibfk_1`
        FOREIGN KEY (`UserID`)
        REFERENCES `user` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- picture
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `picture`;

CREATE TABLE `picture`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Link` VARCHAR(128) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `PropertyID` (`PropertyID`),
    CONSTRAINT `picture_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- property
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `property`;

CREATE TABLE `property`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `LandlordID` INTEGER NOT NULL,
    `AddressID` INTEGER NOT NULL,
    `FPL` INTEGER,
    `SquareFootage` INTEGER NOT NULL,
    `Rooms` INTEGER NOT NULL,
    `Bathrooms` INTEGER NOT NULL,
    `Details` VARCHAR(256),
    PRIMARY KEY (`ID`),
    INDEX `AddressID` (`AddressID`),
    INDEX `LandlordID` (`LandlordID`),
    CONSTRAINT `property_ibfk_1`
        FOREIGN KEY (`AddressID`)
        REFERENCES `address` (`ID`),
    CONSTRAINT `property_ibfk_2`
        FOREIGN KEY (`LandlordID`)
        REFERENCES `user` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tenant
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tenant`;

CREATE TABLE `tenant`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `UserID` INTEGER NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Name` VARCHAR(128) NOT NULL,
    `Start` DATE NOT NULL,
    `End` DATE,
    `ActualEnd` DATE,
    PRIMARY KEY (`ID`),
    INDEX `PropertyID` (`PropertyID`),
    INDEX `UserID` (`UserID`),
    CONSTRAINT `tenant_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`),
    CONSTRAINT `tenant_ibfk_2`
        FOREIGN KEY (`UserID`)
        REFERENCES `user` (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `FirstName` VARCHAR(128) NOT NULL,
    `MiddleName` VARCHAR(128),
    `LastName` VARCHAR(128) NOT NULL,
    `HashedPassword` VARCHAR(256) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- utility
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `utility`;

CREATE TABLE `utility`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Timestamp` DATE NOT NULL,
    `PropertyID` INTEGER NOT NULL,
    `Name` VARCHAR(56) NOT NULL,
    `Description` VARCHAR(128) NOT NULL,
    `Included` TINYINT(1) NOT NULL,
    `Cost` INTEGER NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `PropertyID` (`PropertyID`),
    CONSTRAINT `utility_ibfk_1`
        FOREIGN KEY (`PropertyID`)
        REFERENCES `property` (`ID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
