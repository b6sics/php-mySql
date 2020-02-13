
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 19d MySQL adatbázis műveletek adattáblával</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 19d MySQL adatbázis műveletek adattáblával</h2>

  <p>d Alapértelmezett értékek beállítása <br />
  Egy oszlophoz alapértelmezett értéket a DEFAULT záradékkal rendelhetünk. 
  Beállítása esetén, ha az új rekordok beszúrásakor adott oszlophoz nem rendelünk értéke, 
  akkor alapértelmezett értéket veszi fel az oszlophoz tartozó mező.
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

  $CreateTableStr = "CREATE TABLE IF NOT EXISTS felhasznalok_tabla2 (
    id int NOT NULL AUTO_INCREMENT,
    FName VARCHAR(30)  NOT NULL DEFAULT '', 
    FJelszo VARCHAR(40)  NOT NULL DEFAULT '',
    FKor TINYINT(2)  NOT NULL DEFAULT '0',
    FVaros VARCHAR(30)  NOT NULL DEFAULT '',  
    PRIMARY KEY (id)  )";
  if (mysqli_query($MySqliLink,$CreateTableStr))
    {
    echo "A tábla elkészült";
    }
  else
    {
    echo "MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
    }
echo "<br /><hr />";

if (!mysqli_close($MySqliLink)) {
    echo "Az adatbázis lezárása nem sikerült!";
} else {
  echo "Az adatbázis lezárása sikeres!";
}
echo  "<br /><hr />";
?>
  <hr />
  
</body>
</html>