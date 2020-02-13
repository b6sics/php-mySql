<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Könyvtár létrehozása szerveren</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      
 <h2>Könyvtár létrehozása szerveren</h2>
 <?php
  mkdir("konyvtarnev");
  mkdir("/konyv/tar/helye/dir1", 0700);
  mkdir("/konyv/tar/helye/dir2", 0777, true);
  if (!mkdir("/konyv/tar/helye/dir3", 0777, true)) {
    die('Hiba történt...');
  }
?>
   
</body>    
</html>
