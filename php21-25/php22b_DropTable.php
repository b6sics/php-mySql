
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 19b MySQL adatbázis műveletek adattáblával</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 19b MySQL adatbázis műveletek adattáblával</h2>

<p>b Adattábla törlése <br />
Egy táblát a DROP TABLE paranccsal törölhetünk. 
Ekkor a benne tárolt valamennyi adatunk elveszik.
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

  $DropTableStr = "DROP TABLE felhasznalok_tabla";
  $DropTableStr = "DROP TABLE IF EXISTS felhasznalok_tabla";

  if (mysqli_query($MySqliLink,$DropTableStr)) {
    echo 'A tábla törlődött';
    } else {
    echo ' MySqli hiba (' .mysqli_errno($MySqliLink). '): ' . mysqli_error($MySqliLink);
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