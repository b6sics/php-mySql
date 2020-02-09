
DROP DATABASE IF EXISTS `szoftverleltar`;

CREATE DATABASE `szoftverleltar` 
DEFAULT CHARACTER SET utf8mb4 
COLLATE utf8mb4_hungarian_ci;

/*
USE `szoftverleltar`;
*/

/* create table `gep` */

DROP TABLE IF EXISTS `gep`;

CREATE TABLE `gep` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `hely` varchar(4) NOT NULL,
  `tipus` varchar(8) NOT NULL,
  `ipcim` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`ipcim`)
) ENGINE = InnoDB;

/* create table `szoftver` */

DROP TABLE IF EXISTS `szoftver`;

CREATE TABLE `szoftver` (
  `id` int(3) NOT NULL,
  `nev` varchar(33) NOT NULL,
  `kategoria` varchar(26) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

/* create table `telepites` */

DROP TABLE IF EXISTS `telepites`;

CREATE TABLE `telepites` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `gepid` int(2) NOT NULL,
  `szoftverid` int(4) NOT NULL,
  `verzio` varchar(17) NOT NULL,
  `datum` date,
  PRIMARY KEY (`id`),
  CONSTRAINT FK_GepId FOREIGN KEY (`gepid`)
  REFERENCES `gep`(`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  CONSTRAINT FK_SzoftverId FOREIGN KEY (`szoftverid`)
  REFERENCES `szoftver`(`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
) ENGINE = InnoDB;

