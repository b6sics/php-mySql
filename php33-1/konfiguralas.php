<?php
	session_start();

	$kapcs = mysqli_connect("localhost", "root", "", "nevenincs-iskola");
	mysqli_set_charset($kapcs, "UTF8");
	if (!$kapcs){
		die("Adatbázis csatlakozási hiba: " . mysqli_connect_error());
	}

	define('GYOKER_UTVONAL', realpath(dirname((__FILE__))));
	define('ALAP_URL', 'http://localhost/php33/');
