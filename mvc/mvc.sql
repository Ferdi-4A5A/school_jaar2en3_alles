-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for mvc
CREATE DATABASE IF NOT EXISTS `mvc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mvc`;


-- Dumping structure for table mvc.info
CREATE TABLE IF NOT EXISTS `info` (
  `mvcID` int(11) NOT NULL AUTO_INCREMENT,
  `mvcName` varchar(50) NOT NULL DEFAULT '0',
  `mvcEmail` varchar(50) NOT NULL DEFAULT '0',
  `mvcAddress` varchar(50) NOT NULL DEFAULT '0',
  `mvcTelephone` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mvcID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table mvc.info: ~5 rows (approximately)
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` (`mvcID`, `mvcName`, `mvcEmail`, `mvcAddress`, `mvcTelephone`) VALUES
	(1, 'adsf', 'argeagre', 'hasrtsthr', '0aregareg'),
	(2, 'rgaeareg', 'htsht', 'aregareg', 'aergtre'),
	(3, 'srtareg', 'aergarg', 'aregag', 'htsth'),
	(4, 'dshth', 'rtrtstr', '0arar', '0afdagdf'),
	(5, 'argarg', 'tsrtstr', 'atrshtsr', 'rthstrh');
/*!40000 ALTER TABLE `info` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
