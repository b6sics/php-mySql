<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>MySQL többtáblás lekérdezés</title> 
    <meta charset="UTF-8">            
 </head>

 <body>
	<?php

$MySqliLink = mysqli_connect('localhost', 'root', '', 'tobbtablas');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'tobbtablas');


    echo "<F3>Összekapcsolás WHERE záradékkal</F3>";
    echo "<BR />";

  $SelectStr = "SELECT felhasznalok_tabla.FName, rendeles_tabla.Datum FROM felhasznalok_tabla, rendeles_tabla 
  WHERE felhasznalok_tabla.id=rendeles_tabla.Felhasznalo_id ";
 
  $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
  
  while($row = mysqli_fetch_array($result)) {
    echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'];
    echo "<BR />";
  }  

    echo "<BR />";
    echo "<HR />";
    echo "<F3>Összekapcsolás JOIN kulcsszóval</F3>";
    echo "<BR />";
  
    $SelectStr = "SELECT felhasznalok_tabla.FName, rendeles_tabla.Datum FROM felhasznalok_tabla 
    JOIN rendeles_tabla ON felhasznalok_tabla.id=rendeles_tabla.Felhasznalo_id ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result))  {
      echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'];
      echo "<BR />";
    } 
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>Álnevek használata</F3>";
    echo "<BR />";
    
    $SelectStr = "SELECT ft.FName, rt.Datum FROM felhasznalok_tabla AS ft
    JOIN rendeles_tabla AS rt ON ft.id=rt.Felhasznalo_id ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result))  {
      echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'];
      echo "<BR />";
    } 
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>LEFT/RIGHT JOIN használata</F3>";
    echo "<BR />";
      
    $SelectStr = "SELECT f.FName, r.Datum FROM felhasznalok_tabla AS f
    LEFT JOIN rendeles_tabla AS r ON f.id=r.Felhasznalo_id ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result))  {
      echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'];
      echo "<BR />";
    } 
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>Üres mezők vizsgálata - IS NULL</F3>";
    echo "<BR />";
          
    $SelectStr = "SELECT f.FName, r.Datum FROM felhasznalok_tabla AS f
    LEFT JOIN rendeles_tabla AS r ON f.id=r.Felhasznalo_id 
    WHERE  r.id IS  NULL; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Felhasználó neve: ".$row['FName'];
      echo "<BR />";
    }        

    echo "<BR />";
    echo "<HR />";
    echo "<F3>Üres mezők vizsgálata - IS NOT NULL</F3>";
    echo "<BR />";
          
    $SelectStr = "SELECT f.FName, r.Datum FROM felhasznalok_tabla AS f
    LEFT JOIN rendeles_tabla AS r ON f.id=r.Felhasznalo_id 
    WHERE  r.id IS NOT NULL; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'];
      echo "<BR />";
    }  

    echo "<BR />";
    echo "<HR />";
    echo "<F3>LIKE használata 1</F3>";
    echo "<BR />";

    $SelectStr = "SELECT f.FName, r.Datum, t.Termek_Nev FROM rendeles_tabla AS r
    JOIN felhasznalok_tabla AS f ON f.id=r.Felhasznalo_id 
    JOIN rendelt_termek_tabla t ON r.id=t.Rendeles_id 
    WHERE r.Datum LIKE '2012-10%'; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'].
            " -  Termék: ".$row['Termek_Nev'];
      echo "<BR />";
    }  

    echo "<BR />";
    echo "<HR />";
    echo "<F3>LIKE használata 2</F3>";
    echo "<BR />";

    $SelectStr = "SELECT f.FName, r.Datum, t.Termek_Nev FROM rendeles_tabla AS r
    JOIN felhasznalok_tabla AS f ON f.id=r.Felhasznalo_id 
    JOIN rendelt_termek_tabla t ON r.id=t.Rendeles_id 
    WHERE t.Termek_Nev LIKE 'vad%'; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'].
            " -  Termék: ".$row['Termek_Nev'];
      echo "<BR />";
    }   

    echo "<BR />";
    echo "<HR />";
    echo "<F3>Egy felhasználó rendelései</F3>";
    echo "<BR />";

    $SelectStr = "SELECT f.FName, r.Datum, t.Termek_Nev FROM rendeles_tabla AS r
    JOIN felhasznalok_tabla AS f ON f.id=r.Felhasznalo_id 
    JOIN rendelt_termek_tabla t ON r.id=t.Rendeles_id 
    WHERE f.FName = 'belus'; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Felhasználó neve: ".$row['FName']." -  Vásárlás időpontja: ".$row['Datum'].
            " -  Vásárlás időpontja: ".$row['Termek_Nev'];
      echo "<BR />";
    }

    echo "<BR />";
    echo "<HR />";
    echo "<F3>Felhasználó rendeléseinek száma</F3>";
    echo "<BR />";

    $SelectStr = "SELECT count(r.Datum) AS alakalom FROM rendeles_tabla AS r
    JOIN felhasznalok_tabla AS f ON f.id=r.Felhasznalo_id 
    JOIN rendelt_termek_tabla t ON r.id=t.Rendeles_id 
    WHERE f.FName = 'belus'; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "A belus nevü felhasználó vásárlásainek száma: ".$row['alakalom'];
      echo "<BR />";
    }

    echo "<BR />";
    echo "<HR />";
    echo "<F3>Felhasználó rendeléseinek összege</F3>";
    echo "<BR />";

    $SelectStr = "SELECT f.FName, r.Datum, t.Termek_Nev, t.EgysegAr, t.Mennyiseg, (t.EgysegAr * t.Mennyiseg) AS Ar
    FROM rendeles_tabla AS r
    JOIN felhasznalok_tabla AS f ON f.id=r.Felhasznalo_id 
    JOIN rendelt_termek_tabla t ON r.id=t.Rendeles_id 
    WHERE f.FName = 'belus'; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Név: ".$row['FName']." -  Időpont: ".$row['Datum']." -  Termék: ".$row['Termek_Nev'].
            " -  Mennyiség: ".$row['Mennyiseg']. " -  Egységár: ".$row['EgysegAr']." -  össz ár: ".$row['Ar'] ;
      echo "<BR />";
    }
     
    echo "<BR />";
    echo "<HR />";
    echo "<F3>Felhasználó rendeléseinek értékei</F3>";
    echo "<BR />";

    $SelectStr = "SELECT f.FName, r.Datum, t.Termek_Nev, t.EgysegAr, t.Mennyiseg, (t.EgysegAr * t.Mennyiseg) AS Ar
    FROM rendeles_tabla AS r
    JOIN felhasznalok_tabla AS f ON f.id=r.Felhasznalo_id 
    JOIN rendelt_termek_tabla t ON r.id=t.Rendeles_id 
    WHERE f.FName = 'belus'; ";

    $result = mysqli_query($MySqliLink,$SelectStr) OR die(mysqli_error($MySqliLink));
    while($row = mysqli_fetch_array($result)) {
      echo "Név: ".$row['FName']." -  Időpont: ".$row['Datum']." -  Termék: ".$row['Termek_Nev'].
            " -  Mennyiség: ".$row['Mennyiseg']. " -  Egységár: ".$row['EgysegAr']." -  össz ár: ".$row['Ar'] ;
      echo "<BR />";
   }
     
?>
 </body>
  
</html>
