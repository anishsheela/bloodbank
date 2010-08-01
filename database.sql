SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `allott` (  `RID` varchar(5) NOT NULL,  `ADate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  `AQty` int(3) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `batch_list` (  `BatchID` int(11) NOT NULL AUTO_INCREMENT,  `Batch` varchar(5) DEFAULT 'A',  PRIMARY KEY (`BatchID`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

INSERT INTO `batch_list` (`BatchID`, `Batch`) VALUES(1, 'A'),(2, 'B'),(3, 'C'),(4, 'D'),(5, 'E'),(6, 'F');

CREATE TABLE IF NOT EXISTS `bloodgroup` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `BloodGroup` varchar(6) NOT NULL,  PRIMARY KEY (`id`),  UNIQUE KEY `BloodGroup` (`BloodGroup`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

INSERT INTO `bloodgroup` (`id`, `BloodGroup`) VALUES(1, 'O+ve'),(2, 'A+ve'),(3, 'B+ve'),(4, 'AB+ve'),(5, 'O-ve'),(6, 'A-ve'),(7, 'B-ve'),(8, 'AB-ve');


CREATE TABLE IF NOT EXISTS `comments` (  `name` varchar(50) NOT NULL,  `place` varchar(100) NOT NULL,  `email` varchar(50) NOT NULL,  `comment` varchar(500) NOT NULL,  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `course` (  `course` varchar(3) NOT NULL,  `duration` int(1) NOT NULL DEFAULT '4') ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `course` (`course`, `duration`) VALUES('CS', 4),('ME', 4),('BT', 4),('IT', 4),('EEE', 4),('EC', 4),('MCA', 3);

CREATE TABLE IF NOT EXISTS `district` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `Name` varchar(30) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

INSERT INTO `district` (`id`, `Name`) VALUES(1, 'Thiruvananthapuram'),(2, 'Kollam'),(3, 'Pathanamthitta'),(4, 'Alapuzha'),(5, 'Kottayam'),(6, 'Idduki'),(7, 'Trissur'),(8, 'Palakkad'),(9, 'Malapuram'),(10, 'Kozhikode'),(11, 'Wayanad'),(12, 'Kannur'),(13, 'Kasargod'),(14, 'Other');

CREATE TABLE IF NOT EXISTS `registration` (  `Regid` int(5) NOT NULL AUTO_INCREMENT,  `Name` varchar(50) DEFAULT NULL,  `DOB` date DEFAULT NULL,  `Gender` smallint(1) NOT NULL,  `Bloodgroup` varchar(6) NOT NULL,  `Weight` mediumint(3) NOT NULL,  `AdmissionYear` year(4) DEFAULT NULL,  `Branch` varchar(3) DEFAULT NULL,  `Batch` enum('A','B','C','D','E','F') DEFAULT NULL,  `Designation` varchar(10) NOT NULL DEFAULT 'Student',  `ContactNo` varchar(12) DEFAULT NULL,  `Emailid` varchar(50) DEFAULT NULL,  `LastDonation` date DEFAULT NULL,  `Publish` smallint(1) DEFAULT '1',  `District` varchar(100) DEFAULT NULL,  `Post` varchar(100) DEFAULT NULL,  `Moderation` tinyint(1) NOT NULL DEFAULT '0', `enterd_by` varchar(100) NOT NULL DEFAULT 'admin' COMMENT 'The name of data entry officer', `verified_by` varchar(100) NOT NULL DEFAULT 'admin' COMMENT 'The name of verification officer',  PRIMARY KEY (`Regid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `request` (  `ReqID` bigint(5) NOT NULL AUTO_INCREMENT,  `PName` varchar(30) NOT NULL,  `ReqDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  `BGroup` varchar(5) NOT NULL,  `Quantity` int(3) NOT NULL,  `NeedDate` date NOT NULL,  `DrRef` varchar(50) DEFAULT NULL,  `Disease` varchar(25) NOT NULL,  `Gender` smallint(1) NOT NULL,  `ContactP` varchar(50) NOT NULL,  `ContactPh` varchar(15) NOT NULL,  `PHouse` varchar(100) NOT NULL,  `PPlace` varchar(100) NOT NULL,  `Post` varchar(100) NOT NULL,  `Hospital` varchar(50) DEFAULT NULL,  `Status` varchar(1) DEFAULT 'N',  `ADate` varchar(25) NOT NULL,  `AQty` int(11) NOT NULL,  PRIMARY KEY (`ReqID`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user` ( `UserID` varchar(100) NOT NULL, `keyvalue` varchar(100) NOT NULL DEFAULT '', `PWD` varchar(100) NOT NULL DEFAULT '' ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `operator` (  `operator` varchar(100) NOT NULL COMMENT 'The name of data entry officer',  `amount` int(5) NOT NULL DEFAULT '0' COMMENT 'No of items the person enterd',  `admission_year` int(11) NOT NULL COMMENT 'Admission Year',  `branch` enum('CS','EC','ME','IT','BT','EE') NOT NULL COMMENT 'Branch',  `batch` enum('A','B','C','D','E','F') NOT NULL COMMENT 'Batch',  PRIMARY KEY (`operator`,`admission_year`,`branch`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Stores information about name of operator and number of data';


