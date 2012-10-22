-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.37 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-10-22 17:05:45
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
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.acos: ~118 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 236),
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
	(16, 1, NULL, NULL, 'Cities', 30, 47),
	(17, 16, NULL, NULL, 'index', 31, 32),
	(18, 16, NULL, NULL, 'view', 33, 34),
	(19, 16, NULL, NULL, 'add', 35, 36),
	(20, 16, NULL, NULL, 'edit', 37, 38),
	(21, 16, NULL, NULL, 'delete', 39, 40),
	(23, 1, NULL, NULL, 'Groups', 48, 61),
	(24, 23, NULL, NULL, 'index', 49, 50),
	(25, 23, NULL, NULL, 'view', 51, 52),
	(26, 23, NULL, NULL, 'add', 53, 54),
	(27, 23, NULL, NULL, 'edit', 55, 56),
	(28, 23, NULL, NULL, 'delete', 57, 58),
	(30, 1, NULL, NULL, 'MedicTypes', 62, 73),
	(31, 30, NULL, NULL, 'index', 63, 64),
	(32, 30, NULL, NULL, 'view', 65, 66),
	(33, 30, NULL, NULL, 'add', 67, 68),
	(34, 30, NULL, NULL, 'edit', 69, 70),
	(35, 30, NULL, NULL, 'delete', 71, 72),
	(37, 1, NULL, NULL, 'Medics', 74, 87),
	(38, 37, NULL, NULL, 'index', 75, 76),
	(39, 37, NULL, NULL, 'view', 77, 78),
	(40, 37, NULL, NULL, 'add', 79, 80),
	(41, 37, NULL, NULL, 'edit', 81, 82),
	(42, 37, NULL, NULL, 'delete', 83, 84),
	(44, 1, NULL, NULL, 'Notes', 88, 99),
	(45, 44, NULL, NULL, 'index', 89, 90),
	(46, 44, NULL, NULL, 'view', 91, 92),
	(47, 44, NULL, NULL, 'add', 93, 94),
	(48, 44, NULL, NULL, 'edit', 95, 96),
	(49, 44, NULL, NULL, 'delete', 97, 98),
	(51, 1, NULL, NULL, 'OmsCodes', 100, 117),
	(52, 51, NULL, NULL, 'index', 101, 102),
	(53, 51, NULL, NULL, 'view', 103, 104),
	(54, 51, NULL, NULL, 'add', 105, 106),
	(55, 51, NULL, NULL, 'edit', 107, 108),
	(56, 51, NULL, NULL, 'delete', 109, 110),
	(58, 1, NULL, NULL, 'OmsRegisters', 118, 131),
	(59, 58, NULL, NULL, 'index', 119, 120),
	(60, 58, NULL, NULL, 'view', 121, 122),
	(61, 58, NULL, NULL, 'add', 123, 124),
	(62, 58, NULL, NULL, 'edit', 125, 126),
	(63, 58, NULL, NULL, 'delete', 127, 128),
	(65, 1, NULL, NULL, 'Pages', 132, 137),
	(66, 65, NULL, NULL, 'display', 133, 134),
	(68, 1, NULL, NULL, 'Patients', 138, 157),
	(69, 68, NULL, NULL, 'index', 139, 140),
	(70, 68, NULL, NULL, 'view', 141, 142),
	(71, 68, NULL, NULL, 'add', 143, 144),
	(72, 68, NULL, NULL, 'edit', 145, 146),
	(73, 68, NULL, NULL, 'delete', 147, 148),
	(75, 1, NULL, NULL, 'Provinces', 158, 171),
	(76, 75, NULL, NULL, 'index', 159, 160),
	(77, 75, NULL, NULL, 'view', 161, 162),
	(78, 75, NULL, NULL, 'add', 163, 164),
	(79, 75, NULL, NULL, 'edit', 165, 166),
	(80, 75, NULL, NULL, 'delete', 167, 168),
	(82, 1, NULL, NULL, 'Questions', 172, 185),
	(83, 82, NULL, NULL, 'index', 173, 174),
	(84, 82, NULL, NULL, 'view', 175, 176),
	(85, 82, NULL, NULL, 'add', 177, 178),
	(86, 82, NULL, NULL, 'edit', 179, 180),
	(87, 82, NULL, NULL, 'delete', 181, 182),
	(89, 1, NULL, NULL, 'Users', 186, 213),
	(90, 89, NULL, NULL, 'index', 187, 188),
	(91, 89, NULL, NULL, 'view', 189, 190),
	(92, 89, NULL, NULL, 'add', 191, 192),
	(93, 89, NULL, NULL, 'edit', 193, 194),
	(94, 89, NULL, NULL, 'delete', 195, 196),
	(95, 89, NULL, NULL, 'login', 197, 198),
	(96, 89, NULL, NULL, 'logout', 199, 200),
	(98, 1, NULL, NULL, 'AclExtras', 214, 215),
	(99, 16, NULL, NULL, 'getCiudades', 41, 42),
	(100, 23, NULL, NULL, 'build_acl', 59, 60),
	(101, 51, NULL, NULL, 'getSigNivel', 111, 112),
	(102, 51, NULL, NULL, 'help', 113, 114),
	(103, 89, NULL, NULL, 'initDB', 201, 202),
	(105, 51, NULL, NULL, 'sugerencias', 115, 116),
	(106, 68, NULL, NULL, 'search', 149, 150),
	(107, 68, NULL, NULL, 'result', 151, 152),
	(108, 68, NULL, NULL, 'editAnswers', 153, 154),
	(109, 68, NULL, NULL, 'recuperarPaciente', 155, 156),
	(110, 89, NULL, NULL, 'editPassword', 203, 204),
	(111, 89, NULL, NULL, 'resetPassword', 205, 206),
	(112, 2, NULL, NULL, 'reporte', 13, 14),
	(113, 58, NULL, NULL, 'checkDelete', 129, 130),
	(114, 2, NULL, NULL, 'reporteBusqueda', 15, 16),
	(115, 16, NULL, NULL, 'checkDelete', 43, 44),
	(116, 37, NULL, NULL, 'checkDelete', 85, 86),
	(117, 75, NULL, NULL, 'checkDelete', 169, 170),
	(118, 89, NULL, NULL, 'captcha', 207, 208),
	(119, 89, NULL, NULL, 'reload_captcha', 209, 210),
	(120, 1, NULL, NULL, 'AuditLog', 216, 217),
	(122, 1, NULL, NULL, 'Audits', 218, 221),
	(123, 122, NULL, NULL, 'index', 219, 220),
	(124, 1, NULL, NULL, 'Jobs', 222, 233),
	(125, 124, NULL, NULL, 'index', 223, 224),
	(126, 124, NULL, NULL, 'view', 225, 226),
	(127, 124, NULL, NULL, 'add', 227, 228),
	(128, 124, NULL, NULL, 'edit', 229, 230),
	(129, 124, NULL, NULL, 'delete', 231, 232),
	(130, 1, NULL, NULL, 'Filter', 234, 235),
	(131, 89, NULL, NULL, 'cambiarBlocked', 211, 212),
	(132, 65, NULL, NULL, 'welcome', 135, 136),
	(133, 82, NULL, NULL, 'checkDelete', 183, 184),
	(134, 16, NULL, NULL, 'getNombre', 45, 46);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros: ~14 rows (approximately)
DELETE FROM `aros`;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, 'Group', 1, '', 1, 4),
	(2, NULL, 'Group', 2, '', 5, 18),
	(3, 1, 'User', 1, '', 2, 3),
	(4, NULL, 'Group', 3, '', 19, 28),
	(8, 2, 'User', 5, '', 12, 13),
	(9, 4, 'User', 6, '', 20, 21),
	(10, 2, 'User', 7, '', 16, 17),
	(11, 4, 'User', 8, '', 22, 23),
	(12, 4, 'User', 9, '', 24, 25),
	(13, 2, 'User', 10, '', 6, 7),
	(14, 2, 'User', 11, '', 8, 9),
	(15, 2, 'User', 5, '', 10, 11),
	(16, 4, 'User', 6, '', 26, 27),
	(17, 2, 'User', 7, '', 14, 15);
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
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.aros_acos: ~115 rows (approximately)
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
	(91, 4, 114, '1', '1', '1', '1'),
	(92, 1, 26, '-1', '-1', '-1', '-1'),
	(93, 1, 27, '-1', '-1', '-1', '-1'),
	(94, 1, 28, '-1', '-1', '-1', '-1'),
	(95, 2, 83, '1', '1', '1', '1'),
	(96, 2, 19, '1', '1', '1', '1'),
	(97, 2, 76, '-1', '-1', '-1', '-1'),
	(98, 2, 127, '1', '1', '1', '1'),
	(99, 2, 126, '1', '1', '1', '1'),
	(100, 2, 129, '1', '1', '1', '1'),
	(101, 2, 128, '-1', '-1', '-1', '-1'),
	(102, 4, 26, '-1', '-1', '-1', '-1'),
	(103, 4, 27, '-1', '-1', '-1', '-1'),
	(104, 4, 28, '-1', '-1', '-1', '-1'),
	(105, 4, 76, '-1', '-1', '-1', '-1'),
	(106, 4, 127, '1', '1', '1', '1'),
	(107, 4, 126, '1', '1', '1', '1'),
	(108, 4, 129, '1', '1', '1', '1'),
	(109, 4, 128, '-1', '-1', '-1', '-1'),
	(110, 2, 125, '1', '1', '1', '1'),
	(111, 4, 125, '1', '1', '1', '1'),
	(112, 2, 132, '1', '1', '1', '1'),
	(113, 4, 132, '1', '1', '1', '1'),
	(114, 2, 134, '1', '1', '1', '1'),
	(115, 4, 134, '1', '1', '1', '1');
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
  `blocked` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_users_group` (`group_id`),
  KEY `FK_users_medic` (`medic_id`),
  CONSTRAINT `FK_users_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `FK_users_medic` FOREIGN KEY (`medic_id`) REFERENCES `medics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table geocan.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `medic_id`, `blocked`) VALUES
	(1, 'admin', '3784364f60b0989c0059deb3210dc30966a4ec6c', 1, '2012-04-13 22:24:30', '2012-07-08 19:09:17', NULL, 0),
	(5, 'medico', '3784364f60b0989c0059deb3210dc30966a4ec6c', 2, '2012-08-14 20:24:14', '2012-10-04 00:17:02', 2, 0),
	(6, 'ayudante', '3784364f60b0989c0059deb3210dc30966a4ec6c', 3, '2012-08-14 20:30:37', '2012-10-04 00:17:44', NULL, 0),
	(7, 'medico2', '3784364f60b0989c0059deb3210dc30966a4ec6c', 2, '2012-08-14 20:52:00', '2012-10-04 00:17:05', 1, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
