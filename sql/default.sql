-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2014 at 05:22 PM
-- Server version: 5.5.35-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ProNote`
--

-- --------------------------------------------------------

--
-- Table structure for table `allNotes`
--

CREATE TABLE IF NOT EXISTS `allNotes` (
  `index` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idno` int(10) unsigned NOT NULL,
  `heading` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `data` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `done` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`index`),
  KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=78 ;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno` (`idno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
