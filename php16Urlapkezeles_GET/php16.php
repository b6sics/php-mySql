<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 16 ŰRLAPKEZELÉS</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 16 ŰRLAPKEZELÉS</h2>

<p>isset() függvény használata<br />
Az isset() függvény megvizsgálja, hogy létezik-e a paramétereként átadott tetszőleges típusú változó.
</p>
    <?php   
       // Az űrlapot elküldték ?
       $_TEST =array("kulcs1"=>"szöveg1","kulcs2"=>"szöveg2");
       echo '<br>$_TEST["kulcs1"]       : '; var_dump($_TEST["kulcs1"]);  
       echo '<br>isset($_TEST["kulcs1"]): '; var_dump(isset($_TEST["kulcs1"]));  	    
       echo '<br><br>$_TEST["kulcs2"] : '; var_dump($_TEST["kulcs2"]);
       echo '<br>isset($_TEST["kulcs2"]): '; var_dump(isset($_TEST["kulcs2"]));  	      	    
       echo '<br><br>$_TEST["kulcs3"] : '; var_dump($_TEST["kulcs3"]);
       echo '<br>isset($_TEST["kulcs3"]): '; var_dump(isset($_TEST["kulcs3"]));  	      	    
       $_TEST["kulcs3"] = "";
       echo '<br><br>$_TEST["kulcs3"] : '; var_dump($_TEST["kulcs3"]);  	
       echo '<br>isset($_TEST["kulcs3"]): '; var_dump(isset($_TEST["kulcs3"]));  	      	        
       $_TEST["kulcs3"] = "szöveg3";	
       echo '<br><br>$_TEST["kulcs3"] : '; var_dump($_TEST["kulcs3"]);	
       echo '<br>isset($_TEST["kulcs3"]): '; var_dump(isset($_TEST["kulcs3"]));  	    
       $_TEST["kulcs3"] = NULL;	
       echo '<br><br>$_TEST["kulcs3"] : '; var_dump($_TEST["kulcs3"]);  
       echo '<br>isset($_TEST["kulcs3"]): '; var_dump(isset($_TEST["kulcs3"]));	      
     ?>   
<hr />

<p>Egy űrlap két Submit ($_GET):<br />

</p>
	<?php
    // Az űrlapot az 1. nyomógombbal küldték?
    if (isset($_GET['kuld1'])) { 
      echo  "Az 1. gombhoz tartozó tevékenységek végrehajtása...";
      echo  '<br> a $_GET["kuld1"] mező értéke: <b>'.$_GET['kuld1'].'<b>' ;
    } 
    // Az űrlapot az 2. nyomógombbal küldték?
    if (isset($_GET['kuld2'])) { 
      echo  "Az 2. gombhoz tartozó tevékenységek végrehajtása...";
      echo  '<br> a $_GET["kuld2"] mező értéke: <b>'.$_GET['kuld2'].'<b>' ;
    } 				  
  ?>    
  
  <h2>2 elküldő gomb kezelése ($_GET)</h2>
  <form action="php16.php" method="get"> 
    <input type="submit" name="kuld1" value="1. submit">
    <input type="submit" name="kuld2" value="2. submit">
  </form>    

<hr />

<p>Egy űrlap két Submit ($_POST):<br />

</p>
  <?php   
    // Az űrlapot az 1. nyomógombbal küldték?
    if (isset($_POST['kuld1'])) { 
      echo  "Az 1. gombhoz tartozó tevékenységek végrehajtása...";
      echo  '<br> a $_POST["kuld1"] mező értéke: <b>'.$_POST['kuld1'].'<b>' ;
    } 
    // Az űrlapot az 2. nyomógombbal küldték?
    if (isset($_POST['kuld2'])) { 
      echo  "Az 2. gombhoz tartozó tevékenységek végrehajtása...";
      echo  '<br> a $_POST["kuld2"] mező értéke: <b>'.$_POST['kuld2'].'<b>' ;
    } 				  
  ?>         
  <h2>2 elküldő gomb kezelése ($_POST)</h2>
  <form action="php16.php" method="post"> 
    <input type="submit" name="kuld1" value="1. submit">
    <input type="submit" name="kuld2" value="2. submit">
  </form>    
<hr />

<p>Két űrlap különböző metódusokkal:<br />

</p>
	<?php
    // Az űrlapot az 1. nyomógombbal küldték?
    if (isset($_GET['kuld1'])) { 
      echo  "Az 1. űrlaphoz tartozó tevékenységek végrehajtása...";
      echo  '<br> a $_GET["kuld1"] mező értéke: <b>'.$_GET['kuld1'].'<b>' ;
    } 
    // Az űrlapot az 2. nyomógombbal küldték?
    if (isset($_POST['kuld2'])) { 
      echo  "A 2. űrlaphoz tartozó tevékenységek végrehajtása...";
      echo  '<br> a $_POST["kuld2"] mező értéke: <b>'.$_POST['kuld2'].'<b>' ;
    } 				  
  ?>         
  <h2>2 elküldő gomb kezelése ($_GET)</h2>
  <form action="php16.php" method="get"> <!--get metódus!!!-->
    <input type="submit" name="kuld1" value="1. submit">
  </form>    
  <form action="php16.php" method="post"> <!--post metódus!!!-->
    <input type="submit" name="kuld2" value="2. submit">
  </form>      
<hr />

<p>Szöveges beviteli mező<br />

</p>
	<?php
    // Az űrlapot elküldték ?
    if (isset($_GET["kuld"])) {
      // Létezik a 'szoveg' nevű mező?	
      if (isset($_GET["szoveg"])) { 
        if ( $_GET["szoveg"] > "") {
          echo "A keresett kifejezés: ".$_GET["szoveg"]."<br>";
        } 
      } 
    }
  ?>         
  <h2>Kereső mező ($_GET)</h2>
  <form action="php16.php" method="get"> 
    <label for="szoveg">Keresett kifejezés:</label>
    <input type="text" id="szoveg" name="szoveg" value="" > 
    <input type="submit" name="kuld" value="Keress!">
  </form>      
<hr />

<p>Jelszó bevitele<br />

</p>
  <?php   
    $nev = ""; $jelszo = ""; 
    // Az űrlapot elküldték ?
    if (isset($_POST["kuld"])) {
      // Létezik a 'nev' nevű mező?	
      if (isset($_POST["nev"])) { 
        if ( $_POST["nev"] > "") {$nev = $_POST["nev"];}
      } 
      // Létezik a 'jelszo' nevű mező?	
      if (isset($_GET["jelszo"])) { 
        if ($_POST["jelszo"] > "") {$jelszo = $_POST["jelszo"];}
      }   
      // A beérkező adatok megjelenítése
      echo"<h2>Ezt küldte a szervernek:</h2>
           <br><b>Név:</b> $nev
           <br><b>Jelszó:</b> $jelszo
           <br><hr><br>"; 
    } 
    ?> 
    <h2>Jelszó - $_POST tömb használata</h2>
    <form action="php16.php" method="post" >
      <label for="nev">Név:</label>
      <input type="text" id="nev" name="nev" value="" > <br>
      <label for="jelszo">Jelszó:</label>
      <input type="password" id="jelszo" name="jelszo" value="" >
      <input type="submit" name="kuld">
    </form>    
<hr />

<p>Szövegbevitel plusz<br />

</p>
  <?php   
    $nev = ""; $jelszo = ""; 
    // Az űrlapot elküldték ?
    if (isset($_POST["kuld"])) {
      // Létezik a 'nev' nevű mező?	
      if (isset($_POST["nev"])) { 
        if ( $_POST["nev"] > "") {
          $nev = htmlspecialchars($_POST["nev"]);
        }
      } 
      // Létezik a 'jelszo' nevű mező?	
      if (isset($_POST["jelszo"])) { 
        if ($_POST["jelszo"] > "") {
          $jelszo = htmlspecialchars($_POST["jelszo"]);
        } 
      }   
      // A beérkező adatok megjelenítése
      echo  "<h2>Ezt küldte a szervernek:</h2>
      <br><b>Név:</b> $nev
      <br><b>Jelszó:</b> $jelszo
      <br><hr><br>"; 
    } 				  
  ?>         
  <h2>Szövegbevitel plusz</h2>
    <form action="php16.php" method="post" >
      <label for="nev">Név:</label>
      <input type="text" id="nev" name="nev" value="<?php echo $nev ?>">
      <label for="jelszo">Jelszó:</label>		
      <input type="password" id="jelszo" name="jelszo" value="" >
      <input type="submit" name="kuld">
  </form>     
<hr />

<p>Textarea kezelése<br />

</p>
  <?php   
    $Szoveg = "";  
    // Az űrlapot elküldték ?
    if (isset($_POST["kuld"])) {
      // Létezik a 'elem_nev' nevű mező?	
      if (isset($_POST["elem_nev"])) { 
        // Van benne valami?
        if ( $_POST["elem_nev"] > "") 
          {$Szoveg = htmlspecialchars($_POST["elem_nev"]);} 
        } 
        // A beérkező adatok megjelenítése
        echo"<h2>Ezt küldte a szervernek:</h2>
             <br><b>Szöveg:</b> $Szoveg
             <br><hr><br>"; 
      } 				  
    ?>         
    <h2>Textarea használata</h2>
    <form action="php16.php" method="post" > 
      <label for="textarea_id">Szöveg:</label>
        <textarea id="textarea_id" name="elem_nev"><?php echo $Szoveg ?></textarea> 
        <input type="submit" name="kuld">
    </form>   
<hr />

<p>Jelölőnégyzet kezelése<br />

</p>
  <?php   
    $ch1 = "";  $ch2 = "";
    // Létezik a 'check1' nevű mező?	
    // értéke = Válasz1?
    if ((isset($_POST["check1"])) && ($_POST["check1"]=='Válasz1')) { 
      $ch1 = " checked ";
      echo  "<br> check1 kiválasztva";
    } 
    // Létezik a 'check2' nevű mező?	
    // értéke = Válasz2?
    if ((isset($_POST["check2"])) && ($_POST["check2"]=='Válasz2')) { 
      $ch2 = " checked ";
      echo  "<br>check2 kiválasztva";
    } 				  
  ?>         
  <h2>Checkbox használata</h2>
  <form action="php16.php" method="post" >    
    <input type="checkbox" name="check1" id="check1" value="Válasz1"
      <?php echo $ch1 ?> >        
    <label for="check1">Válasz 1.</label><br>
    <input type="checkbox" name="check2" id="check2" value="Válasz2" 
      <?php echo $ch2 ?> >
    <label for="check2">Válasz 2.</label><br>
    <input type="submit" name="kuld">
  </form>  
<hr />

<p>Kiválasztó gomb kezelése<br />

</p>
  <?php   
    $ch1 = "";  $ch2 = "";
    // Létezik a 'radio_csoport'?
    if (isset($_POST["radio_csoport"])) {
      // értéke = Válasz1?			
      if ($_POST["radio_csoport"]=='Válasz1') { 
        $ch1 = " checked ";
        echo  "<br> radio1 kiválasztva";
      } 
      // értéke = Válasz2?	          
      if ($_POST["radio_csoport"]=='Válasz2') { 
        $ch2 = " checked ";
        echo  "<br> radio2 kiválasztva";
      }			  
    } 			  
  ?>         
  <h2>Radio gomb használata</h2>
  <form action="php16.php" method="post" >    
    <input type="radio" name="radio_csoport" id="radio1" value="Válasz1"
      <?php echo $ch1 ?> >        
    <label for="radio1">Válasz 1.</label><br>
    <input type="radio" name="radio_csoport" id="radio2" value="Válasz2" 
      <?php echo $ch2 ?> >
    <label for="radio2">Válasz 2.</label><br>
    <input type="submit" name="kuld">
  </form>  
<hr />

<p>Lenyíló lista kezelése<br />

</p>
  <?php   
    $sel1 = "";  $sel2 = "";  $sel3 = "";
    // Létezik a 'radio_csoport'?
    if (isset($_POST["select1"])) {
      // értéke = valasztas1?			
      if ($_POST["select1"]=='valasztas1') { 
        $sel1 = " selected ";
        echo  "<br> 1. kiválasztva";
      } 
      // értéke = valasztas2?	          
      if ($_POST["select1"]=='valasztas2') { 
        $sel2 = " selected ";
        echo  "<br> 2. kiválasztva";
      }		
      // értéke = valasztas3?	          
      if ($_POST["select1"]=='valasztas3') { 
        $sel3 = " selected ";
        echo  "<br> 3. kiválasztva";
      }			  
    } 			  
  ?>         
  <h2>Kiválasztó lista használata</h2>
  <form action="php16.php" method="post" >    
    <select name="select1" size="3">
      <option value="valasztas1" <?php echo $sel1 ?> >1.</option>
      <option value="valasztas2" <?php echo $sel2 ?> >2.</option>
      <option value="valasztas3" <?php echo $sel3 ?> >3.</option>
    </select>
    <input type="submit" name="kuld">
<hr />

<p>Multiselect lista kezelése<br />

</p>
  <?php   
    $sel1 = "";  $sel2 = "";  $sel3 = "";
    if (isset($_POST["select1"])) {  
      foreach ($_POST['select1'] as $selectedElem)
      {
        if ($selectedElem=="valasztas1") {
           $sel1 = " selected ";
           echo  "<br> 1. kiválasztva";			
         }
        if ($selectedElem=="valasztas2") {
           $sel2 = " selected ";
           echo  "<br> 2. kiválasztva";			
         }
        if ($selectedElem=="valasztas3") {
           $sel3 = " selected ";
           echo  "<br> 3. kiválasztva";			
         }	              
      }    
    }    			  
  ?>    
  <h2>Multiselect lista használata</h2>
  <form action="php16.php" method="post" >    
    <select name="select1[]" size="3" multiple="multiple">
      <option value="valasztas1" <?php echo $sel1 ?> >1.</option>
      <option value="valasztas2" <?php echo $sel2 ?> >2.</option>
      <option value="valasztas3" <?php echo $sel3 ?> >3.</option>
    </select>
    <input type="submit" name="kuld">
  </form>   
<hr />

<p>Képes elküldőgomb kezelése<br />

</p>
  <?php   
    // Az űrlapot elküldték ?
    if ((isset($_POST['kuld_x'])) && (isset($_POST['kuld_y']))) { 
      echo  "Az űrlap adatainak feldolgozása.... <br>";
      echo  "X:".htmlspecialchars($_POST['kuld_x'])."<br>";
      echo  "Y:".htmlspecialchars($_POST['kuld_y'])."<br>";
    } 			  
  ?>         
  <h2>Képes elküldő gomb használata </h2>
  <form action="php16.php" method="post"> 
    <input type="image" name="kuld" src="gor.gif" width="48" height="48">
  </form>    
<hr />

<p>Fájlbevitel kezelése<br />

</p>
  <?php   
    if (isset($_POST['kuld'])) { 
      if ($_FILES["file"]["error"] > 0) {
        echo "Hibakód: " . $_FILES["file"]["error"] . "<br>";
      } else {
        echo "Fájlnév: " . $_FILES["file"]["name"] . "<br>";
        echo "Fájltípus: " . $_FILES["file"]["type"] . "<br>";
        echo "Fájlméret: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Átmeneti könyvtár: " . $_FILES["file"]["tmp_name"]. "<br>";
        echo "Ha a fájl jellemzői megfelők, akkor <br>
            már csak a kívánt könyvtárba kell másolni ..." ;
      }			
    } 			  
  ?>         
  <h2>Input file használata </h2>
  <form action="php16.php" method="post" enctype="multipart/form-data"> 
    <label for="file_id">Fájlnév:</label>
    <input type="file" name="file" id="file_id"><br>
    <input type="submit" name="kuld" value="Feltöltés">
  </form>   
<hr />

<p>Fájlbevitel szűkítése<br />

</p>
  <?php   
    if (isset($_POST['kuld'])) { 
      $vart_kiterjesztes_tomb = array("gif",  "jpg", "png");
      $nev_kitejesztes_tomb = explode(".", $_FILES["file"]["name"]);
      $kitejesztes = end($nev_kitejesztes_tomb);
 
      if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/png"))
      && ($_FILES["file"]["size"] < 2048)
      && in_array($kitejesztes, $vart_kiterjesztes_tomb)) {
	
        if ($_FILES["file"]["error"] > 0) {
          echo "Hibakód: " . $_FILES["file"]["error"] . "<br>";
        } else {
          echo "Fájlnév: " . $_FILES["file"]["name"] . "<br>";
          echo "Ha a fájl jellemzői megfelők, akkor <br>
              már csak a kívánt könyvtárba kell másolni ..." ;
        }			
      } else {echo "Valami nem OK!";}
    } 			  
  ?>         
  <h2>Input file szűkítése </h2>
  <form action="php16.php" method="post" enctype="multipart/form-data"> 
    <label for="file_id">Fájlnév:</label>
    <input type="file" name="file" id="file_id"><br>
    <input type="submit" name="kuld" value="Feltöltés">
  </form>    
<hr />

<p>Multiselect input file<br />

</p>
  <?php   
    if ((isset($_POST['kuld'])) && (isset($_FILES['file']))){ 
      foreach ($_FILES['file']['name'] as $filename) {
        echo 'Fájlnév: '.$filename.'<br/>';
      }
    } 			  
  ?>         
  <h2>Multiselect input file </h2>
  <form action="php16.php" method="post" enctype="multipart/form-data"> 
    <label for="file_id">Fájlnév:</label>
    <input type="file" name="file[]" id="file_id" multiple="multiple"><br>
    <input type="submit" name="kuld" value="Feltöltés">
  </form>     
<hr />

</body>
</html>