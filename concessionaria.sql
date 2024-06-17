-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 11, 2024 alle 11:35
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concessionaria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nome_admin` varchar(50) NOT NULL,
  `cognome_admin` varchar(50) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`id_admin`, `nome_admin`, `cognome_admin`, `username_admin`, `password_admin`) VALUES
(1, 'Admin', 'Admin', 'admin', '$2y$10$7FIvYNHx.QJ8//V4ewRyKOPoIE.YqeVzedpXse.mXG9xxEP.VLn4W');

-- --------------------------------------------------------

--
-- Struttura della tabella `auto`
--

CREATE TABLE `auto` (
  `id_auto` int(11) NOT NULL,
  `modello_auto` varchar(50) NOT NULL,
  `produttrice_auto` varchar(50) NOT NULL,
  `cavalli_auto` int(11) NOT NULL,
  `cilindrata_auto` int(11) NOT NULL,
  `alimentazione_auto` varchar(50) NOT NULL,
  `anno_auto` int(11) NOT NULL,
  `prezzo_auto` int(11) NOT NULL,
  `id_rappresentante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `auto`
--

INSERT INTO `auto` (`id_auto`, `modello_auto`, `produttrice_auto`, `cavalli_auto`, `cilindrata_auto`, `alimentazione_auto`, `anno_auto`, `prezzo_auto`, `id_rappresentante`) VALUES
(19, 'Lupo', 'Volkswagen', 60, 1300, 'Benzina', 2004, 1500, 12),
(20, 'Golf 8 GTI', 'Volkswagen', 245, 2000, 'Benzina', 2023, 55000, 12),
(21, 'MiTo', 'Alfa Romeo', 78, 1400, 'Benzina', 2015, 9000, 13),
(22, 'Giulia', 'Alfa Romeo', 280, 2000, 'Benzina', 2023, 60000, 13),
(23, 'Tipo', 'Fiat', 95, 1300, 'Diesel', 2019, 13000, 11),
(24, '500X', 'Fiat', 120, 1600, 'Diesel', 2020, 22000, 11),
(25, 'Passat', 'Volkswagen', 150, 1500, 'Benzina', 2022, 40000, 12),
(26, 'T-roc', 'Volkswagen', 100, 1000, 'Benzina', 2020, 30000, 12),
(27, 'Grande punto', 'Fiat', 75, 1300, 'Benzina', 2015, 7500, 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `cognome_cliente` varchar(50) NOT NULL,
  `username_cliente` varchar(20) NOT NULL,
  `password_cliente` varchar(256) NOT NULL,
  `telefono_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `data_nascita_cliente` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `cognome_cliente`, `username_cliente`, `password_cliente`, `telefono_cliente`, `email_cliente`, `data_nascita_cliente`) VALUES
(3, 'Emanuele', 'Acquafredda', 'emanuele68', '$2y$10$Verq3DJ8JwDpXFmO6w25M.QkxALdNFJbFLZp4v3AHZbW1rJGeVVNy', '1234567890', 'emanueleacqua@gmail.com', '1968-02-03'),
(4, 'Domenica', 'Losole', 'mimmainfo', '$2y$10$Dy5kOXz93D5myTOmcduHV.EiHl4Ek9WLTU9Jb61SNNVEBaCl7ELrG', '987654321', 'losoledomenica@gmail.com', '1970-06-02');

-- --------------------------------------------------------

--
-- Struttura della tabella `incontro`
--

CREATE TABLE `incontro` (
  `id_incontro` int(11) NOT NULL,
  `data_incontro` date NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `incontro`
--

INSERT INTO `incontro` (`id_incontro`, `data_incontro`, `id_auto`, `id_cliente`) VALUES
(13, '2024-06-05', 24, 3),
(14, '2024-06-03', 21, 3),
(15, '2024-06-05', 22, 4),
(16, '2024-06-08', 23, 4),
(18, '2024-06-12', 22, 3),
(19, '2024-06-15', 23, 3),
(23, '2024-06-04', 20, 3),
(26, '2024-06-17', 26, 4),
(27, '2024-06-18', 26, 4),
(28, '2024-07-05', 26, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `rappresentante`
--

CREATE TABLE `rappresentante` (
  `id_rappresentante` int(11) NOT NULL,
  `nome_rappresentante` varchar(50) NOT NULL,
  `cognome_rappresentante` varchar(50) NOT NULL,
  `username_rappresentante` varchar(20) NOT NULL,
  `password_rappresentante` varchar(256) NOT NULL,
  `azienda_rappresentante` varchar(50) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `rappresentante`
--

INSERT INTO `rappresentante` (`id_rappresentante`, `nome_rappresentante`, `cognome_rappresentante`, `username_rappresentante`, `password_rappresentante`, `azienda_rappresentante`, `id_admin`) VALUES
(11, 'Giovanni', 'Gaeta', 'giovanni05', '$2y$10$QT12TzM3OXgjW6QIkjsAkeR3Oc7apSZ22mlDwwIPkPkIpIWYldc5.', 'Fiat', 1),
(12, 'Francesco', 'Acquafredda', 'francesco05', '$2y$10$kMBipmbXw7bC7eMX.VBAdODb4al30msYj6XdFOMahJXwLW9DOaROK', 'Volkswagen', 1),
(13, 'Gabriele', 'Viscio', 'gabriele06', '$2y$10$J3L8dX8AF78.wCYQsEp1E.mEziGq0qvBdk7Zh77p.2c2wfMd4CfzG', 'Alfa Romeo', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indici per le tabelle `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_rappresentante` (`id_rappresentante`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indici per le tabelle `incontro`
--
ALTER TABLE `incontro`
  ADD PRIMARY KEY (`id_incontro`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Indici per le tabelle `rappresentante`
--
ALTER TABLE `rappresentante`
  ADD PRIMARY KEY (`id_rappresentante`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `auto`
--
ALTER TABLE `auto`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `incontro`
--
ALTER TABLE `incontro`
  MODIFY `id_incontro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT per la tabella `rappresentante`
--
ALTER TABLE `rappresentante`
  MODIFY `id_rappresentante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `id_rappresentante` FOREIGN KEY (`id_rappresentante`) REFERENCES `rappresentante` (`id_rappresentante`);

--
-- Limiti per la tabella `incontro`
--
ALTER TABLE `incontro`
  ADD CONSTRAINT `id_auto` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id_auto`),
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limiti per la tabella `rappresentante`
--
ALTER TABLE `rappresentante`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
