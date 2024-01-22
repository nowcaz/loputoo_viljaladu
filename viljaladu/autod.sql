-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Jaan 22, 2024 kell 01:10 PL
-- Serveri versioon: 10.4.27-MariaDB
-- PHP versioon: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `jan`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `autod`
--

CREATE TABLE `autod` (
  `id` int(11) NOT NULL,
  `autonr` varchar(20) NOT NULL,
  `sisenemismass` decimal(10,2) NOT NULL,
  `lahkumismass` decimal(10,2) DEFAULT NULL,
  `vilja_asukoht` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `autod`
--

INSERT INTO `autod` (`id`, `autonr`, `sisenemismass`, `lahkumismass`, `vilja_asukoht`) VALUES
(1, 'Auto123', '1500.50', '3.00', 'Sihtkoht1'),
(2, 'TTT111', '12345.00', '222.00', 'Venemaa'),
(3, 'WWW123', '98765.00', '777.00', 'London'),
(4, 'UUU123', '8888.00', '2.00', 'Brasiilia'),
(5, 'PPP123', '888.00', '82.00', 'Venemaa, Moskva'),
(6, 'OOO555', '9000.00', '80.00', 'Portugal, Lisbon'),
(7, '1234fg', '124.00', NULL, 'dfg'),
(8, '1234', '213.00', NULL, 'frds'),
(9, 'VVV777', '4000.00', '1.00', 'Eesti, Tallinn'),
(10, '123www', '4444.00', NULL, 'Soome, Helsinki'),
(11, 'HHH123', '5000.00', '2000.00', 'Saksamaa, Berlin');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `autod`
--
ALTER TABLE `autod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `autod`
--
ALTER TABLE `autod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
