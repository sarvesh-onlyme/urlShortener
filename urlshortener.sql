-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2014 at 12:11 AM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `urlshortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `urlshortener`
--

CREATE TABLE IF NOT EXISTS `urlshortener` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `URL` text NOT NULL,
  `shortenURL` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `urlshortener`
--

INSERT INTO `urlshortener` (`id`, `URL`, `shortenURL`) VALUES
(31, 'dfsf', 'E'),
(32, 'http://facebook.com', 'F'),
(33, 'http://facebook.com', 'G'),
(34, 'http://facebook.com', 'H'),
(35, 'fgdfg', 'I'),
(36, 'twitter.com', 'J'),
(37, 'fsadfdfd', 'K');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
