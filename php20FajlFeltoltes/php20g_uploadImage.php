<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Egy kép feltöltése kliensről</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Egy kép feltöltése kliensről</h2>
 

<?php
  //csak kép
  //max. 2Kb
  //csak "gif" vagy "jpeg" vagy "jpg" vagy "png" vagy "JPG"
  $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
  $temp        = explode(".", $_FILES["file"]["name"]);
  $extension   = end($temp);
  if ((($_FILES["file"]["type"]=="image/gif")
    || ($_FILES["file"]["type"]=="image/jpeg")
    || ($_FILES["file"]["type"]=="image/jpg")
    || ($_FILES["file"]["type"]=="image/pjpeg")
    || ($_FILES["file"]["type"]=="image/x-png")
    || ($_FILES["file"]["type"]=="image/png"))
    && ($_FILES["file"]["size"] < 20000)
    && (in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
      echo "Hiba: ".$_FILES["file"]["error"];
    } else {
      //Feltöltött fájl elmentése
      $FajlNev = $_FILES["file"]["name"];
      $Forras  = $_FILES["file"]["tmp_name"];
      $Cel     = "konyvtar/".$_FILES["file"]["name"];
      if (file_exists($Cel)) {
        echo $Cel . " már létezik. ";
      } else {
        move_uploaded_file($Forras,$Cel);
        echo "Feltöltve: " . $Cel;
      }
    }
  } else {
    echo "Nem megfelelő fájl.";
  }
?>
    
</body>    
</html>
