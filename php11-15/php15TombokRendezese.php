<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 15 TÖMBÖK RENDEZÉSE</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 15 TÖMBÖK RENDEZÉSE</h2>

<p>Sort függvény használata<br />
A sort(), a rsort() fv.-ek;<br />
SORT_REGULAR - szokásos módon hasonlít össze<br />
SORT_NUMERIC- számként hasonlít össze<br />
SORT_STRING - szövegként hasonlít össze<br />
SORT_LOCALE_STRING - helyi rendező algoritmus használata<br />
SORT_NATURAL - természetes rendezés<br />
</p>
	<?php
	$szam = array(
		32,
		6,
		43,
		98,
		8,
		-5,
		123,
		9,
		0);
	$angolABC = array(
		"Aladar",
		"Adel",
		"Abigel",
		"Adam",
		"Abel",
		"Agnes",
		"Bandi",
		"Balint",
		"Beno");
	$ekezetes = array(
		"Aladár",
		"Adél",
		"Abigél",
		"Ádám",
		"Ábel",
		"Ágnes",
		"Bandi",
		"Bálint",
		"Benő");
	
	echo "<h3>Rendezés előtt</h3>";
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($angolABC as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo "<h3>sort() után</h3>";
	sort($szam); sort($angolABC); sort($ekezetes);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($angolABC as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo "<h3>rsort() után</h3>";
	rsort($szam); rsort($angolABC); rsort($ekezetes);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($angolABC as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";

	$szam = array(
		"32",
		"06",
		"43",
		98,
		2,
		"5",
		"123",
		9,
		0);
		
	echo "<h3>Rendezés előtt</h3>";
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo '<h3>sort($szam, SORT_REGULAR); után</h3>';
	sort($szam, SORT_REGULAR);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo '<h3>sort($szam, SORT_NUMERIC); után</h3>';
	sort($szam, SORT_NUMERIC);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo '<h3>sort($szam, SORT_STRING); után</h3>';
	sort($szam, SORT_STRING);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	$szam = array(
		32,
		06,
		43,
		98,
		"2",
		"5x",
		"123",
		"9",
		"0");
		
	echo "<h3>Rendezés előtt</h3>";
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo '<h3>sort($szam, SORT_REGULAR); után</h3>';
	sort($szam, SORT_REGULAR);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo '<h3>sort($szam, SORT_NUMERIC); után</h3>';
	sort($szam, SORT_NUMERIC);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo '<h3>sort($szam, SORT_STRING); után</h3>';
	sort($szam, SORT_STRING);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";

	$szam = array(
		"32",
		"06",
		"43",
		98,
		2,
		"5",
		"123",
		"9",
		"0");
		
	echo "<h3>Rendezés előtt</h3>";
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	print_r($szam);

	echo '<h3>sort($szam, SORT_REGULAR); után</h3>';
	sort($szam, SORT_REGULAR);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	print_r($szam);

?>

<hr />
<p>Az asort függvény használata<br />
Az asort(), az arsort() fv.-ek;
</p>
	<?php
	$suly=array(
		"Aladar" => "74 kg", 
		"Blanka" => "65 kg", 
		"Klotild" => "91 kg", 
		"Adel" => "112 kg",
		"Abigel" => "48 kg");
	
	echo "<h3>Rendezés előtt</h3>";
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	print_r($suly);

	echo '<h3>asort($szam, SORT_NUMERIC); után</h3>';
	asort($suly, SORT_NUMERIC);
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	print_r($suly);

	echo '<h3>arsort($szam, SORT_NUMERIC); után</h3>';
	arsort($suly, SORT_NUMERIC);
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	print_r($suly);

	$szam = array(
		32,
		6,
		43,
		98,
		8,
		-5,
		123,
		9,
		0);
	$angolABC = array(
		"Aladar",
		"Adel",
		"Abigel",
		"Adam",
		"Abel",
		"Agnes",
		"Bandi",
		"Balint",
		"Beno");
	$ekezetes = array(
		"Aladár",
		"Adél",
		"Abigél",
		"Ádám",
		"Ábel",
		"Ágnes",
		"Bandi",
		"Bálint",
		"Benő");
	
	echo "<h3>Rendezés előtt</h3>";
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($angolABC as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo "<h3>asort() után</h3>";
	asort($szam); asort($angolABC); asort($ekezetes);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($angolABC as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo "<h3>arsort() után</h3>";
	arsort($szam); arsort($angolABC); arsort($ekezetes);
	foreach ($szam as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($angolABC as $value){
		echo " $value, ";
	}
	echo "<br />";
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";

?>

<hr />
<p>A ksort függvény használata<br />
A ksort(), a krsort() fv.-ek;
</p>
	<?php
	$suly=array(
		"Aladar" => "74 kg", 
		"Blanka" => "65 kg", 
		"Klotild" => "91 kg", 
		"Adel" => "112 kg",
		"Abigel" => "48 kg");
	
	echo "<h3>Rendezés előtt</h3>";
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	print_r($suly);

	echo '<h3>ksort($suly, SORT_STRING); után</h3>';
	ksort($suly, SORT_STRING);
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	print_r($suly);

	echo '<h3>krsort($suly, SORT_STRING); után</h3>';
	krsort($suly, SORT_STRING);
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	print_r($suly);

?>

<hr />
<p>Magyar ABC szerinti rendezés<br />
Az uasort() fv.;
</p>
	<?php
	$ekezetes = array(
		"Aladár",
		"Adél",
		"Abigél",
		"Ádám",
		"Ábel",
		"Ágnes",
		"Bandi",
		"Bálint",
		"Benő");
	
	echo "<h3>Rendezés előtt</h3>";
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";

	echo "<h3>asort() után</h3>";
	asort($ekezetes);
	foreach ($ekezetes as $value){
		echo " $value, ";
	}
	echo "<br />";
	
function Hcmp($a, $b){
	static $Hchr = array('á'=>'az', 'é'=>'ez', 'í'=>'iz', 'ó'=>'oz', 'ö'=>'ozz', 'ő'=>'ozz', 'ú'=>'uz', 'ü'=>'uzz', 'ű'=>'uzz', 'cs'=>'cz', 'zs'=>'zz', 
	'ccs'=>'czcz', 'ggy'=>'gzgz', 'lly'=>'lzlz', 'nny'=>'nznz', 'ssz'=>'szsz', 'tty'=>'tztz', 'zzs'=>'zzzz', 'Á'=>'az', 'É'=>'ez', 'Í'=>'iz', 
	'Ó'=>'oz', 'Ö'=>'ozz', 'Ő'=>'ozz', 'Ú'=>'uz', 'Ü'=>'uzz', 'Ű'=>'uzz', 'CS'=>'cz', 'ZZ'=>'zz', 'CCS'=>'czcz', 'GGY'=>'gzgz', 'LLY'=>'lzlz', 
	'NNY'=>'nznz', 'SSZ'=>'szsz', 'TTY'=>'tztz', 'ZZS'=>'zzzz');  
	$a = strtr($a,$Hchr);   $b = strtr($b,$Hchr);
	$a=strtolower($a); $b=strtolower($b);
	return strcmp($a, $b);
	}

uasort($ekezetes, 'Hcmp');  
echo "<h3>uasort() után</h3>";
	foreach ($ekezetes as  $value) {
		echo " $value, ";
	} 
	echo"<br>";

?>

<hr />
<p>Tömbelemek keverése<br />
A shuffle() fv.;
</p>
	<?php
	$Szam=array(
		"32",
		"06", 
		"43", 
		98, 
		2, 
		"5",
		"123",
		9,
		0);
		
	echo "<h3>Rendezés előtt</h3>";
	foreach ($Szam as  $value) {
		echo " $value, ";
	} 
	echo"<br>";
	print_r($Szam);
	
	echo '<h3>shuffle($Szam);</h3>';
	shuffle($Szam); 
	foreach ($Szam as  $value) {
		echo " $value, ";
	} 
	echo"<br>";
	print_r($Szam);

?>

<hr />
</body>
</html>