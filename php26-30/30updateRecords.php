<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>MySQLi mezők frissítése</title> 
    <meta charset="UTF-8">            
 </head>

 <body>
	<?php

$MySqliLink = mysqli_connect('localhost', 'root', '', 'tobbtablas');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'tobbtablas');


    echo "<F3>Cellák frissítése</F3>";
    echo "<BR />";

    $SelectStr = "SELECT * FROM felhasznalok_tabla WHERE FName='klotild'";

     $result = mysqli_query($MySqliLink,$SelectStr);

     $row = mysqli_fetch_array($result); 
     $id = $row['id'];
     $FJelszo = $row['FJelszo'];
     $pw = md5($FJelszo);
     $ReplaceStr = "REPLACE INTO felhasznalok_tabla (id, FName, FJelszo, FKor, FVaros) 
                    VALUES ($id,'klotild','$pw',36,'Esztergom')";
     if (!mysqli_query($MySqliLink,$ReplaceStr)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
     }

    echo "<BR />";
    echo "<HR />";
    echo "<F3>UPDATE parancs használata</F3>";
    echo "<BR />";
  
    $UpdateStr = "UPDATE felhasznalok_tabla SET FKor = 36, FVaros = 'Esztergom' WHERE FName ='klotild'";

    if (!mysqli_query($MySqliLink,$UpdateStr)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>Frissítés képlettel</F3>";
    echo "<BR />";
  
    $UpdateStr = "UPDATE felhasznalok_tabla SET FKor = FKor + 1  WHERE FName ='zsurmi'";

    if (!mysqli_query($MySqliLink,$UpdateStr)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }
  
    echo "<BR />";
    echo "<HR />";
    echo "<F3>Frissítés függvénnyel</F3>";
    echo "<BR />";
  
    $UpdateStr = "UPDATE rendeles_tabla SET Datum = NOW()  WHERE Kod ='v006'";

    if (!mysqli_query($MySqliLink,$UpdateStr)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }
  
    echo "<BR />";
    echo "<HR />";
     
?>
 </body>
  
</html>
