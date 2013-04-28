-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-03-08 22:05:57
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table roulette.roulette_player
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
  `player_cashreward` int(11) DEFAULT NULL,
  `player_status` tinyint(4) DEFAULT NULL,
  `player_logindate` datetime DEFAULT NULL,
  `player_playdate` datetime DEFAULT NULL,
  `player_joindate` datetime DEFAULT NULL,
  PRIMARY KEY (`player_id_pk`),
  UNIQUE KEY `player_fbid` (`player_fbid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table roulette.roulette_player: 1 rows
DELETE FROM `roulette_player`;
/*!40000 ALTER TABLE `roulette_player` DISABLE KEYS */;
INSERT INTO `roulette_player` (`player_id_pk`, `player_fbid`, `player_firstname`, `player_lastname`, `player_email`, `player_city`, `player_score`, `player_cash`, `player_cashwin`, `player_cashlose`, `player_cashreward`, `player_status`, `player_logindate`, `player_playdate`, `player_joindate`) VALUES
	(3, '776923827', 'Albert', 'Shintra', 'chenx_phyt@hotmail.com', 'Jakarta, Indonesia', 8360, 6600, 6800, -1000, 800, 1, '2013-02-24 08:16:59', '2013-02-23 19:14:05', '2013-02-23 19:08:06');
/*!40000 ALTER TABLE `roulette_player` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
