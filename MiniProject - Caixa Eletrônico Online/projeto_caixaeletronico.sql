# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Base de Dados: projeto_caixaeletronico
# Tempo de Geração: 2017-07-10 15:31:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela contas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contas`;

CREATE TABLE `contas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titular` varchar(100) DEFAULT NULL,
  `agencia` int(11) DEFAULT NULL,
  `conta` int(11) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contas` WRITE;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;

INSERT INTO `contas` (`id`, `titular`, `agencia`, `conta`, `senha`, `saldo`)
VALUES
	(1,'Bonieky Lacerda',123,321,'202cb962ac59075b964b07152d234b70',5083.2);

/*!40000 ALTER TABLE `contas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela historico
# ------------------------------------------------------------

DROP TABLE IF EXISTS `historico`;

CREATE TABLE `historico` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_conta` int(11) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_operacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `historico` WRITE;
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;

INSERT INTO `historico` (`id`, `id_conta`, `tipo`, `valor`, `data_operacao`)
VALUES
	(1,1,0,1000,'2017-07-10 12:28:00'),
	(2,1,1,150.3,'2017-07-10 12:28:31'),
	(3,1,0,20,'2017-07-10 12:28:54'),
	(4,1,1,69.7,'2017-07-10 12:29:09'),
	(5,1,1,100,'2017-07-10 12:29:20'),
	(6,1,0,4983.2,'2017-07-10 12:29:35'),
	(7,1,1,600,'2017-07-10 12:29:50');

/*!40000 ALTER TABLE `historico` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
