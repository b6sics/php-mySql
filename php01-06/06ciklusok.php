<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP ciklusok</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>FOR ciklus példa 1</h2> 
<?php
    for ($i=1; $i<=3;$i++){
        echo ' $i = '.$i;
    }
?>
	<h2>FOR ciklus példa 2</h2> 
<?php
    for ($i=1; $i<3;$i++){
        echo ' $i = '.$i;
    }
?>
	<h2>FOR ciklus példa 3</h2> 
<?php
    for ($i=6; $i>3;$i--){
        echo ' $i = '.$i;
    }
?>
<h2>WHILE ciklus példa 1</h2> 
<?php
    $v = 1;
    while ($v < 5){
        echo $v;
        echo ", ";
        $v = $v +1;
    }
?>
<h2>WHILE ciklus példa 2</h2> 
<?php
    $v = 1;
    while ($v < 5){
        echo ++$v;
        echo ", ";
    }
?>
<h2>WHILE ciklus példa 3</h2> 
<?php
    $v = 1;
    while ($v < 5){
        echo $v++;
        echo ", ";
    }
?>
<h2>WHILE ciklus példa A1</h2> 
<?php
    $v = 1;
    while ($v < 5):
        echo $v;
        $v++;
    endwhile;
?>
<h2>DO WHILE ciklus példa 1</h2> 
<?php
    $v = 1;
    do {
        echo $v;
        echo ", ";
        $v = $v +1;
    } while ($v < 5)
?>
<h2>DO WHILE ciklus példa 2</h2> 
<?php
    $v = 1;
    do {
        echo ++$v;
        echo ", ";
    } while ($v < 5)
?>
<h2>DO WHILE ciklus példa 3</h2> 
<?php
    $v = 1;
    do {
        echo $v++;
        echo ", ";
   } while ($v < 5)
?>
<h2>DO WHILE ciklus példa 4</h2> 
<?php
    $v = 6;
    do {
        echo $v;
        echo ", ";
        $v = $v + 1;
   } while ($v < 5)
?>
<h2>FOREACH ciklus példa 1</h2> 
<?php
    $napok = array("H","K","Sz","Cs","P","Sz","V");
   foreach ($napok as $v) {
       echo $v.", ";
   }
?>
<h2>FOREACH ciklus példa 2</h2> 
<?php
    $arr = array(1,2,3,4);
   foreach ($arr as $v) {
       $v = $v + 1;
   }
   echo '<br />$arr[0]: '.$arr[0];
   echo '<br />$arr[1]: '.$arr[1];
   echo '<br />$arr[2]: '.$arr[2];
   echo '<br />$arr[3]: '.$arr[3];
?>
<h2>Kilépés ciklusból példa 1</h2> 
<?php
    for ($i=1; $i<=10;$i++){
        echo ' $i = '.$i;
        if ($i == 3) {break;}
    }
?>
<h2>Kilépés ciklusból példa 2</h2> 
<?php
    $i = 0;
    while (++$i){
        switch ($i){
            case 1:
            echo "Első kódblokk helye:";
            break 1;
            case 2:
            echo "Második kódblokk helye:";
            break 2;
            case 3:
            echo "Harmadik kódblokk helye:";
            break;
            default:
            break;
        }
    }
?>
<h2>Ciklusmag átugrása</h2> 
<?php
    for ($v = 1 ;$v <= 4; ++$v){
        if ($v == 2) {continue;}
        echo $v.", ";
    }
?>
</body>
</html>