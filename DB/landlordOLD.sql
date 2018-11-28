-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 12:20 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landlord`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `Continent` varchar(128) NOT NULL,
  `Country` varchar(128) NOT NULL,
  `State` varchar(128) DEFAULT NULL,
  `City` varchar(128) NOT NULL,
  `Zip` int(11) DEFAULT NULL,
  `StreetName` varchar(128) NOT NULL,
  `BuildingNumber` int(11) NOT NULL,
  `ApartmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ID`, `Timestamp`, `Continent`, `Country`, `State`, `City`, `Zip`, `StreetName`, `BuildingNumber`, `ApartmentID`) VALUES
(1, '2018-11-21', 'America', 'USA', 'Texas', 'Edinburg', 78504, 'North Street apt.1 ', 1, 1),
(2, '2018-11-23', 'America', 'USA', 'Texas', 'Edinburg', 78504, 'South Street apt. 2', 2, 2),
(3, '2018-11-01', 'America', 'USA', 'Texas', 'Edinburg', 78504, 'Main Street', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Private` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appliance`
--

CREATE TABLE `appliance` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `PropertyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `UserID` int(11) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Description` enum('general','tenant','landlord','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`ID`, `Timestamp`, `UserID`, `Email`, `Description`) VALUES
(1, '2018-11-01', 1, 'zChen@landlord.com', 'landlord'),
(2, '2018-11-02', 2, 'jGuerrero@tenant.com', 'tenant'),
(3, '2018-11-02', 3, 'bCancel@tenant.com', 'tenant'),
(4, '2018-11-02', 4, 'jReyes@tenant.com', 'tenant');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Found` date NOT NULL,
  `Repaired` date NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `limitation`
--

CREATE TABLE `limitation` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lives`
--

CREATE TABLE `lives` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `UserID` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `TenantRelation` varchar(128) NOT NULL,
  `Start` date NOT NULL,
  `End` date NOT NULL,
  `ActualEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `UserID` int(11) NOT NULL,
  `Send` tinyint(1) NOT NULL,
  `Receive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owed`
--

CREATE TABLE `owed` (
  `ID` int(11) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `ReceiverID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `DateDue` date NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Details` varchar(128) NOT NULL,
  `PaymentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `SenderID` int(11) NOT NULL,
  `ReceiverID` int(11) NOT NULL,
  `OwedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `UserID` int(11) NOT NULL,
  `Number` varchar(64) NOT NULL,
  `Description` enum('work','home','cell','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Link` varchar(128) NOT NULL,
  `Description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `LandlordID` int(11) NOT NULL,
  `AddressID` int(11) NOT NULL,
  `FPL` int(11) DEFAULT NULL COMMENT 'Floor Plan Link',
  `SquareFootage` int(11) NOT NULL,
  `Rooms` int(11) NOT NULL,
  `Bathrooms` int(11) NOT NULL,
  `Details` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`ID`, `Timestamp`, `LandlordID`, `AddressID`, `FPL`, `SquareFootage`, `Rooms`, `Bathrooms`, `Details`) VALUES
(1, '2018-11-23', 1, 1, NULL, 256, 2, 1, 'Basic two-room apartment.'),
(2, '2018-11-23', 1, 2, NULL, 324, 3, 2, 'Family sized apartment.');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `UserID` int(11) NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Start` date NOT NULL,
  `End` date DEFAULT NULL,
  `ActualEnd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`ID`, `Timestamp`, `UserID`, `PropertyID`, `Name`, `Start`, `End`, `ActualEnd`) VALUES
(3, '2018-11-20', 4, 1, 'Jafet Reyes', '2018-11-01', NULL, NULL),
(4, '2018-11-20', 2, 1, 'Jerry Guerrero', '2018-11-02', NULL, NULL),
(5, '2018-11-01', 3, 2, 'Bryan Cancel', '2018-11-14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FirstName` varchar(128) NOT NULL,
  `MiddleName` varchar(128) DEFAULT NULL,
  `LastName` varchar(128) NOT NULL,
  `HashedPassword` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Timestamp`, `FirstName`, `MiddleName`, `LastName`, `HashedPassword`) VALUES
(1, '2018-11-23 16:17:16', 'Zhixiang', NULL, 'Chen', '$2y$10$z3Irwx9vFQPuD6OckTjjU.ABguqddVy66TS2b2vjn8bqkuZV4H8nC'),
(2, '2018-11-23 16:14:53', 'Jerry', NULL, 'Guerrero', '$2y$10$zUA9KZ0nFzsIKMdskPhs..8Ujo6M3lssq5Vc00gCCabd.TwP1z/gS'),
(3, '2018-11-23 16:15:14', 'Bryan', NULL, 'Cancel', '$2y$10$14SljgkT4E0XqnobubyjHud3MFmW4iEM2xeRGcHk4kcoAol8XfZu2'),
(4, '2018-11-23 16:14:39', 'Jafet', NULL, 'Reyes', '$2y$10$O5PghuVN8GZCF7UorQULWOXGn5UmSvNBoasmSuRr6N155z9jOOspy');

-- --------------------------------------------------------

--
-- Table structure for table `utility`
--

CREATE TABLE `utility` (
  `ID` int(11) NOT NULL,
  `Timestamp` date NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Included` tinyint(1) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `appliance`
--
ALTER TABLE `appliance`
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `limitation`
--
ALTER TABLE `limitation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `lives`
--
ALTER TABLE `lives`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owed`
--
ALTER TABLE `owed`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PaymentID` (`PaymentID`),
  ADD KEY `ReceiverID` (`ReceiverID`),
  ADD KEY `SenderID` (`SenderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReceiverID` (`ReceiverID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `OwedID` (`OwedID`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AddressID` (`AddressID`),
  ADD KEY `LandlordID` (`LandlordID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PropertyID` (`PropertyID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utility`
--
ALTER TABLE `utility`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `amenity`
--
ALTER TABLE `amenity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `limitation`
--
ALTER TABLE `limitation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lives`
--
ALTER TABLE `lives`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owed`
--
ALTER TABLE `owed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utility`
--
ALTER TABLE `utility`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amenity`
--
ALTER TABLE `amenity`
  ADD CONSTRAINT `amenity_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`);

--
-- Constraints for table `appliance`
--
ALTER TABLE `appliance`
  ADD CONSTRAINT `appliance_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`);

--
-- Constraints for table `cost`
--
ALTER TABLE `cost`
  ADD CONSTRAINT `cost_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`);

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`);

--
-- Constraints for table `limitation`
--
ALTER TABLE `limitation`
  ADD CONSTRAINT `limitation_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`);

--
-- Constraints for table `lives`
--
ALTER TABLE `lives`
  ADD CONSTRAINT `lives_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `owed`
--
ALTER TABLE `owed`
  ADD CONSTRAINT `owed_ibfk_1` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`ID`),
  ADD CONSTRAINT `owed_ibfk_2` FOREIGN KEY (`ReceiverID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `owed_ibfk_3` FOREIGN KEY (`SenderID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ReceiverID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`SenderID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`OwedID`) REFERENCES `owed` (`ID`);

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `address` (`ID`),
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`LandlordID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`),
  ADD CONSTRAINT `tenant_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `utility`
--
ALTER TABLE `utility`
  ADD CONSTRAINT `utility_ibfk_1` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
