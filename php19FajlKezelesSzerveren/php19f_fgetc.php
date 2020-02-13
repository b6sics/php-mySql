<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Fájl karakterenkénti beolvasása</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Fájl karakterenkénti beolvasása</h2>
 
 
 
<?php
  $filename = '/path/to/teszt.txt';
  if (file_exists($filename)) {
    $file=fopen($filename,"r");
    while (!feof($file)) {
      echo fgetc($file);
    }
    fclose($file);
  }
?>
    
</body>    
</html>
