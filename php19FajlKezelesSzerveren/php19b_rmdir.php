<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Könyvtár törlése szerveren</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Könyvtár törlése szerveren</h2>
<?php
  rmdir("konyvtarnev");
  rmdir("/konyv/tar/helye/dir1");
  if (!rmdir("/konyv/tar/helye/dir2")) {
    die('Hiba történt...');
  }
?>
    
</body>    
</html>
