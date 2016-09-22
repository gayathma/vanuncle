-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2016 at 03:33 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vanuncle`
--

-- --------------------------------------------------------

--
-- Table structure for table `va_cms_users`
--

CREATE TABLE IF NOT EXISTS `va_cms_users` (
  `cms_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_user_email` varchar(30) NOT NULL,
  `cms_user_password` varchar(50) NOT NULL,
  `cms_user_name` varchar(100) NOT NULL,
  `cms_user_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cms_user_status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`cms_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `va_cms_users`
--

INSERT INTO `va_cms_users` (`cms_user_id`, `cms_user_email`, `cms_user_password`, `cms_user_name`, `cms_user_added_date`, `cms_user_status`) VALUES
(1, 'gayathma3@gmail.com', 'c4961b067d274050e43e26beb9d7d19c', 'Gayathma Perera', '2016-06-22 13:20:50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `va_contents`
--

CREATE TABLE IF NOT EXISTS `va_contents` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `va_contents`
--

INSERT INTO `va_contents` (`content_id`, `content_title`, `content`, `content_hcode`, `delete_status`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, 'About Us', '<p>\n	TEST ABOUT US PAGE</p>\n<p>\n	<img alt="" height="214" src="/content_files/images/5DAVY5v.jpg" width="173" /></p>\n<p>\n	tets tets</p>\n', 'ABOUTUS', '0', 1, '2014-05-28 07:12:16', NULL, NULL),
(2, 'Destinations', 'Destinatiosn descriptions', 'DESTINATIONS', '0', 1, '2014-05-28 00:00:00', NULL, NULL),
(3, 'Rightside Snippet', '<div class="right-snipt">\n	<a href="#"><img alt="" class="img-responsive" src="/content_files/images/destinations-btn(1).jpg" /></a></div>\n<div class="right-snipt">\n	<a href="#"><img alt="" class="img-responsive" src="/content_files/images/destinations-btn(2).jpg" /></a></div>\n', 'RIGHTSIDESNIPPET', '0', 1, '2014-05-28 06:28:41', NULL, NULL),
(4, 'Welcome Message - Home Page', 'MonaruLanka is the first long range low-cost carrier from the Pearl of the Indian ocean, Sri Lanka, and the project of many professionals involved from various disciples. We are an entity geared to serve our guest in the most professional, warm and friendly manner. We at MonaruLanka, with the blessings of the governance of the country, welcome all onboard for an unforgettable journey via the most beautiful island of the Indian Ocean, SRI LANKA.', 'WELCOMEHOMEPAGE', '0', 1, '2014-05-28 06:28:41', NULL, NULL),
(5, 'Welcome To Monaru Lanka', 'test welcoem inner page', 'WELCOMEINNERPAGE', '0', 1, '2014-05-28 07:12:16', NULL, NULL),
(6, 'Contact Us', '', 'CONTACTUS', '0', 1, '2014-05-28 07:12:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `va_drivers`
--

CREATE TABLE IF NOT EXISTS `va_drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `land_phone` varchar(10) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `is_terms_agreed` enum('1','0') NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `va_drivers`
--

INSERT INTO `va_drivers` (`id`, `name`, `nic`, `mobile`, `land_phone`, `email`, `password`, `profile_pic`, `is_terms_agreed`, `is_deleted`, `added_date`, `updated_date`) VALUES
(1, 'Gayathma Perera', '911622491V', '3243432411', '3243432411', 'gayathma3@gmail.com', 'c4961b067d274050e43e26beb9d7d19c', 'avatar.png', '0', 0, '2016-09-11 11:54:50', '2016-09-11 08:24:50'),
(2, 'dfdfsd', '911622491V', '3243432411', '1111111111', 'fdfdf@dfd.fhf', 'e10adc3949ba59abbe56e057f20f883e', 'avatar.png', '0', 0, '2016-09-10 18:30:00', NULL),
(3, 'dsdsd', '911622491V', '3243432411', '3212323233', 'weqwe@fsdf.nnf', 'e10adc3949ba59abbe56e057f20f883e', 'avatar.png', '0', 0, '2016-09-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `va_sliders`
--

CREATE TABLE IF NOT EXISTS `va_sliders` (
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
-- Dumping data for table `va_sliders`
--

INSERT INTO `va_sliders` (`slider_id`, `slider_no`, `slider_title`, `slider_image`, `slider_order`, `delete_status`, `added_date`, `added_by`, `updated_by`, `updated_date`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `va_vehicles`
--

CREATE TABLE IF NOT EXISTS `va_vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `service_type` enum('school','office','trip','other') NOT NULL,
  `vehicle_image` varchar(300) NOT NULL,
  `seats` int(11) NOT NULL,
  `isAc` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `va_vehicle_routes`
--

CREATE TABLE IF NOT EXISTS `va_vehicle_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `cities` text NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
