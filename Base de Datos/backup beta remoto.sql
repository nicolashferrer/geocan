-- --------------------------------------------------------
-- Host:                         geocan.com.ar
-- Server version:               5.0.95 - Source distribution
-- Server OS:                    redhat-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-08-15 11:08:49
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
  `id` int(10) unsigned NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default '',
  `foreign_key` int(10) unsigned default NULL,
  `alias` varchar(255) default '',
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.acos: ~105 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 210),
	(2, 1, NULL, NULL, 'Addresses', 2, 17),
	(3, 2, NULL, NULL, 'index', 3, 4),
	(4, 2, NULL, NULL, 'view', 5, 6),
	(5, 2, NULL, NULL, 'add', 7, 8),
	(6, 2, NULL, NULL, 'edit', 9, 10),
	(7, 2, NULL, NULL, 'delete', 11, 12),
	(9, 1, NULL, NULL, 'Answers', 18, 29),
	(10, 9, NULL, NULL, 'index', 19, 20),
	(11, 9, NULL, NULL, 'view', 21, 22),
	(12, 9, NULL, NULL, 'add', 23, 24),
	(13, 9, NULL, NULL, 'edit', 25, 26),
	(14, 9, NULL, NULL, 'delete', 27, 28),
	(16, 1, NULL, NULL, 'Cities', 30, 45),
	(17, 16, NULL, NULL, 'index', 31, 32),
	(18, 16, NULL, NULL, 'view', 33, 34),
	(19, 16, NULL, NULL, 'add', 35, 36),
	(20, 16, NULL, NULL, 'edit', 37, 38),
	(21, 16, NULL, NULL, 'delete', 39, 40),
	(23, 1, NULL, NULL, 'Groups', 46, 59),
	(24, 23, NULL, NULL, 'index', 47, 48),
	(25, 23, NULL, NULL, 'view', 49, 50),
	(26, 23, NULL, NULL, 'add', 51, 52),
	(27, 23, NULL, NULL, 'edit', 53, 54),
	(28, 23, NULL, NULL, 'delete', 55, 56),
	(30, 1, NULL, NULL, 'MedicTypes', 60, 71),
	(31, 30, NULL, NULL, 'index', 61, 62),
	(32, 30, NULL, NULL, 'view', 63, 64),
	(33, 30, NULL, NULL, 'add', 65, 66),
	(34, 30, NULL, NULL, 'edit', 67, 68),
	(35, 30, NULL, NULL, 'delete', 69, 70),
	(37, 1, NULL, NULL, 'Medics', 72, 85),
	(38, 37, NULL, NULL, 'index', 73, 74),
	(39, 37, NULL, NULL, 'view', 75, 76),
	(40, 37, NULL, NULL, 'add', 77, 78),
	(41, 37, NULL, NULL, 'edit', 79, 80),
	(42, 37, NULL, NULL, 'delete', 81, 82),
	(44, 1, NULL, NULL, 'Notes', 86, 97),
	(45, 44, NULL, NULL, 'index', 87, 88),
	(46, 44, NULL, NULL, 'view', 89, 90),
	(47, 44, NULL, NULL, 'add', 91, 92),
	(48, 44, NULL, NULL, 'edit', 93, 94),
	(49, 44, NULL, NULL, 'delete', 95, 96),
	(51, 1, NULL, NULL, 'OmsCodes', 98, 115),
	(52, 51, NULL, NULL, 'index', 99, 100),
	(53, 51, NULL, NULL, 'view', 101, 102),
	(54, 51, NULL, NULL, 'add', 103, 104),
	(55, 51, NULL, NULL, 'edit', 105, 106),
	(56, 51, NULL, NULL, 'delete', 107, 108),
	(58, 1, NULL, NULL, 'OmsRegisters', 116, 129),
	(59, 58, NULL, NULL, 'index', 117, 118),
	(60, 58, NULL, NULL, 'view', 119, 120),
	(61, 58, NULL, NULL, 'add', 121, 122),
	(62, 58, NULL, NULL, 'edit', 123, 124),
	(63, 58, NULL, NULL, 'delete', 125, 126),
	(65, 1, NULL, NULL, 'Pages', 130, 133),
	(66, 65, NULL, NULL, 'display', 131, 132),
	(68, 1, NULL, NULL, 'Patients', 134, 153),
	(69, 68, NULL, NULL, 'index', 135, 136),
	(70, 68, NULL, NULL, 'view', 137, 138),
	(71, 68, NULL, NULL, 'add', 139, 140),
	(72, 68, NULL, NULL, 'edit', 141, 142),
	(73, 68, NULL, NULL, 'delete', 143, 144),
	(75, 1, NULL, NULL, 'Provinces', 154, 167),
	(76, 75, NULL, NULL, 'index', 155, 156),
	(77, 75, NULL, NULL, 'view', 157, 158),
	(78, 75, NULL, NULL, 'add', 159, 160),
	(79, 75, NULL, NULL, 'edit', 161, 162),
	(80, 75, NULL, NULL, 'delete', 163, 164),
	(82, 1, NULL, NULL, 'Questions', 168, 179),
	(83, 82, NULL, NULL, 'index', 169, 170),
	(84, 82, NULL, NULL, 'view', 171, 172),
	(85, 82, NULL, NULL, 'add', 173, 174),
	(86, 82, NULL, NULL, 'edit', 175, 176),
	(87, 82, NULL, NULL, 'delete', 177, 178),
	(89, 1, NULL, NULL, 'Users', 180, 205),
	(90, 89, NULL, NULL, 'index', 181, 182),
	(91, 89, NULL, NULL, 'view', 183, 184),
	(92, 89, NULL, NULL, 'add', 185, 186),
	(93, 89, NULL, NULL, 'edit', 187, 188),
	(94, 89, NULL, NULL, 'delete', 189, 190),
	(95, 89, NULL, NULL, 'login', 191, 192),
	(96, 89, NULL, NULL, 'logout', 193, 194),
	(98, 1, NULL, NULL, 'AclExtras', 206, 207),
	(99, 16, NULL, NULL, 'getCiudades', 41, 42),
	(100, 23, NULL, NULL, 'build_acl', 57, 58),
	(101, 51, NULL, NULL, 'getSigNivel', 109, 110),
	(102, 51, NULL, NULL, 'help', 111, 112),
	(103, 89, NULL, NULL, 'initDB', 195, 196),
	(105, 51, NULL, NULL, 'sugerencias', 113, 114),
	(106, 68, NULL, NULL, 'search', 145, 146),
	(107, 68, NULL, NULL, 'result', 147, 148),
	(108, 68, NULL, NULL, 'editAnswers', 149, 150),
	(109, 68, NULL, NULL, 'recuperarPaciente', 151, 152),
	(110, 89, NULL, NULL, 'editPassword', 197, 198),
	(111, 89, NULL, NULL, 'resetPassword', 199, 200),
	(112, 2, NULL, NULL, 'reporte', 13, 14),
	(113, 58, NULL, NULL, 'checkDelete', 127, 128),
	(114, 2, NULL, NULL, 'reporteBusqueda', 15, 16),
	(115, 16, NULL, NULL, 'checkDelete', 43, 44),
	(116, 37, NULL, NULL, 'checkDelete', 83, 84),
	(117, 75, NULL, NULL, 'checkDelete', 165, 166),
	(118, 89, NULL, NULL, 'captcha', 201, 202),
	(119, 89, NULL, NULL, 'reload_captcha', 203, 204),
	(120, 1, NULL, NULL, 'AuditLog', 208, 209);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;


-- Dumping structure for table geocan.addresses
DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `city_id` int(10) unsigned NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `direccion` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_address_city` (`city_id`),
  CONSTRAINT `FK_address_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.addresses: ~39 rows (approximately)
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
	(25, 1, -38.7216724, -62.2504233, 'Corrientes 900'),
	(26, 1, -38.7269828, -62.2728646, 'Santa Fe 200'),
	(27, 1, -38.7216724, -62.2504233, 'Corrientes 900'),
	(28, 1, -38.7269828, -62.2728646, 'Santa Fe 200'),
	(29, 1, -38.7088413, -62.2919919, 'Terrada 1700'),
	(30, 1, -38.720112, -62.2727929, 'Castelli 200'),
	(31, 1, -38.7269339, -62.2900528, 'Patricios 1500'),
	(32, 1, -38.7515675, -62.2680855, 'México 2000'),
	(33, 1, -38.7251549, -62.2575188, 'Palau'),
	(34, 1, -38.7110278, -62.2781204, 'Estomba 900'),
	(35, 1, -38.6827927, -62.3398743, 'Lucía Miranda'),
	(36, 1, -38.7110278, -62.2781204, 'Estomba 900'),
	(37, 1, -38.7161821, -62.2658427, 'Zelarrayán 100'),
	(38, 1, -38.716745, -62.2817979, 'Juan Molina 500'),
	(39, 1, -38.711487, -62.275356, 'Estomba 800'),
	(40, 1, -38.7201629, -62.2817329, 'Patricios 700'),
	(41, 1, -38.7150989, -62.3053516, 'Líbano 2500');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;


-- Dumping structure for table geocan.answers
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `patient_id` char(36) NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `valor` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_respuesta_paciente` USING BTREE (`patient_id`),
  KEY `FK_answer_question` (`question_id`),
  CONSTRAINT `FK_answer_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  CONSTRAINT `FK_answer_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.answers: ~68 rows (approximately)
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
	(35, '4ffa4567-e1ec-4c84-a9d7-449a5dbd255d', 1, 1),
	(36, '4ffa4567-e1ec-4c84-a9d7-449a5dbd255d', 2, 0),
	(37, '4ffa4567-e1ec-4c84-a9d7-449a5dbd255d', 3, 0),
	(38, '4ffa459b-93b4-4bf9-afef-44e95dbd255d', 1, 1),
	(39, '4ffa459b-93b4-4bf9-afef-44e95dbd255d', 2, 0),
	(40, '4ffa459b-93b4-4bf9-afef-44e95dbd255d', 3, 0),
	(41, '4ffb87d2-f174-459d-8a58-07305dbd255d', 1, 1),
	(42, '4ffb87d2-f174-459d-8a58-07305dbd255d', 2, 1),
	(43, '4ffb87d2-f174-459d-8a58-07305dbd255d', 3, 0),
	(44, '4ffb87d2-f174-459d-8a58-07305dbd255d', 4, 0),
	(45, '4ffb97f4-ded0-42a0-99ed-7f075dbd255d', 1, 0),
	(46, '4ffb97f4-ded0-42a0-99ed-7f075dbd255d', 2, 0),
	(47, '4ffb97f4-ded0-42a0-99ed-7f075dbd255d', 3, 0),
	(48, '4ffb97f4-ded0-42a0-99ed-7f075dbd255d', 4, 0),
	(49, '4ffbb445-47c4-4c4c-a323-11ce5dbd255d', 1, 1),
	(50, '4ffbb445-47c4-4c4c-a323-11ce5dbd255d', 2, 1),
	(51, '4ffbb445-47c4-4c4c-a323-11ce5dbd255d', 3, 1),
	(52, '4ffbb445-47c4-4c4c-a323-11ce5dbd255d', 4, 0),
	(53, '4ffbb585-e894-40dc-8732-11cd5dbd255d', 1, 1),
	(54, '4ffbb585-e894-40dc-8732-11cd5dbd255d', 2, 1),
	(55, '4ffbb585-e894-40dc-8732-11cd5dbd255d', 3, 1),
	(56, '4ffbb585-e894-40dc-8732-11cd5dbd255d', 4, 1),
	(57, '4ffe6eb6-b044-44ed-908d-2f245dbd255d', 1, 1),
	(58, '4ffe6eb6-b044-44ed-908d-2f245dbd255d', 2, 0),
	(59, '4ffe6eb6-b044-44ed-908d-2f245dbd255d', 3, 1),
	(60, '4ffe6eb6-b044-44ed-908d-2f245dbd255d', 4, 0),
	(61, '4fff1040-687c-452a-ba5c-638f5dbd255d', 1, 1),
	(62, '4fff1040-687c-452a-ba5c-638f5dbd255d', 2, 1),
	(63, '4fff1040-687c-452a-ba5c-638f5dbd255d', 3, 0),
	(64, '4fff1040-687c-452a-ba5c-638f5dbd255d', 4, 0),
	(65, '4fff8873-2678-45d4-9905-7f6b5dbd255d', 1, 1),
	(66, '4fff8873-2678-45d4-9905-7f6b5dbd255d', 2, 1),
	(67, '4fff8873-2678-45d4-9905-7f6b5dbd255d', 3, 1),
	(68, '50009fa3-39f4-4d6a-870e-471f5dbd255d', 1, 1);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;


-- Dumping structure for table geocan.aros
DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default '',
  `foreign_key` int(10) unsigned default NULL,
  `alias` varchar(255) default '',
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros: ~8 rows (approximately)
DELETE FROM `aros`;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, 'Group', 1, '', 1, 6),
	(2, NULL, 'Group', 2, '', 7, 10),
	(3, 1, 'User', 1, '', 2, 3),
	(4, NULL, 'Group', 3, '', 11, 16),
	(5, 2, 'User', 2, '', 8, 9),
	(6, 1, 'User', 3, '', 4, 5),
	(7, 4, 'User', 4, '', 12, 13),
	(8, 4, 'User', 12, '', 14, 15);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;


-- Dumping structure for table geocan.aros_acos
DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL default '0',
  `_read` char(2) NOT NULL default '0',
  `_update` char(2) NOT NULL default '0',
  `_delete` char(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros_acos: ~91 rows (approximately)
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
	(15, 4, 1, '-1', '-1', '-1', '-1'),
	(16, 2, 106, '1', '1', '1', '1'),
	(17, 2, 108, '1', '1', '1', '1'),
	(18, 2, 60, '1', '1', '1', '1'),
	(19, 2, 99, '1', '1', '1', '1'),
	(20, 2, 18, '1', '1', '1', '1'),
	(21, 2, 77, '1', '1', '1', '1'),
	(22, 2, 101, '1', '1', '1', '1'),
	(23, 2, 105, '1', '1', '1', '1'),
	(24, 2, 102, '1', '1', '1', '1'),
	(25, 2, 109, '1', '1', '1', '1'),
	(26, 2, 95, '1', '1', '1', '1'),
	(27, 2, 96, '1', '1', '1', '1'),
	(28, 4, 95, '1', '1', '1', '1'),
	(29, 4, 96, '1', '1', '1', '1'),
	(30, 4, 25, '1', '1', '1', '1'),
	(31, 4, 71, '1', '1', '1', '1'),
	(32, 4, 72, '1', '1', '1', '1'),
	(33, 4, 70, '1', '1', '1', '1'),
	(34, 4, 106, '1', '1', '1', '1'),
	(35, 4, 109, '1', '1', '1', '1'),
	(36, 4, 108, '1', '1', '1', '1'),
	(37, 4, 61, '1', '1', '1', '1'),
	(38, 4, 62, '1', '1', '1', '1'),
	(39, 4, 60, '1', '1', '1', '1'),
	(40, 4, 101, '1', '1', '1', '1'),
	(41, 4, 105, '1', '1', '1', '1'),
	(42, 4, 102, '1', '1', '1', '1'),
	(43, 4, 53, '1', '1', '1', '1'),
	(44, 4, 5, '1', '1', '1', '1'),
	(45, 4, 4, '1', '1', '1', '1'),
	(46, 4, 6, '1', '1', '1', '1'),
	(47, 4, 7, '1', '1', '1', '1'),
	(48, 4, 47, '1', '1', '1', '1'),
	(49, 4, 48, '1', '1', '1', '1'),
	(50, 4, 49, '1', '1', '1', '1'),
	(51, 4, 46, '1', '1', '1', '1'),
	(52, 4, 12, '1', '1', '1', '1'),
	(53, 4, 13, '1', '1', '1', '1'),
	(54, 4, 11, '1', '1', '1', '1'),
	(55, 4, 99, '1', '1', '1', '1'),
	(56, 4, 19, '1', '1', '1', '1'),
	(57, 4, 18, '1', '1', '1', '1'),
	(58, 4, 20, '1', '1', '1', '1'),
	(59, 4, 77, '1', '1', '1', '1'),
	(60, 2, 110, '1', '1', '1', '1'),
	(61, 2, 91, '1', '1', '1', '1'),
	(62, 2, 25, '1', '1', '1', '1'),
	(63, 2, 112, '1', '1', '1', '1'),
	(64, 2, 4, '1', '1', '1', '1'),
	(65, 2, 49, '1', '1', '1', '1'),
	(66, 2, 46, '1', '1', '1', '1'),
	(67, 2, 39, '1', '1', '1', '1'),
	(68, 2, 84, '1', '1', '1', '1'),
	(69, 2, 11, '1', '1', '1', '1'),
	(70, 2, 63, '1', '1', '1', '1'),
	(71, 2, 53, '1', '1', '1', '1'),
	(72, 4, 110, '1', '1', '1', '1'),
	(73, 4, 91, '1', '1', '1', '1'),
	(74, 4, 63, '1', '1', '1', '1'),
	(75, 4, 112, '1', '1', '1', '1'),
	(76, 4, 85, '1', '1', '1', '1'),
	(77, 4, 86, '1', '1', '1', '1'),
	(78, 4, 84, '1', '1', '1', '1'),
	(79, 4, 14, '1', '1', '1', '1'),
	(80, 4, 21, '1', '1', '1', '1'),
	(81, 4, 39, '1', '1', '1', '1'),
	(82, 2, 90, '1', '1', '1', '1'),
	(83, 4, 90, '1', '1', '1', '1'),
	(84, 2, 24, '1', '1', '1', '1'),
	(85, 2, 32, '1', '1', '1', '1'),
	(86, 4, 24, '1', '1', '1', '1'),
	(87, 4, 32, '1', '1', '1', '1'),
	(88, 2, 31, '1', '1', '1', '1'),
	(89, 4, 31, '1', '1', '1', '1'),
	(90, 2, 114, '1', '1', '1', '1'),
	(91, 4, 114, '1', '1', '1', '1');
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
  `source_id` varchar(255) default NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.audits: ~13 rows (approximately)
DELETE FROM `audits`;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` (`id`, `event`, `model`, `entity_id`, `json_object`, `description`, `source_id`, `created`) VALUES
	('4ff9fecb-b454-4e59-a848-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 18:42:35","medic_id":null}}', NULL, '1', '2012-07-08 18:42:35'),
	('4ff9ff10-f170-4e7f-8a59-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 18:43:44","medic_id":"1"}}', NULL, '1', '2012-07-08 18:43:44'),
	('4ff9ff23-cd2c-4a5e-b8d3-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 18:44:03","medic_id":null}}', NULL, '1', '2012-07-08 18:44:03'),
	('4ff9ff2d-87a8-45ee-aea5-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 18:44:13","medic_id":"2"}}', NULL, '1', '2012-07-08 18:44:13'),
	('4ff9ff58-49b4-45b6-a109-0ce47be0049b', 'EDIT', 'User', '4', '{"User":{"id":"4","username":"ayudanteb","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-07-05 16:16:39","modified":"2012-07-08 18:44:56","medic_id":"1"}}', NULL, '1', '2012-07-08 18:44:56'),
	('4ffa0045-6aa4-4071-8343-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 18:48:53","medic_id":null}}', NULL, '1', '2012-07-08 18:48:53'),
	('4ffa004a-09cc-4d75-ba17-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 18:48:58","medic_id":"1"}}', NULL, '1', '2012-07-08 18:48:58'),
	('4ffa0498-e17c-4920-b54f-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 19:07:20","medic_id":null}}', NULL, '1', '2012-07-08 19:07:21'),
	('4ffa049d-d888-4952-99f3-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 19:07:25","medic_id":"1"}}', NULL, '1', '2012-07-08 19:07:25'),
	('4ffa050d-4910-4f25-9842-0ce47be0049b', 'EDIT', 'User', '1', '{"User":{"id":"1","username":"admin","password":"a0f76f8adbe4a2b8ce42d1c33913b0cd27d28bf0","group_id":"1","created":"2012-04-13 22:24:30","modified":"2012-07-08 19:09:17","medic_id":"1"}}', NULL, '1', '2012-07-08 19:09:17'),
	('4ffa090d-e6f8-4ea4-9e43-0ce47be0049b', 'CREATE', 'Note', '1', '{"Note":{"id":"1","medic_id":"1","oms_register_id":"20","fecha":"2012-07-08 19:26:21","descripcion":"<p>feefefefefef<\\/p>"}}', NULL, '1', '2012-07-08 19:26:21'),
	('4ffa093a-9e78-42b0-b53a-0ce47be0049b', 'CREATE', 'Note', '2', '{"Note":{"id":"2","medic_id":"1","oms_register_id":"20","fecha":"2012-07-08 19:27:06","descripcion":"<p>feefefefefeffgfg<\\/p>"}}', NULL, '1', '2012-07-08 19:27:06'),
	('4ffa095c-21a4-4089-8426-0ce47be0049b', 'CREATE', 'Note', '3', '{"Note":{"id":"3","medic_id":"1","oms_register_id":"20","fecha":"2012-07-08 19:27:40","descripcion":"<p>feefefefefeffgfgfbfbfb<\\/p>"}}', NULL, '1', '2012-07-08 19:27:40'),
	('4ffa1084-b180-48a4-853a-0ce47be0049b', 'EDIT', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"a928fe3036545575c4efe802e7f389e686468431","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 19:58:12","medic_id":"1"}}', NULL, '3', '2012-07-08 19:58:12'),
	('4ffa3cdc-e7ec-43d5-baaa-40555dbd255d', 'DELETE', 'User', '2', '{"User":{"id":"2","username":"medico","password":"a928fe3036545575c4efe802e7f389e686468431","group_id":"2","created":"2012-04-26 21:05:10","modified":"2012-07-05 16:15:36","medic_id":"2"}}', NULL, '1', '2012-07-08 23:07:24'),
	('4ffa3ce0-8b00-4290-927e-40545dbd255d', 'DELETE', 'User', '3', '{"User":{"id":"3","username":"UsuarioX","password":"a928fe3036545575c4efe802e7f389e686468431","group_id":"1","created":"2012-06-03 20:27:08","modified":"2012-07-08 19:58:12","medic_id":"1"}}', NULL, '1', '2012-07-08 23:07:28'),
	('4ffa3ce4-2fe0-49c0-b310-41075dbd255d', 'DELETE', 'User', '4', '{"User":{"id":"4","username":"ayudante","password":"a928fe3036545575c4efe802e7f389e686468431","group_id":"3","created":"2012-07-05 16:16:39","modified":"2012-07-08 18:44:56","medic_id":"1"}}', NULL, '1', '2012-07-08 23:07:32'),
	('4ffa3d0d-c48c-442d-926d-40545dbd255d', 'CREATE', 'User', '5', '{"User":{"id":"5","username":"ayudante1","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-07-08 23:08:13","modified":"2012-07-08 23:08:13","medic_id":null}}', NULL, '1', '2012-07-08 23:08:13'),
	('4ffa3d24-4398-4a32-a8c7-40a45dbd255d', 'CREATE', 'User', '6', '{"User":{"id":"6","username":"ayudante2","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-07-08 23:08:36","modified":"2012-07-08 23:08:36","medic_id":null}}', NULL, '1', '2012-07-08 23:08:36'),
	('4ffa3d3a-126c-4abf-89df-40a45dbd255d', 'CREATE', 'User', '7', '{"User":{"id":"7","username":"ayudante3","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-07-08 23:08:58","modified":"2012-07-08 23:08:58","medic_id":null}}', NULL, '1', '2012-07-08 23:08:58'),
	('4ffa3d54-b778-4bfb-826c-40545dbd255d', 'CREATE', 'User', '8', '{"User":{"id":"8","username":"ayudante4","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-07-08 23:09:24","modified":"2012-07-08 23:09:24","medic_id":null}}', NULL, '1', '2012-07-08 23:09:24'),
	('4ffa3d81-c6cc-4f5b-b3f3-40a45dbd255d', 'CREATE', 'User', '9', '{"User":{"id":"9","username":"ayudante5","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-07-08 23:10:09","modified":"2012-07-08 23:10:09","medic_id":null}}', NULL, '1', '2012-07-08 23:10:09'),
	('4ffa3daf-6940-4387-8af0-41075dbd255d', 'CREATE', 'User', '10', '{"User":{"id":"10","username":"medico1","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"2","created":"2012-07-08 23:10:55","modified":"2012-07-08 23:10:55","medic_id":"1"}}', NULL, '1', '2012-07-08 23:10:55'),
	('4ffa3dc1-712c-41c8-8060-42605dbd255d', 'CREATE', 'User', '11', '{"User":{"id":"11","username":"medico2","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"2","created":"2012-07-08 23:11:13","modified":"2012-07-08 23:11:13","medic_id":"2"}}', NULL, '1', '2012-07-08 23:11:13'),
	('4ffa3e18-8e04-4526-b519-42575dbd255d', 'EDIT', 'User', '5', '{"User":{"id":"5","username":"ayudante1","password":"aa0119e124cd472e85951bf78834a3af608b529a","group_id":"3","created":"2012-07-08 23:08:13","modified":"2012-07-08 23:12:40","medic_id":null}}', NULL, '5', '2012-07-08 23:12:40'),
	('4ffa4567-4438-4d3d-8ec4-449a5dbd255d', 'CREATE', 'Answer', '36', '{"Answer":{"id":"36","patient_id":"4ffa4567-e1ec-4c84-a9d7-449a5dbd255d","question_id":"2","valor":false}}', NULL, '5', '2012-07-08 23:43:51'),
	('4ffa4567-50a0-41e6-a00a-449a5dbd255d', 'CREATE', 'Answer', '37', '{"Answer":{"id":"37","patient_id":"4ffa4567-e1ec-4c84-a9d7-449a5dbd255d","question_id":"3","valor":false}}', NULL, '5', '2012-07-08 23:43:51'),
	('4ffa4567-874c-42d7-bad3-449a5dbd255d', 'CREATE', 'Patient', '4ffa4567-e1ec-4c84-a9d7-449a5dbd255d', '{"Patient":{"id":"4ffa4567-e1ec-4c84-a9d7-449a5dbd255d","iniciales":"M.G","fecha_nacimiento":"04\\/02\\/1959","sexo":"M","address_particular_id":"25","address_laboral_id":"26","nro_documento":"9603cf69ec38e7fd978a254d745a8af74ca03a39e701706ccd651208eefbb037","created":"2012-07-08 23:43:51","modified":"2012-07-08 23:43:51","edad":"53"}}', NULL, '5', '2012-07-08 23:43:51'),
	('4ffa4567-cd88-4a8a-9340-449a5dbd255d', 'CREATE', 'Secondary', '26', '{"Secondary":{"id":"26","city_id":"1","latitud":"-38.7269828","longitud":"-62.2728646","direccion":"Santa Fe 200"}}', NULL, '5', '2012-07-08 23:43:51'),
	('4ffa4567-e254-455f-9f6d-449a5dbd255d', 'CREATE', 'Primary', '25', '{"Primary":{"id":"25","city_id":"1","latitud":"-38.7216724","longitud":"-62.2504233","direccion":"Corrientes 900"}}', NULL, '5', '2012-07-08 23:43:51'),
	('4ffa4567-f75c-4b3f-923c-449a5dbd255d', 'CREATE', 'Answer', '35', '{"Answer":{"id":"35","patient_id":"4ffa4567-e1ec-4c84-a9d7-449a5dbd255d","question_id":"1","valor":true}}', NULL, '5', '2012-07-08 23:43:51'),
	('4ffa459b-22d8-41c2-915f-44e95dbd255d', 'CREATE', 'Secondary', '28', '{"Secondary":{"id":"28","city_id":"1","latitud":"-38.7269828","longitud":"-62.2728646","direccion":"Santa Fe 200"}}', NULL, '5', '2012-07-08 23:44:43'),
	('4ffa459b-6904-495e-b7ce-44e95dbd255d', 'CREATE', 'Patient', '4ffa459b-93b4-4bf9-afef-44e95dbd255d', '{"Patient":{"id":"4ffa459b-93b4-4bf9-afef-44e95dbd255d","iniciales":"M.G","fecha_nacimiento":"04\\/02\\/1959","sexo":"M","address_particular_id":"27","address_laboral_id":"28","nro_documento":"86d2627917b3984d27d9bf8ea8fe37b6ac5d81fc5cedbdb17980dd4e3223b206","created":"2012-07-08 23:44:43","modified":"2012-07-08 23:44:43","edad":"53"}}', NULL, '5', '2012-07-08 23:44:43'),
	('4ffa459b-a0dc-4f2e-b284-44e95dbd255d', 'CREATE', 'Answer', '38', '{"Answer":{"id":"38","patient_id":"4ffa459b-93b4-4bf9-afef-44e95dbd255d","question_id":"1","valor":true}}', NULL, '5', '2012-07-08 23:44:43'),
	('4ffa459b-d1e8-4ebd-8390-44e95dbd255d', 'CREATE', 'Primary', '27', '{"Primary":{"id":"27","city_id":"1","latitud":"-38.7216724","longitud":"-62.2504233","direccion":"Corrientes 900"}}', NULL, '5', '2012-07-08 23:44:43'),
	('4ffa459c-2f18-47e0-b365-44e95dbd255d', 'CREATE', 'Answer', '39', '{"Answer":{"id":"39","patient_id":"4ffa459b-93b4-4bf9-afef-44e95dbd255d","question_id":"2","valor":false}}', NULL, '5', '2012-07-08 23:44:44'),
	('4ffa459c-5868-4f11-8d24-44e95dbd255d', 'CREATE', 'Answer', '40', '{"Answer":{"id":"40","patient_id":"4ffa459b-93b4-4bf9-afef-44e95dbd255d","question_id":"3","valor":false}}', NULL, '5', '2012-07-08 23:44:44'),
	('4ffa50f1-97d8-4817-bb02-4aa15dbd255d', 'EDIT', 'Patient', '4fdfcc0a-d64c-42e0-9e2d-160c7be0049b', '{"Patient":{"id":"4fdfcc0a-d64c-42e0-9e2d-160c7be0049b","iniciales":"GHT2","fecha_nacimiento":"14\\/02\\/1984","sexo":"M","address_particular_id":"29","address_laboral_id":null,"nro_documento":"d62bce2760df0b171b2269de45884537a88be6ade7835de091b10c896433aac4","created":"2012-06-18 21:47:06","modified":"2012-07-09 00:33:05","edad":"28"}}', NULL, '5', '2012-07-09 00:33:05'),
	('4ffa50f1-aca8-4562-b5a9-4aa15dbd255d', 'CREATE', 'Primary', '29', '{"Primary":{"id":"29","city_id":"1","latitud":"-38.7088413","longitud":"-62.2919919","direccion":"Terrada 1700"}}', NULL, '5', '2012-07-09 00:33:05'),
	('4ffa50f1-e7c8-437b-a927-4aa15dbd255d', 'DELETE', 'Address', '24', '{"Address":{"id":"24","city_id":"1","latitud":"-38.7152399","longitud":"-62.2647057","direccion":"Mitre 100"}}', NULL, '5', '2012-07-09 00:33:05'),
	('4ffb5292-a04c-4a46-b8d5-7ad55dbd255d', 'CREATE', 'Question', '5', '{"Question":{"id":"5","descripcion":"se rasca?","visible":true}}', NULL, '1', '2012-07-09 18:52:18'),
	('4ffb52aa-3d24-407d-807e-750e5dbd255d', 'DELETE', 'Question', '5', '{"Question":{"id":"5","descripcion":"se rasca?","visible":true}}', NULL, '1', '2012-07-09 18:52:42'),
	('4ffb87d2-2e50-46bb-813e-07305dbd255d', 'CREATE', 'Patient', '4ffb87d2-f174-459d-8a58-07305dbd255d', '{"Patient":{"id":"4ffb87d2-f174-459d-8a58-07305dbd255d","iniciales":"kj","fecha_nacimiento":"09\\/07\\/2012","sexo":"M","address_particular_id":"30","address_laboral_id":null,"nro_documento":"2aee51172a1e75dde6b55a99b162654e760b60cf727a7905254ffe1b1876b177","created":"2012-07-09 22:39:30","modified":"2012-07-09 22:39:30","edad":"0"}}', NULL, '9', '2012-07-09 22:39:30'),
	('4ffb87d2-535c-491d-9a11-07305dbd255d', 'CREATE', 'Answer', '44', '{"Answer":{"id":"44","patient_id":"4ffb87d2-f174-459d-8a58-07305dbd255d","question_id":"4","valor":false}}', NULL, '9', '2012-07-09 22:39:30'),
	('4ffb87d2-6128-49bb-8437-07305dbd255d', 'CREATE', 'Answer', '43', '{"Answer":{"id":"43","patient_id":"4ffb87d2-f174-459d-8a58-07305dbd255d","question_id":"3","valor":false}}', NULL, '9', '2012-07-09 22:39:30'),
	('4ffb87d2-7528-405b-a191-07305dbd255d', 'CREATE', 'Primary', '30', '{"Primary":{"id":"30","city_id":"1","latitud":"-38.720112","longitud":"-62.2727929","direccion":"Castelli 200"}}', NULL, '9', '2012-07-09 22:39:30'),
	('4ffb87d2-ada4-4185-a181-07305dbd255d', 'CREATE', 'Answer', '42', '{"Answer":{"id":"42","patient_id":"4ffb87d2-f174-459d-8a58-07305dbd255d","question_id":"2","valor":true}}', NULL, '9', '2012-07-09 22:39:30'),
	('4ffb87d2-fcdc-42f0-a59b-07305dbd255d', 'CREATE', 'Answer', '41', '{"Answer":{"id":"41","patient_id":"4ffb87d2-f174-459d-8a58-07305dbd255d","question_id":"1","valor":true}}', NULL, '9', '2012-07-09 22:39:30'),
	('4ffb97f4-1510-4827-905f-7f075dbd255d', 'CREATE', 'Primary', '31', '{"Primary":{"id":"31","city_id":"1","latitud":"-38.7269339","longitud":"-62.2900528","direccion":"Patricios 1500"}}', NULL, '5', '2012-07-09 23:48:20'),
	('4ffb97f4-27d8-46bd-852c-7f075dbd255d', 'CREATE', 'Answer', '48', '{"Answer":{"id":"48","patient_id":"4ffb97f4-ded0-42a0-99ed-7f075dbd255d","question_id":"4","valor":true}}', NULL, '5', '2012-07-09 23:48:20'),
	('4ffb97f4-9718-44ef-8674-7f075dbd255d', 'CREATE', 'Answer', '47', '{"Answer":{"id":"47","patient_id":"4ffb97f4-ded0-42a0-99ed-7f075dbd255d","question_id":"3","valor":false}}', NULL, '5', '2012-07-09 23:48:20'),
	('4ffb97f4-ad48-4fc4-bff4-7f075dbd255d', 'CREATE', 'Answer', '46', '{"Answer":{"id":"46","patient_id":"4ffb97f4-ded0-42a0-99ed-7f075dbd255d","question_id":"2","valor":false}}', NULL, '5', '2012-07-09 23:48:20'),
	('4ffb97f4-dc14-42ff-a0e5-7f075dbd255d', 'CREATE', 'Answer', '45', '{"Answer":{"id":"45","patient_id":"4ffb97f4-ded0-42a0-99ed-7f075dbd255d","question_id":"1","valor":false}}', NULL, '5', '2012-07-09 23:48:20'),
	('4ffb97f4-e644-4313-9089-7f075dbd255d', 'CREATE', 'Secondary', '32', '{"Secondary":{"id":"32","city_id":"1","latitud":"-38.7515675","longitud":"-62.2680855","direccion":"M\\u00e9xico 2000"}}', NULL, '5', '2012-07-09 23:48:20'),
	('4ffb97f4-e86c-48a8-b132-7f075dbd255d', 'CREATE', 'Patient', '4ffb97f4-ded0-42a0-99ed-7f075dbd255d', '{"Patient":{"id":"4ffb97f4-ded0-42a0-99ed-7f075dbd255d","iniciales":"MF","fecha_nacimiento":"05\\/08\\/1954","sexo":"M","address_particular_id":"31","address_laboral_id":"32","nro_documento":"8e0c9c2fb0a4be216bbf581741604b436b10f20eace22fe66132b11016253ae6","created":"2012-07-09 23:48:20","modified":"2012-07-09 23:48:20","edad":"57"}}', NULL, '5', '2012-07-09 23:48:20'),
	('4ffb980e-7c80-4e60-a670-098b5dbd255d', 'EDIT', 'Answer', '48', '{"Answer":{"id":"48","patient_id":"4ffb97f4-ded0-42a0-99ed-7f075dbd255d","question_id":"4","valor":false}}', NULL, '5', '2012-07-09 23:48:46'),
	('4ffbb445-0560-41fa-a9fe-11ce5dbd255d', 'CREATE', 'Primary', '33', '{"Primary":{"id":"33","city_id":"1","latitud":"-38.7251549","longitud":"-62.2575188","direccion":"Palau"}}', NULL, '5', '2012-07-10 01:49:09'),
	('4ffbb445-1de4-48db-ae1a-11ce5dbd255d', 'CREATE', 'Secondary', '34', '{"Secondary":{"id":"34","city_id":"1","latitud":"-38.7110278","longitud":"-62.2781204","direccion":"Estomba 900"}}', NULL, '5', '2012-07-10 01:49:09'),
	('4ffbb445-1ef4-494e-af67-11ce5dbd255d', 'CREATE', 'Answer', '49', '{"Answer":{"id":"49","patient_id":"4ffbb445-47c4-4c4c-a323-11ce5dbd255d","question_id":"1","valor":true}}', NULL, '5', '2012-07-10 01:49:09'),
	('4ffbb445-3314-4dd5-b005-11ce5dbd255d', 'CREATE', 'Answer', '51', '{"Answer":{"id":"51","patient_id":"4ffbb445-47c4-4c4c-a323-11ce5dbd255d","question_id":"3","valor":true}}', NULL, '5', '2012-07-10 01:49:09'),
	('4ffbb445-3714-4871-8b5e-11ce5dbd255d', 'CREATE', 'Answer', '50', '{"Answer":{"id":"50","patient_id":"4ffbb445-47c4-4c4c-a323-11ce5dbd255d","question_id":"2","valor":true}}', NULL, '5', '2012-07-10 01:49:09'),
	('4ffbb445-9c10-4413-84ac-11ce5dbd255d', 'CREATE', 'Answer', '52', '{"Answer":{"id":"52","patient_id":"4ffbb445-47c4-4c4c-a323-11ce5dbd255d","question_id":"4","valor":false}}', NULL, '5', '2012-07-10 01:49:09'),
	('4ffbb445-ea04-49bc-9f92-11ce5dbd255d', 'CREATE', 'Patient', '4ffbb445-47c4-4c4c-a323-11ce5dbd255d', '{"Patient":{"id":"4ffbb445-47c4-4c4c-a323-11ce5dbd255d","iniciales":"abc","fecha_nacimiento":"24\\/07\\/1968","sexo":"F","address_particular_id":"33","address_laboral_id":"34","nro_documento":"4f7b966d295fb3504f641f971e5831d5a5f3dd30dd321ca816495c6df7c73079","created":"2012-07-10 01:49:09","modified":"2012-07-10 01:49:09","edad":"43"}}', NULL, '5', '2012-07-10 01:49:09'),
	('4ffbb585-09e0-4c08-a34c-11cd5dbd255d', 'CREATE', 'Answer', '53', '{"Answer":{"id":"53","patient_id":"4ffbb585-e894-40dc-8732-11cd5dbd255d","question_id":"1","valor":true}}', NULL, '5', '2012-07-10 01:54:29'),
	('4ffbb585-1648-4c96-9440-11cd5dbd255d', 'CREATE', 'Answer', '54', '{"Answer":{"id":"54","patient_id":"4ffbb585-e894-40dc-8732-11cd5dbd255d","question_id":"2","valor":true}}', NULL, '5', '2012-07-10 01:54:29'),
	('4ffbb585-1950-46d3-9cde-11cd5dbd255d', 'CREATE', 'Answer', '55', '{"Answer":{"id":"55","patient_id":"4ffbb585-e894-40dc-8732-11cd5dbd255d","question_id":"3","valor":true}}', NULL, '5', '2012-07-10 01:54:29'),
	('4ffbb585-33c8-4b33-ae08-11cd5dbd255d', 'CREATE', 'Answer', '56', '{"Answer":{"id":"56","patient_id":"4ffbb585-e894-40dc-8732-11cd5dbd255d","question_id":"4","valor":true}}', NULL, '5', '2012-07-10 01:54:29'),
	('4ffbb585-9e48-4858-96bd-11cd5dbd255d', 'CREATE', 'Secondary', '36', '{"Secondary":{"id":"36","city_id":"1","latitud":"-38.7110278","longitud":"-62.2781204","direccion":"Estomba 900"}}', NULL, '5', '2012-07-10 01:54:29'),
	('4ffbb585-e0a8-4018-9439-11cd5dbd255d', 'CREATE', 'Patient', '4ffbb585-e894-40dc-8732-11cd5dbd255d', '{"Patient":{"id":"4ffbb585-e894-40dc-8732-11cd5dbd255d","iniciales":"abc","fecha_nacimiento":"12\\/12\\/1969","sexo":"M","address_particular_id":"35","address_laboral_id":"36","nro_documento":"28948d8e54491b62f3243ad657df60a0c3eead34c6fa47a62d1c6bebd4fb3238","created":"2012-07-10 01:54:29","modified":"2012-07-10 01:54:29","edad":"42"}}', NULL, '5', '2012-07-10 01:54:29'),
	('4ffbb585-e44c-4315-b61d-11cd5dbd255d', 'CREATE', 'Primary', '35', '{"Primary":{"id":"35","city_id":"1","latitud":"-38.6827927","longitud":"-62.3398743","direccion":"Luc\\u00eda Miranda"}}', NULL, '5', '2012-07-10 01:54:29'),
	('4ffbb5e6-d64c-4aac-97a2-11ce5dbd255d', 'CREATE', 'OmsRegister', '21', '{"OmsRegister":{"id":"21","patient_id":"4ffbb585-e894-40dc-8732-11cd5dbd255d","medic_id":"1","address_part_id":"35","address_lab_id":"36","oms_code_id":"173","estadio":"4","fecha":"10\\/07\\/2012"}}', NULL, '5', '2012-07-10 01:56:06'),
	('4ffbb621-2a04-415d-b08f-11cd5dbd255d', 'CREATE', 'Note', '4', '{"Note":{"id":"4","medic_id":"1","oms_register_id":"21","fecha":"2012-07-10 01:57:05","descripcion":"<p>123344wewedwdwqwe<\\/p>"}}', NULL, '5', '2012-07-10 01:57:05'),
	('4ffe6eb6-15a8-4be4-8a17-2f245dbd255d', 'CREATE', 'Primary', '37', '{"Primary":{"id":"37","city_id":"1","latitud":"-38.7161821","longitud":"-62.2658427","direccion":"Zelarray\\u00e1n 100"}}', NULL, '9', '2012-07-12 03:29:10'),
	('4ffe6eb6-6844-4e4c-b2cc-2f245dbd255d', 'CREATE', 'Answer', '59', '{"Answer":{"id":"59","patient_id":"4ffe6eb6-b044-44ed-908d-2f245dbd255d","question_id":"3","valor":true}}', NULL, '9', '2012-07-12 03:29:10'),
	('4ffe6eb6-85dc-4f8f-866e-2f245dbd255d', 'CREATE', 'Answer', '60', '{"Answer":{"id":"60","patient_id":"4ffe6eb6-b044-44ed-908d-2f245dbd255d","question_id":"4","valor":false}}', NULL, '9', '2012-07-12 03:29:10'),
	('4ffe6eb6-98cc-44a1-94dd-2f245dbd255d', 'CREATE', 'Answer', '58', '{"Answer":{"id":"58","patient_id":"4ffe6eb6-b044-44ed-908d-2f245dbd255d","question_id":"2","valor":false}}', NULL, '9', '2012-07-12 03:29:10'),
	('4ffe6eb6-be00-495f-a6ca-2f245dbd255d', 'CREATE', 'Answer', '57', '{"Answer":{"id":"57","patient_id":"4ffe6eb6-b044-44ed-908d-2f245dbd255d","question_id":"1","valor":true}}', NULL, '9', '2012-07-12 03:29:10'),
	('4ffe6eb6-f1c0-48d8-a9ad-2f245dbd255d', 'CREATE', 'Patient', '4ffe6eb6-b044-44ed-908d-2f245dbd255d', '{"Patient":{"id":"4ffe6eb6-b044-44ed-908d-2f245dbd255d","iniciales":"hjs","fecha_nacimiento":"24\\/12\\/1950","sexo":"M","address_particular_id":"37","address_laboral_id":null,"nro_documento":"d70ec720c39bd33394aa51eef6095303182e1db432129ae0e3134155f7260fd0","created":"2012-07-12 03:29:10","modified":"2012-07-12 03:29:10","edad":"61"}}', NULL, '9', '2012-07-12 03:29:10'),
	('4ffe6ee1-2a50-4f69-bfb6-3ccc5dbd255d', 'CREATE', 'OmsRegister', '22', '{"OmsRegister":{"id":"22","patient_id":"4ffe6eb6-b044-44ed-908d-2f245dbd255d","medic_id":"2","address_part_id":"37","address_lab_id":null,"oms_code_id":"10","estadio":"2","fecha":"12\\/07\\/2012"}}', NULL, '9', '2012-07-12 03:29:53'),
	('4ffe6fd3-2058-49e5-9784-40895dbd255d', 'CREATE', 'Note', '5', '{"Note":{"id":"5","medic_id":"1","oms_register_id":"22","fecha":"2012-07-12 03:33:55","descripcion":"<p><strong><em>Cancer<\\/em><\\/strong><br \\/><span style=\\"color: #ff0000; font-size: 16px;\\">Tumor<\\/span><\\/p>"}}', NULL, '9', '2012-07-12 03:33:55'),
	('4fff1040-017c-4238-a78d-638f5dbd255d', 'CREATE', 'Answer', '64', '{"Answer":{"id":"64","patient_id":"4fff1040-687c-452a-ba5c-638f5dbd255d","question_id":"4","valor":false}}', NULL, '5', '2012-07-12 14:58:24'),
	('4fff1040-2b8c-47f0-9c70-638f5dbd255d', 'CREATE', 'Patient', '4fff1040-687c-452a-ba5c-638f5dbd255d', '{"Patient":{"id":"4fff1040-687c-452a-ba5c-638f5dbd255d","iniciales":"F.Z","fecha_nacimiento":"08\\/07\\/1992","sexo":"M","address_particular_id":null,"address_laboral_id":null,"nro_documento":"a9b141a848a2275f721e05bd579c7e25d713e2f9d65f787129d39e859371eb8d","created":"2012-07-12 14:58:24","modified":"2012-07-12 14:58:24","edad":"20"}}', NULL, '5', '2012-07-12 14:58:24'),
	('4fff1040-4278-4dea-9a5e-638f5dbd255d', 'CREATE', 'Answer', '61', '{"Answer":{"id":"61","patient_id":"4fff1040-687c-452a-ba5c-638f5dbd255d","question_id":"1","valor":true}}', NULL, '5', '2012-07-12 14:58:24'),
	('4fff1040-8ad4-49da-b10e-638f5dbd255d', 'CREATE', 'Answer', '63', '{"Answer":{"id":"63","patient_id":"4fff1040-687c-452a-ba5c-638f5dbd255d","question_id":"3","valor":false}}', NULL, '5', '2012-07-12 14:58:24'),
	('4fff1040-c458-4305-9d0d-638f5dbd255d', 'CREATE', 'Answer', '62', '{"Answer":{"id":"62","patient_id":"4fff1040-687c-452a-ba5c-638f5dbd255d","question_id":"2","valor":true}}', NULL, '5', '2012-07-12 14:58:24'),
	('4fff11f5-8dec-4b7d-bd00-63645dbd255d', 'CREATE', 'OmsRegister', '23', '{"OmsRegister":{"id":"23","patient_id":"4fff1040-687c-452a-ba5c-638f5dbd255d","medic_id":"1","address_part_id":null,"address_lab_id":null,"oms_code_id":"212","estadio":"2","fecha":"12\\/07\\/2012"}}', NULL, '5', '2012-07-12 15:05:41'),
	('4fff8873-41ac-4648-83da-7f6b5dbd255d', 'CREATE', 'Answer', '65', '{"Answer":{"id":"65","patient_id":"4fff8873-2678-45d4-9905-7f6b5dbd255d","question_id":"1","valor":true}}', NULL, '5', '2012-07-12 23:31:15'),
	('4fff8873-5628-4526-b53f-7f6b5dbd255d', 'CREATE', 'Primary', '38', '{"Primary":{"id":"38","city_id":"1","latitud":"-38.716745","longitud":"-62.2817979","direccion":"Juan Molina 500"}}', NULL, '5', '2012-07-12 23:31:15'),
	('4fff8873-64b8-472c-b4cf-7f6b5dbd255d', 'CREATE', 'Patient', '4fff8873-2678-45d4-9905-7f6b5dbd255d', '{"Patient":{"id":"4fff8873-2678-45d4-9905-7f6b5dbd255d","iniciales":"TC","fecha_nacimiento":"04\\/07\\/1949","sexo":"M","address_particular_id":"38","address_laboral_id":"39","nro_documento":"e8d388cb01f523b00027b50a6f99e6fa964cf450736b071aa4bc0c6d3fab0c82","created":"2012-07-12 23:31:15","modified":"2012-07-12 23:31:15","edad":"63"}}', NULL, '5', '2012-07-12 23:31:15'),
	('4fff8873-b948-415a-9dec-7f6b5dbd255d', 'CREATE', 'Answer', '66', '{"Answer":{"id":"66","patient_id":"4fff8873-2678-45d4-9905-7f6b5dbd255d","question_id":"2","valor":true}}', NULL, '5', '2012-07-12 23:31:15'),
	('4fff8873-c0c8-4402-8bbc-7f6b5dbd255d', 'CREATE', 'Answer', '67', '{"Answer":{"id":"67","patient_id":"4fff8873-2678-45d4-9905-7f6b5dbd255d","question_id":"3","valor":true}}', NULL, '5', '2012-07-12 23:31:15'),
	('4fff8873-d524-4364-a8ca-7f6b5dbd255d', 'CREATE', 'Secondary', '39', '{"Secondary":{"id":"39","city_id":"1","latitud":"-38.711487","longitud":"-62.275356","direccion":"Estomba 800"}}', NULL, '5', '2012-07-12 23:31:15'),
	('4fff8899-8f34-42e6-bbe5-7c895dbd255d', 'CREATE', 'OmsRegister', '24', '{"OmsRegister":{"id":"24","patient_id":"4fff8873-2678-45d4-9905-7f6b5dbd255d","medic_id":"1","address_part_id":"38","address_lab_id":"39","oms_code_id":"29","estadio":"4","fecha":"12\\/07\\/2012"}}', NULL, '5', '2012-07-12 23:31:53'),
	('50009fa3-0f70-459a-a07a-471f5dbd255d', 'CREATE', 'Patient', '50009fa3-39f4-4d6a-870e-471f5dbd255d', '{"Patient":{"id":"50009fa3-39f4-4d6a-870e-471f5dbd255d","iniciales":"GK","fecha_nacimiento":"13\\/02\\/1958","sexo":"M","address_particular_id":"40","address_laboral_id":"41","nro_documento":"763a0b4c7b96425fc1a219b7c9ba12f493aee86c02a233df21c8e859ee89b084","created":"2012-07-13 19:22:27","modified":"2012-07-13 19:22:27","edad":"54"}}', NULL, '5', '2012-07-13 19:22:27'),
	('50009fa3-8c24-4caf-a0db-471f5dbd255d', 'CREATE', 'Primary', '40', '{"Primary":{"id":"40","city_id":"1","latitud":"-38.7201629","longitud":"-62.2817329","direccion":"Patricios 700"}}', NULL, '5', '2012-07-13 19:22:27'),
	('50009fa3-c12c-4e00-b8dd-471f5dbd255d', 'CREATE', 'Secondary', '41', '{"Secondary":{"id":"41","city_id":"1","latitud":"-38.7150989","longitud":"-62.3053516","direccion":"L\\u00edbano 2500"}}', NULL, '5', '2012-07-13 19:22:27'),
	('50009fa3-f708-42d2-bf28-471f5dbd255d', 'CREATE', 'Answer', '68', '{"Answer":{"id":"68","patient_id":"50009fa3-39f4-4d6a-870e-471f5dbd255d","question_id":"1","valor":true}}', NULL, '5', '2012-07-13 19:22:27'),
	('502afb7f-c58c-4f1a-9ed3-0a575dbd255d', 'CREATE', 'User', '12', '{"User":{"id":"12","username":"emma","password":"1500c2908e71d66b19bfce3a1b4e042d4c860649","group_id":"3","created":"2012-08-14 22:29:35","modified":"2012-08-14 22:29:35","medic_id":null}}', NULL, '1', '2012-08-14 22:29:35');
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;


-- Dumping structure for table geocan.audit_deltas
DROP TABLE IF EXISTS `audit_deltas`;
CREATE TABLE IF NOT EXISTS `audit_deltas` (
  `id` varchar(36) NOT NULL,
  `audit_id` varchar(36) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `old_value` text,
  `new_value` text,
  PRIMARY KEY  (`id`),
  KEY `audit_id` (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.audit_deltas: ~14 rows (approximately)
DELETE FROM `audit_deltas`;
/*!40000 ALTER TABLE `audit_deltas` DISABLE KEYS */;
INSERT INTO `audit_deltas` (`id`, `audit_id`, `property_name`, `old_value`, `new_value`) VALUES
	('4ff9fecb-a444-4cba-8a57-0ce47be0049b', '4ff9fecb-b454-4e59-a848-0ce47be0049b', 'group_id', '3', '1'),
	('4ff9ff10-afd0-471a-bb31-0ce47be0049b', '4ff9ff10-f170-4e7f-8a59-0ce47be0049b', 'medic_id', NULL, '1'),
	('4ff9ff23-73c0-432c-b748-0ce47be0049b', '4ff9ff23-cd2c-4a5e-b8d3-0ce47be0049b', 'medic_id', '1', NULL),
	('4ff9ff2e-9d60-45d6-ab03-0ce47be0049b', '4ff9ff2d-87a8-45ee-aea5-0ce47be0049b', 'medic_id', NULL, '2'),
	('4ff9ff58-f0b4-43ab-af1c-0ce47be0049b', '4ff9ff58-49b4-45b6-a109-0ce47be0049b', 'medic_id', NULL, '1'),
	('4ffa0045-385c-4441-b684-0ce47be0049b', '4ffa0045-6aa4-4071-8343-0ce47be0049b', 'medic_id', '2', NULL),
	('4ffa004a-ed44-496b-b1c7-0ce47be0049b', '4ffa004a-09cc-4d75-ba17-0ce47be0049b', 'medic_id', NULL, '1'),
	('4ffa0499-e5dc-4c45-92b2-0ce47be0049b', '4ffa0498-e17c-4920-b54f-0ce47be0049b', 'medic_id', '1', NULL),
	('4ffa049d-e314-4c62-9bf0-0ce47be0049b', '4ffa049d-d888-4952-99f3-0ce47be0049b', 'medic_id', NULL, '1'),
	('4ffa050d-1880-4fee-abca-0ce47be0049b', '4ffa050d-4910-4f25-9842-0ce47be0049b', 'password', '36bbb6604e4a6d15f31be0fee38b7c0234997f89', 'a0f76f8adbe4a2b8ce42d1c33913b0cd27d28bf0'),
	('4ffa1084-5cf0-4cc9-a6a4-0ce47be0049b', '4ffa1084-b180-48a4-853a-0ce47be0049b', 'password', '1500c2908e71d66b19bfce3a1b4e042d4c860649', 'a928fe3036545575c4efe802e7f389e686468431'),
	('4ffa3e18-fdec-49ea-9f60-42575dbd255d', '4ffa3e18-8e04-4526-b519-42575dbd255d', 'password', '1500c2908e71d66b19bfce3a1b4e042d4c860649', 'aa0119e124cd472e85951bf78834a3af608b529a'),
	('4ffa50f1-8258-441a-9c60-4aa15dbd255d', '4ffa50f1-97d8-4817-bb02-4aa15dbd255d', 'address_particular_id', '24', '29'),
	('4ffb980e-f7ec-467a-b89d-098b5dbd255d', '4ffb980e-7c80-4e60-a670-098b5dbd255d', 'valor', '1', '');
/*!40000 ALTER TABLE `audit_deltas` ENABLE KEYS */;


-- Dumping structure for table geocan.cities
DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.groups: ~3 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
	(1, 'Administradores', '2012-04-13 22:22:17', '2012-04-13 22:22:17'),
	(2, 'Médicos', '2012-04-13 22:22:42', '2012-04-15 23:01:42'),
	(3, 'Ayudantes', '2012-04-15 23:01:27', '2012-05-26 18:24:41');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table geocan.medics
DROP TABLE IF EXISTS `medics`;
CREATE TABLE IF NOT EXISTS `medics` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `medic_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
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
  `id` int(10) unsigned NOT NULL auto_increment,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(10) unsigned NOT NULL auto_increment,
  `medic_id` int(10) unsigned NOT NULL,
  `oms_register_id` int(10) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_nota_medico` (`medic_id`),
  KEY `FK_nota_oms` (`oms_register_id`),
  KEY `FK_notes_medic` (`medic_id`),
  KEY `FK_notes_oms_register` (`oms_register_id`),
  CONSTRAINT `FK_notes_medic` FOREIGN KEY (`medic_id`) REFERENCES `medics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_notes_oms_register` FOREIGN KEY (`oms_register_id`) REFERENCES `oms_registers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.notes: ~5 rows (approximately)
DELETE FROM `notes`;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`, `medic_id`, `oms_register_id`, `fecha`, `descripcion`) VALUES
	(1, 1, 20, '2012-07-08 19:26:21', '<p>feefefefefef</p>'),
	(2, 1, 20, '2012-07-08 19:27:06', '<p>feefefefefeffgfg</p>'),
	(3, 1, 20, '2012-07-08 19:27:40', '<p>feefefefefeffgfgfbfbfb</p>'),
	(4, 1, 21, '2012-07-10 01:57:05', '<p>123344wewedwdwqwe</p>'),
	(5, 1, 22, '2012-07-12 03:33:55', '<p><strong><em>Cancer</em></strong><br /><span style="color: #ff0000; font-size: 16px;">Tumor</span></p>');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;


-- Dumping structure for table geocan.oms_codes
DROP TABLE IF EXISTS `oms_codes`;
CREATE TABLE IF NOT EXISTS `oms_codes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `padre` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(10) unsigned NOT NULL auto_increment,
  `patient_id` char(36) NOT NULL,
  `medic_id` int(10) unsigned NOT NULL,
  `address_part_id` int(10) unsigned default NULL,
  `address_lab_id` int(10) unsigned default NULL,
  `oms_code_id` int(10) unsigned NOT NULL,
  `estadio` tinyint(2) unsigned default NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY  (`id`),
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.oms_registers: ~23 rows (approximately)
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
	(21, '4ffbb585-e894-40dc-8732-11cd5dbd255d', 1, 35, 36, 173, 4, '2012-07-10 00:00:00'),
	(22, '4ffe6eb6-b044-44ed-908d-2f245dbd255d', 2, 37, NULL, 10, 2, '2012-07-12 00:00:00'),
	(23, '4fff1040-687c-452a-ba5c-638f5dbd255d', 1, NULL, NULL, 212, 2, '2012-07-12 00:00:00'),
	(24, '4fff8873-2678-45d4-9905-7f6b5dbd255d', 1, 38, 39, 29, 4, '2012-07-12 00:00:00');
/*!40000 ALTER TABLE `oms_registers` ENABLE KEYS */;


-- Dumping structure for table geocan.patients
DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` char(36) NOT NULL,
  `iniciales` varchar(5) default NULL,
  `fecha_nacimiento` date default NULL,
  `sexo` enum('M','F') default NULL,
  `address_particular_id` int(10) unsigned default NULL,
  `address_laboral_id` int(10) unsigned default NULL,
  `nro_documento` char(64) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_patient_address1` (`address_particular_id`),
  KEY `FK_patient_address2` (`address_laboral_id`),
  CONSTRAINT `FK_patient_address1` FOREIGN KEY (`address_particular_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `FK_patient_address2` FOREIGN KEY (`address_laboral_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.patients: ~23 rows (approximately)
DELETE FROM `patients`;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`id`, `iniciales`, `fecha_nacimiento`, `sexo`, `address_particular_id`, `address_laboral_id`, `nro_documento`, `created`, `modified`) VALUES
	('4fdfcc0a-d64c-42e0-9e2d-160c7be0049b', 'GHT2', '1984-02-14', 'M', 29, NULL, 'd62bce2760df0b171b2269de45884537a88be6ade7835de091b10c896433aac4', '2012-06-18 21:47:06', '2012-07-09 00:33:05'),
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
	('4ffa4567-e1ec-4c84-a9d7-449a5dbd255d', 'M.G', '1959-02-04', 'M', 25, 26, '9603cf69ec38e7fd978a254d745a8af74ca03a39e701706ccd651208eefbb037', '2012-07-08 23:43:51', '2012-07-08 23:43:51'),
	('4ffa459b-93b4-4bf9-afef-44e95dbd255d', 'M.G', '1959-02-04', 'M', 27, 28, '86d2627917b3984d27d9bf8ea8fe37b6ac5d81fc5cedbdb17980dd4e3223b206', '2012-07-08 23:44:43', '2012-07-08 23:44:43'),
	('4ffb87d2-f174-459d-8a58-07305dbd255d', 'kj', '2012-07-09', 'M', 30, NULL, '2aee51172a1e75dde6b55a99b162654e760b60cf727a7905254ffe1b1876b177', '2012-07-09 22:39:30', '2012-07-09 22:39:30'),
	('4ffb97f4-ded0-42a0-99ed-7f075dbd255d', 'MF', '1954-08-05', 'M', 31, 32, '8e0c9c2fb0a4be216bbf581741604b436b10f20eace22fe66132b11016253ae6', '2012-07-09 23:48:20', '2012-07-09 23:48:46'),
	('4ffbb445-47c4-4c4c-a323-11ce5dbd255d', 'abc', '1968-07-24', 'F', 33, 34, '4f7b966d295fb3504f641f971e5831d5a5f3dd30dd321ca816495c6df7c73079', '2012-07-10 01:49:09', '2012-07-10 01:49:09'),
	('4ffbb585-e894-40dc-8732-11cd5dbd255d', 'abc', '1969-12-12', 'M', 35, 36, '28948d8e54491b62f3243ad657df60a0c3eead34c6fa47a62d1c6bebd4fb3238', '2012-07-10 01:54:29', '2012-07-10 01:54:29'),
	('4ffe6eb6-b044-44ed-908d-2f245dbd255d', 'hjs', '1950-12-24', 'M', 37, NULL, 'd70ec720c39bd33394aa51eef6095303182e1db432129ae0e3134155f7260fd0', '2012-07-12 03:29:10', '2012-07-12 03:29:10'),
	('4fff1040-687c-452a-ba5c-638f5dbd255d', 'F.Z', '1992-07-08', 'M', NULL, NULL, 'a9b141a848a2275f721e05bd579c7e25d713e2f9d65f787129d39e859371eb8d', '2012-07-12 14:58:24', '2012-07-12 14:58:24'),
	('4fff8873-2678-45d4-9905-7f6b5dbd255d', 'TC', '1949-07-04', 'M', 38, 39, 'e8d388cb01f523b00027b50a6f99e6fa964cf450736b071aa4bc0c6d3fab0c82', '2012-07-12 23:31:15', '2012-07-12 23:31:15'),
	('50009fa3-39f4-4d6a-870e-471f5dbd255d', 'GK', '1958-02-13', 'M', 40, 41, '763a0b4c7b96425fc1a219b7c9ba12f493aee86c02a233df21c8e859ee89b084', '2012-07-13 19:22:27', '2012-07-13 19:22:27');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;


-- Dumping structure for table geocan.provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(10) unsigned NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.questions: ~4 rows (approximately)
DELETE FROM `questions`;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `descripcion`, `visible`) VALUES
	(1, '¿Fuma?', 1),
	(2, '¿Bebe?', 1),
	(3, '¿Antecedentes de Cancer?', 1),
	(4, 'ACO/TRH', 1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


-- Dumping structure for table geocan.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `medic_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_users_group` (`group_id`),
  KEY `FK_users_medic` (`medic_id`),
  CONSTRAINT `FK_users_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `FK_users_medic` FOREIGN KEY (`medic_id`) REFERENCES `medics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.users: ~9 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `medic_id`) VALUES
	(1, 'admin', 'a0f76f8adbe4a2b8ce42d1c33913b0cd27d28bf0', 1, '2012-04-13 22:24:30', '2012-07-08 19:09:17', 1),
	(5, 'ayudante1', 'aa0119e124cd472e85951bf78834a3af608b529a', 3, '2012-07-08 23:08:13', '2012-07-08 23:12:40', NULL),
	(6, 'ayudante2', 'aa0119e124cd472e85951bf78834a3af608b529a', 3, '2012-07-08 23:08:36', '2012-07-08 23:08:36', NULL),
	(7, 'ayudante3', 'aa0119e124cd472e85951bf78834a3af608b529a', 3, '2012-07-08 23:08:58', '2012-07-08 23:08:58', NULL),
	(8, 'ayudante4', 'aa0119e124cd472e85951bf78834a3af608b529a', 3, '2012-07-08 23:09:24', '2012-07-08 23:09:24', NULL),
	(9, 'ayudante5', 'aa0119e124cd472e85951bf78834a3af608b529a', 3, '2012-07-08 23:10:09', '2012-07-08 23:10:09', NULL),
	(10, 'medico1', 'aa0119e124cd472e85951bf78834a3af608b529a', 2, '2012-07-08 23:10:55', '2012-07-08 23:10:55', 1),
	(11, 'medico2', 'aa0119e124cd472e85951bf78834a3af608b529a', 2, '2012-07-08 23:11:13', '2012-07-08 23:11:13', 2),
	(12, 'emma', '1500c2908e71d66b19bfce3a1b4e042d4c860649', 3, '2012-08-14 22:29:35', '2012-08-14 22:29:35', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
