-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2010 at 06:04 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `allott`
--

CREATE TABLE IF NOT EXISTS `allott` (
  `RID` varchar(5) NOT NULL,
  `ADate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AQty` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allott`
--


-- --------------------------------------------------------

--
-- Table structure for table `batch_list`
--

CREATE TABLE IF NOT EXISTS `batch_list` (
  `BatchID` int(11) NOT NULL AUTO_INCREMENT,
  `Batch` varchar(5) DEFAULT 'A',
  PRIMARY KEY (`BatchID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `batch_list`
--

INSERT INTO `batch_list` (`BatchID`, `Batch`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE IF NOT EXISTS `bloodgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BloodGroup` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `BloodGroup` (`BloodGroup`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`id`, `BloodGroup`) VALUES
(1, 'O+ve'),
(2, 'A+ve'),
(3, 'B+ve'),
(4, 'AB+ve'),
(5, 'O-ve'),
(6, 'A-ve'),
(7, 'B-ve'),
(8, 'AB-ve');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `name` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`name`, `place`, `email`, `comment`, `Time`) VALUES
('Test', 'Aneesh', 'aneesh.nl@gmail.com', 'Testing comment page', '2010-06-24 04:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course` varchar(3) NOT NULL,
  `duration` int(1) NOT NULL DEFAULT '4'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course`, `duration`) VALUES
('CS', 4),
('ME', 4),
('BT', 4),
('IT', 4),
('EEE', 4),
('EC', 4),
('MCA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `Name`) VALUES
(1, 'Thiruvananthapuram'),
(2, 'Kollam'),
(3, 'Pathanamthitta'),
(4, 'Alapuzha'),
(5, 'Kottayam'),
(6, 'Idduki'),
(7, 'Trissur'),
(8, 'Palakkad'),
(9, 'Malapuram'),
(10, 'Kozhikode'),
(11, 'Wayanad'),
(12, 'Kannur'),
(13, 'Kasargod'),
(14, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `Regid` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `DOB` varchar(20) DEFAULT NULL,
  `Gender` smallint(1) NOT NULL,
  `Bloodgroup` varchar(6) NOT NULL,
  `Weight` mediumint(3) NOT NULL,
  `AdmissionYear` year(4) DEFAULT NULL,
  `Branch` varchar(3) DEFAULT NULL,
  `Batch` enum('A','B','C','D','E','F') DEFAULT NULL,
  `Designation` varchar(10) NOT NULL DEFAULT 'Student',
  `ContactNo` varchar(12) DEFAULT NULL,
  `Emailid` varchar(50) DEFAULT NULL,
  `LastDonation` date DEFAULT NULL,
  `Publish` smallint(1) DEFAULT '1',
  `District` varchar(100) DEFAULT NULL,
  `Post` varchar(100) DEFAULT NULL,
  `Moderation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Regid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Regid`, `Name`, `DOB`, `Gender`, `Bloodgroup`, `Weight`, `AdmissionYear`, `Branch`, `Batch`, `Designation`, `ContactNo`, `Emailid`, `LastDonation`, `Publish`, `District`, `Post`, `Moderation`) VALUES
(1, 'Anish A', '19', 1, 'A+ve', 50, 2008, 'CS', 'A', 'Student', '8907509611', 'aneesh.nl@gmail.com', '2010-05-20', 1, 'Thiruvananthapuram', 'Kamalalayam, SNRA - 79, Konchiravila, Manacaud P O, Thiruvananthapuram - 695009', 1),

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `ReqID` bigint(5) NOT NULL AUTO_INCREMENT,
  `PName` varchar(30) NOT NULL,
  `ReqDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BGroup` varchar(5) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `NeedDate` date NOT NULL,
  `DrRef` varchar(50) DEFAULT NULL,
  `Disease` varchar(25) NOT NULL,
  `Gender` smallint(1) NOT NULL,
  `ContactP` varchar(50) NOT NULL,
  `ContactPh` varchar(15) NOT NULL,
  `PHouse` varchar(100) NOT NULL,
  `PPlace` varchar(100) NOT NULL,
  `Post` varchar(100) NOT NULL,
  `Hospital` varchar(50) DEFAULT NULL,
  `Status` varchar(1) DEFAULT 'N',
  `ADate` varchar(25) NOT NULL,
  `AQty` int(11) NOT NULL,
  PRIMARY KEY (`ReqID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ReqID`, `PName`, `ReqDate`, `BGroup`, `Quantity`, `NeedDate`, `DrRef`, `Disease`, `Gender`, `ContactP`, `ContactPh`, `PHouse`, `PPlace`, `Post`, `Hospital`, `Status`, `ADate`, `AQty`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `BID` bigint(5) NOT NULL AUTO_INCREMENT,
  `BGroup` varchar(5) NOT NULL,
  `Stock` int(5) NOT NULL,
  PRIMARY KEY (`BID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`BID`, `BGroup`, `Stock`) VALUES
(1, 'O+ve', 10),
(2, 'O-ve', 0),
(4, 'A+ve', 3),
(5, 'A-ve', 1),
(6, 'B+ve', 4),
(7, 'B-ve', 0),
(8, 'AB+ve', 2),
(9, 'AB-ve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(100) NOT NULL,
  `keyvalue` varchar(100) NOT NULL DEFAULT '',
  `PWD` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `keyvalue`, `PWD`) VALUES
('admin', '5', 'cheesecake'),

