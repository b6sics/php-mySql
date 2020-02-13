<!DOCTYPE html>
<html lang="hu">

<head>
	<title>PHP 13 DÁTUM ÉS IDŐ KEZELÉSE</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>PHP 13 DÁTUM ÉS IDŐ KEZELÉSE</h2>

<p>Dátum, idő lekérdezése<br />
A time()  fv.;
</p>
	<?php
        echo "Idő: ".time()."<br />";

        ?>

<hr />
<p>Időbélyeg átalakítása<br />
A date() fv.;
</p>
	<?php
        echo "Dátum: ".date("Y.m.d.")."<br />";
        echo "Idő: ".date("H.i.s.")."<br />";

        echo "o = Év (ISO-8601 szerint): ".date("o")."<br />";
        echo "Y = Év (4 számjeggyel): ".date("Y")."<br />";
        echo "y = Év (2 számjeggyel): ".date("y")."<br />";

        echo "F = Hónap (szöveggel): ".date("F")."<br />";
        echo "M = Hónap (rövidítve): ".date("M")."<br />";
        echo "m = Hónap (01-12): ".date("m")."<br />";
        echo "n = Hónap (1-12): ".date("n")."<br />";
        
        echo "d = Nap (01-31): ".date("d")."<br />";
        echo "D = Nap (3 betű): ".date("D")."<br />";
        echo "N = Nap (1=hétfő - ISO-8601): ".date("N")."<br />";
        echo "l = Nap (szöveg): ".date("l")."<br />";

        echo "g = óra (1-12): ".date("g")."<br />";
        echo "G = óra (0-23): ".date("G")."<br />";
        echo "h = óra (01-12): ".date("h")."<br />";
        echo "H = óra (00-23): ".date("H")."<br />";

        echo "i = perc (00-59): ".date("i")."<br />";
        echo "s = mp (00-59): ".date("s")."<br />";

        echo "A = AM/PM: ".date("A")."<br />";
        echo "a = am/pm: ".date("a")."<br />";

        echo "e = Időzóna: ".date("e")."<br />";
        echo "O = Eltérés GREENWICH-től: ".date("O")."<br />";
        echo "I = Idő (téli = 0, nyári = 1): ".date("I")."<br />";

        echo "W = Hét (1-52): ".date("W")."<br />";
        echo "L = Szökőév (1=igen): ".date("L")."<br />";
        
        echo "c = ISO-8601 dátum: ".date("c")."<br />";
        echo "r = RFC 2822 dátum: ".date("r")."<br />";
        echo "B = SWATCH Internet idő: ".date("B")."<br />";
        echo "T = A szerveren: ".date("T")."<br />";
        echo "Z = Időzóna lépték s-ban: ".date("Z")."<br />";
        echo "U = GMT 1970.01.01 00:00:00 óta eltelt idő s-ban: ".date("U")."<br />";
?>

<hr />
<p>Időbélyeg létrehozása<br />
A mktime() fv.;
</p>
	<?php
        echo 'date("Y.m.d.",0)   '.date("Y.m.d.",0)."<br />";
        echo 'date("H.i.s.",0)   '.date("H.i.s.",0)."<br /><br />";

        date_default_timezone_set("UTC");
        echo 'date_default_timezone_set("UTC") <br />';
        echo 'date("Y.m.d.",0)   '.date("Y.m.d.",0)."<br />";
        echo 'date("H.i.s.",0)   '.date("H.i.s.",0)."<br />
        Az időbélyeg értéke időzóna függő.<br /><br />";

        $t1 = mktime(0,0,0,1,1,1970);
        echo '$t1 = mktime(0.0.0.1.1.1970): '.$t1."<br />";
        $t2 = mktime(23,59,59,1,31,2013);
        echo '$t2 = mktime(23,59,59,1,31,2013): '.$t2."<br />";
        $dt = $t2-$t1;
        echo 'date ("Y.m.d.",$t2-$t1):  '.date ("Y.m.d.",$dt)."<br />!!!
        A két dátum különbségeként a két dátum különbségét kapjuk.<br /><br />";

        echo 'date("Y.m.d.",mktime(23,59,59,1,32,2013)):  '.
            date("Y.m.d.",mktime(23,59,59,1,32,2013))."<br />
            //PHP kezeli a hibás értékeket is.<br /><br />";

        $t1 = mktime(16,05,0);
        echo '$t1=mktime(16,05,0):  ',$t1."<br />";
        $t2 = mktime(16,06,0);
        echo '$t1=mktime(16,06,0):  ',$t2."<br />";
        $dt = $t2-$t1;
        echo 'date ("H.i.s.",$t2-$t1):  '.date ("H.i.s.",$dt)."<br />";


                
        ?>

<hr />
<p>GMT időbélyeg létrehozása<br />
A gmmktime() fv.;
</p>
	<?php
        $t1 = mktime(0,0,0,1,1,1970);
        echo '$t1=mktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = mktime(23,59,59,1,31,2013);
        echo '$t1=mktime(23,59,59,1,31,2013):  ',$t2."<br />";

        $t1 = gmmktime(0,0,0,1,1,1970);
        echo '$t1=gmmktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = gmmktime(23,59,59,1,31,2013);
        echo '$t1=gmmktime(23,59,59,1,31,2013):  ',$t2."<br />";
		
		date_default_timezone_set("UTC");
		echo '<br />date_default_timezone_set("UTC")<br />';
        $t1 = mktime(0,0,0,1,1,1970);
        echo '$t1=mktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = mktime(23,59,59,1,31,2013);
        echo '$t1=mktime(23,59,59,1,31,2013):  ',$t2."<br />";

        $t1 = gmmktime(0,0,0,1,1,1970);
        echo '$t1=gmmktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = gmmktime(23,59,59,1,31,2013);
        echo '$t1=gmmktime(23,59,59,1,31,2013):  ',$t2."<br />";

		date_default_timezone_set("America/Los_Angeles");
		echo '<br />date_default_timezone_set("America/Los_Angeles")<br />';
        $t1 = mktime(0,0,0,1,1,1970);
        echo '$t1=mktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = mktime(23,59,59,1,31,2013);
        echo '$t1=mktime(23,59,59,1,31,2013):  ',$t2."<br />";

        $t1 = gmmktime(0,0,0,1,1,1970);
        echo '$t1=gmmktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = gmmktime(23,59,59,1,31,2013);
        echo '$t1=gmmktime(23,59,59,1,31,2013):  ',$t2."<br />";

		date_default_timezone_set("Europe/Budapest");
		echo '<br />date_default_timezone_set("Europe/Budapest")<br />';
        $t1 = mktime(0,0,0,1,1,1970);
        echo '$t1=mktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = mktime(23,59,59,1,31,2013);
        echo '$t1=mktime(23,59,59,1,31,2013):  ',$t2."<br />";

        $t1 = gmmktime(0,0,0,1,1,1970);
        echo '$t1=gmmktime(0,0,0,1,1,1970):  ',$t1."<br />";
        $t2 = gmmktime(23,59,59,1,31,2013);
        echo '$t1=gmmktime(23,59,59,1,31,2013):  ',$t2."<br />";

        ?>

<hr />
<p>Dátum vizsgálata<br />
A checkdate() fv;
</p>
	<?php
		echo '<br />var_dump(checkdate(6,31,13)): ';
		var_dump(checkdate(6,31,13));
		echo '<br />var_dump(checkdate(5,31,13)): ';
		var_dump(checkdate(5,31,13));
		
		echo '<br />var_dump(checkdate(2,29,12)): ';
		var_dump(checkdate(2,29,12));
		echo '<br />var_dump(checkdate(2,29,13)): ';
		var_dump(checkdate(2,29,13));
        ?>

<hr />
</body>
</html>