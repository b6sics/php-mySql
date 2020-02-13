<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>MySQLi rekordok törlése</title> 
    <meta charset="UTF-8">            
 </head>

 <body>
	<?php

$MySqliLink = mysqli_connect('localhost', 'root', '', 'tobbtablas');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'tobbtablas');


    echo "<F3>Tábla kiürítése</F3>";
    echo "<BR />";

    $SelectStr = "Delete FROM felhasznalok_tabla ";

    if (!mysqli_query($MySqliLink,$SelectStr)) {
       die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }

    echo "<BR />";
    echo "<HR />";
    echo "<F3>Rekordok törlése táblából</F3>";
    echo "<BR />";
  
    $SelectStr = "Delete FROM felhasznalok_tabla  WHERE FName='kiraly' ";

    if (!mysqli_query($MySqliLink,$SelectStr)) {
       die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>A legrégebbi rekord törlése</F3>";
    echo "<BR />";
    
    $SelectStr = "Delete FROM rendeles_tabla ORDER BY Datum LIMIT 1";

    if (!mysqli_query($MySqliLink,$SelectStr)) {
       die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>Rekordok törlése több táblából</F3>";
    echo "<BR />";
      
    $SelectStr = "Delete rendeles_tabla, felhasznalok_tabla, rendelt_termek_tabla
                    FROM rendeles_tabla, felhasznalok_tabla, rendelt_termek_tabla 
                    WHERE felhasznalok_tabla.id = rendeles_tabla.Felhasznalo_id 
                    AND rendeles_tabla.id = rendelt_termek_tabla.Rendeles_id
                    AND felhasznalok_tabla.FName = 'kiraly'";

    if (!mysqli_query($MySqliLink,$SelectStr)) {
       die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>Rekordok törlése JOIN-al</F3>";
    echo "<BR />";
          
    $SelectStr_ = "Delete r, f, t FROM rendeles_tabla AS r
    JOIN felhasznalok_tabla AS f ON f.id=r.Felhasznalo_id 
    JOIN rendelt_termek_tabla t ON r.id=t.Rendeles_id 
    WHERE f.FName = 'kiraly'";

    if (!mysqli_query($MySqliLink,$SelectStr)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }

    echo "<BR />";
    echo "<HR />";
     
?>
 </body>
  
</html>
