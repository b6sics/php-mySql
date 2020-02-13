<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP elágazások</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>IF utasítás példa</h2> 
<?php
    $v = 2;
    if ($v > 0) {echo $v; $v = 0;}
    if ($v > 0) {echo $v;}
?>
	<h2>IF ELSE utasítás példa</h2> 
<?php
    $v = 2;
    if ($v > 0) {echo $v; $v = 0;}
    else {echo $v; $v = 1;}
    echo ", ".$v;
?>
	<h2>IF ELSEIF utasítás példa</h2> 
<?php
    $a = 3; $b = 1;
    if ($a == $b) {echo "a=b";}
    elseif ($a > $b) {echo "a>b";}
    else {echo "a<b";}
?>
	<h2>SWITCH szerkezet példa</h2> 
<?php
    $v = 3;
    switch ($v){
        case 1:
          echo "Egy";
          break;
        case 2:
          echo "Kettő";
          break;
        case 3:
          echo "Három";
          break;
        default:
          echo "A változó értéke nem 1, 2 vagy 3";
    }
    ?>
	<h2>SWITCH szerkezet alternatív példa</h2> 
<?php
    $Naptarkell = true;
    if ($Naptarkell == true): ?>
        <div id = "naptar">Ide jön a naptár</div>
<?php endif; ?>

</body>
</html>