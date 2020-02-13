
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 21 MySQLi egyszerű lekérdezések</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 21 MySQLi egyszerű lekérdezések</h2>

    <p> Tábla tartalmának lekérdezése <br />
A tábla tartalmának kiolvasását a SELECT parancs teszi lehetővé
A mysqli_fetch_array($result) függvény a lekérdezett rekord adatait 
adja vissza egy asszociatív tömbbe csomagolva, a mezőnevekkel címkézve.
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

$SelectStr = "SELECT * FROM felhasznalok_tabla";
$result = mysqli_query($MySqliLink, $SelectStr)
    OR 
die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));

while($row = mysqli_fetch_array($result))
  {
  echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros'];
  echo "<br>";
  }

  if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Tábla egyes oszlopainak lekérdezése <br />
Ha nincs szükségünk valamennyi mező tartalmának kiolvasására, 
akkor a csillag helyett használni kívánt mezők neveit soroljuk fel vesszővel elválasztva.
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

$SelectStr = "SELECT FName, FVaros FROM felhasznalok_tabla ";
$result = mysqli_query($MySqliLink,$SelectStr) 
    OR 
die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));

while($row = mysqli_fetch_array($result)) {
    echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros'];
    echo "<br>";
    }

  if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Rendezett lekérdezés <br />
Az ORDER by záradék hatására a rekordok megjelenítése a kiválasztott mezőben 
tárolt értékek alapértelmezetten növekvő sorrendjében megfelelően történik.
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

$SelectStr = "SELECT FName, FVaros FROM felhasznalok_tabla ORDER by FName";
$result = mysqli_query($MySqliLink,$SelectStr) 
    OR 
die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));

while($row = mysqli_fetch_array($result)) {
    echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros'];
    echo "<br>";
    }

  if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Lekérdezés csökkenő sorrendben <br />
Az ORDER by záradékot a DESC kulcsszóval kiegészítve csökkenő sorrendet kapunk.
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

$SelectStr = "SELECT FName, FVaros FROM felhasznalok_tabla ORDER by FName DESC";
$result = mysqli_query($MySqliLink,$SelectStr) 
    OR 
die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));

while($row = mysqli_fetch_array($result)) {
    echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros'];
    echo "<br>";
    }

  if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Rendezés több mező alapján <br />
Az ORDER by záradékban több oszlopnevet is felsorolhatunk. Ekkor, ha az elsőben 
több rekord is azonos értéket tartalmaz, akkor ezek a következő oszlop alapján 
kerülnek rendezésre.
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

$SelectStr = "SELECT FName, FVaros FROM felhasznalok_tabla ORDER by FVaros DESC, FName";
$result = mysqli_query($MySqliLink,$SelectStr) 
    OR 
die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));

while($row = mysqli_fetch_array($result)) {
    echo "Felhasználónév: ".$row['FName']." -  Város: ".$row['FVaros'];
    echo "<br>";
    }

  if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

</body>
</html>