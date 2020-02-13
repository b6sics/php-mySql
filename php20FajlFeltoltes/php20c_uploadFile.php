<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Egyszerű PHP feltöltő szkript</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Egyszerű PHP feltöltő szkript</h2>
 

<?php
  if ($_FILES["file"]["error"] > 0) {
    echo "Hiba: ".$_FILES["file"]["error"];
  } else {
    //Feltöltött fájl elmentése
    $FajlNev = $_FILES["file"]["name"];
    $Forras  = $_FILES["file"]["tmp_name"]];
    $Cel     = "konyvtar/".$_FILES["file"]["name"];
    if (file_exists($Cel)) {
      echo $Cel . " már létezik. ";
    } else {
      move_uploaded_file($Forras,$Cel);
      echo "Feltöltve: " . $Cel;
    }
  }
?>
 
</body>    
</html>
