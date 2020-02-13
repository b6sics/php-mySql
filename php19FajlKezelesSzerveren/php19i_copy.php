<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Fájl másolása</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Fájl másolása</h2>
 
 
 
<?php
  $forras = '/path/to/teszt1.txt';
  $cel    = '/path/to/teszt2.txt';
  if (file_exists($forras)) {
    if (!copy($forras, $cel)) {
      echo "Hiba történt...n";
    }
  }
?>
 
</body>    
</html>
