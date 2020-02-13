<!DOCTYPE html>
<html lang="hu">

<head>
	<title>függvények 9</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>Függvények 9</h2>
<p>Karakterláncok kiíratása<br />
	echo, echo(), print, print();
</p>
	<?php
		echo "ez egy sztring <br />";
		echo ("ez egy sztring <br />");
		$s = "ez egy sztring <br />";
		$s1 = "Itt ";
		echo "Itt ".$s;
		echo ($s1.$s);
		print $s;
		print ($s);
    ?>

<p>Kisbetű – nagybetű átalakítások<br />
	strtoupper(), strtolower(), ucfirst(), lcfirst();
</p>
	<?php
		$s = "A FELHASZNÁLÓ által beírt szöveg!   ";
		echo "A szöveg: $s <br />";
		
		echo "strtoupper(): ";
		echo strtoupper($s)."<br />";
		echo "strtolower(): ";
		echo strtolower($s)."<br />";
		echo "ucfirst(): ";
		echo ucfirst($s)."<br />";
		echo "lcfirst(): ";
		echo lcfirst($s)."<br />";
	?>

<p>A karakterlánc hossza<br />
	strlen();
</p>
	<?php
		$s = "A <b>felhasználó</b> által beírt szöveg! ";
		echo "A szöveg: $s <br />";
		echo "A szöveg hossza: ";
		echo strlen($s)."<br />";

		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";
		echo "A szöveg hossza: ";
		echo strlen($s)."<br />";
    ?>

<p>ASCII kód karakterré alakítása<br />
	chr();
</p>
	<?php
		$s = "String";
		echo chr(64)."<br />";
		echo chr(0x40)."<br />";
		
		for($ii=65;$ii<=90;$ii++){
			echo $ii."=".chr($ii).";";
		}
    ?>

<p>Karakter ASCII kóddá alakítása<br />
ord();
</p>
	<?php
		$s = "String";
		echo ord('S')."<br />";
		echo ord($s)."<br />";
		echo ord('r')."<br />";
		echo ord($s[2])."<br />";
		
		for($ii=0;$ii<strlen($s);$ii++){
			echo "<br />".$s[$ii]."=".ord($s[$ii]).";";
		}
    ?>

<p>Karakterlánc darabolása<br />
strtok();
</p>
	<?php
		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";

		$darabol = strtok($s, " ");
		
		while ($darabol != false){
			echo "$darabol<br />";
			$darabol = strtok(" ");
		}
		
		$s = "A;felhasználó;által;beírt;szöveg! ";
		echo "A szöveg: $s <br />";

		$darabol = strtok($s, ";");
		
		while ($darabol != false){
			echo "$darabol<br />";
			$darabol = strtok(";");
		}
    ?>

<p>Karakterláncból tömb<br />
explode();
</p>
	<?php
		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";

		$tomb = explode(" ", $s);
		print_r($tomb);
    ?>

</body>
</html>