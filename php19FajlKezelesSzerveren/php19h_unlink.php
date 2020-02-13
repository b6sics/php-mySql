<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Fájl törlése</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Fájl törlése</h2>
 
 
<?php
  $filename = '/path/to/teszt.txt';
  if (file_exists($filename)) {
    if (!unlink($filename))
      echo ("Hiba történt"); //pl. nincs jogunk hozzá
    else
      echo ("A fájlt töröltük");
  }
?>
 
</body>    
</html>
