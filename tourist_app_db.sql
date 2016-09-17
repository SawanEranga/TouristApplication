-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2016 at 06:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tourist_app_db`
--
CREATE DATABASE IF NOT EXISTS `tourist_app_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tourist_app_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `cus_id` int(200) NOT NULL AUTO_INCREMENT,
  `cus_first_name` varchar(200) NOT NULL,
  `cus_last_name` varchar(200) NOT NULL,
  `cus_email` varchar(500) NOT NULL,
  `cus_tel_no` varchar(50) NOT NULL,
  `cus_password` varchar(500) NOT NULL,
  `cus_country` varchar(500) NOT NULL,
  `cus_profile_pic` varchar(100) NOT NULL,
  `cus_registered_date` varchar(200) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
