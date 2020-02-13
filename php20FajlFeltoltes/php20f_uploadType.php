<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Korlátozás fájltípus alapján</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Korlátozás fájltípus alapján</h2>
 
 
<?php
  //csak képek
  if  (($_FILES["file"]["type"]=="image/gif")
    || ($_FILES["file"]["type"]=="image/jpeg")
    || ($_FILES["file"]["type"]=="image/jpg")
    || ($_FILES["file"]["type"]=="image/pjpeg")
    || ($_FILES["file"]["type"]=="image/x-png")
    || ($_FILES["file"]["type"]=="image/png")) {
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
