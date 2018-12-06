-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 06:20 PM
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
(62, 1, 321, 'New State', 'New City', '54321', 'New Street', '2', '2');

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
(1, 1, 1, 'It be cold as fuck boi'),
(2, 1, 2, NULL);

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
(1, '2018-12-03 17:18:20', 'Refrigerator', 0),
(2, '2018-12-03 17:18:29', 'Oven', 0);

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
(1, '2018-11-27 23:11:06', 'North America', 0),
(2, '2018-11-27 23:11:06', 'Antartica', 0),
(3, '2018-11-27 23:11:06', 'Australia', 0),
(4, '2018-11-27 23:11:06', 'Europe', 0),
(5, '2018-11-27 23:11:06', 'Asia', 0),
(6, '2018-11-27 23:11:06', 'Africa', 0),
(7, '2018-11-27 23:11:06', 'South America', 0);

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
(95, '2018-11-27 23:43:08', 'Afghanistan', 0),
(96, '2018-11-27 23:43:08', 'Albania', 0),
(97, '2018-11-27 23:43:08', 'Algeria', 0),
(98, '2018-11-27 23:43:08', 'Andorra', 0),
(99, '2018-11-27 23:43:08', 'Angola', 0),
(100, '2018-11-27 23:43:08', 'Antigua and Barbuda', 0),
(101, '2018-11-27 23:43:08', 'Argentina', 0),
(102, '2018-11-27 23:43:08', 'Armenia', 0),
(103, '2018-11-27 23:43:08', 'Australia', 0),
(104, '2018-11-27 23:43:08', 'Austria', 0),
(105, '2018-11-27 23:43:08', 'Austrian Empire', 0),
(106, '2018-11-27 23:43:08', 'Azerbaijan', 0),
(107, '2018-11-27 23:43:08', 'Baden', 0),
(108, '2018-11-27 23:43:08', 'Bahrain', 0),
(109, '2018-11-27 23:43:08', 'Bangladesh', 0),
(110, '2018-11-27 23:43:08', 'Barbados', 0),
(111, '2018-11-27 23:43:08', 'Bavaria', 0),
(112, '2018-11-27 23:43:08', 'Belarus', 0),
(113, '2018-11-27 23:43:08', 'Belgium', 0),
(114, '2018-11-27 23:43:08', 'Belize', 0),
(115, '2018-11-27 23:43:08', 'Benin (Dahomey)', 0),
(116, '2018-11-27 23:43:08', 'Bolivia', 0),
(117, '2018-11-27 23:43:08', 'Bosnia and Herzegovina', 0),
(118, '2018-11-27 23:43:08', 'Botswana', 0),
(119, '2018-11-27 23:43:08', 'Brazil', 0),
(120, '2018-11-27 23:43:08', 'Brunei', 0),
(121, '2018-11-27 23:43:08', 'Brunswick and Lüneburg', 0),
(122, '2018-11-27 23:43:08', 'Bulgaria', 0),
(123, '2018-11-27 23:43:08', 'Burkina Faso (Upper Volta)', 0),
(124, '2018-11-27 23:43:08', 'Burma', 0),
(125, '2018-11-27 23:43:08', 'Burundi', 0),
(126, '2018-11-27 23:43:08', 'Cabo Verde', 0),
(127, '2018-11-27 23:43:08', 'Cambodia', 0),
(128, '2018-11-27 23:43:08', 'Cameroon', 0),
(129, '2018-11-27 23:43:08', 'Canada', 0),
(130, '2018-11-27 23:43:08', 'Central African Republic', 0),
(131, '2018-11-27 23:43:08', 'Central American Federation', 0),
(132, '2018-11-27 23:43:08', 'Chad', 0),
(133, '2018-11-27 23:43:08', 'Chile', 0),
(134, '2018-11-27 23:43:08', 'China', 0),
(135, '2018-11-27 23:43:08', 'Colombia', 0),
(136, '2018-11-27 23:43:08', 'Comoros', 0),
(137, '2018-11-27 23:43:08', 'Costa Rica', 0),
(138, '2018-11-27 23:43:08', 'Cote D’Ivoire (Ivory Coast)', 0),
(139, '2018-11-27 23:43:08', 'Croatia', 0),
(140, '2018-11-27 23:43:08', 'Cuba', 0),
(141, '2018-11-27 23:43:08', 'Cyprus', 0),
(142, '2018-11-27 23:43:08', 'Czechia', 0),
(143, '2018-11-27 23:43:08', 'Czechoslovakia', 0),
(144, '2018-11-27 23:43:08', 'Democratic Republic of the Congo', 0),
(145, '2018-11-27 23:43:08', 'Denmark', 0),
(146, '2018-11-27 23:43:08', 'Djibouti', 0),
(147, '2018-11-27 23:43:08', 'Dominica', 0),
(148, '2018-11-27 23:43:08', 'Dominican Republic', 0),
(149, '2018-11-27 23:43:08', 'East Germany (German Democratic Republic)', 0),
(150, '2018-11-27 23:43:08', 'Ecuador', 0),
(151, '2018-11-27 23:43:08', 'Egypt', 0),
(152, '2018-11-27 23:43:08', 'El Salvador', 0),
(153, '2018-11-27 23:43:08', 'Equatorial Guinea', 0),
(154, '2018-11-27 23:43:08', 'Eritrea', 0),
(155, '2018-11-27 23:49:41', 'Estonia', 0),
(156, '2018-11-27 23:49:41', 'Eswatini', 0),
(157, '2018-11-27 23:49:41', 'Ethiopia', 0),
(158, '2018-11-27 23:49:41', 'Federal Government of Germany (1848-49)', 0),
(159, '2018-11-27 23:49:41', 'Fiji', 0),
(160, '2018-11-27 23:49:41', 'Finland', 0),
(161, '2018-11-27 23:49:41', 'France', 0),
(162, '2018-11-27 23:49:41', 'Gabon', 0),
(163, '2018-11-27 23:49:41', 'Georgia', 0),
(164, '2018-11-27 23:49:41', 'Germany', 0),
(165, '2018-11-27 23:49:41', 'Ghana', 0),
(166, '2018-11-27 23:49:41', 'Greece', 0),
(167, '2018-11-27 23:49:41', 'Grenada', 0),
(168, '2018-11-27 23:49:41', 'Guatemala', 0),
(169, '2018-11-27 23:49:41', 'Guinea', 0),
(170, '2018-11-27 23:49:41', 'Guinea-Bissau', 0),
(171, '2018-11-27 23:49:41', 'Guyana', 0),
(172, '2018-11-27 23:49:41', 'Haiti', 0),
(173, '2018-11-27 23:49:41', 'Hanover', 0),
(174, '2018-11-27 23:49:41', 'Hanseatic Republics', 0),
(175, '2018-11-27 23:49:41', 'Hawaii', 0),
(176, '2018-11-27 23:49:41', 'Hesse', 0),
(177, '2018-11-27 23:49:41', 'Holy See', 0),
(178, '2018-11-27 23:49:41', 'Honduras', 0),
(179, '2018-11-27 23:49:41', 'Hungary', 0),
(180, '2018-11-27 23:49:41', 'Iceland', 0),
(181, '2018-11-27 23:49:41', 'India', 0),
(182, '2018-11-27 23:49:41', 'Indonesia', 0),
(183, '2018-11-27 23:49:41', 'Iran', 0),
(184, '2018-11-27 23:49:41', 'Iraq', 0),
(185, '2018-11-27 23:49:41', 'Ireland', 0),
(186, '2018-11-27 23:49:41', 'Israel', 0),
(187, '2018-11-27 23:49:41', 'Italy', 0),
(188, '2018-11-27 23:49:41', 'Jamaica', 0),
(189, '2018-11-27 23:49:41', 'Japan', 0),
(190, '2018-11-27 23:49:41', 'Jordan', 0),
(191, '2018-11-27 23:49:41', 'Kazakhstan', 0),
(192, '2018-11-27 23:49:41', 'Kenya', 0),
(193, '2018-11-27 23:49:41', 'Kingdom of Serbia/Yugoslavia', 0),
(194, '2018-11-27 23:49:41', 'Kiribati', 0),
(195, '2018-11-27 23:49:41', 'Korea', 0),
(196, '2018-11-27 23:49:41', 'Kosovo', 0),
(197, '2018-11-27 23:49:41', 'Kuwait', 0),
(198, '2018-11-27 23:49:41', 'Kyrgyzstan', 0),
(199, '2018-11-27 23:49:41', 'Laos', 0),
(200, '2018-11-27 23:49:41', 'Latvia', 0),
(201, '2018-11-27 23:49:41', 'Lebanon', 0),
(202, '2018-11-27 23:49:41', 'Lesotho', 0),
(203, '2018-11-27 23:49:41', 'Lew Chew (Loochoo)', 0),
(204, '2018-11-27 23:49:41', 'Liberia', 0),
(205, '2018-11-27 23:49:41', 'Libya', 0),
(206, '2018-11-27 23:49:41', 'Liechtenstein', 0),
(207, '2018-11-27 23:49:41', 'Lithuania', 0),
(208, '2018-11-27 23:49:41', 'Luxembourg', 0),
(209, '2018-11-27 23:49:41', 'Macedonia', 0),
(210, '2018-11-27 23:49:41', 'Madagascar', 0),
(211, '2018-11-27 23:49:41', 'Malawi', 0),
(212, '2018-11-27 23:49:41', 'Malaysia', 0),
(213, '2018-11-27 23:49:41', 'Maldives', 0),
(214, '2018-11-27 23:49:41', 'Mali', 0),
(215, '2018-11-27 23:54:16', 'Malta', 0),
(216, '2018-11-27 23:54:16', 'Marshall Islands', 0),
(217, '2018-11-27 23:54:16', 'Mauritania', 0),
(218, '2018-11-27 23:54:16', 'Mauritius', 0),
(219, '2018-11-27 23:54:16', 'Mecklenburg-Schwerin', 0),
(220, '2018-11-27 23:54:16', 'Mecklenburg-Strelitz', 0),
(221, '2018-11-27 23:54:16', 'Mexico', 0),
(222, '2018-11-27 23:54:16', 'Micronesia', 0),
(223, '2018-11-27 23:54:16', 'Moldova', 0),
(224, '2018-11-27 23:54:16', 'Monaco', 0),
(225, '2018-11-27 23:54:16', 'Mongolia', 0),
(226, '2018-11-27 23:54:16', 'Montenegro', 0),
(227, '2018-11-27 23:54:16', 'Morocco', 0),
(228, '2018-11-27 23:54:16', 'Mozambique', 0),
(229, '2018-11-27 23:54:16', 'Namibia', 0),
(230, '2018-11-27 23:54:16', 'Nassau', 0),
(231, '2018-11-27 23:54:16', 'Nauru', 0),
(232, '2018-11-27 23:54:16', 'Nepal', 0),
(233, '2018-11-27 23:54:16', 'New Zealand', 0),
(234, '2018-11-27 23:54:16', 'Nicaragua', 0),
(235, '2018-11-27 23:54:16', 'Niger', 0),
(236, '2018-11-27 23:54:16', 'Nigeria', 0),
(237, '2018-11-27 23:54:16', 'North German Confederation', 0),
(238, '2018-11-27 23:54:16', 'North German Union', 0),
(239, '2018-11-27 23:54:16', 'Norway', 0),
(240, '2018-11-27 23:54:16', 'Oldenburg', 0),
(241, '2018-11-27 23:54:16', 'Oman', 0),
(242, '2018-11-27 23:54:16', 'Orange Free State', 0),
(243, '2018-11-27 23:54:16', 'Pakistan', 0),
(244, '2018-11-27 23:54:16', 'Palau', 0),
(245, '2018-11-27 23:54:16', 'Panama', 0),
(246, '2018-11-27 23:54:16', 'Papal States', 0),
(247, '2018-11-27 23:54:16', 'Papua New Guinea', 0),
(248, '2018-11-27 23:54:16', 'Paraguay', 0),
(249, '2018-11-27 23:54:16', 'Peru', 0),
(250, '2018-11-27 23:54:16', 'Philippines', 0),
(251, '2018-11-27 23:54:16', 'Piedmont-Sardinia', 0),
(252, '2018-11-27 23:54:16', 'Poland', 0),
(253, '2018-11-27 23:54:16', 'Portugal', 0),
(254, '2018-11-27 23:54:16', 'Qatar', 0),
(255, '2018-11-27 23:54:16', 'Republic of Genoa', 0),
(256, '2018-11-27 23:54:16', 'Republic of Korea (South Korea)', 0),
(257, '2018-11-27 23:54:16', 'Republic of the Congo', 0),
(258, '2018-11-27 23:54:16', 'Romania', 0),
(259, '2018-11-27 23:54:16', 'Russia', 0),
(260, '2018-11-27 23:54:16', 'Rwanda', 0),
(261, '2018-11-27 23:54:16', 'Saint Kitts and Nevis', 0),
(262, '2018-11-27 23:54:16', 'Saint Lucia', 0),
(263, '2018-11-27 23:54:16', 'Saint Vincent and the Grenadines', 0),
(264, '2018-11-27 23:54:16', 'Samoa', 0),
(265, '2018-11-27 23:54:16', 'San Marino', 0),
(266, '2018-11-27 23:54:16', 'Sao Tome and Principe', 0),
(267, '2018-11-27 23:54:16', 'Saudi Arabia', 0),
(268, '2018-11-27 23:54:16', 'Schaumburg-Lippe', 0),
(269, '2018-11-27 23:54:16', 'Senegal', 0),
(270, '2018-11-27 23:54:16', 'Serbia', 0),
(271, '2018-11-27 23:54:16', 'Seychelles', 0),
(272, '2018-11-27 23:54:16', 'Sierra Leone', 0),
(273, '2018-11-27 23:54:16', 'Singapore', 0),
(274, '2018-11-27 23:54:16', 'Slovakia', 0),
(275, '2018-11-27 23:58:11', 'Slovenia', 0),
(276, '2018-11-27 23:58:11', 'Somalia', 0),
(277, '2018-11-27 23:58:11', 'South Africa', 0),
(278, '2018-11-27 23:58:11', 'South Sudan', 0),
(279, '2018-11-27 23:58:11', 'Spain', 0),
(280, '2018-11-27 23:58:11', 'Sri Lanka', 0),
(281, '2018-11-27 23:58:11', 'Sudan', 0),
(282, '2018-11-27 23:58:11', 'Suriname', 0),
(283, '2018-11-27 23:58:11', 'Sweden', 0),
(284, '2018-11-27 23:58:11', 'Switzerland', 0),
(285, '2018-11-27 23:58:11', 'Syria', 0),
(286, '2018-11-27 23:58:11', 'Tajikistan', 0),
(287, '2018-11-27 23:58:11', 'Tanzania', 0),
(288, '2018-11-27 23:58:11', 'Texas', 0),
(289, '2018-11-27 23:58:11', 'Thailand', 0),
(290, '2018-11-27 23:58:11', 'The Bahamas', 0),
(291, '2018-11-27 23:58:11', 'The Cayman Islands', 0),
(292, '2018-11-27 23:58:11', 'The Congo Free State', 0),
(293, '2018-11-27 23:58:11', 'The Duchy of Parma', 0),
(294, '2018-11-27 23:58:11', 'The Gambia', 0),
(295, '2018-11-27 23:58:11', 'The Grand Duchy of Tuscany', 0),
(296, '2018-11-27 23:58:11', 'The Netherlands', 0),
(297, '2018-11-27 23:58:11', 'The Solomon Islands', 0),
(298, '2018-11-27 23:58:11', 'The United Arab Emirates', 0),
(299, '2018-11-27 23:58:11', 'The United Kingdom', 0),
(300, '2018-11-27 23:58:11', 'Timor-Leste', 0),
(301, '2018-11-27 23:58:11', 'Togo', 0),
(302, '2018-11-27 23:58:11', 'Tonga', 0),
(303, '2018-11-27 23:58:11', 'Trinidad and Tobago', 0),
(304, '2018-11-27 23:58:11', 'Tunisia', 0),
(305, '2018-11-27 23:58:11', 'Turkey', 0),
(306, '2018-11-27 23:58:11', 'Turkmenistan', 0),
(307, '2018-11-27 23:58:11', 'Tuvalu', 0),
(308, '2018-11-27 23:58:11', 'Two Sicilies', 0),
(309, '2018-11-27 23:58:11', 'Uganda', 0),
(310, '2018-11-27 23:58:11', 'Ukraine', 0),
(311, '2018-11-27 23:58:11', 'Union of Soviet Socialist Republics', 0),
(312, '2018-11-27 23:58:11', 'Uruguay', 0),
(313, '2018-11-27 23:58:11', 'Uzbekistan', 0),
(314, '2018-11-27 23:58:11', 'Vanuatu', 0),
(315, '2018-11-27 23:58:11', 'Venezuela', 0),
(316, '2018-11-27 23:58:11', 'Vietnam', 0),
(317, '2018-11-27 23:58:11', 'Württemberg', 0),
(318, '2018-11-27 23:58:11', 'Yemen', 0),
(319, '2018-11-27 23:58:11', 'Zambia', 0),
(320, '2018-11-27 23:58:11', 'Zimbabwe', 0),
(321, '2018-11-28 20:25:07', 'United States', 0);

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
(1, 62, 'Issue #Test1', 'Leaky faucter', '2018-12-02 23:48:11', NULL),
(2, 62, 'Issue #Test2', 'Wet plaster', '2018-12-02 23:48:11', NULL);

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
(1, 1, '2018-12-03 01:07:46', '956', '123-4567', NULL, 'Work'),
(2, 1, '2018-12-03 01:07:46', '956', '321-7654', NULL, 'Mobile'),
(3, 2, '2018-12-03 06:00:31', '956', '456-7890', '', 'Mobile'),
(4, 2, '2018-12-03 01:08:43', '956', '654-0987', NULL, 'Work'),
(5, 3, '2018-12-03 01:15:59', '956', '987-6543', NULL, 'Mobile'),
(6, 3, '2018-12-03 01:15:59', '956', '789-3456', NULL, 'Work'),
(9, 4, '2018-12-03 01:17:04', '956', '753-9510', NULL, 'Work'),
(10, 4, '2018-12-03 01:17:04', '956', '357-7913', NULL, 'Mobile'),
(11, 5, '2018-12-03 01:18:27', '956', '951-4682', NULL, 'Work'),
(12, 5, '2018-12-03 01:18:27', '956', '159-6428', NULL, 'Mobile');

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
(1, 1, 1, '2018-11-28 21:23:35', '2018-11-28 21:23:35', 'M.B1.A1', 1, 750, 950, 1, 1, 'Single Bedroom'),
(2, 2, 1, '2018-11-28 21:25:11', '2018-11-28 21:25:11', 'M.B1.A2', 1, 900, 1000, 2, 1, 'Double Bedroom, Shared Bathroom'),
(3, 3, 1, '2018-11-28 21:26:41', '2018-11-28 21:26:41', 'M.B1.A3', 1, 800, 900, 1, 1, 'Single Bedroom'),
(4, 4, 1, '2018-11-28 21:30:14', '2018-11-28 21:30:14', 'M.B2.A1', 1, 950, 800, 1, 1, 'Single Bedroom'),
(5, 5, 1, '2018-11-28 21:30:57', '2018-11-28 21:30:57', 'M.B2.A2', 1, 1100, 1200, 2, 2, 'Double Bedroom'),
(6, 6, 1, '2018-11-28 21:31:42', '2018-11-28 21:31:42', 'M.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(7, 7, 1, '2018-11-28 21:36:15', '2018-11-28 21:36:15', 'M.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(8, 8, 1, '2018-11-28 21:36:15', '2018-11-28 21:36:15', 'M.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(9, 9, 1, '2018-11-28 21:36:15', '2018-11-28 21:36:15', 'M.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(10, 10, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B1.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(11, 11, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B1.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(12, 12, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B1.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(13, 13, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B2.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(14, 14, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B2.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(15, 15, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(16, 16, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(17, 17, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(18, 18, 2, '2018-11-28 21:37:59', '2018-11-28 21:37:59', 'N.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(19, 19, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B1.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(20, 20, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B1.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(21, 21, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B1.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(22, 22, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B2.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(23, 23, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B2.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(24, 24, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(25, 25, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(26, 26, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(27, 27, 3, '2018-11-28 21:39:27', '2018-11-28 21:39:27', 'S.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(28, 28, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B1.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(29, 29, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B1.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(30, 30, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B1.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(31, 31, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B2.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(32, 32, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B2.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(33, 33, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(34, 34, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(35, 35, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(36, 36, 4, '2018-11-28 21:40:53', '2018-11-28 21:40:53', 'E.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(37, 37, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B1.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(38, 38, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B1.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(39, 39, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B1.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(40, 40, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B2.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(41, 41, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B2.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(42, 42, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B2.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(43, 43, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B3.A1', 1, 900, 750, 1, 1, 'Single Bedroom'),
(44, 44, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B3.A2', 1, 900, 750, 1, 1, 'Single Bedroom'),
(45, 45, 5, '2018-11-28 21:42:42', '2018-11-28 21:42:42', 'W.B3.A3', 1, 900, 750, 1, 1, 'Single Bedroom'),
(62, 62, 2, '2018-11-30 02:14:14', '2018-11-30 02:14:14', 'Property Used for Debugging Purposes', 1, 1500, 900, 2, 2, NULL);

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
(1, '2018-11-28 21:22:39', 'z@Chen.com', '$2y$10$6Tcc4Jw1.iN0zEU9QXhnZ.3WIy7qTlvjyKZGJzi1S0RMU27lCcQJm', 'Zhixiang Chen'),
(2, '2018-12-03 02:18:02', 'jafet@reyes.com', '$2y$10$L3/ttidBRuLBTbDVPLJCSehaNBSN0qCurRKP/o86FwQPosh1PYivi', 'Jafet Reyes'),
(3, '2018-11-28 21:22:45', 'b@Cancel.com', '$2y$10$Abcn5liCO35zfDuKGgzEaOOmO37k1hqMDMMrJuiAsfP0Z9w1EWeUq', 'Bryan Cancel'),
(4, '2018-11-28 21:22:47', 'j@Guerrero.com', '$2y$10$53WshITNu79fB403gmIbgOEBmewACdZIdIeEl4FDoYkmTz.tAZ2Pi', 'Jerry Guerrero'),
(5, '2018-11-28 21:42:22', 'e@Musk.com', '$2y$10$hiPo0TVwEL5JRmy90YHZ2uQDPzXczjfVLWxmqYemPr1IdxrA.RDMy', 'Elon Musk');

-- --------------------------------------------------------

--
-- Table structure for table `utility`
--

CREATE TABLE `utility` (
  `utilityNumberID` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `utilityTypeID` int(11) NOT NULL,
  `details` text,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `includedInRent` tinyint(1) NOT NULL DEFAULT '1',
  `expectedCostPerMonth` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `amenity`
--
ALTER TABLE `amenity`
  MODIFY `amenityNumberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenitytype`
--
ALTER TABLE `amenitytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appliance`
--
ALTER TABLE `appliance`
  MODIFY `applianceNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliancetype`
--
ALTER TABLE `appliancetype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `issueNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perk`
--
ALTER TABLE `perk`
  MODIFY `perkNumberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perktype`
--
ALTER TABLE `perktype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `phoneNumberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pictureNumberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utility`
--
ALTER TABLE `utility`
  MODIFY `utilityNumberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilitytype`
--
ALTER TABLE `utilitytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
