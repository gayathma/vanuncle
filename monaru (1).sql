-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2014 at 11:04 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `mn_cms_users`
--

CREATE TABLE IF NOT EXISTS `mn_cms_users` (
  `cms_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_user_email` varchar(30) NOT NULL,
  `cms_user_password` varchar(50) NOT NULL,
  `cms_user_name` varchar(100) NOT NULL,
  `cms_user_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cms_user_status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`cms_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mn_cms_users`
--

INSERT INTO `mn_cms_users` (`cms_user_id`, `cms_user_email`, `cms_user_password`, `cms_user_name`, `cms_user_added_date`, `cms_user_status`) VALUES
(1, 'fviran@gmail.com', '202cb962ac59075b964b07152d234b70', 'Viran Fernando', '2013-10-06 21:08:16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mn_contents`
--

CREATE TABLE IF NOT EXISTS `mn_contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `content_hcode` varchar(20) NOT NULL,
  `delete_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 = deleted , 0  =  not deleted',
  `added_by` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mn_contents`
--

INSERT INTO `mn_contents` (`content_id`, `content_title`, `content`, `content_hcode`, `delete_status`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, 'About Us', '<p>\n	TEST ABOUT US PAGE</p>\n<p>\n	<img alt="" height="214" src="/content_files/images/5DAVY5v.jpg" width="173" /></p>\n<p>\n	tets tets</p>\n', 'ABOUTUS', '0', 1, '2014-05-28 07:12:16', NULL, NULL),
(2, 'Destinations', 'Destinatiosn descriptions', 'DESTINATIONS', '0', 1, '2014-05-28 00:00:00', NULL, NULL),
(3, 'Rightside Snippet', '<div class="right-snipt">\n	<a href="#"><img alt="" class="img-responsive" src="/content_files/images/destinations-btn(1).jpg" /></a></div>\n<div class="right-snipt">\n	<a href="#"><img alt="" class="img-responsive" src="/content_files/images/destinations-btn(2).jpg" /></a></div>\n', 'RIGHTSIDESNIPPET', '0', 1, '2014-05-28 06:28:41', NULL, NULL),
(4, 'Welcome Message - Home Page', 'MonaruLanka is the first long range low-cost carrier from the Pearl of the Indian ocean, Sri Lanka, and the project of many professionals involved from various disciples. We are an entity geared to serve our guest in the most professional, warm and friendly manner. We at MonaruLanka, with the blessings of the governance of the country, welcome all onboard for an unforgettable journey via the most beautiful island of the Indian Ocean, SRI LANKA.', 'WELCOMEHOMEPAGE', '0', 1, '2014-05-28 06:28:41', NULL, NULL),
(5, 'Welcome To Monaru Lanka', 'test welcoem inner page', 'WELCOMEINNERPAGE', '0', 1, '2014-05-28 07:12:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mn_sliders`
--

CREATE TABLE IF NOT EXISTS `mn_sliders` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_no` enum('1','2','3') NOT NULL COMMENT '1 - Featured Attractions, 2 - Main slider , 3 - Airways Slider',
  `slider_title` varchar(100) NOT NULL,
  `slider_image` varchar(250) NOT NULL,
  `slider_order` int(11) NOT NULL DEFAULT '0',
  `delete_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 = deleted , 0  =  not deleted',
  `added_date` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mn_sliders`
--

INSERT INTO `mn_sliders` (`slider_id`, `slider_no`, `slider_title`, `slider_image`, `slider_order`, `delete_status`, `added_date`, `added_by`, `updated_by`, `updated_date`) VALUES
(1, '1', 'Yala National Park   1', 'att-1.jpg', 1, '0', '2014-05-26 10:40:00', 121, NULL, NULL),
(2, '1', 'Yala National Park 2', 'att-2.jpg', 56, '0', '2014-05-23 00:00:00', 121, NULL, NULL),
(3, '1', 'Yala National Park 3', 'att-3.jpg', 5, '0', '2014-05-27 00:00:00', 121, NULL, NULL),
(4, '1', 'Yala National Park 4', 'att-4.jpg', 4, '0', '2014-05-27 00:00:00', 121, NULL, NULL),
(5, '1', 'Yala National Park 5', 'att-5.jpg', 2, '0', '2014-05-27 00:00:00', 121, NULL, NULL),
(6, '2', '', 'slider1.png', 0, '0', '0000-00-00 00:00:00', 0, NULL, NULL),
(7, '2', '', 'slider2.png', 0, '0', '0000-00-00 00:00:00', 0, NULL, NULL),
(8, '3', 'Colombo to  <strong>China </strong>', 'att-1.jpg', 0, '0', '0000-00-00 00:00:00', 0, NULL, NULL),
(9, '3', 'Colombo to  <strong>Hambanthota </strong>', 'att-4.jpg', 0, '0', '2014-05-27 00:00:00', 121, NULL, NULL),
(10, '3', 'Colombo to <strong>Australia</strong>', 'att-6.jpg', 0, '0', '2014-05-27 00:00:00', 121, NULL, NULL),
(15, '1', '32', 'ml_1402234246-att-4.jpg', 1, '0', '2014-06-08 19:00:50', 1, NULL, NULL),
(16, '1', '6786', 'ml_1402234455-pkg2.jpg', 99, '0', '2014-06-08 19:04:17', 1, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
