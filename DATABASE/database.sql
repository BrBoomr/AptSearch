-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 04:34 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `ID` int(11) NOT NULL,
  `continentTypeID` int(11) NOT NULL,
  `countryTypeID` int(11) NOT NULL,
  `state` text,
  `locality` text,
  `zipCode` text,
  `streetName` text,
  `buildingIndentifier` text,
  `apartmentIdentifier` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ID`, `continentTypeID`, `countryTypeID`, `state`, `locality`, `zipCode`, `streetName`, `buildingIndentifier`, `apartmentIdentifier`) VALUES
(1, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '1', '1'),
(2, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '1', '2'),
(3, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '1', '3'),
(4, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '2', '1'),
(5, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '2', '2'),
(6, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '2', '3'),
(7, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '3', '1'),
(8, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '3', '2'),
(9, 1, 321, 'Texas', 'Mission', '78572', 'Main Street', '3', '3'),
(10, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '1', '1'),
(11, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '1', '2'),
(12, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '1', '3'),
(13, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '2', '1'),
(14, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '2', '2'),
(15, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '2', '3'),
(16, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '3', '1'),
(17, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '3', '2'),
(18, 1, 321, 'Texas', 'Mission', '78572', 'North Street', '3', '3'),
(19, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '1', '1'),
(20, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '1', '2'),
(21, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '1', '3'),
(22, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '2', '1'),
(23, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '2', '2'),
(24, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '2', '3'),
(25, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '3', '1'),
(26, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '3', '2'),
(27, 1, 321, 'Texas', 'Mission', '78572', 'South Street', '3', '3'),
(28, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '1', '1'),
(29, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '1', '2'),
(30, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '1', '3'),
(31, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '2', '1'),
(32, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '2', '2'),
(33, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '2', '3'),
(34, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '3', '1'),
(35, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '3', '2'),
(36, 1, 321, 'Texas', 'Mission', '78572', 'East Street', '3', '3'),
(37, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '1', '1'),
(38, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '1', '2'),
(39, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '1', '3'),
(40, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '2', '1'),
(41, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '2', '2'),
(42, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '2', '3'),
(43, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '3', '1'),
(44, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '3', '2'),
(45, 1, 321, 'Texas', 'Mission', '78572', 'West Street', '3', '3'),
(69, 1, 321, 'Test State', 'Test City', '12345', 'Test Street', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `amenityNumberID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `amenityTypeID` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`amenityNumberID`, `propertyID`, `amenityTypeID`, `details`) VALUES
(1, 1, 1, NULL),
(2, 2, 2, NULL),
(3, 3, 3, NULL),
(4, 4, 4, NULL),
(5, 5, 5, NULL),
(6, 6, 6, NULL),
(7, 7, 7, NULL),
(8, 8, 8, NULL),
(9, 9, 9, NULL),
(10, 10, 10, NULL),
(11, 11, 11, NULL),
(12, 12, 12, NULL),
(13, 13, 13, NULL),
(14, 14, 14, NULL),
(15, 15, 15, NULL),
(16, 16, 1, NULL),
(17, 17, 2, NULL),
(18, 18, 3, NULL),
(19, 19, 4, NULL),
(20, 20, 5, NULL),
(21, 21, 6, NULL),
(22, 22, 7, NULL),
(23, 23, 8, NULL),
(24, 24, 9, NULL),
(25, 25, 10, NULL),
(26, 26, 11, NULL),
(27, 27, 12, NULL),
(28, 28, 13, NULL),
(29, 29, 14, NULL),
(30, 30, 15, NULL),
(31, 31, 1, NULL),
(32, 32, 2, NULL),
(33, 33, 3, NULL),
(34, 34, 4, NULL),
(35, 35, 5, NULL),
(36, 36, 6, NULL),
(37, 37, 7, NULL),
(38, 38, 8, NULL),
(39, 39, 9, NULL),
(40, 40, 10, NULL),
(41, 41, 11, NULL),
(42, 42, 12, NULL),
(43, 43, 13, NULL),
(44, 44, 14, NULL),
(45, 45, 15, NULL),
(46, 69, 1, NULL),
(47, 1, 2, NULL),
(48, 2, 3, NULL),
(49, 3, 4, NULL),
(50, 4, 5, NULL),
(51, 5, 6, NULL),
(52, 6, 7, NULL),
(53, 7, 8, NULL),
(54, 8, 9, NULL),
(55, 9, 10, NULL),
(56, 10, 11, NULL),
(57, 11, 12, NULL),
(58, 12, 13, NULL),
(59, 13, 14, NULL),
(60, 14, 15, NULL),
(61, 15, 1, NULL),
(62, 16, 2, NULL),
(63, 17, 3, NULL),
(64, 18, 4, NULL),
(65, 19, 5, NULL),
(66, 20, 6, NULL),
(67, 21, 7, NULL),
(68, 22, 8, NULL),
(69, 23, 9, NULL),
(70, 24, 10, NULL),
(71, 25, 11, NULL),
(72, 26, 12, NULL),
(73, 27, 13, NULL),
(74, 28, 14, NULL),
(75, 29, 15, NULL),
(76, 30, 1, NULL),
(77, 31, 2, NULL),
(78, 32, 3, NULL),
(79, 33, 4, NULL),
(80, 34, 5, NULL),
(81, 35, 6, NULL),
(82, 36, 7, NULL),
(83, 37, 8, NULL),
(84, 38, 9, NULL),
(85, 39, 10, NULL),
(86, 40, 11, NULL),
(87, 41, 12, NULL),
(88, 42, 13, NULL),
(89, 43, 14, NULL),
(90, 44, 15, NULL),
(91, 45, 1, NULL),
(92, 69, 2, NULL),
(93, 1, 3, NULL),
(94, 2, 4, NULL),
(95, 3, 5, NULL),
(96, 4, 6, NULL),
(97, 5, 7, NULL),
(98, 6, 8, NULL),
(99, 7, 9, NULL),
(100, 8, 10, NULL),
(101, 9, 11, NULL),
(102, 10, 12, NULL),
(103, 11, 13, NULL),
(104, 12, 14, NULL),
(105, 13, 15, NULL),
(106, 14, 1, NULL),
(107, 15, 2, NULL),
(108, 16, 3, NULL),
(109, 17, 4, NULL),
(110, 18, 5, NULL),
(111, 19, 6, NULL),
(112, 20, 7, NULL),
(113, 21, 8, NULL),
(114, 22, 9, NULL),
(115, 23, 10, NULL),
(116, 24, 11, NULL),
(117, 25, 12, NULL),
(118, 26, 13, NULL),
(119, 27, 14, NULL),
(120, 28, 15, NULL),
(121, 29, 1, NULL),
(122, 30, 2, NULL),
(123, 31, 3, NULL),
(124, 32, 4, NULL),
(125, 33, 5, NULL),
(126, 34, 6, NULL),
(127, 35, 7, NULL),
(128, 36, 8, NULL),
(129, 37, 9, NULL),
(130, 38, 10, NULL),
(131, 39, 11, NULL),
(132, 40, 12, NULL),
(133, 41, 13, NULL),
(134, 42, 14, NULL),
(135, 43, 15, NULL),
(136, 44, 1, NULL),
(137, 45, 2, NULL),
(138, 69, 3, NULL),
(139, 1, 4, NULL),
(140, 2, 5, NULL),
(141, 3, 6, NULL),
(142, 4, 7, NULL),
(143, 5, 8, NULL),
(144, 6, 9, NULL),
(145, 7, 10, NULL),
(146, 8, 11, NULL),
(147, 9, 12, NULL),
(148, 10, 13, NULL),
(149, 11, 14, NULL),
(150, 12, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `amenitytype`
--

CREATE TABLE `amenitytype` (
  `ID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `useCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenitytype`
--

INSERT INTO `amenitytype` (`ID`, `addDate`, `name`, `useCount`) VALUES
(1, '2018-12-06 07:13:23', 'Pool', 0),
(2, '2018-12-06 07:13:23', 'Gym', 0),
(3, '2018-12-06 07:13:48', 'Laundromat', 0),
(4, '2018-12-06 07:13:48', 'Game Room', 0),
(5, '2018-12-06 07:14:02', 'Playground', 0),
(6, '2018-12-06 07:14:02', 'Jogging Trail', 0),
(7, '2018-12-09 20:33:05', 'Pet Play Area', 0),
(8, '2018-12-09 20:33:12', 'Pet Washing Station', 0),
(9, '2018-12-09 20:33:18', 'Car Wash Area', 0),
(10, '2018-12-09 20:33:33', 'Coffee Bar', 0),
(11, '2018-12-09 20:33:40', 'Clubhouse', 0),
(12, '2018-12-09 20:33:51', 'Courtyard', 0),
(13, '2018-12-09 20:33:58', 'Picnic Area', 0),
(14, '2018-12-09 20:34:30', 'Gym Center', 0),
(15, '2018-12-09 20:35:11', 'Gigabit Fiber Internet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appliance`
--

CREATE TABLE `appliance` (
  `applianceNumberID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `applianceTypeID` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appliance`
--

INSERT INTO `appliance` (`applianceNumberID`, `propertyID`, `applianceTypeID`, `details`) VALUES
(1, 1, 1, NULL),
(2, 2, 2, NULL),
(3, 3, 3, NULL),
(4, 4, 4, NULL),
(5, 5, 5, NULL),
(6, 6, 6, NULL),
(7, 7, 1, NULL),
(8, 8, 2, NULL),
(9, 9, 3, NULL),
(10, 10, 4, NULL),
(11, 11, 5, NULL),
(12, 12, 6, NULL),
(13, 13, 1, NULL),
(14, 14, 2, NULL),
(15, 15, 3, NULL),
(16, 16, 4, NULL),
(17, 17, 5, NULL),
(18, 18, 6, NULL),
(19, 19, 1, NULL),
(20, 20, 2, NULL),
(21, 21, 3, NULL),
(22, 22, 4, NULL),
(23, 23, 5, NULL),
(24, 24, 6, NULL),
(25, 25, 1, NULL),
(26, 26, 2, NULL),
(27, 27, 3, NULL),
(28, 28, 4, NULL),
(29, 29, 5, NULL),
(30, 30, 6, NULL),
(31, 31, 1, NULL),
(32, 32, 2, NULL),
(33, 33, 3, NULL),
(34, 34, 4, NULL),
(35, 35, 5, NULL),
(36, 36, 6, NULL),
(37, 37, 1, NULL),
(38, 38, 2, NULL),
(39, 39, 3, NULL),
(40, 40, 4, NULL),
(41, 41, 5, NULL),
(42, 42, 6, NULL),
(43, 43, 1, NULL),
(44, 44, 2, NULL),
(45, 45, 3, NULL),
(46, 69, 4, NULL),
(47, 1, 5, NULL),
(48, 2, 6, NULL),
(49, 3, 1, NULL),
(50, 4, 2, NULL),
(51, 5, 3, NULL),
(52, 6, 4, NULL),
(53, 7, 5, NULL),
(54, 8, 6, NULL),
(55, 9, 1, NULL),
(56, 10, 2, NULL),
(57, 11, 3, NULL),
(58, 12, 4, NULL),
(59, 13, 5, NULL),
(60, 14, 6, NULL),
(61, 15, 1, NULL),
(62, 16, 2, NULL),
(63, 17, 3, NULL),
(64, 18, 4, NULL),
(65, 19, 5, NULL),
(66, 20, 6, NULL),
(67, 21, 1, NULL),
(68, 22, 2, NULL),
(69, 23, 3, NULL),
(70, 24, 4, NULL),
(71, 25, 5, NULL),
(72, 26, 6, NULL),
(73, 27, 1, NULL),
(74, 28, 2, NULL),
(75, 29, 3, NULL),
(76, 30, 4, NULL),
(77, 31, 5, NULL),
(78, 32, 6, NULL),
(79, 33, 1, NULL),
(80, 34, 2, NULL),
(81, 35, 3, NULL),
(82, 36, 4, NULL),
(83, 37, 5, NULL),
(84, 38, 6, NULL),
(85, 39, 1, NULL),
(86, 40, 2, NULL),
(87, 41, 3, NULL),
(88, 42, 4, NULL),
(89, 43, 5, NULL),
(90, 44, 6, NULL),
(91, 45, 1, NULL),
(92, 69, 2, NULL),
(93, 1, 3, NULL),
(94, 2, 4, NULL),
(95, 3, 5, NULL),
(96, 4, 6, NULL),
(97, 5, 1, NULL),
(98, 6, 2, NULL),
(99, 7, 3, NULL),
(100, 8, 4, NULL),
(101, 9, 5, NULL),
(102, 10, 6, NULL),
(103, 11, 1, NULL),
(104, 12, 2, NULL),
(105, 13, 3, NULL),
(106, 14, 4, NULL),
(107, 15, 5, NULL),
(108, 16, 6, NULL),
(109, 17, 1, NULL),
(110, 18, 2, NULL),
(111, 19, 3, NULL),
(112, 20, 4, NULL),
(113, 21, 5, NULL),
(114, 22, 6, NULL),
(115, 23, 1, NULL),
(116, 24, 2, NULL),
(117, 25, 3, NULL),
(118, 26, 4, NULL),
(119, 27, 5, NULL),
(120, 28, 6, NULL),
(121, 29, 1, NULL),
(122, 30, 2, NULL),
(123, 31, 3, NULL),
(124, 32, 4, NULL),
(125, 33, 5, NULL),
(126, 34, 6, NULL),
(127, 35, 1, NULL),
(128, 36, 2, NULL),
(129, 37, 3, NULL),
(130, 38, 4, NULL),
(131, 39, 5, NULL),
(132, 40, 6, NULL),
(133, 41, 1, NULL),
(134, 42, 2, NULL),
(135, 43, 3, NULL),
(136, 44, 4, NULL),
(137, 45, 5, NULL),
(138, 69, 6, NULL),
(139, 1, 1, NULL),
(140, 2, 2, NULL),
(141, 3, 3, NULL),
(142, 4, 4, NULL),
(143, 5, 5, NULL),
(144, 6, 6, NULL),
(145, 7, 1, NULL),
(146, 8, 2, NULL),
(147, 9, 3, NULL),
(148, 10, 4, NULL),
(149, 11, 5, NULL),
(150, 12, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appliancetype`
--

CREATE TABLE `appliancetype` (
  `ID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `useCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appliancetype`
--

INSERT INTO `appliancetype` (`ID`, `addDate`, `name`, `useCount`) VALUES
(1, '2018-12-03 23:18:20', 'Refrigerator', 0),
(2, '2018-12-03 23:18:29', 'Oven', 0),
(3, '2018-12-06 07:14:32', 'Stove', 0),
(4, '2018-12-06 07:14:32', 'Dishwasher', 0),
(5, '2018-12-09 20:38:16', 'Disposal', 0),
(6, '2018-12-09 20:38:21', 'Ice Maker', 0);

-- --------------------------------------------------------

--
-- Table structure for table `continenttype`
--

CREATE TABLE `continenttype` (
  `ID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `useCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continenttype`
--

INSERT INTO `continenttype` (`ID`, `addDate`, `name`, `useCount`) VALUES
(1, '2018-11-28 05:11:06', 'North America', 0),
(2, '2018-11-28 05:11:06', 'Antartica', 0),
(3, '2018-11-28 05:11:06', 'Australia', 0),
(4, '2018-11-28 05:11:06', 'Europe', 0),
(5, '2018-11-28 05:11:06', 'Asia', 0),
(6, '2018-11-28 05:11:06', 'Africa', 0),
(7, '2018-11-28 05:11:06', 'South America', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countrytype`
--

CREATE TABLE `countrytype` (
  `ID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `useCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countrytype`
--

INSERT INTO `countrytype` (`ID`, `addDate`, `name`, `useCount`) VALUES
(95, '2018-11-28 05:43:08', 'Afghanistan', 0),
(96, '2018-11-28 05:43:08', 'Albania', 0),
(97, '2018-11-28 05:43:08', 'Algeria', 0),
(98, '2018-11-28 05:43:08', 'Andorra', 0),
(99, '2018-11-28 05:43:08', 'Angola', 0),
(100, '2018-11-28 05:43:08', 'Antigua and Barbuda', 0),
(101, '2018-11-28 05:43:08', 'Argentina', 0),
(102, '2018-11-28 05:43:08', 'Armenia', 0),
(103, '2018-11-28 05:43:08', 'Australia', 0),
(104, '2018-11-28 05:43:08', 'Austria', 0),
(105, '2018-11-28 05:43:08', 'Austrian Empire', 0),
(106, '2018-11-28 05:43:08', 'Azerbaijan', 0),
(107, '2018-11-28 05:43:08', 'Baden', 0),
(108, '2018-11-28 05:43:08', 'Bahrain', 0),
(109, '2018-11-28 05:43:08', 'Bangladesh', 0),
(110, '2018-11-28 05:43:08', 'Barbados', 0),
(111, '2018-11-28 05:43:08', 'Bavaria', 0),
(112, '2018-11-28 05:43:08', 'Belarus', 0),
(113, '2018-11-28 05:43:08', 'Belgium', 0),
(114, '2018-11-28 05:43:08', 'Belize', 0),
(115, '2018-11-28 05:43:08', 'Benin (Dahomey)', 0),
(116, '2018-11-28 05:43:08', 'Bolivia', 0),
(117, '2018-11-28 05:43:08', 'Bosnia and Herzegovina', 0),
(118, '2018-11-28 05:43:08', 'Botswana', 0),
(119, '2018-11-28 05:43:08', 'Brazil', 0),
(120, '2018-11-28 05:43:08', 'Brunei', 0),
(121, '2018-11-28 05:43:08', 'Brunswick and Lüneburg', 0),
(122, '2018-11-28 05:43:08', 'Bulgaria', 0),
(123, '2018-11-28 05:43:08', 'Burkina Faso (Upper Volta)', 0),
(124, '2018-11-28 05:43:08', 'Burma', 0),
(125, '2018-11-28 05:43:08', 'Burundi', 0),
(126, '2018-11-28 05:43:08', 'Cabo Verde', 0),
(127, '2018-11-28 05:43:08', 'Cambodia', 0),
(128, '2018-11-28 05:43:08', 'Cameroon', 0),
(129, '2018-11-28 05:43:08', 'Canada', 0),
(130, '2018-11-28 05:43:08', 'Central African Republic', 0),
(131, '2018-11-28 05:43:08', 'Central American Federation', 0),
(132, '2018-11-28 05:43:08', 'Chad', 0),
(133, '2018-11-28 05:43:08', 'Chile', 0),
(134, '2018-11-28 05:43:08', 'China', 0),
(135, '2018-11-28 05:43:08', 'Colombia', 0),
(136, '2018-11-28 05:43:08', 'Comoros', 0),
(137, '2018-11-28 05:43:08', 'Costa Rica', 0),
(138, '2018-11-28 05:43:08', 'Cote D’Ivoire (Ivory Coast)', 0),
(139, '2018-11-28 05:43:08', 'Croatia', 0),
(140, '2018-11-28 05:43:08', 'Cuba', 0),
(141, '2018-11-28 05:43:08', 'Cyprus', 0),
(142, '2018-11-28 05:43:08', 'Czechia', 0),
(143, '2018-11-28 05:43:08', 'Czechoslovakia', 0),
(144, '2018-11-28 05:43:08', 'Democratic Republic of the Congo', 0),
(145, '2018-11-28 05:43:08', 'Denmark', 0),
(146, '2018-11-28 05:43:08', 'Djibouti', 0),
(147, '2018-11-28 05:43:08', 'Dominica', 0),
(148, '2018-11-28 05:43:08', 'Dominican Republic', 0),
(149, '2018-11-28 05:43:08', 'East Germany (German Democratic Republic)', 0),
(150, '2018-11-28 05:43:08', 'Ecuador', 0),
(151, '2018-11-28 05:43:08', 'Egypt', 0),
(152, '2018-11-28 05:43:08', 'El Salvador', 0),
(153, '2018-11-28 05:43:08', 'Equatorial Guinea', 0),
(154, '2018-11-28 05:43:08', 'Eritrea', 0),
(155, '2018-11-28 05:49:41', 'Estonia', 0),
(156, '2018-11-28 05:49:41', 'Eswatini', 0),
(157, '2018-11-28 05:49:41', 'Ethiopia', 0),
(158, '2018-11-28 05:49:41', 'Federal Government of Germany (1848-49)', 0),
(159, '2018-11-28 05:49:41', 'Fiji', 0),
(160, '2018-11-28 05:49:41', 'Finland', 0),
(161, '2018-11-28 05:49:41', 'France', 0),
(162, '2018-11-28 05:49:41', 'Gabon', 0),
(163, '2018-11-28 05:49:41', 'Georgia', 0),
(164, '2018-11-28 05:49:41', 'Germany', 0),
(165, '2018-11-28 05:49:41', 'Ghana', 0),
(166, '2018-11-28 05:49:41', 'Greece', 0),
(167, '2018-11-28 05:49:41', 'Grenada', 0),
(168, '2018-11-28 05:49:41', 'Guatemala', 0),
(169, '2018-11-28 05:49:41', 'Guinea', 0),
(170, '2018-11-28 05:49:41', 'Guinea-Bissau', 0),
(171, '2018-11-28 05:49:41', 'Guyana', 0),
(172, '2018-11-28 05:49:41', 'Haiti', 0),
(173, '2018-11-28 05:49:41', 'Hanover', 0),
(174, '2018-11-28 05:49:41', 'Hanseatic Republics', 0),
(175, '2018-11-28 05:49:41', 'Hawaii', 0),
(176, '2018-11-28 05:49:41', 'Hesse', 0),
(177, '2018-11-28 05:49:41', 'Holy See', 0),
(178, '2018-11-28 05:49:41', 'Honduras', 0),
(179, '2018-11-28 05:49:41', 'Hungary', 0),
(180, '2018-11-28 05:49:41', 'Iceland', 0),
(181, '2018-11-28 05:49:41', 'India', 0),
(182, '2018-11-28 05:49:41', 'Indonesia', 0),
(183, '2018-11-28 05:49:41', 'Iran', 0),
(184, '2018-11-28 05:49:41', 'Iraq', 0),
(185, '2018-11-28 05:49:41', 'Ireland', 0),
(186, '2018-11-28 05:49:41', 'Israel', 0),
(187, '2018-11-28 05:49:41', 'Italy', 0),
(188, '2018-11-28 05:49:41', 'Jamaica', 0),
(189, '2018-11-28 05:49:41', 'Japan', 0),
(190, '2018-11-28 05:49:41', 'Jordan', 0),
(191, '2018-11-28 05:49:41', 'Kazakhstan', 0),
(192, '2018-11-28 05:49:41', 'Kenya', 0),
(193, '2018-11-28 05:49:41', 'Kingdom of Serbia/Yugoslavia', 0),
(194, '2018-11-28 05:49:41', 'Kiribati', 0),
(195, '2018-11-28 05:49:41', 'Korea', 0),
(196, '2018-11-28 05:49:41', 'Kosovo', 0),
(197, '2018-11-28 05:49:41', 'Kuwait', 0),
(198, '2018-11-28 05:49:41', 'Kyrgyzstan', 0),
(199, '2018-11-28 05:49:41', 'Laos', 0),
(200, '2018-11-28 05:49:41', 'Latvia', 0),
(201, '2018-11-28 05:49:41', 'Lebanon', 0),
(202, '2018-11-28 05:49:41', 'Lesotho', 0),
(203, '2018-11-28 05:49:41', 'Lew Chew (Loochoo)', 0),
(204, '2018-11-28 05:49:41', 'Liberia', 0),
(205, '2018-11-28 05:49:41', 'Libya', 0),
(206, '2018-11-28 05:49:41', 'Liechtenstein', 0),
(207, '2018-11-28 05:49:41', 'Lithuania', 0),
(208, '2018-11-28 05:49:41', 'Luxembourg', 0),
(209, '2018-11-28 05:49:41', 'Macedonia', 0),
(210, '2018-11-28 05:49:41', 'Madagascar', 0),
(211, '2018-11-28 05:49:41', 'Malawi', 0),
(212, '2018-11-28 05:49:41', 'Malaysia', 0),
(213, '2018-11-28 05:49:41', 'Maldives', 0),
(214, '2018-11-28 05:49:41', 'Mali', 0),
(215, '2018-11-28 05:54:16', 'Malta', 0),
(216, '2018-11-28 05:54:16', 'Marshall Islands', 0),
(217, '2018-11-28 05:54:16', 'Mauritania', 0),
(218, '2018-11-28 05:54:16', 'Mauritius', 0),
(219, '2018-11-28 05:54:16', 'Mecklenburg-Schwerin', 0),
(220, '2018-11-28 05:54:16', 'Mecklenburg-Strelitz', 0),
(221, '2018-11-28 05:54:16', 'Mexico', 0),
(222, '2018-11-28 05:54:16', 'Micronesia', 0),
(223, '2018-11-28 05:54:16', 'Moldova', 0),
(224, '2018-11-28 05:54:16', 'Monaco', 0),
(225, '2018-11-28 05:54:16', 'Mongolia', 0),
(226, '2018-11-28 05:54:16', 'Montenegro', 0),
(227, '2018-11-28 05:54:16', 'Morocco', 0),
(228, '2018-11-28 05:54:16', 'Mozambique', 0),
(229, '2018-11-28 05:54:16', 'Namibia', 0),
(230, '2018-11-28 05:54:16', 'Nassau', 0),
(231, '2018-11-28 05:54:16', 'Nauru', 0),
(232, '2018-11-28 05:54:16', 'Nepal', 0),
(233, '2018-11-28 05:54:16', 'New Zealand', 0),
(234, '2018-11-28 05:54:16', 'Nicaragua', 0),
(235, '2018-11-28 05:54:16', 'Niger', 0),
(236, '2018-11-28 05:54:16', 'Nigeria', 0),
(237, '2018-11-28 05:54:16', 'North German Confederation', 0),
(238, '2018-11-28 05:54:16', 'North German Union', 0),
(239, '2018-11-28 05:54:16', 'Norway', 0),
(240, '2018-11-28 05:54:16', 'Oldenburg', 0),
(241, '2018-11-28 05:54:16', 'Oman', 0),
(242, '2018-11-28 05:54:16', 'Orange Free State', 0),
(243, '2018-11-28 05:54:16', 'Pakistan', 0),
(244, '2018-11-28 05:54:16', 'Palau', 0),
(245, '2018-11-28 05:54:16', 'Panama', 0),
(246, '2018-11-28 05:54:16', 'Papal States', 0),
(247, '2018-11-28 05:54:16', 'Papua New Guinea', 0),
(248, '2018-11-28 05:54:16', 'Paraguay', 0),
(249, '2018-11-28 05:54:16', 'Peru', 0),
(250, '2018-11-28 05:54:16', 'Philippines', 0),
(251, '2018-11-28 05:54:16', 'Piedmont-Sardinia', 0),
(252, '2018-11-28 05:54:16', 'Poland', 0),
(253, '2018-11-28 05:54:16', 'Portugal', 0),
(254, '2018-11-28 05:54:16', 'Qatar', 0),
(255, '2018-11-28 05:54:16', 'Republic of Genoa', 0),
(256, '2018-11-28 05:54:16', 'Republic of Korea (South Korea)', 0),
(257, '2018-11-28 05:54:16', 'Republic of the Congo', 0),
(258, '2018-11-28 05:54:16', 'Romania', 0),
(259, '2018-11-28 05:54:16', 'Russia', 0),
(260, '2018-11-28 05:54:16', 'Rwanda', 0),
(261, '2018-11-28 05:54:16', 'Saint Kitts and Nevis', 0),
(262, '2018-11-28 05:54:16', 'Saint Lucia', 0),
(263, '2018-11-28 05:54:16', 'Saint Vincent and the Grenadines', 0),
(264, '2018-11-28 05:54:16', 'Samoa', 0),
(265, '2018-11-28 05:54:16', 'San Marino', 0),
(266, '2018-11-28 05:54:16', 'Sao Tome and Principe', 0),
(267, '2018-11-28 05:54:16', 'Saudi Arabia', 0),
(268, '2018-11-28 05:54:16', 'Schaumburg-Lippe', 0),
(269, '2018-11-28 05:54:16', 'Senegal', 0),
(270, '2018-11-28 05:54:16', 'Serbia', 0),
(271, '2018-11-28 05:54:16', 'Seychelles', 0),
(272, '2018-11-28 05:54:16', 'Sierra Leone', 0),
(273, '2018-11-28 05:54:16', 'Singapore', 0),
(274, '2018-11-28 05:54:16', 'Slovakia', 0),
(275, '2018-11-28 05:58:11', 'Slovenia', 0),
(276, '2018-11-28 05:58:11', 'Somalia', 0),
(277, '2018-11-28 05:58:11', 'South Africa', 0),
(278, '2018-11-28 05:58:11', 'South Sudan', 0),
(279, '2018-11-28 05:58:11', 'Spain', 0),
(280, '2018-11-28 05:58:11', 'Sri Lanka', 0),
(281, '2018-11-28 05:58:11', 'Sudan', 0),
(282, '2018-11-28 05:58:11', 'Suriname', 0),
(283, '2018-11-28 05:58:11', 'Sweden', 0),
(284, '2018-11-28 05:58:11', 'Switzerland', 0),
(285, '2018-11-28 05:58:11', 'Syria', 0),
(286, '2018-11-28 05:58:11', 'Tajikistan', 0),
(287, '2018-11-28 05:58:11', 'Tanzania', 0),
(288, '2018-11-28 05:58:11', 'Texas', 0),
(289, '2018-11-28 05:58:11', 'Thailand', 0),
(290, '2018-11-28 05:58:11', 'The Bahamas', 0),
(291, '2018-11-28 05:58:11', 'The Cayman Islands', 0),
(292, '2018-11-28 05:58:11', 'The Congo Free State', 0),
(293, '2018-11-28 05:58:11', 'The Duchy of Parma', 0),
(294, '2018-11-28 05:58:11', 'The Gambia', 0),
(295, '2018-11-28 05:58:11', 'The Grand Duchy of Tuscany', 0),
(296, '2018-11-28 05:58:11', 'The Netherlands', 0),
(297, '2018-11-28 05:58:11', 'The Solomon Islands', 0),
(298, '2018-11-28 05:58:11', 'The United Arab Emirates', 0),
(299, '2018-11-28 05:58:11', 'The United Kingdom', 0),
(300, '2018-11-28 05:58:11', 'Timor-Leste', 0),
(301, '2018-11-28 05:58:11', 'Togo', 0),
(302, '2018-11-28 05:58:11', 'Tonga', 0),
(303, '2018-11-28 05:58:11', 'Trinidad and Tobago', 0),
(304, '2018-11-28 05:58:11', 'Tunisia', 0),
(305, '2018-11-28 05:58:11', 'Turkey', 0),
(306, '2018-11-28 05:58:11', 'Turkmenistan', 0),
(307, '2018-11-28 05:58:11', 'Tuvalu', 0),
(308, '2018-11-28 05:58:11', 'Two Sicilies', 0),
(309, '2018-11-28 05:58:11', 'Uganda', 0),
(310, '2018-11-28 05:58:11', 'Ukraine', 0),
(311, '2018-11-28 05:58:11', 'Union of Soviet Socialist Republics', 0),
(312, '2018-11-28 05:58:11', 'Uruguay', 0),
(313, '2018-11-28 05:58:11', 'Uzbekistan', 0),
(314, '2018-11-28 05:58:11', 'Vanuatu', 0),
(315, '2018-11-28 05:58:11', 'Venezuela', 0),
(316, '2018-11-28 05:58:11', 'Vietnam', 0),
(317, '2018-11-28 05:58:11', 'Württemberg', 0),
(318, '2018-11-28 05:58:11', 'Yemen', 0),
(319, '2018-11-28 05:58:11', 'Zambia', 0),
(320, '2018-11-28 05:58:11', 'Zimbabwe', 0),
(321, '2018-11-29 02:25:07', 'United States', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issueNumberID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `name` text NOT NULL,
  `details` text,
  `foundDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `repairDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issueNumberID`, `propertyID`, `name`, `details`, `foundDate`, `repairDate`) VALUES
(1, 1, 'unde', 'Omnis nostrum neque.', '1990-09-29 17:43:00', '2007-06-02 20:02:06'),
(2, 2, 'sint', 'Quia architecto et veniam sed error.', '1973-12-04 21:12:41', '2000-12-16 09:07:45'),
(3, 3, 'dolorem', 'Optio modi qui et voluptas in.', '2008-06-29 11:59:38', '1996-02-24 02:03:41'),
(4, 4, 'sit', 'Blanditiis ex sint sed qui.', '2004-06-12 10:16:49', '1998-08-01 04:40:53'),
(5, 5, 'et', 'Corporis autem esse.', '1988-02-02 01:22:36', '2012-01-19 15:29:16'),
(6, 6, 'totam', 'Debitis eaque et ab.', '2012-04-24 00:43:05', '1980-01-26 17:42:27'),
(7, 7, 'et', 'Nihil natus cupiditate est et dolor.', '1984-10-16 01:29:57', '2006-10-09 01:26:21'),
(8, 8, 'nostrum', 'Ad autem autem.', '1981-10-31 07:28:45', '1975-02-13 00:36:55'),
(9, 9, 'odit', 'Vitae commodi aliquid ratione cumque et.', '2016-07-05 06:22:56', '2004-01-28 13:37:16'),
(10, 10, 'nostrum', 'Officiis voluptatibus deserunt.', '1981-12-17 23:16:58', '1981-07-19 21:46:20'),
(11, 11, 'officia', 'Qui placeat est.', '1990-01-20 12:55:23', '2010-01-20 10:57:50'),
(12, 12, 'enim', 'Placeat est sequi qui nesciunt aut.', '2007-02-03 15:58:20', '1978-06-05 04:44:17'),
(13, 13, 'in', 'Numquam soluta officia ad sunt optio.', '2004-11-13 13:41:53', '1994-12-16 14:36:13'),
(14, 14, 'quod', 'Iusto deleniti consectetur.', '2002-03-25 04:04:06', '2014-04-23 01:54:18'),
(15, 15, 'quia', 'Dignissimos sed expedita labore ullam consequuntur.', '1992-06-04 04:02:51', '1996-04-26 04:29:25'),
(16, 16, 'reprehenderit', 'Eligendi beatae officiis earum voluptates.', '2005-05-15 01:56:46', '1970-08-26 22:35:25'),
(17, 17, 'mollitia', 'At sed et sit delectus rerum.', '2000-07-13 09:48:00', '1989-11-24 16:40:13'),
(18, 18, 'minus', 'Itaque voluptate veniam qui.', '1998-01-07 03:18:13', '2005-03-06 13:39:55'),
(19, 19, 'in', 'Quibusdam voluptate et.', '1977-12-13 04:55:11', '1992-07-17 22:15:23'),
(20, 20, 'in', 'Nulla explicabo incidunt minima.', '2006-10-01 08:30:44', '2002-09-12 23:55:18'),
(21, 21, 'incidunt', 'Eum nobis ut consectetur.', '2001-01-23 21:51:39', '1996-08-31 20:11:23'),
(22, 22, 'molestias', 'Non sunt itaque facilis tempore.', '2012-04-26 01:17:45', '2010-04-19 07:44:10'),
(23, 23, 'consequatur', 'Eum aut illo quia quisquam saepe.', '2002-08-30 06:25:04', '2010-11-21 09:58:44'),
(24, 24, 'dolor', 'Iusto aspernatur sunt.', '2000-06-07 05:47:55', '1976-04-21 06:15:54'),
(25, 25, 'voluptatem', 'Iusto eos sed occaecati commodi.', '2012-11-14 03:12:12', '2015-09-01 23:40:06'),
(26, 26, 'molestiae', 'Facilis velit ratione facilis nulla laudantium.', '2005-12-31 15:11:18', '1984-08-12 16:37:14'),
(27, 27, 'sunt', 'Ducimus sint sunt velit.', '1991-11-16 09:08:48', '2004-03-29 21:46:11'),
(28, 28, 'velit', 'Omnis sequi eligendi exercitationem.', '1994-03-05 05:52:20', '2018-08-06 20:17:50'),
(29, 29, 'est', 'Labore sit veritatis doloremque voluptate.', '1986-08-21 10:05:04', '1988-11-27 15:46:16'),
(30, 30, 'voluptatibus', 'Illo maxime ea id.', '1972-08-08 03:17:50', '2011-08-26 17:33:00'),
(31, 31, 'ullam', 'Ut distinctio dolorum nesciunt.', '2016-10-24 00:26:29', '2006-12-04 06:48:51'),
(32, 32, 'necessitatibus', 'Dolorem omnis possimus aspernatur est.', '1984-09-07 18:58:09', '2012-08-09 01:16:05'),
(33, 33, 'et', 'Similique perferendis cumque molestias.', '1993-03-24 19:08:10', '2005-03-15 21:38:49'),
(34, 34, 'quibusdam', 'Molestiae modi eaque vel.', '1972-09-02 20:32:57', '2015-08-21 13:25:07'),
(35, 35, 'assumenda', 'Dolorum culpa sunt nemo.', '1972-12-14 12:48:25', '1977-11-15 21:17:37'),
(36, 36, 'odio', 'Repellat et amet error nihil.', '1971-01-29 18:06:22', '1977-01-29 22:45:33'),
(37, 37, 'minima', 'Tempora deserunt voluptate consequatur rerum.', '1992-03-20 00:49:01', '2013-09-25 22:38:21'),
(38, 38, 'necessitatibus', 'Voluptatum modi omnis atque nihil.', '1976-02-29 14:43:12', '1975-01-04 01:05:26'),
(39, 39, 'ducimus', 'Impedit occaecati dolores et dolores placeat.', '1985-02-22 15:54:45', '1990-01-24 04:42:46'),
(40, 40, 'ea', 'Quia provident omnis maiores.', '2016-12-12 10:15:29', '1985-08-02 16:02:50'),
(41, 41, 'inventore', 'Est in ullam quam.', '1993-06-22 22:32:23', '1980-11-24 07:05:32'),
(42, 42, 'veritatis', 'Modi tempora perferendis inventore distinctio.', '2012-04-18 22:44:31', '2005-05-16 14:35:26'),
(43, 43, 'voluptas', 'Incidunt quos sed.', '2016-03-05 06:23:16', '2014-05-04 04:47:31'),
(44, 44, 'deleniti', 'Fuga molestias laudantium.', '2002-08-13 08:38:07', '2011-10-10 03:50:48'),
(45, 45, 'adipisci', 'Minus consectetur ut.', '1979-09-13 19:00:00', '2017-03-03 06:06:07'),
(46, 69, 'nemo', 'Ipsum id temporibus culpa occaecati placeat.', '1995-04-30 08:56:16', '2001-06-01 16:42:13'),
(47, 1, 'non', 'Est et officia beatae hic.', '1987-08-16 06:51:18', '1994-10-08 06:21:18'),
(48, 2, 'omnis', 'Velit dolorum in architecto similique dolores.', '1978-12-22 20:21:20', '2008-05-26 14:22:09'),
(49, 3, 'ipsa', 'Neque commodi maiores voluptate.', '2004-09-16 08:12:02', '2008-03-07 07:49:48'),
(50, 4, 'et', 'Amet ea totam voluptatem inventore.', '2002-08-14 19:13:01', '1973-06-07 23:31:41'),
(51, 5, 'est', 'Dolores molestiae ullam.', '1999-10-28 08:15:28', '1995-03-10 05:23:00'),
(52, 6, 'doloremque', 'Ut aut nesciunt voluptatem tempore.', '1980-02-07 02:18:48', '1998-06-14 09:29:16'),
(53, 7, 'est', 'Maiores at magni.', '2008-08-12 23:54:15', '2016-04-23 04:44:20'),
(54, 8, 'consequuntur', 'Vel enim laudantium.', '1972-03-20 05:34:49', '2008-09-30 05:00:44'),
(55, 9, 'officia', 'Sed quibusdam aut.', '1989-02-17 10:45:54', '2006-01-18 22:13:58'),
(56, 10, 'pariatur', 'Voluptate sed consequuntur enim.', '1992-12-30 20:17:13', '1995-10-19 15:58:35'),
(57, 11, 'eligendi', 'Aut atque odio deleniti est.', '1977-07-09 20:08:01', '1975-10-30 15:28:03'),
(58, 12, 'est', 'Est reiciendis nobis quisquam reprehenderit.', '2010-08-09 07:52:16', '1995-05-05 17:20:21'),
(59, 13, 'omnis', 'Maxime esse corporis.', '1999-07-03 09:42:26', '1998-01-19 17:39:03'),
(60, 14, 'nobis', 'Veritatis in quo non sed quasi.', '1983-03-23 21:28:19', '1994-09-04 06:25:56'),
(61, 15, 'a', 'Sunt autem praesentium ipsa ut porro.', '1990-02-05 01:51:20', '1975-07-17 17:32:28'),
(62, 16, 'reprehenderit', 'Velit est molestias occaecati veniam rerum.', '1987-12-10 03:43:41', '2004-12-02 20:49:56'),
(63, 17, 'quo', 'Vero neque facilis.', '1979-11-25 09:25:41', '1973-10-30 03:46:22'),
(64, 18, 'necessitatibus', 'Omnis sed quia explicabo.', '1994-03-20 11:49:03', '1978-01-05 17:50:44'),
(65, 19, 'qui', 'Ad necessitatibus est tenetur quo consectetur.', '2002-11-27 14:40:25', '1994-11-30 21:40:33'),
(66, 20, 'quod', 'Voluptatem et soluta ex.', '1995-01-20 10:53:09', '2009-12-23 15:38:52'),
(67, 21, 'veritatis', 'Dicta exercitationem facere.', '1992-03-31 14:58:44', '1988-04-25 10:43:36'),
(68, 22, 'quod', 'Aut qui recusandae recusandae.', '2008-01-15 06:52:25', '2017-01-11 07:43:56'),
(69, 23, 'nostrum', 'Et fugiat ab.', '2009-08-30 23:52:15', '1972-08-20 10:19:06'),
(70, 24, 'modi', 'Non in quo illum.', '1974-11-22 14:51:47', '1987-12-18 20:32:43'),
(71, 25, 'qui', 'Sit sit et qui debitis incidunt.', '1987-08-06 06:00:32', '2016-11-17 10:38:13'),
(72, 26, 'asperiores', 'Quasi quia adipisci quod sit consectetur.', '1983-06-20 17:28:31', '1977-02-23 10:49:18'),
(73, 27, 'aut', 'Eius quia omnis eligendi.', '2018-04-03 03:06:56', '1999-10-24 09:16:09'),
(74, 28, 'quasi', 'Repudiandae repudiandae est quos.', '1995-06-11 05:12:02', '2007-08-24 21:11:05'),
(75, 29, 'ea', 'Hic tenetur et et perspiciatis.', '1981-06-04 10:43:42', '1983-08-07 17:50:52'),
(76, 30, 'quia', 'Officia deserunt eos accusamus necessitatibus reprehenderit.', '1985-04-06 21:46:53', '1998-11-02 06:08:17'),
(77, 31, 'fugiat', 'Voluptas est deserunt.', '1974-01-03 21:44:51', '1984-05-27 06:19:44'),
(78, 32, 'nam', 'Sed perferendis reiciendis autem harum magnam.', '2009-05-20 05:53:30', '1993-04-21 10:26:30'),
(79, 33, 'culpa', 'Earum repellendus velit modi iste.', '1999-04-05 12:22:55', '1997-09-22 20:52:03'),
(80, 34, 'facilis', 'Id iusto ut.', '1985-01-27 06:43:01', '2015-10-12 15:34:13'),
(81, 35, 'sit', 'Non iure recusandae tempore.', '2002-03-12 06:19:05', '2016-04-15 00:12:21'),
(82, 36, 'sed', 'Sit expedita pariatur ea iure.', '1982-01-03 13:29:00', '2008-06-16 12:52:46'),
(83, 37, 'quis', 'Rerum animi eos qui.', '1979-03-30 22:35:53', '2018-01-04 21:07:26'),
(84, 38, 'ut', 'Culpa sit dolore.', '2001-03-09 15:24:24', '1981-01-16 09:36:33'),
(85, 39, 'rerum', 'Beatae exercitationem soluta.', '2004-01-07 13:16:40', '1982-01-18 13:22:55'),
(86, 40, 'laboriosam', 'Beatae accusamus dolorem ex impedit.', '2006-02-01 06:19:26', '2012-05-18 03:40:09'),
(87, 41, 'dignissimos', 'Debitis qui qui consequatur.', '1997-07-20 19:48:40', '2016-09-01 09:47:18'),
(88, 42, 'delectus', 'Iure qui voluptatem.', '2009-09-02 14:29:05', '1993-03-16 20:28:55'),
(89, 43, 'est', 'Et similique qui autem ut.', '1981-10-19 04:09:09', '1990-10-20 02:19:32'),
(90, 44, 'est', 'Ab modi molestias.', '1990-04-30 17:51:34', '1984-12-21 05:14:51'),
(91, 45, 'sunt', 'Mollitia est doloribus officia deserunt.', '2005-11-04 16:04:16', '2009-11-11 20:36:02'),
(92, 69, 'nam', 'Nisi repudiandae voluptatem consequatur dolores.', '2002-07-18 19:54:42', '2018-03-19 07:27:51'),
(93, 1, 'consequatur', 'Architecto aut ipsum explicabo.', '1973-05-16 17:47:13', '2017-12-24 01:09:52'),
(94, 2, 'facilis', 'Sit facere earum est.', '1984-09-14 04:17:17', '1994-07-08 13:35:11'),
(95, 3, 'ullam', 'Illum non eos similique est labore.', '2018-10-29 21:59:48', '1987-04-28 02:10:19'),
(96, 4, 'eos', 'Ad qui cumque rerum nobis.', '1981-03-04 14:13:22', '2002-12-12 05:04:19'),
(97, 5, 'adipisci', 'Earum exercitationem veritatis optio.', '2014-09-02 08:17:44', '1983-02-12 09:14:14'),
(98, 6, 'quae', 'Aut nihil laudantium neque.', '1978-11-14 02:24:47', '1996-04-09 04:43:30'),
(99, 7, 'ratione', 'Voluptatibus atque non ea.', '1971-08-05 09:33:12', '1972-10-09 09:11:59'),
(100, 8, 'qui', 'Saepe tempora sit.', '2017-09-13 19:37:36', '2014-03-13 07:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `perk`
--

CREATE TABLE `perk` (
  `perkNumberID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `perkTypeID` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perk`
--

INSERT INTO `perk` (`perkNumberID`, `propertyID`, `perkTypeID`, `details`) VALUES
(33, 1, 1, NULL),
(34, 2, 2, NULL),
(35, 3, 3, NULL),
(36, 4, 4, NULL),
(37, 5, 5, NULL),
(38, 6, 6, NULL),
(39, 7, 7, NULL),
(40, 8, 8, NULL),
(41, 9, 9, NULL),
(42, 10, 1, NULL),
(43, 11, 2, NULL),
(44, 12, 3, NULL),
(45, 13, 4, NULL),
(46, 14, 5, NULL),
(47, 15, 6, NULL),
(48, 16, 7, NULL),
(49, 17, 8, NULL),
(50, 18, 9, NULL),
(51, 19, 1, NULL),
(52, 20, 2, NULL),
(53, 21, 3, NULL),
(54, 22, 4, NULL),
(55, 23, 5, NULL),
(56, 24, 6, NULL),
(57, 25, 7, NULL),
(58, 26, 8, NULL),
(59, 27, 9, NULL),
(60, 28, 1, NULL),
(61, 29, 2, NULL),
(62, 30, 3, NULL),
(63, 31, 4, NULL),
(64, 32, 5, NULL),
(65, 33, 6, NULL),
(66, 34, 7, NULL),
(67, 35, 8, NULL),
(68, 36, 9, NULL),
(69, 37, 1, NULL),
(70, 38, 2, NULL),
(71, 39, 3, NULL),
(72, 40, 4, NULL),
(73, 41, 5, NULL),
(74, 42, 6, NULL),
(75, 43, 7, NULL),
(76, 44, 8, NULL),
(77, 45, 9, NULL),
(78, 69, 1, NULL),
(79, 1, 2, NULL),
(80, 2, 3, NULL),
(81, 3, 4, NULL),
(82, 4, 5, NULL),
(83, 5, 6, NULL),
(84, 6, 7, NULL),
(85, 7, 8, NULL),
(86, 8, 9, NULL),
(87, 9, 1, NULL),
(88, 10, 2, NULL),
(89, 11, 3, NULL),
(90, 12, 4, NULL),
(91, 13, 5, NULL),
(92, 14, 6, NULL),
(93, 15, 7, NULL),
(94, 16, 8, NULL),
(95, 17, 9, NULL),
(96, 18, 1, NULL),
(97, 19, 2, NULL),
(98, 20, 3, NULL),
(99, 21, 4, NULL),
(100, 22, 5, NULL),
(101, 23, 6, NULL),
(102, 24, 7, NULL),
(103, 25, 8, NULL),
(104, 26, 9, NULL),
(105, 27, 1, NULL),
(106, 28, 2, NULL),
(107, 29, 3, NULL),
(108, 30, 4, NULL),
(109, 31, 5, NULL),
(110, 32, 6, NULL),
(111, 33, 7, NULL),
(112, 34, 8, NULL),
(113, 35, 9, NULL),
(114, 36, 1, NULL),
(115, 37, 2, NULL),
(116, 38, 3, NULL),
(117, 39, 4, NULL),
(118, 40, 5, NULL),
(119, 41, 6, NULL),
(120, 42, 7, NULL),
(121, 43, 8, NULL),
(122, 44, 9, NULL),
(123, 45, 1, NULL),
(124, 69, 2, NULL),
(125, 1, 3, NULL),
(126, 2, 4, NULL),
(127, 3, 5, NULL),
(128, 4, 6, NULL),
(129, 5, 7, NULL),
(130, 6, 8, NULL),
(131, 7, 9, NULL),
(132, 8, 1, NULL),
(133, 9, 2, NULL),
(134, 10, 3, NULL),
(135, 11, 4, NULL),
(136, 12, 5, NULL),
(137, 13, 6, NULL),
(138, 14, 7, NULL),
(139, 15, 8, NULL),
(140, 16, 9, NULL),
(141, 17, 1, NULL),
(142, 18, 2, NULL),
(143, 19, 3, NULL),
(144, 20, 4, NULL),
(145, 21, 5, NULL),
(146, 22, 6, NULL),
(147, 23, 7, NULL),
(148, 24, 8, NULL),
(149, 25, 9, NULL),
(150, 26, 1, NULL),
(151, 27, 2, NULL),
(152, 28, 3, NULL),
(153, 29, 4, NULL),
(154, 30, 5, NULL),
(155, 31, 6, NULL),
(156, 32, 7, NULL),
(157, 33, 8, NULL),
(158, 34, 9, NULL),
(159, 35, 1, NULL),
(160, 36, 2, NULL),
(161, 37, 3, NULL),
(162, 38, 4, NULL),
(163, 39, 5, NULL),
(164, 40, 6, NULL),
(165, 41, 7, NULL),
(166, 42, 8, NULL),
(167, 43, 9, NULL),
(168, 44, 1, NULL),
(169, 45, 2, NULL),
(170, 69, 3, NULL),
(171, 1, 4, NULL),
(172, 2, 5, NULL),
(173, 3, 6, NULL),
(174, 4, 7, NULL),
(175, 5, 8, NULL),
(176, 6, 9, NULL),
(177, 7, 1, NULL),
(178, 8, 2, NULL),
(179, 9, 3, NULL),
(180, 10, 4, NULL),
(181, 11, 5, NULL),
(182, 12, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perktype`
--

CREATE TABLE `perktype` (
  `ID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `useCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perktype`
--

INSERT INTO `perktype` (`ID`, `addDate`, `name`, `useCount`) VALUES
(1, '2018-12-06 08:11:37', 'Pet Friendly', 0),
(2, '2018-12-06 08:11:37', 'Non Smoking', 0),
(3, '2018-12-06 08:11:37', 'Outdoor Space', 0),
(4, '2018-12-06 08:11:37', 'Netflix Subscription', 0),
(5, '2018-12-06 08:11:37', 'Balcony', 0),
(6, '2018-12-09 20:31:07', 'Nice View', 0),
(7, '2018-12-09 20:32:02', 'Gated Community', 0),
(8, '2018-12-09 20:32:13', 'Barbecue Area', 0),
(9, '2018-12-09 20:32:37', 'Parking', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phoneNumberID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `areaCode` text NOT NULL,
  `number` text NOT NULL,
  `extension` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phoneNumberID`, `userID`, `addDate`, `areaCode`, `number`, `extension`, `description`) VALUES
(1, 1, '2018-12-03 07:07:46', '956', '123-4567', NULL, 'Work'),
(2, 1, '2018-12-03 07:07:46', '956', '321-7654', NULL, 'Mobile'),
(3, 2, '2018-12-03 12:00:31', '956', '456-7890', '', 'Mobile'),
(4, 2, '2018-12-03 07:08:43', '956', '654-0987', NULL, 'Work'),
(5, 3, '2018-12-03 07:15:59', '956', '987-6543', NULL, 'Mobile'),
(6, 3, '2018-12-03 07:15:59', '956', '789-3456', NULL, 'Work'),
(9, 4, '2018-12-03 07:17:04', '956', '753-9510', NULL, 'Work'),
(10, 4, '2018-12-03 07:17:04', '956', '357-7913', NULL, 'Mobile'),
(11, 5, '2018-12-03 07:18:27', '956', '951-4682', NULL, 'Work'),
(12, 5, '2018-12-03 07:18:27', '956', '159-6428', NULL, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pictureNumberID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `propertyID` int(11) NOT NULL,
  `link` text NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pictureNumberID`, `addDate`, `propertyID`, `link`, `details`) VALUES
(1, '1998-01-19 17:35:00', 1, ' https://cdnblog.rentcafe.com/blog/wp-content/uploads/2016/04/The-Madison-at-Racine-Apartments-in-Chicago-2.jpg', 'Corporis distinctio aliquid ut distinctio sint non.'),
(2, '2014-05-26 21:22:55', 2, ' https://www.columbuspm.org/wp-content/uploads/2015/11/IMG_8426-1400x700.jpg', 'Aliquid perspiciatis fugit nulla nulla quibusdam.'),
(3, '2016-08-28 17:29:47', 3, ' https://www.iretapartments.com/PropertyImage/15097407864-7176/display/Dylan-RiNo-Apartments-Soft-Close-Cabinets-Open-Shelving.jpg', 'Eum exercitationem iste fuga doloribus qui.'),
(4, '1979-12-03 18:09:42', 4, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', ''),
(5, '1980-06-02 05:34:22', 5, ' http://www.gbdarchitects.com/wp-content/uploads/2013/09/Kiln-Apartments-1-2500x1406.jpg', ''),
(6, '2011-03-04 23:37:17', 6, ' https://hardwareapartments.com/app/uploads/2017/12/east2-1-991x567-c-center.jpg', ''),
(7, '2009-07-18 12:32:47', 7, ' https://www.interpointeapartments.com/gridmedia/img/slide4.jpg', 'Quo voluptatem ullam totam quod voluptatum iure sunt illo.'),
(8, '1971-06-19 07:27:11', 8, ' https://topazhouse.com/wp-content/uploads/2015/08/efficiency-apartments-bethesda-md-1200x550.jpg', ''),
(9, '2006-09-10 07:06:13', 9, ' http://www.trimarkproperties.com/gainesville/sabal-palms/luxury-apartments/og.jpg', ''),
(10, '1982-11-06 20:00:43', 10, ' https://images.adsttc.com/media/images/573a/8931/e58e/ce15/df00/006e/newsletter/KUD-Spectrum_002.jpg?1463453993', ''),
(11, '2015-10-13 13:16:57', 11, ' https://irp-cdn.multiscreensite.com/1f53f13b/dms3rep/multi/mobile/Apartment-Atkinson-NH-4032x2268.jpg', ''),
(12, '1973-07-27 09:37:34', 12, ' https://www.columbuspm.org/wp-content/uploads/2015/11/IMG_8426-1400x700.jpg', 'Odit dolore nihil excepturi sequi sed.'),
(13, '1984-02-04 05:38:40', 13, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', 'Voluptatem qui eum eaque impedit et pariatur.'),
(14, '2001-08-27 17:04:19', 14, ' https://www.nbtu.org/wp-content/uploads/2018/06/image_20170409_101343_962.jpg', 'Qui est placeat deleniti id.'),
(15, '1985-05-18 03:23:42', 15, ' https://www.columbuspm.org/wp-content/uploads/2015/11/IMG_8426-1400x700.jpg', 'Debitis enim sunt praesentium pariatur quasi esse.'),
(16, '1999-01-07 22:40:34', 16, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-midtown-houston/headers/1-camden-midtown-apartments-houston-texas-two-resort-style-swimming-pools-grills.jpg', ''),
(17, '1970-11-23 16:08:48', 17, 'https://cdn.vox-cdn.com/thumbor/pwGJpYJjHndJVqL6U-SFcPJlxGU=/0x0:4241x3336/1200x800/filters:focal(1782x1329:2460x2007)/cdn.vox-cdn.com/uploads/chorus_image/image/59404651/Oskar_Penthouse_Rendering_Hi_Res.0.jpg', 'Ut blanditiis unde maxime repudiandae.'),
(18, '1988-08-11 01:14:37', 18, ' https://www.decron.com/apartments-bridgecourt/wp-content/uploads/sites/55/2017/11/07-Bridgecourt-Apartments.jpg', 'Esse odit cumque at nihil animi est.'),
(19, '2001-09-12 05:47:02', 19, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', ''),
(20, '1984-03-23 18:33:14', 20, ' https://platformapartments.com/assets/images/cache/home_videoimage-09dfa5fd1c7c77d91bc5e45f785ca14e.jpg', ''),
(21, '2008-08-30 18:34:17', 21, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', 'Voluptatum et eius dolorem architecto asperiores.'),
(22, '1991-01-31 23:17:08', 22, 'https://cdn.vox-cdn.com/thumbor/pwGJpYJjHndJVqL6U-SFcPJlxGU=/0x0:4241x3336/1200x800/filters:focal(1782x1329:2460x2007)/cdn.vox-cdn.com/uploads/chorus_image/image/59404651/Oskar_Penthouse_Rendering_Hi_Res.0.jpg', 'Perspiciatis non dolor ut quo qui ducimus eum.'),
(23, '1983-09-03 04:56:52', 23, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-noma/headers/camden-noma-apartments-washington-dc-metro-rooftop-entertainment-lounge.jpg?itok=EKRGE0Sr×tamp=1531238079', 'Ut magni ab earum excepturi pariatur.'),
(24, '1992-05-31 05:34:45', 24, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', 'Rem quas et accusantium sit facere.'),
(25, '1994-10-16 17:13:56', 25, ' https://www.nbtu.org/wp-content/uploads/2018/06/image_20170409_101343_962.jpg', ''),
(26, '1992-02-09 16:18:57', 26, ' https://www.highlandhousewest.net/wp-content/uploads/2015/03/apartment-building-chevy-chase-md-1200x612.jpg', 'Molestiae eos et et eos asperiores.'),
(27, '1997-08-13 20:02:12', 27, ' https://voltaapartments.com/wp/wp-content/uploads/2015/01/vol-50.jpg', 'Fuga nam qui modi perferendis dolore.'),
(28, '1978-07-11 07:23:10', 28, ' https://www.columbuspm.org/wp-content/uploads/2015/11/IMG_8426-1400x700.jpg', 'Voluptatibus ut ea molestias culpa esse consectetur quos blanditiis.'),
(29, '2018-09-27 16:59:15', 29, ' https://platformapartments.com/assets/images/cache/home_videoimage-09dfa5fd1c7c77d91bc5e45f785ca14e.jpg', 'Ea voluptatem et magnam earum.'),
(30, '1975-03-17 15:16:29', 30, ' https://cdnblog.rentcafe.com/blog/wp-content/uploads/2016/04/The-Madison-at-Racine-Apartments-in-Chicago-2.jpg', 'Atque necessitatibus vel recusandae neque eligendi consectetur.'),
(31, '1976-11-24 10:47:32', 31, ' http://www.trimarkproperties.com/gainesville/sabal-palms/luxury-apartments/og.jpg', ''),
(32, '1998-12-23 17:44:13', 32, ' https://www.decron.com/apartments-bridgecourt/wp-content/uploads/sites/55/2017/11/07-Bridgecourt-Apartments.jpg', 'Et sit praesentium esse omnis quo debitis fuga.'),
(33, '2012-03-10 10:15:15', 33, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', 'Pariatur commodi odit molestiae nostrum.'),
(34, '2013-12-16 15:26:49', 34, ' https://images1.apartments.com/i2/zuaUa-FjipQvMwZND26ZKldKCclk0vOMoGGfsXcbmSU/111/eleanor-apartments-seattle-seattle-wa-primary-photo.jpg', 'Ipsa voluptatem facere alias consequatur laboriosam illo.'),
(35, '1982-04-10 02:34:59', 35, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', 'Ratione aliquid a dolorem numquam est consequuntur.'),
(36, '2000-12-13 02:22:17', 36, ' https://images1.apartments.com/i2/zuaUa-FjipQvMwZND26ZKldKCclk0vOMoGGfsXcbmSU/111/eleanor-apartments-seattle-seattle-wa-primary-photo.jpg', ''),
(37, '1973-05-18 23:36:39', 37, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', 'Nesciunt esse rerum repellendus architecto.'),
(38, '2015-01-06 07:11:08', 38, ' https://www.borgermanagement.com/uploads/images/images/original/241026/001_1221_Massachusetts_Avenue_NW_175065_189874.jpg?1496191644', ''),
(39, '1981-03-20 17:00:21', 39, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', ''),
(40, '1992-10-27 10:18:31', 40, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', 'Quod qui aut aut vitae assumenda possimus veritatis.'),
(41, '1991-06-27 03:29:04', 41, ' https://irp-cdn.multiscreensite.com/1f53f13b/dms3rep/multi/mobile/Apartment-Atkinson-NH-4032x2268.jpg', 'Sit rerum modi dolor quas labore.'),
(42, '1995-09-27 01:45:46', 42, ' https://vuecharlotte.com/assets/images/cache/VUE_with_pool_straight1-rotator-9e02a91e8fe1b6a643fbe4f0ba19adde.jpg', ''),
(43, '1993-01-15 16:51:53', 43, ' https://www.borgermanagement.com/uploads/images/images/original/241026/001_1221_Massachusetts_Avenue_NW_175065_189874.jpg?1496191644', ''),
(44, '1989-07-02 13:33:04', 44, ' https://content.makaan.com/1/674349/297/golden-apartments-elevation-1246447.jpeg?width=665&height=415', ''),
(45, '2008-06-26 20:04:40', 45, ' https://platformapartments.com/assets/images/cache/home_videoimage-09dfa5fd1c7c77d91bc5e45f785ca14e.jpg', 'Architecto quis quia porro quia.'),
(46, '1970-03-19 03:02:38', 69, ' https://cdnspimgsulekhalive.azureedge.net/cdn/images/property/project/detail/galaxy-apartments-projectimagelogo_2017090710550738482.jpg', ''),
(47, '1991-04-08 13:01:10', 1, ' https://www.interpointeapartments.com/gridmedia/img/slide4.jpg', 'Reiciendis suscipit sapiente eveniet error voluptates.'),
(48, '1972-04-19 10:06:22', 2, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', ''),
(49, '2015-08-28 02:39:21', 3, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', 'Nemo est doloremque voluptatem aut.'),
(50, '2006-01-19 05:08:36', 4, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', ''),
(51, '1991-11-07 01:57:37', 5, ' https://topazhouse.com/wp-content/uploads/2015/08/efficiency-apartments-bethesda-md-1200x550.jpg', 'Facilis nostrum delectus ex quam voluptas voluptas eos praesentium.'),
(52, '2004-01-02 19:10:15', 6, ' https://www.columbuspm.org/wp-content/uploads/2015/11/IMG_8426-1400x700.jpg', 'Sed quis est nulla quibusdam dolorem voluptas est.'),
(53, '1984-02-27 20:41:07', 7, ' https://platformapartments.com/assets/images/cache/home_videoimage-09dfa5fd1c7c77d91bc5e45f785ca14e.jpg', ''),
(54, '2010-12-26 19:09:06', 8, ' https://www.amli.com/AMLIContent/Files/apartments/chicago/lofts/amenity-exterior/lofts-amenity-exterior-pool2.jpg', 'Non autem cum voluptatem a enim vero excepturi non.'),
(55, '1987-03-20 02:21:19', 9, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', 'Quod sint est ipsum.'),
(56, '2016-12-15 14:43:03', 10, ' https://www.iretapartments.com/PropertyImage/15097407864-7176/display/Dylan-RiNo-Apartments-Soft-Close-Cabinets-Open-Shelving.jpg', 'Asperiores doloremque et sequi dolorem illum ipsam.'),
(57, '1993-09-01 15:30:07', 11, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', ''),
(58, '1986-07-12 23:35:37', 12, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', 'Vel voluptatem praesentium aut ab.'),
(59, '2001-07-20 22:59:41', 13, ' https://www.amli.com/AMLIContent/Files/apartments/chicago/lofts/amenity-exterior/lofts-amenity-exterior-pool2.jpg', 'Nemo mollitia nulla ut at eos ipsa.'),
(60, '2001-08-02 09:36:32', 14, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', ''),
(61, '1982-08-05 17:00:11', 15, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', ''),
(62, '1978-07-05 02:50:53', 16, ' http://emmahawkins.com/wp-content/uploads/2016/04/new-yorker-rotator.jpg', 'Sapiente qui distinctio in nihil eum qui et sint.'),
(63, '1977-03-16 11:02:52', 17, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', ''),
(64, '1977-06-30 14:54:16', 18, ' http://www.trimarkproperties.com/gainesville/camden-court/luxury-apartments/units/3br-2ba/search/1.jpg', 'Nihil ut impedit necessitatibus.'),
(65, '1990-06-29 16:46:59', 19, ' https://vuecharlotte.com/assets/images/cache/VUE_with_pool_straight1-rotator-9e02a91e8fe1b6a643fbe4f0ba19adde.jpg', 'Nihil ipsum aperiam ipsa possimus.'),
(66, '1970-10-19 18:38:53', 20, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', 'Maiores inventore sit enim.'),
(67, '1974-02-11 10:57:41', 21, ' https://hardwareapartments.com/app/uploads/2017/12/east2-1-991x567-c-center.jpg', 'Vero occaecati et quis et quos et doloribus molestias.'),
(68, '1974-09-20 12:31:02', 22, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-college-park/headers/2-header-image-camden-college-park-apartments-maryland-dmv.jpg', ''),
(69, '1976-09-23 21:37:38', 23, ' http://www.trimarkproperties.com/gainesville/camden-court/luxury-apartments/units/3br-2ba/search/1.jpg', ''),
(70, '2008-06-02 21:50:28', 24, 'https://cdn.vox-cdn.com/thumbor/pwGJpYJjHndJVqL6U-SFcPJlxGU=/0x0:4241x3336/1200x800/filters:focal(1782x1329:2460x2007)/cdn.vox-cdn.com/uploads/chorus_image/image/59404651/Oskar_Penthouse_Rendering_Hi_Res.0.jpg', 'Omnis natus quia alias maxime ad quis velit.'),
(71, '2014-04-05 05:33:46', 25, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-midtown-houston/headers/1-camden-midtown-apartments-houston-texas-two-resort-style-swimming-pools-grills.jpg', ''),
(72, '1996-11-15 04:55:16', 26, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-midtown-houston/headers/1-camden-midtown-apartments-houston-texas-two-resort-style-swimming-pools-grills.jpg', 'Placeat iusto cum aut ut et modi.'),
(73, '1999-02-20 18:14:56', 27, ' http://www.trimarkproperties.com/gainesville/sabal-palms/luxury-apartments/og.jpg', ''),
(74, '1984-05-11 17:45:06', 28, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', 'Dolores consequatur sunt dolorem quia repudiandae.'),
(75, '2004-07-09 22:36:10', 29, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', 'Et tempore dolor ipsa tempore et consectetur.'),
(76, '2007-08-07 10:52:45', 30, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', 'Rerum numquam dignissimos quae qui fugit quidem ut.'),
(77, '2014-01-24 13:05:13', 31, ' https://www.nbtu.org/wp-content/uploads/2018/06/image_20170409_101343_962.jpg', 'Soluta est sunt quasi culpa et.'),
(78, '1992-02-01 23:41:13', 32, ' https://content.makaan.com/1/674349/297/golden-apartments-elevation-1246447.jpeg?width=665&height=415', ''),
(79, '1993-11-09 11:41:48', 33, ' https://www.nbtu.org/wp-content/uploads/2018/06/image_20170409_101343_962.jpg', ''),
(80, '1975-10-05 02:53:07', 34, ' https://www.highlandhousewest.net/wp-content/uploads/2015/03/apartment-building-chevy-chase-md-1200x612.jpg', 'Et ratione voluptatum possimus laudantium rerum.'),
(81, '2017-04-17 04:47:36', 35, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', 'Accusamus beatae at sequi et fugiat est.'),
(82, '1992-04-01 13:13:43', 36, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', 'Sit odio iusto voluptates dolores.'),
(83, '1981-11-04 07:05:41', 37, ' https://images1.apartments.com/i2/zuaUa-FjipQvMwZND26ZKldKCclk0vOMoGGfsXcbmSU/111/eleanor-apartments-seattle-seattle-wa-primary-photo.jpg', 'Voluptatibus quos aut aperiam rerum.'),
(84, '1975-10-20 05:23:17', 38, ' https://www.nbtu.org/wp-content/uploads/2018/06/image_20170409_101343_962.jpg', ''),
(85, '1995-04-03 16:16:09', 39, ' https://www.decron.com/apartments-bridgecourt/wp-content/uploads/sites/55/2017/11/07-Bridgecourt-Apartments.jpg', 'Laborum mollitia odit ea fugiat qui reprehenderit sequi ad.'),
(86, '2002-12-21 17:20:27', 40, ' https://www.amli.com/AMLIContent/Files/apartments/chicago/lofts/amenity-exterior/lofts-amenity-exterior-pool2.jpg', 'Odit vel ad maxime distinctio sapiente.'),
(87, '1979-04-18 08:12:27', 41, ' https://www.columbuspm.org/wp-content/uploads/2015/11/IMG_8426-1400x700.jpg', 'Modi qui minus ex vero.'),
(88, '1993-06-20 19:05:08', 42, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', ''),
(89, '2001-09-04 16:38:31', 43, ' https://images.adsttc.com/media/images/573a/8931/e58e/ce15/df00/006e/newsletter/KUD-Spectrum_002.jpg?1463453993', 'Alias dolorum odio ex et et.'),
(90, '1997-02-06 09:47:35', 44, ' http://www.trimarkproperties.com/gainesville/sabal-palms/luxury-apartments/og.jpg', ''),
(91, '2007-06-01 07:46:44', 45, 'https://cdn.vox-cdn.com/thumbor/pwGJpYJjHndJVqL6U-SFcPJlxGU=/0x0:4241x3336/1200x800/filters:focal(1782x1329:2460x2007)/cdn.vox-cdn.com/uploads/chorus_image/image/59404651/Oskar_Penthouse_Rendering_Hi_Res.0.jpg', 'Aperiam sit corporis illum assumenda voluptas aut.'),
(92, '2003-09-21 20:42:25', 69, ' http://www.gbdarchitects.com/wp-content/uploads/2013/09/Kiln-Apartments-1-2500x1406.jpg', ''),
(93, '2018-04-29 01:54:16', 1, ' http://www.trimarkproperties.com/gainesville/camden-court/luxury-apartments/units/3br-2ba/search/1.jpg', ''),
(94, '1980-04-29 07:44:57', 2, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', 'Accusamus minus et nulla cupiditate.'),
(95, '2017-04-03 19:40:46', 3, ' https://voltaapartments.com/wp/wp-content/uploads/2015/01/vol-50.jpg', ''),
(96, '1988-10-19 17:24:14', 4, ' https://images.adsttc.com/media/images/573a/8931/e58e/ce15/df00/006e/newsletter/KUD-Spectrum_002.jpg?1463453993', ''),
(97, '2007-10-14 03:26:19', 5, ' https://content.makaan.com/1/674349/297/golden-apartments-elevation-1246447.jpeg?width=665&height=415', ''),
(98, '1971-12-13 08:12:38', 6, ' https://irp-cdn.multiscreensite.com/1f53f13b/dms3rep/multi/mobile/Apartment-Atkinson-NH-4032x2268.jpg', ''),
(99, '2001-04-06 10:36:16', 7, ' http://emmahawkins.com/wp-content/uploads/2016/04/new-yorker-rotator.jpg', ''),
(100, '1977-01-12 11:55:57', 8, ' https://www.interpointeapartments.com/gridmedia/img/slide4.jpg', 'Qui molestiae qui quis adipisci.'),
(101, '1987-03-17 13:27:28', 9, ' https://www.nbtu.org/wp-content/uploads/2018/06/image_20170409_101343_962.jpg', ''),
(102, '1985-05-08 07:31:25', 10, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', ''),
(103, '1987-01-10 15:55:37', 11, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', 'Maiores mollitia dolorum esse nostrum aut modi.'),
(104, '1990-05-30 03:39:58', 12, ' http://www.yarealty.com/image/6325/600', 'Cum nemo est ex explicabo quo eos.'),
(105, '1987-06-26 04:15:47', 13, ' https://images1.apartments.com/i2/F8cnhz_z393ze7sOTM3wMTljMBtau99-bHfpP5gmkBg/111/southport-apartments-belleville-mi-primary-photo.jpg', 'Odit et amet ut voluptatem et accusamus debitis.'),
(106, '1973-10-05 07:24:18', 14, ' https://t-ec.bstatic.com/images/hotel/max1024x768/718/71874497.jpg', ''),
(107, '2008-04-06 04:17:49', 15, ' https://platformapartments.com/assets/images/cache/home_videoimage-09dfa5fd1c7c77d91bc5e45f785ca14e.jpg', 'Et voluptatibus aliquam architecto et pariatur aut impedit.'),
(108, '1993-06-04 08:58:50', 16, ' https://topazhouse.com/wp-content/uploads/2015/08/efficiency-apartments-bethesda-md-1200x550.jpg', 'Reprehenderit soluta rerum officiis eum.'),
(109, '1992-07-29 03:13:23', 17, ' https://www.gannett-cdn.com/presto/2018/12/05/PPHX/5778a77f-be05-4ea6-b123-48b772143e2a-kierland.jpg?width=534&height=401&fit=bounds&auto=webp', ''),
(110, '1984-08-09 15:21:48', 18, ' https://im.proptiger.com/1/1493340/6/estate-apartments-elevation-11051772.jpeg', ''),
(111, '1998-11-24 23:28:37', 19, ' https://www.borgermanagement.com/uploads/images/images/original/241026/001_1221_Massachusetts_Avenue_NW_175065_189874.jpg?1496191644', ''),
(112, '2007-04-22 14:59:44', 20, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', ''),
(113, '2013-07-30 10:14:33', 21, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', ''),
(114, '1981-08-12 07:42:49', 22, 'https://cdn.vox-cdn.com/thumbor/pwGJpYJjHndJVqL6U-SFcPJlxGU=/0x0:4241x3336/1200x800/filters:focal(1782x1329:2460x2007)/cdn.vox-cdn.com/uploads/chorus_image/image/59404651/Oskar_Penthouse_Rendering_Hi_Res.0.jpg', 'Quis qui distinctio sit in unde vel.'),
(115, '1984-06-05 14:57:43', 23, ' https://www.1550bayapts.com/wp-content/uploads/sites/46/2014/11/cn_1550Bay_pool_0030-1-950x460.jpg', ''),
(116, '1970-08-17 00:24:20', 24, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', 'Explicabo repudiandae occaecati itaque dolore.'),
(117, '2004-08-02 05:18:03', 25, ' https://image1.apartmentfinder.com/i2/Uh7pU-5z2gxB-ly2VsPGufzUCh0zPkDZH1YOZKjU6u8/110/cielo-apartments-charlotte-nc-saltwater-pool-and-courtyard.jpg', ''),
(118, '1972-01-26 09:55:49', 26, ' https://im.proptiger.com/1/1493340/6/estate-apartments-elevation-11051772.jpeg', 'Similique dolores esse autem exercitationem velit tempora nihil.'),
(119, '1994-11-21 04:08:54', 27, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', 'Expedita quod adipisci minus.'),
(120, '1984-02-14 19:29:27', 28, ' http://www.trimarkproperties.com/gainesville/camden-court/luxury-apartments/units/3br-2ba/search/1.jpg', 'Minima consequatur est delectus fugiat eum.'),
(121, '1980-02-05 05:51:21', 29, ' http://aptfinder.org/gallery/Adriana_1.jpg', ''),
(122, '1996-01-04 06:27:24', 30, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', ''),
(123, '2005-01-15 23:22:08', 31, ' https://images1.apartments.com/i2/a2ZD1_lw0U_URXsno5QAv-osFhz8_w13FoifHr6vbzs/111/pure-fillmore-apartments-phoenix-az-primary-photo.jpg', 'Voluptate voluptatum consectetur iste repellat est aut modi cum.'),
(124, '1972-07-27 21:16:09', 32, ' https://images.adsttc.com/media/images/573a/8931/e58e/ce15/df00/006e/newsletter/KUD-Spectrum_002.jpg?1463453993', ''),
(125, '1996-07-23 09:35:52', 33, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', ''),
(126, '1979-07-09 19:20:02', 34, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-midtown-houston/headers/1-camden-midtown-apartments-houston-texas-two-resort-style-swimming-pools-grills.jpg', ''),
(127, '1991-04-29 20:23:26', 35, ' https://cdnblog.rentcafe.com/blog/wp-content/uploads/2016/04/The-Madison-at-Racine-Apartments-in-Chicago-2.jpg', 'Voluptate unde accusamus et voluptatibus culpa consequatur sit magnam.'),
(128, '1972-02-17 22:51:35', 36, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', 'Similique vel esse iure et sapiente.'),
(129, '2011-07-31 05:22:26', 37, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-midtown-houston/headers/1-camden-midtown-apartments-houston-texas-two-resort-style-swimming-pools-grills.jpg', 'Nihil voluptatem ea dolorem maiores quidem vitae aut.'),
(130, '1999-01-04 21:50:52', 38, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', ''),
(131, '1989-03-07 07:23:44', 39, ' https://irp-cdn.multiscreensite.com/1f53f13b/dms3rep/multi/mobile/Apartment-Atkinson-NH-4032x2268.jpg', ''),
(132, '1991-06-04 13:50:10', 40, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', ''),
(133, '2015-01-02 05:53:42', 41, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', 'Voluptatem eum qui facere consequatur aut.'),
(134, '1983-01-16 20:43:01', 42, ' https://images.adsttc.com/media/images/573a/8931/e58e/ce15/df00/006e/newsletter/KUD-Spectrum_002.jpg?1463453993', ''),
(135, '1996-06-19 23:50:01', 43, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', 'Perferendis recusandae voluptatem laboriosam est.'),
(136, '1996-12-10 13:29:44', 44, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', ''),
(137, '2002-01-10 16:52:35', 45, ' https://images1.apartments.com/i2/a2ZD1_lw0U_URXsno5QAv-osFhz8_w13FoifHr6vbzs/111/pure-fillmore-apartments-phoenix-az-primary-photo.jpg', 'Distinctio minima numquam rerum voluptatem voluptatem.'),
(138, '1998-05-07 12:40:09', 69, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', ''),
(139, '1974-05-20 17:32:22', 1, ' http://www.gbdarchitects.com/wp-content/uploads/2013/09/Kiln-Apartments-1-2500x1406.jpg', ''),
(140, '1997-06-03 21:48:14', 2, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', 'Illum ab et et nostrum est.'),
(141, '1999-10-20 18:18:59', 3, ' https://voltaapartments.com/wp/wp-content/uploads/2015/01/vol-50.jpg', 'Libero qui nam nobis et.'),
(142, '1973-02-14 14:20:46', 4, ' https://assets3.thrillist.com/v1/image/1891766/size/tmg-article_default_mobile.jpg', ''),
(143, '2005-12-21 02:43:51', 5, ' https://www.borgermanagement.com/uploads/images/images/original/241026/001_1221_Massachusetts_Avenue_NW_175065_189874.jpg?1496191644', 'Recusandae excepturi architecto et voluptatem reprehenderit ex et sit.'),
(144, '2015-09-05 11:54:41', 6, ' https://images1.apartments.com/i2/a2ZD1_lw0U_URXsno5QAv-osFhz8_w13FoifHr6vbzs/111/pure-fillmore-apartments-phoenix-az-primary-photo.jpg', 'Corrupti expedita incidunt rerum qui assumenda velit commodi.'),
(145, '2001-10-25 12:04:02', 7, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-noma/headers/camden-noma-apartments-washington-dc-metro-rooftop-entertainment-lounge.jpg?itok=EKRGE0Sr×tamp=1531238079', 'Delectus ut et aut odit ad.'),
(146, '2016-08-15 02:45:01', 8, ' http://www.trimarkproperties.com/gainesville/camden-court/luxury-apartments/units/3br-2ba/search/1.jpg', ''),
(147, '1992-04-09 09:42:06', 9, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', ''),
(148, '1979-10-30 21:34:25', 10, ' https://cache.marriott.com/marriottassets/marriott/BKKSP/bkksp-apartments-1363-hor-feat.jpg?interpolation=progressive-bilinear&downsize=1180px:*', ''),
(149, '2015-11-26 09:05:31', 11, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', 'Reprehenderit exercitationem eos debitis maiores eos.'),
(150, '2000-03-05 05:46:01', 12, ' http://aptfinder.org/gallery/Adriana_1.jpg', ''),
(151, '1988-03-19 01:58:51', 13, ' https://images1.apartments.com/i2/a2ZD1_lw0U_URXsno5QAv-osFhz8_w13FoifHr6vbzs/111/pure-fillmore-apartments-phoenix-az-primary-photo.jpg', ''),
(152, '1978-11-19 03:52:29', 14, ' https://www.highlandhousewest.net/wp-content/uploads/2015/03/apartment-building-chevy-chase-md-1200x612.jpg', 'Ut eaque dolores sequi perspiciatis id.'),
(153, '1988-09-04 15:15:57', 15, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', 'Necessitatibus doloribus atque sit totam.'),
(154, '2004-04-18 18:32:00', 16, ' https://www.highlandhousewest.net/wp-content/uploads/2015/03/apartment-building-chevy-chase-md-1200x612.jpg', ''),
(155, '1987-05-05 23:44:58', 17, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', ''),
(156, '2012-03-14 21:12:42', 18, ' https://assets3.thrillist.com/v1/image/1891766/size/tmg-article_default_mobile.jpg', 'Culpa nostrum et non accusantium doloremque qui.'),
(157, '1981-05-11 17:09:24', 19, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', ''),
(158, '1979-07-19 16:41:07', 20, ' https://hardwareapartments.com/app/uploads/2017/12/east2-1-991x567-c-center.jpg', ''),
(159, '1989-11-20 02:00:14', 21, ' https://www.interpointeapartments.com/gridmedia/img/slide4.jpg', 'Ea commodi vero perferendis suscipit ad.'),
(160, '1993-10-08 13:24:41', 22, ' https://assets3.thrillist.com/v1/image/1891766/size/tmg-article_default_mobile.jpg', 'Et facilis nihil voluptas voluptatem.'),
(161, '1986-08-23 20:19:22', 23, ' http://www.trimarkproperties.com/gainesville/sabal-palms/luxury-apartments/og.jpg', ''),
(162, '1999-04-26 07:07:24', 24, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', ''),
(163, '2002-02-19 06:02:52', 25, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', 'Nisi magnam sint ut aut dicta.'),
(164, '1979-04-17 20:54:37', 26, ' https://im.proptiger.com/1/1493340/6/estate-apartments-elevation-11051772.jpeg', ''),
(165, '1986-07-12 12:47:58', 27, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', 'Sint nam odio autem maiores dolores repellat hic asperiores.'),
(166, '1974-01-28 10:37:42', 28, ' https://www.1550bayapts.com/wp-content/uploads/sites/46/2014/11/cn_1550Bay_pool_0030-1-950x460.jpg', 'Est fuga et harum magnam illum.'),
(167, '1978-06-12 00:25:54', 29, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', 'Quis non repellendus vel.'),
(168, '1982-03-02 18:12:16', 30, ' https://images4.roofandfloor.com/listing_c1c159dd1c36755f7967670f03b87a45/1024x600/imperial-villas-apartments-in-kuniyamuthur-elevation-photo-1cti.jpg', ''),
(169, '2018-02-06 07:08:26', 31, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', 'Aliquid natus soluta reiciendis officia ad.'),
(170, '1970-07-09 21:42:40', 32, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', 'Aut ut minus corporis consequuntur fuga totam dolorem.'),
(171, '2000-09-07 21:28:52', 33, ' http://www.yarealty.com/image/6325/600', 'Ea placeat provident omnis.'),
(172, '2002-10-16 04:09:26', 34, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', ''),
(173, '2005-10-30 23:19:41', 35, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', 'Impedit sequi est provident ut rerum aut cum eum.'),
(174, '1973-04-25 19:49:12', 36, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', ''),
(175, '1974-01-06 10:42:15', 37, ' https://images1.apartments.com/i2/F8cnhz_z393ze7sOTM3wMTljMBtau99-bHfpP5gmkBg/111/southport-apartments-belleville-mi-primary-photo.jpg', 'Fugit quia molestiae et illo voluptatem.'),
(176, '1988-11-20 11:29:51', 38, ' https://www.interpointeapartments.com/gridmedia/img/slide4.jpg', ''),
(177, '1987-09-23 11:17:27', 39, ' https://cache.marriott.com/marriottassets/marriott/BKKSP/bkksp-apartments-1363-hor-feat.jpg?interpolation=progressive-bilinear&downsize=1180px:*', 'Voluptatem quis molestiae rerum quam.'),
(178, '2013-03-01 10:41:33', 40, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', 'Sed dolore iure at qui enim adipisci.'),
(179, '1987-10-04 20:56:47', 41, ' https://www.1550bayapts.com/wp-content/uploads/sites/46/2014/11/cn_1550Bay_pool_0030-1-950x460.jpg', 'Sed aut soluta ratione sit esse.'),
(180, '2008-09-16 08:49:50', 42, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', ''),
(181, '1984-01-18 08:01:44', 43, ' https://cdnblog.rentcafe.com/blog/wp-content/uploads/2016/04/The-Madison-at-Racine-Apartments-in-Chicago-2.jpg', ''),
(182, '1992-05-09 10:56:24', 44, ' http://www.trimarkproperties.com/gainesville/sabal-palms/luxury-apartments/og.jpg', ''),
(183, '1972-06-09 08:42:10', 45, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', 'Ipsam aut distinctio deleniti explicabo dolorem et.'),
(184, '2003-06-21 03:01:39', 69, ' https://www.amli.com/AMLIContent/Files/apartments/chicago/lofts/amenity-exterior/lofts-amenity-exterior-pool2.jpg', 'Repellat eligendi odit et suscipit et at dignissimos occaecati.'),
(185, '1990-11-05 00:32:35', 1, ' https://www.decron.com/apartments-bridgecourt/wp-content/uploads/sites/55/2017/11/07-Bridgecourt-Apartments.jpg', ''),
(186, '1999-08-08 21:52:19', 2, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', ''),
(187, '1983-01-10 10:15:50', 3, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', 'Consequatur commodi velit aut quaerat.'),
(188, '1971-05-28 19:58:56', 4, ' https://www.highlandhousewest.net/wp-content/uploads/2015/03/apartment-building-chevy-chase-md-1200x612.jpg', ''),
(189, '1973-10-24 16:57:08', 5, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', 'Quos qui quo ut ad quia et sunt.'),
(190, '2005-09-01 04:42:27', 6, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', ''),
(191, '2016-08-30 00:30:45', 7, ' https://content.makaan.com/1/674349/297/golden-apartments-elevation-1246447.jpeg?width=665&height=415', ''),
(192, '2005-11-26 05:26:23', 8, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', ''),
(193, '2001-08-18 10:10:11', 9, ' https://content.makaan.com/1/674349/297/golden-apartments-elevation-1246447.jpeg?width=665&height=415', ''),
(194, '1981-12-22 17:53:31', 10, ' https://www.amli.com/AMLIContent/Files/apartments/chicago/lofts/amenity-exterior/lofts-amenity-exterior-pool2.jpg', ''),
(195, '1995-02-14 19:44:58', 11, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', 'Rerum consequuntur soluta sunt unde nihil.'),
(196, '1985-10-19 09:40:59', 12, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', ''),
(197, '1972-04-29 17:30:35', 13, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', 'Expedita fugiat voluptatem sapiente.'),
(198, '2003-06-04 14:44:06', 14, ' https://assets3.thrillist.com/v1/image/1891766/size/tmg-article_default_mobile.jpg', 'Cupiditate inventore numquam voluptas saepe et at magnam dolor.'),
(199, '2002-07-07 05:18:44', 15, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-college-park/headers/2-header-image-camden-college-park-apartments-maryland-dmv.jpg', 'Modi et quibusdam odit illum laboriosam.'),
(200, '2009-06-01 15:54:41', 16, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', ''),
(201, '1986-02-16 01:40:02', 17, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', ''),
(202, '1992-10-05 10:59:12', 18, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-noma/headers/camden-noma-apartments-washington-dc-metro-rooftop-entertainment-lounge.jpg?itok=EKRGE0Sr×tamp=1531238079', 'Porro eius placeat modi harum velit corporis culpa.'),
(203, '2007-10-23 05:18:54', 19, ' https://cache.marriott.com/marriottassets/marriott/BKKSP/bkksp-apartments-1363-hor-feat.jpg?interpolation=progressive-bilinear&downsize=1180px:*', 'Ipsa perferendis illum nihil consectetur.'),
(204, '2014-08-22 22:00:44', 20, ' http://aptfinder.org/gallery/Adriana_1.jpg', ''),
(205, '2018-04-16 23:56:14', 21, ' https://topazhouse.com/wp-content/uploads/2015/08/efficiency-apartments-bethesda-md-1200x550.jpg', 'Et qui asperiores culpa sit et nulla enim quisquam.'),
(206, '1992-02-18 22:57:22', 22, ' https://images1.apartments.com/i2/zuaUa-FjipQvMwZND26ZKldKCclk0vOMoGGfsXcbmSU/111/eleanor-apartments-seattle-seattle-wa-primary-photo.jpg', 'Similique repellendus sint vel.'),
(207, '2017-06-22 13:56:57', 23, ' https://voltaapartments.com/wp/wp-content/uploads/2015/01/vol-50.jpg', 'Vel fugiat facere et modi ducimus facilis.'),
(208, '2010-01-19 04:44:47', 24, ' https://vuecharlotte.com/assets/images/cache/VUE_with_pool_straight1-rotator-9e02a91e8fe1b6a643fbe4f0ba19adde.jpg', ''),
(209, '1980-03-19 11:48:07', 25, ' https://www.highlandhousewest.net/wp-content/uploads/2015/03/apartment-building-chevy-chase-md-1200x612.jpg', 'Non voluptatum et consequatur nobis voluptas.'),
(210, '1998-04-18 02:53:34', 26, ' https://t-ec.bstatic.com/images/hotel/max1024x768/718/71874497.jpg', ''),
(211, '2012-05-27 01:30:26', 27, ' http://aptfinder.org/gallery/Adriana_1.jpg', ''),
(212, '1979-01-22 18:27:41', 28, ' https://assets3.thrillist.com/v1/image/1891766/size/tmg-article_default_mobile.jpg', 'Qui quia doloribus quia corrupti dolorem necessitatibus quia.'),
(213, '2015-10-27 09:41:39', 29, ' https://cdnspimgsulekhalive.azureedge.net/cdn/images/property/project/detail/galaxy-apartments-projectimagelogo_2017090710550738482.jpg', 'Veritatis et placeat ullam a omnis quasi.'),
(214, '2018-09-16 07:13:32', 30, ' http://www.trimarkproperties.com/gainesville/camden-court/luxury-apartments/units/3br-2ba/search/1.jpg', ''),
(215, '2009-01-15 09:42:50', 31, ' https://irp-cdn.multiscreensite.com/1f53f13b/dms3rep/multi/mobile/Apartment-Atkinson-NH-4032x2268.jpg', 'Laudantium dolorem eos est culpa corrupti magnam molestiae.'),
(216, '2015-05-13 23:08:36', 32, ' https://cdnblog.rentcafe.com/blog/wp-content/uploads/2016/04/The-Madison-at-Racine-Apartments-in-Chicago-2.jpg', ''),
(217, '2005-01-11 04:22:19', 33, ' https://images1.apartments.com/i2/QRBpP24p7bbBFSPje4vpGGNrsctTrTdFU1X1PgQVy1c/117/parklane-apartments-gaithersburg-md-primary-photo.jpg', 'Ut id voluptas qui in et optio optio adipisci.'),
(218, '1996-07-28 06:33:19', 34, ' https://irp-cdn.multiscreensite.com/1f53f13b/dms3rep/multi/mobile/Apartment-Atkinson-NH-4032x2268.jpg', 'Expedita esse provident laudantium tempora laborum libero ut.'),
(219, '2012-03-09 03:02:26', 35, ' http://www.gbdarchitects.com/wp-content/uploads/2013/09/Kiln-Apartments-1-2500x1406.jpg', 'Repudiandae totam magni assumenda quam architecto.'),
(220, '1976-10-24 10:59:31', 36, ' https://t-ec.bstatic.com/images/hotel/max1024x768/718/71874497.jpg', 'Est maxime omnis dolores recusandae corrupti sed.'),
(221, '1990-10-06 07:53:56', 37, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', 'Dolorem quia itaque magnam.'),
(222, '1998-07-03 21:02:28', 38, ' https://platformapartments.com/assets/images/cache/home_videoimage-09dfa5fd1c7c77d91bc5e45f785ca14e.jpg', ''),
(223, '2006-06-20 12:45:57', 39, ' https://www.cwsapartments.com/uploads/images/images/original/303351/13.jpg?1515615123', 'Ut ipsam optio non ipsum ea possimus.'),
(224, '2011-03-09 16:01:38', 40, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/community/camden-midtown-houston/headers/1-camden-midtown-apartments-houston-texas-two-resort-style-swimming-pools-grills.jpg', ''),
(225, '1986-05-01 03:04:02', 41, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', ''),
(226, '2011-02-15 23:37:54', 42, ' https://cdngeneral.rentcafe.com/dmslivecafe/3/622878/slider_The-Gallery-Apartments-1020.jpg?quality=85&scale=both&', 'Necessitatibus id occaecati repellendus.'),
(227, '2018-05-28 00:32:37', 43, ' http://www.kyronn.com.au/images/apartments/FrontView_Artist-Impression.jpg', 'Et delectus impedit culpa.'),
(228, '2006-03-25 22:52:00', 44, ' https://voltaapartments.com/wp/wp-content/uploads/2015/01/vol-50.jpg', ''),
(229, '1999-08-01 19:05:49', 45, ' http://www.trimarkproperties.com/gainesville/camden-court/luxury-apartments/units/3br-2ba/search/1.jpg', 'Amet magnam dolor eos eveniet cumque qui suscipit dolor.'),
(230, '1991-09-12 19:06:37', 69, ' https://hardwareapartments.com/app/uploads/2017/12/east2-1-991x567-c-center.jpg', 'Et expedita consequatur tempora reprehenderit hic omnis.'),
(231, '2005-12-14 10:12:04', 1, ' https://irp-cdn.multiscreensite.com/1f53f13b/dms3rep/multi/mobile/Apartment-Atkinson-NH-4032x2268.jpg', ''),
(232, '2006-07-15 08:39:00', 2, ' https://voltaapartments.com/wp/wp-content/uploads/2015/01/vol-50.jpg', ''),
(233, '1973-01-04 00:40:57', 3, ' https://cdnspimgsulekhalive.azureedge.net/cdn/images/property/project/detail/galaxy-apartments-projectimagelogo_2017090710550738482.jpg', 'Inventore quos excepturi ipsum illo quo officiis.'),
(234, '1991-07-14 16:00:11', 4, ' https://www.iretapartments.com/PropertyImage/15097407864-7176/display/Dylan-RiNo-Apartments-Soft-Close-Cabinets-Open-Shelving.jpg', 'Non expedita sapiente provident.'),
(235, '1996-01-09 03:36:38', 5, ' http://www.trimarkproperties.com/gainesville/sabal-palms/luxury-apartments/og.jpg', ''),
(236, '1977-08-20 16:19:25', 6, ' https://cdnspimgsulekhalive.azureedge.net/cdn/images/property/project/detail/galaxy-apartments-projectimagelogo_2017090710550738482.jpg', 'Aut ipsum dolorem repellendus.'),
(237, '1981-04-14 10:27:44', 7, ' https://t-ec.bstatic.com/images/hotel/max1024x768/102/102154593.jpg', 'Sint fuga dolores consequatur aut in.'),
(238, '1978-03-02 00:35:48', 8, ' https://hslproperties.com/wp-content/uploads/2015/06/apartments-tucson.jpg', ''),
(239, '2000-07-18 13:23:03', 9, ' https://im.proptiger.com/1/1493340/6/estate-apartments-elevation-11051772.jpeg', ''),
(240, '2017-08-29 11:07:55', 10, ' https://www.heartmilanapartments.com/wp-content/uploads/Heart-Milan-Apartments-home.jpg', 'Commodi sunt est in odit libero repellendus sapiente.'),
(241, '2001-06-07 19:36:41', 11, ' https://cdnblog.rentcafe.com/blog/wp-content/uploads/2016/04/The-Madison-at-Racine-Apartments-in-Chicago-2.jpg', 'Aut minus nihil voluptas.'),
(242, '2001-11-21 22:17:49', 12, ' http://www.halc.info/photos/fisterra-gardens-apartments-sm.jpg', ''),
(243, '1993-02-23 15:21:40', 13, ' https://topazhouse.com/wp-content/uploads/2015/08/efficiency-apartments-bethesda-md-1200x550.jpg', 'Vel facilis vel eius aliquam.'),
(244, '1993-06-20 08:32:06', 14, ' https://wp.zillowstatic.com/naked-apartments/wp-content/uploads/sites/1/2011/07/avg_rent_NYC-188b38.jpg', 'Iste saepe enim tenetur unde.'),
(245, '2007-09-14 16:04:22', 15, ' https://im.proptiger.com/1/1493340/6/estate-apartments-elevation-11051772.jpeg', ''),
(246, '1992-12-19 20:12:02', 16, ' https://t-ec.bstatic.com/images/hotel/max1024x768/718/71874497.jpg', ''),
(247, '2005-03-09 01:11:54', 17, ' https://topazhouse.com/wp-content/uploads/2015/08/efficiency-apartments-bethesda-md-1200x550.jpg', ''),
(248, '1974-07-19 17:57:34', 18, ' https://1-aegir0-camdenliving-com45.s3.amazonaws.com/styles/_min-width___480px_/s3/community/camden-main-and-jamboree/headers/camden-main-and-jamboree-apartments-irvine-ca-pool.jpg?itok=YA1i9-HF×tamp=1526050886', ''),
(249, '1977-01-16 06:57:41', 19, ' https://www.nbtu.org/wp-content/uploads/2018/06/image_20170409_101343_962.jpg', 'Quis in distinctio ex aut.'),
(250, '1993-09-05 22:15:43', 20, ' https://www.decron.com/apartments-bridgecourt/wp-content/uploads/sites/55/2017/11/07-Bridgecourt-Apartments.jpg', 'Culpa iusto et ipsam voluptatum velit dolores molestias.');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `ID` int(11) NOT NULL,
  `addressID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postName` text NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `expectedRentPerMonth` double NOT NULL,
  `squareFootage` int(11) NOT NULL,
  `bedroomCount` int(11) NOT NULL,
  `bathroomCount` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`ID`, `addressID`, `userID`, `addDate`, `lastUpdated`, `postName`, `available`, `expectedRentPerMonth`, `squareFootage`, `bedroomCount`, `bathroomCount`, `details`) VALUES
(1, 1, 1, '2018-11-29 03:23:35', '2018-11-29 03:23:35', 'M.B1.A1', 1, 750, 950, 1, 1, 'Single Bedroom'),
(2, 2, 1, '2018-11-29 03:25:11', '2018-11-29 03:25:11', 'M.B1.A2', 1, 900, 1000, 2, 1, 'Double Bedroom, Shared Bathroom'),
(3, 3, 1, '2018-11-29 03:26:41', '2018-11-29 03:26:41', 'M.B1.A3', 1, 800, 900, 1, 1, 'Single Bedroom'),
(4, 4, 1, '2018-11-29 03:30:14', '2018-11-29 03:30:14', 'M.B2.A1', 1, 950, 800, 1, 1, 'Single Bedroom'),
(5, 5, 1, '2018-11-29 03:30:57', '2018-11-29 03:30:57', 'M.B2.A2', 1, 1100, 1200, 2, 2, 'Double Bedroom'),
(6, 6, 1, '2018-11-29 03:31:42', '2018-11-29 03:31:42', 'M.B2.A3', 1, 500, 750, 1, 1, 'Single Bedroom'),
(7, 7, 1, '2018-11-29 03:36:15', '2018-11-29 03:36:15', 'M.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(8, 8, 1, '2018-11-29 03:36:15', '2018-11-29 03:36:15', 'M.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(9, 9, 1, '2018-11-29 03:36:15', '2018-11-29 03:36:15', 'M.B3.A3', 1, 550, 750, 1, 1, 'Single Bedroom'),
(10, 10, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B1.A1', 1, 520, 750, 1, 1, 'Single Bedroom'),
(11, 11, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B1.A2', 1, 640, 750, 1, 1, 'Single Bedroom'),
(12, 12, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B1.A3', 1, 600, 750, 1, 1, 'Single Bedroom'),
(13, 13, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B2.A1', 1, 610, 750, 1, 1, 'Single Bedroom'),
(14, 14, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B2.A2', 1, 740, 750, 1, 1, 'Single Bedroom'),
(15, 15, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B2.A3', 1, 700, 750, 1, 1, 'Single Bedroom'),
(16, 16, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B3.A1', 1, 720, 750, 1, 1, 'Single Bedroom'),
(17, 17, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B3.A2', 1, 850, 750, 1, 1, 'Single Bedroom'),
(18, 18, 2, '2018-11-29 03:37:59', '2018-11-29 03:37:59', 'N.B3.A3', 1, 860, 750, 1, 1, 'Single Bedroom'),
(19, 19, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B1.A1', 1, 890, 750, 1, 1, 'Single Bedroom'),
(20, 20, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B1.A2', 1, 400, 750, 1, 1, 'Single Bedroom'),
(21, 21, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B1.A3', 1, 450, 750, 1, 1, 'Single Bedroom'),
(22, 22, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B2.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(23, 23, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B2.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(24, 24, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(25, 25, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(26, 26, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(27, 27, 3, '2018-11-29 03:39:27', '2018-11-29 03:39:27', 'S.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(28, 28, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B1.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(29, 29, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B1.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(30, 30, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B1.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(31, 31, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B2.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(32, 32, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B2.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(33, 33, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(34, 34, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(35, 35, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(36, 36, 4, '2018-11-29 03:40:53', '2018-11-29 03:40:53', 'E.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(37, 37, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B1.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(38, 38, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B1.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(39, 39, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B1.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(40, 40, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B2.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(41, 41, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B2.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(42, 42, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(43, 43, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(44, 44, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(45, 45, 5, '2018-11-29 03:42:42', '2018-11-29 03:42:42', 'W.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(69, 69, 2, '2018-12-07 01:25:22', '2018-12-07 01:25:22', 'Debugging Property', 1, 1000, 900, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` text NOT NULL,
  `encryptedPassword` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `addDate`, `email`, `encryptedPassword`, `name`) VALUES
(1, '2018-11-29 03:22:39', 'z@Chen.com', '$2y$10$6Tcc4Jw1.iN0zEU9QXhnZ.3WIy7qTlvjyKZGJzi1S0RMU27lCcQJm', 'Zhixiang Chen'),
(2, '2018-12-03 08:18:02', 'jafet@reyes.com', '$2y$10$L3/ttidBRuLBTbDVPLJCSehaNBSN0qCurRKP/o86FwQPosh1PYivi', 'Jafet Reyes'),
(3, '2018-11-29 03:22:45', 'b@Cancel.com', '$2y$10$Abcn5liCO35zfDuKGgzEaOOmO37k1hqMDMMrJuiAsfP0Z9w1EWeUq', 'Bryan Cancel'),
(4, '2018-11-29 03:22:47', 'j@Guerrero.com', '$2y$10$53WshITNu79fB403gmIbgOEBmewACdZIdIeEl4FDoYkmTz.tAZ2Pi', 'Jerry Guerrero'),
(5, '2018-11-29 03:42:22', 'e@Musk.com', '$2y$10$hiPo0TVwEL5JRmy90YHZ2uQDPzXczjfVLWxmqYemPr1IdxrA.RDMy', 'Elon Musk');

-- --------------------------------------------------------

--
-- Table structure for table `utility`
--

CREATE TABLE `utility` (
  `utilityNumberID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `utilityTypeID` int(11) NOT NULL,
  `details` text,
  `available` tinyint(1) DEFAULT '1',
  `includedInRent` tinyint(1) DEFAULT '1',
  `expectedCostPerMonth` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility`
--

INSERT INTO `utility` (`utilityNumberID`, `propertyID`, `utilityTypeID`, `details`, `available`, `includedInRent`, `expectedCostPerMonth`) VALUES
(53, 1, 1, NULL, 1, 0, 0),
(54, 2, 2, NULL, 0, 1, 0),
(55, 3, 3, NULL, 0, 1, 0),
(56, 4, 4, NULL, 0, 0, 0),
(57, 5, 5, NULL, 0, 1, 0),
(58, 6, 6, NULL, 0, 0, 0),
(59, 7, 7, NULL, 1, 1, 0),
(60, 8, 8, NULL, 0, 1, 0),
(61, 9, 9, NULL, 0, 0, 0),
(62, 10, 10, NULL, 0, 1, 0),
(63, 11, 11, NULL, 1, 1, 0),
(64, 12, 12, NULL, 0, 1, 0),
(65, 13, 17, NULL, 1, 1, 0),
(66, 14, 18, NULL, 1, 0, 0),
(67, 15, 19, NULL, 1, 0, 0),
(68, 16, 1, NULL, 1, 0, 0),
(69, 17, 2, NULL, 0, 1, 0),
(70, 18, 3, NULL, 0, 1, 0),
(71, 19, 4, NULL, 0, 0, 0),
(72, 20, 5, NULL, 1, 0, 0),
(73, 21, 6, NULL, 1, 1, 0),
(74, 22, 7, NULL, 1, 0, 0),
(75, 23, 8, NULL, 0, 0, 0),
(76, 24, 9, NULL, 0, 1, 0),
(77, 25, 10, NULL, 0, 1, 0),
(78, 26, 11, NULL, 1, 1, 0),
(79, 27, 12, NULL, 0, 1, 0),
(80, 28, 17, NULL, 1, 1, 0),
(81, 29, 18, NULL, 1, 0, 0),
(82, 30, 19, NULL, 1, 1, 0),
(83, 31, 1, NULL, 0, 0, 0),
(84, 32, 2, NULL, 0, 0, 0),
(85, 33, 3, NULL, 0, 1, 0),
(86, 34, 4, NULL, 0, 1, 0),
(87, 35, 5, NULL, 1, 0, 0),
(88, 36, 6, NULL, 1, 0, 0),
(89, 37, 7, NULL, 1, 0, 0),
(90, 38, 8, NULL, 1, 0, 0),
(91, 39, 9, NULL, 0, 0, 0),
(92, 40, 10, NULL, 0, 1, 0),
(93, 41, 11, NULL, 1, 0, 0),
(94, 42, 12, NULL, 0, 0, 0),
(95, 43, 17, NULL, 0, 1, 0),
(96, 44, 18, NULL, 0, 1, 0),
(97, 45, 19, NULL, 1, 1, 0),
(98, 69, 1, NULL, 1, 0, 0),
(99, 1, 2, NULL, 0, 0, 0),
(100, 2, 3, NULL, 0, 1, 0),
(101, 3, 4, NULL, 0, 1, 0),
(102, 4, 5, NULL, 1, 1, 0),
(103, 5, 6, NULL, 0, 1, 0),
(104, 6, 7, NULL, 1, 0, 0),
(105, 7, 8, NULL, 1, 1, 0),
(106, 8, 9, NULL, 1, 1, 0),
(107, 9, 10, NULL, 1, 1, 0),
(108, 10, 11, NULL, 1, 0, 0),
(109, 11, 12, NULL, 1, 0, 0),
(110, 12, 17, NULL, 1, 0, 0),
(111, 13, 18, NULL, 0, 1, 0),
(112, 14, 19, NULL, 1, 1, 0),
(113, 15, 1, NULL, 1, 0, 0),
(114, 16, 2, NULL, 1, 1, 0),
(115, 17, 3, NULL, 1, 1, 0),
(116, 18, 4, NULL, 1, 1, 0),
(117, 19, 5, NULL, 1, 1, 0),
(118, 20, 6, NULL, 1, 1, 0),
(119, 21, 7, NULL, 1, 0, 0),
(120, 22, 8, NULL, 1, 1, 0),
(121, 23, 9, NULL, 0, 0, 0),
(122, 24, 10, NULL, 0, 1, 0),
(123, 25, 11, NULL, 1, 1, 0),
(124, 26, 12, NULL, 0, 1, 0),
(125, 27, 17, NULL, 0, 1, 0),
(126, 28, 18, NULL, 1, 1, 0),
(127, 29, 19, NULL, 1, 1, 0),
(128, 30, 1, NULL, 0, 1, 0),
(129, 31, 2, NULL, 1, 1, 0),
(130, 32, 3, NULL, 0, 1, 0),
(131, 33, 4, NULL, 0, 1, 0),
(132, 34, 5, NULL, 0, 1, 0),
(133, 35, 6, NULL, 1, 0, 0),
(134, 36, 7, NULL, 0, 0, 0),
(135, 37, 8, NULL, 0, 0, 0),
(136, 38, 9, NULL, 0, 0, 0),
(137, 39, 10, NULL, 0, 0, 0),
(138, 40, 11, NULL, 1, 0, 0),
(139, 41, 12, NULL, 0, 0, 0),
(140, 42, 17, NULL, 1, 1, 0),
(141, 43, 18, NULL, 1, 0, 0),
(142, 44, 19, NULL, 0, 0, 0),
(143, 45, 1, NULL, 1, 0, 0),
(144, 69, 2, NULL, 0, 1, 0),
(145, 1, 3, NULL, 0, 0, 0),
(146, 2, 4, NULL, 1, 1, 0),
(147, 3, 5, NULL, 1, 1, 0),
(148, 4, 6, NULL, 0, 0, 0),
(149, 5, 7, NULL, 0, 0, 0),
(150, 6, 8, NULL, 1, 0, 0),
(151, 7, 9, NULL, 0, 0, 0),
(152, 8, 10, NULL, 0, 1, 0),
(153, 9, 11, NULL, 1, 1, 0),
(154, 10, 12, NULL, 1, 1, 0),
(155, 11, 17, NULL, 0, 0, 0),
(156, 12, 18, NULL, 1, 1, 0),
(157, 13, 19, NULL, 1, 0, 0),
(158, 14, 1, NULL, 0, 1, 0),
(159, 15, 2, NULL, 0, 0, 0),
(160, 16, 3, NULL, 0, 1, 0),
(161, 17, 4, NULL, 1, 1, 0),
(162, 18, 5, NULL, 1, 0, 0),
(163, 19, 6, NULL, 1, 0, 0),
(164, 20, 7, NULL, 0, 1, 0),
(165, 21, 8, NULL, 1, 1, 0),
(166, 22, 9, NULL, 1, 1, 0),
(167, 23, 10, NULL, 0, 1, 0),
(168, 24, 11, NULL, 1, 1, 0),
(169, 25, 12, NULL, 0, 0, 0),
(170, 26, 17, NULL, 1, 0, 0),
(171, 27, 18, NULL, 0, 1, 0),
(172, 28, 19, NULL, 1, 1, 0),
(173, 29, 1, NULL, 0, 0, 0),
(174, 30, 2, NULL, 0, 1, 0),
(175, 31, 3, NULL, 1, 1, 0),
(176, 32, 4, NULL, 0, 1, 0),
(177, 33, 5, NULL, 0, 0, 0),
(178, 34, 6, NULL, 0, 0, 0),
(179, 35, 7, NULL, 0, 1, 0),
(180, 36, 8, NULL, 1, 0, 0),
(181, 37, 9, NULL, 1, 1, 0),
(182, 38, 10, NULL, 1, 0, 0),
(183, 39, 11, NULL, 0, 0, 0),
(184, 40, 12, NULL, 1, 1, 0),
(185, 41, 17, NULL, 0, 1, 0),
(186, 42, 18, NULL, 0, 0, 0),
(187, 43, 19, NULL, 1, 0, 0),
(188, 44, 1, NULL, 0, 1, 0),
(189, 45, 2, NULL, 0, 0, 0),
(190, 69, 3, NULL, 1, 1, 0),
(191, 1, 4, NULL, 0, 0, 0),
(192, 2, 5, NULL, 0, 0, 0),
(193, 3, 6, NULL, 0, 0, 0),
(194, 4, 7, NULL, 1, 1, 0),
(195, 5, 8, NULL, 0, 0, 0),
(196, 6, 9, NULL, 0, 0, 0),
(197, 7, 10, NULL, 1, 0, 0),
(198, 8, 11, NULL, 0, 0, 0),
(199, 9, 12, NULL, 0, 1, 0),
(200, 10, 17, NULL, 1, 0, 0),
(201, 11, 18, NULL, 0, 0, 0),
(202, 12, 19, NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilitytype`
--

CREATE TABLE `utilitytype` (
  `ID` int(11) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `useCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilitytype`
--

INSERT INTO `utilitytype` (`ID`, `addDate`, `name`, `useCount`) VALUES
(1, '2018-12-06 07:58:23', 'Electricity', 0),
(2, '2018-12-06 07:58:23', 'Water', 0),
(3, '2018-12-06 07:58:23', 'High Speed Internet', 0),
(4, '2018-12-06 07:58:23', 'Recycling Pick Up', 0),
(5, '2018-12-06 07:58:23', 'Trash Pick Up', 0),
(6, '2018-12-06 07:58:23', 'Dish Cable', 0),
(7, '2018-12-06 07:58:23', 'Water Heating', 0),
(8, '2018-12-09 20:24:46', 'Security System', 0),
(9, '2018-12-09 20:35:34', 'Wheelchair Accessible', 0),
(10, '2018-12-09 20:35:44', 'Ceiling Fans', 0),
(11, '2018-12-09 20:35:54', 'Storage Units', 0),
(12, '2018-12-09 20:36:07', 'Granite Countertops', 0),
(17, '2018-12-09 20:36:48', 'Walk-in Closet', 0),
(18, '2018-12-09 20:37:05', 'Tile Floors', 0),
(19, '2018-12-09 20:37:10', 'Wood Floors', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `continentTypeID` (`continentTypeID`),
  ADD KEY `countryTypeID` (`countryTypeID`);

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`amenityNumberID`),
  ADD KEY `propertyID` (`propertyID`),
  ADD KEY `amenityTypeID` (`amenityTypeID`);

--
-- Indexes for table `amenitytype`
--
ALTER TABLE `amenitytype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appliance`
--
ALTER TABLE `appliance`
  ADD PRIMARY KEY (`applianceNumberID`),
  ADD KEY `propertyID` (`propertyID`),
  ADD KEY `applianceTypeID` (`applianceTypeID`);

--
-- Indexes for table `appliancetype`
--
ALTER TABLE `appliancetype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `continenttype`
--
ALTER TABLE `continenttype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `countrytype`
--
ALTER TABLE `countrytype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issueNumberID`),
  ADD KEY `propertyID` (`propertyID`);

--
-- Indexes for table `perk`
--
ALTER TABLE `perk`
  ADD PRIMARY KEY (`perkNumberID`),
  ADD KEY `propertyID` (`propertyID`),
  ADD KEY `perkTypeID` (`perkTypeID`);

--
-- Indexes for table `perktype`
--
ALTER TABLE `perktype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phoneNumberID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pictureNumberID`),
  ADD KEY `propertyID` (`propertyID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `property_ibfk_1` (`addressID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utility`
--
ALTER TABLE `utility`
  ADD PRIMARY KEY (`utilityNumberID`),
  ADD KEY `propertyID` (`propertyID`),
  ADD KEY `utilityTypeID` (`utilityTypeID`);

--
-- Indexes for table `utilitytype`
--
ALTER TABLE `utilitytype`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `amenity`
--
ALTER TABLE `amenity`
  MODIFY `amenityNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `amenitytype`
--
ALTER TABLE `amenitytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `appliance`
--
ALTER TABLE `appliance`
  MODIFY `applianceNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `appliancetype`
--
ALTER TABLE `appliancetype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `continenttype`
--
ALTER TABLE `continenttype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countrytype`
--
ALTER TABLE `countrytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issueNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `perk`
--
ALTER TABLE `perk`
  MODIFY `perkNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `perktype`
--
ALTER TABLE `perktype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `phoneNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pictureNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utility`
--
ALTER TABLE `utility`
  MODIFY `utilityNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `utilitytype`
--
ALTER TABLE `utilitytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`continentTypeID`) REFERENCES `continenttype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`countryTypeID`) REFERENCES `countrytype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `amenity`
--
ALTER TABLE `amenity`
  ADD CONSTRAINT `amenity_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `property` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amenity_ibfk_2` FOREIGN KEY (`amenityTypeID`) REFERENCES `amenitytype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appliance`
--
ALTER TABLE `appliance`
  ADD CONSTRAINT `appliance_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `property` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appliance_ibfk_2` FOREIGN KEY (`applianceTypeID`) REFERENCES `appliancetype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `property` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perk`
--
ALTER TABLE `perk`
  ADD CONSTRAINT `perk_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `property` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perk_ibfk_2` FOREIGN KEY (`perkTypeID`) REFERENCES `perktype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `property` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`addressID`) REFERENCES `address` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utility`
--
ALTER TABLE `utility`
  ADD CONSTRAINT `utility_ibfk_1` FOREIGN KEY (`propertyID`) REFERENCES `property` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utility_ibfk_2` FOREIGN KEY (`utilityTypeID`) REFERENCES `utilitytype` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
