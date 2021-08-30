CREATE DATABASE `nevenincs-iskola`
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_hungarian_ci;


USE `nevenincs-iskola`;


CREATE TABLE felhasznalok (
  azon INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  teljesnev VARCHAR(30) NOT NULL,
  nev VARCHAR(20) NOT NULL UNIQUE,
  email VARCHAR(25) NOT NULL UNIQUE,
  jelszo VARCHAR(32) NOT NULL,
  profilkep VARCHAR(35) NOT NULL,
  jog ENUM('admin','szerzo','tag') NOT NULL,
  letrehozva TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  modositva TIMESTAMP NULL DEFAULT NULL
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_hungarian_ci;


CREATE TABLE kategoriak (
  azon INT(2) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cimke VARCHAR(100) NOT NULL UNIQUE,
  cimke_url VARCHAR(100) NOT NULL UNIQUE
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_hungarian_ci;


CREATE TABLE bejegyzesek (
 azon INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 felhaszn_azon INT(5) NOT NULL,
 cim VARCHAR(100) NOT NULL UNIQUE,
 cim_url VARCHAR(100) NOT NULL UNIQUE,
 megtekintve INT(5) NOT NULL DEFAULT '0',
 kep VARCHAR(35) ,
 szoveg TEXT NOT NULL,
 kozzetett TINYINT(1) NOT NULL,
 letrehozva TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 modositva TIMESTAMP DEFAULT '0000-00-00 00:00:00',
 FOREIGN KEY (felhaszn_azon) REFERENCES felhasznalok (azon) 
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_hungarian_ci;


CREATE TABLE bejegyzes_kategoria (
  azon INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  bejegyz_azon INT(5) NOT NULL UNIQUE,
  kateg_azon INT(2) NOT NULL,
  FOREIGN KEY (bejegyz_azon) REFERENCES bejegyzesek(azon) 
	ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (kateg_azon) REFERENCES kategoriak(azon) 
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_hungarian_ci;


CREATE TABLE hozzaszolasok (
 azon INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 felhaszn_azon INT(5) NOT NULL,
 bejegyz_azon INT(5) NOT NULL,
 hozzasz_azon INT(5) NULL,
 sorszam INT(5) NOT NULL,
 szint INT(2) NOT NULL,
 valasza INT(2) NULL,
 szoveg TEXT NOT NULL,
 letrehozva TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 modositva TIMESTAMP DEFAULT '0000-00-00 00:00:00',
 CONSTRAINT felhaszn_megsz 
    FOREIGN KEY (felhaszn_azon) REFERENCES felhasznalok (azon) 
    ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT bejegyz_megsz 
    FOREIGN KEY (bejegyz_azon) REFERENCES bejegyzesek(azon) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_hungarian_ci;


ALTER TABLE hozzaszolasok ADD CONSTRAINT hozzasz_megsz 
FOREIGN KEY(hozzasz_azon) REFERENCES hozzaszolasok(azon) ON DELETE CASCADE;


INSERT INTO `felhasznalok` (`azon`, `teljesnev`, `nev`, `email`, `jelszo`, `profilkep`, `jog`, `letrehozva`, `modositva`) VALUES
(1, 'Gránit Dávid', 'granit-david', 'granit-david@gmail.com', MD5('jelszo'), 'granit-david.png', 'admin', '2010-07-05 08:51:56', '0000-00-00 00:00:00'),
(2, 'Net Elek', 'netelek', 'netelek@hotmail.com', MD5('password'), 'net-elek.png', 'admin', '2017-03-26 13:23:41', '0000-00-00 00:00:00'),
(3, 'Fekete Farkas', 'fekete_farkas', 'fekete_farkas@freemail.hu', MD5('valami'), 'fekete-farkas.png', 'szerzo', '2017-05-08 11:16:28', '2017-06-19 07:44:55'),
(4, 'Vám Piroska', 'vam_piroska', 'vam_piroska@onbox.hu', MD5('akarmi'), 'vam-piroska.png', 'szerzo', '2017-07-29 18:24:56', '0000-00-00 00:00:00'),
(5, 'Techno Kolos', 'technokolos', 'technokolos@citromail.hu', MD5('barmi'), 'techno-kolos.png', 'szerzo', '2017-09-19 16:59:16', '0000-00-00 00:00:00'),
(6, 'Trab Antal', 'trabantal', 'trabantal@indamail.hu', MD5('012'), 'trab-antal.png', 'tag', '2017-10-13 05:05:45', '0000-00-00 00:00:00'),
(7, 'Kasza Blanka', 'kaszablanka', 'kaszablanka@yahoo.com', MD5('345'), 'kasza-blanka.png', 'tag', '2018-04-30 07:32:41', '2018-05-01 11:56:01'),
(8, 'Trap Pista', 'trap.pista', 'trap.pista@mailbox.hu', MD5('678'), 'trap-pista.png', 'tag', '2018-05-23 06:04:07', '0000-00-00 00:00:00'),
(9, 'Fejet Lenke', 'fejetlenke', 'fejetlenke@euromail.hu', MD5('abc'), 'fejet-lenke.png', '', '2018-08-21 22:22:48', '0000-00-00 00:00:00');


INSERT INTO `kategoriak` (`azon`, `cimke`, `cimke_url`) VALUES
(1, 'Nappali', 'nappali'),
(2, 'Felnőttoktatás', 'felnottoktatas'),
(3, 'ECDL', 'ecdl'),
(4, 'Tanároknak', 'tanaroknak');


INSERT INTO `bejegyzesek` (`azon`, `felhaszn_azon`, `cim`, `cim_url`, `megtekintve`, `kep`, `szoveg`, `kozzetett`, `letrehozva`, `modositva`) VALUES
(1, 1, 'Iskola megnyitója', 'iskola-megnyitoja', 3058, 'Nevenincs-iskola.jpg', 'Örömmel jelenthetjük be, hogy megnyitotta kapuit a Nevenincs iskola, ahol a nappali informatikai és sport ágazati képzések mellett, az esti OKJ-s végzettség megszerzéséhez is hozzásegítjük;  sőt akár ECDL vizsgát is tehetnek tanulóink.', 0, '2010-09-01 04:42:58', '0000-00-00 00:00:00'),
(2, 2, 'Gólyatábor', 'golyatabor', 120, 'Golyaproba.jpg', 'A gólyatábor gólyapróbákkal idén a Bereg szívében, Vásárosnaményban kerül megrendezésre, ahol újdonsült diákjainak egy hét önfeledt szórakozásban lehet részük. A Tisza-part aranyló homokja várja a napozni vágyókat a folyó fürdésre alkalmas elkerített szakaszán pedig vizijátékok, kenuzás, vizibiciklizés, motorcsónakos vizisízés. Fentébb a faházak irányában büfék éttermek és az este megélénkülő szórakozóhelyek várják a táncolni vágyókat. Az Atlantika-vizividámpark jónéhány csúszdája, (többek között) hullámmedencéje, fóka- és papagáj-show-ja garantált szórakozást nyújt. Míg a Szilva-gyógyfürdő termálmedencéje segíti az egészségre vágyókat, addig ugyanott a feszített víztükrű úszómedencében mozgathatják át tagjaikat a mozgást preferálók. A múzeumként üzemelő Tomcsányi-kastélyba is teszünk látogatást, valamint buszos kirándulás keretében megtekintjük a járás további nevezetességeit is (pl.: Tarpai szárazmalmot, Túristvándi vizimalmot, stb.). A várostól mintegy 50 km-re található Európa legnívósabb állatkertjében, Szabolcs-Szatmár-Bereg megye székhelyén, a Nyíregyházi Zoo egész napos talpalás mellett is alig bejárható hatalmas parkjára valószínűleg már nem jut idő, de talán az iskolai évek alatt még visszatérhetünk és az intézmény saját dinoszauruszos hoteljében is megszállhatunk.', 1, '2020-02-10 16:39:45', '0000-00-00 00:00:00'),
(3, 3, 'Felnőttoktatási órarend', 'felnottoktatasi-orarend', 36, 'Orarend.jpg', 'A következő tantárgyak az alábbi napokon kerülnek megtartásra. IT alapok: ...; IT szakmai angol: ...; Hálózati ismeretek: ...; Programozás: ...; Webfejlesztés: ...; Foglalkoztatás: ...', 1, '2018-08-30 13:15:19', '0000-00-00 00:00:00'),
(4, 3, 'ECDL-vizsga', 'ecdl-vizsga', 48, 'ECDL-vizsga.jpg', 'A legközelebbi ECDL-vizsga időpontja 2018. november 10-én lesz, 14 órától.', 1, '2018-10-01 07:02:32', '0000-00-00 00:00:00'),
(5, 2, 'Szalagavató', 'szalagavato', 329, 'Szalagavato.png', 'A szalagavató ezúttal karácsony előtt. Várjuk szeretettel a végzős tanulók hozzátartozóit és tanárainkat.', 1, '2018-10-03 08:36:21', '0000-00-00 00:00:00'),
(6, 3, 'Felnőttoktatási vizsgák', 'felnottoktatasi-vizsgak', 21, '', 'A felnőttoktatási vizsgák jövő májusában várhatóak, amely egy központ Java vizsgával fog kezdődni, majd egy későbbi időpontban egy helyi 2 órás webes, amit egy 3 órás ismét Java vizsga követ.', 1, '2018-11-24 21:34:05', '0000-00-00 00:00:00'),
(7, 4, 'Ebédbefizetés', 'ebedbefizetes', 205, 'Iskolai-ebed.gif', 'A téli szünetre való tekintettel kérem, hogy az ebédjegyeket minél előbb vásárolják meg a gazdasági irodában.', 1, '2018-12-02 11:22:00', '2018-12-12 09:10:12'),
(8, 5, 'Tanárkarácsony', 'tanarkaracsony', 17, 'Karacsonyfa.jpg', 'Tanárainkat várjuk egy kis ünnepség keretén belül egy közös pizzázásra e hét csütörtökön az M23-as terembe. A beugró 1500 Ft. Italat még ti hoztok!', 1, '2018-12-19 12:07:44', '0000-00-00 00:00:00');


INSERT INTO `bejegyzes_kategoria` (`azon`, `bejegyz_azon`, `kateg_azon`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 1),
(6, 6, 2),
(7, 7, 1),
(8, 8, 4);


INSERT INTO `hozzaszolasok` (`azon`, `felhaszn_azon`, `bejegyz_azon`, `hozzasz_azon`, `sorszam`, `szint`, `valasza`, `szoveg`, `letrehozva`, `modositva`) VALUES
(1, 1, 1, NULL, 1, 1, NULL, 'Régi szép idők', '2019-01-02 00:11:35', '0000-00-00 00:00:00'),
(2, 2, 1, NULL, 2, 1, NULL, 'Mennyivel jobbak voltak akkor a gyerekek', '2019-01-04 00:47:01', '0000-00-00 00:00:00'),
(3, 1, 2, NULL, 1, 1, NULL, 'Ebben az évben is jól érezték magukat a gyerekek. :)', '2019-01-05 01:00:14', '0000-00-00 00:00:00'),
(4, 2, 2, 3, 2, 2, 1, 'Csak ne rendetlenkedtek volna annyit. :|', '2019-01-06 01:40:09', '0000-00-00 00:00:00'),
(5, 6, 2, 4, 3, 3, 2, 'Na azért nem voltunk olyan rosszak!', '2019-01-06 05:17:53', '2019-01-06 05:22:40'),
(6, 7, 2, 4, 4, 3, 2, 'Velem nem volt semmi gond. :\\', '2019-01-07 05:37:32', '2019-01-07 05:49:20'),
(7, 8, 2, 3, 5, 2, 1, 'Az esti Tiszaparti bulik valóban jók voltak :P', '2019-01-08 06:35:13', '0000-00-00 00:00:00'),
(8, 9, 2, NULL, 6, 1, NULL, 'Nekem a járás nevezetességei is nagyon tetszettek.', '2019-01-08 07:28:33', '0000-00-00 00:00:00'),
(9, 6, 2, 8, 7, 2, 6, 'Csak kár, hogy pont az állatkertben nem voltunk.', '2019-01-09 07:37:21', '0000-00-00 00:00:00'),
(10, 8, 2, 9, 8, 3, 7, 'Úgy se tudtuk volna egy nap bejárni.', '2019-01-09 09:05:12', '0000-00-00 00:00:00'),
(11, 6, 2, 10, 9, 4, 8, 'Azért lett volna jó megszálni helyben a dinós szállodában ;)', '2019-01-10 09:18:18', '2019-01-10 10:05:50'),
(12, 4, 2, 11, 10, 5, 9, 'Az nagyon drága fiúk, lányok: ennyire már nem húzhattuk le a szülőket. $-D', '2019-01-10 10:13:55', '0000-00-00 00:00:00'),
(13, 7, 2, NULL, 11, 1, NULL, 'Én a vizividámpark csúszdáit élveztem a legjobban, no meg a hullámmedencét! <3', '2019-01-10 10:24:57', '0000-00-00 00:00:00'),
(14, 9, 2, 13, 12, 2, 11, 'Azok nekem is nagyon bejöttek, de én még a motorcsónakos vizsízést szerettem volna nagyon kipróbálni, de ... féltem 8-|', '2019-01-11 10:35:48', '2019-01-11 11:06:10'),
(15, 8, 2, 14, 13, 3, 12, 'Sajnálhatod, mert az nagyon ász volt :-x', '2019-01-11 11:43:31', '2019-01-11 12:33:01'),
(16, 3, 3, NULL, 1, 1, NULL, 'Megint jó sok kódsor vár minden szoftverfejlesztőt :-)', '2019-01-12 13:20:35', '0000-00-00 00:00:00'),
(17, 6, 4, NULL, 1, 1, NULL, 'Az Access vizsgától egy kicsit tartok: a bonyolultabb lekérdezések nem nagyon mennek.', '2019-01-12 14:24:33', '2019-01-12 14:25:17'),
(18, 7, 4, NULL, 2, 1, NULL, 'Az Excel formázásokig még megy is. De némely összetetteb függvény már nehézséget okoz.', '2019-01-12 15:41:08', '0000-00-00 00:00:00'),
(19, 4, 5, NULL, 1, 1, NULL, 'Nagyon szépen táncoltak a gyerekek.', '2019-01-12 15:37:51', '0000-00-00 00:00:00'),
(20, 5, 5, NULL, 2, 1, NULL, 'Kár, hogy már nincsen tanári tánc.', '2019-01-12 17:47:49', '0000-00-00 00:00:00'),
(21, 6, 5, 20, 3, 2, 2, 'Elég vicces volt néhány tanár :D', '2019-01-13 08:01:32', '0000-00-00 00:00:00'),
(22, 7, 6, NULL, 1, 1, NULL, 'Vajon elég lesz ennyi idő egy-egy vizsgarészre? :O', '2019-01-13 17:52:53', '0000-00-00 00:00:00'),
(23, 8, 6, 22, 2, 2, 1, 'Nyugi, lehet majd nyomtatott jegyzetet használni.', '2019-01-14 19:46:11', '0000-00-00 00:00:00'),
(24, 9, 6, NULL, 3, 1, NULL, 'Én lehet, hogy halasztok :(', '0000-00-00 00:00:00', '2019-01-16 12:22:38'),
(25, 8, 7, NULL, 1, 1, NULL, 'Hát ... elég vacak a kaja :/', '2019-01-13 18:20:10', '0000-00-00 00:00:00'),
(26, 6, 7, 25, 2, 2, 1, 'Meg kevés is :S', '2019-01-14 19:39:11', '0000-00-00 00:00:00');