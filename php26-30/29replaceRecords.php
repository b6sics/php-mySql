<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>MySQLi rekordok cseréje</title> 
    <meta charset="UTF-8">            
 </head>

 <body>
	<?php

$MySqliLink = mysqli_connect('localhost', 'root', '', 'tobbtablas');
mysqli_set_charset($MySqliLink, 'UTF8');
mysqli_select_db($MySqliLink, 'tobbtablas');


    echo "<F3>Rekordok cseréje táblában</F3>";
    echo "<BR />";

    $SelectStr = "Delete FROM felhasznalok_tabla WHERE FName='klotild'";

    if (!mysqli_query($MySqliLink,$SelectStr)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }

    $pw = md5('nemtudom');

    $InsertIntoStr = "INSERT INTO felhasznalok_tabla VALUES ('','klotild','$pw',36,'Esztergom')";
    if (!mysqli_query($MySqliLink,$InsertIntoStr)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }

    echo "<BR />";
    echo "<HR />";
    echo "<F3>REPLACE INTO használata</F3>";
    echo "<BR />";
  
    $Str = "REPLACE INTO felhasznalok_tabla 
            (id, FName, FJelszo, FKor, FVaros) VALUES (5,'klotild','$pw',36,'Esztergom')";

    if (!mysqli_query($MySqliLink,$Str)) {
        die("MySqli hiba (" .mysqli_errno($MySqliLink). "): " . mysqli_error($MySqliLink));
    }
  
    echo "<BR />";
    echo "<HR />";
     
?>
 </body>
  
</html>
