-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2023 at 11:05 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbfoodsafety`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblblacklist`
--

CREATE TABLE IF NOT EXISTS `tblblacklist` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `repId` int(11) NOT NULL,
  `bDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblblacklist`
--

INSERT INTO `tblblacklist` (`bid`, `repId`, `bDate`, `status`) VALUES
(1, 1, '2023-01-08 16:28:25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE IF NOT EXISTS `tblfeedback` (
  `fId` int(11) NOT NULL AUTO_INCREMENT,
  `pId` int(11) NOT NULL,
  `rId` int(11) NOT NULL,
  `fDate` datetime NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Submitted',
  PRIMARY KEY (`fId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`fId`, `pId`, `rId`, `fDate`, `feedback`, `status`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '2023-01-08 15:48:37', 'Replied');

-- --------------------------------------------------------

--
-- Table structure for table `tblinspection`
--

CREATE TABLE IF NOT EXISTS `tblinspection` (
  `inspId` int(11) NOT NULL AUTO_INCREMENT,
  `iId` int(11) NOT NULL,
  `rId` int(11) NOT NULL,
  `inspDate` date NOT NULL,
  `inspRequest` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`inspId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblinspection`
--

INSERT INTO `tblinspection` (`inspId`, `iId`, `rId`, `inspDate`, `inspRequest`, `status`) VALUES
(1, 1, 1, '2023-01-09', 'Not clean', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tblinspector`
--

CREATE TABLE IF NOT EXISTS `tblinspector` (
  `iId` int(11) NOT NULL AUTO_INCREMENT,
  `iName` varchar(50) NOT NULL,
  `iLicense` varchar(50) NOT NULL,
  `iAddress` varchar(100) NOT NULL,
  `iContact` varchar(50) NOT NULL,
  `iEmail` varchar(50) NOT NULL,
  `iImage` varchar(100) NOT NULL,
  PRIMARY KEY (`iId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblinspector`
--

INSERT INTO `tblinspector` (`iId`, `iName`, `iLicense`, `iAddress`, `iContact`, `iEmail`, `iImage`) VALUES
(1, 'Michael', 'kjn57', 'Aluva', '9632501478', 'michael@gmail.com', '../images/t1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `lId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`lId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`lId`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', '1'),
(2, 'iftharaluva@gmail.com', 'ifthar', 'restaurant', '1'),
(3, 'mathew@gmail.com', 'mathew', 'public', '1'),
(4, 'michael@gmail.com', '9632501478', 'inspector', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE IF NOT EXISTS `tblnotification` (
  `notId` int(11) NOT NULL AUTO_INCREMENT,
  `notDate` date NOT NULL,
  `notification` varchar(500) NOT NULL,
  PRIMARY KEY (`notId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblnotification`
--

INSERT INTO `tblnotification` (`notId`, `notDate`, `notification`) VALUES
(1, '2023-01-08', 'kjnkjnkj');

-- --------------------------------------------------------

--
-- Table structure for table `tblpenalty`
--

CREATE TABLE IF NOT EXISTS `tblpenalty` (
  `penaltyId` int(11) NOT NULL AUTO_INCREMENT,
  `repId` int(11) NOT NULL,
  `duedate` date NOT NULL,
  `amt` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Assigned',
  PRIMARY KEY (`penaltyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblpenalty`
--

INSERT INTO `tblpenalty` (`penaltyId`, `repId`, `duedate`, `amt`, `status`) VALUES
(1, 1, '2023-01-12', 10000, 'Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `tblpublic`
--

CREATE TABLE IF NOT EXISTS `tblpublic` (
  `pId` int(11) NOT NULL AUTO_INCREMENT,
  `pName` varchar(50) NOT NULL,
  `pAddress` varchar(50) NOT NULL,
  `pEmail` varchar(50) NOT NULL,
  `pContact` varchar(50) NOT NULL,
  PRIMARY KEY (`pId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblpublic`
--

INSERT INTO `tblpublic` (`pId`, `pName`, `pAddress`, `pEmail`, `pContact`) VALUES
(1, 'Mathew', 'Aluva', 'mathew@gmail.com', '7485960231');

-- --------------------------------------------------------

--
-- Table structure for table `tblreply`
--

CREATE TABLE IF NOT EXISTS `tblreply` (
  `replyId` int(11) NOT NULL AUTO_INCREMENT,
  `fId` int(11) NOT NULL,
  `reply` varchar(500) NOT NULL,
  PRIMARY KEY (`replyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblreply`
--

INSERT INTO `tblreply` (`replyId`, `fId`, `reply`) VALUES
(1, 1, 'kjnmjkln');

-- --------------------------------------------------------

--
-- Table structure for table `tblresponse`
--

CREATE TABLE IF NOT EXISTS `tblresponse` (
  `repId` int(11) NOT NULL AUTO_INCREMENT,
  `inspId` int(11) NOT NULL,
  `repDate` date NOT NULL,
  `report` varchar(100) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`repId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblresponse`
--

INSERT INTO `tblresponse` (`repId`, `inspId`, `repDate`, `report`, `rating`) VALUES
(1, 1, '2023-01-08', 'kjnkijni', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblrestaurant`
--

CREATE TABLE IF NOT EXISTS `tblrestaurant` (
  `rId` int(11) NOT NULL AUTO_INCREMENT,
  `rName` varchar(50) NOT NULL,
  `rAddress` varchar(100) NOT NULL,
  `rEmail` varchar(50) NOT NULL,
  `rContact` varchar(50) NOT NULL,
  `rLicense` varchar(50) NOT NULL,
  `rImage` varchar(500) NOT NULL,
  PRIMARY KEY (`rId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblrestaurant`
--

INSERT INTO `tblrestaurant` (`rId`, `rName`, `rAddress`, `rEmail`, `rContact`, `rLicense`, `rImage`) VALUES
(1, 'Ifthar Aluva', 'Aluva', 'iftharaluva@gmail.com', '9568740231', 'jn85787', '../images/b6.jpg');
