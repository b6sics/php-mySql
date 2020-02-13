<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Egy dokumentum feltöltése kliensről</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Egy dokumentum feltöltése kliensről</h2>
 
 
<?php
  // csak dokumentum
  // max 2Kb
  // csak "txt" vagy "doc" vagy "docx" vagy "pdf" vagy "xls" vagy "xlsx" vagy "ppt" vagy "pptx" 
  //       vagy "zip" vagy "ppsx"
  $allowedExts = array("txt", "doc", "docx", "pdf", "xls", "xlsx", "ppt", "pptx", "zip", "ppsx");
  $temp        = explode(".", $_FILES["file"]["name"]);
  $extension   = end($temp);
  if ((($_FILES["file"]["type"]=="application/msword")
    || ($_FILES["file"]["type"]=="application/excel")    
    || ($_FILES["file"]["type"]=="application/vnd.ms-excel")
    || ($_FILES["file"]["type"]=="application/x-msexcel")
    || ($_FILES["file"]["type"]=="application/x-excel")    
    || ($_FILES["file"]["type"]=="application/vnd.openxmlformats-officedocument.wordprocessingml.document")
    || ($_FILES["file"]["type"]=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
    || ($_FILES["file"]["type"]=="application/pdf")
    || ($_FILES["file"]["type"]=="application/vnd.ms-powerpoint")
    || ($_FILES["file"]["type"]=="application/vnd.openxmlformats-officedocument.presentationml.presentation")
    || ($_FILES["file"]["type"]=="application/vnd.openxmlformats-officedocument.presentationml.slideshow")
    || ($_FILES["file"]["type"]=="application/zip"))
    && ($_FILES["file"]["size"] < 20000)
    && (in_array($extension, $allowedExts))) {
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
