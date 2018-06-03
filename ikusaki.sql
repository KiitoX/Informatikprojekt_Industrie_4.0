-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jun 2018 um 12:42
-- Server-Version: 10.1.31-MariaDB
-- PHP-Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ikusaki`
--
CREATE DATABASE IF NOT EXISTS `ikusaki` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ikusaki`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `l_booking_robot`
--

CREATE TABLE `l_booking_robot` (
  `ID` int(11) NOT NULL,
  `F_robot` int(11) NOT NULL,
  `F_user` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `l_booking_robot`
--

INSERT INTO `l_booking_robot` (`ID`, `F_robot`, `F_user`, `start_date`, `end_date`) VALUES
(1, 1, 1, '2018-05-28', '2018-05-31'),
(2, 2, 1, '2018-05-23', '2018-05-26'),
(3, 1, 1, '2018-06-13', '2018-06-15');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_robots`
--

CREATE TABLE `t_robots` (
  `ID` int(11) NOT NULL,
  `robot` text NOT NULL,
  `price/day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_robots`
--

INSERT INTO `t_robots` (`ID`, `robot`, `price/day`) VALUES
(1, 'Alice', 1),
(2, 'Pascal', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_user`
--

CREATE TABLE `t_user` (
  `ID` int(11) NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_user`
--

INSERT INTO `t_user` (`ID`, `user`, `password`) VALUES
(1, 'TestUser1', 'hallo');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_visitors`
--

CREATE TABLE `t_visitors` (
  `ID` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_visitors`
--

INSERT INTO `t_visitors` (`ID`, `count`) VALUES
(0, 13);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `l_booking_robot`
--
ALTER TABLE `l_booking_robot`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `F_robot` (`F_robot`),
  ADD KEY `F_user` (`F_user`);

--
-- Indizes für die Tabelle `t_robots`
--
ALTER TABLE `t_robots`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `t_visitors`
--
ALTER TABLE `t_visitors`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `l_booking_robot`
--
ALTER TABLE `l_booking_robot`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `t_robots`
--
ALTER TABLE `t_robots`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `t_user`
--
ALTER TABLE `t_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `t_visitors`
--
ALTER TABLE `t_visitors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `l_booking_robot`
--
ALTER TABLE `l_booking_robot`
  ADD CONSTRAINT `l_booking_robot_ibfk_1` FOREIGN KEY (`F_robot`) REFERENCES `t_robots` (`ID`),
  ADD CONSTRAINT `l_booking_robot_ibfk_2` FOREIGN KEY (`F_user`) REFERENCES `t_user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
