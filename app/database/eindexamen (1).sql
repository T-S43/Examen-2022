-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2022 at 01:49 PM
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
-- Table structure for table `opmerkingen`
--

DROP TABLE IF EXISTS `opmerkingen`;
CREATE TABLE IF NOT EXISTS `opmerkingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `les` int(11) NOT NULL,
  `opmerking` char(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_les_lessen` (`les`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opmerkingen`
--

INSERT INTO `opmerkingen` (`id`, `les`, `opmerking`) VALUES
(12, 1, 'test'),
(13, 1, 'Hallo test'),
(14, 4, 'toevoegen'),
(15, 2, '32'),
(16, 2, ' 2 TEST 2'),
(17, 1, '222222ERIOF');

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
-- Constraints for table `opmerkingen`
--
ALTER TABLE `opmerkingen`
  ADD CONSTRAINT `FK_les_lessen` FOREIGN KEY (`les`) REFERENCES `lessen` (`id`);

--
-- Constraints for table `voertuig`
--
ALTER TABLE `voertuig`
  ADD CONSTRAINT `FK_instructeurId_instructeur` FOREIGN KEY (`instructeurId`) REFERENCES `instructeur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
