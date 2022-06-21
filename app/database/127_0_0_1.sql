-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 14 jun 2022 om 14:56
-- Serverversie: 5.7.31
-- PHP-versie: 7.4.15

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
CREATE DATABASE IF NOT EXISTS `mvcframework` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mvcframework`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `capitalCity` varchar(300) NOT NULL,
  `continent` enum('Afrika','Antartica','Azie','Australie/Oceanie','Europa','Noord-Amerika','Zuid-Amerika') NOT NULL,
  `population` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `country`
--

INSERT INTO `country` (`id`, `name`, `capitalCity`, `continent`, `population`) VALUES
(39, 'China', 'Bejing', 'Australie/Oceanie', 1234000000),
(58, 'Tanzania', 'Dodoma', 'Afrika', 59730000),
(47, 'Japan', 'Tokyo', 'Azie', 1230000000),
(73, 'Senegal', 'Dakar', 'Afrika', 16740001),
(54, 'Belgi&euml;', 'Brussel', 'Europa', 3254364324),
(62, 'Zwitserland', 'Bern', 'Europa', 4294267295);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `countrys`
--

DROP TABLE IF EXISTS `countrys`;
CREATE TABLE IF NOT EXISTS `countrys` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `capitalCity` varchar(300) NOT NULL,
  `continent` enum('Afrika','Antarctica','Azië','Australië/Oceanië','Europa','Noord-Amerika','Zuid-Amerika') NOT NULL,
  `population` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `countrys`
--

INSERT INTO `countrys` (`id`, `name`, `capitalCity`, `continent`, `population`) VALUES
(3, 'Chilies', 'Santiagos', 'Noord-Amerika', 19116203),
(4, 'Canada', 'Ottawa', 'Noord-Amerika', 37742154),
(5, 'Australië', 'Canberra', 'Australië/Oceanië', 25499884),
(6, 'China', 'Beijing', 'Azië', 1439323776),
(16, 'Nederland', 'Amsterdam', 'Europa', 170000000);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fruit`
--

DROP TABLE IF EXISTS `fruit`;
CREATE TABLE IF NOT EXISTS `fruit` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `fruit`
--

INSERT INTO `fruit` (`id`, `name`, `color`, `price`) VALUES
(3, 'Paprikaatje', 'roodbruin', 2.45),
(4, 'Citroen', 'geel', 1.67),
(5, 'Aardbei', 'rood', 2.56),
(6, 'Peer', 'groen', 0.88);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollercoaster`
--

DROP TABLE IF EXISTS `rollercoaster`;
CREATE TABLE IF NOT EXISTS `rollercoaster` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameRollerCoaster` varchar(200) NOT NULL,
  `nameAmusementPark` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `topspeed` tinyint(4) UNSIGNED NOT NULL,
  `height` tinyint(4) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `rollercoaster`
--

INSERT INTO `rollercoaster` (`id`, `nameRollerCoaster`, `nameAmusementPark`, `country`, `topspeed`, `height`) VALUES
(1, 'Red Force', 'Ferrari land', 'Spanje', 192, 112),
(2, 'Ring Racer', 'Race circuit Nürnberg', 'Duitsland', 160, 110),
(3, 'Hyperion', 'EnergyLandia', 'Polen', 141, 77),
(4, 'Furios Baco', 'PortAventura', 'Spanje', 138, 23),
(5, 'Shambala', 'PortAventura', 'Spanje', 134, 102);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `password`) VALUES
(1, 'rra', 'rra@mboutrecht.nl', 'Geheim!'),
(2, 'hsok', 'hsok@mboutrecht.nl', 'Geheim!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
