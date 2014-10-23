-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2014 at 11:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `api_admega`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(45) NOT NULL,
  `admin_pass` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'b5fd7ec623a2f88787f55539ccdaa809');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE IF NOT EXISTS `tbl_ads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(45) NOT NULL,
  `ad_type` int(10) unsigned NOT NULL,
  `ad_link` text NOT NULL,
  `ad_create_date` datetime NOT NULL,
  `ad_status` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`id`, `ad_name`, `ad_type`, `ad_link`, `ad_create_date`, `ad_status`) VALUES
(1, 'Du ma', 1, 'http://google.com', '2014-08-31 11:01:24', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_category`
--

CREATE TABLE IF NOT EXISTS `tbl_ads_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_ads` int(11) unsigned NOT NULL,
  `id_category` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_ads_category`
--

INSERT INTO `tbl_ads_category` (`id`, `id_ads`, `id_category`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_image`
--

CREATE TABLE IF NOT EXISTS `tbl_ads_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_ads` int(11) unsigned NOT NULL,
  `id_image` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_ads_image`
--

INSERT INTO `tbl_ads_image` (`id`, `id_ads`, `id_image`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) NOT NULL,
  `cate_root` int(11) unsigned NOT NULL,
  `cate_status` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cate_name`, `cate_root`, `cate_status`) VALUES
(1, 'test1', 0, 'active'),
(2, 'test2', 0, 'active'),
(3, 'test3', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `img_link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `img_link`) VALUES
(1, '1409475684_10401410_4338196628606_2222008692875663962_n.jpg'),
(2, '1409475685_1343407380_lostmywayplanb.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
