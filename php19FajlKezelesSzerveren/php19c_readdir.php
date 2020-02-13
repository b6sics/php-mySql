<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Szerver könyvtár listázása</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Szerver könyvtár listázása</h2>
<?php
  $dir = "/konyv/tar/helye/dir3";
 
  // Ellenőrizzük a könyvtárat
  if (is_dir($dir)) {
    // Megnyitjuk
    if ($dh = opendir($dir)) {
        // A readdir függvénnyel addig olvasgatjuk a könyvtárneveket, amíg False értéket nem ad vissza
        while (($file = readdir($dh)) !== false) {
            echo "filename: $file : filetype: " . filetype($dir . $file) . "n";
        }
        // A könyvtárat bezárjuk
        closedir($dh);
    }
  }
?>
     
</body>    
</html>
