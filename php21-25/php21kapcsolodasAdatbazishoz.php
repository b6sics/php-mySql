
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 18 MySQL csatlakozás adatbázis</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 18 MySQL csatlakozás adatbázis</h2>

<p> Kapcsolódás adatbázishoz <br />
Annak érdekében, hogy alkalmazásunk képes legyen egy adatbázisban tárolt adatokat kezelni, 
első lépésként csatlakoztatnunk kell adatbázisunkat az alkalmazáshoz, amit a mysqli_connect() 
függvény segítségével tehetünk meg.
</p>

<?php
$MySqliLink = mysqli_connect('localhost', 'test_user', 'test_password', 'teszt_db');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'teszt_db');

if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
  echo "Csatlakozás sikerült!<br /><hr />";

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