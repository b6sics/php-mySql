<!DOCTYPE html>
<html lang=hu>

<head>
	<meta charset="UTF-8">
	<title>Országok autói</title>
</head>

<body>
	<?php
		$kapcs=mysqli_connect("localhost","root","","orszagokautoi");
		mysqli_set_charset($kapcs,"UTF8");
		mysqli_select_db($kapcs,"orszagokautoi");
		
		if (!isset($_GET['elkuld'])){
			echo " <form name='urlap' action='php31.php' method='GET'> \n";
			echo "   <fieldset>\n";
			echo "      <legend>Országok autói</legend>\n";
			echo "      <p><label for='orszag'>Ország: </label>\n";
			echo "      <select name='orszag'>\n";
			echo " 		  <option></option>\n";
			echo " 		  <option value='amerikai'>amerikai</option>\n";
			echo " 		  <option value='angol'>angol</option>\n";
			echo " 		  <option value='francia'>francia</option>\n";
			echo " 		  <option value='japán'>japán</option>\n";
			echo " 		  <option value='lengyel'>lengyel</option>\n";
			echo " 		  <option value='német'>német</option>\n";
			echo " 		  <option value='olasz'>olasz</option>\n";
			echo " 		  <option value='orosz'>orosz</option>\n";
			echo " 		  <option value='román'>román</option>\n";
			echo " 		  <option value='spanyol'>spanyol</option>\n";
			echo " 		  <option value='svéd'>svéd</option>\n";
			echo " 		  <option value='szerb'>szerb</option>\n";
			echo "      </select></p>\n";
			echo " 		<input type='submit' name='elkuld' value='Elküld'>\n";
			echo "   </fieldset>\n";
			echo " </form>\n";
		}
		
		if (!isset($_GET['elkuld'])){
			echo " <form name='urlap' action='php31.php' method='GET'> \n";
			echo "   <fieldset>\n";
			echo "      <legend>Országok autói</legend>\n";
			echo "      <p><label for='orszag'>Ország: </label>\n";
			echo "      <select name='orszag'>\n";
			echo " 		  <option></option>\n";

			$lekerdezes=mysqli_query($kapcs,"SELECT DISTINCT orszag FROM kocsi");
			while ($rekord=mysqli_fetch_row($lekerdezes))
					echo " 		  <option value=$rekord[0]>$rekord[0]</option>\n";

			echo "      </select></p>\n";
			echo " 		<input type='submit' name='elkuld' value='Elküld'>\n";
			echo "   </fieldset>\n";
			echo " </form>\n";
		
		} else {
			if(isset($_GET['orszag']) && !empty($_GET['orszag'])) {
				$orszag = $_GET['orszag'];
				if ($lekerdezes=mysqli_query($kapcs,"SELECT id, auto FROM kocsi WHERE orszag='$orszag'")){
					echo "  <h2>".ucfirst($orszag)." autók:</h2>\n";
					$rekord=mysqli_fetch_assoc($lekerdezes);
					echo "  <ol start=".$rekord['id'].">\n";
					mysqli_data_seek($lekerdezes,0);
					while ($rekord=mysqli_fetch_array($lekerdezes))
						echo "  <li>".$rekord['auto']."</li>\n";
					echo "  </ol>\n";
				} else {
					echo "MySqli hiba (".mysqli_errno($kapcs)."): ".mysqli_error($kapcs)."<br />\n";
				}
			} else {
				echo "Nem választottál ki országot!";
			}
		}
		mysqli_close($kapcs);
		?>
</body>
</html>