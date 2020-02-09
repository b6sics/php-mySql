<?php

if ($lekerdezes = mysqli_query($kapcs, "SELECT * FROM `gep`")) {
	$rekord = mysqli_fetch_assoc($lekerdezes);
	mysqli_data_seek($lekerdezes, 0);
} else {
	echo "MySqli hiba (" . mysqli_errno($kapcs) . "): " . mysqli_error($kapcs) . "<br />\n";
}

?>

<details>
	<summary>A 'gep' tábla tartalma</summary>
	<table>
		<tr>
			<th>Id</th>
			<th>Hely</th>
			<th>Tipus</th>
			<th>IP-cím</th>
		</tr>

		<?php


		while ($rekord = mysqli_fetch_array($lekerdezes)) {
			echo "  <tr>\n";
			echo "  <td>" . $rekord['id'] . "</td>\n";
			echo "  <td>" . $rekord['hely'] . "</td>\n";
			echo "  <td>" . $rekord['tipus'] . "</td>\n";
			echo "  <td>" . $rekord['ipcim'] . "</td>\n";
			echo "  </tr>\n";
		}

		?>

	</table>
</details>

<?php

if ($lekerdezes = mysqli_query($kapcs, "SELECT * FROM `szoftver`")) {
	$rekord = mysqli_fetch_assoc($lekerdezes);
	mysqli_data_seek($lekerdezes, 0);
} else {
	echo "MySqli hiba (" . mysqli_errno($kapcs) . "): " . mysqli_error($kapcs) . "<br />\n";
}

?>

<details>
	<summary>A 'szofver' tábla tartalma</summary>
	<table>
		<tr>
			<th>Id</th>
			<th>Név</th>
			<th>Kategória</th>
		</tr>

		<?php


		while ($rekord = mysqli_fetch_array($lekerdezes)) {
			echo "  <tr>\n";
			echo "  <td>" . $rekord['id'] . "</td>\n";
			echo "  <td>" . $rekord['nev'] . "</td>\n";
			echo "  <td>" . $rekord['kategoria'] . "</td>\n";
			echo "  </tr>\n";
		}

		?>

	</table>
</details>

<?php

if ($lekerdezes = mysqli_query($kapcs, "SELECT * FROM `telepites`")) {
	$rekord = mysqli_fetch_assoc($lekerdezes);
	mysqli_data_seek($lekerdezes, 0);
} else {
	echo "MySqli hiba (" . mysqli_errno($kapcs) . "): " . mysqli_error($kapcs) . "<br />\n";
}

?>

<details>
	<summary>A 'telepites' tábla tartalma</summary>
	<table>
		<tr>
			<th>Id</th>
			<th>Gép Id</th>
			<th>Szoftver Id</th>
			<th>Verzió</th>
			<th>Dátum</th>
		</tr>

		<?php


		while ($rekord = mysqli_fetch_array($lekerdezes)) {
			echo "  <tr>\n";
			echo "  <td>" . $rekord['id'] . "</td>\n";
			echo "  <td>" . $rekord['gepid'] . "</td>\n";
			echo "  <td>" . $rekord['szoftverid'] . "</td>\n";
			echo "  <td>" . $rekord['verzio'] . "</td>\n";
			echo "  <td>" . $rekord['datum'] . "</td>\n";
			echo "  </tr>\n";
		}

		?>

	</table>
</details>

<button onclick="window.location.href = 'php32Szoftverleltar.php';">Vissza</button>
