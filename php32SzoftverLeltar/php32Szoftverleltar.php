<!DOCTYPE html>
<html lang=hu>

<head>
	<meta charset="UTF-8">
	<title>Szoftverleltár</title>
	<link rel="stylesheet" type="text/css" href="szoftverleltar.css" />
</head>

<body>
	<?php
	$kapcs = mysqli_connect("localhost", "root", "", "szoftverleltar");
	mysqli_set_charset($kapcs, "UTF8");
	mysqli_select_db($kapcs, "szoftverleltar");

	if (isset($_GET['megnez'])) {
		include "php32b_megnez.php";
	} elseif (isset($_GET['felvesz'])) {

		if (
			!empty($_GET['gep_hely']) &&
			!empty($_GET['gep_tipus']) &&
			!empty($_GET['gep_ip'])
		) {
			include "php32c1gep_felvesz.php";
		} else {
			include "php32c1_nodata.htm";
		}

		if (
			!empty($_GET['szoftver_id']) &&
			!empty($_GET['szoftver_nev']) &&
			!empty($_GET['szoftver_kategoria'])
		) {
			include "php32c2szoftver_felvesz.php";
		} else {
			include "php32c2_nodata.htm";
		}

		if (
			!empty($_GET['telepites_gepid']) &&
			!empty($_GET['telepites_szoftverid']) &&
			!empty($_GET['telepites_verzio']) &&
			!empty($_GET['telepites_datum'])
		) {
			include "php32c3telepites_felvesz.php";
		} else {
			include "php32c3_nodata.htm";
		}
		include "php32b_megnez.php";
	} elseif (isset($_GET['torol'])) {
		include "php32d1gep_torol.php";
		include "php32d2szoftver_torol.php";
		include "php32d3telepites_torol.php";
		include "php32b_megnez.php";
	} else {

		include "php32a_input_form.htm";
	}

	mysqli_close($kapcs);
	?>
</body>

</html>