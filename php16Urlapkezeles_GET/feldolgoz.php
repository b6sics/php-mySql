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

<p>Űrlap feldolgozása<br />

</p>
	<?php
	$tomb = ((isset($_GET) && ($_GET == true)) ? $_GET :
			 (isset($_POST) && ($_POST == true) ? $_POST : ""));
	$sorszam = 0;
	foreach ($tomb as $urlapelem_neve => $ertek){
		$sorszam++;
		echo "A(z) $urlapelem_neve nevű $sorszam. paraméter értéke: $ertek<br />";
	}
?>
<hr />

</body>
</html>