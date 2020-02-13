<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>PHP - Több fájl feltöltése kliensről</title> 
    <meta charset="UTF-8">            
 </head>

 <body>      

<h2>Több fájl feltöltése kliensről</h2>
 
 
<form action="php20i_feltolt.php" method="post"
    enctype="multipart/form-data">
      <label for="file">Fájl kiválasztása:</label>
      <input type="file" name="file[]" id="file" multiple="multiple" >
      <br>
      <input type="submit" name="submit" value="Submit">
  </form>


</body>    
</html>
