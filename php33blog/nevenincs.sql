-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Feb 13. 17:31
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
-- Adatbázis: `nevenincs`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bejegyzesek`
--

CREATE TABLE `bejegyzesek` (
  `azon` int(5) NOT NULL,
  `felhaszn_azon` int(5) NOT NULL,
  `cim` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `cim_url` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `megtekintve` int(5) NOT NULL DEFAULT '0',
  `kep` varchar(35) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `szoveg` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `kozzetett` tinyint(1) NOT NULL,
  `letrehozva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modositva` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `bejegyzesek`
--

INSERT INTO `bejegyzesek` (`azon`, `felhaszn_azon`, `cim`, `cim_url`, `megtekintve`, `kep`, `szoveg`, `kozzetett`, `letrehozva`, `modositva`) VALUES
(1, 1, 'Iskola megnyitója', 'iskola-megnyitoja', 3058, 'Nevenincs-iskola.jpg', 'Örömmel jelenthetjük be, hogy megnyitotta kapuit a Nevenincs iskola, ahol a nappali informatikai és sport ágazati képzések mellett, az esti OKJ-s végzettség megszerzéséhez is hozzásegítjük;  sőt akár ECDL vizsgát is tehetnek tanulóink.', 0, '2010-09-01 02:42:58', '0000-00-00 00:00:00'),
(2, 2, 'Gólyatábor', 'golyatabor', 120, 'Golyaproba.jpg', 'A gólyatábor gólyapróbákkal idén a Bereg szívében, Vásárosnaményban kerül megrendezésre, ahol újdonsült diákjainak egy hét önfeledt szórakozásban lehet részük. A Tisza-part aranyló homokja várja a napozni vágyókat a folyó fürdésre alkalmas elkerített szakaszán pedig vizijátékok, kenuzás, vizibiciklizés, motorcsónakos vizisízés. Fentébb a faházak irányában büfék éttermek és az este megélénkülő szórakozóhelyek várják a táncolni vágyókat. Az Atlantika-vizividámpark jónéhány csúszdája, (többek között) hullámmedencéje, fóka- és papagáj-show-ja garantált szórakozást nyújt. Míg a Szilva-gyógyfürdő termálmedencéje segíti az egészségre vágyókat, addig ugyanott a feszített víztükrű úszómedencében mozgathatják át tagjaikat a mozgást preferálók. A múzeumként üzemelő Tomcsányi-kastélyba is teszünk látogatást, valamint buszos kirándulás keretében megtekintjük a járás további nevezetességeit is (pl.: Tarpai szárazmalmot, Túristvándi vizimalmot, stb.). A várostól mintegy 50 km-re található Európa legnívósabb állatkertjében, Szabolcs-Szatmár-Bereg megye székhelyén, a Nyíregyházi Zoo egész napos talpalás mellett is alig bejárható hatalmas parkjára valószínűleg már nem jut idő, de talán az iskolai évek alatt még visszatérhetünk és az intézmény saját dinoszauruszos hoteljében is megszállhatunk.', 1, '2020-02-10 15:39:45', '0000-00-00 00:00:00'),
(3, 3, 'Felnőttoktatási órarend', 'felnottoktatasi-orarend', 36, 'Orarend.jpg', 'A következő tantárgyak az alábbi napokon kerülnek megtartásra. IT alapok: ...; IT szakmai angol: ...; Hálózati ismeretek: ...; Programozás: ...; Webfejlesztés: ...; Foglalkoztatás: ...', 1, '2018-08-30 11:15:19', '0000-00-00 00:00:00'),
(4, 3, 'ECDL-vizsga', 'ecdl-vizsga', 48, 'ECDL-vizsga.jpg', 'A legközelebbi ECDL-vizsga időpontja 2018. november 10-én lesz, 14 órától.', 1, '2018-10-01 05:02:32', '0000-00-00 00:00:00'),
(5, 2, 'Szalagavató', 'szalagavato', 329, 'Szalagavato.png', 'A szalagavató ezúttal karácsony előtt. Várjuk szeretettel a végzős tanulók hozzátartozóit és tanárainkat.', 1, '2018-10-03 06:36:21', '0000-00-00 00:00:00'),
(6, 3, 'Felnőttoktatási vizsgák', 'felnottoktatasi-vizsgak', 21, '', 'A felnőttoktatási vizsgák jövő májusában várhatóak, amely egy központ Java vizsgával fog kezdődni, majd egy későbbi időpontban egy helyi 2 órás webes, amit egy 3 órás ismét Java vizsga követ.', 1, '2018-11-24 20:34:05', '0000-00-00 00:00:00'),
(7, 4, 'Ebédbefizetés', 'ebedbefizetes', 205, 'Iskolai-ebed.gif', 'A téli szünetre való tekintettel kérem, hogy az ebédjegyeket minél előbb vásárolják meg a gazdasági irodában.', 1, '2018-12-02 10:22:00', '2018-12-12 08:10:12'),
(8, 5, 'Tanárkarácsony', 'tanarkaracsony', 17, 'Karacsonyfa.jpg', 'Tanárainkat várjuk egy kis ünnepség keretén belül egy közös pizzázásra e hét csütörtökön az M23-as terembe. A beugró 1500 Ft. Italat még ti hoztok!', 1, '2018-12-19 11:07:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bejegyzes_kategoria`
--

CREATE TABLE `bejegyzes_kategoria` (
  `azon` int(5) NOT NULL,
  `bejegyz_azon` int(5) NOT NULL,
  `kateg_azon` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `bejegyzes_kategoria`
--

INSERT INTO `bejegyzes_kategoria` (`azon`, `bejegyz_azon`, `kateg_azon`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 1),
(6, 6, 2),
(7, 7, 1),
(8, 8, 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `azon` int(5) NOT NULL,
  `teljesnev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `nev` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jelszo` varchar(32) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `profilkep` varchar(35) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jog` enum('admin','szerzo','tag') COLLATE utf8mb4_hungarian_ci NOT NULL,
  `letrehozva` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modositva` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`azon`, `teljesnev`, `nev`, `email`, `jelszo`, `profilkep`, `jog`, `letrehozva`, `modositva`) VALUES
(1, 'Gránit Dávid', 'granit-david', 'granit-david@gmail.com', 'efc847fa5a386a38fcc9d0573bb87272', 'granit-david.png', 'admin', '2010-07-05 06:51:56', '0000-00-00 00:00:00'),
(2, 'Net Elek', 'netelek', 'netelek@hotmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'net-elek.png', 'admin', '2017-03-26 11:23:41', '0000-00-00 00:00:00'),
(3, 'Fekete Farkas', 'fekete_farkas', 'fekete_farkas@freemail.hu', '249d6c99eff6d0ef6c470e4254629323', 'fekete-farkas.png', 'szerzo', '2017-05-08 09:16:28', '2017-06-19 05:44:55'),
(4, 'Vám Piroska', 'vam_piroska', 'vam_piroska@onbox.hu', '1a6555336f456f57ce6aa65ac2948c83', 'vam-piroska.png', 'szerzo', '2017-07-29 16:24:56', '0000-00-00 00:00:00'),
(5, 'Techno Kolos', 'technokolos', 'technokolos@citromail.hu', '064226c096dfe1606b830300fc1a17a6', 'techno-kolos.png', 'szerzo', '2017-09-19 14:59:16', '0000-00-00 00:00:00'),
(6, 'Trab Antal', 'trabantal', 'trabantal@indamail.hu', 'd2490f048dc3b77a457e3e450ab4eb38', 'trab-antal.png', 'tag', '2017-10-13 03:05:45', '0000-00-00 00:00:00'),
(7, 'Kasza Blanka', 'kaszablanka', 'kaszablanka@yahoo.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'kasza-blanka.png', 'tag', '2018-04-30 05:32:41', '2018-05-01 09:56:01'),
(8, 'Trap Pista', 'trap.pista', 'trap.pista@mailbox.hu', '9fe8593a8a330607d76796b35c64c600', 'trap-pista.png', 'tag', '2018-05-23 04:04:07', '0000-00-00 00:00:00'),
(9, 'Fejet Lenke', 'fejetlenke', 'fejetlenke@euromail.hu', '900150983cd24fb0d6963f7d28e17f72', 'fejet-lenke.png', '', '2018-08-21 20:22:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hozzaszolasok`
--

CREATE TABLE `hozzaszolasok` (
  `azon` int(5) NOT NULL,
  `felhaszn_azon` int(5) NOT NULL,
  `bejegyz_azon` int(5) NOT NULL,
  `hozzasz_azon` int(5) DEFAULT NULL,
  `sorszam` int(5) NOT NULL,
  `szint` int(2) NOT NULL,
  `valasza` int(2) DEFAULT NULL,
  `szoveg` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `letrehozva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modositva` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `hozzaszolasok`
--

INSERT INTO `hozzaszolasok` (`azon`, `felhaszn_azon`, `bejegyz_azon`, `hozzasz_azon`, `sorszam`, `szint`, `valasza`, `szoveg`, `letrehozva`, `modositva`) VALUES
(1, 1, 1, NULL, 1, 1, NULL, 'Régi szép idők', '2019-01-01 23:11:35', '0000-00-00 00:00:00'),
(2, 2, 1, NULL, 2, 1, NULL, 'Mennyivel jobbak voltak akkor a gyerekek', '2019-01-03 23:47:01', '0000-00-00 00:00:00'),
(3, 1, 2, NULL, 1, 1, NULL, 'Ebben az évben is jól érezték magukat a gyerekek. :)', '2019-01-05 00:00:14', '0000-00-00 00:00:00'),
(4, 2, 2, 3, 2, 2, 1, 'Csak ne rendetlenkedtek volna annyit. :|', '2019-01-06 00:40:09', '0000-00-00 00:00:00'),
(5, 6, 2, 4, 3, 3, 2, 'Na azért nem voltunk olyan rosszak!', '2019-01-06 04:17:53', '2019-01-06 04:22:40'),
(6, 7, 2, 4, 4, 3, 2, 'Velem nem volt semmi gond. :\\', '2019-01-07 04:37:32', '2019-01-07 04:49:20'),
(7, 8, 2, 3, 5, 2, 1, 'Az esti Tiszaparti bulik valóban jók voltak :P', '2019-01-08 05:35:13', '0000-00-00 00:00:00'),
(8, 9, 2, NULL, 6, 1, NULL, 'Nekem a járás nevezetességei is nagyon tetszettek.', '2019-01-08 06:28:33', '0000-00-00 00:00:00'),
(9, 6, 2, 8, 7, 2, 6, 'Csak kár, hogy pont az állatkertben nem voltunk.', '2019-01-09 06:37:21', '0000-00-00 00:00:00'),
(10, 8, 2, 9, 8, 3, 7, 'Úgy se tudtuk volna egy nap bejárni.', '2019-01-09 08:05:12', '0000-00-00 00:00:00'),
(11, 6, 2, 10, 9, 4, 8, 'Azért lett volna jó megszálni helyben a dinós szállodában ;)', '2019-01-10 08:18:18', '2019-01-10 09:05:50'),
(12, 4, 2, 11, 10, 5, 9, 'Az nagyon drága fiúk, lányok: ennyire már nem húzhattuk le a szülőket. $-D', '2019-01-10 09:13:55', '0000-00-00 00:00:00'),
(13, 7, 2, NULL, 11, 1, NULL, 'Én a vizividámpark csúszdáit élveztem a legjobban, no meg a hullámmedencét! <3', '2019-01-10 09:24:57', '0000-00-00 00:00:00'),
(14, 9, 2, 13, 12, 2, 11, 'Azok nekem is nagyon bejöttek, de én még a motorcsónakos vizsízést szerettem volna nagyon kipróbálni, de ... féltem 8-|', '2019-01-11 09:35:48', '2019-01-11 10:06:10'),
(15, 8, 2, 14, 13, 3, 12, 'Sajnálhatod, mert az nagyon ász volt :-x', '2019-01-11 10:43:31', '2019-01-11 11:33:01'),
(16, 3, 3, NULL, 1, 1, NULL, 'Megint jó sok kódsor vár minden szoftverfejlesztőt :-)', '2019-01-12 12:20:35', '0000-00-00 00:00:00'),
(17, 6, 4, NULL, 1, 1, NULL, 'Az Access vizsgától egy kicsit tartok: a bonyolultabb lekérdezések nem nagyon mennek.', '2019-01-12 13:24:33', '2019-01-12 13:25:17'),
(18, 7, 4, NULL, 2, 1, NULL, 'Az Excel formázásokig még megy is. De némely összetetteb függvény már nehézséget okoz.', '2019-01-12 14:41:08', '0000-00-00 00:00:00'),
(19, 4, 5, NULL, 1, 1, NULL, 'Nagyon szépen táncoltak a gyerekek.', '2019-01-12 14:37:51', '0000-00-00 00:00:00'),
(20, 5, 5, NULL, 2, 1, NULL, 'Kár, hogy már nincsen tanári tánc.', '2019-01-12 16:47:49', '0000-00-00 00:00:00'),
(21, 6, 5, 20, 3, 2, 2, 'Elég vicces volt néhány tanár :D', '2019-01-13 07:01:32', '0000-00-00 00:00:00'),
(22, 7, 6, NULL, 1, 1, NULL, 'Vajon elég lesz ennyi idő egy-egy vizsgarészre? :O', '2019-01-13 16:52:53', '0000-00-00 00:00:00'),
(23, 8, 6, 22, 2, 2, 1, 'Nyugi, lehet majd nyomtatott jegyzetet használni.', '2019-01-14 18:46:11', '0000-00-00 00:00:00'),
(24, 9, 6, NULL, 3, 1, NULL, 'Én lehet, hogy halasztok :(', '0000-00-00 00:00:00', '2019-01-16 11:22:38'),
(25, 8, 7, NULL, 1, 1, NULL, 'Hát ... elég vacak a kaja :/', '2019-01-13 17:20:10', '0000-00-00 00:00:00'),
(26, 6, 7, 25, 2, 2, 1, 'Meg kevés is :S', '2019-01-14 18:39:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `azon` int(2) NOT NULL,
  `cimke` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `cimke_url` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`azon`, `cimke`, `cimke_url`) VALUES
(1, 'Nappali', 'nappali'),
(2, 'Felnőttoktatás', 'felnottoktatas'),
(3, 'ECDL', 'ecdl'),
(4, 'Tanároknak', 'tanaroknak');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  ADD PRIMARY KEY (`azon`),
  ADD UNIQUE KEY `cim` (`cim`),
  ADD UNIQUE KEY `cim_url` (`cim_url`),
  ADD KEY `felhaszn_azon` (`felhaszn_azon`);

--
-- A tábla indexei `bejegyzes_kategoria`
--
ALTER TABLE `bejegyzes_kategoria`
  ADD PRIMARY KEY (`azon`),
  ADD UNIQUE KEY `bejegyz_azon` (`bejegyz_azon`),
  ADD KEY `kateg_azon` (`kateg_azon`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`azon`),
  ADD UNIQUE KEY `nev` (`nev`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD PRIMARY KEY (`azon`),
  ADD KEY `felhaszn_megsz` (`felhaszn_azon`),
  ADD KEY `bejegyz_megsz` (`bejegyz_azon`),
  ADD KEY `hozzasz_megsz` (`hozzasz_azon`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`azon`),
  ADD UNIQUE KEY `cimke` (`cimke`),
  ADD UNIQUE KEY `cimke_url` (`cimke_url`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  MODIFY `azon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `bejegyzes_kategoria`
--
ALTER TABLE `bejegyzes_kategoria`
  MODIFY `azon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `azon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  MODIFY `azon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `azon` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  ADD CONSTRAINT `bejegyzesek_ibfk_1` FOREIGN KEY (`felhaszn_azon`) REFERENCES `felhasznalok` (`azon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `bejegyzes_kategoria`
--
ALTER TABLE `bejegyzes_kategoria`
  ADD CONSTRAINT `bejegyzes_kategoria_ibfk_1` FOREIGN KEY (`bejegyz_azon`) REFERENCES `bejegyzesek` (`azon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bejegyzes_kategoria_ibfk_2` FOREIGN KEY (`kateg_azon`) REFERENCES `kategoriak` (`azon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD CONSTRAINT `bejegyz_megsz` FOREIGN KEY (`bejegyz_azon`) REFERENCES `bejegyzesek` (`azon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `felhaszn_megsz` FOREIGN KEY (`felhaszn_azon`) REFERENCES `felhasznalok` (`azon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hozzasz_megsz` FOREIGN KEY (`hozzasz_azon`) REFERENCES `hozzaszolasok` (`azon`) ON DELETE CASCADE;
--
-- Adatbázis: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- A tábla adatainak kiíratása `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"nevenincs-iskola\",\"table\":\"hozzaszolasok\"},{\"db\":\"nevenincs-iskola\",\"table\":\"bejegyzes_kategoria\"},{\"db\":\"nevenincs-iskola\",\"table\":\"bejegyzesek\"},{\"db\":\"nevenincs-iskola\",\"table\":\"kategoriak\"},{\"db\":\"nevenincs-iskola\",\"table\":\"felhasznalok\"}]');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- A tábla adatainak kiíratása `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-02-13 16:23:22', '{\"lang\":\"hu\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- A tábla indexei `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- A tábla indexei `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- A tábla indexei `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- A tábla indexei `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- A tábla indexei `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- A tábla indexei `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- A tábla indexei `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- A tábla indexei `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- A tábla indexei `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- A tábla indexei `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- A tábla indexei `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- A tábla indexei `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- A tábla indexei `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- A tábla indexei `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- A tábla indexei `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- A tábla indexei `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- A tábla indexei `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Adatbázis: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
