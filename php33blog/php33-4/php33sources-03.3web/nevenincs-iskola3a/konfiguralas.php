<?php 
	session_start();
	// csatlakozás az adatbázishoz
	$kapcs = mysqli_connect("localhost", "nevenincs", "nevenincs", "nevenincs");
	mysqli_set_charset($kapcs,"UTF8");
	if (!$kapcs) {
		die("Adatbázis csatlakozási hiba: " . mysqli_connect_error());
	}
    // globális konstansok definiálása
	define('GYOKER_UTVONAL', realpath(dirname(__FILE__)));
	define('ALAP_URL', 'http://www.nevenincsiskola.szakdolgozat.net/nevenincs03/');
?>
