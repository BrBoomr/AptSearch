-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 02:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
(320, '2018-11-27 23:58:11', 'Zimbabwe', 0);

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
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`amenityNumberID`);

--
-- Indexes for table `amenitytype`
--
ALTER TABLE `amenitytype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appliance`
--
ALTER TABLE `appliance`
  ADD PRIMARY KEY (`applianceNumberID`);

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
  ADD PRIMARY KEY (`issueNumberID`);

--
-- Indexes for table `perk`
--
ALTER TABLE `perk`
  ADD PRIMARY KEY (`perkNumberID`);

--
-- Indexes for table `perktype`
--
ALTER TABLE `perktype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phoneNumberID`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pictureNumberID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utility`
--
ALTER TABLE `utility`
  ADD PRIMARY KEY (`utilityNumberID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `applianceNumberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appliancetype`
--
ALTER TABLE `appliancetype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `continenttype`
--
ALTER TABLE `continenttype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countrytype`
--
ALTER TABLE `countrytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issueNumberID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `phoneNumberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pictureNumberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;