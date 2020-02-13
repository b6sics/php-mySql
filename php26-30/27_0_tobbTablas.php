<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>MySQL többtáblás lekérdezés</title> 
    <meta charset="UTF-8">            
 </head>

 <body>
	<?php

$MySqliLink = mysqli_connect('localhost', 'root', '', 'tobbtablas');
mysqli_set_charset($MySqliLink,'UTF8');
mysqli_select_db($MySqliLink,'tobbtablas');

//------------ rendeles_tabla TÁBLA LÉTREHOZÁSA ------------ 
$CreateTableStr="CREATE TABLE IF NOT EXISTS rendeles_tabla (
    id int NOT NULL AUTO_INCREMENT,
    Felhasznalo_id int  NOT NULL DEFAULT '0', 
    Datum DATETIME DEFAULT NULL,
    Kod CHAR(10)  NOT NULL DEFAULT '0',
    PRIMARY KEY (id)
  )";
  if (!mysqli_query($MySqliLink,$CreateTableStr))
    {
    echo "MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
    }
  //-------------- rendeles_tabla TÁBLA FELTÖLTÉSE -----------------
  $Felhasznalo_id=array(1, 2, 1, 3, 4, 3); 
  $Datum=array("2012-02-01 10:00:00","2012-03-01 10:24:30", "2012-02-02 11:44:55", "2012-10-01 12:20:44","2012-10-01 12:23:00", "2013-01-01 13:03:01"); 
  $Kod=array("v001", "v002", "v003", "v004", "v005", "v006");
  for ($i=0; $i<count($Felhasznalo_id); $i++) {
  $InsertIntoStr = "INSERT INTO rendeles_tabla VALUES ('', $Felhasznalo_id[$i], '$Datum[$i]', '$Kod[$i]')";
  if (!mysqli_query($MySqliLink,$InsertIntoStr))
    {
    echo "MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
    }
  }
  //------------ rendelt_termek_tabla TÁBLA LÉTREHOZÁSA ------------ 
  $CreateTableStr="CREATE TABLE IF NOT EXISTS rendelt_termek_tabla (
    id int NOT NULL AUTO_INCREMENT,
    Rendeles_id int  NOT NULL DEFAULT '0', 
    Termek_Nev VARCHAR(30) COLLATE utf8_hungarian_ci NOT NULL DEFAULT '', 
    MennyisegEgyseg VARCHAR(10) COLLATE utf8_hungarian_ci NOT NULL DEFAULT '',
    EgysegAr FLOAT(11,2)  NOT NULL DEFAULT '0', 
    Mennyiseg SMALLINT(4)  NOT NULL DEFAULT '0',  
    PRIMARY KEY (id)
  )";
  if (!mysqli_query($MySqliLink,$CreateTableStr))
    {
    echo "MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
    }
  //-------------- rendelt_termek_tabla TÁBLA FELTÖLTÉSE ---------------------
  $Rendeles_id=array(1, 2, 2, 3, 4, 4, 5, 6); 
  $Termek_Nev=array("vadalma","vadkörte", "Vilmos körte", "Ceglédi óriás kajszi","Ligeti óriás kajszibarack", "vadkörte", "mogyoró","Ceglédi óriás kajszi"); 
  $MennyisegEgyseg=array("kg", "kg", "kg", "kg", "kg", "kg", "kg", "kg");
  $EgysegAr=array(125.4,873, 44, 99.9, 132, 873, 898, 74); 
  $Mennyiseg=array(1, 3, 1, 5, 2, 10, 1, 25); 
  for ($i=0; $i<count($Rendeles_id); $i++) {
   $InsertIntoStr = "INSERT INTO rendelt_termek_tabla VALUES ('', $Rendeles_id[$i], '$Termek_Nev[$i]', '$MennyisegEgyseg[$i]', $EgysegAr[$i], $Mennyiseg[$i])";
   if (!mysqli_query($MySqliLink,$InsertIntoStr))
    {
    echo "MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
    }
  }
  //------------ felhasznalok_tabla TÁBLA LÉTREHOZÁSA ------------ 
  $CreateTableStr="CREATE TABLE IF NOT EXISTS felhasznalok_tabla (
    id int NOT NULL AUTO_INCREMENT,
    FName VARCHAR(30) COLLATE utf8_hungarian_ci NOT NULL DEFAULT '', 
    FJelszo VARCHAR(40) COLLATE utf8_hungarian_ci NOT NULL DEFAULT '',
    FKor TINYINT(2)  NOT NULL DEFAULT '0',
    FVaros VARCHAR(30) COLLATE utf8_hungarian_ci  NOT NULL DEFAULT '',  
    PRIMARY KEY (id)
  )";
  if (!mysqli_query($MySqliLink,$CreateTableStr))
    {
    echo "MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
    }
  //-------------- felhasznalok_tabla TÁBLA FELTÖLTÉSE ---------------------
  $nev=array("belus","kiraly", "zsurmi", "jozsi1","klotild", "csabos"); 
  $jelszo=array("belus01","kircsi", "abc", "nincs","nemtudom", "jelszo"); 
  $kor=array(33, 21, 18, 54, 66, 31);
  $varos=array("Budapest","Pécs", "Szolnok", "Budapest","Eger", "Budapest"); 
  for ($i=0; $i<count($nev); $i++) {
   $pw = md5($jelszo[$i]);
   $InsertIntoStr = "INSERT INTO felhasznalok_tabla VALUES ('','$nev[$i]','$pw',$kor[$i],'$varos[$i]')";
   if (!mysqli_query($MySqliLink,$InsertIntoStr)) {
     die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
   }
  }	 
	echo "Táblák létrehozva! <BR /><BR />";
	echo "<HR />";

?>
 </body>
  
</html>
