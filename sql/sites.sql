-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2021 at 12:51 PM
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

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `source`, `sourceurl`, `sourcerss`, `created`, `modified`, `count`, `category`, `rssid`, `rsscount`) VALUES
(1, 'ベア速', 'http://vipvipblogblog.blog119.fc2.com/', 'http://vipvipblogblog.blog119.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 1, 65, 0),
(65, 'ﾆｭｰｽｳｫｯﾁ２ちゃんねる', 'http://nw2.blog112.fc2.com/', 'http://nw2.blog112.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 2, 66, 0),
(4, '【2ch】ニュー速クオリティ', 'http://news4vip.livedoor.biz/', 'http://news4vip.livedoor.biz/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:31:25', 0, 2, 7, 476),
(6, 'アルファルファモザイク', 'http://alfalfalfa.com/', 'http://alfalfalfa.com/index.rdf', '2010-01-01 00:00:00', '2021-02-14 08:31:37', 10, 3, 8, 286),
(63, 'たま速報', 'http://tamasoku.blog35.fc2.com/', 'http://tamasoku.blog35.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 1, 67, 0),
(10, '痛いニュース(ﾉ∀`)', 'http://blog.livedoor.jp/dqnplus/', 'http://blog.livedoor.jp/dqnplus/index.rdf', '2010-01-01 00:00:00', '2021-02-14 04:11:13', 639, 2, 56, 21),
(66, '引いた瞬間、冷めた瞬間', 'http://phlogiston.blog110.fc2.com/', 'http://phlogiston.blog110.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 9, 68, 0),
(13, 'カナ速', 'http://kanasoku.info/', 'http://kanasoku.info/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:33:49', 0, 3, 19, 139),
(16, 'VIPPERな俺', 'http://blog.livedoor.jp/news23vip/', 'http://blog.livedoor.jp/news23vip/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:06:49', 0, 1, 34, 73),
(17, 'ハムスター速報　２ろぐ', 'http://hamusoku.com/', 'http://hamusoku.com/index.rdf', '2010-01-01 00:00:00', '2021-02-14 10:36:37', 0, 3, 33, 72),
(19, 'ぷん太のにゅーす', 'http://punpunpun.blog107.fc2.com/', 'http://punpunpun.blog107.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 5, 69, 0),
(22, 'F速VIP(･ω･)y-〜', 'http://fsokuvip.blog101.fc2.com/', 'http://fsokuvip.blog101.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 1, 70, 0),
(23, 'After', 'http://afterapg.blog97.fc2.com/', 'http://afterapg.blog97.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 7, 71, 0),
(67, 'キラ速-KIRA☆SOKU-', 'http://kirasoku44.blog.fc2.com/', 'http://kirasoku44.blog.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 5, 7, 72, 0),
(25, '働くモノニュース : 人生VIP職人ブログwww', 'http://workingnews.blog117.fc2.com/', 'http://workingnews.blog117.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-14 01:40:37', 1754, 2, 53, 18),
(69, 'ニューソクロペディア', 'http://nyusokuropedia.ldblog.jp/', 'http://nyusokuropedia.ldblog.jp/index.rdf ', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 0, 73, 0),
(31, 'ニュース超速報！', 'http://turenet.blog91.fc2.com/', 'http://turenet.blog91.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 2, 74, 0),
(37, 'SLPY', 'http://slpy.blog65.fc2.com/', 'http://slpy.blog65.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-13 13:12:37', 0, 1, 63, 3),
(38, '厳選１スレ', 'http://ibra.blog52.fc2.com/', 'http://ibra.blog52.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 1, 75, 0),
(39, 'のとーりあす', 'http://notorious2.blog121.fc2.com/', 'http://notorious2.blog121.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 2, 76, 0),
(45, '無題のドキュメント', 'http://www.mudainodocument.com', 'http://www.mudainodocument.com/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:03:02', 0, 1, 15, 154),
(46, 'ワラノート', 'http://waranote.livedoor.biz/', 'http://waranote.livedoor.biz/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:05:25', 0, 1, 27, 97),
(48, 'もみあげチャ～シュ～', 'http://blog.livedoor.jp/michaelsan/', 'http://blog.livedoor.jp/michaelsan/index.rdf', '2010-01-01 00:00:00', '2021-02-14 07:08:13', 0, 1, 41, 45),
(49, 'ちょっとアレなニュース', 'http://aresoku.blog42.fc2.com/', 'http://aresoku.blog42.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 2, 77, 0),
(51, 'ゲーム板見るよ！', 'http://miruyo.blog38.fc2.com/', 'http://miruyo.blog38.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 6, 78, 0),
(52, 'すくいぬ', 'http://suiseisekisuisui.blog107.fc2.com/', 'http://suiseisekisuisui.blog107.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 3, 79, 0),
(54, '未定なブログ', 'http://aromablack5310.blog77.fc2.com/', 'http://aromablack5310.blog77.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 2, 80, 0),
(55, 'LLR', 'http://limitedxlimited.blog22.fc2.com/', 'http://limitedxlimited.blog22.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 5, 81, 0),
(70, 'やる夫ブログ', 'http://yaruomatome.blog10.fc2.com/', 'http://yaruomatome.blog10.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 0, 82, 0),
(72, 'VIPワイドガイド', 'http://news4wide.livedoor.biz/', 'http://news4wide.livedoor.biz/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:04:25', 0, 1, 22, 129),
(73, '暇人＼(＾o＾)／速報', 'http://blog.livedoor.jp/himasoku123/', 'http://blog.livedoor.jp/himasoku123/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:32:37', 0, 3, 13, 213),
(101, 'ひまねっと', 'http://blog.livedoor.jp/himarin_net/', 'http://blog.livedoor.jp/himarin_net/index.rdf', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 5, 83, 0),
(76, '黒マッチョニュース', 'http://kuromacyo.livedoor.biz/', 'http://kuromacyo.livedoor.biz/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:07:25', 277, 2, 37, 63),
(78, '中の人', 'http://nakasoku.blog18.fc2.com/', 'http://nakasoku.blog18.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 3, 84, 0),
(79, '(*ﾟ∀ﾟ)ゞカガクニュース隊', 'http://www.scienceplus2ch.com/', 'http://www.scienceplus2ch.com/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:30:01', 4, 2, 0, 1141),
(103, 'ねたAtoZ', 'http://netaatoz.jp', 'http://netaatoz.jp/index.rdf', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 3, 85, 0),
(82, 'やる夫観察日記', 'http://yaruokansatu.blog44.fc2.com/', 'http://yaruokansatu.blog44.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 0, 86, 0),
(95, 'いたしん！', 'http://itaishinja.com', 'http://itaishinja.com/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:04:37', 0, 1, 23, 128),
(84, 'ZiNGER-HOLE', 'http://zinger-hole.net', 'http://zinger-hole.net/rss.xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 2, 87, 0),
(102, '哲学ニュースnwk', 'http://blog.livedoor.jp/nwknews/', 'http://blog.livedoor.jp/nwknews/index.rdf', '2010-01-01 00:00:00', '2021-02-14 12:06:25', 0, 2, 32, 74),
(87, '常識的に考えた', 'http://blog.livedoor.jp/jyoushiki43/', 'http://blog.livedoor.jp/jyoushiki43/index.rdf', '2010-01-01 00:00:00', '2021-02-14 10:37:13', 0, 2, 36, 61),
(88, 'うらやましからん', 'http://urayamashikaran.blog44.fc2.com/', 'http://urayamashikaran.blog44.fc2.com/?xml', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 3, 88, 0),
(96, '【2ch】ニュー速VIPブログ(`･ω･´)', 'http://blog.livedoor.jp/insidears/', 'http://blog.livedoor.jp/insidears/index.rdf', '2010-01-01 00:00:00', '2021-02-13 18:11:26', 0, 3, 57, 8),
(91, 'みんくちゃんねる', 'http://minkch.com/', 'http://minkch.com/index.rdf', '2010-01-01 00:00:00', '2021-02-14 11:11:50', 0, 3, 59, 7),
(98, 'カオスちゃんねる', 'http://chaos2ch.com/', 'http://chaos2ch.com/index.rdf', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 1, 42, 49),
(105, '漢通信', 'http://blog.livedoor.jp/otokotushin', 'http://blog.livedoor.jp/otokotushin/index.rdf', '2013-04-17 00:00:00', '2021-02-08 04:59:01', 0, 0, 89, 0),
(130, '2chコピペ保存道場', 'http://2chcopipe.com/', 'http://2chcopipe.com/index.rdf', '2013-04-25 00:00:00', '2021-02-14 12:09:14', 0, 3, 46, 37),
(148, '今日速2ch', 'http://kyousoku.net/', 'http://kyousoku.net/index.rdf', '2013-05-06 00:00:00', '2021-02-14 12:39:25', 0, 3, 47, 38),
(106, 'みります！', 'http://millimas.net/', 'http://millimas.net/index.rdf', '2013-04-21 00:00:00', '2021-02-08 04:59:01', 0, 5, 90, 0),
(107, 'インバリアント', 'http://invariant0.blog130.fc2.com/', 'http://feed.rssad.jp/rss/fc2/invariant0.blog130', '2013-04-21 00:00:00', '2021-02-08 04:59:01', 237, 5, 91, 0),
(108, 'ゲハ速', 'http://gehasoku.com/', 'http://gehasoku.com/index.rdf', '2013-04-21 00:00:00', '2021-02-08 04:59:01', 0, 6, 92, 0),
(109, 'HighGamers', 'http://highgamers.com/', 'http://highgamers.com/index.rdf', '2013-04-21 00:00:00', '2021-02-08 04:59:01', 548, 6, 93, 0),
(110, 'FootBallNet', 'http://footballnet.2chblog.jp/', 'http://footballnet.2chblog.jp/index.rdf', '2013-04-21 00:00:00', '2021-02-14 12:35:13', 0, 4, 26, 85),
(111, 'ジャンプまとめ速報', 'http://jumpmatome2ch.blog.fc2.com/', 'http://jumpmatome2ch.blog.fc2.com/?xml', '2013-04-21 00:00:00', '2021-02-08 04:59:01', 0, 5, 94, 0),
(112, 'カンダタ速報', 'http://kandatasokuho.blog.fc2.com/', 'http://kandatasokuho.blog.fc2.com/?xml', '2013-04-21 00:00:00', '2021-02-14 12:34:51', 91, 6, 24, 123),
(155, 'HUNTER×速報', 'http://huntersokuho.com/', 'http://huntersokuho.com/index.rdf', '2013-06-04 00:00:00', '2021-02-08 04:59:01', 0, 5, 95, 0),
(113, '高学歴の就活2chまとめ', 'http://owata89.blog.fc2.com/', 'http://owata89.blog.fc2.com/?xml', '2013-04-22 00:00:00', '2021-02-08 04:59:01', 0, 0, 96, 0),
(114, 'Ｚちゃんねる＠ＶＩＰ', 'http://zch-vip.com', 'http://zch-vip.com/index.rdf', '2013-04-22 00:00:00', '2021-02-14 12:33:25', 2, 1, 17, 154),
(115, 'オタクライフハック', 'http://otakulifehack.com/', 'http://otakulifehack.com/index.rdf', '2013-04-22 00:00:00', '2021-02-08 04:59:01', 0, 5, 97, 0),
(116, 'ニッカンヤキウソクホウ', 'http://blog.livedoor.jp/yakiusoku/', 'http://blog.livedoor.jp/yakiusoku/index.rdf', '2013-04-22 00:00:00', '2021-02-14 11:33:37', 0, 4, 18, 140),
(117, '子育てちゃんねる', 'http://kosodatech.blog133.fc2.com', 'http://kosodatech.blog133.fc2.com/?xml', '2013-04-22 00:00:00', '2021-02-14 12:05:40', 0, 9, 28, 95),
(118, '魔王ブログ。-beelzeboul-', 'http://beelzeboulxxx.com/', 'http://beelzeboulxxx.com/index.rdf', '2013-04-22 00:00:00', '2021-02-14 00:39:49', 4, 3, 49, 30),
(119, 'びりーぶVIP', 'http://hizuki82.blog.fc2.com/', 'http://hizuki82.blog.fc2.com/?xml', '2013-04-23 00:00:00', '2021-02-08 04:59:01', 0, 6, 98, 0),
(120, 'ILLEGALIDOL', 'http://illegalidol.blog96.fc2.com/', 'http://illegalidol.blog96.fc2.com/?xml', '2013-04-23 00:00:00', '2021-02-08 04:59:01', 0, 7, 99, 0),
(121, 'バイクと！', 'http://baikuto.doorblog.jp/', 'http://baikuto.doorblog.jp/index.rdf', '2013-04-23 00:00:00', '2021-02-08 04:59:01', 4, 8, 100, 0),
(122, '蟲ちゃんねる！', 'http://mushich.blog.fc2.com/', 'http://mushich.blog.fc2.com/?xml', '2013-04-23 00:00:00', '2021-02-08 04:59:01', 0, 8, 101, 0),
(123, 'どうぶつちゃんねる', 'http://animalch.net/', 'http://animalch.net/index.rdf', '2013-04-23 00:00:00', '2021-02-14 12:37:37', 27, 8, 38, 65),
(124, '2ch 釣り愛好会', 'http://mjky2ch.blog.fc2.com/', 'http://mjky2ch.blog.fc2.com/?xml', '2013-04-23 00:00:00', '2021-02-08 04:59:01', 0, 8, 102, 0),
(125, 'F1情報通', 'http://f1jouhou2.blog.fc2.com/', 'http://f1jouhou2.blog.fc2.com/?xml', '2013-04-23 00:00:00', '2021-02-14 12:10:14', 70, 8, 51, 28),
(176, 'わろたあろっと', 'http://blog.livedoor.jp/warota_a_lot/', 'http://blog.livedoor.jp/warota_a_lot/index.rdf', '2013-10-19 00:00:00', '2021-02-08 04:59:01', 0, 3, 103, 0),
(126, '2chエクサワロス', 'http://exawarosu.net/', 'http://exawarosu.net/index.rdf', '2013-04-24 00:00:00', '2021-02-14 12:32:25', 0, 3, 12, 222),
(127, 'きゃっつあいニュース', 'http://rastaneko.blog.fc2.com/', 'http://rastaneko.blog.fc2.com/?xml', '2013-04-24 00:00:00', '2021-02-08 04:59:01', 0, 3, 104, 0),
(128, '気になるニト速', 'http://nitosokusinn.blog.fc2.com/', 'http://nitosokusinn.blog.fc2.com/?xml', '2013-04-24 00:00:00', '2015-09-14 07:15:38', 0, 3, -1, 0),
(129, 'XVIDEOS LIFE', 'http://xvideos-life.com/', 'http://xvideos-life.com/index.rdf', '2013-04-25 00:00:00', '2021-02-08 04:59:01', 0, 7, 105, 0),
(131, 'アクアカタリスト', 'http://aqua2ch.net/', 'http://aqua2ch.net/index.rdf', '2013-04-25 00:00:00', '2021-02-14 12:07:02', 0, 8, 35, 70),
(132, '競馬ろまん亭', 'http://blog.livedoor.jp/admiretry/', 'http://blog.livedoor.jp/admiretry/index.rdf', '2013-04-25 00:00:00', '2021-02-14 10:10:25', 0, 8, 52, 25),
(133, '宇宙＆物理2chまとめ', 'http://uchu2ch.blog.fc2.com/', 'http://uchu2ch.blog.fc2.com/?xml', '2013-04-25 00:00:00', '2021-02-08 04:59:01', 6, 0, 106, 0),
(134, 'キスログ', 'http://kisslog2.com/', 'http://kisslog2.com/index.rdf', '2013-04-25 00:00:00', '2021-02-14 12:06:15', 0, 9, 31, 88),
(135, 'アイドルニュース（狼）', 'http://blog.livedoor.jp/idolookami/', 'http://blog.livedoor.jp/idolookami/index.rdf', '2013-04-25 00:00:00', '2021-02-08 04:59:01', 0, 3, 107, 0),
(180, 'ダメージ0', 'http://damage0.blomaga.jp/', 'http://damage0.blomaga.jp/index.rdf', '2014-02-13 00:00:00', '2021-02-08 04:59:01', 0, 1, 108, 0),
(136, '鬼嫁ちゃんねる', 'http://oniyomech.livedoor.biz/', 'http://oniyomech.livedoor.biz/index.rdf', '2013-04-25 00:00:00', '2021-02-14 10:39:37', 463, 9, 48, 32),
(137, '本当にやった復讐 まとめ', 'http://revenge.doorblog.jp/', 'http://revenge.doorblog.jp/index.rdf', '2013-04-25 00:00:00', '2021-02-14 12:40:49', 118, 9, 54, 13),
(156, 'ふよふよ速報', 'http://huyosoku.com/', 'http://huyosoku.com/index.rdf', '2013-06-04 00:00:00', '2021-02-08 04:59:01', 0, 1, 109, 0),
(139, '旅スレVIP', 'http://blog.livedoor.jp/travelvip/', 'http://blog.livedoor.jp/travelvip/index.rdf', '2013-04-26 00:00:00', '2021-02-08 04:59:01', 0, 8, 110, 0),
(187, 'ガールズVIPまとめ', 'http://girlsvip-matome.com/', 'http://girlsvip-matome.com/index.rdf', '2014-08-25 00:00:00', '2021-02-14 12:31:01', 495, 3, 5, 503),
(151, 'はやブログ', 'http://hayablog00.blog.fc2.com/', 'http://hayablog00.blog.fc2.com/?xml', '2013-05-06 00:00:00', '2021-02-14 05:38:37', 6, 2, 43, 39),
(140, '芸スポ裏ジャーナル', 'http://urageispo.com/', 'http://urageispo.com/index.rdf', '2013-04-27 00:00:00', '2021-02-08 04:59:01', 0, 3, 111, 0),
(141, 'ラノまと―人気ライトノベルまとめ！', 'http://lightnoveldatematome.blog.fc2.com/', 'http://lightnoveldatematome.blog.fc2.com/?xml', '2013-04-27 00:00:00', '2021-02-08 04:59:01', 0, 8, 112, 0),
(142, 'ぶく速', 'http://2chbooknews.blog114.fc2.com/', 'http://2chbooknews.blog114.fc2.com/?xml', '2013-04-27 00:00:00', '2021-02-08 04:59:01', 3, 8, 113, 0),
(143, '2ch名人', 'http://blog.livedoor.jp/i2chmeijin/', 'http://blog.livedoor.jp/i2chmeijin/index.rdf', '2013-04-27 00:00:00', '2021-02-08 04:59:01', 0, 8, 114, 0),
(144, 'ROCKCH', 'http://blog.livedoor.jp/rock2ch/', 'http://blog.livedoor.jp/rock2ch/index.rdf', '2013-04-27 00:00:00', '2021-02-08 04:59:01', 0, 8, 115, 0),
(145, 'わんこーる速報！', 'http://onecall.livedoor.biz/', 'http://onecall.livedoor.biz/index.rdf', '2013-04-27 00:00:00', '2021-02-14 12:33:13', 0, 5, 16, 156),
(146, 'にゅうにゅうす', 'http://newnews-moe.com/', 'http://newnews-moe.com/index.rdf', '2013-04-27 00:00:00', '2014-11-03 04:59:02', 0, 5, -1, 0),
(150, 'きものろぐ', 'http://www.kimonolog.com/', 'http://www.kimonolog.com/index.rdf', '2013-05-21 00:00:00', '2021-02-08 04:59:01', 0, 8, 116, 0),
(167, 'シネマ速報', 'http://cinesoku.net/', 'http://cinesoku.net/feed', '2013-06-26 00:00:00', '2021-02-14 12:08:55', 393, 3, 44, 44),
(147, 'くろ速！', 'http://kurosoku.blomaga.jp/', 'http://kurosoku.blomaga.jp/index.rdf', '2013-04-28 00:00:00', '2021-02-08 04:59:01', 0, 1, 117, 0),
(189, 'ウサギ速報', 'http://tokka.usagisokuhou.com/', 'http://tokka.usagisokuhou.com/index.rdf', '2014-10-01 00:00:00', '2021-02-08 04:59:01', 0, 9, 118, 0),
(149, 'サッカー2chまとめ', 'http://2chsoccerballgame.seesaa.net/', 'http://2chsoccerballgame.seesaa.net/index.rdf', '2013-05-21 00:00:00', '2021-02-08 04:59:01', 0, 4, 119, 0),
(173, 'PCパーツまとめ', 'http://blog.livedoor.jp/bluejay01-review/', 'http://blog.livedoor.jp/bluejay01-review/index.rdf', '2013-09-01 00:00:00', '2021-02-14 12:07:49', 0, 0, 39, 57),
(157, 'もきゅ速', 'http://blog.livedoor.jp/aoba_f/', 'http://blog.livedoor.jp/aoba_f/index.rdf', '2013-06-04 00:00:00', '2021-02-14 12:39:01', 0, 3, 45, 39),
(152, 'エレクチオン速報', 'http://blog.livedoor.jp/eresoku/', 'http://blog.livedoor.jp/eresoku/index.rdf', '2013-05-22 00:00:00', '2021-02-08 04:59:01', 0, 7, 120, 0),
(153, 'ブヒヒ速報', 'http://blog.livedoor.jp/buhihisokuhou', 'http://blog.livedoor.jp/buhihisokuhou/index.rdf', '2013-05-22 00:00:00', '2021-02-08 04:59:01', 0, 5, 121, 0),
(158, '恋愛速報', 'http://www.recosoku.com/', 'http://www.recosoku.com/index.rdf', '2013-06-05 00:00:00', '2021-02-14 12:30:13', 13, 9, 1, 601),
(159, 'なんJ PRIDE', 'http://blog.livedoor.jp/rock1963roll/', 'http://blog.livedoor.jp/rock1963roll/index.rdf', '2013-06-05 00:00:00', '2021-02-14 08:04:01', 0, 4, 20, 143),
(162, '稲妻速報', 'http://inazumanews2.com/', 'http://inazumanews2.com/index.rdf', '2013-06-07 00:00:00', '2021-02-14 12:35:50', 0, 1, 29, 104),
(161, 'やわらかちゃんねる', 'http://yawarakach.blog.fc2.com/', 'http://yawarakach.blog.fc2.com/?xml', '2013-06-05 00:00:00', '2021-02-08 04:59:01', 0, 9, 122, 0),
(186, 'College Note', 'http://college-matome.com/', 'http://college-matome.com/?xml', '2014-08-06 00:00:00', '2021-02-08 04:59:01', 0, 0, 123, 0),
(163, 'なんでもまとめ2ch', 'http://nanndemomatome2ch.blog.fc2.com/', 'http://nanndemomatome2ch.blog.fc2.com/?xml', '2013-06-07 00:00:00', '2021-02-08 04:59:01', 15, 1, 124, 0),
(169, ' 既婚者の墓場', 'http://blog.livedoor.jp/kidanboti/', 'http://blog.livedoor.jp/kidanboti/index.rdf', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 9, 125, 0),
(164, 'ダイエット速報＠２ちゃんねる', 'http://blog.livedoor.jp/diet2channel/', 'http://blog.livedoor.jp/diet2channel/index.rdf', '2013-06-17 00:00:00', '2021-02-14 12:32:13', 0, 9, 11, 230),
(165, 'ちかとも　-怖い話クリップ- ', 'http://chikatomo.doorblog.jp/', 'http://chikatomo.doorblog.jp/index.rdf', '2013-06-17 00:00:00', '2021-02-08 04:59:01', 2, 3, 126, 0),
(166, 'ぶーぶー速報', 'http://my2chmatome.ldblog.jp/', 'http://my2chmatome.ldblog.jp/index.rdf', '2013-06-17 00:00:00', '2021-02-08 04:59:01', 0, 8, 127, 0),
(168, 'モモンガ速報', 'http://momosoku.doorblog.jp/', 'http://momosoku.doorblog.jp/index.rdf', '2013-07-07 00:00:00', '2021-02-08 04:59:01', 0, 1, 128, 0),
(183, 'オールジャンルのオージャン', 'http://blog.livedoor.jp/ogenre/', 'http://blog.livedoor.jp/ogenre/index.rdf', '2014-04-28 00:00:00', '2021-02-08 04:59:01', 0, 1, 129, 0),
(185, 'きま速', 'http://www.kimasoku.com/', 'http://www.kimasoku.com/index.rdf', '2014-07-11 00:00:00', '2015-06-21 12:18:50', 0, 2, -1, 0),
(188, 'ニッコリン', 'http://niccorin.com/', 'http://niccorin.com/index.rdf', '2014-09-01 00:00:00', '2021-02-13 18:12:50', 0, 0, 64, 2),
(171, 'ジョジョまとめっ！', 'http://www.jojomatome.jp/', 'http://www.jojomatome.jp/index.rdf', '2013-07-19 00:00:00', '2021-02-08 04:59:01', 0, 5, 130, 0),
(179, 'うながんま', 'http://blog.livedoor.jp/unaganma/', 'http://blog.livedoor.jp/unaganma/index.rdf', '2014-01-09 00:00:00', '2021-02-08 04:59:01', 0, 0, 131, 0),
(174, 'にゃん速！', 'http://nyandemosokuhou.blog.fc2.com/', 'http://nyandemosokuhou.blog.fc2.com/?xml', '2013-09-01 00:00:00', '2021-02-08 04:59:01', 0, 1, 132, 0),
(175, 'ゆる民ニュース', 'http://moneykogane.blog.fc2.com/', 'http://moneykogane.blog.fc2.com/?xml', '2013-09-01 00:00:00', '2021-02-08 04:59:01', 0, 1, 133, 0),
(184, 'イルボン速報', 'http://ilbonsokuhou.blog.fc2.com/', 'http://ilbonsokuhou.blog.fc2.com/?xml', '2014-05-26 00:00:00', '2021-02-08 04:59:01', 0, 2, 134, 0),
(177, 'おすすめ速報', 'http://osusoku.com/', 'http://osusoku.com/feed', '2013-10-19 00:00:00', '2021-02-08 04:59:01', 0, 0, 135, 0),
(181, 'マジキチ速報', 'http://majikichi.com/', 'http://majikichi.com/index.rdf', '2014-02-20 00:00:00', '2021-02-14 12:08:01', 3, 0, 40, 45),
(182, 'ニュースちゃんねる', 'http://www.newsch.info/', 'http://www.newsch.info/index.rdf', '2014-04-24 00:00:00', '2021-02-08 04:59:01', 0, 2, 136, 0),
(190, '超速V話題のまとめちゃん', 'http://matometeyo.doorblog.jp/', 'http://matometeyo.doorblog.jp/index.rdf', '2014-11-03 00:00:00', '2021-02-08 04:59:01', 0, 1, 137, 0),
(191, 'どり速', 'http://dorisoku.jp/', 'http://dorisoku.jp/index.rdf', '2014-11-03 00:00:00', '2021-02-08 04:59:01', 0, 3, 138, 0),
(192, '鬼嫁日記〜2ch生活まとめ〜', 'http://oniyomediary.com/', 'http://oniyomediary.com/index.rdf', '2014-11-06 00:00:00', '2021-02-14 12:30:49', 1, 9, 4, 570),
(193, 'うはｗｗｗ速', 'http://uhawwwsoku.net/', 'http://uhawwwsoku.net/index.rdf', '2015-01-08 00:00:00', '2018-03-12 04:59:02', 0, 1, -1, 0),
(194, 'HyperNews2ch', 'http://hypernews.2chblog.jp', 'http://hypernews.2chblog.jp/index.rdf', '2015-01-08 00:00:00', '2021-02-08 04:59:01', 0, 1, 139, 0),
(195, '芸能人ブログタレントイズム', 'http://geinoujin-blog.net/', 'http://geinoujin-blog.net/?xml', '2015-02-02 00:00:00', '2021-02-13 20:12:25', 17, 3, 62, 5),
(198, 'エンタメちゃんねる', 'http://blog.livedoor.jp/ringotomomin/', 'http://blog.livedoor.jp/ringotomomin/index.rdf', '2015-02-27 00:00:00', '2021-02-08 04:59:01', 0, 3, 140, 0),
(196, 'ゆめ痛 -NEWS ALERT-', 'http://blog.livedoor.jp/yu_ps13/', 'http://blog.livedoor.jp/yu_ps13/index.rdf', '2015-02-04 00:00:00', '2021-02-14 12:11:01', 0, 8, 55, 20),
(197, '売国速報(^ω^)', 'http://treasonnews.com/', 'http://treasonnews.com/index.rdf', '2015-02-04 00:00:00', '2021-02-08 04:59:01', 0, 2, 141, 0),
(199, '市況かぶかFX速報', 'http://kabumatome.ldblog.jp/', 'http://kabumatome.ldblog.jp/index.rdf', '2015-03-11 00:00:00', '2021-02-08 04:59:01', 0, 0, 142, 0),
(200, 'チェックメイト', 'http://checkmate-blog.com/', 'http://checkmate-blog.com/feed', '2015-05-11 00:00:00', '2021-02-08 04:59:01', 0, 5, 143, 0),
(201, 'マターリブラウジング', 'http://applesmash.net/', 'http://applesmash.net/?feed=rss2', '2015-06-21 00:00:00', '2021-02-08 04:59:01', 0, 0, 144, 0),
(202, 'モナニュース', 'http://mona-news.com/', 'http://mona-news.com/index.rdf', '2015-06-21 00:00:00', '2021-02-08 04:59:01', 0, 2, 145, 0),
(203, 'VIPPERタイム', 'http://vippertime.net/', 'http://vippertime.net/index.rdf', '2015-06-21 00:00:00', '2021-02-08 04:59:01', 0, 1, 146, 0),
(207, '冒険者の旅', 'http://blog.livedoor.jp/exblade/', 'http://blog.livedoor.jp/exblade/index.rdf', '2015-08-03 00:00:00', '2021-02-08 04:59:01', 0, 2, 147, 0),
(204, 'seiyu fan', 'http://seiyufan.livedoor.biz/', 'http://seiyufan.livedoor.biz/index.rdf', '2015-07-03 00:00:00', '2021-02-14 12:06:01', 112, 5, 30, 93),
(205, '特定しますたm9(｀・ω・´)', 'http://www.tokuteishimasuta.com/', 'http://www.tokuteishimasuta.com/index.rdf', '2015-07-22 00:00:00', '2021-02-08 04:59:01', 0, 1, 148, 0),
(206, 'トメさんウトさん！', 'http://blog.livedoor.jp/pikotin-tomeuto/', 'http://blog.livedoor.jp/pikotin-tomeuto/index.rdf', '2015-07-22 00:00:00', '2021-02-08 04:59:01', 0, 9, 149, 0),
(209, 'まとめCUP', 'http://matomecup.com/', 'http://matomecup.com/?xml', '2015-09-14 00:00:00', '2021-02-14 12:34:14', 216, 0, 21, 132),
(208, 'Ｄｒ．２ちゃんねる', 'http://blog.livedoor.jp/doctor2ch/', 'http://blog.livedoor.jp/doctor2ch/index.rdf', '2015-09-01 00:00:00', '2021-02-08 04:59:01', 0, 0, 150, 0),
(211, 'about guitars ||:アバウトギターズ:||', 'http://aboutguitars.net/', 'http://aboutguitars.net/index.rdf', '2010-01-01 00:00:00', '2021-02-08 04:59:01', 0, 8, 151, 0),
(210, 'ワロタログ( ´,_ゝ｀)', 'http://warolog.com/', 'http://warolog.com/feed', '2015-09-26 00:00:00', '2017-01-16 04:59:01', 0, 5, -1, 0),
(213, 'ニコニコVIP2ch', 'http://blog.livedoor.jp/nicovip2ch/', 'http://blog.livedoor.jp/nicovip2ch/index.rdf', '2016-03-28 00:00:00', '2021-02-14 12:30:25', 0, 1, 2, 544),
(212, 'みんなの修羅場な体験談', 'http://minnano-syuraba.ldblog.jp/index.rdf', 'http://minnano-syuraba.ldblog.jp/index.rdf', '2016-02-27 00:00:00', '2021-02-14 12:31:49', 3, 9, 9, 301),
(218, 'Game Raid', 'http://game-raidinc.net/', 'http://game-raidinc.net/feed/', '2016-06-02 00:00:00', '2021-02-08 04:59:01', 0, 6, 152, 0),
(214, 'ろーぷれそく', 'http://rpg-soku.com/', 'http://rpg-soku.com/index.rdf', '2016-03-28 00:00:00', '2021-02-08 04:59:01', 0, 6, 153, 0),
(215, 'スコールちゃんねる', 'http://squallchannel.com/', 'http://squallchannel.com/index.rdf', '2016-03-28 00:00:00', '2021-02-14 12:32:01', 1, 3, 10, 249),
(223, 'NEWSぽけまとめーる', 'http://pokemon-goh.doorblog.jp/', 'http://pokemon-goh.doorblog.jp/index.rdf', '2017-04-17 00:00:00', '2021-02-14 12:30:37', 64, 2, 3, 510),
(221, '/)；｀ω´)＜国家総動員報', 'http://totalwar.doorblog.jp/', 'http://totalwar.doorblog.jp/index.rdf', '2016-07-07 00:00:00', '2021-02-14 12:35:02', 1581, 2, 25, 136),
(216, 'ドラクエ速報', 'http://blog.livedoor.jp/dq_sokuhou/', 'http://blog.livedoor.jp/dq_sokuhou/index.rdf', '2016-04-10 03:05:39', '2021-02-08 04:59:01', 0, 6, 154, 0),
(217, 'がーるずレポート', 'http://girlsreport.net/', 'http://girlsreport.net/index.rdf', '2016-04-18 00:00:00', '2021-02-14 12:31:13', 205, 9, 6, 504),
(219, '女と男の幸せがいっぱい', 'http://gooddays-wedding.com/', 'http://gooddays-wedding.com/feed/', '2016-06-26 00:00:00', '2021-02-14 08:12:03', 38, 9, 60, 7),
(220, '炎上系ニュース速報', 'http://enjosokuhou.blog.jp/', 'http://enjosokuhou.blog.jp/index.rdf', '2016-06-26 00:00:00', '2021-02-08 04:59:01', 0, 2, 155, 0),
(226, 'チラ裏.net', 'http://chirarura.blog.jp/', 'http://chirarura.blog.jp/index.rdf', '2018-03-16 00:00:00', '2021-02-08 04:59:01', 6, 1, 156, 0),
(222, '屈折するゲームブログ', 'http://blog.livedoor.jp/eltrium78/', 'http://blog.livedoor.jp/eltrium78/index.rdf', '2016-07-21 00:00:00', '2021-02-08 04:59:01', 0, 6, 157, 0),
(225, '話のネタ帳', 'http://netachou.blog.jp/', 'http://netachou.blog.jp/index.rdf', '2018-01-07 00:00:00', '2021-02-14 12:11:37', 41, 9, 58, 7),
(224, '人間交差点', 'https://hk-life.net/', 'https://hk-life.net/feed', '2018-01-07 00:00:00', '2021-02-08 04:59:01', 0, 9, 158, 0),
(230, '2ちゃんまとめ速報', 'http://2chmatomesokuhou.com/', 'http://2chmatomesokuhou.com/feed/', '2020-06-10 00:00:00', '2021-02-14 12:32:51', 21, 1, 14, 164),
(227, '助兵衛速報', 'http://sukebeesokuhou.blog.jp/', 'http://sukebeesokuhou.blog.jp/index.rdf', '2018-03-16 00:00:00', '2021-02-13 21:42:13', 49, 7, 61, 4),
(228, 'まんまうまうま', 'http://mamma.doorblog.jp/', 'http://mamma.doorblog.jp/index.rdf', '2018-03-16 00:00:00', '2021-02-08 04:59:01', 0, 9, 159, 0),
(229, '	一回は一回です。。', 'http://www.matometemitatta.com', 'http://www.matometemitatta.com/index.rdf', '2018-04-29 00:00:00', '2021-02-14 12:40:01', 0, 9, 50, 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
