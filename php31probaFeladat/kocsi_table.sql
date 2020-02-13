-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jan 16. 16:42
-- Kiszolgáló verziója: 10.1.38-MariaDB
-- PHP verzió: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `orszagokautoi`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kocsi`
--

CREATE TABLE `kocsi` (
  `id` int(2) NOT NULL,
  `orszag` varchar(8) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `auto` varchar(12) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kocsi`
--

INSERT INTO `kocsi` (`id`, `orszag`, `auto`) VALUES
(1, 'amerikai', 'Buick'),
(2, 'amerikai', 'Cadillac'),
(3, 'amerikai', 'Chevrolet'),
(4, 'amerikai', 'Chrysler'),
(5, 'amerikai', 'Dodge'),
(6, 'amerikai', 'Hummer'),
(7, 'amerikai', 'Lincoln'),
(8, 'angol', 'Aston Martin'),
(9, 'angol', 'Bentley'),
(10, 'angol', 'Rover'),
(11, 'francia', 'Citroen'),
(12, 'francia', 'Peugeot'),
(13, 'francia', 'Renault'),
(14, 'japán', 'Honda'),
(15, 'japán', 'Mazda'),
(16, 'japán', 'Nissan'),
(17, 'japán', 'Subaru'),
(18, 'japán', 'Suzuki'),
(19, 'japán', 'Toyota'),
(20, 'lengyel', 'Polski'),
(21, 'német', 'Audi'),
(22, 'német', 'BMW'),
(23, 'német', 'Mercedes'),
(24, 'német', 'Opel'),
(25, 'német', 'Trabant'),
(26, 'német', 'Volkswagen'),
(27, 'német', 'Wartburg'),
(28, 'olasz', 'Bugatti'),
(29, 'olasz', 'Ferrari'),
(30, 'olasz', 'Fiat'),
(31, 'olasz', 'Lamborghini'),
(32, 'olasz', 'Lancia'),
(33, 'orosz', 'Lada'),
(34, 'orosz', 'Volga'),
(35, 'román', 'Dacia'),
(36, 'spanyol', 'Seat'),
(37, 'svéd', 'Volvo'),
(38, 'szerb', 'Zastava');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kocsi`
--
ALTER TABLE `kocsi`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
