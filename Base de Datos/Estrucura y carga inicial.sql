-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.37 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-04-08 21:33:49
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for geocan
DROP DATABASE IF EXISTS `geocan`;
CREATE DATABASE IF NOT EXISTS `geocan` /*!40100 DEFAULT CHARACTER SET utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.acos: ~118 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 236),
	(2, 1, NULL, NULL, 'Addresses', 2, 17),
	(3, 2, NULL, NULL, 'index', 3, 4),
	(4, 2, NULL, NULL, 'reporte', 5, 6),
	(5, 2, NULL, NULL, 'reporteBusqueda', 7, 8),
	(6, 2, NULL, NULL, 'view', 9, 10),
	(7, 2, NULL, NULL, 'add', 11, 12),
	(8, 2, NULL, NULL, 'edit', 13, 14),
	(9, 2, NULL, NULL, 'delete', 15, 16),
	(10, 1, NULL, NULL, 'Answers', 18, 29),
	(11, 10, NULL, NULL, 'index', 19, 20),
	(12, 10, NULL, NULL, 'view', 21, 22),
	(13, 10, NULL, NULL, 'add', 23, 24),
	(14, 10, NULL, NULL, 'edit', 25, 26),
	(15, 10, NULL, NULL, 'delete', 27, 28),
	(16, 1, NULL, NULL, 'Audits', 30, 33),
	(17, 16, NULL, NULL, 'index', 31, 32),
	(18, 1, NULL, NULL, 'Cities', 34, 51),
	(19, 18, NULL, NULL, 'index', 35, 36),
	(20, 18, NULL, NULL, 'view', 37, 38),
	(21, 18, NULL, NULL, 'add', 39, 40),
	(22, 18, NULL, NULL, 'edit', 41, 42),
	(23, 18, NULL, NULL, 'delete', 43, 44),
	(24, 18, NULL, NULL, 'checkDelete', 45, 46),
	(25, 18, NULL, NULL, 'getCiudades', 47, 48),
	(26, 18, NULL, NULL, 'getNombre', 49, 50),
	(27, 1, NULL, NULL, 'Groups', 52, 65),
	(28, 27, NULL, NULL, 'index', 53, 54),
	(29, 27, NULL, NULL, 'view', 55, 56),
	(30, 27, NULL, NULL, 'add', 57, 58),
	(31, 27, NULL, NULL, 'edit', 59, 60),
	(32, 27, NULL, NULL, 'delete', 61, 62),
	(33, 27, NULL, NULL, 'build_acl', 63, 64),
	(34, 1, NULL, NULL, 'Jobs', 66, 77),
	(35, 34, NULL, NULL, 'index', 67, 68),
	(36, 34, NULL, NULL, 'view', 69, 70),
	(37, 34, NULL, NULL, 'add', 71, 72),
	(38, 34, NULL, NULL, 'edit', 73, 74),
	(39, 34, NULL, NULL, 'delete', 75, 76),
	(40, 1, NULL, NULL, 'MedicTypes', 78, 89),
	(41, 40, NULL, NULL, 'index', 79, 80),
	(42, 40, NULL, NULL, 'view', 81, 82),
	(43, 40, NULL, NULL, 'add', 83, 84),
	(44, 40, NULL, NULL, 'edit', 85, 86),
	(45, 40, NULL, NULL, 'delete', 87, 88),
	(46, 1, NULL, NULL, 'Medics', 90, 103),
	(47, 46, NULL, NULL, 'index', 91, 92),
	(48, 46, NULL, NULL, 'view', 93, 94),
	(49, 46, NULL, NULL, 'add', 95, 96),
	(50, 46, NULL, NULL, 'edit', 97, 98),
	(51, 46, NULL, NULL, 'delete', 99, 100),
	(52, 46, NULL, NULL, 'checkDelete', 101, 102),
	(53, 1, NULL, NULL, 'Notes', 104, 115),
	(54, 53, NULL, NULL, 'index', 105, 106),
	(55, 53, NULL, NULL, 'view', 107, 108),
	(56, 53, NULL, NULL, 'add', 109, 110),
	(57, 53, NULL, NULL, 'edit', 111, 112),
	(58, 53, NULL, NULL, 'delete', 113, 114),
	(59, 1, NULL, NULL, 'OmsCodes', 116, 133),
	(60, 59, NULL, NULL, 'index', 117, 118),
	(61, 59, NULL, NULL, 'view', 119, 120),
	(62, 59, NULL, NULL, 'add', 121, 122),
	(63, 59, NULL, NULL, 'edit', 123, 124),
	(64, 59, NULL, NULL, 'delete', 125, 126),
	(65, 59, NULL, NULL, 'getSigNivel', 127, 128),
	(66, 59, NULL, NULL, 'sugerencias', 129, 130),
	(67, 59, NULL, NULL, 'help', 131, 132),
	(68, 1, NULL, NULL, 'OmsRegisters', 134, 147),
	(69, 68, NULL, NULL, 'index', 135, 136),
	(70, 68, NULL, NULL, 'view', 137, 138),
	(71, 68, NULL, NULL, 'add', 139, 140),
	(72, 68, NULL, NULL, 'edit', 141, 142),
	(73, 68, NULL, NULL, 'delete', 143, 144),
	(74, 68, NULL, NULL, 'checkDelete', 145, 146),
	(75, 1, NULL, NULL, 'Pages', 148, 153),
	(76, 75, NULL, NULL, 'display', 149, 150),
	(77, 75, NULL, NULL, 'welcome', 151, 152),
	(78, 1, NULL, NULL, 'Patients', 154, 173),
	(79, 78, NULL, NULL, 'recuperarPaciente', 155, 156),
	(80, 78, NULL, NULL, 'search', 157, 158),
	(81, 78, NULL, NULL, 'result', 159, 160),
	(82, 78, NULL, NULL, 'index', 161, 162),
	(83, 78, NULL, NULL, 'view', 163, 164),
	(84, 78, NULL, NULL, 'editAnswers', 165, 166),
	(85, 78, NULL, NULL, 'add', 167, 168),
	(86, 78, NULL, NULL, 'edit', 169, 170),
	(87, 78, NULL, NULL, 'delete', 171, 172),
	(88, 1, NULL, NULL, 'Provinces', 174, 187),
	(89, 88, NULL, NULL, 'index', 175, 176),
	(90, 88, NULL, NULL, 'view', 177, 178),
	(91, 88, NULL, NULL, 'add', 179, 180),
	(92, 88, NULL, NULL, 'edit', 181, 182),
	(93, 88, NULL, NULL, 'delete', 183, 184),
	(94, 88, NULL, NULL, 'checkDelete', 185, 186),
	(95, 1, NULL, NULL, 'Questions', 188, 201),
	(96, 95, NULL, NULL, 'index', 189, 190),
	(97, 95, NULL, NULL, 'view', 191, 192),
	(98, 95, NULL, NULL, 'add', 193, 194),
	(99, 95, NULL, NULL, 'edit', 195, 196),
	(100, 95, NULL, NULL, 'delete', 197, 198),
	(101, 95, NULL, NULL, 'checkDelete', 199, 200),
	(102, 1, NULL, NULL, 'Users', 202, 229),
	(103, 102, NULL, NULL, 'index', 203, 204),
	(104, 102, NULL, NULL, 'view', 205, 206),
	(105, 102, NULL, NULL, 'add', 207, 208),
	(106, 102, NULL, NULL, 'resetPassword', 209, 210),
	(107, 102, NULL, NULL, 'edit', 211, 212),
	(108, 102, NULL, NULL, 'editPassword', 213, 214),
	(109, 102, NULL, NULL, 'delete', 215, 216),
	(110, 102, NULL, NULL, 'login', 217, 218),
	(111, 102, NULL, NULL, 'logout', 219, 220),
	(112, 102, NULL, NULL, 'initDB', 221, 222),
	(113, 102, NULL, NULL, 'captcha', 223, 224),
	(114, 102, NULL, NULL, 'reload_captcha', 225, 226),
	(115, 102, NULL, NULL, 'cambiarBlocked', 227, 228),
	(116, 1, NULL, NULL, 'AclExtras', 230, 231),
	(117, 1, NULL, NULL, 'AuditLog', 232, 233),
	(118, 1, NULL, NULL, 'Filter', 234, 235);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.addresses: ~0 rows (approximately)
DELETE FROM `addresses`;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.answers: ~0 rows (approximately)
DELETE FROM `answers`;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
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

-- Dumping data for table geocan.aros: ~0 rows (approximately)
DELETE FROM `aros`;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, 'Group', 1, '', 1, 6),
	(2, NULL, 'Group', 2, '', 7, 8),
	(3, NULL, 'Group', 3, '', 9, 10),
	(4, 1, 'User', 1, '', 2, 3),
	(5, 1, 'User', 2, '', 4, 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros_acos: ~0 rows (approximately)
DELETE FROM `aros_acos`;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1, 1, 1, '1', '1', '1', '1'),
	(2, 1, 30, '-1', '-1', '-1', '-1'),
	(3, 1, 31, '-1', '-1', '-1', '-1'),
	(4, 1, 32, '-1', '-1', '-1', '-1'),
	(5, 2, 1, '-1', '-1', '-1', '-1'),
	(6, 2, 77, '1', '1', '1', '1'),
	(7, 2, 108, '1', '1', '1', '1'),
	(8, 2, 110, '1', '1', '1', '1'),
	(9, 2, 111, '1', '1', '1', '1'),
	(10, 2, 85, '1', '1', '1', '1'),
	(11, 2, 86, '1', '1', '1', '1'),
	(12, 2, 83, '1', '1', '1', '1'),
	(13, 2, 80, '1', '1', '1', '1'),
	(14, 2, 84, '1', '1', '1', '1'),
	(15, 2, 79, '1', '1', '1', '1'),
	(16, 2, 7, '1', '1', '1', '1'),
	(17, 2, 8, '1', '1', '1', '1'),
	(18, 2, 4, '1', '1', '1', '1'),
	(19, 2, 5, '1', '1', '1', '1'),
	(20, 2, 6, '1', '1', '1', '1'),
	(21, 2, 56, '1', '1', '1', '1'),
	(22, 2, 57, '1', '1', '1', '1'),
	(23, 2, 58, '1', '1', '1', '1'),
	(24, 2, 55, '1', '1', '1', '1'),
	(25, 2, 97, '1', '1', '1', '1'),
	(26, 2, 96, '1', '1', '1', '1'),
	(27, 2, 13, '1', '1', '1', '1'),
	(28, 2, 14, '1', '1', '1', '1'),
	(29, 2, 12, '1', '1', '1', '1'),
	(30, 2, 71, '1', '1', '1', '1'),
	(31, 2, 72, '1', '1', '1', '1'),
	(32, 2, 70, '1', '1', '1', '1'),
	(33, 2, 73, '1', '1', '1', '1'),
	(34, 2, 65, '1', '1', '1', '1'),
	(35, 2, 66, '1', '1', '1', '1'),
	(36, 2, 67, '1', '1', '1', '1'),
	(37, 2, 61, '1', '1', '1', '1'),
	(38, 2, 25, '1', '1', '1', '1'),
	(39, 2, 26, '1', '1', '1', '1'),
	(40, 2, 20, '1', '1', '1', '1'),
	(41, 2, 21, '1', '1', '1', '1'),
	(42, 2, 90, '1', '1', '1', '1'),
	(43, 2, 89, '-1', '-1', '-1', '-1'),
	(44, 2, 35, '1', '1', '1', '1'),
	(45, 2, 37, '1', '1', '1', '1'),
	(46, 2, 36, '1', '1', '1', '1'),
	(47, 2, 39, '1', '1', '1', '1'),
	(48, 2, 38, '-1', '-1', '-1', '-1'),
	(49, 3, 1, '-1', '-1', '-1', '-1'),
	(50, 3, 30, '-1', '-1', '-1', '-1'),
	(51, 3, 31, '-1', '-1', '-1', '-1'),
	(52, 3, 32, '-1', '-1', '-1', '-1'),
	(53, 3, 77, '1', '1', '1', '1'),
	(54, 3, 108, '1', '1', '1', '1'),
	(55, 3, 110, '1', '1', '1', '1'),
	(56, 3, 111, '1', '1', '1', '1'),
	(57, 3, 85, '1', '1', '1', '1'),
	(58, 3, 86, '1', '1', '1', '1'),
	(59, 3, 83, '1', '1', '1', '1'),
	(60, 3, 80, '1', '1', '1', '1'),
	(61, 3, 79, '1', '1', '1', '1'),
	(62, 3, 84, '1', '1', '1', '1'),
	(63, 3, 71, '1', '1', '1', '1'),
	(64, 3, 72, '1', '1', '1', '1'),
	(65, 3, 70, '1', '1', '1', '1'),
	(66, 3, 73, '1', '1', '1', '1'),
	(67, 3, 65, '1', '1', '1', '1'),
	(68, 3, 66, '1', '1', '1', '1'),
	(69, 3, 67, '1', '1', '1', '1'),
	(70, 3, 61, '1', '1', '1', '1'),
	(71, 3, 7, '1', '1', '1', '1'),
	(72, 3, 6, '1', '1', '1', '1'),
	(73, 3, 8, '1', '1', '1', '1'),
	(74, 3, 9, '1', '1', '1', '1'),
	(75, 3, 4, '1', '1', '1', '1'),
	(76, 3, 5, '1', '1', '1', '1'),
	(77, 3, 56, '1', '1', '1', '1'),
	(78, 3, 57, '1', '1', '1', '1'),
	(79, 3, 58, '1', '1', '1', '1'),
	(80, 3, 55, '1', '1', '1', '1'),
	(81, 3, 98, '1', '1', '1', '1'),
	(82, 3, 99, '1', '1', '1', '1'),
	(83, 3, 97, '1', '1', '1', '1'),
	(84, 3, 13, '1', '1', '1', '1'),
	(85, 3, 14, '1', '1', '1', '1'),
	(86, 3, 15, '1', '1', '1', '1'),
	(87, 3, 12, '1', '1', '1', '1'),
	(88, 3, 25, '1', '1', '1', '1'),
	(89, 3, 26, '1', '1', '1', '1'),
	(90, 3, 21, '1', '1', '1', '1'),
	(91, 3, 20, '1', '1', '1', '1'),
	(92, 3, 22, '1', '1', '1', '1'),
	(93, 3, 23, '1', '1', '1', '1'),
	(94, 3, 90, '1', '1', '1', '1'),
	(95, 3, 89, '-1', '-1', '-1', '-1'),
	(96, 3, 35, '1', '1', '1', '1'),
	(97, 3, 37, '1', '1', '1', '1'),
	(98, 3, 36, '1', '1', '1', '1'),
	(99, 3, 39, '1', '1', '1', '1'),
	(100, 3, 38, '-1', '-1', '-1', '-1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;


-- Dumping structure for table geocan.audits
DROP TABLE IF EXISTS `audits`;
CREATE TABLE IF NOT EXISTS `audits` (
  `id` varchar(36) NOT NULL,
  `event` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `entity_id` varchar(36) NOT NULL,
  `json_object` text NOT NULL,
  `description` text,
  `source_id` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.audits: ~0 rows (approximately)
DELETE FROM `audits`;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` (`id`, `event`, `model`, `entity_id`, `json_object`, `description`, `source_id`, `created`) VALUES
	('51635ec3-88a4-488a-9917-16cc7be0049b', 'CREATE', 'Group', '1', '{"Group":{"id":"1","name":"Administradores","created":"2013-04-08 21:20:19","modified":"2013-04-08 21:20:19"}}', NULL, NULL, '2013-04-08 21:20:19'),
	('51635ec8-2584-42a8-9a77-16cc7be0049b', 'CREATE', 'Group', '2', '{"Group":{"id":"2","name":"M\\u00e9dicos","created":"2013-04-08 21:20:24","modified":"2013-04-08 21:20:24"}}', NULL, NULL, '2013-04-08 21:20:24'),
	('51635ecd-296c-4c27-9df3-16cc7be0049b', 'CREATE', 'Group', '3', '{"Group":{"id":"3","name":"Ayudantes","created":"2013-04-08 21:20:29","modified":"2013-04-08 21:20:29"}}', NULL, NULL, '2013-04-08 21:20:29'),
	('51635edd-8a48-497e-9544-16cc7be0049b', 'CREATE', 'User', '1', '{"User":{"id":"1","username":"admin","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2013-04-08 21:20:45","modified":"2013-04-08 21:20:45","medic_id":null,"blocked":false}}', NULL, '', '2013-04-08 21:20:45'),
	('51635f49-c234-4ef3-acc2-16cc7be0049b', 'EDIT', 'User', '1', '{"User":{"id":"1","username":"admin","password":"0580f056ee31235cace9e9e1a5dc348330cb9eb9","group_id":"1","created":"2013-04-08 21:20:45","modified":"2013-04-08 21:22:33","medic_id":null,"blocked":false}}', NULL, '1', '2013-04-08 21:22:33'),
	('51636072-c1c8-40bd-8994-16cc7be0049b', 'CREATE', 'User', '2', '{"User":{"id":"2","username":"ndibiase","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2013-04-08 21:27:30","modified":"2013-04-08 21:27:30","medic_id":null,"blocked":false}}', NULL, '1', '2013-04-08 21:27:30');
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;


-- Dumping structure for table geocan.audit_deltas
DROP TABLE IF EXISTS `audit_deltas`;
CREATE TABLE IF NOT EXISTS `audit_deltas` (
  `id` varchar(36) NOT NULL,
  `audit_id` varchar(36) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `old_value` text,
  `new_value` text,
  PRIMARY KEY (`id`),
  KEY `audit_id` (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.audit_deltas: ~0 rows (approximately)
DELETE FROM `audit_deltas`;
/*!40000 ALTER TABLE `audit_deltas` DISABLE KEYS */;
INSERT INTO `audit_deltas` (`id`, `audit_id`, `property_name`, `old_value`, `new_value`) VALUES
	('51635f49-c484-4b99-b2ca-16cc7be0049b', '51635f49-c234-4ef3-acc2-16cc7be0049b', 'password', '1500c2908e71d66b19bfce3a1b4e042d4c860649', '0580f056ee31235cace9e9e1a5dc348330cb9eb9');
/*!40000 ALTER TABLE `audit_deltas` ENABLE KEYS */;


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
	(1, 'Administradores', '2013-04-08 21:20:19', '2013-04-08 21:20:19'),
	(2, 'Médicos', '2013-04-08 21:20:24', '2013-04-08 21:20:24'),
	(3, 'Ayudantes', '2013-04-08 21:20:29', '2013-04-08 21:20:29');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table geocan.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.jobs: ~3 rows (approximately)
DELETE FROM `jobs`;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id`, `descripcion`) VALUES
	(1, 'No Contesta'),
	(2, 'Desocupado'),
	(3, 'Jubilado');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.medics: ~0 rows (approximately)
DELETE FROM `medics`;
/*!40000 ALTER TABLE `medics` DISABLE KEYS */;
/*!40000 ALTER TABLE `medics` ENABLE KEYS */;


-- Dumping structure for table geocan.medic_types
DROP TABLE IF EXISTS `medic_types`;
CREATE TABLE IF NOT EXISTS `medic_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.medic_types: ~3 rows (approximately)
DELETE FROM `medic_types`;
/*!40000 ALTER TABLE `medic_types` DISABLE KEYS */;
INSERT INTO `medic_types` (`id`, `tipo`) VALUES
	(1, 'Clinico'),
	(2, 'Oncólogo'),
	(3, 'Patólogo');
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
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.oms_codes: ~197 rows (approximately)
DELETE FROM `oms_codes`;
/*!40000 ALTER TABLE `oms_codes` DISABLE KEYS */;
INSERT INTO `oms_codes` (`id`, `codigo`, `descripcion`, `padre`) VALUES
	(8, 'C00-C14', 'Labio, cavidad oral y faringe.', NULL),
	(9, 'C00', 'Tumor maligno del Labio', 'C00-C14'),
	(10, 'C01', 'Neoplasias malignas de la base de la lengua', 'C00-C14'),
	(11, 'C02', 'Neoplasias malignas de otras partes y sin especificar de la lengua', 'C00-C14'),
	(12, 'C03', 'Neoplasias malignas de la encía', 'C00-C14'),
	(13, 'C04', 'Neoplasias malignas de la base de la boca', 'C00-C14'),
	(14, 'C05', 'Neoplasias malignas del paladar', 'C00-C14'),
	(15, 'C06', 'Neoplasias malignas de otras partes y sin especificar de la boca', 'C00-C14'),
	(16, 'C07', 'Neoplasias malignas de la glándula parótida', 'C00-C14'),
	(17, 'C08', 'Neoplasias malignas de otras partes y sin especificar de las glándulas salivares', 'C00-C14'),
	(18, 'C09', 'Neoplasias malignas de las amígdalas', 'C00-C14'),
	(19, 'C10', 'Neoplasias malignas de la orofaringe', 'C00-C14'),
	(20, 'C11', 'Neoplasias malignas de la nasofaringe', 'C00-C14'),
	(21, 'C12', 'Neoplasias malignas del seno piriforme', 'C00-C14'),
	(22, 'C13', 'Neoplasias malignas de la hipofaringe', 'C00-C14'),
	(23, 'C14', 'Neoplasias malignas de otras partes del labio, la cavidad oral y la faringe', 'C00-C14'),
	(24, 'C15-C26', 'Neoplasias digestivas.', NULL),
	(25, 'C15', 'Neoplasias malignas de esófago', 'C15-C26'),
	(26, 'C16', 'Neoplasias malignas de estómago', 'C15-C26'),
	(27, 'C16.0', 'Neoplasias malignas del cardias', 'C16'),
	(28, 'C16.1', 'Neoplasias malignas de la funda del estómago', 'C16'),
	(29, 'C16.2', 'Neoplasias malignas del cuerpo del estómago', 'C16'),
	(30, 'C16.3', 'Neoplasias malignas del antro pilórico', 'C16'),
	(31, 'C16.4', 'Neoplasias malignas del píloro', 'C16'),
	(32, 'C16.5', 'Neoplasias malignas de la curvatura menor del estómago', 'C16'),
	(33, 'C16.6', 'Neoplasias malignas de la curvatura mayor del estómago', 'C16'),
	(34, 'C16.8', 'Lesión del solape del estómago', 'C16'),
	(35, 'C16.9', 'Neoplasias malignas de otras partes del estómago', 'C16'),
	(36, 'C17', 'Neoplasias malignas de intestino delgado', 'C15-C26'),
	(37, 'C17.0', 'Neoplasias malignas del duodeno', 'C15-C26'),
	(38, 'C18', 'Neoplasias malignas de colon', 'C15-C26'),
	(39, 'C19', 'Neoplasias malignas de la unión rectosigmoida', 'C15-C26'),
	(40, 'C20', 'Neoplasias malignas del recto', 'C15-C26'),
	(41, 'C21', 'Neoplasias malignas de ano y canal anal', 'C15-C26'),
	(42, 'C22', 'Neoplasias malignas de hígado y de canalículos biliares intrahepáticos', 'C15-C26'),
	(43, 'C22.0', 'Carcinoma de las células hepáticas', 'C22'),
	(44, 'C22.1', 'Carcinoma de los canalículos biliares intrahepáticos', 'C22'),
	(45, 'C22.2', 'Hepatoblastoma', 'C22'),
	(46, 'C22.3', 'Angiosarcoma de hígado', 'C22'),
	(47, 'C22.4', 'Otros sarcomas de hígado', 'C22'),
	(48, 'C22.7', 'Otros carcinomas especificados de hígado', 'C22'),
	(49, 'C22.9', 'Otras neoplasias malignas de hígado sin especificar', 'C22'),
	(50, 'C23', 'Neoplasias malignas de la vesícula biliar', 'C15-C26'),
	(51, 'C24', 'Neoplasias malignas de otras partes y sin especificar del tracto biliar', 'C15-C26'),
	(52, 'C25', 'Neoplasias malignas de páncreas', 'C15-C26'),
	(53, 'C25.0', 'Neoplasias malignas de la cabeza del páncreas', 'C25'),
	(54, 'C25.1', 'Neoplasias malignas del cuerpo del páncreas', 'C25'),
	(55, 'C25.2', 'Neoplasias malignas de la cola del páncreas', 'C25'),
	(56, 'C25.3', 'Neoplasias malignas del conducto pancreático', 'C25'),
	(57, 'C25.4', 'Neoplasias malignas del endocrino del páncreas', 'C25'),
	(58, 'C25.7', 'Neoplasias malignas de otras partes del páncreas', 'C25'),
	(59, 'C25.8', 'Neoplasias malignas del solape del páncreas', 'C25'),
	(60, 'C25.9', 'Neoplasias malignas sin especificar del páncreas', 'C25'),
	(61, 'C26', 'Neoplasias malignas de otras enfermedades de órganos digestivos', 'C15-C26'),
	(62, 'C30-C39', 'Neoplasias de órganos respiratorios e intratorácicos.', NULL),
	(63, 'C30', 'Neoplasias malignas de la cavidad nasal y el oído medio', 'C30-C39'),
	(64, 'C31', 'Neoplasias malignas de los senos paranasales', 'C30-C39'),
	(65, 'C32', 'Neoplasias malignas de laringe', 'C30-C39'),
	(66, 'C33', 'Neoplasias malignas de la tráquea', 'C30-C39'),
	(67, 'C34', 'Neoplasias malignas de bronquios y pulmón', 'C30-C39'),
	(68, 'C34.0', 'Neoplasias malignas del bronquio principal', 'C34'),
	(69, 'C34.1', 'Neoplasias malignas del lóbulo superior de los bronquios o el pulmón', 'C34'),
	(70, 'C34.2', 'Neoplasias malignas del lóbulo medio de los bronquios o el pulmón', 'C34'),
	(71, 'C34.3', 'Neoplasias malignas del lóbulo inferior de los bronquios o el pulmón', 'C34'),
	(72, 'C34.8', 'Lesión del solape de los bronquios o el pulmón', 'C34'),
	(73, 'C37', 'Neoplasias malignas del timo', 'C30-C39'),
	(74, 'C38', 'Neoplasias malignas del corazón, el mediastino y la pleura', 'C30-C39'),
	(75, 'C39', 'Neoplasias malignas de otras partes del sistema respiratorio y de órganos intratorácicos', 'C30-C39'),
	(76, 'C40-C41', 'Neoplasias malignas de hueso y cartílago articular', NULL),
	(77, 'C40', 'Neoplasias malignas de hueso y cartílago articular de miembros', 'C40-C41'),
	(78, 'C41', 'Neoplasias malignas de hueso y cartílago articular de otras partes sin especificar', 'C40-C41'),
	(79, 'C43-C44', 'Neoplasias de piel.', NULL),
	(80, 'C43', 'Melanoma de piel', 'C43-C44'),
	(81, 'C44', 'Otras neoplasias malignas de la piel', 'C43-C44'),
	(82, 'C45-C49', 'Neoplasias malignos de tejidos conectivos y blandos', NULL),
	(83, 'C45', 'Mesotelioma maligno', 'C45-C49'),
	(84, 'C46', 'Sarcoma de Kaposi', 'C45-C49'),
	(85, 'C47', 'Neoplasias malignas de nervios periféricos y del sistema nervioso autónomo', 'C45-C49'),
	(86, 'C48', 'Neoplasias malignas del retroperitoneo y del', 'C45-C49'),
	(87, 'C49', 'Neoplasias malignas de otros tejidos conectivos y blandos (los códigos alfanuméricos son ILDS)', 'C45-C49'),
	(88, 'C49.M10', 'Histiocitoma fibroso maligno', 'C49'),
	(89, 'C49.M12', 'Fibroxantoma atípico', 'C49'),
	(90, 'C49.M20', 'Haemangiopericitoma', 'C49'),
	(91, 'C49.M22', 'Angioendoteliomatosis maligna', 'C49'),
	(92, 'C49.M24', 'Dermatofibrosarcoma protruberante', 'C49'),
	(93, 'C49.M30', 'Tumor Bednar', 'C49'),
	(94, 'C49.M40', 'Sarcoma de piel', 'C49'),
	(95, 'C49.M42', 'Fibrosarcoma', 'C49'),
	(96, 'C49.M44', 'Schwannoma maligno', 'C49'),
	(97, 'C49.M48', 'Leiomiosarcoma', 'C49'),
	(98, 'C49.M50', 'Rabdomiosarcoma', 'C49'),
	(99, 'C49.M54', 'Mixofibrosarcoma', 'C49'),
	(100, 'C49.M60', 'Angiosarcoma cutáneo', 'C49'),
	(101, 'C49.M70', 'Limfangiosarcoma', 'C49'),
	(102, 'C50-C58', 'Neoplasias malignas de mama y de órganos genitales femeninos.', NULL),
	(103, 'C50', 'Neoplasias malignas de mama', 'C50-C58'),
	(104, 'C51', 'Neoplasias malignas de vulva', 'C50-C58'),
	(105, 'C52', 'Neoplasias malignas de vagina', 'C50-C58'),
	(106, 'C53', 'Neoplasias malignas de cuello uterino', 'C50-C58'),
	(107, 'C54', 'Neoplasias malignas del cuerpo del útero', 'C50-C58'),
	(108, 'C54.1', 'Cáncer endometrial', 'C50-C58'),
	(109, 'C55', 'Neoplasias malignas de las partes no especificadas del útero', 'C54.1'),
	(110, 'C56', 'Neoplasias malignas de ovario', 'C54.1'),
	(111, 'C57', 'Neoplasias malignas de otros órganos genitales femeninos no especificados', 'C54.1'),
	(112, 'C58', 'Neoplasias malignas de placenta', 'C54.1'),
	(113, 'C60-C63', 'Neoplasias de órganos genitales masculinos.', NULL),
	(114, 'C60', 'Neoplasias malignas de pene', 'C60-C63'),
	(115, 'C61', 'Neoplasias malignas de próstata', 'C60-C63'),
	(116, 'C62', 'Neoplasias malignas de testículo', 'C60-C63'),
	(117, 'C63', 'Neoplasias malignas otros órganos genitales masculinos no especificados', 'C60-C63'),
	(118, 'C64-C68', 'Neoplasias de órganos urinarios', NULL),
	(119, 'C64', 'Neoplasias malignas de riñón, excepto de la pelvis renal', 'C64-C68'),
	(120, 'C65', 'Neoplasias malignas de la pelvis renal', 'C64-C68'),
	(121, 'C66', 'Neoplasias malignas de uréter', 'C64-C68'),
	(122, 'C67', 'Neoplasias malignas de vejiga urinaria', 'C64-C68'),
	(123, 'C68', 'Neoplasias malignas de otros órganos urinarios no especificados', 'C64-C68'),
	(124, 'C69-C72', 'Neoplasias malignas del sistema nervioso', NULL),
	(125, 'C69', 'Neoplasias malignas de ojo y anexos', 'C68'),
	(126, 'C69.0', 'Neoplasias malignas de la conjuntiva', 'C68'),
	(127, 'C69.1', 'Neoplasias malignas de la córnea', 'C68'),
	(128, 'C69.2', 'Neoplasias malignas de la retina', 'C68'),
	(129, 'C69.3', 'Neoplasias malignas de las coroides', 'C68'),
	(130, 'C69.4', 'Neoplasias malignas de los cuerpos ciliares', 'C68'),
	(131, 'C69.5', 'Neoplasias malignas de la glándula y los conductos lagrimales', 'C68'),
	(132, 'C69.6', 'Neoplasias malignas de la órbita ocular', 'C68'),
	(133, 'C69.7', 'Lesión del solape del ojo y anexos', 'C68'),
	(134, 'C70', 'Neoplasias malignas de meninges', 'C69-C72'),
	(135, 'C70.0', 'Neoplasias malignas de las meninges cerebrales', 'C70'),
	(136, 'C70.1', 'Neoplasias malignas de las meninges espinales', 'C70'),
	(137, 'C71', 'Neoplasias malignas de cerebro', 'C69-C72'),
	(138, 'C71.0', 'Neoplasias malignas del telencéfalo, excepto lóbulos y ventrículos', 'C71'),
	(139, 'C71.1', 'Neoplasias malignas del lóbulo frontal', 'C71'),
	(140, 'C71.2', 'Neoplasias malignas del lóbulo temporal', 'C71'),
	(141, 'C71.3', 'Neoplasias malignas del lóbulo parietal', 'C71'),
	(142, 'C71.4', 'Neoplasias malignas del lóbulo occipital', 'C71'),
	(143, 'C71.5', 'Neoplasias malignas del sistema ventricular', 'C71'),
	(144, 'C71.6', 'Neoplasias malignas del cerebelo', 'C71'),
	(145, 'C71.7', 'Neoplasias malignas del tronco del encéfalo', 'C71'),
	(146, 'C71.8', 'Lesión del solape del cerebro', 'C71'),
	(147, 'C71.9', 'Neoplasias malignas de otras partes del cerebro sin especificar', 'C71'),
	(148, 'C72', 'Neoplasias malignas de la médula espinal, del par craneal y otras partes del sistema nervioso central', 'C69-C72'),
	(149, 'C72.0', 'Neoplasias malignas de la médula espinal', 'C72'),
	(150, 'C72.1', 'Neoplasias malignas de la cauda equina', 'C72'),
	(151, 'C72.2', 'Neoplasias malignas del nervio olfativo', 'C72'),
	(152, 'C72.3', 'Neoplasias malignas del nervio óptico', 'C72'),
	(153, 'C72.4', 'Neoplasias malignas del nervio auditivo', 'C72'),
	(154, 'C72.5', 'Neoplasias malignas otros nervios craneales', 'C72'),
	(155, 'C72.8', 'Lesión del solape del cerebro y otras partes del sistema nervioso central', 'C72'),
	(156, 'C72.9', 'Neoplasias malignas del sistema nervioso central sin especificar', 'C72'),
	(157, 'C73-C75', 'Neoplasias malignas de tiroides, otras glándulas endócrinas y estructuras similares', NULL),
	(158, 'C73', 'Neoplasias malignas de la glándula tiróidea', 'C73-C75'),
	(159, 'C74', 'Neoplasias malignas de la glándula suprarrenal', 'C73-C75'),
	(160, 'C74.0', 'Neoplasias malignas de la corteza de la glándula suprarrenal', 'C74'),
	(161, 'C74.1', 'Neoplasias malignas de la médula de la glándula suprarrenal', 'C74'),
	(162, 'C74.9', 'Neoplasias malignas de la glándula suprarrenal sin especificar', 'C74'),
	(163, 'C75', 'Neoplasias malignas de otras glándulas endocrinas y estructuras similares', 'C73-C75'),
	(164, 'C76-C80', 'Neoplasias malignas secundarias y de enfermedades', NULL),
	(165, 'C76', 'Neoplasias malignas de otras partes enfermas', 'C76-C80'),
	(166, 'C76.0', 'Neoplasias malignas de histiocitosis de células de Langerhans', 'C76'),
	(167, 'C76.1', 'Neoplasias malignas de linfohistiocitosis hemofagocítica', 'C76'),
	(168, 'C76.2', 'Neoplasias malignas del síndrome hemofagocítico asociado a infecciones', 'C76'),
	(169, 'C76.3', 'Neoplasias malignas debidos a otros síndromes de histiocitosis', 'C76'),
	(170, 'C77', 'Neoplasias malignas secundarias de nodos linfáticos', 'C76-C80'),
	(171, 'C78', 'Neoplasias malignas secundarias de órganos respiratorios y digestivos', 'C76-C80'),
	(172, 'C79', 'Neoplasias malignas secundarias de otras partes', 'C76-C80'),
	(173, 'C80', 'Neoplasias malignas sin parte especificada', 'C76-C80'),
	(174, 'C81-C96', 'Neoplasias malignas, declaradas o presuntas de ser primarias de tejidos linfoides, hematopoyéticos o tejidos relacionados', NULL),
	(175, 'C81', 'Enfermedad de Hodgkin', 'C81-C96'),
	(176, 'C81.0', 'Predominancia linfocítica', 'C81'),
	(177, 'C81.1', 'Esclerosis nodular', 'C81'),
	(178, 'C81.2', 'Celularidad mezclada', 'C81'),
	(179, 'C81.3', 'Depleción linfocítica', 'C81'),
	(180, 'C82', 'Linfoma folicular no-Hodgkin (nodular)', 'C81-C96'),
	(181, 'C82.0', 'Pequeñas células rajadas (folicular)', 'C82'),
	(182, 'C82.1', 'Mezcla de células rajadas pequeñas y grandes (folicular)', 'C82'),
	(183, 'C82.2', 'Grandes células (folicular)', 'C82'),
	(184, 'C83', 'Linfoma difuso no-Hodgkin', 'C81-C96'),
	(185, 'C83.0', 'Células pequeñas (difuso)', 'C83'),
	(186, 'C83.1', 'Pequeñas células rajadas (difuso)', 'C83'),
	(187, 'C83.2', 'Mezcla de células rajadas pequeñas y grandes (difuso)', 'C83'),
	(188, 'C83.3', 'Células grandes (difuso)', 'C83'),
	(189, 'C83.4', 'Inmunoblástico (difuso)', 'C83'),
	(190, 'C83.5', 'Linfoblástico (difuso)', 'C83'),
	(191, 'C83.6', 'Células madre (difuso)', 'C83'),
	(192, 'C83.7', 'Linfoma de Burkitt', 'C83'),
	(193, 'C84', 'Linfomas de células T periféricas y cutáneas', 'C81-C96'),
	(194, 'C84.0', 'Micosis fungoides', 'C84'),
	(195, 'C84.1', 'Síndrome de Sézary', 'C84'),
	(196, 'C84.2', 'Linfoma zona-T', 'C84'),
	(197, 'C84.3', 'Linfoma linfoepitelioide', 'C84'),
	(198, 'C84.4', 'Linfoma periférico tipo T', 'C84'),
	(199, 'C85', 'Otros tipos sin especificar de linfoma no-Hodgkin', 'C81-C96'),
	(200, 'C85.0', 'Linfosarcoma', 'C85'),
	(201, 'C85.1', 'Linfoma de células B, sin especificar', 'C85'),
	(202, 'C88', 'Enfermedades malignas inmunoproliferativas', 'C81-C96'),
	(203, 'C88.0', 'Macroglobulinemia Waldenström', 'C88'),
	(204, 'C88.1', 'Enfermedad de la cadena pesada alfa', 'C88'),
	(205, 'C88.2', 'Enfermedad de la cadena pesada gamma', 'C88'),
	(206, 'C88.3', 'Enfermedad inmunoproliferativa del intestino delgado', 'C88'),
	(207, 'C90', 'Mieloma múltiple y neoplasias malignas de células plasmáticas', 'C81-C96'),
	(208, 'C90.0', 'Mieloma múltiple', 'C90'),
	(209, 'C90.1', 'Leucemia de células plasmáticas', 'C90'),
	(210, 'C90.2', 'Plasmacitoma extramedular', 'C90'),
	(211, 'C91', 'Leucemia linfoide', 'C81-C96'),
	(212, 'C91.0', 'Leucemia linfoide aguda', 'C91'),
	(213, 'C91.1', 'Leucemia linfática crónica', 'C91'),
	(214, 'C91.4', 'Leucemia de las células capilares', 'C91'),
	(215, 'C92', 'Leucemia mieloide', 'C81-C96'),
	(216, 'C92.0', 'Leucemia mieloide aguda', 'C92'),
	(217, 'C92.1', 'Leucemia mieloide crónica', 'C92'),
	(218, 'C92.2', 'Leucemia mieloide subaguda', 'C92'),
	(219, 'C92.3', 'Sarcoma mieloide', 'C92'),
	(220, 'C92.4', 'Leucemia promielocítica aguda', 'C92'),
	(221, 'C92.5', 'Leucemia mielomonocítica aguda', 'C92'),
	(222, 'C93', 'Leucemia monocítica', 'C81-C96'),
	(223, 'C93.0', 'Leucemia monocítica aguda', 'C93'),
	(224, 'C93.1', 'Leucemia monocítica crónica', 'C93'),
	(225, 'C93.2', 'Leucemia monocítica subaguda', 'C93'),
	(226, 'C94', 'Otras leucemias de tipo de célula específico', 'C81-C96'),
	(227, 'C94.0', 'Policitemia aguda y eritroleucemia', 'C94'),
	(228, 'C94.1', 'Policitemia crónica', 'C94'),
	(229, 'C94.2', 'Leucemia megacarioblástica aguda', 'C94'),
	(230, 'C94.3', 'Leucemia mastocítica', 'C94'),
	(231, 'C94.4', 'Panmielosis aguda', 'C94'),
	(232, 'C94.5', 'Mielofibrosis aguda', 'C94'),
	(233, 'C94.7', 'Otras leucemis específicas', 'C94'),
	(234, 'C95', 'Otras leucemias de tipo de célula no específicas', 'C81-C96'),
	(235, 'C95.0', 'Leucemia aguda de tipos de célula no específicos', 'C95'),
	(236, 'C95.1', 'Leucemia crónica de tipos de célula no específicos', 'C95'),
	(237, 'C95.2', 'Leucemia subaguda de tipos de célula no específicos', 'C95'),
	(238, 'C95.7', 'Otras leucemias de tipos de célula no específicos', 'C95'),
	(239, 'C95.9', 'Leucamias sin especificar', 'C95'),
	(240, 'C96', 'Otras neoplasias malignas y neoplasias malignas no especificadas de tejidos linfoides, hematopoyéticos y tejidos relacionados', 'C81-C96'),
	(241, 'C96.0', 'Enfermedad Letterer-Siwe', 'C96'),
	(242, 'C96.1', 'Histiocitosis maligna', 'C96'),
	(243, 'C96.2', 'Tumor maligno de mastocitos', 'C96'),
	(244, 'C96.3', 'Linfoma histiocítico real', 'C96'),
	(245, 'C96.7', 'Otras neoplasias malignas de tejidos linfoides, hematopoyéticos y tejidos relacionados', 'C96'),
	(246, 'C96.9', 'Neoplasias malignas de tejidos linfoides, hematopoyéticos y tejidos relacionados sin especificar', 'C96'),
	(247, 'C97', 'Neoplasias malignas (primarias) de múltiples localizaciones independientes', NULL);
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
  `codificacion` varchar(30) DEFAULT 'Tx;@Nx;@Mx;',
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
  `nro_documento` char(64) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `vive` tinyint(1) DEFAULT '1',
  `fecha_defuncion` date DEFAULT NULL,
  `job_id` int(10) unsigned DEFAULT '1',
  `peso` decimal(5,2) DEFAULT '0.00',
  `altura` decimal(3,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `FK_patient_address1` (`address_particular_id`),
  KEY `FK_patient_address2` (`address_laboral_id`),
  KEY `fk_patients_jobs` (`job_id`),
  CONSTRAINT `fk_patients_jobs` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  CONSTRAINT `FK_patient_address1` FOREIGN KEY (`address_particular_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `FK_patient_address2` FOREIGN KEY (`address_laboral_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.patients: ~0 rows (approximately)
DELETE FROM `patients`;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;


-- Dumping structure for table geocan.provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.provinces: ~24 rows (approximately)
DELETE FROM `provinces`;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`, `nombre`) VALUES
	(1, 'Buenos Aires'),
	(2, 'Catamarca'),
	(3, 'Chaco'),
	(4, 'Chubut'),
	(5, 'Bs As Capital'),
	(6, 'Córdoba'),
	(7, 'Corrientes'),
	(8, 'Entre Ríos'),
	(9, 'Formosa'),
	(10, 'Jujuy'),
	(11, 'La Pampa'),
	(12, 'La Rioja'),
	(13, 'Mendoza'),
	(14, 'Misiones'),
	(15, 'Neuquen'),
	(16, 'Río Negro'),
	(17, 'Salta'),
	(18, 'San Juan'),
	(19, 'San Luis'),
	(20, 'Santa Cruz'),
	(21, 'Santa Fe'),
	(22, 'Santiago del Estero'),
	(23, 'Tierra del Fuego'),
	(24, 'Tucumán');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;


-- Dumping structure for table geocan.questions
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.questions: ~4 rows (approximately)
DELETE FROM `questions`;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `descripcion`, `visible`) VALUES
	(1, '¿Fumó en los últimos diez años?', 1),
	(2, '¿Bebe más de 50gr. de alcohol por día?', 1),
	(3, '¿Realiza al menos una hora y media de ejercicio por semana?', 1),
	(4, '¿Tiene antecedentes personales de cáncer?', 1),
	(5, '¿Tiene antecedentes familiares de cáncer?', 1),
	(6, 'Bebe frecuentemente u ocasionalmente 40g de alcohol/día?', 1);
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
  `blocked` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_users_group` (`group_id`),
  KEY `FK_users_medic` (`medic_id`),
  CONSTRAINT `FK_users_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `FK_users_medic` FOREIGN KEY (`medic_id`) REFERENCES `medics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `medic_id`, `blocked`) VALUES
	(1, 'admin', '1500c2908e71d66b19bfce3a1b4e042d4c860649', 1, '2013-04-08 21:20:45', '2013-04-08 21:22:33', NULL, 0),
	(2, 'ndibiase', '1500c2908e71d66b19bfce3a1b4e042d4c860649', 1, '2013-04-08 21:27:30', '2013-04-08 21:27:30', NULL, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
