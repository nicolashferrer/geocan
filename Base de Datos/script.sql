-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.10


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema geocan
--

CREATE DATABASE IF NOT EXISTS geocan;
USE geocan;

--
-- Definition of table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES 
 (1,NULL,NULL,NULL,'controllers',1,196),
 (2,1,NULL,NULL,'Addresses',2,15),
 (3,2,NULL,NULL,'index',3,4),
 (4,2,NULL,NULL,'view',5,6),
 (5,2,NULL,NULL,'add',7,8),
 (6,2,NULL,NULL,'edit',9,10),
 (7,2,NULL,NULL,'delete',11,12),
 (8,2,NULL,NULL,'buildAcl',13,14),
 (9,1,NULL,NULL,'Answers',16,29),
 (10,9,NULL,NULL,'index',17,18),
 (11,9,NULL,NULL,'view',19,20),
 (12,9,NULL,NULL,'add',21,22),
 (13,9,NULL,NULL,'edit',23,24),
 (14,9,NULL,NULL,'delete',25,26),
 (15,9,NULL,NULL,'buildAcl',27,28),
 (16,1,NULL,NULL,'Cities',30,43),
 (17,16,NULL,NULL,'index',31,32),
 (18,16,NULL,NULL,'view',33,34),
 (19,16,NULL,NULL,'add',35,36),
 (20,16,NULL,NULL,'edit',37,38),
 (21,16,NULL,NULL,'delete',39,40),
 (22,16,NULL,NULL,'buildAcl',41,42),
 (23,1,NULL,NULL,'Groups',44,57),
 (24,23,NULL,NULL,'index',45,46),
 (25,23,NULL,NULL,'view',47,48),
 (26,23,NULL,NULL,'add',49,50),
 (27,23,NULL,NULL,'edit',51,52),
 (28,23,NULL,NULL,'delete',53,54),
 (29,23,NULL,NULL,'buildAcl',55,56),
 (30,1,NULL,NULL,'MedicTypes',58,71),
 (31,30,NULL,NULL,'index',59,60),
 (32,30,NULL,NULL,'view',61,62),
 (33,30,NULL,NULL,'add',63,64),
 (34,30,NULL,NULL,'edit',65,66),
 (35,30,NULL,NULL,'delete',67,68),
 (36,30,NULL,NULL,'buildAcl',69,70),
 (37,1,NULL,NULL,'Medics',72,85),
 (38,37,NULL,NULL,'index',73,74),
 (39,37,NULL,NULL,'view',75,76),
 (40,37,NULL,NULL,'add',77,78),
 (41,37,NULL,NULL,'edit',79,80),
 (42,37,NULL,NULL,'delete',81,82),
 (43,37,NULL,NULL,'buildAcl',83,84),
 (44,1,NULL,NULL,'Notes',86,99),
 (45,44,NULL,NULL,'index',87,88),
 (46,44,NULL,NULL,'view',89,90),
 (47,44,NULL,NULL,'add',91,92),
 (48,44,NULL,NULL,'edit',93,94),
 (49,44,NULL,NULL,'delete',95,96),
 (50,44,NULL,NULL,'buildAcl',97,98),
 (51,1,NULL,NULL,'OmsCodes',100,113),
 (52,51,NULL,NULL,'index',101,102),
 (53,51,NULL,NULL,'view',103,104),
 (54,51,NULL,NULL,'add',105,106),
 (55,51,NULL,NULL,'edit',107,108),
 (56,51,NULL,NULL,'delete',109,110),
 (57,51,NULL,NULL,'buildAcl',111,112),
 (58,1,NULL,NULL,'OmsRegisters',114,127),
 (59,58,NULL,NULL,'index',115,116),
 (60,58,NULL,NULL,'view',117,118),
 (61,58,NULL,NULL,'add',119,120),
 (62,58,NULL,NULL,'edit',121,122),
 (63,58,NULL,NULL,'delete',123,124),
 (64,58,NULL,NULL,'buildAcl',125,126),
 (65,1,NULL,NULL,'Pages',128,133),
 (66,65,NULL,NULL,'display',129,130),
 (67,65,NULL,NULL,'buildAcl',131,132),
 (68,1,NULL,NULL,'Patients',134,147),
 (69,68,NULL,NULL,'index',135,136),
 (70,68,NULL,NULL,'view',137,138),
 (71,68,NULL,NULL,'add',139,140),
 (72,68,NULL,NULL,'edit',141,142),
 (73,68,NULL,NULL,'delete',143,144),
 (74,68,NULL,NULL,'buildAcl',145,146),
 (75,1,NULL,NULL,'Provinces',148,161),
 (76,75,NULL,NULL,'index',149,150),
 (77,75,NULL,NULL,'view',151,152),
 (78,75,NULL,NULL,'add',153,154),
 (79,75,NULL,NULL,'edit',155,156),
 (80,75,NULL,NULL,'delete',157,158),
 (81,75,NULL,NULL,'buildAcl',159,160),
 (82,1,NULL,NULL,'Questions',162,175),
 (83,82,NULL,NULL,'index',163,164),
 (84,82,NULL,NULL,'view',165,166),
 (85,82,NULL,NULL,'add',167,168),
 (86,82,NULL,NULL,'edit',169,170),
 (87,82,NULL,NULL,'delete',171,172),
 (88,82,NULL,NULL,'buildAcl',173,174),
 (89,1,NULL,NULL,'Users',176,193),
 (90,89,NULL,NULL,'index',177,178),
 (91,89,NULL,NULL,'view',179,180),
 (92,89,NULL,NULL,'add',181,182),
 (93,89,NULL,NULL,'edit',183,184),
 (94,89,NULL,NULL,'delete',185,186),
 (95,89,NULL,NULL,'login',187,188),
 (96,89,NULL,NULL,'logout',189,190),
 (97,89,NULL,NULL,'buildAcl',191,192),
 (98,1,NULL,NULL,'AclExtras',194,195);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;


--
-- Definition of table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `direccion` varchar(255),
  PRIMARY KEY (`id`),
  KEY `FK_address_city` (`city_id`),
  CONSTRAINT `FK_address_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Definition of table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` char(36) NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `valor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_respuesta_paciente` (`patient_id`) USING BTREE,
  KEY `FK_answer_question` (`question_id`),
  CONSTRAINT `FK_answer_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  CONSTRAINT `FK_answer_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Definition of table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES 
 (1,NULL,'Group',1,'',1,4),
 (2,NULL,'Group',2,'',5,6),
 (3,1,'User',1,'',2,3),
 (4,NULL,'Group',3,'',7,8);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;


--
-- Definition of table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`,`aro_id`,`aco_id`,`_create`,`_read`,`_update`,`_delete`) VALUES 
 (1,3,1,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;


--
-- Definition of table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cities_provinces` (`province_id`),
  CONSTRAINT `FK_cities_provinces` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`,`nombre`,`province_id`) VALUES 
 (1,'Bahia Blanca',1);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;


--
-- Definition of table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`,`name`,`created`,`modified`) VALUES 
 (1,'administradores','2012-04-13 22:22:17','2012-04-13 22:22:17'),
 (2,'medicos','2012-04-13 22:22:42','2012-04-15 23:01:42'),
 (3,'usuarios','2012-04-15 23:01:27','2012-04-15 23:01:27');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


--
-- Definition of table `medic_types`
--

DROP TABLE IF EXISTS `medic_types`;
CREATE TABLE `medic_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medic_types`
--

/*!40000 ALTER TABLE `medic_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `medic_types` ENABLE KEYS */;


--
-- Definition of table `medics`
--

DROP TABLE IF EXISTS `medics`;
CREATE TABLE `medics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `medic_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_medico_tipo_medico` (`medic_type_id`),
  CONSTRAINT `FK_medic_type_medic` FOREIGN KEY (`medic_type_id`) REFERENCES `medic_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medics`
--

/*!40000 ALTER TABLE `medics` DISABLE KEYS */;
/*!40000 ALTER TABLE `medics` ENABLE KEYS */;


--
-- Definition of table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `medic_id` int(10) unsigned NOT NULL,
  `oms_register_id` int(10) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_nota_medico` (`medic_id`),
  KEY `FK_nota_oms` (`oms_register_id`),
  KEY `FK_notes_medic` (`medic_id`),
  KEY `FK_notes_oms_register` (`oms_register_id`),
  CONSTRAINT `FK_notes_medic` FOREIGN KEY (`medic_id`) REFERENCES `medics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_notes_oms_register` FOREIGN KEY (`oms_register_id`) REFERENCES `oms_registers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;


--
-- Definition of table `oms_codes`
--

DROP TABLE IF EXISTS `oms_codes`;
CREATE TABLE `oms_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `padre` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oms_codes`
--

/*!40000 ALTER TABLE `oms_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oms_codes` ENABLE KEYS */;


--
-- Definition of table `oms_registers`
--

DROP TABLE IF EXISTS `oms_registers`;
CREATE TABLE `oms_registers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` char(36) NOT NULL,
  `medic_id` int(10) unsigned NOT NULL,
  `address_part_id` int(10) unsigned DEFAULT NULL,
  `address_lab_id` int(10) unsigned DEFAULT NULL,
  `oms_code_id` int(10) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_oms_paciente` (`patient_id`),
  KEY `FK_oms_medico` (`medic_id`),
  KEY `FK_oms_direccion1` (`address_part_id`),
  KEY `FK_oms_direccion2` (`address_lab_id`),
  KEY `FK_oms_codigo_oms` (`oms_code_id`),
  KEY `FK_oms_registers_patient` (`patient_id`),
  KEY `FK_oms_registers_medic` (`medic_id`),
  KEY `FK_oms_registers_address1` (`address_part_id`),
  KEY `FK_oms_registers_address2` (`address_lab_id`),
  KEY `FK_oms_registers_oms_code` (`oms_code_id`),
  CONSTRAINT `FK_oms_registers_address1` FOREIGN KEY (`address_part_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_oms_registers_address2` FOREIGN KEY (`address_lab_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_oms_registers_medic` FOREIGN KEY (`medic_id`) REFERENCES `medics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_oms_registers_oms_code` FOREIGN KEY (`oms_code_id`) REFERENCES `oms_codes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_oms_registers_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oms_registers`
--

/*!40000 ALTER TABLE `oms_registers` DISABLE KEYS */;
/*!40000 ALTER TABLE `oms_registers` ENABLE KEYS */;


--
-- Definition of table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `id` char(36) NOT NULL,
  `iniciales` varchar(5) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `address_particular_id` int(10) unsigned DEFAULT NULL,
  `address_laboral_id` int(10) unsigned DEFAULT NULL,
  `nro_documento` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_patient_address1` (`address_particular_id`),
  KEY `FK_patient_address2` (`address_laboral_id`),
  CONSTRAINT `FK_patient_address1` FOREIGN KEY (`address_particular_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `FK_patient_address2` FOREIGN KEY (`address_laboral_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Definition of table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`,`nombre`) VALUES 
 (1,'Buenos Aires');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;


--
-- Definition of table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`,`descripcion`,`visible`) VALUES 
 (1,'Fuma?',1),
 (2,'Bebe?',1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `medic_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_users_group` (`group_id`),
  KEY `FK_users_medic` (`medic_id`),
  CONSTRAINT `FK_users_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `FK_users_medic` FOREIGN KEY (`medic_id`) REFERENCES `medics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`username`,`password`,`group_id`,`created`,`modified`,`medic_id`) VALUES 
 (1,'admin','ffda0a8dd1efa6cb63f0e51ca914e75e45e4b45c',1,'2012-04-13 22:24:30','2012-04-13 22:24:30',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
