
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
    `continentTypeID` INTEGER NOT NULL,
    `countryTypeID` INTEGER NOT NULL,
    `state` TEXT,
    `locality` TEXT,
    `zipCode` TEXT,
    `streetName` TEXT,
    `buildingIndentifier` TEXT,
    `apartmentIdentifier` TEXT,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- amenity
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `amenity`;

CREATE TABLE `amenity`
(
    `amenityNumberID` INTEGER NOT NULL AUTO_INCREMENT,
    `propertyID` INTEGER NOT NULL,
    `amenityTypeID` INTEGER NOT NULL,
    `details` TEXT,
    PRIMARY KEY (`amenityNumberID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- amenitytype
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `amenitytype`;

CREATE TABLE `amenitytype`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` TEXT NOT NULL,
    `useCount` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- appliance
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `appliance`;

CREATE TABLE `appliance`
(
    `applianceNumberID` INTEGER NOT NULL AUTO_INCREMENT,
    `propertyID` INTEGER NOT NULL,
    `applianceTypeID` INTEGER NOT NULL,
    `details` TEXT,
    PRIMARY KEY (`applianceNumberID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- appliancetype
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `appliancetype`;

CREATE TABLE `appliancetype`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` TEXT NOT NULL,
    `useCount` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- continenttype
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `continenttype`;

CREATE TABLE `continenttype`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` TEXT NOT NULL,
    `useCount` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- countrytype
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `countrytype`;

CREATE TABLE `countrytype`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` TEXT NOT NULL,
    `useCount` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- issue
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `issue`;

CREATE TABLE `issue`
(
    `issueNumberID` INTEGER NOT NULL AUTO_INCREMENT,
    `propertyID` INTEGER NOT NULL,
    `name` TEXT NOT NULL,
    `details` TEXT,
    `foundDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `repairDate` DATETIME,
    PRIMARY KEY (`issueNumberID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- perk
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `perk`;

CREATE TABLE `perk`
(
    `perkNumberID` INTEGER NOT NULL AUTO_INCREMENT,
    `propertyID` INTEGER NOT NULL,
    `perkTypeID` INTEGER NOT NULL,
    `details` TEXT,
    PRIMARY KEY (`perkNumberID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- perktype
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `perktype`;

CREATE TABLE `perktype`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` TEXT NOT NULL,
    `useCount` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phone
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phone`;

CREATE TABLE `phone`
(
    `phoneNumberID` INTEGER NOT NULL AUTO_INCREMENT,
    `userID` INTEGER NOT NULL,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `areaCode` TEXT NOT NULL,
    `number` TEXT NOT NULL,
    `extension` TEXT,
    `description` TEXT,
    PRIMARY KEY (`phoneNumberID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- picture
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `picture`;

CREATE TABLE `picture`
(
    `pictureNumberID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `propertyID` INTEGER NOT NULL,
    `link` TEXT NOT NULL,
    `details` TEXT,
    PRIMARY KEY (`pictureNumberID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- property
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `property`;

CREATE TABLE `property`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addressID` INTEGER NOT NULL,
    `userID` INTEGER NOT NULL,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `lastUpdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `postName` TEXT NOT NULL,
    `available` TINYINT(1) DEFAULT 0 NOT NULL,
    `expectedRentPerMonth` DOUBLE NOT NULL,
    `squareFootage` INTEGER NOT NULL,
    `bedroomCount` INTEGER NOT NULL,
    `bathroomCount` INTEGER NOT NULL,
    `details` TEXT,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `email` TEXT NOT NULL,
    `encryptedPassword` TEXT NOT NULL,
    `name` TEXT NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- utility
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `utility`;

CREATE TABLE `utility`
(
    `utilityNumberID` INTEGER NOT NULL AUTO_INCREMENT,
    `propertyID` INTEGER NOT NULL,
    `utilityTypeID` INTEGER NOT NULL,
    `details` TEXT,
    `available` TINYINT(1) DEFAULT 1 NOT NULL,
    `includedInRent` TINYINT(1) DEFAULT 1 NOT NULL,
    `expectedCostPerMonth` DOUBLE DEFAULT 0 NOT NULL,
    PRIMARY KEY (`utilityNumberID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- utilitytype
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `utilitytype`;

CREATE TABLE `utilitytype`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `addDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` TEXT NOT NULL,
    `useCount` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
