-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2022 at 12:00 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eindexamen`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` char(100) NOT NULL,
  `adres` char(60) NOT NULL,
  `woonplaats` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructeur`
--

INSERT INTO `instructeur` (`id`, `naam`, `adres`, `woonplaats`) VALUES
(1, 'Hendriks van Robinson', 'Hemelstraat 114', 'Amstelveen'),
(2, 'Bendrix Chameleo', 'Leerlanglaan 78', 'Utrecht'),
(3, 'Johnson Reddison', 'Blijlaan 84', 'Amsterdam'),
(4, 'Patrick Livmoore', 'Pieterstraat 51', 'Groningen'),
(5, 'Rick Fair', 'Waarlaan 86', 'Utrecht');

-- --------------------------------------------------------

--
-- Table structure for table `instructeur1`
--

DROP TABLE IF EXISTS `instructeur1`;
CREATE TABLE IF NOT EXISTS `instructeur1` (
  `email` char(50) NOT NULL,
  `naam` char(60) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructeur1`
--

INSERT INTO `instructeur1` (`email`, `naam`) VALUES
('frasi@google.sp', 'Frasi'),
('groen@mail.nl', 'Groen'),
('konijn@google.com', 'Konijn');

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`id`, `naam`) VALUES
(1, 'Konijn'),
(2, 'Slavink'),
(3, 'Otto');

-- --------------------------------------------------------

--
-- Table structure for table `leerling1`
--

DROP TABLE IF EXISTS `leerling1`;
CREATE TABLE IF NOT EXISTS `leerling1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leerling1`
--

INSERT INTO `leerling1` (`id`, `naam`) VALUES
(1, 'Konijn'),
(2, 'Slavink'),
(3, 'Otto');

-- --------------------------------------------------------

--
-- Table structure for table `lessen`
--

DROP TABLE IF EXISTS `lessen`;
CREATE TABLE IF NOT EXISTS `lessen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `leerling` int(11) NOT NULL,
  `onderdeel` char(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_leerling_leerling` (`leerling`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessen`
--

INSERT INTO `lessen` (`id`, `datum`, `leerling`, `onderdeel`) VALUES
(1, '2022-06-11', 1, 'Achteruit rijden'),
(2, '2022-06-14', 1, 'File rijden'),
(3, '2022-06-16', 3, 'Stadsverkeer'),
(4, '2022-06-20', 1, 'Parkeren'),
(5, '2022-06-20', 3, 'Achteruit rijden'),
(6, '2022-06-21', 2, 'Parkeren'),
(7, '2022-06-21', 3, 'Parkeren'),
(8, '2022-06-22', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessen1`
--

DROP TABLE IF EXISTS `lessen1`;
CREATE TABLE IF NOT EXISTS `lessen1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `leerling` int(11) NOT NULL,
  `instructeur` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_lessen1.instructeur_instructeur1.email` (`instructeur`),
  KEY `FK_lessen1.leerling_leerling1.id` (`leerling`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessen1`
--

INSERT INTO `lessen1` (`id`, `datum`, `leerling`, `instructeur`) VALUES
(1, '2022-05-20', 1, 'groen@mail.nl'),
(2, '2022-05-20', 3, 'frasi@google.sp'),
(3, '2022-05-21', 2, 'konijn@google.com'),
(4, '2022-05-21', 3, 'frasi@google.sp'),
(5, '2022-05-22', 1, 'groen@mail.nl'),
(6, '2022-05-28', 2, 'konijn@google.com'),
(7, '2022-06-01', 1, 'konijn@google.com'),
(8, '2022-06-12', 1, 'groen@mail.nl'),
(9, '2022-06-22', 1, 'groen@mail.nl'),
(10, '2022-06-27', 1, 'frasi@google.sp');

-- --------------------------------------------------------

--
-- Table structure for table `onderwerpen1`
--

DROP TABLE IF EXISTS `onderwerpen1`;
CREATE TABLE IF NOT EXISTS `onderwerpen1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `les` int(11) NOT NULL,
  `onderwerp` char(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_onderwerpen1.les_lessen1.id` (`les`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onderwerpen1`
--

INSERT INTO `onderwerpen1` (`id`, `les`, `onderwerp`) VALUES
(1, 1, 'File parkeren'),
(2, 2, 'Achteruit rijden'),
(3, 5, 'File parkeren'),
(4, 5, 'Invoegen snelweg'),
(5, 6, 'Achteruit rijden'),
(6, 6, 'Achteruit rijden'),
(7, 8, 'Achteruit rijden'),
(8, 8, 'Invoegen snelweg'),
(9, 8, 'File parkeren');

-- --------------------------------------------------------

--
-- Table structure for table `opmerkingen`
--

DROP TABLE IF EXISTS `opmerkingen`;
CREATE TABLE IF NOT EXISTS `opmerkingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `les` int(11) NOT NULL,
  `opmerking` char(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_les_lessen` (`les`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opmerkingen`
--

INSERT INTO `opmerkingen` (`id`, `les`, `opmerking`) VALUES
(12, 1, 'test'),
(13, 1, 'Hallo test'),
(14, 4, 'toevoegen'),
(15, 2, '32'),
(16, 2, ' 2 TEST 2'),
(17, 1, '222222ERIOF'),
(18, 1, 'ds'),
(19, 1, '43'),
(20, 1, 'dsds');

-- --------------------------------------------------------

--
-- Table structure for table `opmerkingen1`
--

DROP TABLE IF EXISTS `opmerkingen1`;
CREATE TABLE IF NOT EXISTS `opmerkingen1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `les` int(11) NOT NULL,
  `opmerking` char(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_opmerkingen1.les_lessen.id` (`les`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opmerkingen1`
--

INSERT INTO `opmerkingen1` (`id`, `les`, `opmerking`) VALUES
(4, 1, 'File parkeren kan beter'),
(5, 2, 'Beter in spiegel kijken'),
(6, 5, 'Opletten op aankomend verkeer'),
(7, 5, 'Langer doorrijden bij invoegen'),
(8, 6, 'Langzaam aan'),
(9, 8, 'Beter in spiegels kijken'),
(10, 8, 'Richtingaanwijzer');

-- --------------------------------------------------------

--
-- Table structure for table `voertuig`
--

DROP TABLE IF EXISTS `voertuig`;
CREATE TABLE IF NOT EXISTS `voertuig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` char(50) NOT NULL,
  `type` char(50) NOT NULL,
  `kenteken` char(50) NOT NULL,
  `instructeurId` int(11) NOT NULL,
  `kilometer` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_instructeurId_instructeur` (`instructeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voertuig`
--

INSERT INTO `voertuig` (`id`, `merk`, `type`, `kenteken`, `instructeurId`, `kilometer`) VALUES
(1, 'Tesla', 'D5000', 'G-029-XL', 3, 534),
(2, 'Mercedes-Benz', 'L', 'VVC-567-DP', 1, 4343),
(3, 'Aston Martin', 'Benzine', '63-LBW-LL', 2, 110),
(6, 'DeLorean Motor Company', 'dmc', '03-POR-76', 5, 322),
(7, 'Ford', 'Ford Mustang', '98-3ND-ID', 4, 64);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `FK_leerling_leerling` FOREIGN KEY (`leerling`) REFERENCES `leerling` (`id`);

--
-- Constraints for table `lessen1`
--
ALTER TABLE `lessen1`
  ADD CONSTRAINT `FK_lessen1.instructeur_instructeur1.email` FOREIGN KEY (`instructeur`) REFERENCES `instructeur1` (`email`),
  ADD CONSTRAINT `FK_lessen1.leerling_leerling1.id` FOREIGN KEY (`leerling`) REFERENCES `leerling1` (`id`);

--
-- Constraints for table `onderwerpen1`
--
ALTER TABLE `onderwerpen1`
  ADD CONSTRAINT `FK_onderwerpen1.les_lessen1.id` FOREIGN KEY (`les`) REFERENCES `lessen1` (`id`);

--
-- Constraints for table `opmerkingen`
--
ALTER TABLE `opmerkingen`
  ADD CONSTRAINT `FK_les_lessen` FOREIGN KEY (`les`) REFERENCES `lessen` (`id`);

--
-- Constraints for table `opmerkingen1`
--
ALTER TABLE `opmerkingen1`
  ADD CONSTRAINT `FK_opmerkingen1.les_lessen.id` FOREIGN KEY (`les`) REFERENCES `lessen1` (`id`);

--
-- Constraints for table `voertuig`
--
ALTER TABLE `voertuig`
  ADD CONSTRAINT `FK_instructeurId_instructeur` FOREIGN KEY (`instructeurId`) REFERENCES `instructeur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
