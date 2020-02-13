
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 22 MySQLi rekordok szűrése</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 22 MySQLi rekordok szűrése</h2>

    <p> Rekordok szűrése <br />
A WHERE záradék használható rekordok szűrése. 
A WHERE után adhatjuk meg a válogatás feltételét/feltételeit.
</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

    $SelectStr = "SELECT FName, FVaros FROM felhasznalok_tabla WHERE FVaros='Budapest' ";
    $result = mysqli_query($MySqliLink,$SelectStr) OR die(" MySqli hiba (" .mysqli_errno($MySqliLink)."):". mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result))  {
      echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros'];
      echo "<br>";
      }

if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Rekordok limitálása <br />
A LIMIT záradék mindig a lekérdezést leíró utasítás végére kerül.
Első paramétere az első megjelenítendő rekord sorszáma, 
a második a megjelenítendő rekordok darabszáma.
</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

    $SelectStr = "SELECT FName, FVaros, FKor FROM felhasznalok_tabla ORDER by FName LIMIT 2, 3  ";
    $result = mysqli_query($MySqliLink,$SelectStr) OR die(" MySqli hiba (" .mysqli_errno($MySqliLink)."):". mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros']." -  Kor: ".$row['FKor'];
      echo "<br>";
      }
    
if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Összetett szűrés <br />
Az AND és az OR operátorok felhasználásával összetett feltételek is megadhatók.
</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

    $SelectStr = "SELECT FName, FVaros, FKor FROM felhasznalok_tabla WHERE FVaros='Budapest' and FKor<40 or FName='kiraly'";
    $result = mysqli_query($MySqliLink,$SelectStr) OR die(" MySqli hiba (" .mysqli_errno($MySqliLink)."):". mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result))  {
      echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros']." -  Kor: ".$row['FKor'];
      echo "<br>";
      }
        
if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> BETWEEN operátor <br />
A BETWEEN operátor segítségével a mezők két szélsőérték közötti értékeit szűrhetjük ki.
</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

    $SelectStr = "SELECT FName, FVaros, FKor FROM felhasznalok_tabla WHERE FKor BETWEEN 22 and 60";
    $result = mysqli_query($MySqliLink,$SelectStr) OR die(" MySqli hiba (" .mysqli_errno($MySqliLink)."):". mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result))  {
      echo "Felhasználó 22 és 60 között: ".$row['FName']." -  Város: ".$row['FVaros']." -  Kor: ".$row['FKor'];
      echo "<br>";
      }
            
if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Rekordok limit 1 <br />
Ha csupán egy rekord adataira van szükségünk, akkor a lekérdezett maximális sorok (rekordok) 
számát 1-re célszerű állítani. Ekkor, ha az adatbázis-kezelő megtalálta rekordunkat nem keres 
tovább, és a programkód is egyszerűbbé válik.</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

    $SelectStr = "SELECT FName, FVaros, FKor FROM felhasznalok_tabla WHERE FVaros='Pécs' LIMIT 1";
    $result = mysqli_query($MySqliLink,$SelectStr) OR die(" MySqli hiba (" .mysqli_errno($MySqliLink)."):". mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result))  {
      echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros']." -  Kor: ".$row['FKor'];
      echo "<br>";
      }
    
if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Lekérdezés jelszó alapján <br />
A felhasználói név és jelszó ellenőrzésekor a lekérdezés összeállítása előtt a 
vizsgált jelszót is titkosítani kell. Az md5() függvény használatára láttunk 
korábban példát.
Ha elegendő annak eldöntése, hogy létezik-e a vizsgált felhasználói név és 
jelszó páros, akkor ez a lekérdezés eredményét a mysqli_num_rows() függvénynek 
átadva vizsgálható.</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

$Jsz="kircsi";  $pw = md5($Jsz); $Fnev="kiraly"; 
$SelectStr = "SELECT FName, FVaros FROM felhasznalok_tabla WHERE FName='$Fnev' and FJelszo='$pw'  LIMIT 1 ";

$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
echo "Rekordok száma: ".mysqli_num_rows($result)."<br />";
while($row = mysqli_fetch_array($result))  {
  echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros']."<br />";
  } 
  
if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Ismétlődések kiszűrése <br />
Ha egy lekérdezés eredményei közül csak a különböző elemeket 
kívánjuk megjeleníteni, akkor DISTINCT kifejezést kell használni.</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

$SelectStr = "SELECT DISTINCT FVaros FROM felhasznalok_tabla ORDER by FVaros";

$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo "Város: ".$row['FVaros']."<br />"; ;
  } 
  
if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Mintaillesztés <br />
Szövegrészletek keresése esetén a LIKE operátort használjuk, 
a karaktersorozatok összehasonlításánál 
megismert = illetve != operátorok helyett.</p>
<hr />
<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
    echo "Csatlakozás sikerült!<br /><hr />";

$SelectStr = "SELECT FName FROM felhasznalok_tabla  WHERE FName LIKE 'be%'";
$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo $SelectStr.": ".$row['FName']."<br />"; ;
  } 

$SelectStr = "SELECT FName FROM felhasznalok_tabla  WHERE FName NOT LIKE 'be%'";
$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo $SelectStr.": ".$row['FName']."<br />"; ;
  } 

$SelectStr = "SELECT FName FROM felhasznalok_tabla  WHERE FName LIKE '%mi'";
$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo $SelectStr.": ".$row['FName']."<br />"; ;
  } 

$SelectStr = "SELECT FName FROM felhasznalok_tabla  WHERE FName NOT LIKE '%mi'";
$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo $SelectStr.": ".$row['FName']."<br />"; ;
  } 
  
$SelectStr = "SELECT FName FROM felhasznalok_tabla  WHERE FName LIKE '%til%'";
$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo $SelectStr.": ".$row['FName']."<br />"; ;
  } 
  
$SelectStr = "SELECT FName FROM felhasznalok_tabla  WHERE FName NOT LIKE '%til%'";
$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo $SelectStr.": ".$row['FName']."<br />"; ;
  } 

$SelectStr = "SELECT FName FROM felhasznalok_tabla  WHERE FName LIKE 'b____'";
$result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
while($row = mysqli_fetch_array($result))  {
  echo $SelectStr.": ".$row['FName']."<br />"; ;
  } 
  
if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

</body>
</html>