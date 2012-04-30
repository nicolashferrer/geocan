-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.37 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-04-29 19:34:04
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for geocan
DROP DATABASE IF EXISTS `geocan`;
CREATE DATABASE IF NOT EXISTS `geocan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `geocan`;


-- Dumping structure for table geocan.acos
DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.acos: ~103 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 206),
	(2, 1, NULL, NULL, 'Addresses', 2, 15),
	(3, 2, NULL, NULL, 'index', 3, 4),
	(4, 2, NULL, NULL, 'view', 5, 6),
	(5, 2, NULL, NULL, 'add', 7, 8),
	(6, 2, NULL, NULL, 'edit', 9, 10),
	(7, 2, NULL, NULL, 'delete', 11, 12),
	(8, 2, NULL, NULL, 'buildAcl', 13, 14),
	(9, 1, NULL, NULL, 'Answers', 16, 29),
	(10, 9, NULL, NULL, 'index', 17, 18),
	(11, 9, NULL, NULL, 'view', 19, 20),
	(12, 9, NULL, NULL, 'add', 21, 22),
	(13, 9, NULL, NULL, 'edit', 23, 24),
	(14, 9, NULL, NULL, 'delete', 25, 26),
	(15, 9, NULL, NULL, 'buildAcl', 27, 28),
	(16, 1, NULL, NULL, 'Cities', 30, 45),
	(17, 16, NULL, NULL, 'index', 31, 32),
	(18, 16, NULL, NULL, 'view', 33, 34),
	(19, 16, NULL, NULL, 'add', 35, 36),
	(20, 16, NULL, NULL, 'edit', 37, 38),
	(21, 16, NULL, NULL, 'delete', 39, 40),
	(22, 16, NULL, NULL, 'buildAcl', 41, 42),
	(23, 1, NULL, NULL, 'Groups', 46, 61),
	(24, 23, NULL, NULL, 'index', 47, 48),
	(25, 23, NULL, NULL, 'view', 49, 50),
	(26, 23, NULL, NULL, 'add', 51, 52),
	(27, 23, NULL, NULL, 'edit', 53, 54),
	(28, 23, NULL, NULL, 'delete', 55, 56),
	(29, 23, NULL, NULL, 'buildAcl', 57, 58),
	(30, 1, NULL, NULL, 'MedicTypes', 62, 75),
	(31, 30, NULL, NULL, 'index', 63, 64),
	(32, 30, NULL, NULL, 'view', 65, 66),
	(33, 30, NULL, NULL, 'add', 67, 68),
	(34, 30, NULL, NULL, 'edit', 69, 70),
	(35, 30, NULL, NULL, 'delete', 71, 72),
	(36, 30, NULL, NULL, 'buildAcl', 73, 74),
	(37, 1, NULL, NULL, 'Medics', 76, 89),
	(38, 37, NULL, NULL, 'index', 77, 78),
	(39, 37, NULL, NULL, 'view', 79, 80),
	(40, 37, NULL, NULL, 'add', 81, 82),
	(41, 37, NULL, NULL, 'edit', 83, 84),
	(42, 37, NULL, NULL, 'delete', 85, 86),
	(43, 37, NULL, NULL, 'buildAcl', 87, 88),
	(44, 1, NULL, NULL, 'Notes', 90, 103),
	(45, 44, NULL, NULL, 'index', 91, 92),
	(46, 44, NULL, NULL, 'view', 93, 94),
	(47, 44, NULL, NULL, 'add', 95, 96),
	(48, 44, NULL, NULL, 'edit', 97, 98),
	(49, 44, NULL, NULL, 'delete', 99, 100),
	(50, 44, NULL, NULL, 'buildAcl', 101, 102),
	(51, 1, NULL, NULL, 'OmsCodes', 104, 121),
	(52, 51, NULL, NULL, 'index', 105, 106),
	(53, 51, NULL, NULL, 'view', 107, 108),
	(54, 51, NULL, NULL, 'add', 109, 110),
	(55, 51, NULL, NULL, 'edit', 111, 112),
	(56, 51, NULL, NULL, 'delete', 113, 114),
	(57, 51, NULL, NULL, 'buildAcl', 115, 116),
	(58, 1, NULL, NULL, 'OmsRegisters', 122, 135),
	(59, 58, NULL, NULL, 'index', 123, 124),
	(60, 58, NULL, NULL, 'view', 125, 126),
	(61, 58, NULL, NULL, 'add', 127, 128),
	(62, 58, NULL, NULL, 'edit', 129, 130),
	(63, 58, NULL, NULL, 'delete', 131, 132),
	(64, 58, NULL, NULL, 'buildAcl', 133, 134),
	(65, 1, NULL, NULL, 'Pages', 136, 141),
	(66, 65, NULL, NULL, 'display', 137, 138),
	(67, 65, NULL, NULL, 'buildAcl', 139, 140),
	(68, 1, NULL, NULL, 'Patients', 142, 155),
	(69, 68, NULL, NULL, 'index', 143, 144),
	(70, 68, NULL, NULL, 'view', 145, 146),
	(71, 68, NULL, NULL, 'add', 147, 148),
	(72, 68, NULL, NULL, 'edit', 149, 150),
	(73, 68, NULL, NULL, 'delete', 151, 152),
	(74, 68, NULL, NULL, 'buildAcl', 153, 154),
	(75, 1, NULL, NULL, 'Provinces', 156, 169),
	(76, 75, NULL, NULL, 'index', 157, 158),
	(77, 75, NULL, NULL, 'view', 159, 160),
	(78, 75, NULL, NULL, 'add', 161, 162),
	(79, 75, NULL, NULL, 'edit', 163, 164),
	(80, 75, NULL, NULL, 'delete', 165, 166),
	(81, 75, NULL, NULL, 'buildAcl', 167, 168),
	(82, 1, NULL, NULL, 'Questions', 170, 183),
	(83, 82, NULL, NULL, 'index', 171, 172),
	(84, 82, NULL, NULL, 'view', 173, 174),
	(85, 82, NULL, NULL, 'add', 175, 176),
	(86, 82, NULL, NULL, 'edit', 177, 178),
	(87, 82, NULL, NULL, 'delete', 179, 180),
	(88, 82, NULL, NULL, 'buildAcl', 181, 182),
	(89, 1, NULL, NULL, 'Users', 184, 203),
	(90, 89, NULL, NULL, 'index', 185, 186),
	(91, 89, NULL, NULL, 'view', 187, 188),
	(92, 89, NULL, NULL, 'add', 189, 190),
	(93, 89, NULL, NULL, 'edit', 191, 192),
	(94, 89, NULL, NULL, 'delete', 193, 194),
	(95, 89, NULL, NULL, 'login', 195, 196),
	(96, 89, NULL, NULL, 'logout', 197, 198),
	(97, 89, NULL, NULL, 'buildAcl', 199, 200),
	(98, 1, NULL, NULL, 'AclExtras', 204, 205),
	(99, 16, NULL, NULL, 'getCiudades', 43, 44),
	(100, 23, NULL, NULL, 'build_acl', 59, 60),
	(101, 51, NULL, NULL, 'getSigNivel', 117, 118),
	(102, 51, NULL, NULL, 'help', 119, 120),
	(103, 89, NULL, NULL, 'initDB', 201, 202);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;


-- Dumping structure for table geocan.addresses
DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_address_city` (`city_id`),
  CONSTRAINT `FK_address_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.addresses: ~3 rows (approximately)
DELETE FROM `addresses`;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` (`id`, `city_id`, `latitud`, `longitud`, `direccion`) VALUES
	(1, 1, -34.6279966, -58.482865, 'Bahía Blanca 500'),
	(2, 1, -38.7098387, -62.2669045, 'Zapiola 500'),
	(3, 1, -38.7190956, -62.2653863, 'Alsina 1');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;


-- Dumping structure for table geocan.answers
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` char(36) NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `valor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_respuesta_paciente` (`patient_id`) USING BTREE,
  KEY `FK_answer_question` (`question_id`),
  CONSTRAINT `FK_answer_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  CONSTRAINT `FK_answer_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.answers: ~2 rows (approximately)
DELETE FROM `answers`;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `patient_id`, `question_id`, `valor`) VALUES
	(1, '4f99fb47-9bfc-4016-9d95-04607be0049b', 1, 0),
	(2, '4f99fb47-9bfc-4016-9d95-04607be0049b', 2, 0);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;


-- Dumping structure for table geocan.aros
DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros: ~5 rows (approximately)
DELETE FROM `aros`;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, 'Group', 1, '', 1, 4),
	(2, NULL, 'Group', 2, '', 5, 8),
	(3, 1, 'User', 1, '', 2, 3),
	(4, NULL, 'Group', 3, '', 9, 10),
	(5, 2, 'User', 2, '', 6, 7);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;


-- Dumping structure for table geocan.aros_acos
DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros_acos: ~1 rows (approximately)
DELETE FROM `aros_acos`;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1, 3, 1, '1', '1', '1', '1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;


-- Dumping structure for table geocan.cities
DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cities_provinces` (`province_id`),
  CONSTRAINT `FK_cities_provinces` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.cities: ~1 rows (approximately)
DELETE FROM `cities`;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `nombre`, `province_id`) VALUES
	(1, 'Bahía Blanca', 1);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;


-- Dumping structure for table geocan.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.groups: ~3 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
	(1, 'administradores', '2012-04-13 22:22:17', '2012-04-13 22:22:17'),
	(2, 'medicos', '2012-04-13 22:22:42', '2012-04-15 23:01:42'),
	(3, 'usuarios', '2012-04-15 23:01:27', '2012-04-15 23:01:27');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table geocan.medics
DROP TABLE IF EXISTS `medics`;
CREATE TABLE IF NOT EXISTS `medics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `medic_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_medico_tipo_medico` (`medic_type_id`),
  CONSTRAINT `FK_medic_type_medic` FOREIGN KEY (`medic_type_id`) REFERENCES `medic_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.medics: ~2 rows (approximately)
DELETE FROM `medics`;
/*!40000 ALTER TABLE `medics` DISABLE KEYS */;
INSERT INTO `medics` (`id`, `nombre`, `apellido`, `matricula`, `medic_type_id`) VALUES
	(1, 'Medico', 'De Juguete', '1234567', 1),
	(2, 'Otro', 'otro', '3333', 1);
/*!40000 ALTER TABLE `medics` ENABLE KEYS */;


-- Dumping structure for table geocan.medic_types
DROP TABLE IF EXISTS `medic_types`;
CREATE TABLE IF NOT EXISTS `medic_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.medic_types: ~1 rows (approximately)
DELETE FROM `medic_types`;
/*!40000 ALTER TABLE `medic_types` DISABLE KEYS */;
INSERT INTO `medic_types` (`id`, `tipo`) VALUES
	(1, 'Oncologo');
/*!40000 ALTER TABLE `medic_types` ENABLE KEYS */;


-- Dumping structure for table geocan.notes
DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
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

-- Dumping data for table geocan.notes: ~0 rows (approximately)
DELETE FROM `notes`;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;


-- Dumping structure for table geocan.oms_codes
DROP TABLE IF EXISTS `oms_codes`;
CREATE TABLE IF NOT EXISTS `oms_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `padre` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.oms_codes: ~7 rows (approximately)
DELETE FROM `oms_codes`;
/*!40000 ALTER TABLE `oms_codes` DISABLE KEYS */;
INSERT INTO `oms_codes` (`id`, `codigo`, `descripcion`, `padre`) VALUES
	(1, 'C00-C14', 'Labio, cavidad oral y faringe', NULL),
	(2, 'C00', 'Tumor maligno del Labio', 'C00-C14'),
	(3, 'C15-C26', 'Neoplasias digestivas', NULL),
	(4, 'C16', 'Neoplasias malignas de est&oacute;mago', 'C15-C26'),
	(5, 'C16.0', 'Neoplasias malignas del cardias', 'C16'),
	(6, 'C17', 'Neoplasias malignas de intestino delgado ', 'C15-C26'),
	(7, 'C17.0', 'Neoplasias malignas del duodeno', 'C17');
/*!40000 ALTER TABLE `oms_codes` ENABLE KEYS */;


-- Dumping structure for table geocan.oms_registers
DROP TABLE IF EXISTS `oms_registers`;
CREATE TABLE IF NOT EXISTS `oms_registers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` char(36) NOT NULL,
  `medic_id` int(10) unsigned NOT NULL,
  `address_part_id` int(10) unsigned DEFAULT NULL,
  `address_lab_id` int(10) unsigned DEFAULT NULL,
  `oms_code_id` int(10) unsigned NOT NULL,
  `estadio` tinyint(1) unsigned DEFAULT NULL,
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

-- Dumping data for table geocan.oms_registers: ~0 rows (approximately)
DELETE FROM `oms_registers`;
/*!40000 ALTER TABLE `oms_registers` DISABLE KEYS */;
/*!40000 ALTER TABLE `oms_registers` ENABLE KEYS */;


-- Dumping structure for table geocan.patients
DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` char(36) NOT NULL,
  `iniciales` varchar(5) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `address_particular_id` int(10) unsigned DEFAULT NULL,
  `address_laboral_id` int(10) unsigned DEFAULT NULL,
  `nro_documento` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_patient_address1` (`address_particular_id`),
  KEY `FK_patient_address2` (`address_laboral_id`),
  CONSTRAINT `FK_patient_address1` FOREIGN KEY (`address_particular_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `FK_patient_address2` FOREIGN KEY (`address_laboral_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.patients: ~2 rows (approximately)
DELETE FROM `patients`;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`id`, `iniciales`, `fecha_nacimiento`, `sexo`, `address_particular_id`, `address_laboral_id`, `nro_documento`) VALUES
	('4f99fb47-9bfc-4016-9d95-04607be0049b', 'ROB', '2012-04-25', 'M', 1, NULL, 'a064e216b6d3f591bd5af88e374248db9eff1146d3fb0ae7a9'),
	('4f99fe1c-e050-46b0-b2b4-1b847be0049b', 'HOY', '1986-11-25', 'M', 2, 3, '657c6d419fb8caddb905f1b6a5d3ce49c9c3cc630c73075329');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;


-- Dumping structure for table geocan.provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.provinces: ~1 rows (approximately)
DELETE FROM `provinces`;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`, `nombre`) VALUES
	(1, 'Buenos Aires');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;


-- Dumping structure for table geocan.questions
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.questions: ~2 rows (approximately)
DELETE FROM `questions`;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `descripcion`, `visible`) VALUES
	(1, 'Fuma?', 1),
	(2, 'Bebe?', 1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


-- Dumping structure for table geocan.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `medic_id`) VALUES
	(1, 'admin', 'ffda0a8dd1efa6cb63f0e51ca914e75e45e4b45c', 1, '2012-04-13 22:24:30', '2012-04-13 22:24:30', 1),
	(2, 'medico', '5da2f96f6fc84d54f13377fb37cd512f84ec766a', 2, '2012-04-26 21:05:10', '2012-04-26 21:07:29', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
