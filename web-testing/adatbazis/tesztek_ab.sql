-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2013 at 06:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adatok`
--
CREATE DATABASE `adatok` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `adatok`;

-- --------------------------------------------------------

--
-- Table structure for table `adatok`
--

CREATE TABLE IF NOT EXISTS `adatok` (
  `emailcim` varchar(45) NOT NULL,
  `jelszo` varchar(45) NOT NULL,
  `csaladnev` varchar(20) NOT NULL,
  `keresztnev` varchar(20) NOT NULL,
  `szuletesi_datum` date NOT NULL,
  `telepules` varchar(45) NOT NULL,
  `telefonszam` varchar(14) DEFAULT NULL,
  `bejelentkezve` tinyint(1) NOT NULL,
  `akt_teszt_kitoltes` int(11) DEFAULT NULL,
  PRIMARY KEY (`emailcim`),
  KEY `akt_teszt_kitoltes_idx` (`akt_teszt_kitoltes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adatok`
--

INSERT INTO `adatok` (`emailcim`, `jelszo`, `csaladnev`, `keresztnev`, `szuletesi_datum`, `telepules`, `telefonszam`, `bejelentkezve`, `akt_teszt_kitoltes`) VALUES
('kinga_hhh@yahoo.com', 'qwerty', 'Hadnagy', 'Kinga', '1991-12-26', 'Arad', NULL, 0, NULL),
('laszlorenata@yahoo.com', 'qwerty', 'Laszlo', 'Renata', '1991-05-01', 'Szilagysag', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kitoltotttesztek`
--

CREATE TABLE IF NOT EXISTS `kitoltotttesztek` (
  `emailcim` varchar(45) NOT NULL,
  `idTesztek` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `1Kerdes` varchar(45) DEFAULT NULL,
  `2Kerdes` varchar(45) DEFAULT NULL,
  `3Kerdes` varchar(45) DEFAULT NULL,
  `4Kerdes` varchar(45) DEFAULT NULL,
  `5Kerdes` varchar(45) DEFAULT NULL,
  `6Kerdes` varchar(45) DEFAULT NULL,
  `7Kerdes` varchar(45) DEFAULT NULL,
  `8Kerdes` varchar(45) DEFAULT NULL,
  `9Kerdes` varchar(45) DEFAULT NULL,
  `10Kerdes` varchar(45) DEFAULT NULL,
  `11Kerdes` varchar(45) DEFAULT NULL,
  `12Kerdes` varchar(45) DEFAULT NULL,
  `13Kerdes` varchar(45) DEFAULT NULL,
  `14Kerdes` varchar(45) DEFAULT NULL,
  `15Kerdes` varchar(45) DEFAULT NULL,
  `16Kerdes` varchar(45) DEFAULT NULL,
  `17Kerdes` varchar(45) DEFAULT NULL,
  `18Kerdes` varchar(45) DEFAULT NULL,
  `19Kerdes` varchar(45) DEFAULT NULL,
  `20Kerdes` varchar(45) DEFAULT NULL,
  `Eredmeny` double DEFAULT NULL,
  PRIMARY KEY (`emailcim`,`idTesztek`,`Datum`),
  KEY `fk_KitoltottTesztek_adatok1_idx` (`emailcim`),
  KEY `fk_KitoltottTesztek_Tesztek1_idx` (`idTesztek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kitoltotttesztek`
--

INSERT INTO `kitoltotttesztek` (`emailcim`, `idTesztek`, `Datum`, `1Kerdes`, `2Kerdes`, `3Kerdes`, `4Kerdes`, `5Kerdes`, `6Kerdes`, `7Kerdes`, `8Kerdes`, `9Kerdes`, `10Kerdes`, `11Kerdes`, `12Kerdes`, `13Kerdes`, `14Kerdes`, `15Kerdes`, `16Kerdes`, `17Kerdes`, `18Kerdes`, `19Kerdes`, `20Kerdes`, `Eredmeny`) VALUES
('kinga_hhh@yahoo.com', 5, '2013-05-05 00:00:00', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('laszlorenata@yahoo.com', 7, '2013-05-02 00:00:00', 'a', 'c', 'b', 'a', 'c', 'b', 'a', 'c', 'b', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tesztek`
--

CREATE TABLE IF NOT EXISTS `tesztek` (
  `idTesztek` int(11) NOT NULL AUTO_INCREMENT,
  `TesztNev` varchar(45) NOT NULL,
  `KerdesSzam` int(11) NOT NULL,
  `TesztAktivitas` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTesztek`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tesztek`
--

INSERT INTO `tesztek` (`idTesztek`, `TesztNev`, `KerdesSzam`, `TesztAktivitas`) VALUES
(1, 'Geomatria1', 12, 1),
(2, 'Geometria2', 8, 0),
(3, 'Geomatria1', 12, 0),
(4, 'Geometria2', 8, 0),
(5, 'Algebra1', 10, 1),
(6, 'Algebra2', 14, 1),
(7, 'Algebra1', 10, 1),
(8, 'Algebra2', 14, 1),
(9, 'Analizis1', 15, 1),
(10, 'Analizis2', 12, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adatok`
--
ALTER TABLE `adatok`
  ADD CONSTRAINT `akt_teszt_kitoltes` FOREIGN KEY (`akt_teszt_kitoltes`) REFERENCES `tesztek` (`idTesztek`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kitoltotttesztek`
--
ALTER TABLE `kitoltotttesztek`
  ADD CONSTRAINT `fk_KitoltottTesztek_adatok1` FOREIGN KEY (`emailcim`) REFERENCES `adatok` (`emailcim`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_KitoltottTesztek_Tesztek1` FOREIGN KEY (`idTesztek`) REFERENCES `tesztek` (`idTesztek`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
