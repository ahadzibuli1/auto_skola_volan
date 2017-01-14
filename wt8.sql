-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 08:36 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt8`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `ID` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `sifra` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `rola` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `ime`, `prezime`, `sifra`, `rola`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'admin2', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `log_izvjestaja`
--

CREATE TABLE `log_izvjestaja` (
  `ID` int(11) NOT NULL,
  `vrijeme` timestamp NOT NULL,
  `korisnik_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `log_izvjestaja`
--

INSERT INTO `log_izvjestaja` (`ID`, `vrijeme`, `korisnik_ID`) VALUES
(1, '2017-01-30 23:00:00', 1),
(2, '2017-01-14 17:45:53', 3),
(3, '2017-01-13 23:00:00', 1),
(4, '2017-01-13 23:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usluge`
--

CREATE TABLE `usluge` (
  `ID` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` text COLLATE utf8_slovenian_ci NOT NULL,
  `id_korisnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `usluge`
--

INSERT INTO `usluge` (`ID`, `ime`, `opis`, `id_korisnika`) VALUES
(3, 'nova usluga', 'opis                     \r\n                      ', 1),
(4, 'skroz mala', '                     \r\n      sksksks                ', 1),
(5, 'Ja sam slatka', 'Zato sto sam slatka                     \r\n                      ', 1),
(6, 'moja usluga', '            uslugica         \r\n                      ', 1),
(7, 'naziv ', 'admin 2                     \r\n                      ', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log_izvjestaja`
--
ALTER TABLE `log_izvjestaja`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `korisnik_ID` (`korisnik_ID`);

--
-- Indexes for table `usluge`
--
ALTER TABLE `usluge`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_korisnika` (`id_korisnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `log_izvjestaja`
--
ALTER TABLE `log_izvjestaja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usluge`
--
ALTER TABLE `usluge`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_izvjestaja`
--
ALTER TABLE `log_izvjestaja`
  ADD CONSTRAINT `log_izvjestaja_ibfk_1` FOREIGN KEY (`korisnik_ID`) REFERENCES `korisnici` (`ID`);

--
-- Constraints for table `usluge`
--
ALTER TABLE `usluge`
  ADD CONSTRAINT `usluge_ibfk_1` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
