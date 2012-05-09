-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.37 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-05-09 20:18:43
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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.acos: ~92 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 184),
	(2, 1, NULL, NULL, 'Addresses', 2, 13),
	(3, 2, NULL, NULL, 'index', 3, 4),
	(4, 2, NULL, NULL, 'view', 5, 6),
	(5, 2, NULL, NULL, 'add', 7, 8),
	(6, 2, NULL, NULL, 'edit', 9, 10),
	(7, 2, NULL, NULL, 'delete', 11, 12),
	(9, 1, NULL, NULL, 'Answers', 14, 25),
	(10, 9, NULL, NULL, 'index', 15, 16),
	(11, 9, NULL, NULL, 'view', 17, 18),
	(12, 9, NULL, NULL, 'add', 19, 20),
	(13, 9, NULL, NULL, 'edit', 21, 22),
	(14, 9, NULL, NULL, 'delete', 23, 24),
	(16, 1, NULL, NULL, 'Cities', 26, 39),
	(17, 16, NULL, NULL, 'index', 27, 28),
	(18, 16, NULL, NULL, 'view', 29, 30),
	(19, 16, NULL, NULL, 'add', 31, 32),
	(20, 16, NULL, NULL, 'edit', 33, 34),
	(21, 16, NULL, NULL, 'delete', 35, 36),
	(23, 1, NULL, NULL, 'Groups', 40, 53),
	(24, 23, NULL, NULL, 'index', 41, 42),
	(25, 23, NULL, NULL, 'view', 43, 44),
	(26, 23, NULL, NULL, 'add', 45, 46),
	(27, 23, NULL, NULL, 'edit', 47, 48),
	(28, 23, NULL, NULL, 'delete', 49, 50),
	(30, 1, NULL, NULL, 'MedicTypes', 54, 65),
	(31, 30, NULL, NULL, 'index', 55, 56),
	(32, 30, NULL, NULL, 'view', 57, 58),
	(33, 30, NULL, NULL, 'add', 59, 60),
	(34, 30, NULL, NULL, 'edit', 61, 62),
	(35, 30, NULL, NULL, 'delete', 63, 64),
	(37, 1, NULL, NULL, 'Medics', 66, 77),
	(38, 37, NULL, NULL, 'index', 67, 68),
	(39, 37, NULL, NULL, 'view', 69, 70),
	(40, 37, NULL, NULL, 'add', 71, 72),
	(41, 37, NULL, NULL, 'edit', 73, 74),
	(42, 37, NULL, NULL, 'delete', 75, 76),
	(44, 1, NULL, NULL, 'Notes', 78, 89),
	(45, 44, NULL, NULL, 'index', 79, 80),
	(46, 44, NULL, NULL, 'view', 81, 82),
	(47, 44, NULL, NULL, 'add', 83, 84),
	(48, 44, NULL, NULL, 'edit', 85, 86),
	(49, 44, NULL, NULL, 'delete', 87, 88),
	(51, 1, NULL, NULL, 'OmsCodes', 90, 107),
	(52, 51, NULL, NULL, 'index', 91, 92),
	(53, 51, NULL, NULL, 'view', 93, 94),
	(54, 51, NULL, NULL, 'add', 95, 96),
	(55, 51, NULL, NULL, 'edit', 97, 98),
	(56, 51, NULL, NULL, 'delete', 99, 100),
	(58, 1, NULL, NULL, 'OmsRegisters', 108, 119),
	(59, 58, NULL, NULL, 'index', 109, 110),
	(60, 58, NULL, NULL, 'view', 111, 112),
	(61, 58, NULL, NULL, 'add', 113, 114),
	(62, 58, NULL, NULL, 'edit', 115, 116),
	(63, 58, NULL, NULL, 'delete', 117, 118),
	(65, 1, NULL, NULL, 'Pages', 120, 123),
	(66, 65, NULL, NULL, 'display', 121, 122),
	(68, 1, NULL, NULL, 'Patients', 124, 139),
	(69, 68, NULL, NULL, 'index', 125, 126),
	(70, 68, NULL, NULL, 'view', 127, 128),
	(71, 68, NULL, NULL, 'add', 129, 130),
	(72, 68, NULL, NULL, 'edit', 131, 132),
	(73, 68, NULL, NULL, 'delete', 133, 134),
	(75, 1, NULL, NULL, 'Provinces', 140, 151),
	(76, 75, NULL, NULL, 'index', 141, 142),
	(77, 75, NULL, NULL, 'view', 143, 144),
	(78, 75, NULL, NULL, 'add', 145, 146),
	(79, 75, NULL, NULL, 'edit', 147, 148),
	(80, 75, NULL, NULL, 'delete', 149, 150),
	(82, 1, NULL, NULL, 'Questions', 152, 163),
	(83, 82, NULL, NULL, 'index', 153, 154),
	(84, 82, NULL, NULL, 'view', 155, 156),
	(85, 82, NULL, NULL, 'add', 157, 158),
	(86, 82, NULL, NULL, 'edit', 159, 160),
	(87, 82, NULL, NULL, 'delete', 161, 162),
	(89, 1, NULL, NULL, 'Users', 164, 181),
	(90, 89, NULL, NULL, 'index', 165, 166),
	(91, 89, NULL, NULL, 'view', 167, 168),
	(92, 89, NULL, NULL, 'add', 169, 170),
	(93, 89, NULL, NULL, 'edit', 171, 172),
	(94, 89, NULL, NULL, 'delete', 173, 174),
	(95, 89, NULL, NULL, 'login', 175, 176),
	(96, 89, NULL, NULL, 'logout', 177, 178),
	(98, 1, NULL, NULL, 'AclExtras', 182, 183),
	(99, 16, NULL, NULL, 'getCiudades', 37, 38),
	(100, 23, NULL, NULL, 'build_acl', 51, 52),
	(101, 51, NULL, NULL, 'getSigNivel', 101, 102),
	(102, 51, NULL, NULL, 'help', 103, 104),
	(103, 89, NULL, NULL, 'initDB', 179, 180),
	(105, 51, NULL, NULL, 'sugerencias', 105, 106),
	(106, 68, NULL, NULL, 'search', 135, 136),
	(107, 68, NULL, NULL, 'result', 137, 138);
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros_acos: ~15 rows (approximately)
DELETE FROM `aros_acos`;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1, 3, 1, '1', '1', '1', '1'),
	(2, 1, 1, '1', '1', '1', '1'),
	(3, 2, 1, '-1', '-1', '-1', '-1'),
	(4, 2, 71, '1', '1', '1', '1'),
	(5, 2, 72, '1', '1', '1', '1'),
	(6, 2, 70, '1', '1', '1', '1'),
	(7, 2, 5, '1', '1', '1', '1'),
	(8, 2, 6, '1', '1', '1', '1'),
	(9, 2, 47, '1', '1', '1', '1'),
	(10, 2, 48, '1', '1', '1', '1'),
	(11, 2, 61, '1', '1', '1', '1'),
	(12, 2, 62, '1', '1', '1', '1'),
	(13, 2, 12, '1', '1', '1', '1'),
	(14, 2, 13, '1', '1', '1', '1'),
	(15, 4, 1, '1', '1', '1', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.cities: ~2 rows (approximately)
DELETE FROM `cities`;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `nombre`, `province_id`) VALUES
	(1, 'Bahía Blanca', 1),
	(2, 'Otra Ciudad', 2);
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
	(4, 'C16', 'Neoplasias malignas de estómago', 'C15-C26'),
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




-- Dumping structure for table geocan.patients
DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` char(36) NOT NULL,
  `iniciales` varchar(5) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `address_particular_id` int(10) unsigned DEFAULT NULL,
  `address_laboral_id` int(10) unsigned DEFAULT NULL,
  `nro_documento` char(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_patient_address1` (`address_particular_id`),
  KEY `FK_patient_address2` (`address_laboral_id`),
  CONSTRAINT `FK_patient_address1` FOREIGN KEY (`address_particular_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `FK_patient_address2` FOREIGN KEY (`address_laboral_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping structure for table geocan.provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.provinces: ~2 rows (approximately)
DELETE FROM `provinces`;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`, `nombre`) VALUES
	(1, 'Buenos Aires'),
	(2, 'Otra2');
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
	(2, 'medico', 'ffda0a8dd1efa6cb63f0e51ca914e75e45e4b45c', 2, '2012-04-26 21:05:10', '2012-04-26 21:07:29', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
