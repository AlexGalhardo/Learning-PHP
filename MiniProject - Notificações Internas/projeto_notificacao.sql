# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Base de Dados: projeto_notificacao
# Tempo de Geração: 2017-10-12 12:15:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela notificacoes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notificacoes`;

CREATE TABLE `notificacoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `data_notificacao` datetime DEFAULT NULL,
  `notificacao_tipo` varchar(50) DEFAULT NULL,
  `propriedades` text,
  `lido` tinyint(1) DEFAULT '0',
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `notificacoes` WRITE;
/*!40000 ALTER TABLE `notificacoes` DISABLE KEYS */;

INSERT INTO `notificacoes` (`id`, `id_user`, `data_notificacao`, `notificacao_tipo`, `propriedades`, `lido`, `link`)
VALUES
	(2,1,NULL,'MSG','{\"msg\":\"Notificacao de teste\"}',1,'laskjrlkajsr'),
	(3,1,NULL,'MSG','{\"msg\":\"Notificacao 2\"}',1,'alsrjklasjrljasr'),
	(4,1,NULL,'CURTIDA','{\"curtidor\":\"2\",\"id_foto\":\"123\"}',0,'http://seusite.com/foto/123'),
	(5,1,NULL,'CURTIDA','{\"curtidor\":\"2\",\"id_foto\":\"123\"}',0,'http://seusite.com/foto/123'),
	(6,1,NULL,'CURTIDA','{\"curtidor\":\"2\",\"id_foto\":\"123\"}',0,'http://seusite.com/foto/123'),
	(7,1,NULL,'CURTIDA','{\"curtidor\":\"2\",\"id_foto\":\"123\"}',0,'http://seusite.com/foto/123'),
	(8,1,NULL,'CURTIDA','{\"curtidor\":\"2\",\"id_foto\":\"123\"}',0,'http://seusite.com/foto/123'),
	(9,1,NULL,'CURTIDA','{\"curtidor\":\"2\",\"id_foto\":\"123\"}',0,'http://seusite.com/foto/123'),
	(10,1,NULL,'CURTIDA','{\"curtidor\":\"2\",\"id_foto\":\"123\"}',0,'http://seusite.com/foto/123');

/*!40000 ALTER TABLE `notificacoes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
