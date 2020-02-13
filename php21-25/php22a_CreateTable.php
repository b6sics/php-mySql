
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 19a MySQL adatbázis műveletek adattáblával</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 19a MySQL adatbázis műveletek adattáblával</h2>

    <p>a Adattábla létrehozása <br />
Adatainkat rendszerint normalizált adattáblákban helyezzük el, 
ami segít megelőzni a redundanciát és az üres adatcellák használatát.
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

  $CreateTableStr = "CREATE TABLE felhasznalok_tabla (
    FName CHAR(30),  
    Password CHAR(30)) ";
	
  $CreateTableStr = "CREATE TABLE IF NOT EXISTS felhasznalok_tabla (
    FName CHAR(30),  
    Password CHAR(30)) ";

  if (mysqli_query($MySqliLink,$CreateTableStr))
    {
    echo "A tábla elkészült<br /><hr />";
    }
  else
    {
    echo " MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
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