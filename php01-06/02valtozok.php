<!DOCTYPE html>
<html lang="hu">

<head>
	<title>masodik.php - Változók használata</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>Változók használata 1</h2>
    <?php	
        $a = 2;
        echo '$a = '.$a.'<br />';
        $b = 4;
        echo '$b = '.$b.'<br />';
        $a = $a + $b;
        echo '$a + $b = '.$a.'<br />';
	?>
	<h2>Változók használata 2</h2>
    <?php	
        $Szin = "zöld";
        $szin = "kék";
        echo $Szin." ".$szin.'<br />';
	?>
	<h2>Változók használata 3</h2>
    <?php	
        $pi = pi();
        echo $pi.'<br />';
	?>
	<h2>Változók használata 5</h2>
    <?php	
        $nev = -123; var_dump($nev); echo '<br />';
        $nev = "Bubu"; var_dump($nev); echo '<br />';

        $nagy_szam = 9223372036854775807;
        var_dump($nagy_szam); echo '<br />';
        $nagy_szam = $nagy_szam + 1;
        var_dump($nagy_szam); echo '<br />';

        $v = -10; var_dump($v); echo '<br />';
        $v = $v/3; var_dump($v); echo '<br />';

        $v = 1 > 4; var_dump($v); echo '<br />';
    ?>
	<h2>Változók használata 6</h2>
    <?php	
        $pi = pi();
        echo $pi.'<br />';
	?>
	<h2>Változók használata 7</h2>
    <?php	
        $varos = "Budapest";
        echo "Város: $varos ! <br />";
        echo 'Város: $varos ! <br />';
        echo 'Város: '.$varos.' ! <br />';
	?>
	<h2>Indexelt tömb</h2>
    <?php	
        $termekek[0] = "1. termék";
        $termekek[1] = "3. termék";
        $termekek[2] = "3. termék";

        echo "$termekek[0] $termekek[1] $termekek[2] <br />";

        $termekek1 = array("1. termék", "2. termék", "3. termék");
        echo "$termekek1[0] $termekek1[1] $termekek1[2] <br />";
        ?>
        <h2>Asszociatív tömb</h2>
        <?php	
            $osztaly['Niki'] = "10.A";
            $osztaly['Miki'] = "9.C";
            $osztaly['viki'] = "12.B";
    
            echo "Miki a ".$osztaly['Miki'].", osztályba jár.<br />";
        ?>
</body>
</html>