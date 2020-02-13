<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Korlátozás kiterjesztés alapján</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Korlátozás kiterjesztés alapján</h2>
 
 
<?php
  //csak képek
  $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
  $temp        = explode(".", $_FILES["file"]["name"]);
  $extension   = end($temp);
  if (in_array($extension, $allowedExts)) {
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
