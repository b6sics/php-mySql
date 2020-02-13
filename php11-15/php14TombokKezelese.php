<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 14 TÖMBÖK KEZELÉSE</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 14 TÖMBÖK KEZELÉSE</h2>

<p>Indexelt tömb létrehozása<br />
 
</p>
	<?php
	$TermekNev1=array(
		"vadalma", 
		"vadkörte", 
		"Vilmos körte", 
		"Ceglédi óriás kajszi",
		"Ligeti óriás kajszibarack");
	print_r($TermekNev1);
	echo "<br />";

	$TermekNev2[]="vadalma";
	$TermekNev2[]="vadkörte"; 
	$TermekNev2[]="Vilmos körte"; 
	$TermekNev2[]="Ceglédi óriás kajszi";
	$TermekNev2[]="Ligeti óriás kajszibarack";
	print_r($TermekNev2);
	echo "<br />";

	$TermekNev3[0]="vadalma";
	$TermekNev3[1]="vadkörte"; 
	$TermekNev3[2]="Vilmos körte"; 
	$TermekNev3[3]="Ceglédi óriás kajszi";
	$TermekNev3[4]="Ligeti óriás kajszibarack";
	print_r($TermekNev3);
	echo "<br />";
?>

<hr />
<p>Tömbelemek száma<br />
A Count() fv.;
</p>
	<?php
	$TermekNev=array(
		"vadalma", 
		"vadkörte", 
		"Vilmos körte", 
		"Ceglédi óriás kajszi",
		"Ligeti óriás kajszibarack");
	echo "<h3>A tömbelemek száma: ".count($TermekNev)." db.</h3>";
?>

<hr />
<p>Több dimenziós tömb létrehozása<br />

</p>
	<?php
	echo "<h3>A termékek nevei és árai külön tömbben:</h3>";
	$TermekNev=array(
		"vadalma", 
		"vadkörte", 
		"Vilmos körte", 
		"Ceglédi óriás kajszi",
		"Ligeti óriás kajszibarack");
	$EgysegAr=array(
		125.4, 
		873, 
		44, 
		99.9,
		132);
	print_r($TermekNev);
	echo "<br />";
	print_r($EgysegAr);
	echo "<br /><br />";

	echo "<h3>A termékek nevei és árai több dimenziós tömbben:</h3>";
	$Termek[0][0]="vadalma";
	$Termek[0][1]=125.4;
	$Termek[1][0]="vadkörte"; 
	$Termek[1][1]=873;
	$Termek[2][0]="Vilmos körte"; 
	$Termek[2][1]=44;
	$Termek[3][0]="Ceglédi óriás kajszi";
	$Termek[3][1]=99;
	$Termek[4][0]="L.9igeti óriás kajszibarack";
	$Termek[4][1]=132;
	print_r($Termek);
	echo "<br /><br />";
	
	for ($ii = 0; $ii < count($Termek); $ii++){
		echo $Termek[$ii][0]." = ".$Termek[$ii][1]." Ft<br />";
	}
?>

<hr />
<p>Több dimenziós tömb bejárása<br />

</p>
	<?php
	echo "<h3>Több dimenziós tömb bejárása - foreach</h3>";
	$Termek[0][0]="vadalma";
	$Termek[0][1]=125.4;
	$Termek[1][0]="vadkörte"; 
	$Termek[1][1]=873;
	$Termek[2][0]="Vilmos körte"; 
	$Termek[2][1]=44;
	$Termek[3][0]="Ceglédi óriás kajszi";
	$Termek[3][1]=99;
	$Termek[4][0]="L.9igeti óriás kajszibarack";
	$Termek[4][1]=132;

	foreach ($Termek as $key => $value){
		echo "Kulcs(Key): $key => Étrék(Value): ".gettype($value)."<br />";
		foreach ($value as $key1 => $value1){
			echo "Kulcs1: $key1 => Érték1: $value1<br />";
		}
	}
	echo "<br /><br />";
?>

<hr />
<p>Asszociatív tömb létrehozása<br />

</p>
	<?php
	echo "<h3>A termékek nevei és árai egy asszociativ tömbben:</h3>";
	$Termek=array(
		"vadalma" => 125.4, 
		"vadkörte" => 873, 
		"Vilmos körte" => 44, 
		"Ceglédi óriás kajszi" => 99.9,
		"Ligeti óriás kajszibarack" => 132);
	print_r($Termek);
	echo "<br />";
	
	echo "<h3>A tömb bejárása - foreach</h3>";
	foreach ($Termek as $key => $value){
		echo "Kulcs: $key => Érték: $value<br />";
	}

?>

<hr />
<p>Tömbelemek keresése<br />
Az array_search(), az in_array(), array_key_exists() fv.-ek;
</p>
	<?php
	$suly=array(
		"Aladar" => "74 kg", 
		"Blanka" => "65 kg", 
		"Klotild" => "91 kg", 
		"Adel" => "112 kg",
		"Abigel" => "48 kg");
	
	echo "<h3>A tömb bejárása - foreach</h3>";
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	
	if (array_key_exists('Aladar',$suly)){
		echo "'Aladar' egy létező kulcs <br />";
	}

	if (in_array('65 kg',$suly)){
		echo "'65 kg' egy létező érték <br />";
	}
	
	echo "A '65 kg'-os versenyzo tömbindexe: ".array_search('65 kg', $suly)."<br />";

?>

<hr />
<p>Összes tömbelem módosítása<br />
Az array_map() fv.;
</p>
	<?php
	$suly=array(
		"Aladar" => "74", 
		"Blanka" => "65", 
		"Klotild" => "91", 
		"Adel" => "112",
		"Abigel" => "48");
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	
	function Plusz($ertek){
		return $ertek + 0.3;
	}
	
	$suly = array_map('Plusz', $suly);
	
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
		
?>

<hr />
<p>Tömbelemek szűrése<br />
Az array_filter() fv.;
</p>
	<?php
	$suly=array(
		"Aladar" => "74", 
		"Blanka" => "65", 
		"Klotild" => "91", 
		"Adel" => "112",
		"Abigel" => "48");
	foreach ($suly as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";
	
	function Paratlan($ertek){
		return $ertek & 1;
	}

	function Paros($ertek){
		return !($ertek & 1);
	}
	
	$suly1 = array_filter( $suly, 'Paros');
	foreach ($suly1 as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";

	$suly2 = array_filter( $suly, 'Paratlan');
	foreach ($suly2 as $key => $value){
		echo "$key : $value; ";
	}
	echo "<br />";


?>

<hr />
</body>
</html>