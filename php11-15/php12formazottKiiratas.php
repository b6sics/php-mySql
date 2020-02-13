<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 12 FORMÁZOTT KIÍRATÁS</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 12 FORMÁZOTT KIÍRATÁS</h2>

<p>Printf függvény formázó karakterei<br />
A printf();
</p>
	<?php
		$v =  -123;
		printf("Float helyi beállításokkal: %%f = %f <br />", $v);
		printf("Float helyi beállítások nélkül: %%F = %F <br />", $v);
		printf("Előjeles decimális: %%d = %d <br />", $v);
		printf("Előjel nélküli decimális: %%u = %u <br />", $v);
		printf("String: %%s = %s <br />", $v);
		printf("Normál alak: %%e = %e <br />", $v);
		printf("Normál alak: %%E = %E <br />", $v);
		printf("Rögzített pontosságú, valós: %%g = %g <br />", $v);
		printf("Rögzített pontosságú, valós: %%G = %G <br />", $v);
		printf("karakter: %%c = %c <br />", -$v);

		printf("Hexadecimális: %%x = %x <br />", $v);
		printf("Hexadecimális: %%X = %X <br />", $v);
		printf("oktális: %%o = %o <br />", $v);
		$s = printf("Bináris: %%b = %b <br />",$v);
		echo "Az utolsó printf visszatérési értéke: ";
		var_dump($s);
		?>

<hr />
<p>Printf függvény kitöltő paraméter<br />
% ;
</p>
	<?php
	echo "<pre>";
	$v = 123;
	printf(" %02d <br />", $v);
	printf(" %010d <br />", $v);
	printf(" % 10d <br />", $v);
	printf(" %'x10d <br />", $v);
	printf(" %10d ,<br />", $v);
	printf(" %10s ,<br />", $v);
	printf(" %-10d ,<br />", $v);
	printf(" %-10s ,<br />", $v);
	echo "</pre>";
	?>

<hr />
<p>Printf függvény - pontosság<br />
 ;
</p>
	<?php
	echo "<pre>";
	$v = 123.456789;
	printf(" %.2f <br />", $v);
	printf(" %010.2f <br />", $v);
	printf(" % 10.2f <br />", $v);
	printf(" %'x10.2f <br />", $v);
	printf(" %10.2f ,<br />", $v);
	printf(" %-10.2f ,<br />", $v);
	printf(" %-10.2s ,<br />", $v);
	printf(" %-10.2d ,<br />", $v);
	echo "</pre>";
	?>

<hr />
<p>Printf függvény - stringek<br />
 
</p>
	<?php
	echo "<pre>";
	$v = "String";
	printf(" %s<br />", $v);
	printf(" %9s<br />", $v);
	printf(" %-9s<br />", $v);
	printf(" % 9s<br />", $v);
	printf(" %09s<br />", $v);
	printf(" %'*9s<br />", $v);
	printf(" %9.3s<br />", $v);
	echo "</pre>";
	?>

<hr />
<p>Karakterlánc formázása sprintf()-el<br />
 
</p>
	<?php
		$v =  -123;
		echo sprintf("Float helyi beállításokkal: %%f = %f <br />", $v);
		echo sprintf("Float helyi beállítások nélkül: %%F = %F <br />", $v);
		echo sprintf("Előjeles decimális: %%d = %d <br />", $v);
		echo sprintf("Előjel nélküli decimális: %%u = %u <br />", $v);
		echo sprintf("String: %%s = %s <br />", $v);
		echo sprintf("Normál alak: %%e = %e <br />", $v);
		echo sprintf("Normál alak: %%E = %E <br />", $v);
		echo sprintf("Rögzített pontosságú valós: %%g = %g <br />", $v);
		echo sprintf("Rögzített pontosságú valós: %%G = %G <br />", $v);
		echo sprintf("karakter: %%c = %c <br />", -$v);

		echo sprintf("Hexadecimális: %%x = %x <br />", $v);
		echo sprintf("Hexadecimális: %%X = %X <br />", $v);
		echo sprintf("oktális: %%o = %o <br />", $v);
		echo sprintf("binaris: %%b = %b <br />", $v);
		?>

<hr />
<p>Sprintf() és entitások<br />
 
</p>
	<?php
		$arr = array(" " => " ");

		$v = 123.456789;

	echo "<pre>";
		$s = sprintf("%010.2f<br />", $v);
		echo $s;
		
		$s = sprintf("% 10.2f<br />", $v);
		echo strtr($s,$arr);
		
		$s = sprintf("%'x10.2f<br />", $v);
		echo $s;
		
		$s = sprintf("%10.2f,<br />", $v);
		echo strtr($s,$arr);
		
		$s = sprintf("%-10.2f,<br />", $v);
		echo strtr($s,$arr);
	echo "</pre>";
		
		?>

<hr />
</body>
</html>