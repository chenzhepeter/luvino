-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 29 日 11:42
-- 服务器版本: 5.5.30
-- PHP 版本: 5.3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fwm`
--

-- --------------------------------------------------------

--
-- 表的结构 `fwm`
--

CREATE TABLE IF NOT EXISTS `fwm` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `fwm` text,
  `cxtime` datetime DEFAULT NULL,
  `cxcs` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `fwm`
--

INSERT INTO `fwm` (`ID`, `fwm`, `cxtime`, `cxcs`) VALUES
(2, '1341041219991030301020bangood', '2013-04-29 11:19:29', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
