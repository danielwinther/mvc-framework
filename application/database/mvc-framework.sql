-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 23. 11 2016 kl. 18:52:34
-- Serverversion: 10.0.17-MariaDB
-- PHP-version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc-framework`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `age`, `avatar`, `email`, `phone`) VALUES
(1, 'Daniel Winther', 'Jensen', 24, 'https://staticdelivery.nexusmods.com/mods/110/images/74627-0-1459502036.jpg', 'daniel@mail.dk', '88888888'),
(2, 'Benjamin Elzamouri', 'Jensen', 20, 'http://pngimg.com/upload/banana_PNG835.png', 'benjamin@mail.dk', '12345678'),
(3, 'Jacob', 'Balling', 24, 'http://axelthekey.com/wp-content/uploads/2015/05/kiwi.jpg', 'jacob@mail.dk', '66666666'),
(4, 'Jari', 'Larsen', 22, 'http://images.clipartpanda.com/orange-clipart-orange-clipart-6-clipart-kids-pedia.jpg', 'jari@mail.dk', '11111111');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
