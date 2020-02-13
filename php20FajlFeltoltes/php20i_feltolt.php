<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Több fájl feltöltése kliensről 2</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

 
<?php
if(isset($_POST['submit'])){
 // A fájlok száma
 $countfiles = count($_FILES['file']['name']); 
 // Sorra vesszük a fájlokat
 for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['file']['name'][$i];
    if ($_FILES["file"]["error"] > 0) {
      echo "Hiba: ".$_FILES["file"]["error"][$i];
    } else {
      //Feltöltött fájl elmentése
      $FajlNev = $_FILES["file"]["name"][$i];
      $Forras  = $_FILES["file"]["tmp_name"][$i];
      $Cel     = "konyvtar/".$_FILES["file"]["name"][$i];
      if (file_exists($Cel)) {
        echo $Cel . " már létezik. ";
      } else {
        move_uploaded_file($Forras,$Cel);
        echo "Feltöltve: " . $Cel;
      }
    }
  }
}
?>

</body>    
</html>
