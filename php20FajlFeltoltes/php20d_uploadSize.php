<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Korlátozás méret alapján</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Korlátozás méret alapján</h2>
 
 
<?php
  //max. 20 Kb
  if ($_FILES["file"]["size"] < 20000) {
    if ($_FILES["file"]["error"] > 0) {
      echo "Hiba: ".$_FILES["file"]["error"];
    } else {
      ...
      //Feltöltött fájl elmentése
      ...
    }
  } else {
    echo "Nem megfelelő fájl.";
  }
?>
  
</body>    
</html>
