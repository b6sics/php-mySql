CREATE DATABASE test_db
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_hungarian_ci;

USE test_db;

CREATE TABLE IF NOT EXISTS felhasznalok_tabla (
  id int NOT NULL AUTO_INCREMENT,
  FName VARCHAR(30)  NOT NULL DEFAULT '', 
  FJelszo VARCHAR(40)  NOT NULL DEFAULT '',
  FKor TINYINT(2)  NOT NULL DEFAULT '0',
  FVaros VARCHAR(30)  NOT NULL DEFAULT '',  
  PRIMARY KEY (id)
);

INSERT INTO `felhasznalok_tabla` (`id`, `FName`, `FJelszo`, `FKor`, `FVaros`) VALUES (NULL, 'belus', MD5('belus01'), '33', 'Budapest');
INSERT INTO `felhasznalok_tabla` (`id`, `FName`, `FJelszo`, `FKor`, `FVaros`) VALUES (NULL, 'kiraly', MD5('kircsi'), '21', 'Pécs');
INSERT INTO `felhasznalok_tabla` (`id`, `FName`, `FJelszo`, `FKor`, `FVaros`) VALUES (NULL, 'zsurmi', MD5('abc'), '18', 'Szolnok');
INSERT INTO `felhasznalok_tabla` (`id`, `FName`, `FJelszo`, `FKor`, `FVaros`) VALUES (NULL, 'jozsi1', MD5('nincs'), '54', 'Budapest');
INSERT INTO `felhasznalok_tabla` (`id`, `FName`, `FJelszo`, `FKor`, `FVaros`) VALUES (NULL, 'klotild', MD5('nemtudom'), '66', 'Eger');
INSERT INTO `felhasznalok_tabla` (`id`, `FName`, `FJelszo`, `FKor`, `FVaros`) VALUES (NULL, 'csabos', MD5('jelszo'), '31', 'Budapest');