# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Base de Dados: projeto_marketingmn
# Tempo de Geração: 2017-11-27 20:06:52 +0000
# ************************************************************
# 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela patentes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `patentes`;

CREATE TABLE `patentes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `min` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `patentes` WRITE;
/*!40000 ALTER TABLE `patentes` DISABLE KEYS */;

INSERT INTO `patentes` (`id`, `nome`, `min`)
VALUES
	(1,'Iniciante',0),
	(2,'Junior',1),
	(3,'Diretor',3),
	(4,'Diretor Sênior',5),
	(5,'Executivo',10);

/*!40000 ALTER TABLE `patentes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pai` int(11) DEFAULT NULL,
  `patente` int(11) NOT NULL DEFAULT '1',
  `nome` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `id_pai`, `patente`, `nome`, `email`, `senha`)
VALUES
	(1,NULL,4,'Sistema','sistema@hotmail.com','202cb962ac59075b964b07152d234b70'),
	(2,1,1,'Fulano','fulano@gmail.com','202cb962ac59075b964b07152d234b70'),
	(3,1,4,'Cicrano','cicrano@gmail.com','202cb962ac59075b964b07152d234b70'),
	(4,3,3,'Paulo','paulo@gmail.com','202cb962ac59075b964b07152d234b70'),
	(5,3,1,'Pedro','pedro@gmail.com','202cb962ac59075b964b07152d234b70'),
	(6,4,2,'João','joao@gmail.com','202cb962ac59075b964b07152d234b70'),
	(7,6,2,'Pedrinho','pedrinho@gmail.com','202cb962ac59075b964b07152d234b70'),
	(8,7,1,'Roberto','roberto@gmail.com','202cb962ac59075b964b07152d234b70');

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
