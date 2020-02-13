<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Fájl és könyvtár ellenőrzése</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Fájl és könyvtár ellenőrzése</h2>
 
<?php
  $filename = '/path/to/teszt.txt';
  if (file_exists($filename)) {
    echo "The file $filename exists";
  } else {
    echo "The file $filename does not exist";
  }
?>
    
<h2>Fájl vizsgálata</h2>
 
 
<?php
  if (!is_file('fajl')) {
    echo 'a "fajl" vagy nem létezik vagy nem fájl';
  }
  if (!is_readable(('fajl')) {
    echo 'a "fajl" nem létezik vagy nem olvasható';
  }
  if (!is_writable('fajl')) {
    echo 'a "fajl" nem létezik vagy nem írható';
  }
?>
    
</body>    
</html>
