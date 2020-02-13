<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Fájl megnyitása</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Fájl megnyitása</h2>
 
 
<?php
  $filename = '/path/to/teszt.txt';
  if (file_exists($filename)) {
    $file=fopen($filename,"r");
    //...
      if (feof($file)) {
        echo "Fájl vége";
      }
    //...
    fclose($file);
  }
?>
    
</body>    
</html>
