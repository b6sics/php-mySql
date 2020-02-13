<!DOCTYPE html>
<html lang="hu">

<head>
	<title>11 részkarakterláncok</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 11 RÉSZKARAKTERLÁNC KEZELÉS</h2>

<p>Részkarakterlánc keresése<br />
strpos() és a stripos(), valamint strrpos() és strripos();
</p>
	<?php
		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";

		echo var_dump(strpos($s,"ál")). '/ strpos($s,"ál")<br />';
		echo var_dump(strrpos($s,"ál")). '/ strrpos($s,"ál")<br />';
		echo var_dump(stripos($s,"ál")). '/ stripos($s,"ál")<br />';
		echo var_dump(strripos($s,"ál")). '/ strripos($s,"ál")<br />';
		echo var_dump(strpos($s,"ál",11)). '/ strpos($s,"ál",11)<br />';
		echo var_dump(strrpos($s,"ál",11)). '/ stripos($s,"ál",11)<br />';
		echo var_dump(stripos($s,"ál",11)). '/ stripos($s,"ál",11)<br />';
		echo var_dump(strripos($s,"ál",11)). '/ strripos($s,"ál",11)<br />';
		echo var_dump(strpos($s,"ál",17)). '/ strpos($s,"ál",17)<br />';
		echo var_dump(strrpos($s,"ál",17)). '/ stripos($s,"ál",17)<br />';
		echo var_dump(stripos($s,"ál",17)). '/ strrpos($s,"ál",17)<br />';
		echo var_dump(strripos($s,"ál",17)). '/ strripos($s,"ál",17)<br />';
    ?>

<hr />
<p>Részkarakterláncok megszámlálása<br />
substr_count() ;
</p>
	<?php
		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";

		echo substr_count($s,"ál")."<br />";
		echo substr_count($s,"ál",12)."<br />";
		echo substr_count($s,"l")."<br />";
		echo substr_count($s,"l",6)."<br />";

		?>

<hr />
<p>Részkarakterlánc kiolvasása<br />
A substr() ;
</p>
	<?php
		$s = "A felhasználó által beírt szöveg!";
		echo "A szöveg: $s <br />";

		echo var_dump(substr($s,5)). '/ substr($s,5)<br />';
		echo var_dump(substr($s,15)). '/ substr($s,15)<br />';
		echo var_dump(substr($s,5,10)). '/ substr($s,5,10)<br />';
		?>

<hr />
<p>Részkarakterlánc cseréje<br />
A substr_replace() ;
</p>
	<?php
		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";

		echo substr_replace($s,"adatai",16). '<br />';
		echo substr_replace($s,"adatai",-23). '<br />';
		echo substr_replace($s,"adatai",16,16). '<br />';
		echo substr_replace($s,"adatai",16,-17). '<br />';
		?>

<hr />
<p>Karakterek cseréje<br />
A strtr() ;
</p>
	<?php
		$s = "'szöveg'/'szöveg'/";
		echo "Átalakítás előtt: $s <br />";

		$s = strtr($s,"/'",'\"');
		echo "Átalakítás után: $s <br />";
		?>

<hr />
<p>Szövegelemek cseréje<br />
A strtr() ;
</p>
	<?php
		$arr = array("Isztambul" => "Ankara", "Wien" => "Bécs");
		$s = "Budapest, Prága, Pozsony, Isztambul, Wien";
		echo "Átalakítás előtt: $s <br />";
		$s = strtr($s,$arr);
		echo "Átalakítás után: $s <br />";
		?>

<hr />
</body>
</html>
