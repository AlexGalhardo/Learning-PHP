# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Base de Dados: projeto_popularselect
# Tempo de Geração: 2017-07-10 21:17:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela aulas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aulas`;

CREATE TABLE `aulas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;

INSERT INTO `aulas` (`id`, `id_modulo`, `titulo`)
VALUES
	(1,1,'Soma'),
	(2,1,'Substração'),
	(3,1,'Divisão'),
	(4,1,'Multiplicação'),
	(5,2,'Verbo'),
	(6,2,'Substantivo'),
	(7,2,'Pronome'),
	(8,2,'Adjetivo'),
	(9,3,'Brasil'),
	(10,3,'Estados Unidos'),
	(11,3,'Alemanha'),
	(12,3,'Japão');

/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela modulos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;

INSERT INTO `modulos` (`id`, `titulo`)
VALUES
	(1,'Matemática'),
	(2,'Português'),
	(3,'História');

/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
