-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 22 jun 2022 om 08:40
-- Serverversie: 5.7.31
-- PHP-versie: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drive4all`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auto`
--

DROP TABLE IF EXISTS `auto`;
CREATE TABLE IF NOT EXISTS `auto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kenteken` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `auto`
--

INSERT INTO `auto` (`id`, `kenteken`, `type`) VALUES
(1, 'AU-67-10', 'Golf'),
(2, 'TH-78-KL', 'Ferrari'),
(3, '90-KL-TR', 'Fiat 500'),
(4, 'YY-OP-78', 'Mercedes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE IF NOT EXISTS `gebruikers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `birthday` varchar(16) NOT NULL,
  `adress` varchar(64) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `firstname`, `lastname`, `email`, `birthday`, `adress`, `phone`) VALUES
(1, 'Bas', 'Lonkers', 'baslonkers@mail.com', '21-6-2004', 'Bietenstraat 26 Arnhem', 647295729),
(2, 'Johan', 'Dekker', 'j.dekker@mail.com', '08-02-1998', 'Koffellaan 6 Utrecht', 628603827),
(3, 'Yuri', 'Kniet', 'yuriknietert@mail.com', '04-07-1984', 'Daltonlaan 301 Utrecht', 627592840),
(4, 'Pow', 'Zwefel', 'powpowzwefel@mail.com', '06-09-2006', 'Rietdekkerslaan 7 Amersfoort', 648295001),
(5, 'Hans', 'Luk', 'h.luk@mail.com', '09-02-2001', 'Lokkersdonk 23 Middelburg', 647399620);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kmstanden`
--

DROP TABLE IF EXISTS `kmstanden`;
CREATE TABLE IF NOT EXISTS `kmstanden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auto` varchar(64) NOT NULL,
  `datum` date NOT NULL,
  `kmstand` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auto` (`auto`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `kmstanden`
--

INSERT INTO `kmstanden` (`id`, `auto`, `datum`, `kmstand`) VALUES
(1, 'YY-OP-78', '2022-05-19', 70788),
(2, 'TH-78-KL', '2022-05-19', 12670),
(3, 'AU-67-10', '2022-05-20', 60345),
(4, '90-KL-TR', '2022-05-21', 21300),
(5, 'AU-67-10', '2022-05-21', 60900),
(7, '90-KL-TR', '2022-06-21', 77000),
(8, '90-KL-TR', '2022-06-21', 58000),
(9, '90-KL-TR', '2022-06-21', 70000);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(32) NOT NULL,
  `pakket` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `leerling`
--

INSERT INTO `leerling` (`id`, `naam`, `pakket`) VALUES
(3, 'Konijn', 'Pakket 1'),
(7, 'Pieter', 'Pakket 2'),
(4, 'Slavink', 'Pakket 2'),
(6, 'Otto', 'Pakket 1'),
(8, 'Ron', 'Pakket 1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lessen`
--

DROP TABLE IF EXISTS `lessen`;
CREATE TABLE IF NOT EXISTS `lessen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `leerling` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `leerling` (`leerling`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lessen`
--

INSERT INTO `lessen` (`id`, `datum`, `leerling`) VALUES
(45, '2022-06-20', 3),
(46, '2022-06-20', 6),
(47, '2022-06-21', 4),
(48, '2022-06-21', 6),
(49, '2022-06-22', 3),
(50, '2022-08-22', 6),
(51, '2022-08-22', 3),
(52, '2022-10-22', 4),
(53, '2022-11-22', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pakketten`
--

DROP TABLE IF EXISTS `pakketten`;
CREATE TABLE IF NOT EXISTS `pakketten` (
  `naam` varchar(16) NOT NULL,
  `prijs` int(11) NOT NULL,
  `aantallessen` int(11) NOT NULL,
  `cbrexamen` int(11) NOT NULL,
  `betaaltermijnen` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `pakketten`
--

INSERT INTO `pakketten` (`naam`, `prijs`, `aantallessen`, `cbrexamen`, `betaaltermijnen`) VALUES
('Pakket 1', 400, 5, 1, '2 x 220,00'),
('Pakket 2', 590, 10, 1, '2 x 310,00'),
('Pakket 3', 735, 15, 1, '3 x 260,00'),
('Pakket 4', 890, 20, 1, '4 x 235,00'),
('Pakket 5', 1190, 30, 1, '1 x 1190');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ziekmelden`
--

DROP TABLE IF EXISTS `ziekmelden`;
CREATE TABLE IF NOT EXISTS `ziekmelden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `connection_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `reason` varchar(512) NOT NULL,
  `since_date` date NOT NULL,
  `until_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ziekmelden`
--

INSERT INTO `ziekmelden` (`id`, `connection_id`, `status`, `reason`, `since_date`, `until_date`) VALUES
(1, 1, 1, 'Met vakantie voor 1 week', '2022-04-13', '2022-04-23'),
(2, 1, 1, 'EHBO cursus voor werk', '2022-06-15', '2022-06-16'),
(3, 1, 1, 'Ziek, voel me niet gezond genoeg.', '2022-05-15', '2022-05-16'),
(4, 1, 1, 'Ziek, voel me niet gezond genoeg corona test staat gepland.', '2022-06-02', '2022-05-03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
