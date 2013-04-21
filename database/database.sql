-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-12 07:35:00
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for casino_backend
DROP DATABASE IF EXISTS `casino_backend`;
CREATE DATABASE IF NOT EXISTS `casino_backend` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `casino_backend`;


-- Dumping structure for table casino_backend.citemplate_audit_trail
DROP TABLE IF EXISTS `citemplate_audit_trail`;
CREATE TABLE IF NOT EXISTS `citemplate_audit_trail` (
  `audit_trail_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `audit_trail_module` varchar(50) NOT NULL,
  `audit_trail_action_lookup_id_fk` int(11) NOT NULL,
  `audit_trail_create_by_id_fk` int(11) DEFAULT NULL,
  `audit_trail_create_date` datetime DEFAULT NULL,
  `audit_trail_value` text,
  PRIMARY KEY (`audit_trail_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_audit_trail: ~57 rows (approximately)
/*!40000 ALTER TABLE `citemplate_audit_trail` DISABLE KEYS */;
REPLACE INTO `citemplate_audit_trail` (`audit_trail_id_pk`, `audit_trail_module`, `audit_trail_action_lookup_id_fk`, `audit_trail_create_by_id_fk`, `audit_trail_create_date`, `audit_trail_value`) VALUES
	(1, 'USER', 5101, 37, '2013-02-23 09:01:19', 'User Login: chenx'),
	(2, 'PLAYER', 5102, NULL, '2013-02-23 10:40:42', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(3, 'PLAYER', 5102, NULL, '2013-02-23 10:42:42', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(4, 'PLAYER', 5102, NULL, '2013-02-23 10:44:07', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(5, 'PLAYER', 5103, NULL, '2013-02-23 18:40:26', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(6, 'PLAYER', 5103, NULL, '2013-02-23 18:44:51', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(7, 'PLAYER', 5103, NULL, '2013-02-23 18:49:47', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(8, 'PLAYER', 5103, NULL, '2013-02-23 19:00:52', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(9, 'PLAYER', 5103, NULL, '2013-02-23 19:00:52', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(10, 'PLAYER', 5103, NULL, '2013-02-23 19:02:03', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(11, 'PLAYER', 5103, NULL, '2013-02-23 19:02:03', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(12, 'PLAYER', 5103, NULL, '2013-02-23 19:03:49', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(13, 'PLAYER', 5103, NULL, '2013-02-23 19:03:49', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(14, 'PLAYER', 5103, NULL, '2013-02-23 19:06:06', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(15, 'PLAYER', 5103, NULL, '2013-02-23 19:06:06', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(16, 'PLAYER', 5103, NULL, '2013-02-23 19:08:06', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(17, 'PLAYER', 5103, NULL, '2013-02-23 19:08:06', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(18, 'PLAYER', 5103, NULL, '2013-02-23 19:08:52', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(19, 'PLAYER', 5103, NULL, '2013-02-23 19:08:52', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(20, 'PLAYER', 5103, NULL, '2013-02-23 19:09:03', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(21, 'PLAYER', 5103, NULL, '2013-02-23 19:09:03', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(22, 'PLAYER', 5103, NULL, '2013-02-23 19:10:48', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(23, 'PLAYER', 5103, NULL, '2013-02-23 19:10:48', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(24, 'PLAYER', 5103, NULL, '2013-02-23 19:11:02', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(25, 'PLAYER', 5103, NULL, '2013-02-23 19:11:02', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(26, 'PLAYER', 5103, NULL, '2013-02-23 19:12:17', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(27, 'PLAYER', 5103, NULL, '2013-02-23 19:12:17', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(28, 'PLAYER', 5103, NULL, '2013-02-23 19:12:36', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(29, 'PLAYER', 5103, NULL, '2013-02-23 19:12:36', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(30, 'PLAYER', 5103, NULL, '2013-02-23 19:13:35', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(31, 'PLAYER', 5103, NULL, '2013-02-23 19:13:35', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(32, 'PLAYER', 5103, NULL, '2013-02-23 19:14:05', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(33, 'PLAYER', 5103, NULL, '2013-02-23 19:14:05', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(34, 'PLAYER', 5103, NULL, '2013-02-23 20:03:00', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(35, 'PLAYER', 5103, NULL, '2013-02-24 08:17:28', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(36, 'USER', 5101, 37, '2013-02-24 08:36:54', 'User Login: chenx'),
	(37, 'SYSPARAM', 5103, 37, '2013-02-24 08:42:55', 'Name : WALL_REWARD_PER_DAY\nValue : 1\n'),
	(38, 'SYSPARAM', 5103, 37, '2013-02-24 08:45:03', 'Name : WALL_REWARD_PER_DAY\nValue : 2\n'),
	(39, 'PLAYER', 5103, NULL, '2013-02-24 08:45:18', 'Player\nNama Depan : Albert\nNama Belakang : Shintra\n'),
	(40, 'USER', 5101, 37, '2013-02-24 09:01:08', 'User Login: chenx'),
	(41, 'USER', 5101, 1, '2013-02-28 19:34:05', 'User Login: administrator'),
	(42, 'USER', 5101, 1, '2013-03-02 22:19:04', 'User Login: administrator'),
	(43, 'USER', 5101, 1, '2013-03-07 18:38:35', 'User Login: administrator'),
	(44, 'USER', 5102, 1, '2013-03-07 18:39:36', 'User : tvalentius\nNama : tvalentius\nGrup : Super User\n'),
	(45, 'USER', 5101, 83, '2013-03-07 18:39:46', 'User Login: tvalentius'),
	(46, 'PLAYER', 5103, NULL, '2013-03-07 18:50:39', 'Player\nNama Depan : \nNama Belakang : \n'),
	(47, 'PLAYER', 5103, NULL, '2013-03-07 18:50:52', 'Player\nNama Depan : \nNama Belakang : \n'),
	(48, 'PLAYER', 5102, NULL, '2013-03-07 18:54:13', 'Player\nNama Depan : Trimikha Valentius\nNama Belakang : Vallie\n'),
	(49, 'PLAYER', 5102, NULL, '2013-03-07 19:06:32', 'Player\nNama Depan : Elizabeth\nNama Belakang : Vallie\n'),
	(50, 'SYSPARAM', 5103, 83, '2013-03-07 19:11:15', 'Name : WALL_REWARD_PER_DAY\nValue : 10\n'),
	(51, 'PLAYER', 5103, NULL, '2013-03-07 19:11:37', 'Player\nNama Depan : Elizabeth\nNama Belakang : Vallie\n'),
	(52, 'PLAYER', 5102, NULL, '2013-03-07 19:16:26', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(53, 'PLAYER', 5103, NULL, '2013-03-07 19:16:41', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(54, 'USER', 5101, 1, '2013-03-10 03:07:30', 'User Login: administrator'),
	(55, 'USER', 5101, 83, '2013-03-10 03:08:37', 'User Login: tvalentius'),
	(56, 'SYSPARAM', 5103, 83, '2013-03-10 05:13:56', 'Name : APP_FLASH_PASSWORD\nValue : roulettemaniacokelatsoft\n'),
	(57, 'USER', 5101, 83, '2013-03-11 08:12:50', 'User Login: tvalentius'),
	(58, 'PLAYER', 5103, NULL, '2013-03-11 22:44:02', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(59, 'PLAYER', 5103, NULL, '2013-03-11 23:15:34', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(60, 'PLAYER', 5103, NULL, '2013-03-11 23:20:46', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(61, 'PLAYER', 5103, NULL, '2013-03-11 23:24:56', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(62, 'PLAYER', 5103, NULL, '2013-03-11 23:36:38', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(63, 'PLAYER', 5103, NULL, '2013-03-11 23:38:37', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(64, 'PLAYER', 5103, NULL, '2013-03-11 23:41:40', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(65, 'PLAYER', 5103, NULL, '2013-03-11 23:56:25', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(66, 'PLAYER', 5103, NULL, '2013-03-11 23:58:04', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(67, 'PLAYER', 5103, NULL, '2013-03-12 00:00:18', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(68, 'PLAYER', 5103, NULL, '2013-03-12 00:04:22', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(69, 'PLAYER', 5103, NULL, '2013-03-12 00:07:26', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(70, 'PLAYER', 5103, NULL, '2013-03-12 00:10:20', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(71, 'PLAYER', 5103, NULL, '2013-03-12 00:10:32', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(72, 'PLAYER', 5103, NULL, '2013-03-12 00:16:06', 'Player\nNama Depan : Cloud\nNama Belakang : Stripe\n'),
	(73, 'USER', 5101, 1, '2013-03-12 00:18:55', 'User Login: administrator');
/*!40000 ALTER TABLE `citemplate_audit_trail` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_contactus
DROP TABLE IF EXISTS `citemplate_contactus`;
CREATE TABLE IF NOT EXISTS `citemplate_contactus` (
  `contactus_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `contactus_name` varchar(50) NOT NULL,
  `contactus_message` text NOT NULL,
  `contactus_phone` varchar(20) NOT NULL,
  `contactus_email` varchar(50) NOT NULL,
  `contactus_lookup_status_id_fk` int(11) NOT NULL,
  `contactus_create_date` datetime NOT NULL,
  PRIMARY KEY (`contactus_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_contactus: 1 rows
/*!40000 ALTER TABLE `citemplate_contactus` DISABLE KEYS */;
REPLACE INTO `citemplate_contactus` (`contactus_id_pk`, `contactus_name`, `contactus_message`, `contactus_phone`, `contactus_email`, `contactus_lookup_status_id_fk`, `contactus_create_date`) VALUES
	(1, 'Trimikha Valentius', 'Terimakasih atas kesempatan saya mengunjungi website ini.\r\nSaya ingin bertanya kapan saya bisa mendapatkan informasi lebih mengenai website ini?\r\n\r\nTerimakasih kembali.', '082143756548', 'tvalentius@gmail.com', 5201, '2012-11-02 11:18:51');
/*!40000 ALTER TABLE `citemplate_contactus` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_images
DROP TABLE IF EXISTS `citemplate_images`;
CREATE TABLE IF NOT EXISTS `citemplate_images` (
  `images_id_pk` int(10) NOT NULL AUTO_INCREMENT,
  `images_name` varchar(50) DEFAULT NULL,
  `images_desc` text,
  `images_filetype` varchar(10) DEFAULT NULL,
  `images_category_lookup_id_fk` int(10) DEFAULT NULL,
  `images_status` tinyint(4) DEFAULT NULL,
  `images_createdate` datetime DEFAULT NULL,
  `images_createby` int(11) DEFAULT NULL,
  PRIMARY KEY (`images_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_images: 3 rows
/*!40000 ALTER TABLE `citemplate_images` DISABLE KEYS */;
REPLACE INTO `citemplate_images` (`images_id_pk`, `images_name`, `images_desc`, `images_filetype`, `images_category_lookup_id_fk`, `images_status`, `images_createdate`, `images_createby`) VALUES
	(15, 'Koala', '<p>The cute koala.</p>', 'jpg', 100009, 1, '2013-02-18 17:54:40', 37),
	(16, 'Tulips', '<p>Beautiful tulips</p>', 'jpg', 100009, 1, '2013-02-18 17:56:00', 37),
	(14, 'Penguins', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 16px;">Penguins are a group of aquatic, flightless birds living almost exclusively in the southern hemisphere, especially in Antarctica.&nbsp;</span><span class="kno-desca" style="color: #999999; text-decoration: initial; cursor: pointer; font-family: arial, sans-serif; font-size: 11px; white-space: nowrap;"><a class="fl q" style="color: #999999; text-decoration: initial; cursor: pointer; font-family: arial, sans-serif; font-size: 11px;" href="http://en.wikipedia.org/wiki/Penguin">Wikipedia</a></span></p>', 'jpg', 100009, 1, '2013-02-16 10:36:20', 37);
/*!40000 ALTER TABLE `citemplate_images` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_item_group
DROP TABLE IF EXISTS `citemplate_item_group`;
CREATE TABLE IF NOT EXISTS `citemplate_item_group` (
  `item_group_id_pk` int(11) NOT NULL,
  `item_group_name` varchar(50) NOT NULL,
  `item_group_desc` text NOT NULL,
  `item_group_depth` int(11) NOT NULL,
  `item_group_parent_id_fk` int(11) NOT NULL,
  `item_group_status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_item_group: 0 rows
/*!40000 ALTER TABLE `citemplate_item_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `citemplate_item_group` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_lookup
DROP TABLE IF EXISTS `citemplate_lookup`;
CREATE TABLE IF NOT EXISTS `citemplate_lookup` (
  `lookup_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `lookup_group_id_fk` int(11) NOT NULL,
  `lookup_name` varchar(50) NOT NULL,
  `lookup_description` text NOT NULL,
  `lookup_status` tinyint(4) NOT NULL,
  `lookup_created_by` int(11) NOT NULL,
  `lookup_created_date` datetime NOT NULL,
  `lookup_updated_by` int(11) NOT NULL,
  `lookup_updated_date` datetime NOT NULL,
  PRIMARY KEY (`lookup_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=100010 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_lookup: 12 rows
/*!40000 ALTER TABLE `citemplate_lookup` DISABLE KEYS */;
REPLACE INTO `citemplate_lookup` (`lookup_id_pk`, `lookup_group_id_fk`, `lookup_name`, `lookup_description`, `lookup_status`, `lookup_created_by`, `lookup_created_date`, `lookup_updated_by`, `lookup_updated_date`) VALUES
	(5101, 5100, 'LOG IN', 'Audit Trail Action : Log In', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5102, 5100, 'INSERT', 'Audit Trail Action : Insert Record to Database', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5103, 5100, 'UPDATE', 'Audit Trail Action : Update Record from Database', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5104, 5100, 'DELETE', 'Audit Trail Action : Delete Record of Database', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5105, 5100, 'UNACTIVATE', 'Audit Trail Action : Unactivate the Record', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5106, 5100, 'RESTORE', 'Audit Trail Action : Restore the unactivated Record', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5201, 5200, 'Unread', 'The Contact has not been read', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5202, 5200, 'Read', 'The Contact Us have been read', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5203, 5200, 'Replied w/ Email', 'The Contact Us have been replied with email', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(5204, 5200, 'Replied w/ Phone', 'The Contact Us have been replied with phone contact', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
	(100008, 3002, 'News', '', 1, 37, '2013-02-16 10:15:19', 0, '0000-00-00 00:00:00'),
	(100009, 3002, 'Common', '', 1, 37, '2013-02-16 10:15:33', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `citemplate_lookup` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_lookupgroup
DROP TABLE IF EXISTS `citemplate_lookupgroup`;
CREATE TABLE IF NOT EXISTS `citemplate_lookupgroup` (
  `lookup_group_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `lookup_group_name` varchar(50) NOT NULL,
  `lookup_group_desc` text NOT NULL,
  `lookup_group_is_static` tinyint(4) NOT NULL,
  `lookup_group_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`lookup_group_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=5201 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_lookupgroup: 3 rows
/*!40000 ALTER TABLE `citemplate_lookupgroup` DISABLE KEYS */;
REPLACE INTO `citemplate_lookupgroup` (`lookup_group_id_pk`, `lookup_group_name`, `lookup_group_desc`, `lookup_group_is_static`, `lookup_group_status`) VALUES
	(5100, 'Audit Trail Action', 'List of Audit Trail type of Action', 1, 1),
	(5200, 'Contact Us Status', 'List of Contact Us Status', 1, 1),
	(3002, 'Images Category', 'List of Images Category', 0, 1);
/*!40000 ALTER TABLE `citemplate_lookupgroup` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_menu
DROP TABLE IF EXISTS `citemplate_menu`;
CREATE TABLE IF NOT EXISTS `citemplate_menu` (
  `menu_id_pk` int(11) NOT NULL,
  `menu_parent_id_fk` int(11) NOT NULL,
  `menu_depth` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_link` varchar(50) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_status` int(11) NOT NULL,
  `menu_is_admin` int(11) NOT NULL,
  PRIMARY KEY (`menu_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_menu: 16 rows
/*!40000 ALTER TABLE `citemplate_menu` DISABLE KEYS */;
REPLACE INTO `citemplate_menu` (`menu_id_pk`, `menu_parent_id_fk`, `menu_depth`, `menu_name`, `menu_link`, `menu_order`, `menu_status`, `menu_is_admin`) VALUES
	(1, 0, 1, 'Home', 'backend', 1, 1, 1),
	(100, 0, 1, 'Access', '#', 2, 1, 1),
	(101, 100, 2, 'User', 'backend/access/user', 1, 1, 1),
	(102, 100, 2, 'Group Role', 'backend/access/group', 2, 1, 1),
	(300, 0, 1, 'System Administration', '#', 4, 1, 1),
	(301, 300, 2, 'Lookup', 'backend/sys_administration/lookup', 1, 0, 1),
	(200, 0, 1, 'Information', '#', 2, 1, 1),
	(201, 200, 2, 'News', 'backend/info/news', 1, 0, 1),
	(302, 300, 2, 'Audit Trail', 'backend/sys_administration/audittrail', 2, 0, 1),
	(303, 300, 2, 'System Parameter', 'backend/sys_administration/sysparam', 3, 1, 1),
	(202, 200, 2, 'Contact Us', 'backend/info/contact', 3, 0, 1),
	(203, 200, 2, 'Images', 'backend/info/images', 2, 0, 1),
	(400, 0, 1, 'Game Maintenance', '#', 3, 1, 1),
	(401, 400, 2, 'Player List', 'backend/game/player', 1, 1, 1),
	(402, 400, 2, 'Score History', 'backend/game/score', 2, 1, 1),
	(403, 400, 2, 'Cash History', 'backend/game/cash', 3, 1, 1);
/*!40000 ALTER TABLE `citemplate_menu` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_news
DROP TABLE IF EXISTS `citemplate_news`;
CREATE TABLE IF NOT EXISTS `citemplate_news` (
  `news_id_pk` int(10) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) DEFAULT NULL,
  `news_teaser` varchar(500) DEFAULT NULL,
  `news_keyword` varchar(500) DEFAULT NULL,
  `news_metadesc` varchar(170) DEFAULT NULL,
  `news_content` text,
  `news_is_hot` tinyint(4) DEFAULT NULL,
  `news_status` int(10) DEFAULT NULL,
  `news_create_date` datetime DEFAULT NULL,
  `news_create_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`news_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_news: 0 rows
/*!40000 ALTER TABLE `citemplate_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `citemplate_news` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_relation_group_role
DROP TABLE IF EXISTS `citemplate_relation_group_role`;
CREATE TABLE IF NOT EXISTS `citemplate_relation_group_role` (
  `relation_group_role_group_id_pk` int(11) NOT NULL,
  `relation_group_role_role_id_pk` varchar(10) NOT NULL,
  `relation_group_role_create_date` datetime NOT NULL,
  PRIMARY KEY (`relation_group_role_group_id_pk`,`relation_group_role_role_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_relation_group_role: 27 rows
/*!40000 ALTER TABLE `citemplate_relation_group_role` DISABLE KEYS */;
REPLACE INTO `citemplate_relation_group_role` (`relation_group_role_group_id_pk`, `relation_group_role_role_id_pk`, `relation_group_role_create_date`) VALUES
	(21, '101-1', '0000-00-00 00:00:00'),
	(1, '102-4', '0000-00-00 00:00:00'),
	(1, '102-3', '0000-00-00 00:00:00'),
	(1, '102-2', '0000-00-00 00:00:00'),
	(1, '102-1', '0000-00-00 00:00:00'),
	(1, '101-4', '0000-00-00 00:00:00'),
	(3, '101-1', '0000-00-00 00:00:00'),
	(2, '403-1', '0000-00-00 00:00:00'),
	(2, '402-1', '0000-00-00 00:00:00'),
	(2, '401-1', '0000-00-00 00:00:00'),
	(3, '102-1', '0000-00-00 00:00:00'),
	(3, '301-1', '0000-00-00 00:00:00'),
	(2, '303-2', '0000-00-00 00:00:00'),
	(2, '303-1', '0000-00-00 00:00:00'),
	(2, '102-4', '0000-00-00 00:00:00'),
	(2, '102-3', '0000-00-00 00:00:00'),
	(2, '102-2', '0000-00-00 00:00:00'),
	(2, '102-1', '0000-00-00 00:00:00'),
	(1, '101-5', '0000-00-00 00:00:00'),
	(1, '101-3', '0000-00-00 00:00:00'),
	(1, '101-2', '0000-00-00 00:00:00'),
	(1, '101-1', '0000-00-00 00:00:00'),
	(2, '101-4', '0000-00-00 00:00:00'),
	(2, '101-5', '0000-00-00 00:00:00'),
	(2, '101-3', '0000-00-00 00:00:00'),
	(2, '101-2', '0000-00-00 00:00:00'),
	(2, '101-1', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `citemplate_relation_group_role` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_relation_images
DROP TABLE IF EXISTS `citemplate_relation_images`;
CREATE TABLE IF NOT EXISTS `citemplate_relation_images` (
  `relation_images_type_name_pk` varchar(50) NOT NULL DEFAULT '',
  `relation_images_type_id_pk` int(11) NOT NULL DEFAULT '0',
  `relation_images_images_id_pk` int(11) NOT NULL DEFAULT '0',
  `relation_images_name` varchar(50) DEFAULT NULL,
  `relation_images_desc` text,
  `relation_images_order` smallint(6) DEFAULT NULL,
  `relation_images_status` tinyint(4) DEFAULT NULL,
  `relation_images_createdate` datetime DEFAULT NULL,
  `relation_images_createby` int(11) DEFAULT NULL,
  PRIMARY KEY (`relation_images_type_name_pk`,`relation_images_type_id_pk`,`relation_images_images_id_pk`),
  KEY `relation_images_type_name_pk_relation_images_type_id_pk` (`relation_images_type_name_pk`,`relation_images_type_id_pk`),
  KEY `relation_images_images_id_pk` (`relation_images_images_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_relation_images: 0 rows
/*!40000 ALTER TABLE `citemplate_relation_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `citemplate_relation_images` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_role_param
DROP TABLE IF EXISTS `citemplate_role_param`;
CREATE TABLE IF NOT EXISTS `citemplate_role_param` (
  `role_param_id_pk` varchar(10) NOT NULL,
  `role_param_menu_id_fk` int(11) NOT NULL,
  `role_param_name` varchar(50) NOT NULL,
  `role_param_desc` varchar(200) NOT NULL,
  `role_param_order` int(11) NOT NULL,
  `role_param_parent` varchar(10) NOT NULL,
  PRIMARY KEY (`role_param_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_role_param: 27 rows
/*!40000 ALTER TABLE `citemplate_role_param` DISABLE KEYS */;
REPLACE INTO `citemplate_role_param` (`role_param_id_pk`, `role_param_menu_id_fk`, `role_param_name`, `role_param_desc`, `role_param_order`, `role_param_parent`) VALUES
	('101-2', 101, 'Insert User', 'User dapat menambah User Baru', 2, '101-1'),
	('101-3', 101, 'Update User', 'User dapat mengubah informasi User', 3, '101-1'),
	('101-4', 101, 'Delete User', 'User dapat menghapus User', 4, '101-1'),
	('101-1', 101, 'View User', 'Parent : Membuka halaman List User', 1, '0'),
	('102-1', 102, 'View Usergroup', 'Parent : Membuka halaman List User Group', 1, '0'),
	('102-2', 102, 'Insert Usergroup', 'Memasukkan User Group yang baru', 2, '102-1'),
	('102-3', 102, 'Update Usergroup', 'User dapat Update Usergroup', 3, '102-1'),
	('102-4', 102, 'Delete Usergroup', 'User dapat menghapus User Group', 4, '102-1'),
	('101-5', 101, 'Update User Password', 'Update Password Login User', 5, '101-3'),
	('301-3', 301, 'Update Lookup', 'Update data Lookup', 3, '301-1'),
	('301-2', 301, 'Insert Lookup', 'Buat data Lookup baru', 2, '301-1'),
	('301-1', 301, 'View Lookup', 'Lihat data Lookup', 1, '0'),
	('301-4', 301, 'Delete Lookup', 'Hapus data Lookup', 4, '301-1'),
	('201-1', 201, 'View News', 'Can View List of News', 1, '0'),
	('201-2', 201, 'Insert News', 'Can Insert new News', 2, '201-1'),
	('201-3', 201, 'Update News', 'Can Update Existing News', 3, '201-1'),
	('201-4', 201, 'Delete News', 'Can Delete / Unactivate Existing News', 4, '201-1'),
	('302-1', 302, 'View Audit Trail', 'View List of Audit Trail of Application', 1, '0'),
	('303-1', 303, 'View Sysparam', 'View System Parameter List', 1, '0'),
	('303-2', 303, 'Update Sysparam', 'Update System Parameter Value', 2, '303-1'),
	('202-1', 202, 'View ContactUs', 'View List of ContactUs', 1, '0'),
	('202-2', 202, 'Update ContactUs Status', 'Update Status of Contact Us', 2, '202-1'),
	('203-1', 203, 'View Images', 'View List of Images', 1, '0'),
	('203-2', 203, 'Update Images', 'Update List of Images', 2, '203-1'),
	('401-1', 401, 'View Player', 'View Player', 1, '0'),
	('402-1', 402, 'View Score History', 'View Score History', 1, '0'),
	('403-1', 403, 'View Cash History', 'View Cash History', 1, '0');
/*!40000 ALTER TABLE `citemplate_role_param` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_sessions
DROP TABLE IF EXISTS `citemplate_sessions`;
CREATE TABLE IF NOT EXISTS `citemplate_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_sessions: 8 rows
/*!40000 ALTER TABLE `citemplate_sessions` DISABLE KEYS */;
REPLACE INTO `citemplate_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('95b0f2feeb2245c9c76d4d41ec75b26b', '::1', 'Shockwave Flash', 1363036295, ''),
	('705f214386fedb783e840da6aa99bcee', '::1', 'Shockwave Flash', 1363037018, ''),
	('52f3e1eda27774f16f883b25d5c471bd', '::1', 'Shockwave Flash', 1363037529, ''),
	('ecb0c31f3351339f9e49fc63da71ca06', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', 1363043745, ''),
	('bc81048e13724f65fe7a1753d79add33', '::1', 'Shockwave Flash', 1363013262, ''),
	('1dee6e75e6832c47b297100565e09c9f', '::1', 'Shockwave Flash', 1363007046, ''),
	('cf1d3bc8585131af6362b217254a0b1f', '::1', 'Shockwave Flash', 1363042640, ''),
	('a91e6ddb1d86efb39578b59d4c69dbdc', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', 1363037182, 'a:1:{s:8:"userdata";a:2:{s:2:"id";s:2:"83";s:6:"sessid";s:32:"e166fa0e5533bd8c5bb81dfa832babaa";}}'),
	('6d4772bfcad3076649b484660fe71ac7', '::1', 'Shockwave Flash', 1363013262, ''),
	('33971c8e2e843486a9056386c1f926cc', '::1', 'Shockwave Flash', 1363015089, ''),
	('36cde92e6ef37c1756aaa9413888a626', '::1', 'Shockwave Flash', 1363035397, ''),
	('f55f6c60236eaced262f3e72a916c44e', '::1', 'Shockwave Flash', 1363035769, ''),
	('19258ad9f0a7c7304ecd731a64e43b0c', '::1', 'Shockwave Flash', 1363040406, ''),
	('d9cedcf9f5087ddec0482b6c128301bc', '::1', 'Shockwave Flash', 1363041211, ''),
	('0ead181ae23738da94c532d8dc13c794', '::1', 'Shockwave Flash', 1363041658, ''),
	('31105f93a79a7b088aaec72241859ab6', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.152 Safari/537.22', 1363041266, ''),
	('40cd85877776cecbbc21b1b6233e3ab5', '::1', 'Shockwave Flash', 1363042963, ''),
	('cf60feb3b70abe62ceb2e573ad07f67f', '::1', 'Shockwave Flash', 1363043379, ''),
	('61eb821bce8f758144814721c9d3072c', '::1', 'Shockwave Flash', 1363043380, ''),
	('98b10c371f13a699058e7cce2ca95c0a', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', 1363044395, 'a:2:{s:9:"user_data";s:0:"";s:8:"userdata";a:2:{s:2:"id";s:1:"1";s:6:"sessid";s:32:"429863ae586d7d1a090a46b7464f4629";}}');
/*!40000 ALTER TABLE `citemplate_sessions` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_sysparam
DROP TABLE IF EXISTS `citemplate_sysparam`;
CREATE TABLE IF NOT EXISTS `citemplate_sysparam` (
  `sysparam_name` varchar(50) NOT NULL,
  `sysparam_desc` text NOT NULL,
  `sysparam_value` varchar(100) NOT NULL,
  `sysparam_regex_format` varchar(50) NOT NULL,
  `sysparam_is_static` tinyint(4) NOT NULL,
  `sysparam_update_by` int(11) NOT NULL,
  `sysparam_update_date` datetime NOT NULL,
  PRIMARY KEY (`sysparam_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_sysparam: 5 rows
/*!40000 ALTER TABLE `citemplate_sysparam` DISABLE KEYS */;
REPLACE INTO `citemplate_sysparam` (`sysparam_name`, `sysparam_desc`, `sysparam_value`, `sysparam_regex_format`, `sysparam_is_static`, `sysparam_update_by`, `sysparam_update_date`) VALUES
	('DEFAULT_LANGUAGE', 'The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia', 'en', '/^en$|^id$/', 0, 37, '2012-11-01 09:58:43'),
	('APP_VERSION', 'Version of Application', '1.0', '', 0, 1, '2012-11-01 10:05:05'),
	('WALL_REWARD_POINT', 'The point reward for posting to Facebook', '100', '', 0, 1, '2013-02-24 14:57:31'),
	('WALL_REWARD_PER_DAY', 'How many the player can have wall reward from posting per day', '10', '', 0, 83, '2013-03-07 19:11:15'),
	('APP_FLASH_PASSWORD', 'Password to match with Flash', 'roulettemaniacokelatsoft', '', 0, 83, '2013-03-10 05:13:56');
/*!40000 ALTER TABLE `citemplate_sysparam` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_user
DROP TABLE IF EXISTS `citemplate_user`;
CREATE TABLE IF NOT EXISTS `citemplate_user` (
  `user_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `user_usergroup_id_fk` int(11) NOT NULL,
  `user_login_name` varchar(15) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_last_login_date` datetime NOT NULL,
  `user_create_date` datetime NOT NULL,
  `user_create_user_id_fk` int(11) NOT NULL,
  `user_update_date` datetime NOT NULL,
  `user_update_user_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`user_id_pk`),
  UNIQUE KEY `user_login_name` (`user_login_name`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_user: 3 rows
/*!40000 ALTER TABLE `citemplate_user` DISABLE KEYS */;
REPLACE INTO `citemplate_user` (`user_id_pk`, `user_usergroup_id_fk`, `user_login_name`, `user_name`, `user_pass`, `user_status`, `user_last_login_date`, `user_create_date`, `user_create_user_id_fk`, `user_update_date`, `user_update_user_id_fk`) VALUES
	(1, 1, 'administrator', 'Administrator', '6797f82f504379e72c59879b12594d39', 1, '2013-03-12 00:18:55', '2012-04-02 00:00:00', 0, '2013-03-12 00:18:55', 0),
	(82, 21, 'watcher', 'Checker', '6797f82f504379e72c59879b12594d39', 1, '0000-00-00 00:00:00', '2012-10-30 15:33:14', 37, '2012-11-27 11:01:03', 37),
	(83, 2, 'tvalentius', 'tvalentius', 'fa3ca468ae3d9359f9512887a4bf3ab5', 1, '2013-03-11 08:12:50', '2013-03-07 18:39:36', 1, '2013-03-11 08:12:50', 0);
/*!40000 ALTER TABLE `citemplate_user` ENABLE KEYS */;


-- Dumping structure for table casino_backend.citemplate_usergroup
DROP TABLE IF EXISTS `citemplate_usergroup`;
CREATE TABLE IF NOT EXISTS `citemplate_usergroup` (
  `usergroup_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `usergroup_name` varchar(20) NOT NULL,
  `usergroup_desc` varchar(200) NOT NULL,
  `usergroup_status` int(11) NOT NULL,
  `usergroup_create_date` datetime NOT NULL,
  `usergroup_create_by_id_fk` int(11) NOT NULL,
  `usergroup_update_date` datetime NOT NULL,
  `usergroup_update_by_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`usergroup_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.citemplate_usergroup: 5 rows
/*!40000 ALTER TABLE `citemplate_usergroup` DISABLE KEYS */;
REPLACE INTO `citemplate_usergroup` (`usergroup_id_pk`, `usergroup_name`, `usergroup_desc`, `usergroup_status`, `usergroup_create_date`, `usergroup_create_by_id_fk`, `usergroup_update_date`, `usergroup_update_by_id_fk`) VALUES
	(1, 'Administrator', 'Group untuk Admin\r\n(Tidak boleh dihapus)', 1, '2012-04-13 16:43:32', 0, '2012-10-25 19:36:21', 1),
	(2, 'Super User', 'Grup yang bisa melakukan segalanya', 1, '0000-00-00 00:00:00', 0, '2012-10-25 19:44:08', 37),
	(3, 'Visitor', 'Tamu / Pengunjung', 0, '0000-00-00 00:00:00', 0, '2012-10-25 19:29:09', 37),
	(21, 'Watcher', 'View Watcher.', 1, '2012-10-25 19:28:00', 37, '2012-10-30 17:03:42', 37),
	(22, 'Supervisor', 'Group of Supervisor', 0, '2012-10-30 17:05:51', 37, '2012-11-01 10:49:47', 37);
/*!40000 ALTER TABLE `citemplate_usergroup` ENABLE KEYS */;


-- Dumping structure for table casino_backend.roulette_cash
DROP TABLE IF EXISTS `roulette_cash`;
CREATE TABLE IF NOT EXISTS `roulette_cash` (
  `cash_id_pk` int(10) NOT NULL AUTO_INCREMENT,
  `cash_player_id_fk` int(10) DEFAULT NULL,
  `cash_log_id_fk` int(10) DEFAULT NULL,
  `cash_type` varchar(10) DEFAULT NULL,
  `cash_point` int(11) DEFAULT NULL,
  `cash_create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`cash_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.roulette_cash: 26 rows
/*!40000 ALTER TABLE `roulette_cash` DISABLE KEYS */;
REPLACE INTO `roulette_cash` (`cash_id_pk`, `cash_player_id_fk`, `cash_log_id_fk`, `cash_type`, `cash_point`, `cash_create_date`) VALUES
	(1, 3, 10, 'lose', -400, '2013-02-23 19:00:52'),
	(2, 3, 11, 'win', 500, '2013-02-23 19:02:03'),
	(3, 3, 12, 'win', 700, '2013-02-23 19:03:49'),
	(4, 3, 13, 'win', 700, '2013-02-23 19:06:06'),
	(5, 3, 14, 'win', 700, '2013-02-23 19:08:06'),
	(6, 3, 15, 'win', 700, '2013-02-23 19:08:52'),
	(7, 3, 16, 'win', 700, '2013-02-23 19:09:03'),
	(8, 3, 17, 'win', 700, '2013-02-23 19:10:48'),
	(9, 3, 18, 'win', 700, '2013-02-23 19:11:02'),
	(10, 3, 19, 'win', 700, '2013-02-23 19:12:17'),
	(11, 3, 20, 'win', 700, '2013-02-23 19:12:36'),
	(12, 3, 21, 'lose', -300, '2013-02-23 19:13:35'),
	(13, 3, 22, 'lose', -300, '2013-02-23 19:14:05'),
	(15, 3, 24, 'fbwall', 100, '2013-02-23 19:57:58'),
	(16, 3, 25, 'fbwall', 100, '2013-02-23 20:00:22'),
	(17, 3, 26, 'fbwall', 100, '2013-02-23 20:01:41'),
	(18, 3, 27, 'fbwall', 100, '2013-02-23 20:03:00'),
	(19, 3, 28, 'fbwall', 100, '2013-02-24 08:17:28'),
	(20, 3, 29, 'fbwall', 100, '2013-02-24 08:45:18'),
	(21, NULL, 30, 'fbwall', 100, '2013-03-07 18:50:39'),
	(22, NULL, 31, 'fbwall', 100, '2013-03-07 18:50:52'),
	(23, 5, 32, 'fbwall', 100, '2013-03-07 19:11:37'),
	(24, 6, 33, 'fbwall', 100, '2013-03-07 19:16:41'),
	(25, 6, 34, 'fbwall', 100, '2013-03-10 05:19:06'),
	(26, 0, 35, 'fbwall', 100, '2013-03-11 08:12:19'),
	(27, 6, 36, 'fbwall', 100, '2013-03-11 11:08:28'),
	(28, 6, 37, 'Lose', 0, '2013-03-11 22:44:02'),
	(29, 6, 38, 'Win', 10, '2013-03-11 23:15:34'),
	(30, 6, 39, 'Win', 25, '2013-03-11 23:20:46'),
	(31, 6, 40, 'Lose', 0, '2013-03-11 23:24:56'),
	(32, 6, 41, 'Lose', -20, '2013-03-11 23:36:38'),
	(33, 6, 42, 'Win', 10, '2013-03-11 23:38:37'),
	(34, 6, 43, 'Win', 10, '2013-03-11 23:41:40'),
	(35, 6, 44, 'Win', 10, '2013-03-11 23:56:25'),
	(36, 6, 45, 'Lose', -20, '2013-03-11 23:58:04'),
	(37, 6, 46, 'Lose', 0, '2013-03-12 00:00:18'),
	(38, 6, 47, 'Lose', 0, '2013-03-12 00:04:22'),
	(39, 6, 48, 'Lose', 0, '2013-03-12 00:07:26'),
	(40, 6, 49, 'Lose', 0, '2013-03-12 00:10:20'),
	(41, 6, 50, 'Lose', -20, '2013-03-12 00:10:32'),
	(42, 6, 51, 'Win', 10, '2013-03-12 00:16:06');
/*!40000 ALTER TABLE `roulette_cash` ENABLE KEYS */;


-- Dumping structure for table casino_backend.roulette_gamelog
DROP TABLE IF EXISTS `roulette_gamelog`;
CREATE TABLE IF NOT EXISTS `roulette_gamelog` (
  `gamelog_id_pk` int(10) NOT NULL AUTO_INCREMENT,
  `gamelog_player_id_fk` int(10) DEFAULT NULL,
  `gamelog_type` varchar(10) DEFAULT NULL,
  `gamelog_note` varchar(100) DEFAULT NULL,
  `gamelog_status` tinyint(4) DEFAULT NULL,
  `gamelog_create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`gamelog_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.roulette_gamelog: 28 rows
/*!40000 ALTER TABLE `roulette_gamelog` DISABLE KEYS */;
REPLACE INTO `roulette_gamelog` (`gamelog_id_pk`, `gamelog_player_id_fk`, `gamelog_type`, `gamelog_note`, `gamelog_status`, `gamelog_create_date`) VALUES
	(9, 3, 'game', NULL, 1, '2013-02-23 18:49:11'),
	(8, 3, 'game', NULL, 1, '2013-02-23 18:40:09'),
	(10, 3, 'game', NULL, 1, '2013-02-23 19:00:31'),
	(11, 3, 'game', NULL, 1, '2013-02-23 19:01:29'),
	(12, 3, 'game', NULL, 1, '2013-02-23 19:03:19'),
	(13, 3, 'game', NULL, 1, '2013-02-23 19:05:56'),
	(14, 3, 'game', NULL, 1, '2013-02-23 19:08:03'),
	(15, 3, 'game', NULL, 1, '2013-02-23 19:08:49'),
	(16, 3, 'game', NULL, 1, '2013-02-23 19:09:00'),
	(17, 3, 'game', NULL, 1, '2013-02-23 19:10:43'),
	(18, 3, 'game', NULL, 1, '2013-02-23 19:10:59'),
	(19, 3, 'game', NULL, 1, '2013-02-23 19:12:11'),
	(20, 3, 'game', NULL, 1, '2013-02-23 19:12:32'),
	(21, 3, 'game', NULL, 1, '2013-02-23 19:13:32'),
	(22, 3, 'game', NULL, 1, '2013-02-23 19:13:44'),
	(24, 3, 'fbwall', '776923827_156996721124468', 1, '2013-02-23 19:57:58'),
	(25, 3, 'fbwall', 'POSTID: 776923827_333300640104095', 1, '2013-02-23 20:00:22'),
	(26, 3, 'fbwall', 'POSTID: 776923827_432620200149772', 1, '2013-02-23 20:01:41'),
	(27, 3, 'fbwall', 'POSTID: 776923827_145912425574507', 1, '2013-02-23 20:03:00'),
	(28, 3, 'fbwall', 'POSTID: 776923827_134209570086212', 1, '2013-02-24 08:17:28'),
	(29, 3, 'fbwall', 'POSTID: 776923827_427964950619751', 1, '2013-02-24 08:45:18'),
	(30, NULL, 'fbwall', 'POSTID: 100003753977679_620942454589784', 1, '2013-03-07 18:50:39'),
	(31, NULL, 'fbwall', 'POSTID: 100003753977679_620394597978107', 1, '2013-03-07 18:50:52'),
	(32, 5, 'fbwall', 'POSTID: 100001600497755_461173210621619', 1, '2013-03-07 19:11:37'),
	(33, 6, 'fbwall', 'POSTID: 100003753977679_426186164134510', 1, '2013-03-07 19:16:41'),
	(34, 6, 'fbwall', 'POSTID: 100003753977679_422931274463744', 1, '2013-03-10 05:19:06'),
	(35, 0, 'fbwall', 'POSTID: 100003753977679_582494091760937', 1, '2013-03-11 08:12:19'),
	(36, 6, 'fbwall', 'POSTID: 100003753977679_567296379954706', 1, '2013-03-11 11:08:28'),
	(51, 6, 'game', '51|result:6', 0, '2013-03-12 00:15:55');
/*!40000 ALTER TABLE `roulette_gamelog` ENABLE KEYS */;


-- Dumping structure for table casino_backend.roulette_player
DROP TABLE IF EXISTS `roulette_player`;
CREATE TABLE IF NOT EXISTS `roulette_player` (
  `player_id_pk` int(10) NOT NULL AUTO_INCREMENT,
  `player_fbid` varchar(50) DEFAULT NULL,
  `player_firstname` varchar(50) DEFAULT NULL,
  `player_lastname` varchar(50) DEFAULT NULL,
  `player_email` varchar(50) DEFAULT NULL,
  `player_city` varchar(50) DEFAULT NULL,
  `player_score` int(11) DEFAULT NULL,
  `player_cash` int(11) DEFAULT NULL,
  `player_cashwin` int(11) DEFAULT NULL,
  `player_cashlose` int(11) DEFAULT NULL,
  `player_status` tinyint(4) DEFAULT NULL,
  `player_logindate` datetime DEFAULT NULL,
  `player_playdate` datetime DEFAULT NULL,
  `player_joindate` datetime DEFAULT NULL,
  PRIMARY KEY (`player_id_pk`),
  UNIQUE KEY `player_fbid` (`player_fbid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.roulette_player: 3 rows
/*!40000 ALTER TABLE `roulette_player` DISABLE KEYS */;
REPLACE INTO `roulette_player` (`player_id_pk`, `player_fbid`, `player_firstname`, `player_lastname`, `player_email`, `player_city`, `player_score`, `player_cash`, `player_cashwin`, `player_cashlose`, `player_status`, `player_logindate`, `player_playdate`, `player_joindate`) VALUES
	(4, '100001748877562', 'Trimikha Valentius', 'Vallie', 'chocoro.bokun@gmail.com', NULL, 300, 300, NULL, NULL, 1, '2013-03-07 18:54:13', NULL, '2013-03-07 18:54:13'),
	(5, '100001600497755', 'Elizabeth', 'Vallie', 'elizabethtatyana@gmail.com', 'Jakarta, Indonesia', NULL, 100, NULL, NULL, 1, '2013-03-07 19:06:32', NULL, '2013-03-07 19:06:32'),
	(6, '100003753977679', 'Cloud', 'Stripe', 'chocorobokun_xp@yahoo.com', NULL, 1500, 100, NULL, NULL, 1, '2013-03-07 19:16:26', '2013-03-12 00:16:06', '2013-03-07 19:16:26');
/*!40000 ALTER TABLE `roulette_player` ENABLE KEYS */;


-- Dumping structure for table casino_backend.roulette_score
DROP TABLE IF EXISTS `roulette_score`;
CREATE TABLE IF NOT EXISTS `roulette_score` (
  `score_id_pk` int(10) NOT NULL AUTO_INCREMENT,
  `score_player_id_fk` int(10) DEFAULT NULL,
  `score_log_id_fk` int(10) DEFAULT NULL,
  `score_type` varchar(10) DEFAULT NULL,
  `score_point` int(10) DEFAULT NULL,
  `score_create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`score_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table casino_backend.roulette_score: 15 rows
/*!40000 ALTER TABLE `roulette_score` DISABLE KEYS */;
REPLACE INTO `roulette_score` (`score_id_pk`, `score_player_id_fk`, `score_log_id_fk`, `score_type`, `score_point`, `score_create_date`) VALUES
	(2, 3, 8, 'win', 50, '2013-02-23 18:44:51'),
	(3, 3, 9, 'lose', 10, '2013-02-23 18:49:47'),
	(4, 3, 10, 'lose', 400, '2013-02-23 19:00:52'),
	(5, 3, 11, 'win', 1000, '2013-02-23 19:02:03'),
	(6, 3, 12, 'win', 700, '2013-02-23 19:03:49'),
	(7, 3, 13, 'win', 700, '2013-02-23 19:06:06'),
	(8, 3, 14, 'win', 700, '2013-02-23 19:08:06'),
	(9, 3, 15, 'win', 700, '2013-02-23 19:08:52'),
	(10, 3, 16, 'win', 700, '2013-02-23 19:09:03'),
	(11, 3, 17, 'win', 700, '2013-02-23 19:10:48'),
	(12, 3, 18, 'win', 700, '2013-02-23 19:11:02'),
	(13, 3, 19, 'win', 700, '2013-02-23 19:12:17'),
	(14, 3, 20, 'win', 700, '2013-02-23 19:12:36'),
	(15, 3, 21, 'lose', 300, '2013-02-23 19:13:35'),
	(16, 3, 22, 'lose', 300, '2013-02-23 19:14:05'),
	(17, 6, 37, 'Lose', 100, '2013-03-11 22:44:02'),
	(18, 6, 38, 'Win', 100, '2013-03-11 23:15:34'),
	(19, 6, 39, 'Win', 100, '2013-03-11 23:20:46'),
	(20, 6, 40, 'Lose', 100, '2013-03-11 23:24:56'),
	(21, 6, 41, 'Lose', 100, '2013-03-11 23:36:38'),
	(22, 6, 42, 'Win', 100, '2013-03-11 23:38:37'),
	(23, 6, 43, 'Win', 100, '2013-03-11 23:41:40'),
	(24, 6, 44, 'Win', 100, '2013-03-11 23:56:25'),
	(25, 6, 45, 'Lose', 100, '2013-03-11 23:58:04'),
	(26, 6, 46, 'Lose', 100, '2013-03-12 00:00:18'),
	(27, 6, 47, 'Lose', 100, '2013-03-12 00:04:22'),
	(28, 6, 48, 'Lose', 100, '2013-03-12 00:07:26'),
	(29, 6, 49, 'Lose', 100, '2013-03-12 00:10:20'),
	(30, 6, 50, 'Lose', 100, '2013-03-12 00:10:32'),
	(31, 6, 51, 'Win', 100, '2013-03-12 00:16:06');
/*!40000 ALTER TABLE `roulette_score` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
