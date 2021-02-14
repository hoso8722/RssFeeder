-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2021 at 11:17 AM
-- Server version: 5.1.67-log
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jinchangz_2ch`
--

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NOT NULL DEFAULT '',
  `sourceurl` varchar(255) NOT NULL DEFAULT '',
  `sourcerss` varchar(255) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '2010-01-01 00:00:00',
  `modified` datetime NOT NULL DEFAULT '2010-01-01 00:00:00',
  `count` int(11) unsigned NOT NULL DEFAULT '0',
  `category` smallint(6) unsigned NOT NULL DEFAULT '0',
  `rssid` smallint(6) NOT NULL DEFAULT '0',
  `rsscount` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=231 ;

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE IF NOT EXISTS `sources` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_ip` varchar(255) NOT NULL DEFAULT '0',
  `site_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `category_id` tinyint(3) unsigned NOT NULL DEFAULT '9',
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`),
  KEY `site_id` (`site_id`),
  KEY `created` (`created`),
  KEY `total` (`total`),
  KEY `category_id` (`category_id`),
  KEY `created_2` (`created`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3726815 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
