-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql313.totalhost.tk
-- Generation Time: Oct 24, 2018 at 12:59 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ttlh_22205989_mcis`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE IF NOT EXISTS `car_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `count` int(11) NOT NULL,
  `manufacturers_name` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`id`, `name`, `count`, `manufacturers_name`, `is_active`) VALUES
(3, 'Q5', 7, 'Audi', 1),
(4, 'Q8', 0, 'Audi', 0),
(5, '5 series', 0, 'BMW', 0),
(6, 'AS', 0, 'Isuzu', 0),
(7, 'Q3', 2, 'Audi', 1),
(8, 'City', 8, 'Honda', 1),
(9, 'Duster', 4, 'Renault', 1),
(10, 'Kwid', 6, 'Renault', 1),
(11, 'Thar', 2, 'Jeep', 1),
(12, 'R8', 0, 'Audi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `is_active`) VALUES
(1, 'BMW', 1),
(3, 'Volvo', 1),
(4, 'Audi', 1),
(5, 'Toyota', 1),
(9, 'Isuzu', 1),
(10, 'Suzuki', 1),
(11, 'Renault', 1),
(12, 'TATA', 1),
(13, 'Honda', 1),
(14, 'Jeep', 1),
(15, 'Skoda', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
