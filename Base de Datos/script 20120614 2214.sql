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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES 
 (1,NULL,NULL,NULL,'controllers',1,192),
 (2,1,NULL,NULL,'Addresses',2,13),
 (3,2,NULL,NULL,'index',3,4),
 (4,2,NULL,NULL,'view',5,6),
 (5,2,NULL,NULL,'add',7,8),
 (6,2,NULL,NULL,'edit',9,10),
 (7,2,NULL,NULL,'delete',11,12),
 (9,1,NULL,NULL,'Answers',14,25),
 (10,9,NULL,NULL,'index',15,16),
 (11,9,NULL,NULL,'view',17,18),
 (12,9,NULL,NULL,'add',19,20),
 (13,9,NULL,NULL,'edit',21,22),
 (14,9,NULL,NULL,'delete',23,24),
 (16,1,NULL,NULL,'Cities',26,39),
 (17,16,NULL,NULL,'index',27,28),
 (18,16,NULL,NULL,'view',29,30),
 (19,16,NULL,NULL,'add',31,32),
 (20,16,NULL,NULL,'edit',33,34),
 (21,16,NULL,NULL,'delete',35,36),
 (23,1,NULL,NULL,'Groups',40,53),
 (24,23,NULL,NULL,'index',41,42),
 (25,23,NULL,NULL,'view',43,44),
 (26,23,NULL,NULL,'add',45,46),
 (27,23,NULL,NULL,'edit',47,48),
 (28,23,NULL,NULL,'delete',49,50),
 (30,1,NULL,NULL,'MedicTypes',54,65),
 (31,30,NULL,NULL,'index',55,56),
 (32,30,NULL,NULL,'view',57,58),
 (33,30,NULL,NULL,'add',59,60),
 (34,30,NULL,NULL,'edit',61,62),
 (35,30,NULL,NULL,'delete',63,64),
 (37,1,NULL,NULL,'Medics',66,77),
 (38,37,NULL,NULL,'index',67,68),
 (39,37,NULL,NULL,'view',69,70),
 (40,37,NULL,NULL,'add',71,72),
 (41,37,NULL,NULL,'edit',73,74),
 (42,37,NULL,NULL,'delete',75,76),
 (44,1,NULL,NULL,'Notes',78,89),
 (45,44,NULL,NULL,'index',79,80),
 (46,44,NULL,NULL,'view',81,82),
 (47,44,NULL,NULL,'add',83,84),
 (48,44,NULL,NULL,'edit',85,86),
 (49,44,NULL,NULL,'delete',87,88),
 (51,1,NULL,NULL,'OmsCodes',90,107),
 (52,51,NULL,NULL,'index',91,92),
 (53,51,NULL,NULL,'view',93,94),
 (54,51,NULL,NULL,'add',95,96),
 (55,51,NULL,NULL,'edit',97,98),
 (56,51,NULL,NULL,'delete',99,100),
 (58,1,NULL,NULL,'OmsRegisters',108,119),
 (59,58,NULL,NULL,'index',109,110),
 (60,58,NULL,NULL,'view',111,112),
 (61,58,NULL,NULL,'add',113,114),
 (62,58,NULL,NULL,'edit',115,116),
 (63,58,NULL,NULL,'delete',117,118),
 (65,1,NULL,NULL,'Pages',120,123),
 (66,65,NULL,NULL,'display',121,122),
 (68,1,NULL,NULL,'Patients',124,143),
 (69,68,NULL,NULL,'index',125,126),
 (70,68,NULL,NULL,'view',127,128),
 (71,68,NULL,NULL,'add',129,130),
 (72,68,NULL,NULL,'edit',131,132),
 (73,68,NULL,NULL,'delete',133,134),
 (75,1,NULL,NULL,'Provinces',144,155),
 (76,75,NULL,NULL,'index',145,146),
 (77,75,NULL,NULL,'view',147,148),
 (78,75,NULL,NULL,'add',149,150),
 (79,75,NULL,NULL,'edit',151,152),
 (80,75,NULL,NULL,'delete',153,154),
 (82,1,NULL,NULL,'Questions',156,167),
 (83,82,NULL,NULL,'index',157,158),
 (84,82,NULL,NULL,'view',159,160),
 (85,82,NULL,NULL,'add',161,162),
 (86,82,NULL,NULL,'edit',163,164),
 (87,82,NULL,NULL,'delete',165,166),
 (89,1,NULL,NULL,'Users',168,189),
 (90,89,NULL,NULL,'index',169,170),
 (91,89,NULL,NULL,'view',171,172),
 (92,89,NULL,NULL,'add',173,174),
 (93,89,NULL,NULL,'edit',175,176),
 (94,89,NULL,NULL,'delete',177,178),
 (95,89,NULL,NULL,'login',179,180),
 (96,89,NULL,NULL,'logout',181,182),
 (98,1,NULL,NULL,'AclExtras',190,191),
 (99,16,NULL,NULL,'getCiudades',37,38),
 (100,23,NULL,NULL,'build_acl',51,52),
 (101,51,NULL,NULL,'getSigNivel',101,102),
 (102,51,NULL,NULL,'help',103,104),
 (103,89,NULL,NULL,'initDB',183,184),
 (105,51,NULL,NULL,'sugerencias',105,106),
 (106,68,NULL,NULL,'search',135,136),
 (107,68,NULL,NULL,'result',137,138),
 (108,68,NULL,NULL,'editAnswers',139,140),
 (109,68,NULL,NULL,'recuperarPaciente',141,142),
 (110,89,NULL,NULL,'editPassword',185,186),
 (111,89,NULL,NULL,'resetPassword',187,188);
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
  `direccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_address_city` (`city_id`),
  CONSTRAINT `FK_address_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` (`id`,`city_id`,`latitud`,`longitud`,`direccion`) VALUES 
 (1,1,-38.7098387,-62.2669045,'Zapiola 500'),
 (3,1,-38.7190841,-62.2654023,'Alsina 1'),
 (4,1,-38.7190841,-62.2654023,'Alsina 1'),
 (6,1,-38.7190841,-62.2654023,'Alsina 1'),
 (7,1,-38.7097541,-62.2908069,'Terrada 1600'),
 (8,1,-38.7134743,-62.26254640000002,'Zapiola 100');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`) VALUES 
 (1,NULL,'Group',1,'',1,4),
 (2,NULL,'Group',2,'',5,8),
 (3,1,'User',1,'',2,3),
 (4,NULL,'Group',3,'',9,12),
 (5,2,'User',2,'',6,7),
 (6,4,'User',3,'',10,11);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`,`aro_id`,`aco_id`,`_create`,`_read`,`_update`,`_delete`) VALUES 
 (1,3,1,'1','1','1','1'),
 (2,1,1,'1','1','1','1'),
 (3,2,1,'-1','-1','-1','-1'),
 (4,2,71,'1','1','1','1'),
 (5,2,72,'1','1','1','1'),
 (6,2,70,'1','1','1','1'),
 (7,2,5,'1','1','1','1'),
 (8,2,6,'1','1','1','1'),
 (9,2,47,'1','1','1','1'),
 (10,2,48,'1','1','1','1'),
 (11,2,61,'1','1','1','1'),
 (12,2,62,'1','1','1','1'),
 (13,2,12,'1','1','1','1'),
 (14,2,13,'1','1','1','1'),
 (15,4,1,'1','1','1','1'),
 (16,2,106,'1','1','1','1'),
 (17,2,108,'1','1','1','1'),
 (18,2,60,'1','1','1','1'),
 (19,2,99,'1','1','1','1'),
 (20,2,18,'1','1','1','1'),
 (21,2,77,'1','1','1','1'),
 (22,2,101,'1','1','1','1'),
 (23,2,105,'1','1','1','1'),
 (24,2,102,'1','1','1','1'),
 (25,2,109,'1','1','1','1'),
 (26,2,95,'1','1','1','1'),
 (27,2,96,'1','1','1','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`,`nombre`,`province_id`) VALUES 
 (1,'Bahía Blanca',1),
 (2,'Otra Ciudad',2);
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
 (1,'Administradores','2012-04-13 22:22:17','2012-04-13 22:22:17'),
 (2,'Médicos','2012-04-13 22:22:42','2012-04-15 23:01:42'),
 (3,'Ayudantes','2012-04-15 23:01:27','2012-05-26 18:24:41');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


--
-- Definition of table `medic_types`
--

DROP TABLE IF EXISTS `medic_types`;
CREATE TABLE `medic_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medic_types`
--

/*!40000 ALTER TABLE `medic_types` DISABLE KEYS */;
INSERT INTO `medic_types` (`id`,`tipo`) VALUES 
 (1,'Oncologo');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medics`
--

/*!40000 ALTER TABLE `medics` DISABLE KEYS */;
INSERT INTO `medics` (`id`,`nombre`,`apellido`,`matricula`,`medic_type_id`) VALUES 
 (1,'Medico','De Juguete','1234567',1),
 (2,'Otro','otro','3333',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`,`medic_id`,`oms_register_id`,`fecha`,`descripcion`) VALUES 
 (1,1,2,'2012-05-31 21:01:51','Le doy una nota!'),
 (2,1,5,'2012-06-03 22:01:07','<p><strong><span style=\"color: #ff0000;\">Hola!</span></strong></p>\r\n<ul>\r\n<li><strong><span style=\"color: #ff0000;\">1<br /></span></strong></li>\r\n<li><strong><span style=\"color: #ff0000;\">2<br /></span></strong></li>\r\n<li><strong><span style=\"color: #ff0000;\">3<br /></span></strong></li>\r\n</ul>'),
 (3,1,6,'2012-06-09 04:20:47','<p><span style=\"font-size: 24px;\"><strong><span style=\"color: #ff0000;\">sdfsdffsd</span></strong></span></p>'),
 (4,1,7,'2012-06-15 00:46:42','<p>lalalala d&lt;vsdfgbsdfgsdfgb <strong><span style=\"color: #ff0000;\">dszfgbszdf</span></strong></p>');
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
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oms_codes`
--

/*!40000 ALTER TABLE `oms_codes` DISABLE KEYS */;
INSERT INTO `oms_codes` (`id`,`codigo`,`descripcion`,`padre`) VALUES 
 (8,'C00-C14','Labio, cavidad oral y faringe.',NULL),
 (9,'C00','Tumor maligno del Labio','C00-C14'),
 (10,'C01','Neoplasias malignas de la base de la lengua','C00-C14'),
 (11,'C02','Neoplasias malignas de otras partes y sin especificar de la lengua','C00-C14'),
 (12,'C03','Neoplasias malignas de la encía','C00-C14'),
 (13,'C04','Neoplasias malignas de la base de la boca','C00-C14'),
 (14,'C05','Neoplasias malignas del paladar','C00-C14'),
 (15,'C06','Neoplasias malignas de otras partes y sin especificar de la boca','C00-C14'),
 (16,'C07','Neoplasias malignas de la glándula parótida','C00-C14'),
 (17,'C08','Neoplasias malignas de otras partes y sin especificar de las glándulas salivares','C00-C14'),
 (18,'C09','Neoplasias malignas de las amígdalas','C00-C14'),
 (19,'C10','Neoplasias malignas de la orofaringe','C00-C14'),
 (20,'C11','Neoplasias malignas de la nasofaringe','C00-C14'),
 (21,'C12','Neoplasias malignas del seno piriforme','C00-C14'),
 (22,'C13','Neoplasias malignas de la hipofaringe','C00-C14'),
 (23,'C14','Neoplasias malignas de otras partes del labio, la cavidad oral y la faringe','C00-C14'),
 (24,'C15-C26','Neoplasias digestivas.',NULL),
 (25,'C15','Neoplasias malignas de esófago','C15-C26'),
 (26,'C16','Neoplasias malignas de estómago','C15-C26'),
 (27,'C16.0','Neoplasias malignas del cardias','C16'),
 (28,'C16.1','Neoplasias malignas de la funda del estómago','C16'),
 (29,'C16.2','Neoplasias malignas del cuerpo del estómago','C16'),
 (30,'C16.3','Neoplasias malignas del antro pilórico','C16'),
 (31,'C16.4','Neoplasias malignas del píloro','C16'),
 (32,'C16.5','Neoplasias malignas de la curvatura menor del estómago','C16'),
 (33,'C16.6','Neoplasias malignas de la curvatura mayor del estómago','C16'),
 (34,'C16.8','Lesión del solape del estómago','C16'),
 (35,'C16.9','Neoplasias malignas de otras partes del estómago','C16'),
 (36,'C17','Neoplasias malignas de intestino delgado','C15-C26'),
 (37,'C17.0','Neoplasias malignas del duodeno','C15-C26'),
 (38,'C18','Neoplasias malignas de colon','C15-C26'),
 (39,'C19','Neoplasias malignas de la unión rectosigmoida','C15-C26'),
 (40,'C20','Neoplasias malignas del recto','C15-C26'),
 (41,'C21','Neoplasias malignas de ano y canal anal','C15-C26'),
 (42,'C22','Neoplasias malignas de hígado y de canalículos biliares intrahepáticos','C15-C26'),
 (43,'C22.0','Carcinoma de las células hepáticas','C22'),
 (44,'C22.1','Carcinoma de los canalículos biliares intrahepáticos','C22'),
 (45,'C22.2','Hepatoblastoma','C22'),
 (46,'C22.3','Angiosarcoma de hígado','C22'),
 (47,'C22.4','Otros sarcomas de hígado','C22'),
 (48,'C22.7','Otros carcinomas especificados de hígado','C22'),
 (49,'C22.9','Otras neoplasias malignas de hígado sin especificar','C22'),
 (50,'C23','Neoplasias malignas de la vesícula biliar','C15-C26'),
 (51,'C24','Neoplasias malignas de otras partes y sin especificar del tracto biliar','C15-C26'),
 (52,'C25','Neoplasias malignas de páncreas','C15-C26'),
 (53,'C25.0','Neoplasias malignas de la cabeza del páncreas','C25'),
 (54,'C25.1','Neoplasias malignas del cuerpo del páncreas','C25'),
 (55,'C25.2','Neoplasias malignas de la cola del páncreas','C25'),
 (56,'C25.3','Neoplasias malignas del conducto pancreático','C25'),
 (57,'C25.4','Neoplasias malignas del endocrino del páncreas','C25'),
 (58,'C25.7','Neoplasias malignas de otras partes del páncreas','C25'),
 (59,'C25.8','Neoplasias malignas del solape del páncreas','C25'),
 (60,'C25.9','Neoplasias malignas sin especificar del páncreas','C25'),
 (61,'C26','Neoplasias malignas de otras enfermedades de órganos digestivos','C15-C26'),
 (62,'C30-C39','Neoplasias de órganos respiratorios e intratorácicos.',NULL),
 (63,'C30','Neoplasias malignas de la cavidad nasal y el oído medio','C30-C39'),
 (64,'C31','Neoplasias malignas de los senos paranasales','C30-C39'),
 (65,'C32','Neoplasias malignas de laringe','C30-C39'),
 (66,'C33','Neoplasias malignas de la tráquea','C30-C39'),
 (67,'C34','Neoplasias malignas de bronquios y pulmón','C30-C39'),
 (68,'C34.0','Neoplasias malignas del bronquio principal','C34'),
 (69,'C34.1','Neoplasias malignas del lóbulo superior de los bronquios o el pulmón','C34'),
 (70,'C34.2','Neoplasias malignas del lóbulo medio de los bronquios o el pulmón','C34'),
 (71,'C34.3','Neoplasias malignas del lóbulo inferior de los bronquios o el pulmón','C34'),
 (72,'C34.8','Lesión del solape de los bronquios o el pulmón','C34'),
 (73,'C37','Neoplasias malignas del timo','C30-C39'),
 (74,'C38','Neoplasias malignas del corazón, el mediastino y la pleura','C30-C39'),
 (75,'C39','Neoplasias malignas de otras partes del sistema respiratorio y de órganos intratorácicos','C30-C39'),
 (76,'C40-C41','Neoplasias malignas de hueso y cartílago articular',NULL),
 (77,'C40','Neoplasias malignas de hueso y cartílago articular de miembros','C40-C41'),
 (78,'C41','Neoplasias malignas de hueso y cartílago articular de otras partes sin especificar','C40-C41'),
 (79,'C43-C44','Neoplasias de piel.',NULL),
 (80,'C43','Melanoma de piel','C43-C44'),
 (81,'C44','Otras neoplasias malignas de la piel','C43-C44'),
 (82,'C45-C49','Neoplasias malignos de tejidos conectivos y blandos',NULL),
 (83,'C45','Mesotelioma maligno','C45-C49'),
 (84,'C46','Sarcoma de Kaposi','C45-C49'),
 (85,'C47','Neoplasias malignas de nervios periféricos y del sistema nervioso autónomo','C45-C49'),
 (86,'C48','Neoplasias malignas del retroperitoneo y del','C45-C49'),
 (87,'C49','Neoplasias malignas de otros tejidos conectivos y blandos (los códigos alfanuméricos son ILDS)','C45-C49'),
 (88,'C49.M10','Histiocitoma fibroso maligno','C49'),
 (89,'C49.M12','Fibroxantoma atípico','C49'),
 (90,'C49.M20','Haemangiopericitoma','C49'),
 (91,'C49.M22','Angioendoteliomatosis maligna','C49'),
 (92,'C49.M24','Dermatofibrosarcoma protruberante','C49'),
 (93,'C49.M30','Tumor Bednar','C49'),
 (94,'C49.M40','Sarcoma de piel','C49'),
 (95,'C49.M42','Fibrosarcoma','C49'),
 (96,'C49.M44','Schwannoma maligno','C49'),
 (97,'C49.M48','Leiomiosarcoma','C49'),
 (98,'C49.M50','Rabdomiosarcoma','C49'),
 (99,'C49.M54','Mixofibrosarcoma','C49'),
 (100,'C49.M60','Angiosarcoma cutáneo','C49'),
 (101,'C49.M70','Limfangiosarcoma','C49'),
 (102,'C50-C58','Neoplasias malignas de mama y de órganos genitales femeninos.',NULL),
 (103,'C50','Neoplasias malignas de mama','C50-C58'),
 (104,'C51','Neoplasias malignas de vulva','C50-C58'),
 (105,'C52','Neoplasias malignas de vagina','C50-C58'),
 (106,'C53','Neoplasias malignas de cuello uterino','C50-C58'),
 (107,'C54','Neoplasias malignas del cuerpo del útero','C50-C58'),
 (108,'C54.1','Cáncer endometrial','C50-C58'),
 (109,'C55','Neoplasias malignas de las partes no especificadas del útero','C54.1'),
 (110,'C56','Neoplasias malignas de ovario','C54.1'),
 (111,'C57','Neoplasias malignas de otros órganos genitales femeninos no especificados','C54.1'),
 (112,'C58','Neoplasias malignas de placenta','C54.1'),
 (113,'C60-C63','Neoplasias de órganos genitales masculinos.',NULL),
 (114,'C60','Neoplasias malignas de pene','C60-C63'),
 (115,'C61','Neoplasias malignas de próstata','C60-C63'),
 (116,'C62','Neoplasias malignas de testículo','C60-C63'),
 (117,'C63','Neoplasias malignas otros órganos genitales masculinos no especificados','C60-C63'),
 (118,'C64-C68','Neoplasias de órganos urinarios',NULL),
 (119,'C64','Neoplasias malignas de riñón, excepto de la pelvis renal','C64-C68'),
 (120,'C65','Neoplasias malignas de la pelvis renal','C64-C68'),
 (121,'C66','Neoplasias malignas de uréter','C64-C68'),
 (122,'C67','Neoplasias malignas de vejiga urinaria','C64-C68'),
 (123,'C68','Neoplasias malignas de otros órganos urinarios no especificados','C64-C68'),
 (124,'C69-C72','Neoplasias malignas del sistema nervioso',NULL),
 (125,'C69','Neoplasias malignas de ojo y anexos','C68'),
 (126,'C69.0','Neoplasias malignas de la conjuntiva','C68'),
 (127,'C69.1','Neoplasias malignas de la córnea','C68'),
 (128,'C69.2','Neoplasias malignas de la retina','C68'),
 (129,'C69.3','Neoplasias malignas de las coroides','C68'),
 (130,'C69.4','Neoplasias malignas de los cuerpos ciliares','C68'),
 (131,'C69.5','Neoplasias malignas de la glándula y los conductos lagrimales','C68'),
 (132,'C69.6','Neoplasias malignas de la órbita ocular','C68'),
 (133,'C69.7','Lesión del solape del ojo y anexos','C68'),
 (134,'C70','Neoplasias malignas de meninges','C69-C72'),
 (135,'C70.0','Neoplasias malignas de las meninges cerebrales','C70'),
 (136,'C70.1','Neoplasias malignas de las meninges espinales','C70'),
 (137,'C71','Neoplasias malignas de cerebro','C69-C72'),
 (138,'C71.0','Neoplasias malignas del telencéfalo, excepto lóbulos y ventrículos','C71'),
 (139,'C71.1','Neoplasias malignas del lóbulo frontal','C71'),
 (140,'C71.2','Neoplasias malignas del lóbulo temporal','C71'),
 (141,'C71.3','Neoplasias malignas del lóbulo parietal','C71'),
 (142,'C71.4','Neoplasias malignas del lóbulo occipital','C71'),
 (143,'C71.5','Neoplasias malignas del sistema ventricular','C71'),
 (144,'C71.6','Neoplasias malignas del cerebelo','C71'),
 (145,'C71.7','Neoplasias malignas del tronco del encéfalo','C71'),
 (146,'C71.8','Lesión del solape del cerebro','C71'),
 (147,'C71.9','Neoplasias malignas de otras partes del cerebro sin especificar','C71'),
 (148,'C72','Neoplasias malignas de la médula espinal, del par craneal y otras partes del sistema nervioso central','C69-C72'),
 (149,'C72.0','Neoplasias malignas de la médula espinal','C72'),
 (150,'C72.1','Neoplasias malignas de la cauda equina','C72'),
 (151,'C72.2','Neoplasias malignas del nervio olfativo','C72'),
 (152,'C72.3','Neoplasias malignas del nervio óptico','C72'),
 (153,'C72.4','Neoplasias malignas del nervio auditivo','C72'),
 (154,'C72.5','Neoplasias malignas otros nervios craneales','C72'),
 (155,'C72.8','Lesión del solape del cerebro y otras partes del sistema nervioso central','C72'),
 (156,'C72.9','Neoplasias malignas del sistema nervioso central sin especificar','C72'),
 (157,'C73-C75','Neoplasias malignas de tiroides, otras glándulas endócrinas y estructuras similares',NULL),
 (158,'C73','Neoplasias malignas de la glándula tiróidea','C73-C75'),
 (159,'C74','Neoplasias malignas de la glándula suprarrenal','C73-C75'),
 (160,'C74.0','Neoplasias malignas de la corteza de la glándula suprarrenal','C74'),
 (161,'C74.1','Neoplasias malignas de la médula de la glándula suprarrenal','C74'),
 (162,'C74.9','Neoplasias malignas de la glándula suprarrenal sin especificar','C74'),
 (163,'C75','Neoplasias malignas de otras glándulas endocrinas y estructuras similares','C73-C75'),
 (164,'C76-C80','Neoplasias malignas secundarias y de enfermedades',NULL),
 (165,'C76','Neoplasias malignas de otras partes enfermas','C76-C80'),
 (166,'C76.0','Neoplasias malignas de histiocitosis de células de Langerhans','C76'),
 (167,'C76.1','Neoplasias malignas de linfohistiocitosis hemofagocítica','C76'),
 (168,'C76.2','Neoplasias malignas del síndrome hemofagocítico asociado a infecciones','C76'),
 (169,'C76.3','Neoplasias malignas debidos a otros síndromes de histiocitosis','C76'),
 (170,'C77','Neoplasias malignas secundarias de nodos linfáticos','C76-C80'),
 (171,'C78','Neoplasias malignas secundarias de órganos respiratorios y digestivos','C76-C80'),
 (172,'C79','Neoplasias malignas secundarias de otras partes','C76-C80'),
 (173,'C80','Neoplasias malignas sin parte especificada','C76-C80'),
 (174,'C81-C96','Neoplasias malignas, declaradas o presuntas de ser primarias de tejidos linfoides, hematopoyéticos o tejidos relacionados',NULL),
 (175,'C81','Enfermedad de Hodgkin','C81-C96'),
 (176,'C81.0','Predominancia linfocítica','C81'),
 (177,'C81.1','Esclerosis nodular','C81'),
 (178,'C81.2','Celularidad mezclada','C81'),
 (179,'C81.3','Depleción linfocítica','C81'),
 (180,'C82','Linfoma folicular no-Hodgkin (nodular)','C81-C96'),
 (181,'C82.0','Pequeñas células rajadas (folicular)','C82'),
 (182,'C82.1','Mezcla de células rajadas pequeñas y grandes (folicular)','C82'),
 (183,'C82.2','Grandes células (folicular)','C82'),
 (184,'C83','Linfoma difuso no-Hodgkin','C81-C96'),
 (185,'C83.0','Células pequeñas (difuso)','C83'),
 (186,'C83.1','Pequeñas células rajadas (difuso)','C83'),
 (187,'C83.2','Mezcla de células rajadas pequeñas y grandes (difuso)','C83'),
 (188,'C83.3','Células grandes (difuso)','C83'),
 (189,'C83.4','Inmunoblástico (difuso)','C83'),
 (190,'C83.5','Linfoblástico (difuso)','C83'),
 (191,'C83.6','Células madre (difuso)','C83'),
 (192,'C83.7','Linfoma de Burkitt','C83'),
 (193,'C84','Linfomas de células T periféricas y cutáneas','C81-C96'),
 (194,'C84.0','Micosis fungoides','C84'),
 (195,'C84.1','Síndrome de Sézary','C84'),
 (196,'C84.2','Linfoma zona-T','C84'),
 (197,'C84.3','Linfoma linfoepitelioide','C84'),
 (198,'C84.4','Linfoma periférico tipo T','C84'),
 (199,'C85','Otros tipos sin especificar de linfoma no-Hodgkin','C81-C96'),
 (200,'C85.0','Linfosarcoma','C85'),
 (201,'C85.1','Linfoma de células B, sin especificar','C85'),
 (202,'C88','Enfermedades malignas inmunoproliferativas','C81-C96'),
 (203,'C88.0','Macroglobulinemia Waldenström','C88'),
 (204,'C88.1','Enfermedad de la cadena pesada alfa','C88'),
 (205,'C88.2','Enfermedad de la cadena pesada gamma','C88'),
 (206,'C88.3','Enfermedad inmunoproliferativa del intestino delgado','C88'),
 (207,'C90','Mieloma múltiple y neoplasias malignas de células plasmáticas','C81-C96'),
 (208,'C90.0','Mieloma múltiple','C90'),
 (209,'C90.1','Leucemia de células plasmáticas','C90'),
 (210,'C90.2','Plasmacitoma extramedular','C90'),
 (211,'C91','Leucemia linfoide','C81-C96'),
 (212,'C91.0','Leucemia linfoide aguda','C91'),
 (213,'C91.1','Leucemia linfática crónica','C91'),
 (214,'C91.4','Leucemia de las células capilares','C91'),
 (215,'C92','Leucemia mieloide','C81-C96'),
 (216,'C92.0','Leucemia mieloide aguda','C92'),
 (217,'C92.1','Leucemia mieloide crónica','C92'),
 (218,'C92.2','Leucemia mieloide subaguda','C92'),
 (219,'C92.3','Sarcoma mieloide','C92'),
 (220,'C92.4','Leucemia promielocítica aguda','C92'),
 (221,'C92.5','Leucemia mielomonocítica aguda','C92'),
 (222,'C93','Leucemia monocítica','C81-C96'),
 (223,'C93.0','Leucemia monocítica aguda','C93'),
 (224,'C93.1','Leucemia monocítica crónica','C93'),
 (225,'C93.2','Leucemia monocítica subaguda','C93'),
 (226,'C94','Otras leucemias de tipo de célula específico','C81-C96'),
 (227,'C94.0','Policitemia aguda y eritroleucemia','C94'),
 (228,'C94.1','Policitemia crónica','C94'),
 (229,'C94.2','Leucemia megacarioblástica aguda','C94'),
 (230,'C94.3','Leucemia mastocítica','C94'),
 (231,'C94.4','Panmielosis aguda','C94'),
 (232,'C94.5','Mielofibrosis aguda','C94'),
 (233,'C94.7','Otras leucemis específicas','C94'),
 (234,'C95','Otras leucemias de tipo de célula no específicas','C81-C96'),
 (235,'C95.0','Leucemia aguda de tipos de célula no específicos','C95'),
 (236,'C95.1','Leucemia crónica de tipos de célula no específicos','C95'),
 (237,'C95.2','Leucemia subaguda de tipos de célula no específicos','C95'),
 (238,'C95.7','Otras leucemias de tipos de célula no específicos','C95'),
 (239,'C95.9','Leucamias sin especificar','C95'),
 (240,'C96','Otras neoplasias malignas y neoplasias malignas no especificadas de tejidos linfoides, hematopoyéticos y tejidos relacionados','C81-C96'),
 (241,'C96.0','Enfermedad Letterer-Siwe','C96'),
 (242,'C96.1','Histiocitosis maligna','C96'),
 (243,'C96.2','Tumor maligno de mastocitos','C96'),
 (244,'C96.3','Linfoma histiocítico real','C96'),
 (245,'C96.7','Otras neoplasias malignas de tejidos linfoides, hematopoyéticos y tejidos relacionados','C96'),
 (246,'C96.9','Neoplasias malignas de tejidos linfoides, hematopoyéticos y tejidos relacionados sin especificar','C96'),
 (247,'C97','Neoplasias malignas (primarias) de múltiples localizaciones independientes',NULL);
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
  `estadio` tinyint(2) unsigned DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oms_registers`
--

/*!40000 ALTER TABLE `oms_registers` DISABLE KEYS */;
INSERT INTO `oms_registers` (`id`,`patient_id`,`medic_id`,`address_part_id`,`address_lab_id`,`oms_code_id`,`estadio`,`fecha`) VALUES 
 (2,'4fab02d7-7954-44cf-a1a7-08ec7be0049b',1,NULL,NULL,34,4,'2012-05-31 00:00:00'),
 (4,'4fab02d7-7954-44cf-a1a7-08ec7be0049b',1,7,6,19,0,'2012-06-03 00:00:00'),
 (5,'4fcbf7ce-d290-47ef-8361-11987be0049b',1,NULL,NULL,19,0,'2012-06-03 00:00:00'),
 (6,'4fab02d7-7954-44cf-a1a7-08ec7be0049b',1,7,6,32,0,'2012-06-06 00:00:00'),
 (7,'4fab02d7-7954-44cf-a1a7-08ec7be0049b',1,7,6,19,0,'2012-06-11 00:00:00');
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
  `nro_documento` char(64) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_patient_address1` (`address_particular_id`),
  KEY `FK_patient_address2` (`address_laboral_id`),
  CONSTRAINT `FK_patient_address1` FOREIGN KEY (`address_particular_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `FK_patient_address2` FOREIGN KEY (`address_laboral_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`id`,`iniciales`,`fecha_nacimiento`,`sexo`,`address_particular_id`,`address_laboral_id`,`nro_documento`,`created`,`modified`) VALUES 
 ('4faaff2e-e3ec-46b1-8a6b-08ec7be0049b','NAM','1986-11-25','M',1,NULL,'0193eff009ed009f6b9e6f551e869911d5f326205b280c36cea9636297ede534',NULL,NULL),
 ('4fab02d7-7954-44cf-a1a7-08ec7be0049b','HOY','2000-10-11','M',7,6,'d62bce2760df0b171b2269de45884537a88be6ade7835de091b10c896433aac4',NULL,NULL),
 ('4fcbf7ce-d290-47ef-8361-11987be0049b','PEPIT','1993-06-01','M',NULL,NULL,'14080a7bd5cba8e3ad8eb95245115622a325d01a99ee463163abc053a92dafaa',NULL,NULL),
 ('4fda8c59-8d94-4c85-800e-115c7be0049b','hola','1981-05-17','M',8,NULL,'28948d8e54491b62f3243ad657df60a0c3eead34c6fa47a62d1c6bebd4fb3238','2012-06-15 01:14:01','2012-06-15 01:14:01');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;


--
-- Definition of table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`,`nombre`) VALUES 
 (1,'Buenos Aires'),
 (2,'Ciudad X');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`,`descripcion`,`visible`) VALUES 
 (1,'Fuma?',0),
 (2,'Bebe?',1),
 (3,'Droga?',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`username`,`password`,`group_id`,`created`,`modified`,`medic_id`) VALUES 
 (1,'admin','36bbb6604e4a6d15f31be0fee38b7c0234997f89',1,'2012-04-13 22:24:30','2012-06-11 21:11:22',1),
 (2,'medico','36bbb6604e4a6d15f31be0fee38b7c0234997f89',2,'2012-04-26 21:05:10','2012-04-26 21:07:29',2),
 (3,'UsuarioX','1500c2908e71d66b19bfce3a1b4e042d4c860649',3,'2012-06-03 20:27:08','2012-06-03 20:27:08',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
