# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Base de Dados: mvc2
# Tempo de Geração: 2017-07-10 19:26:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `title`)
VALUES
	(1,'Item1'),
	(2,'Item2'),
	(3,'Item3'),
	(4,'Item4'),
	(5,'Item5'),
	(6,'Item6'),
	(7,'Item7'),
	(8,'Item8'),
	(9,'Item9'),
	(10,'Item10'),
	(11,'Item11'),
	(12,'Item12'),
	(13,'Item13'),
	(14,'Item14'),
	(15,'Item15'),
	(16,'Item16'),
	(17,'Item17'),
	(18,'Item18'),
	(19,'Item19'),
	(20,'Item20'),
	(21,'Item21'),
	(22,'Item22'),
	(23,'Item23'),
	(24,'Item24'),
	(25,'Item25'),
	(26,'Item26'),
	(27,'Item27'),
	(28,'Item28'),
	(29,'Item29'),
	(30,'Item30'),
	(31,'Item31'),
	(32,'Item32'),
	(33,'Item33'),
	(34,'Item34'),
	(35,'Item35'),
	(36,'Item36'),
	(37,'Item37'),
	(38,'Item38'),
	(39,'Item39'),
	(40,'Item40'),
	(41,'Item41'),
	(42,'Item42'),
	(43,'Item43'),
	(44,'Item44'),
	(45,'Item45'),
	(46,'Item46'),
	(47,'Item47'),
	(48,'Item48'),
	(49,'Item49'),
	(50,'Item50'),
	(51,'Item51'),
	(52,'Item52'),
	(53,'Item53'),
	(54,'Item54');

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
