
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 19c MySQL adatbázis műveletek adattáblával</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 19c MySQL adatbázis műveletek adattáblával</h2>

<p>c Adattábla elsődleges kulccsal <br />
Minden táblában kijelölhetünk egy (és csak egy) mezőt elsődleges kulcsnak. 
Ez a mező nem tartalmazhat ismétlődő értékeket. Az ismétlődés elkerülésének, 
a mezőben tárolt adatok egyediségének biztosításához érdemes az AUTO_INCREMENT 
attribútumot használni.
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

$CreateTableStr = "CREATE TABLE IF NOT EXISTS felhasznalok_tabla (
  id int NOT NULL AUTO_INCREMENT,
  FName VARCHAR(30),  
  FJelszo VARCHAR(40),
  FKor TINYINT(2),
  FVaros VARCHAR(30),  
  PRIMARY KEY (id) )";
  
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