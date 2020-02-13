
<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 20 MySQL rekordok feltöltése </title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 20 MySQL rekordok feltöltése </h2>

    <p> Rekordok beszúrása <br />
Meglévő táblába új rekordokat az INSERT INTO parancs segítségével szúrhatunk be.
Az adatokat a tábla oszlopai sorrendjének megfelelően, vesszővel elválasztva soroljuk fel.

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

    $nev=array("belus","kiraly", "zsurmi", "jozsi1","klotild", "csabos"); 
    $jelszo=array("belus01","kircsi", "abc", "nincs","nemtudom", "jelszo"); // megj. a választott jelszavak csupán negatív példák
    $kor=array(33, 21, 18, 54, 66, 31);
    $varos=array("Budapest","Pécs", "Szolnok", "Budapest","Eger", "Budapest"); 
    for ($i=0; $i<count($nev); $i++) {
     $InsertIntoStr = "INSERT INTO felhasznalok_tabla VALUES ('', '$nev[$i]', '$jelszo[$i]', $kor[$i], '$varos[$i]')";
     // A lekérdezés 
     if (!mysqli_query($MySqliLink,$InsertIntoStr))
      {
      echo " MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
      }
    }

if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

<p> Rekordok beszúrása 2 <br />
Az INSERT INTO parancs után felsorolva a beszúrni kívánt adatok tábláinak nevét eltérhetünk 
az oszlopok adatbázisunkban lévő sorrendjétől. 
Lehetőségünk nyílik arra is, hogy egy-egy oszlop feltöltését elhalasszuk, 
ekkor az alapértelmezett értéküket veszik fel.
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

    $nev=array("belus","kiraly", "zsurmi", "jozsi1","klotild", "csabos"); 
    $jelszo=array("belus01","kircsi", "abc", "nincs","nemtudom", "jelszo");
    $kor=array(33, 21, 18, 54, 66, 31);
    $varos=array("Budapest","Pécs", "Szolnok", "Budapest","Eger", "Budapest"); 
    for ($i=0; $i<count($nev); $i++) {
     $InsertIntoStr = "INSERT INTO felhasznalok_tabla 
        (FName, FJelszo, FKor, FVaros) 
     VALUES ( '$nev[$i]', '$jelszo[$i]', $kor[$i], '$varos[$i]')";
     
     if (!mysqli_query($MySqliLink,$InsertIntoStr))
      {
      echo " MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink);
      }
    }

if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />


<p> Felhasználói adatok beszúrása <br />
Jelszavakat, védett személyes és üzleti adatokat sosem tárolunk egyszerű szövegként 
(olvasható formában)!
Illik minimum egy titkosító függvény felhasználásával megnehezíteni a jelszavakhoz 
történő illetéktelen hozzáférést.
A PHP md5() függvényének használatára nézünk egy példát.

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

if (!mysqli_close($MySqliLink)) {
    echo "Nem sikerült bezárni a kapcsolatot!";
}

echo "A kapcsolatot bezártuk!";

?>
<hr />

</body>
</html>