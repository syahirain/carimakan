-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for fooduser
CREATE DATABASE IF NOT EXISTS `fooduser` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fooduser`;

-- Dumping structure for table fooduser.booth
CREATE TABLE IF NOT EXISTS `booth` (
  `userid` int(11) NOT NULL,
  `boothid` int(11) NOT NULL AUTO_INCREMENT,
  `booth_desc` text NOT NULL,
  `booth_name` varchar(50) NOT NULL,
  `booth_addr` text NOT NULL,
  `booth_pic` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`boothid`),
  KEY `boothid` (`boothid`),
  KEY `sambungID` (`userid`),
  CONSTRAINT `sambungID` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table fooduser.foods
CREATE TABLE IF NOT EXISTS `foods` (
  `userfoodID` int(11) NOT NULL,
  `foodID` int(11) NOT NULL AUTO_INCREMENT,
  `foodNAME` varchar(50) NOT NULL,
  `foodPIC` char(50) NOT NULL DEFAULT '',
  `foodPRICE` float NOT NULL DEFAULT '0',
  `foodDESC` text NOT NULL,
  PRIMARY KEY (`foodID`),
  KEY `idfood` (`userfoodID`),
  CONSTRAINT `idfood` FOREIGN KEY (`userfoodID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table fooduser.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='dalam ni ada id, username, password';

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
