-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2010 at 03:32 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allott`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `name` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--


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
  `Class` varchar(10) NOT NULL,
  `ContactNo` varchar(12) DEFAULT NULL,
  `Emailid` varchar(50) DEFAULT NULL,
  `LastDonation` varchar(25) DEFAULT NULL,
  `Publish` smallint(1) DEFAULT '1',
  `District` varchar(100) DEFAULT NULL,
  `Post` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Regid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `registration`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `request`
--


-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `BID` bigint(5) NOT NULL AUTO_INCREMENT,
  `BGroup` varchar(5) NOT NULL,
  `Stock` int(5) NOT NULL,
  PRIMARY KEY (`BID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`BID`, `BGroup`, `Stock`) VALUES
(1, 'O+ve', 0),
(2, 'O-ve', 0),
(4, 'A+ve', 0),
(5, 'A-ve', 0),
(6, 'B+ve', 0),
(7, 'B-ve', 0),
(8, 'AB+ve', 0),
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
('admin', '5', 'adminpassword');
