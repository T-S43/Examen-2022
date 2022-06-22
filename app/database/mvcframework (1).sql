-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2022 at 12:56 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvcframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
CREATE TABLE IF NOT EXISTS `auto` (
  `kenteken` char(8) NOT NULL,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`kenteken`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`kenteken`, `type`) VALUES
('AU-67-10', 'Golf'),
('TH-78KL', 'Ferrari'),
('90-KL-TR', 'Fiat 500'),
('YY-OP-78', 'Mercedes'),
('DR-42-0H', 'Ford Mustang');

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `name` varchar(50) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `woonplaats` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`name`, `adres`, `woonplaats`) VALUES
('Sherick', 'De Beemd 22', 'Barneveld'),
('Gerda', 'Lange Voren 3', 'Barneveld'),
('Bert', 'De Grote Koppel 5', 'Amersfoort'),
('Batrisschia', 'Porkenstein 31', 'Utrecht'),
('Bob', 'De bouwerstraat 27', 'Bouwveld');

-- --------------------------------------------------------

--
-- Table structure for table `mankement`
--

DROP TABLE IF EXISTS `mankement`;
CREATE TABLE IF NOT EXISTS `mankement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auto` char(8) NOT NULL,
  `datum` date NOT NULL,
  `mankement` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mankement`
--

INSERT INTO `mankement` (`id`, `auto`, `datum`, `mankement`) VALUES
(2, 'AU-67-10', '2022-06-21', 'Rechter achterlicht kapot'),
(3, 'AU-67-10', '2022-06-21', 'Achterkant van auto kapoet'),
(12, 'AU-67-10', '2022-06-21', 'Achterkant van auto kapoet'),
(10, '90-KL-TR', '2022-06-08', 'Achterkant van auto kapoet'),
(11, 'AU-67-10', '2022-06-21', 'Achterkant van auto kapoet');

-- --------------------------------------------------------

--
-- Table structure for table `rijles`
--

DROP TABLE IF EXISTS `rijles`;
CREATE TABLE IF NOT EXISTS `rijles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `ophaaladres` varchar(50) NOT NULL,
  `student` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rijles`
--

INSERT INTO `rijles` (`id`, `datum`, `tijd`, `ophaaladres`, `student`) VALUES
(1, '2022-05-29', '23:09:00', 'De Beemd 22', 'Sherick'),
(2, '2022-06-03', '23:10:00', 'De Beemd 22', 'Bob'),
(8, '2022-06-07', '13:12:00', 'Spanje', 'Sherick'),
(9, '2022-06-16', '13:12:00', 'Spanje', 'Sherick'),
(10, '2022-06-16', '14:57:00', 'Spanje', 'Batrisschia');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
