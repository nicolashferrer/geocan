-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-08-15 11:03:37
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
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.acos: ~108 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 216),
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
	(18, 1, NULL, NULL, 'Cities', 34, 49),
	(19, 18, NULL, NULL, 'index', 35, 36),
	(20, 18, NULL, NULL, 'view', 37, 38),
	(21, 18, NULL, NULL, 'add', 39, 40),
	(22, 18, NULL, NULL, 'edit', 41, 42),
	(23, 18, NULL, NULL, 'delete', 43, 44),
	(24, 18, NULL, NULL, 'checkDelete', 45, 46),
	(25, 18, NULL, NULL, 'getCiudades', 47, 48),
	(26, 1, NULL, NULL, 'Groups', 50, 63),
	(27, 26, NULL, NULL, 'index', 51, 52),
	(28, 26, NULL, NULL, 'view', 53, 54),
	(29, 26, NULL, NULL, 'add', 55, 56),
	(30, 26, NULL, NULL, 'edit', 57, 58),
	(31, 26, NULL, NULL, 'delete', 59, 60),
	(32, 26, NULL, NULL, 'build_acl', 61, 62),
	(33, 1, NULL, NULL, 'MedicTypes', 64, 75),
	(34, 33, NULL, NULL, 'index', 65, 66),
	(35, 33, NULL, NULL, 'view', 67, 68),
	(36, 33, NULL, NULL, 'add', 69, 70),
	(37, 33, NULL, NULL, 'edit', 71, 72),
	(38, 33, NULL, NULL, 'delete', 73, 74),
	(39, 1, NULL, NULL, 'Medics', 76, 89),
	(40, 39, NULL, NULL, 'index', 77, 78),
	(41, 39, NULL, NULL, 'view', 79, 80),
	(42, 39, NULL, NULL, 'add', 81, 82),
	(43, 39, NULL, NULL, 'edit', 83, 84),
	(44, 39, NULL, NULL, 'delete', 85, 86),
	(45, 39, NULL, NULL, 'checkDelete', 87, 88),
	(46, 1, NULL, NULL, 'Notes', 90, 101),
	(47, 46, NULL, NULL, 'index', 91, 92),
	(48, 46, NULL, NULL, 'view', 93, 94),
	(49, 46, NULL, NULL, 'add', 95, 96),
	(50, 46, NULL, NULL, 'edit', 97, 98),
	(51, 46, NULL, NULL, 'delete', 99, 100),
	(52, 1, NULL, NULL, 'OmsCodes', 102, 119),
	(53, 52, NULL, NULL, 'index', 103, 104),
	(54, 52, NULL, NULL, 'view', 105, 106),
	(55, 52, NULL, NULL, 'add', 107, 108),
	(56, 52, NULL, NULL, 'edit', 109, 110),
	(57, 52, NULL, NULL, 'delete', 111, 112),
	(58, 52, NULL, NULL, 'getSigNivel', 113, 114),
	(59, 52, NULL, NULL, 'sugerencias', 115, 116),
	(60, 52, NULL, NULL, 'help', 117, 118),
	(61, 1, NULL, NULL, 'OmsRegisters', 120, 133),
	(62, 61, NULL, NULL, 'index', 121, 122),
	(63, 61, NULL, NULL, 'view', 123, 124),
	(64, 61, NULL, NULL, 'add', 125, 126),
	(65, 61, NULL, NULL, 'edit', 127, 128),
	(66, 61, NULL, NULL, 'delete', 129, 130),
	(67, 61, NULL, NULL, 'checkDelete', 131, 132),
	(68, 1, NULL, NULL, 'Pages', 134, 137),
	(69, 68, NULL, NULL, 'display', 135, 136),
	(70, 1, NULL, NULL, 'Patients', 138, 157),
	(71, 70, NULL, NULL, 'recuperarPaciente', 139, 140),
	(72, 70, NULL, NULL, 'search', 141, 142),
	(73, 70, NULL, NULL, 'result', 143, 144),
	(74, 70, NULL, NULL, 'index', 145, 146),
	(75, 70, NULL, NULL, 'view', 147, 148),
	(76, 70, NULL, NULL, 'editAnswers', 149, 150),
	(77, 70, NULL, NULL, 'add', 151, 152),
	(78, 70, NULL, NULL, 'edit', 153, 154),
	(79, 70, NULL, NULL, 'delete', 155, 156),
	(80, 1, NULL, NULL, 'Provinces', 158, 171),
	(81, 80, NULL, NULL, 'index', 159, 160),
	(82, 80, NULL, NULL, 'view', 161, 162),
	(83, 80, NULL, NULL, 'add', 163, 164),
	(84, 80, NULL, NULL, 'edit', 165, 166),
	(85, 80, NULL, NULL, 'delete', 167, 168),
	(86, 80, NULL, NULL, 'checkDelete', 169, 170),
	(87, 1, NULL, NULL, 'Questions', 172, 183),
	(88, 87, NULL, NULL, 'index', 173, 174),
	(89, 87, NULL, NULL, 'view', 175, 176),
	(90, 87, NULL, NULL, 'add', 177, 178),
	(91, 87, NULL, NULL, 'edit', 179, 180),
	(92, 87, NULL, NULL, 'delete', 181, 182),
	(93, 1, NULL, NULL, 'Users', 184, 209),
	(94, 93, NULL, NULL, 'index', 185, 186),
	(95, 93, NULL, NULL, 'view', 187, 188),
	(96, 93, NULL, NULL, 'add', 189, 190),
	(97, 93, NULL, NULL, 'resetPassword', 191, 192),
	(98, 93, NULL, NULL, 'edit', 193, 194),
	(99, 93, NULL, NULL, 'editPassword', 195, 196),
	(100, 93, NULL, NULL, 'delete', 197, 198),
	(101, 93, NULL, NULL, 'login', 199, 200),
	(102, 93, NULL, NULL, 'logout', 201, 202),
	(103, 93, NULL, NULL, 'initDB', 203, 204),
	(104, 93, NULL, NULL, 'captcha', 205, 206),
	(105, 93, NULL, NULL, 'reload_captcha', 207, 208),
	(106, 1, NULL, NULL, 'AclExtras', 210, 211),
	(107, 1, NULL, NULL, 'AuditLog', 212, 213),
	(108, 1, NULL, NULL, 'Filter', 214, 215);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.addresses: ~26 rows (approximately)
DELETE FROM `addresses`;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` (`id`, `city_id`, `latitud`, `longitud`, `direccion`) VALUES
	(2, 1, -38.7190841, -62.2654023, 'Alsina 1'),
	(3, 1, -38.7058369, -62.2671652, 'Salta 500'),
	(4, 1, -38.7092936, -62.2700189, 'Alvarado 700'),
	(5, 1, -38.7045059, -62.2615128, 'Fuerte Argentino'),
	(6, 1, -38.7295799, -62.2804450999999, 'Av Colón'),
	(7, 1, -38.7219369, -62.2750091, 'Terrada 200'),
	(8, 1, -38.7161803, -62.2658204, 'Sarmiento 100'),
	(9, 1, -38.7110278, -62.2781204, 'Estomba 900'),
	(10, 1, -38.7000692, -62.263954, 'Cerrito 1100'),
	(11, 1, -38.7003684, -62.3094539, 'Almafuerte 3100'),
	(12, 1, -38.7139133, -62.2477072, 'Charcas 1100'),
	(13, 1, -38.7111594, -62.2529872, 'Las Heras 1000'),
	(14, 1, -38.7186148, -62.2626742, 'Belgrano 100'),
	(15, 1, -38.7196884, -62.252903, 'Darwin'),
	(16, 1, -38.7399958, -62.2392298, 'Cramer 1'),
	(17, 1, -38.6847185, -62.3106636, 'Estomba 5000'),
	(18, 1, -38.7306137, -62.2774277, 'Donado'),
	(19, 1, -38.7189506, -62.2494325, 'Newton 500'),
	(20, 1, -38.7325851, -62.2363228, 'Punta Alta 600'),
	(21, 1, -38.6797295, -62.2801819, 'Pigue'),
	(22, 1, -38.7135327, -62.2691502, '11 de Abril 100'),
	(23, 1, -38.7225971, -62.2695411, 'O Higgins 300'),
	(24, 1, -38.7152399, -62.2647057, 'Mitre 100'),
	(25, 1, -38.7098297, -62.26689099999999, 'Zapiola 500'),
	(26, 1, -38.7190841, -62.265402300000005, 'Alsina 1'),
	(27, 1, -38.7190841, -62.265402300000005, 'Alsina 1');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.answers: ~35 rows (approximately)
DELETE FROM `answers`;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `patient_id`, `question_id`, `valor`) VALUES
	(1, '4fdfcc0a-d64c-42e0-9e2d-160c7be0049b', 1, 0),
	(2, '4fdfcc0a-d64c-42e0-9e2d-160c7be0049b', 2, 0),
	(3, '4fdfcc0a-d64c-42e0-9e2d-160c7be0049b', 3, 0),
	(4, '4feb92e1-de74-4680-9ba5-10e8c0a80164', 1, 0),
	(5, '4feb92e1-de74-4680-9ba5-10e8c0a80164', 3, 1),
	(6, '4feb92e1-de74-4680-9ba5-10e8c0a80164', 4, 0),
	(7, '4feb9307-60e8-4384-b436-10e8c0a80164', 1, 1),
	(8, '4feb9307-60e8-4384-b436-10e8c0a80164', 2, 0),
	(9, '4feb9307-60e8-4384-b436-10e8c0a80164', 3, 0),
	(10, '4feb9307-60e8-4384-b436-10e8c0a80164', 4, 0),
	(11, '4feb933c-36dc-4309-b7c8-10e8c0a80164', 2, 1),
	(12, '4feb933c-36dc-4309-b7c8-10e8c0a80164', 3, 0),
	(13, '4feb933c-36dc-4309-b7c8-10e8c0a80164', 4, 1),
	(14, '4feb940c-657c-458b-bed9-10e8c0a80164', 1, 0),
	(15, '4feb940c-657c-458b-bed9-10e8c0a80164', 3, 0),
	(16, '4feb940c-657c-458b-bed9-10e8c0a80164', 4, 0),
	(17, '4feb9422-3364-4746-8db7-10e8c0a80164', 1, 0),
	(18, '4feb9422-3364-4746-8db7-10e8c0a80164', 2, 1),
	(19, '4feb9422-3364-4746-8db7-10e8c0a80164', 3, 0),
	(20, '4feb9422-3364-4746-8db7-10e8c0a80164', 4, 0),
	(21, '4feb9524-f774-4c06-88c5-10e8c0a80164', 1, 1),
	(22, '4feb9581-38b4-49cc-bfdd-10e8c0a80164', 1, 1),
	(23, '4feb9581-38b4-49cc-bfdd-10e8c0a80164', 2, 1),
	(24, '4feb95eb-109c-4503-9170-10e8c0a80164', 1, 0),
	(25, '4feb95eb-109c-4503-9170-10e8c0a80164', 2, 0),
	(26, '4feb95eb-109c-4503-9170-10e8c0a80164', 3, 1),
	(27, '4feb95eb-109c-4503-9170-10e8c0a80164', 4, 0),
	(28, '4feb967b-a8cc-400c-8581-10e8c0a80164', 1, 0),
	(29, '4feb967b-a8cc-400c-8581-10e8c0a80164', 2, 1),
	(30, '4feb967b-a8cc-400c-8581-10e8c0a80164', 4, 0),
	(31, '4feb96ce-7a40-404d-b131-10e8c0a80164', 1, 0),
	(32, '4feb96ce-7a40-404d-b131-10e8c0a80164', 2, 0),
	(33, '4feb96ce-7a40-404d-b131-10e8c0a80164', 3, 0),
	(34, '4feb96ce-7a40-404d-b131-10e8c0a80164', 4, 0),
	(35, '50002c22-d4cc-4586-a7d6-08607be0049b', 1, 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros: ~7 rows (approximately)
DELETE FROM `aros`;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, 'Group', 1, '', 1, 4),
	(2, NULL, 'Group', 2, '', 5, 10),
	(3, NULL, 'Group', 3, '', 11, 14),
	(4, 1, 'User', 1, '', 2, 3),
	(5, 3, 'User', 2, '', 12, 13),
	(6, 2, 'User', 3, '', 6, 7),
	(7, 2, 'User', 4, '', 8, 9);
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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros_acos: ~86 rows (approximately)
DELETE FROM `aros_acos`;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1, 1, 1, '1', '1', '1', '1'),
	(2, 1, 29, '-1', '-1', '-1', '-1'),
	(3, 1, 30, '-1', '-1', '-1', '-1'),
	(4, 1, 31, '-1', '-1', '-1', '-1'),
	(5, 2, 1, '-1', '-1', '-1', '-1'),
	(6, 2, 99, '1', '1', '1', '1'),
	(7, 2, 101, '1', '1', '1', '1'),
	(8, 2, 102, '1', '1', '1', '1'),
	(9, 2, 77, '1', '1', '1', '1'),
	(10, 2, 78, '1', '1', '1', '1'),
	(11, 2, 75, '1', '1', '1', '1'),
	(12, 2, 72, '1', '1', '1', '1'),
	(13, 2, 76, '1', '1', '1', '1'),
	(14, 2, 71, '1', '1', '1', '1'),
	(15, 2, 7, '1', '1', '1', '1'),
	(16, 2, 8, '1', '1', '1', '1'),
	(17, 2, 4, '1', '1', '1', '1'),
	(18, 2, 5, '1', '1', '1', '1'),
	(19, 2, 6, '1', '1', '1', '1'),
	(20, 2, 49, '1', '1', '1', '1'),
	(21, 2, 50, '1', '1', '1', '1'),
	(22, 2, 51, '1', '1', '1', '1'),
	(23, 2, 48, '1', '1', '1', '1'),
	(24, 2, 89, '1', '1', '1', '1'),
	(25, 2, 88, '1', '1', '1', '1'),
	(26, 2, 13, '1', '1', '1', '1'),
	(27, 2, 14, '1', '1', '1', '1'),
	(28, 2, 12, '1', '1', '1', '1'),
	(29, 2, 64, '1', '1', '1', '1'),
	(30, 2, 65, '1', '1', '1', '1'),
	(31, 2, 63, '1', '1', '1', '1'),
	(32, 2, 66, '1', '1', '1', '1'),
	(33, 2, 58, '1', '1', '1', '1'),
	(34, 2, 59, '1', '1', '1', '1'),
	(35, 2, 60, '1', '1', '1', '1'),
	(36, 2, 54, '1', '1', '1', '1'),
	(37, 2, 25, '1', '1', '1', '1'),
	(38, 2, 20, '1', '1', '1', '1'),
	(39, 2, 21, '1', '1', '1', '1'),
	(40, 2, 82, '1', '1', '1', '1'),
	(41, 2, 81, '-1', '-1', '-1', '-1'),
	(42, 3, 1, '-1', '-1', '-1', '-1'),
	(43, 3, 29, '-1', '-1', '-1', '-1'),
	(44, 3, 30, '-1', '-1', '-1', '-1'),
	(45, 3, 31, '-1', '-1', '-1', '-1'),
	(46, 3, 99, '1', '1', '1', '1'),
	(47, 3, 101, '1', '1', '1', '1'),
	(48, 3, 102, '1', '1', '1', '1'),
	(49, 3, 77, '1', '1', '1', '1'),
	(50, 3, 78, '1', '1', '1', '1'),
	(51, 3, 75, '1', '1', '1', '1'),
	(52, 3, 72, '1', '1', '1', '1'),
	(53, 3, 71, '1', '1', '1', '1'),
	(54, 3, 76, '1', '1', '1', '1'),
	(55, 3, 64, '1', '1', '1', '1'),
	(56, 3, 65, '1', '1', '1', '1'),
	(57, 3, 63, '1', '1', '1', '1'),
	(58, 3, 66, '1', '1', '1', '1'),
	(59, 3, 58, '1', '1', '1', '1'),
	(60, 3, 59, '1', '1', '1', '1'),
	(61, 3, 60, '1', '1', '1', '1'),
	(62, 3, 54, '1', '1', '1', '1'),
	(63, 3, 7, '1', '1', '1', '1'),
	(64, 3, 6, '1', '1', '1', '1'),
	(65, 3, 8, '1', '1', '1', '1'),
	(66, 3, 9, '1', '1', '1', '1'),
	(67, 3, 4, '1', '1', '1', '1'),
	(68, 3, 5, '1', '1', '1', '1'),
	(69, 3, 49, '1', '1', '1', '1'),
	(70, 3, 50, '1', '1', '1', '1'),
	(71, 3, 51, '1', '1', '1', '1'),
	(72, 3, 48, '1', '1', '1', '1'),
	(73, 3, 90, '1', '1', '1', '1'),
	(74, 3, 91, '1', '1', '1', '1'),
	(75, 3, 89, '1', '1', '1', '1'),
	(76, 3, 13, '1', '1', '1', '1'),
	(77, 3, 14, '1', '1', '1', '1'),
	(78, 3, 15, '1', '1', '1', '1'),
	(79, 3, 12, '1', '1', '1', '1'),
	(80, 3, 25, '1', '1', '1', '1'),
	(81, 3, 21, '1', '1', '1', '1'),
	(82, 3, 20, '1', '1', '1', '1'),
	(83, 3, 22, '1', '1', '1', '1'),
	(84, 3, 23, '1', '1', '1', '1'),
	(85, 3, 82, '1', '1', '1', '1'),
	(86, 3, 81, '-1', '-1', '-1', '-1');
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

-- Dumping data for table geocan.audits: ~7 rows (approximately)
DELETE FROM `audits`;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` (`id`, `event`, `model`, `entity_id`, `json_object`, `description`, `source_id`, `created`) VALUES
	('502baa15-f770-463b-bc3b-12c87be0049b', 'CREATE', 'Group', '1', '{"Group":{"id":"1","name":"Administradores","created":"2012-08-15 10:54:29","modified":"2012-08-15 10:54:29"}}', NULL, NULL, '2012-08-15 10:54:29'),
	('502baa1e-b558-459d-8a0f-12c87be0049b', 'CREATE', 'Group', '2', '{"Group":{"id":"2","name":"M\\u00e9dicos","created":"2012-08-15 10:54:38","modified":"2012-08-15 10:54:38"}}', NULL, NULL, '2012-08-15 10:54:38'),
	('502baa24-1f68-43fb-9b4f-12c87be0049b', 'CREATE', 'Group', '3', '{"Group":{"id":"3","name":"Ayudantes","created":"2012-08-15 10:54:44","modified":"2012-08-15 10:54:44"}}', NULL, NULL, '2012-08-15 10:54:44'),
	('502baa39-6b64-4096-bfa3-12c87be0049b', 'CREATE', 'User', '1', '{"User":{"id":"1","username":"admin","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-08-15 10:55:05","modified":"2012-08-15 10:55:05","medic_id":null}}', NULL, NULL, '2012-08-15 10:55:05'),
	('502baa46-bf5c-4acc-9190-12c87be0049b', 'CREATE', 'User', '2', '{"User":{"id":"2","username":"ayudante","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-08-15 10:55:18","modified":"2012-08-15 10:55:18","medic_id":null}}', NULL, NULL, '2012-08-15 10:55:18'),
	('502baa52-c430-452e-a8fd-12c87be0049b', 'CREATE', 'User', '3', '{"User":{"id":"3","username":"medico1","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"2","created":"2012-08-15 10:55:30","modified":"2012-08-15 10:55:30","medic_id":"1"}}', NULL, NULL, '2012-08-15 10:55:30'),
	('502baa6f-e7ec-41b7-aaf6-12c87be0049b', 'CREATE', 'User', '4', '{"User":{"id":"4","username":"medico2","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"2","created":"2012-08-15 10:55:59","modified":"2012-08-15 10:55:59","medic_id":"2"}}', NULL, NULL, '2012-08-15 10:55:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.cities: ~2 rows (approximately)
DELETE FROM `cities`;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `nombre`, `province_id`) VALUES
	(1, 'Bahía Blanca', 1),
	(2, 'San Fernando del VC', 2);
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
	(1, 'Administradores', '2012-08-15 10:54:29', '2012-08-15 10:54:29'),
	(2, 'Médicos', '2012-08-15 10:54:38', '2012-08-15 10:54:38'),
	(3, 'Ayudantes', '2012-08-15 10:54:44', '2012-08-15 10:54:44');
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
	(1, 'Jason', 'Voorhees', '1234567', 1),
	(2, 'Freddy', 'Kruger', '666', 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.notes: ~3 rows (approximately)
DELETE FROM `notes`;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`, `medic_id`, `oms_register_id`, `fecha`, `descripcion`) VALUES
	(1, 1, 20, '2012-07-08 19:26:21', '<p>feefefefefef</p>'),
	(2, 1, 20, '2012-07-08 19:27:06', '<p>feefefefefeffgfg</p>'),
	(3, 1, 20, '2012-07-08 19:27:40', '<p>feefefefefeffgfgfbfbfb</p>');
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

-- Dumping data for table geocan.oms_codes: ~285 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.oms_registers: ~21 rows (approximately)
DELETE FROM `oms_registers`;
/*!40000 ALTER TABLE `oms_registers` DISABLE KEYS */;
INSERT INTO `oms_registers` (`id`, `patient_id`, `medic_id`, `address_part_id`, `address_lab_id`, `oms_code_id`, `estadio`, `fecha`) VALUES
	(2, '4fe3efc2-8788-4771-8328-11d47be0049b', 2, NULL, 2, 63, 0, '2012-06-22 00:00:00'),
	(3, '4feb92e1-de74-4680-9ba5-10e8c0a80164', 1, 3, 4, 50, 0, '2012-06-27 00:00:00'),
	(4, '4feb92e1-de74-4680-9ba5-10e8c0a80164', 2, 3, 4, 106, 0, '2012-06-27 00:00:00'),
	(5, '4feb9307-60e8-4384-b436-10e8c0a80164', 1, 5, 6, 67, 1, '2012-06-27 00:00:00'),
	(6, '4feb933c-36dc-4309-b7c8-10e8c0a80164', 1, 7, 8, 78, 0, '2012-06-27 00:00:00'),
	(7, '4feb933c-36dc-4309-b7c8-10e8c0a80164', 1, 7, 8, 173, 0, '2012-06-27 00:00:00'),
	(8, '4feb940c-657c-458b-bed9-10e8c0a80164', 1, 9, 10, 50, 0, '2012-06-27 00:00:00'),
	(9, '4feb940c-657c-458b-bed9-10e8c0a80164', 2, 9, 10, 138, 0, '2012-06-27 00:00:00'),
	(10, '4feb9422-3364-4746-8db7-10e8c0a80164', 1, 11, 12, 18, 1, '2012-06-27 00:00:00'),
	(11, '4feb9524-f774-4c06-88c5-10e8c0a80164', 1, 13, 14, 67, 0, '2012-06-27 00:00:00'),
	(12, '4feb9524-f774-4c06-88c5-10e8c0a80164', 1, 13, 14, 20, 0, '2012-06-27 00:00:00'),
	(13, '4feb9581-38b4-49cc-bfdd-10e8c0a80164', 1, 15, 16, 46, 0, '2012-06-27 00:00:00'),
	(14, '4feb9581-38b4-49cc-bfdd-10e8c0a80164', 1, 15, 16, 67, 0, '2012-06-27 00:00:00'),
	(15, '4feb95eb-109c-4503-9170-10e8c0a80164', 1, 17, 18, 80, 1, '2012-06-27 00:00:00'),
	(16, '4feb967b-a8cc-400c-8581-10e8c0a80164', 1, 19, 20, 30, 3, '2012-06-27 00:00:00'),
	(17, '4feb96ce-7a40-404d-b131-10e8c0a80164', 1, 21, 22, 219, 0, '2012-06-27 00:00:00'),
	(18, '4feb96ce-7a40-404d-b131-10e8c0a80164', 2, 21, 22, 154, 0, '2012-06-27 00:00:00'),
	(19, '4feba5aa-0dc4-4ef3-8084-10e8c0a80164', 1, NULL, NULL, 20, 0, '2012-06-27 00:00:00'),
	(20, '4fdfcc0a-d64c-42e0-9e2d-160c7be0049b', 1, 23, NULL, 64, 0, '2012-07-05 00:00:00'),
	(21, '50002c22-d4cc-4586-a7d6-08607be0049b', 1, 25, 26, 50, 0, '2012-07-13 00:00:00'),
	(22, '501158ba-885c-4a1b-8b70-08e07be0049b', 1, 27, NULL, 246, 0, '2012-07-26 00:00:00');
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
  PRIMARY KEY (`id`),
  KEY `FK_patient_address1` (`address_particular_id`),
  KEY `FK_patient_address2` (`address_laboral_id`),
  CONSTRAINT `FK_patient_address1` FOREIGN KEY (`address_particular_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `FK_patient_address2` FOREIGN KEY (`address_laboral_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.patients: ~15 rows (approximately)
DELETE FROM `patients`;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`id`, `iniciales`, `fecha_nacimiento`, `sexo`, `address_particular_id`, `address_laboral_id`, `nro_documento`, `created`, `modified`) VALUES
	('4fdfcc0a-d64c-42e0-9e2d-160c7be0049b', 'GHT2', '1984-02-14', 'M', 24, NULL, 'd62bce2760df0b171b2269de45884537a88be6ade7835de091b10c896433aac4', '2012-06-18 21:47:06', '2012-07-06 13:13:24'),
	('4fe3efc2-8788-4771-8328-11d47be0049b', 'GEO', '2001-01-11', 'M', NULL, 2, '14080a7bd5cba8e3ad8eb95245115622a325d01a99ee463163abc053a92dafaa', '2012-06-22 01:08:34', '2012-06-22 01:08:34'),
	('4feb92e1-de74-4680-9ba5-10e8c0a80164', 'SAM', '2012-04-02', 'M', 3, 4, 'a5cb5eb02820ab12dd1d70f777f4c283b2b526ce31e1c2be481fa54f9cbcd3b0', '2012-06-27 20:10:25', '2012-06-27 20:10:25'),
	('4feb9307-60e8-4384-b436-10e8c0a80164', '555', '1962-06-19', 'F', 5, 6, 'cdec4860f4ebbc8eed9a2e2f6eb4ee5275985134d78c4469ec542ecb3b77774a', '2012-06-27 20:11:03', '2012-06-27 20:11:03'),
	('4feb933c-36dc-4309-b7c8-10e8c0a80164', 'SPIN', '2002-06-27', 'M', 7, 8, '75990f478268b73281858131a82a8680e199d3e2e8479e7e4f2b077967721236', '2012-06-27 20:11:56', '2012-06-27 20:11:56'),
	('4feb940c-657c-458b-bed9-10e8c0a80164', 'DOS', '1992-06-27', 'M', 9, 10, 'ba4b4de236fe1a73f841d63c65d6bba688aa57615fdf03ff729bc6bb248fad8c', '2012-06-27 20:15:24', '2012-06-27 20:15:24'),
	('4feb9422-3364-4746-8db7-10e8c0a80164', '666', '1952-06-18', 'F', 11, 12, '2c2b21b1b668c06ae479516a1d12b6c77c1fe562c0f958693ef48ecb3bb6f47a', '2012-06-27 20:15:46', '2012-06-27 20:15:46'),
	('4feb9524-f774-4c06-88c5-10e8c0a80164', 'TRES', '1982-06-27', 'M', 13, 14, '9385b3ad1854d255920b0b22262c1eaecaac18a6ddc9ef4f46976bb73214c065', '2012-06-27 20:20:04', '2012-06-27 20:20:04'),
	('4feb9581-38b4-49cc-bfdd-10e8c0a80164', 'CUAT', '1972-06-27', 'M', 15, 16, '6ad56c4f317d256b49a7aa7d0dec42562a728dc0bc9547bc42da30aa04ae2576', '2012-06-27 20:21:37', '2012-06-27 20:21:37'),
	('4feb95eb-109c-4503-9170-10e8c0a80164', '777', '1942-06-09', 'F', 17, 18, 'd25f3f948eba0cb14688e0eb42996c46acaf66a72a33e6f349ce3bb0e40b2054', '2012-06-27 20:23:23', '2012-06-27 20:23:23'),
	('4feb967b-a8cc-400c-8581-10e8c0a80164', '888', '1932-06-19', 'M', 19, 20, 'c31d9bbb1d7ae71c8c07666bf93dfc4c8a264605c02dcad7c8de8c5008e16b6e', '2012-06-27 20:25:47', '2012-06-27 20:25:47'),
	('4feb96ce-7a40-404d-b131-10e8c0a80164', 'NUEV', '1922-06-27', 'M', 21, 22, '63d740f8e6e2b5ca1b9c582d6006c0c5a5f01d1253fff7e846f1b3c5bf094ac2', '2012-06-27 20:27:10', '2012-06-27 20:27:10'),
	('4feba5aa-0dc4-4ef3-8084-10e8c0a80164', 'PEPE', '1913-06-27', 'M', NULL, NULL, '67796106662c5d969e93c7a554943f9972f778cdd8509ec93ff2b885f53be420', '2012-06-27 21:30:34', '2012-06-27 21:30:34'),
	('50002c22-d4cc-4586-a7d6-08607be0049b', 'MUJ', '1997-02-12', 'F', 25, 26, '92a4de94262d6c828355ee88aefb749a6ad02fef54bb71df24b0539719331b8f', '2012-07-13 11:09:38', '2012-07-13 11:09:38'),
	('501158ba-885c-4a1b-8b70-08e07be0049b', '789', '1986-10-25', 'M', 27, NULL, '055901f4f08c9490af908a46de09234ec95abf1c44e16837c4a848635a7c6f25', '2012-07-26 11:48:26', '2012-07-26 11:48:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.questions: ~5 rows (approximately)
DELETE FROM `questions`;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `descripcion`, `visible`) VALUES
	(1, '¿Fuma?', 1),
	(2, '¿Bebe?', 1),
	(3, '¿Antecedentes de Cancer?', 1),
	(4, 'ACO/TRH', 1),
	(5, 'Invisible :P', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `medic_id`) VALUES
	(1, 'admin', '3784364f60b0989c0059deb3210dc30966a4ec6c', 1, '2012-08-15 10:55:05', '2012-08-15 10:55:05', NULL),
	(2, 'ayudante', '3784364f60b0989c0059deb3210dc30966a4ec6c', 3, '2012-08-15 10:55:18', '2012-08-15 10:55:18', NULL),
	(3, 'medico1', '3784364f60b0989c0059deb3210dc30966a4ec6c', 2, '2012-08-15 10:55:30', '2012-08-15 10:55:30', 1),
	(4, 'medico2', '3784364f60b0989c0059deb3210dc30966a4ec6c', 2, '2012-08-15 10:55:59', '2012-08-15 10:55:59', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;