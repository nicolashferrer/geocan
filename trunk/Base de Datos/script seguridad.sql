-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.37 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-08-14 20:35:28
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.acos: ~106 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 212),
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
	(120, 1, NULL, NULL, 'AuditLog', 208, 209),
	(121, 1, NULL, NULL, 'AuditsControllers', 210, 211);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros: ~11 rows (approximately)
DELETE FROM `aros`;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, 'Group', 1, '', 1, 4),
	(2, NULL, 'Group', 2, '', 5, 14),
	(3, 1, 'User', 1, '', 2, 3),
	(4, NULL, 'Group', 3, '', 15, 26),
	(8, 2, 'User', 5, '', 12, 13),
	(9, 4, 'User', 6, '', 16, 17),
	(10, 4, 'User', 7, '', 18, 19),
	(11, 4, 'User', 8, '', 20, 21),
	(12, 4, 'User', 9, '', 22, 23),
	(13, 2, 'User', 10, '', 6, 7),
	(14, 2, 'User', 11, '', 8, 9),
	(15, 2, 'User', 5, '', 10, 11),
	(16, 4, 'User', 6, '', 24, 25);
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros_acos: ~89 rows (approximately)
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
	(1, 'Administradores', '2012-04-13 22:22:17', '2012-04-13 22:22:17'),
	(2, 'Médicos', '2012-04-13 22:22:42', '2012-04-15 23:01:42'),
	(3, 'Ayudantes', '2012-04-15 23:01:27', '2012-05-26 18:24:41');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `medic_id`) VALUES
	(1, 'admin', '3784364f60b0989c0059deb3210dc30966a4ec6c', 1, '2012-04-13 22:24:30', '2012-07-08 19:09:17', 1),
	(5, 'medico', '3784364f60b0989c0059deb3210dc30966a4ec6c', 2, '2012-08-14 20:24:14', '2012-08-14 20:25:41', 2),
	(6, 'ayudante', '3784364f60b0989c0059deb3210dc30966a4ec6c', 3, '2012-08-14 20:30:37', '2012-08-14 20:30:37', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
