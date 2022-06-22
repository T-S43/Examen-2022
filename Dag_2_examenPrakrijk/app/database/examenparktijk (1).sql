-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2022 at 08:05 AM
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
-- Database: `examenparktijk`
--

-- --------------------------------------------------------

--
-- Table structure for table `annulerenlessen`
--

DROP TABLE IF EXISTS `annulerenlessen`;
CREATE TABLE IF NOT EXISTS `annulerenlessen` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `les` varchar(100) NOT NULL,
  `reden` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `les` (`les`)
) ENGINE=MyISAM AUTO_INCREMENT=2346 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annulerenlessen`
--

INSERT INTO `annulerenlessen` (`id`, `les`, `reden`) VALUES
(2343, '45', 'corona'),
(2344, '50', 'griep'),
(2345, '52', 'voet bezeerd'),
(2, '43', 'griep');

-- --------------------------------------------------------

--
-- Table structure for table `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `email` varchar(100) NOT NULL,
  `naam` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructeur`
--

INSERT INTO `instructeur` (`email`, `naam`) VALUES
('groen@mail.com', 'Groen'),
('konijn@google.com', 'Konijn'),
('marian@mail.com', 'Maria'),
('frasi@google.com', 'Frosi');

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `straat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`id`, `naam`, `woonplaats`, `postcode`, `straat`) VALUES
(3, 'Konijn', 'Utrecht', '3590UV', 'Laan 45'),
(4, 'Slavink', 'Nieuwegein', '3678II', 'Overweg'),
(6, 'Otto', 'Houten', '3822AS', 'Groenlo 44'),
(7, 'Maria', 'Rotterdam', '3678II', 'Overweg');

-- --------------------------------------------------------

--
-- Table structure for table `rijles`
--

DROP TABLE IF EXISTS `rijles`;
CREATE TABLE IF NOT EXISTS `rijles` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `leerling` varchar(100) NOT NULL,
  `instructeur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `leerling` (`leerling`),
  KEY `instructeur` (`instructeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rijles`
--

INSERT INTO `rijles` (`id`, `datum`, `leerling`, `instructeur`) VALUES
(45, '2022-05-20', '3', 'groen@mail.com'),
(46, '2022-05-20', '6', 'frasi@google.sp'),
(47, '2022-05-21', '4', 'konijn@google.com'),
(49, '2022-05-21', '6', 'konijn@google.com'),
(48, '2022-05-21', '6', 'konijn@google.com'),
(61, '2022-05-21', '6', 'konijn@google.com'),
(60, '2022-05-21', '4', 'konijn@google.com'),
(50, '2022-05-22', '3', 'groen@mail.nl'),
(51, '2022-05-28', '4', 'konijn@google.com'),
(52, '2022-05-01', '3', 'konijn@google.com'),
(53, '2022-06-12', '3', 'groen@mail.nl'),
(54, '2022-06-22', '3', 'groen@mail.nl'),
(55, '2022-06-24', '4', 'konijn@google.com'),
(1, '2022-05-21', '6', 'konijn@google.com'),
(20, '2022-05-21', '6', 'konijn@google.com'),
(40, '2022-05-21', '4', 'konijn@google.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
