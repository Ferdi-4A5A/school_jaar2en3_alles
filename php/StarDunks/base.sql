-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.1.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Databasestructuur van Products wordt geschreven
CREATE DATABASE IF NOT EXISTS `Products` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Products`;

-- Structuur van  tabel Products.Products wordt geschreven
CREATE TABLE IF NOT EXISTS `Products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_code` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` decimal(19,2) DEFAULT NULL,
  `other_product_details` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel Products.Products: ~5 rows (ongeveer)
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES
	(1, 1, 1, 'Sprinkled', 1.29, '1 pc.'),
	(2, 1, 1, 'Chocolate test test 123', 1.49, '1 pc.'),
	(3, 1, 1, 'Maple test test', 1.49, '1 pc. test'),
	(5, 3, 3, 'Steak Long Jim test', 2.29, 'Steak Wrap'),
	(21, 2, 2, 'testwef', 43.43, 'ergegr');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
