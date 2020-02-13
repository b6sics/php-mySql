
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 19e MySQL adatbázis műveletek adattáblával</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 19e MySQL adatbázis műveletek adattáblával</h2>
  
  <p>e Karakterkódolás, ABC sorrend <br />
  A karakterkódolást és rendezés típusát (Használt ABC.) szerver szinten, 
  adatbázis szinten és tábla szinten is meg lehet adni. 
  A HTML oldalon, az adatbázisban és a fejlesztői környezetben használt 
  karakter kódolásnak összhangba kell lenni, különben értelmetlen karakterhalmaz lesz 
  az eredmény.
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

  $CreateTableStr ="CREATE TABLE IF NOT EXISTS torok_magyar (
    id int NOT NULL AUTO_INCREMENT,  
    Torok  VARCHAR(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
    Magyar VARCHAR(200) COLLATE utf8_hungarian_ci NOT NULL DEFAULT '',  
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