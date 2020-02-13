<?php
  session_start();
  $Munkamenet_azonosito=session_id();

  $_SESSION['v1'] = 'v1';
  $_SESSION['v2'] = 'v2';

 if(!isset($_SESSION['felhasznalo'])) {$_SESSION['felhasznalo']='';}
  kibelep();

  function Leptet() { 
if(isset($_SESSION['szamlalo']))
    $_SESSION['szamlalo']=$_SESSION['szamlalo']+1;
else
    $_SESSION['szamlalo']=1;
}

function kibelep() { 
if (isset($_POST['Kilep'])) $_SESSION['felhasznalo']='';
if (isset($_POST['Belep']) && isset($_POST['FNev']) && isset($_POST['JSz']))
if (($_POST['FNev']=='admin') && ($_POST['JSz']=='admin')) 
        $_SESSION['felhasznalo']=$_POST['FNev'];
}

function Kiir() { 
if(isset($_SESSION['v1']))
    echo "v1=".$_SESSION['v1']."<br>";
else
    echo "Nincs v1<br>";
if(isset($_SESSION['v2']))
    echo "v1=".$_SESSION['v2']."<br>";
else
    echo "Nincs v2<br>";
echo "Munkamenet azonosító=".session_id()."<br>";
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 17 Munkamenet kezelés</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 17 Munkamenet kezelés</h2>

<p> Munkamenet indítása <br />
A munkamenet indításáról a session_start() függvény gondoskodik. 
Regisztrálja a munkamenetet a szerveren, engedélyezi a munkamenet
változók használatát. 
</p>

<?php
  echo "Munkamenet azonosító=$Munkamenet_azonosito";
?>
<form action=''><input type='submit' value='Újra'></form>
<hr />

<p> Munkamenet változók <br />
A munkamenethez kapcsolódó változókat a $_SESSION super global 
tömbben tudjuk ideiglenesen tárolni.
</p>
    <?php   
      Leptet();
      echo "Számláló=". $_SESSION['szamlalo'];      
    ?>
    <form action=''><input type='submit' value='Újra'></form>
<hr />

<p> Felhasználó beléptetése <br />
A munkamenetek használata lehetővé teszi, hogy minden
felhasználó saját adatait kezelje 
(megrendelést adjon fel, üzenetet írjon).
</p>
    <?php   
      if($_SESSION['felhasznalo']!='') {
		echo "Üdv: ". $_SESSION['felhasznalo'];  
		echo "<form action='' method='post'>
		      <input type='submit' value='Újra letölt'>
		      <input type='submit' name='Kilep' value='Kilépés'>		      
		      </form>";
	  } else {
		echo "<form action='' method='post'>
		         <p>
		           <label for='FNev' '>Felhasználónév:</label>
                   <input type='text' name='FNev' id='FNev' value='' >
                 </p>
		         <p>
		           <label for='JSz' '>Jelszó:</label>
                   <input type='password' name='JSz' id='JSz' value='' >
                 </p>  		         
		         <input type='submit' value='Újra letölt'>
		         <input type='submit' name='Belep' value='Belépés'>
		      </form>";
	  }
?>   
<hr />

<p> Munkamenet törlése <br />
Ha csupán egy munkamenet változót kívánunk törölni,
azt megtehetjük az unset() függvény segítségével. 
</p>
    <?php   
      echo "<h2>1. Munkamenet változók</h2>";
      Kiir();
      unset($_SESSION['v1']);
      echo '<h2>2. $_SESSION["v1"] törlése után</h2>';
      Kiir();
      $_SESSION= array(); 
      echo '<h2>3. $_SESSION törlése után</h2>';
      Kiir();
      session_destroy();
      echo "<h2>4. A munkamenet törlése után</h2>";
      Kiir();
?>   
<hr />

</body>
</html>