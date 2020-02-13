<!DOCTYPE html>
<html lang="hu">
 <head> 
    <title>MySQL aggregáló függvények: min, max - PHP</title> 
    <meta charset="UTF-8">            
 </head>

 <body>
	<?php
	 $MySqliLink = mysqli_connect('localhost', 'root', '', 'test_db');
	 mysqli_set_charset($MySqliLink,'UTF8');
	 mysqli_select_db($MySqliLink,'test_db');
	 
	 // itt folytasd
	 $SelectStr = "SELECT MIN(FKor) FROM felhasznalok_tabla";

	 $result = mysqli_query($MySqliLink, $SelectStr) OR die(mysqli_errror($MySqliLink));

	 while($row = mysqli_fetch_array($result)) {
		echo "A legfiatalabb felhasználó kora: ".$row['MIN(FKor)'];
		echo "<BR />";
	}
	 
	echo "<BR />";
	echo "<HR />";

	$SelectStr = "SELECT MIN(FKor), MAX(FKor) FROM felhasznalok_tabla";

	$result = mysqli_query($MySqliLink, $SelectStr) OR die(mysqli_errror($MySqliLink));

	while($row = mysqli_fetch_array($result)) {
		echo "A legfiatalabb felhasználó kora: ".$row['MIN(FKor)'];
		echo "<BR />";
		echo "A legidősebb felhasználó kora: ".$row['MAX(FKor)'];
		echo "<BR />";
	}
	
	echo "<BR />";
	echo "<HR />";

	$SelectStr = "SELECT SUM(FKor), AVG(FKor) FROM felhasznalok_tabla";

	$result = mysqli_query($MySqliLink, $SelectStr) OR die(mysqli_errror($MySqliLink));

	while($row = mysqli_fetch_array($result)) {
		echo "A felhasználók életkorának összege: ".$row['SUM(FKor)'];
		echo "<BR />";
		echo "A felhasználók életkorának átlaga: ".$row['AVG(FKor)'];
		echo "<BR />";
	}
	
	echo "<BR />";
	echo "<HR />";

	$SelectStr = "SELECT COUNT(*) FROM felhasznalok_tabla WHERE FKor<40 ";

	$result = mysqli_query($MySqliLink, $SelectStr) OR die(mysqli_errror($MySqliLink));

	while($row = mysqli_fetch_array($result)) {
		echo "A 40 évnél fiatalabb felhasználók száma: ".$row['COUNT(*)'];
		echo "<BR />";
	}
	
	echo "<BR />";
	echo "<HR />";

	$SelectStr = "SELECT FVaros, COUNT(*) FROM felhasznalok_tabla GROUP BY FVaros ";

	$result = mysqli_query($MySqliLink, $SelectStr) OR die(mysqli_errror($MySqliLink));

	while($row = mysqli_fetch_array($result)) {
		echo "Város: ".$row['FVaros']." - Felhasználók száma: ".$row['COUNT(*)'];
		echo "<BR />";
	}
	
	echo "<BR />";
	echo "<HR />";

	$SelectStr = "SELECT FVaros, AVG(FKor) FROM felhasznalok_tabla GROUP BY FVaros ORDER BY FVaros";

	$result = mysqli_query($MySqliLink, $SelectStr) OR die(mysqli_errror($MySqliLink));

	while($row = mysqli_fetch_array($result)) {
		echo "Város: ".$row['FVaros']." - Felhasználók átlagéletkora: ".$row['AVG(FKor)'];
		echo "<BR />";
	}
	
	echo "<BR />";
	echo "<HR />";

   ?>
 </body>
  
</html>
