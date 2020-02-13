<!DOCTYPE html>
<html lang="hu">

<head>
	<title>Konstansok használata</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
	<h2>Konstansok használata 01</h2>
<?php
    define("CEG", "Nagyon hosszú nevű ... Kft. ", TRUE);
    echo CEG;
    echo '<br />';
    echo ceg;
    echo '<br />';
    echo PHP_VERSION;
    echo '<br />';
    echo __FILE__;
    echo '<br />';
    echo __LINE__;
    echo '<br />';
    echo __DIR__;
    echo '<br />';
?>
</body>
</html>