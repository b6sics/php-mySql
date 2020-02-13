/* START OF FILE -----------------------------------------------------------------*/


/* CREATE DATABASE ---------------------------------------------------------------*/

/* KKV SAMPLE DATABASE 2019-2020               */
/*                   X                         */
/* DROP DATABASE IF EXISTS `nevenincs-iskola`; */
/*                   X                         */
/* CREATE DB, IF NOT EXISTS                    */

DROP DATABASE IF EXISTS `nevenincs-iskola`;

CREATE DATABASE IF NOT EXISTS `nevenincs-iskola`
CHARACTER SET `utf8mb4`
COLLATE `utf8mb4_hungarian_ci`;

/* SHOW SELECTED DB                            */
SELECT DATABASE();

/*                   X                         */
/* THE COMMAND                                 */
/* USE nevenincs-iskola;                       */
/* THROWS AN ERROR BECAUSE IT'S SELECTED       */
/*                   X                         */

/* DROP TABLES -------------------------------------------------------------------*/

/* DROP TABLES IF THEY EXIST             */
DROP TABLE IF EXISTS `felhasznalok`;
DROP TABLE IF EXISTS `kategoriak`;
DROP TABLE IF EXISTS `bejegyzesek`;
DROP TABLE IF EXISTS `bejegyzes_kategoria`;
DROP TABLE IF EXISTS `hozzaszolasok`;


/* FELHASZNALOK ------------------------------------------------------------------*/

CREATE TABLE `felhasznalok` (
  azon INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  teljesnev VARCHAR(30) NOT NULL,
  nev VARCHAR(20) NOT NULL UNIQUE,
  email VARCHAR(25) NOT NULL UNIQUE,
  jelszo VARCHAR(32) NOT NULL,
  profilkep VARCHAR(35) NOT NULL,
  jog ENUM('admin','szerzo','tag') NOT NULL,
  letrehozva TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  modositva TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

/* KATEGORIAK -------------------------------------------------------------------*/

CREATE TABLE `kategoriak` (
  azon INT(2) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cimke VARCHAR(100) NOT NULL UNIQUE,
  cimke_url VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

/* BEJEGYZESEK -------------------------------------------------------------------*/

CREATE TABLE `bejegyzesek` (
  azon INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  felhaszn_azon INT(5) NOT NULL,
  cim VARCHAR(100) NOT NULL UNIQUE,
  cim_url VARCHAR(100) NOT NULL UNIQUE,
  megtekintve INT(5) NOT NULL DEFAULT '0', 
  kep VARCHAR(35),
  szoveg TEXT NOT NULL,
  kozzetett TINYINT(1),
  letrehozva TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  modositva TIMESTAMP DEFAULT '0000-00-00 00:00:00',
  FOREIGN KEY (felhaszn_azon) REFERENCES felhasznalok (azon)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

/* BEJEGYZES KATEGORIA -----------------------------------------------------------*/

CREATE TABLE `bejegyzes_kategoria` (
  azon INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  bejegyz_azon INT(5) NOT NULL UNIQUE,
  kategoria_azon INT(2) NOT NULL,
  FOREIGN KEY (bejegyz_azon) REFERENCES bejegyzesek (azon)
	ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (kategoria_azon) REFERENCES kategoriak (azon)
	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

/* HOZZASZOLASOK -----------------------------------------------------------------*/

CREATE TABLE `hozzaszolasok` (
  azon INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
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
	FOREIGN KEY (bejegyz_azon) REFERENCES bejegyzesek (azon)
		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

ALTER TABLE hozzaszolasok ADD CONSTRAINT hozzasz_megsz
	FOREIGN KEY (hozzasz_azon) REFERENCES hozzaszolasok(azon) ON DELETE CASCADE;



/* END OF FILE -------------------------------------------------------------------*/