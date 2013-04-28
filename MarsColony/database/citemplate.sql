-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 09. Nopember 2012 jam 16:56
-- Versi Server: 5.1.33
-- Versi PHP: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `citemplate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_audit_trail`
--

CREATE TABLE IF NOT EXISTS `citemplate_audit_trail` (
  `audit_trail_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `audit_trail_module` varchar(50) NOT NULL,
  `audit_trail_action_lookup_id_fk` int(11) NOT NULL,
  `audit_trail_create_by_id_fk` int(11) DEFAULT NULL,
  `audit_trail_create_date` datetime DEFAULT NULL,
  `audit_trail_value` text,
  PRIMARY KEY (`audit_trail_id_pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data untuk tabel `citemplate_audit_trail`
--

INSERT INTO `citemplate_audit_trail` (`audit_trail_id_pk`, `audit_trail_module`, `audit_trail_action_lookup_id_fk`, `audit_trail_create_by_id_fk`, `audit_trail_create_date`, `audit_trail_value`) VALUES
(1, 'USER', 5102, 37, '2012-10-30 15:33:14', 'User : watcher\nNama : Watcher\nGrup : \n'),
(2, 'USER', 5103, 37, '2012-10-30 16:20:32', 'User : watcher\nNama : Pengecek\nGrup : Watcher\n'),
(3, 'USER', 5105, 37, '2012-10-30 16:53:35', 'User : watcher\nNama : Pengecek\nGrup : Watcher\n'),
(4, 'USER', 5106, 37, '2012-10-30 16:53:51', 'User : watcher\nNama : Pengecek\nGrup : Watcher\n'),
(5, 'USER', 5103, 37, '2012-10-30 16:55:16', 'Ubah Password watcher'),
(6, 'USER', 5103, 37, '2012-10-30 16:57:14', 'User : chenx\nNama : Albert\nGrup : Super User\n'),
(7, 'USER', 5103, 37, '2012-10-30 16:57:47', 'Ubah Password chenx'),
(11, 'USERGROUP', 5105, 37, '2012-10-30 17:03:00', 'Nama : Watcher\nDeskripsi : View Watcher.\n'),
(12, 'USERGROUP', 5106, 37, '2012-10-30 17:03:42', 'Nama : Watcher\nDeskripsi : View Watcher.\n'),
(13, 'USERGROUP', 5102, 37, '2012-10-30 17:05:51', 'Nama : Supervisor\nDeskripsi : \n'),
(14, 'USERGROUP', 5103, 37, '2012-10-30 17:06:03', 'Nama : Supervisor\nDeskripsi : Group of Supervisor\n'),
(17, 'USER', 5101, 37, '2012-10-30 17:15:35', 'User Login: Albert'),
(18, 'NEWS', 5102, 37, '2012-10-30 17:20:25', 'Title : I am Testing News\n'),
(19, 'NEWS', 5103, 37, '2012-10-30 17:20:44', 'Title : I''m Testing New\n'),
(20, 'NEWS', 5105, 37, '2012-10-30 17:20:49', 'Title : I''m Testing New\n'),
(21, 'NEWS', 5103, 37, '2012-10-30 17:21:50', 'Title : I''m Testing New\n set to Hot'),
(22, 'NEWS', 5103, 37, '2012-10-30 17:22:04', 'Title : Chenx Codeigniter Template is Coming!\n set to Hot'),
(23, 'USER', 5101, 37, '2012-10-31 10:54:47', 'User Login: Albert'),
(24, 'LOOKUP', 5102, 37, '2012-10-31 11:00:05', 'Name : \nDesc : \nGroup : \n'),
(25, 'LOOKUP', 5103, 37, '2012-10-31 11:00:11', 'Name : \nDesc : \nGroup : \n'),
(26, 'LOOKUP', 5105, 37, '2012-10-31 11:00:13', 'Name : \nDesc : \nGroup : \n'),
(27, 'LOOKUP', 5103, 37, '2012-10-31 11:01:33', 'Name : \nDesc : \nGroup : \n'),
(28, 'USER', 5101, 37, '2012-10-31 12:47:20', 'User Login: Albert'),
(29, 'USER', 5101, 37, '2012-10-31 12:47:33', 'User Login: Albert'),
(30, 'LOOKUP', 5103, 37, '2012-10-31 12:47:56', 'Name : Hindusm\nDesc : \nGroup : Religion\n'),
(31, 'LOOKUP', 5102, 37, '2012-10-31 12:48:23', 'Name : Zen\nDesc : Agama yang damai\nGroup : Religion\n'),
(32, 'LOOKUP', 5103, 37, '2012-10-31 12:48:33', 'Name : Zen\nDesc : Ajaran yang damai\nGroup : Religion\n'),
(33, 'LOOKUP', 5105, 37, '2012-10-31 12:48:35', 'Name : Zen\nDesc : Ajaran yang damai\nGroup : Religion\n'),
(34, 'LOOKUP', 5106, 37, '2012-10-31 12:48:46', 'Name : Zen\nDesc : Ajaran yang damai\nGroup : Religion\n'),
(35, 'USER', 5101, 37, '2012-10-31 12:52:47', 'User Login: chenx'),
(36, 'USER', 5101, 1, '2012-10-31 13:03:06', 'User Login: administrator'),
(37, 'USER', 5103, 1, '2012-10-31 13:03:14', 'User : chenx\nNama : Albert Mulia Shintra\nGrup : Super User\n'),
(38, 'USER', 5101, 37, '2012-10-31 13:03:21', 'User Login: chenx'),
(39, 'USER', 5103, 37, '2012-10-31 13:34:40', 'User : watcher\nNama : Checker\nGrup : Watcher\n'),
(40, 'SYSPARAM', 5103, 37, '2012-10-31 16:15:32', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(41, 'SYSPARAM', 5103, 37, '2012-10-31 16:16:40', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(42, 'SYSPARAM', 5103, 37, '2012-10-31 16:16:45', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(43, 'SYSPARAM', 5103, 37, '2012-10-31 16:16:50', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(44, 'SYSPARAM', 5103, 37, '2012-10-31 16:20:08', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(45, 'SYSPARAM', 5103, 37, '2012-10-31 16:20:20', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(46, 'SYSPARAM', 5103, 37, '2012-10-31 16:20:28', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(47, 'SYSPARAM', 5103, 37, '2012-10-31 16:20:38', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(48, 'SYSPARAM', 5103, 37, '2012-10-31 16:26:24', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(49, 'SYSPARAM', 5103, 37, '2012-10-31 16:26:30', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(50, 'NEWS', 5103, 37, '2012-10-31 16:27:24', 'Title : Chenx Codeigniter Template is Coming!\n set to Hot'),
(51, 'NEWS', 5103, 37, '2012-10-31 16:27:31', 'Title : Chenx Codeigniter Template is Coming!\n set to Hot'),
(52, 'NEWS', 5103, 37, '2012-10-31 16:32:31', 'Title : Chenx Codeigniter Template is Coming!\n set to Hot'),
(53, 'NEWS', 5103, 37, '2012-10-31 16:32:33', 'Title : Chenx Codeigniter Template is Coming!\n set to Hot'),
(54, 'NEWS', 5103, 37, '2012-10-31 16:32:35', 'Title : I''m Testing New\n set to Hot'),
(55, 'NEWS', 5103, 37, '2012-10-31 16:35:48', 'Title : Chenx Codeigniter Template is Coming!\n set to Hot'),
(56, 'NEWS', 5103, 37, '2012-10-31 16:37:57', 'Title : Chenx Codeigniter Template is Coming!\n set to Hot'),
(57, 'SYSPARAM', 5103, 37, '2012-10-31 17:33:35', 'Name : DEFAULT_LANGUAGE\nDesc : The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia\nGroup : \n'),
(58, 'LOOKUP', 5103, 37, '2012-10-31 17:35:18', 'Name : Hinduism\nDesc : \nGroup : Religion\n'),
(59, 'USER', 5101, 37, '2012-11-01 09:57:13', 'User Login: chenx'),
(60, 'SYSPARAM', 5103, 37, '2012-11-01 09:58:43', 'Name : DEFAULT_LANGUAGE\nValue : en\n'),
(61, 'USER', 5101, 37, '2012-11-01 10:24:41', 'User Login: chenx'),
(62, 'USER', 5101, 37, '2012-11-01 10:25:03', 'User Login: chenx'),
(63, 'USER', 5101, 37, '2012-11-01 10:27:11', 'User Login: chenx'),
(64, 'USER', 5101, 37, '2012-11-01 10:27:34', 'User Login: chenx'),
(65, 'USER', 5101, 37, '2012-11-01 10:28:40', 'User Login: chenx'),
(66, 'USER', 5101, 37, '2012-11-01 10:46:59', 'User Login: chenx'),
(67, 'USER', 5101, 37, '2012-11-01 10:47:32', 'User Login: chenx'),
(68, 'USERGROUP', 5105, 37, '2012-11-01 10:49:47', 'Nama : Supervisor\nDeskripsi : Group of Supervisor\n'),
(69, 'USER', 5101, 37, '2012-11-01 12:09:55', 'User Login: chenx'),
(70, 'USER', 5101, 37, '2012-11-01 13:56:36', 'User Login: chenx'),
(71, 'USER', 5101, 37, '2012-11-01 14:43:52', 'User Login: chenx'),
(72, 'USER', 5101, 37, '2012-11-01 18:27:54', 'User Login: chenx'),
(73, 'USER', 5101, 37, '2012-11-02 11:14:30', 'User Login: chenx'),
(74, 'CONTACT US', 5103, 37, '2012-11-02 16:03:35', 'Nama : Albert Mulia Shintra\nPesan : Terimakasih atas kesempatan saya mengunjungi website ini.\r\nSaya ingin bertanya kapan saya bisa mendapatkan informasi lebih mengenai website ini?\r\n\r\nTerimakasih kembali.\nStatus : Read\n'),
(75, 'CONTACT US', 5103, 37, '2012-11-02 16:03:43', 'Nama : Albert Mulia Shintra\nPesan : Terimakasih atas kesempatan saya mengunjungi website ini.\r\nSaya ingin bertanya kapan saya bisa mendapatkan informasi lebih mengenai website ini?\r\n\r\nTerimakasih kembali.\nStatus : Replied w/ Email\n'),
(76, 'CONTACT US', 5103, 37, '2012-11-02 16:03:48', 'Nama : Albert Mulia Shintra\nPesan : Terimakasih atas kesempatan saya mengunjungi website ini.\r\nSaya ingin bertanya kapan saya bisa mendapatkan informasi lebih mengenai website ini?\r\n\r\nTerimakasih kembali.\nStatus : Replied w/ Phone\n'),
(77, 'USER', 5101, 37, '2012-11-05 14:07:57', 'User Login: chenx'),
(78, 'USER', 5101, 37, '2012-12-01 10:43:05', 'User Login: chenx'),
(79, 'NEWS', 5102, 37, '2012-12-01 11:28:01', 'Title : Welcome to Our New Homepage\n'),
(80, 'USER', 5101, 37, '2012-11-09 10:50:05', 'User Login: chenx'),
(81, 'USER', 5101, 37, '2012-11-09 11:15:41', 'User Login: chenx'),
(82, 'USER', 5101, 1, '2012-11-09 11:16:12', 'User Login: administrator'),
(83, 'USER', 5101, 37, '2012-11-09 14:21:22', 'User Login: chenx'),
(84, 'USER', 5101, 1, '2012-11-09 14:21:34', 'User Login: administrator'),
(85, 'USER', 5101, 37, '2012-11-09 14:24:07', 'User Login: chenx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_contactus`
--

CREATE TABLE IF NOT EXISTS `citemplate_contactus` (
  `contactus_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `contactus_name` varchar(50) NOT NULL,
  `contactus_message` text NOT NULL,
  `contactus_phone` varchar(20) NOT NULL,
  `contactus_email` varchar(50) NOT NULL,
  `contactus_lookup_status_id_fk` int(11) NOT NULL,
  `contactus_create_date` datetime NOT NULL,
  PRIMARY KEY (`contactus_id_pk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `citemplate_contactus`
--

INSERT INTO `citemplate_contactus` (`contactus_id_pk`, `contactus_name`, `contactus_message`, `contactus_phone`, `contactus_email`, `contactus_lookup_status_id_fk`, `contactus_create_date`) VALUES
(1, 'Albert Mulia Shintra', 'Terimakasih atas kesempatan saya mengunjungi website ini.\r\nSaya ingin bertanya kapan saya bisa mendapatkan informasi lebih mengenai website ini?\r\n\r\nTerimakasih kembali.', '085717934356', 'chenx.phyt@gmail.com', 5204, '2012-11-02 11:18:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_item_group`
--

CREATE TABLE IF NOT EXISTS `citemplate_item_group` (
  `item_group_id_pk` int(11) NOT NULL,
  `item_group_name` varchar(50) NOT NULL,
  `item_group_desc` text NOT NULL,
  `item_group_depth` int(11) NOT NULL,
  `item_group_parent_id_fk` int(11) NOT NULL,
  `item_group_status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `citemplate_item_group`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_lookup`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100008 ;

--
-- Dumping data untuk tabel `citemplate_lookup`
--

INSERT INTO `citemplate_lookup` (`lookup_id_pk`, `lookup_group_id_fk`, `lookup_name`, `lookup_description`, `lookup_status`, `lookup_created_by`, `lookup_created_date`, `lookup_updated_by`, `lookup_updated_date`) VALUES
(5101, 5100, 'LOG IN', 'Audit Trail Action : Log In', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5102, 5100, 'INSERT', 'Audit Trail Action : Insert Record to Database', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5103, 5100, 'UPDATE', 'Audit Trail Action : Update Record from Database', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5104, 5100, 'DELETE', 'Audit Trail Action : Delete Record of Database', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(100001, 3001, 'Islam', '', 1, 37, '2012-10-30 11:38:06', 0, '0000-00-00 00:00:00'),
(100002, 3001, 'Kristen', '', 1, 37, '2012-10-30 11:38:35', 0, '0000-00-00 00:00:00'),
(100003, 3001, 'Katholik', '', 1, 37, '2012-10-30 11:38:43', 0, '0000-00-00 00:00:00'),
(100004, 3001, 'Buddha', '', 1, 37, '2012-10-30 11:38:50', 0, '0000-00-00 00:00:00'),
(100005, 3001, 'Hinduism', '', 1, 37, '2012-10-30 11:38:56', 37, '2012-10-31 17:35:18'),
(5105, 5100, 'UNACTIVATE', 'Audit Trail Action : Unactivate the Record', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5106, 5100, 'RESTORE', 'Audit Trail Action : Restore the unactivated Record', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(100006, 3001, 'Atheism', 'Tidak beragama', 0, 37, '2012-10-31 11:00:05', 37, '2012-10-31 11:01:33'),
(100007, 3001, 'Zen', 'Ajaran yang damai', 1, 37, '2012-10-31 12:48:22', 37, '2012-10-31 12:48:46'),
(5201, 5200, 'Unread', 'The Contact has not been read', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5202, 5200, 'Read', 'The Contact Us have been read', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5203, 5200, 'Replied w/ Email', 'The Contact Us have been replied with email', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(5204, 5200, 'Replied w/ Phone', 'The Contact Us have been replied with phone contact', 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_lookupgroup`
--

CREATE TABLE IF NOT EXISTS `citemplate_lookupgroup` (
  `lookup_group_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `lookup_group_name` varchar(50) NOT NULL,
  `lookup_group_desc` text NOT NULL,
  `lookup_group_is_static` tinyint(4) NOT NULL,
  `lookup_group_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`lookup_group_id_pk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5201 ;

--
-- Dumping data untuk tabel `citemplate_lookupgroup`
--

INSERT INTO `citemplate_lookupgroup` (`lookup_group_id_pk`, `lookup_group_name`, `lookup_group_desc`, `lookup_group_is_static`, `lookup_group_status`) VALUES
(3001, 'Religion', 'List of Religion', 0, 1),
(5100, 'Audit Trail Action', 'List of Audit Trail type of Action', 1, 1),
(5200, 'Contact Us Status', 'List of Contact Us Status', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_menu`
--

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

--
-- Dumping data untuk tabel `citemplate_menu`
--

INSERT INTO `citemplate_menu` (`menu_id_pk`, `menu_parent_id_fk`, `menu_depth`, `menu_name`, `menu_link`, `menu_order`, `menu_status`, `menu_is_admin`) VALUES
(1, 0, 1, 'Home', 'backend', 1, 1, 1),
(100, 0, 1, 'Access', '#', 2, 1, 1),
(101, 100, 2, 'User', 'backend/access/user', 1, 1, 1),
(102, 100, 2, 'Group Role', 'backend/access/group', 2, 1, 1),
(300, 0, 1, 'System Administration', '#', 3, 1, 1),
(301, 300, 2, 'Lookup', 'backend/sys_administration/lookup', 1, 1, 1),
(200, 0, 1, 'Information', '#', 2, 1, 1),
(201, 200, 2, 'News', 'backend/info/news', 1, 1, 1),
(302, 300, 2, 'Audit Trail', 'backend/sys_administration/audittrail', 2, 1, 1),
(303, 300, 2, 'System Parameter', 'backend/sys_administration/sysparam', 3, 1, 1),
(202, 200, 2, 'Contact Us', 'backend/info/contact', 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_news`
--

CREATE TABLE IF NOT EXISTS `citemplate_news` (
  `news_id_pk` int(10) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) DEFAULT NULL,
  `news_teaser` varchar(500) DEFAULT NULL,
  `news_keyword` varchar(500) DEFAULT NULL,
  `news_content` text,
  `news_is_hot` tinyint(4) DEFAULT NULL,
  `news_status` int(10) DEFAULT NULL,
  `news_create_date` datetime DEFAULT NULL,
  `news_create_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`news_id_pk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `citemplate_news`
--

INSERT INTO `citemplate_news` (`news_id_pk`, `news_title`, `news_teaser`, `news_keyword`, `news_content`, `news_is_hot`, `news_status`, `news_create_date`, `news_create_by`) VALUES
(1, 'Chenx Codeigniter Template is Coming!', 'Great Hello to the new and super simple development process from Chenx Codeigniter Template!', 'chenx codeigniter ci template', 'Hello All,\r\n\r\nit''s my great pleasure to introduce you the new and promising template from ChenX. I have developed my own style that also cooperating with Codeigniter Template.\r\n\r\nI hope you can enjoy it, and of course it is free.\r\n\r\nChenX', 1, 1, '2012-10-24 20:47:38', 37),
(2, 'I''m Testing New', 'Just Test', 'just test', 'I am just Testing News, please Ignore.', 0, 0, '2012-10-30 17:20:25', 37),
(3, 'Welcome to Our New Homepage', 'Hello Everybody, let''s welcome!', 'welcome to our new', 'Hello Everybody, let''s welcome!', NULL, 1, '2012-12-01 11:28:01', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_relation_group_role`
--

CREATE TABLE IF NOT EXISTS `citemplate_relation_group_role` (
  `relation_group_role_group_id_pk` int(11) NOT NULL,
  `relation_group_role_role_id_pk` varchar(10) NOT NULL,
  `relation_group_role_create_date` datetime NOT NULL,
  PRIMARY KEY (`relation_group_role_group_id_pk`,`relation_group_role_role_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `citemplate_relation_group_role`
--

INSERT INTO `citemplate_relation_group_role` (`relation_group_role_group_id_pk`, `relation_group_role_role_id_pk`, `relation_group_role_create_date`) VALUES
(2, '303-1', '0000-00-00 00:00:00'),
(2, '302-1', '0000-00-00 00:00:00'),
(2, '301-4', '0000-00-00 00:00:00'),
(21, '101-1', '0000-00-00 00:00:00'),
(1, '102-4', '0000-00-00 00:00:00'),
(1, '102-3', '0000-00-00 00:00:00'),
(1, '102-2', '0000-00-00 00:00:00'),
(1, '102-1', '0000-00-00 00:00:00'),
(1, '101-4', '0000-00-00 00:00:00'),
(3, '101-1', '0000-00-00 00:00:00'),
(2, '301-3', '0000-00-00 00:00:00'),
(2, '301-2', '0000-00-00 00:00:00'),
(2, '301-1', '0000-00-00 00:00:00'),
(2, '202-2', '0000-00-00 00:00:00'),
(2, '202-1', '0000-00-00 00:00:00'),
(2, '201-4', '0000-00-00 00:00:00'),
(2, '201-3', '0000-00-00 00:00:00'),
(2, '201-2', '0000-00-00 00:00:00'),
(2, '201-1', '0000-00-00 00:00:00'),
(2, '102-4', '0000-00-00 00:00:00'),
(3, '102-1', '0000-00-00 00:00:00'),
(3, '301-1', '0000-00-00 00:00:00'),
(2, '102-3', '0000-00-00 00:00:00'),
(2, '102-2', '0000-00-00 00:00:00'),
(2, '102-1', '0000-00-00 00:00:00'),
(2, '101-4', '0000-00-00 00:00:00'),
(2, '101-5', '0000-00-00 00:00:00'),
(2, '101-1', '0000-00-00 00:00:00'),
(1, '101-5', '0000-00-00 00:00:00'),
(1, '101-3', '0000-00-00 00:00:00'),
(1, '101-2', '0000-00-00 00:00:00'),
(1, '101-1', '0000-00-00 00:00:00'),
(2, '101-2', '0000-00-00 00:00:00'),
(2, '101-3', '0000-00-00 00:00:00'),
(2, '303-2', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_role_param`
--

CREATE TABLE IF NOT EXISTS `citemplate_role_param` (
  `role_param_id_pk` varchar(10) NOT NULL,
  `role_param_menu_id_fk` int(11) NOT NULL,
  `role_param_name` varchar(50) NOT NULL,
  `role_param_desc` varchar(200) NOT NULL,
  `role_param_order` int(11) NOT NULL,
  `role_param_parent` varchar(10) NOT NULL,
  PRIMARY KEY (`role_param_id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `citemplate_role_param`
--

INSERT INTO `citemplate_role_param` (`role_param_id_pk`, `role_param_menu_id_fk`, `role_param_name`, `role_param_desc`, `role_param_order`, `role_param_parent`) VALUES
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
('202-2', 202, 'Update ContactUs Status', 'Update Status of Contact Us', 2, '202-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_sessions`
--

CREATE TABLE IF NOT EXISTS `citemplate_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `citemplate_sessions`
--

INSERT INTO `citemplate_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('c2017cb440322c89649ffe3aaacf8765', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4', 1354333373, 'a:2:{s:9:"user_data";s:0:"";s:8:"userdata";a:2:{s:2:"id";s:2:"37";s:6:"sessid";s:32:"c2017cb440322c89649ffe3aaacf8765";}}'),
('2da3db1716b73aba823771927094d079', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1352432989, 'a:2:{s:9:"user_data";s:0:"";s:8:"userdata";a:2:{s:2:"id";s:2:"37";s:6:"sessid";s:32:"2da3db1716b73aba823771927094d079";}}'),
('a033332801f436c949e043575d7c31f8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1352434568, 'a:2:{s:9:"user_data";s:0:"";s:8:"userdata";a:2:{s:2:"id";s:1:"1";s:6:"sessid";s:32:"a033332801f436c949e043575d7c31f8";}}'),
('a2f96bfe19fbb776d011737092f3d400', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1352445843, 'a:2:{s:9:"user_data";s:0:"";s:8:"userdata";a:2:{s:2:"id";s:2:"37";s:6:"sessid";s:32:"a2f96bfe19fbb776d011737092f3d400";}}'),
('aa6e972fcda79526c37bca8e9eb02d27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1352453326, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_sysparam`
--

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

--
-- Dumping data untuk tabel `citemplate_sysparam`
--

INSERT INTO `citemplate_sysparam` (`sysparam_name`, `sysparam_desc`, `sysparam_value`, `sysparam_regex_format`, `sysparam_is_static`, `sysparam_update_by`, `sysparam_update_date`) VALUES
('DEFAULT_LANGUAGE', 'The default Language, the value:\r\n"en" for English,\r\n"id" for Indonesia', 'en', '/^en$|^id$/', 0, 37, '2012-11-01 09:58:43'),
('APP_VERSION', 'Version of Application', '1.0', '', 1, 1, '2012-11-01 10:05:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_user`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data untuk tabel `citemplate_user`
--

INSERT INTO `citemplate_user` (`user_id_pk`, `user_usergroup_id_fk`, `user_login_name`, `user_name`, `user_pass`, `user_status`, `user_last_login_date`, `user_create_date`, `user_create_user_id_fk`, `user_update_date`, `user_update_user_id_fk`) VALUES
(1, 1, 'administrator', 'Administrator', '6797f82f504379e72c59879b12594d39', 1, '2012-11-09 14:21:34', '2012-04-02 00:00:00', 0, '2012-11-09 14:21:34', 0),
(37, 2, 'chenx', 'Albert Mulia Shintra', 'eb0a191797624dd3a48fa681d3061212', 1, '2012-11-09 14:24:07', '2012-05-04 11:19:47', 1, '2012-11-09 14:24:07', 0),
(82, 21, 'watcher', 'Checker', '6797f82f504379e72c59879b12594d39', 1, '0000-00-00 00:00:00', '2012-10-30 15:33:14', 37, '2012-10-31 13:34:40', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `citemplate_usergroup`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `citemplate_usergroup`
--

INSERT INTO `citemplate_usergroup` (`usergroup_id_pk`, `usergroup_name`, `usergroup_desc`, `usergroup_status`, `usergroup_create_date`, `usergroup_create_by_id_fk`, `usergroup_update_date`, `usergroup_update_by_id_fk`) VALUES
(1, 'Administrator', 'Group untuk Admin\r\n(Tidak boleh dihapus)', 1, '2012-04-13 16:43:32', 0, '2012-10-25 19:36:21', 1),
(2, 'Super User', 'Grup yang bisa melakukan segalanya', 1, '0000-00-00 00:00:00', 0, '2012-10-25 19:44:08', 37),
(3, 'Visitor', 'Tamu / Pengunjung', 0, '0000-00-00 00:00:00', 0, '2012-10-25 19:29:09', 37),
(21, 'Watcher', 'View Watcher.', 1, '2012-10-25 19:28:00', 37, '2012-10-30 17:03:42', 37),
(22, 'Supervisor', 'Group of Supervisor', 0, '2012-10-30 17:05:51', 37, '2012-11-01 10:49:47', 37);
