-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 11:53 PM
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
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `ID` int(11) NOT NULL,
  `Landlord_ID` int(10) UNSIGNED NOT NULL,
  `Occupied` tinyint(1) NOT NULL,
  `Zone_ID` int(11) NOT NULL,
  `Street` varchar(128) NOT NULL,
  `City` varchar(128) NOT NULL,
  `Zip` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE `landlord` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Email` varchar(56) NOT NULL,
  `Stripe_User_ID` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Landlord_ID` int(10) UNSIGNED NOT NULL,
  `Date_Paid` date NOT NULL,
  `Date_Due` date NOT NULL,
  `Payment_Due` int(11) NOT NULL,
  `Payment_Amount` int(11) NOT NULL,
  `Complete` tinyint(1) NOT NULL,
  `Tenant_ID` int(10) UNSIGNED NOT NULL,
  `Late` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Email` varchar(56) NOT NULL,
  `Phone` varchar(56) NOT NULL,
  `Apartment_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Username` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Created_At` date NOT NULL,
  `First_Name` varchar(128) NOT NULL,
  `Last_Name` varchar(128) NOT NULL,
  `User_Type` int(11) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Phone` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Created_At`, `First_Name`, `Last_Name`, `User_Type`, `Email`, `Phone`) VALUES
(1, 'ZChen', 'zchenPass', '2018-11-20', 'Zhixiang', 'Chen', 1, 'Z@Chen.com', '123-456-7890'),
(2, 'JReyes', 'jreyesPass', '2018-11-20', 'Jafet', 'Reyes', 2, 'jafet.reyes01@utrgv.edu', '956-123-456'),
(3, 'JGuerrero', 'jguerreroPass', '2018-11-20', 'Jerry', 'Guerrero', 2, 'gerardo.guerrero02@utrgv.edu', '956-789-456'),
(4, 'BCancel', 'bcancelPass', '2018-11-20', 'Bryan', 'Cancel', 2, 'bryan.o.cancel@gmail.com', '956-456-123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Landlord_ID` (`Landlord_ID`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `Landlord_ID` (`Landlord_ID`),
  ADD KEY `Tenant_ID` (`Tenant_ID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`Landlord_ID`) REFERENCES `landlord` (`ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Landlord_ID`) REFERENCES `landlord` (`ID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`Tenant_ID`) REFERENCES `tenant` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
