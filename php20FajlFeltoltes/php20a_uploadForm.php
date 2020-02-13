<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - HTML űrlap fájlfeltöltéshez</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>HTML űrlap fájlfeltöltéshez</h2>
 

<form action="feltolt.php" method="post"
    enctype="multipart/form-data">
      <label for="file">Fájl kiválasztása:</label>
      <input type="file" name="file" id="file">
      <br>
      <input type="submit" name="submit" value="Submit">
  </form>

 
</body>    
</html>
