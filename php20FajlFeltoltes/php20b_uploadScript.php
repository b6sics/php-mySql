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
    echo "Error: ".$_FILES["file"]["error"];
  } else {
    echo "Upload: ".$_FILES["file"]["name"]."<br>";
    echo "Type: " . $_FILES["file"]["type"]."<br>";
    echo "Size: " .($_FILES["file"]["size"] / 1024)
        ." Kb<br>";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
?>
 
</body>    
</html>
