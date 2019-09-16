# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Base de Dados: contaazul
# Tempo de Geração: 2016-11-27 06:16:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address_number` varchar(50) DEFAULT NULL,
  `address_neighb` varchar(100) DEFAULT NULL,
  `address_city` varchar(50) DEFAULT NULL,
  `address_state` varchar(50) DEFAULT NULL,
  `address_country` varchar(50) DEFAULT NULL,
  `address_zipcode` varchar(50) DEFAULT NULL,
  `stars` int(11) NOT NULL DEFAULT '3',
  `internal_obs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `id_company`, `name`, `email`, `phone`, `address`, `address2`, `address_number`, `address_neighb`, `address_city`, `address_state`, `address_country`, `address_zipcode`, `stars`, `internal_obs`)
VALUES
	(2,1,'Cliente de Teste 1','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(3,1,'Cliente de Teste 2','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(4,1,'Cliente de Teste 3','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(5,1,'Cliente de Teste 4','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(6,1,'Cliente de Teste 5','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(7,1,'Cliente de Teste 6','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(8,1,'Cliente de Teste 7','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(9,1,'Cliente de Teste 8','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(10,1,'Cliente de Teste 9','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(11,1,'Cliente de Teste 10','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(12,1,'Cliente de Teste 11','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(13,1,'Cliente de Teste 12','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(14,1,'Cliente de Teste 13','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(15,1,'Cliente de Teste 14','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(16,1,'Cliente de Teste 15','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(17,1,'Cliente de Teste 16','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(18,1,'Cliente de Teste 17','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(19,1,'Cliente de Teste 18','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(20,1,'Cliente de Teste 19','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(21,1,'Cliente de Teste 20','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(22,1,'Cliente de Teste 21','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(23,1,'Cliente de Teste 22','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(24,1,'Cliente de Teste 23','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(25,1,'Cliente de Teste 24','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(26,1,'Cliente de Teste 25','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(27,1,'Cliente de Teste 26','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(28,1,'Cliente de Teste 27','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(29,1,'Cliente de Teste 28','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(30,1,'Cliente de Teste 29','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(31,1,'Cliente de Teste 30','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(32,1,'Cliente de Teste 31','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(33,1,'Cliente de Teste 32','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(34,1,'Cliente de Teste 33','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(35,1,'Cliente de Teste 34','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(36,1,'Cliente de Teste 35','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(37,1,'Cliente de Teste 36','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(38,1,'Cliente de Teste 37','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(39,1,'Cliente de Teste 38','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(40,1,'Cliente de Teste 39','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(41,1,'Cliente de Teste 40','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(42,1,'Cliente de Teste 41','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(43,1,'Cliente de Teste 42','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(44,1,'Cliente de Teste 43','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(45,1,'Cliente de Teste 44','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(46,1,'Cliente de Teste 45','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(47,1,'Cliente de Teste 46','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(48,1,'Cliente de Teste 47','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(49,1,'Cliente de Teste 48','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(50,1,'Cliente de Teste 49','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(51,1,'Cliente de Teste 50','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(52,1,'Cliente de Teste 51','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(53,1,'Cliente de Teste 52','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(54,1,'Cliente de Teste 53','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(55,1,'Cliente de Teste 54','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(56,1,'Cliente de Teste 55','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(57,1,'Cliente de Teste 56','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(58,1,'Cliente de Teste 57','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(59,1,'Cliente de Teste 58','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(60,1,'Cliente de Teste 59','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(61,1,'Cliente de Teste 60','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(62,1,'Cliente de Teste 61','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(63,1,'Cliente de Teste 62','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(64,1,'Cliente de Teste 63','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(65,1,'Cliente de Teste 64','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(66,1,'Cliente de Teste 65','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(67,1,'Cliente de Teste 66','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(68,1,'Cliente de Teste 67','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(69,1,'Cliente de Teste 68','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(70,1,'Cliente de Teste 69','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(71,1,'Cliente de Teste 70','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(72,1,'Cliente de Teste 71','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(73,1,'Cliente de Teste 72','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(74,1,'Cliente de Teste 73','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(75,1,'Cliente de Teste 74','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(76,1,'Cliente de Teste 75','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(77,1,'Cliente de Teste 76','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(78,1,'Cliente de Teste 77','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(79,1,'Cliente de Teste 78','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(80,1,'Cliente de Teste 79','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(81,1,'Cliente de Teste 80','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(82,1,'Cliente de Teste 81','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(83,1,'Cliente de Teste 82','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(84,1,'Cliente de Teste 83','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(85,1,'Cliente de Teste 84','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(86,1,'Cliente de Teste 85','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(87,1,'Cliente de Teste 86','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(88,1,'Cliente de Teste 87','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(89,1,'Cliente de Teste 88','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(90,1,'Cliente de Teste 89','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(91,1,'Cliente de Teste 90','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(92,1,'Cliente de Teste 91','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(93,1,'Cliente de Teste 92','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(94,1,'Cliente de Teste 93','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(95,1,'Cliente de Teste 94','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(96,1,'Cliente de Teste 95','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(97,1,'Cliente de Teste 96','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(98,1,'Cliente de Teste 97','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(99,1,'Cliente de Teste 98','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(100,1,'Cliente de Teste 99','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(101,1,'Cliente de Teste 100','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(102,1,'Cliente de Teste 101','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(103,1,'Cliente de Teste 102','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(104,1,'Cliente de Teste 103','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(105,1,'Cliente de Teste 104','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(106,1,'Cliente de Teste 105','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(107,1,'Cliente de Teste 106','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(108,1,'Cliente de Teste 107','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(109,1,'Cliente de Teste 108','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(110,1,'Cliente de Teste 109','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(111,1,'Cliente de Teste 110','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(112,1,'Cliente de Teste 111','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(113,1,'Cliente de Teste 112','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(114,1,'Cliente de Teste 113','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(115,1,'Cliente de Teste 114','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(116,1,'Cliente de Teste 115','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(117,1,'Cliente de Teste 116','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(118,1,'Cliente de Teste 117','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(119,1,'Cliente de Teste 118','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(120,1,'Cliente de Teste 119','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(121,1,'Cliente de Teste 120','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(122,1,'Cliente de Teste 121','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(123,1,'Cliente de Teste 122','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(124,1,'Cliente de Teste 123','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(125,1,'Cliente de Teste 124','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(126,1,'Cliente de Teste 125','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(127,1,'Cliente de Teste 126','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(128,1,'Cliente de Teste 127','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(129,1,'Cliente de Teste 128','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(130,1,'Cliente de Teste 129','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(131,1,'Cliente de Teste 130','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(132,1,'Cliente de Teste 131','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(133,1,'Cliente de Teste 132','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(134,1,'Cliente de Teste 133','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(135,1,'Cliente de Teste 134','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(136,1,'Cliente de Teste 135','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(137,1,'Cliente de Teste 136','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(138,1,'Cliente de Teste 137','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(139,1,'Cliente de Teste 138','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(140,1,'Cliente de Teste 139','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(141,1,'Cliente de Teste 140','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(142,1,'Cliente de Teste 141','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(143,1,'Cliente de Teste 142','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(144,1,'Cliente de Teste 143','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(145,1,'Cliente de Teste 144','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(146,1,'Cliente de Teste 145','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(147,1,'Cliente de Teste 146','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(148,1,'Cliente de Teste 147','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(149,1,'Cliente de Teste 148','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(150,1,'Cliente de Teste 149','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(151,1,'Cliente de Teste 150','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(152,1,'Cliente de Teste 151','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(153,1,'Cliente de Teste 152','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(154,1,'Cliente de Teste 153','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(155,1,'Cliente de Teste 154','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(156,1,'Cliente de Teste 155','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(157,1,'Cliente de Teste 156','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(158,1,'Cliente de Teste 157','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(159,1,'Cliente de Teste 158','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(160,1,'Cliente de Teste 159','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(161,1,'Cliente de Teste 160','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(162,1,'Cliente de Teste 161','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(163,1,'Cliente de Teste 162','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(164,1,'Cliente de Teste 163','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(165,1,'Cliente de Teste 164','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(166,1,'Cliente de Teste 165','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(167,1,'Cliente de Teste 166','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(168,1,'Cliente de Teste 167','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(169,1,'Cliente de Teste 168','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(170,1,'Cliente de Teste 169','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(171,1,'Cliente de Teste 170','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(172,1,'Cliente de Teste 171','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(173,1,'Cliente de Teste 172','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(174,1,'Cliente de Teste 173','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(175,1,'Cliente de Teste 174','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(176,1,'Cliente de Teste 175','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(177,1,'Cliente de Teste 176','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(178,1,'Cliente de Teste 177','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(179,1,'Cliente de Teste 178','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(180,1,'Cliente de Teste 179','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(181,1,'Cliente de Teste 180','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(182,1,'Cliente de Teste 181','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(183,1,'Cliente de Teste 182','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(184,1,'Cliente de Teste 183','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(185,1,'Cliente de Teste 184','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(186,1,'Cliente de Teste 185','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(187,1,'Cliente de Teste 186','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(188,1,'Cliente de Teste 187','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(189,1,'Cliente de Teste 188','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(190,1,'Cliente de Teste 189','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(191,1,'Cliente de Teste 190','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(192,1,'Cliente de Teste 191','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(193,1,'Cliente de Teste 192','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(194,1,'Cliente de Teste 193','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(195,1,'Cliente de Teste 194','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(196,1,'Cliente de Teste 195','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(197,1,'Cliente de Teste 196','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(198,1,'Cliente de Teste 197','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(199,1,'Cliente de Teste 198','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(200,1,'Cliente de Teste 199','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(201,1,'Cliente de Teste 200','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(202,1,'Cliente de Teste 201','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(203,1,'Cliente de Teste 202','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(204,1,'Cliente de Teste 203','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(205,1,'Cliente de Teste 204','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(206,1,'Cliente de Teste 205','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(207,1,'Cliente de Teste 206','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(208,1,'Cliente de Teste 207','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(209,1,'Cliente de Teste 208','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(210,1,'Cliente de Teste 209','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(211,1,'Cliente de Teste 210','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(212,1,'Cliente de Teste 211','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(213,1,'Cliente de Teste 212','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(214,1,'Cliente de Teste 213','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(215,1,'Cliente de Teste 214','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(216,1,'Cliente de Teste 215','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(217,1,'Cliente de Teste 216','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(218,1,'Cliente de Teste 217','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(219,1,'Cliente de Teste 218','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(220,1,'Cliente de Teste 219','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(221,1,'Cliente de Teste 220','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(222,1,'Cliente de Teste 221','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(223,1,'Cliente de Teste 222','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(224,1,'Cliente de Teste 223','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(225,1,'Cliente de Teste 224','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(226,1,'Cliente de Teste 225','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(227,1,'Cliente de Teste 226','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(228,1,'Cliente de Teste 227','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(229,1,'Cliente de Teste 228','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(230,1,'Cliente de Teste 229','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(231,1,'Cliente de Teste 230','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(232,1,'Cliente de Teste 231','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(233,1,'Cliente de Teste 232','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(234,1,'Cliente de Teste 233','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(235,1,'Cliente de Teste 234','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(236,1,'Cliente de Teste 235','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(237,1,'Cliente de Teste 236','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(238,1,'Cliente de Teste 237','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(239,1,'Cliente de Teste 238','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(240,1,'Cliente de Teste 239','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(241,1,'Cliente de Teste 240','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(242,1,'Cliente de Teste 241','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(243,1,'Cliente de Teste 242','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(244,1,'Cliente de Teste 243','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(245,1,'Cliente de Teste 244','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(246,1,'Cliente de Teste 245','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(247,1,'Cliente de Teste 246','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(248,1,'Cliente de Teste 247','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(249,1,'Cliente de Teste 248','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(250,1,'Cliente de Teste 249','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(251,1,'Cliente de Teste 250','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(252,1,'Cliente de Teste 251','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(253,1,'Cliente de Teste 252','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(254,1,'Cliente de Teste 253','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(255,1,'Cliente de Teste 254','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(256,1,'Cliente de Teste 255','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(257,1,'Cliente de Teste 256','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(258,1,'Cliente de Teste 257','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(259,1,'Cliente de Teste 258','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(260,1,'Cliente de Teste 259','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(261,1,'Cliente de Teste 260','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(262,1,'Cliente de Teste 261','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(263,1,'Cliente de Teste 262','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(264,1,'Cliente de Teste 263','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(265,1,'Cliente de Teste 264','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(266,1,'Cliente de Teste 265','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(267,1,'Cliente de Teste 266','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(268,1,'Cliente de Teste 267','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(269,1,'Cliente de Teste 268','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(270,1,'Cliente de Teste 269','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(271,1,'Cliente de Teste 270','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(272,1,'Cliente de Teste 271','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(273,1,'Cliente de Teste 272','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(274,1,'Cliente de Teste 273','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(275,1,'Cliente de Teste 274','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(276,1,'Cliente de Teste 275','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(277,1,'Cliente de Teste 276','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(278,1,'Cliente de Teste 277','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(279,1,'Cliente de Teste 278','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(280,1,'Cliente de Teste 279','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(281,1,'Cliente de Teste 280','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(282,1,'Cliente de Teste 281','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(283,1,'Cliente de Teste 282','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(284,1,'Cliente de Teste 283','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(285,1,'Cliente de Teste 284','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(286,1,'Cliente de Teste 285','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(287,1,'Cliente de Teste 286','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(288,1,'Cliente de Teste 287','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(289,1,'Cliente de Teste 288','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(290,1,'Cliente de Teste 289','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(291,1,'Cliente de Teste 290','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(292,1,'Cliente de Teste 291','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(293,1,'Cliente de Teste 292','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(294,1,'Cliente de Teste 293','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(295,1,'Cliente de Teste 294','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(296,1,'Cliente de Teste 295','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(297,1,'Cliente de Teste 296','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(298,1,'Cliente de Teste 297','cliente@hotmail.com','123','Rua Fernando Barbosa de Melo','ap 123','123','CatolÃ©','Campina Grande','PB','Brasil','58410440',3,'alguma observaÃ§Ã£o 2'),
	(299,1,'Bonieky','','','','','','','','','','',3,''),
	(300,1,'Bonieky Lacerda','','','','','','','','','','',3,'');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `name`)
VALUES
	(1,'Empresa 123');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela inventory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `price` float NOT NULL,
  `quant` int(11) NOT NULL,
  `min_quant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;

INSERT INTO `inventory` (`id`, `id_company`, `name`, `price`, `quant`, `min_quant`)
VALUES
	(2,1,'Teste 2 (Editado)',250,15,20),
	(4,1,'Produto de Limpeza',45,1,10);

/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela inventory_history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inventory_history`;

CREATE TABLE `inventory_history` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `action` varchar(3) NOT NULL DEFAULT '',
  `date_action` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `inventory_history` WRITE;
/*!40000 ALTER TABLE `inventory_history` DISABLE KEYS */;

INSERT INTO `inventory_history` (`id`, `id_company`, `id_product`, `id_user`, `action`, `date_action`)
VALUES
	(2,1,2,1,'add','2016-09-29 06:00:23'),
	(3,1,2,1,'edt','2016-10-04 21:14:11'),
	(4,1,2,1,'edt','2016-10-04 21:14:33'),
	(5,1,2,1,'edt','2016-10-04 21:14:38'),
	(6,1,2,1,'edt','2016-10-04 21:14:42'),
	(7,1,2,1,'edt','2016-10-04 21:14:55'),
	(8,1,2,1,'edt','2016-10-04 21:23:57'),
	(9,1,2,1,'edt','2016-10-04 21:25:52'),
	(10,1,2,1,'edt','2016-10-04 21:26:01'),
	(11,1,2,1,'edt','2016-10-04 21:26:12'),
	(12,1,3,1,'add','2016-10-04 21:32:59'),
	(13,1,3,1,'del','2016-10-04 21:33:08'),
	(14,1,4,1,'add','2016-10-08 10:01:50'),
	(15,1,2,1,'dwn','2016-10-08 10:44:42'),
	(16,1,4,1,'dwn','2016-10-08 10:44:42'),
	(17,1,2,1,'edt','2016-10-18 16:53:43'),
	(18,1,2,1,'edt','2016-10-18 17:07:33'),
	(19,1,2,1,'edt','2016-10-18 17:08:04'),
	(20,1,4,1,'edt','2016-10-18 17:08:11');

/*!40000 ALTER TABLE `inventory_history` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela permission_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_groups`;

CREATE TABLE `permission_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `params` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `permission_groups` WRITE;
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;

INSERT INTO `permission_groups` (`id`, `id_company`, `name`, `params`)
VALUES
	(1,1,'Desenvolvedores','1,2,7,9,10,11,12,13,14,15,16,18'),
	(4,1,'Testadores','1');

/*!40000 ALTER TABLE `permission_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela permission_params
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_params`;

CREATE TABLE `permission_params` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `permission_params` WRITE;
/*!40000 ALTER TABLE `permission_params` DISABLE KEYS */;

INSERT INTO `permission_params` (`id`, `id_company`, `name`)
VALUES
	(1,1,'logout'),
	(2,1,'permissions_view'),
	(7,1,'nomedapermissao'),
	(9,1,'users_view'),
	(10,1,'clients_view'),
	(11,1,'clients_edit'),
	(12,1,'inventory_view'),
	(13,1,'inventory_add'),
	(14,1,'inventory_edit'),
	(15,1,'sales_view'),
	(16,1,'sales_edit'),
	(18,1,'report_view');

/*!40000 ALTER TABLE `permission_params` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela purchases
# ------------------------------------------------------------

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_purchase` datetime NOT NULL,
  `total_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela purchases_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `purchases_products`;

CREATE TABLE `purchases_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `quant` int(11) NOT NULL,
  `purchase_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela sales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_sale` datetime NOT NULL,
  `total_price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;

INSERT INTO `sales` (`id`, `id_company`, `id_client`, `id_user`, `date_sale`, `total_price`, `status`)
VALUES
	(1,1,300,1,'2016-11-07 08:50:51',124.3,2),
	(2,1,300,1,'2016-10-30 10:29:03',1385,0),
	(3,1,299,1,'2016-11-11 10:44:42',545,1);

/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela sales_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sales_products`;

CREATE TABLE `sales_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sales_products` WRITE;
/*!40000 ALTER TABLE `sales_products` DISABLE KEYS */;

INSERT INTO `sales_products` (`id`, `id_company`, `id_sale`, `id_product`, `quant`, `sale_price`)
VALUES
	(1,1,2,2,5,250),
	(2,1,2,4,3,45),
	(3,1,3,2,2,250),
	(4,1,3,4,1,45);

/*!40000 ALTER TABLE `sales_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `id_company`, `email`, `password`, `id_group`)
VALUES
	(1,1,'admin@empresa123.com.br','202cb962ac59075b964b07152d234b70',1),
	(4,1,'teste@hotmail.com','202cb962ac59075b964b07152d234b70',4);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
