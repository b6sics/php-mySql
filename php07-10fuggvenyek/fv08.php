<!DOCTYPE html>
<html lang="hu">

<head>
	<title>függvények 8</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>Függvények 8</h2>
<p>Abszolút érték<br />
abs(x), settype ($v,"integer"), settype ($v,"float");
</p>
	<?php
        var_dump(abs(12.3)); echo "<br />";
        var_dump(abs(-123)); echo "<br /><br />";
        
        $v = 123;
        settype ($v,"integer");
        var_dump(abs($v)); echo "<br />";
        settype ($v,"float");
        var_dump(abs($v)); echo "<br /><br />";
    ?>

<p>Kerekítés<br />
ceil(x), floor(x), round(x), round(x, tizedesjegyek_száma);
</p>
    <?php
        $v1 = 123.456789;
        $v2 = 9.87654321;

        echo "ceil($v1) = ".ceil($v1)."<br />";
        echo "ceil($v2) = ".ceil($v2)."<br />";

        echo "floor($v1) = ".floor($v1)."<br />";
        echo "floor($v2) = ".floor($v2)."<br />";

        echo "round($v1) = ".round($v1)."<br />";
        echo "round($v2) = ".round($v2)."<br />";

        echo "round($v1, 2) = ".round($v1, 2)."<br />";
        echo "round($v2, 2) = ".round($v2, 2)."<br /><br />";
        ?>

<p>Hatványozás<br />
pow(alap,hatványkitevő);
</p>
    <?php
        echo ' <b> pow(10,2): </b><br />';
        var_dump(pow(10,2));
        echo ' <br /><b> pow(2,8): </b><br />';
        var_dump(pow(2,8));
        echo ' <br /><b> pow(3.333,8): </b><br />';
        var_dump(pow(3.333,8));
        echo ' <br /><b> pow(-2,8): </b><br />';
        var_dump(pow(-2,8));
        echo ' <br /><b> pow(2,-8): </b><br />';
        var_dump(pow(3,-8));
        echo ' <br /><br />';
        ?>

<p>Gyökvonás<br />
sqrt(x):
</p>
    <?php
        echo ' <b> sqrt(8): </b><br />';
        var_dump(sqrt(8));
        echo ' <br /><b> sqrt(64): </b><br />';
        var_dump(sqrt(64));
        echo ' <br /><b> sqrt(0.64): </b><br />';
        var_dump(sqrt(0.64));
        echo ' <br /><b> sqrt-(0.64): </b><br />';
        var_dump(sqrt(-0.64));
        echo ' <br /><br />';
        ?>

<p>Véletlen számok<br />
srand(), rand(), rand(minimálisértéke, maximálisértéke);
</p>
    <?php
        srand();
        echo "Véletlen szám maximálisértéke: ".getrandmax().' <br />';
        echo "Véletlen szám: ".rand().' <br />';

        echo "Véletlen szám: ".rand(10,55).' <br />';
        echo "Véletlen szám: ".rand(5,10).' <br /><br />';       
        ?>

<p>Maximum kiválasztása<br />
max(x,y, ..z);
</p>
    <?php
        echo "<b>max(3,4)</b><br />";
        var_dump(max(3,4)); echo ' <br />';
        echo "<b>max(3,-4)</b><br />";
        var_dump(max(3,-4)); echo ' <br />';
        echo "<b>max(3.333,3.334)</b><br />";
        var_dump(max(3.333,3.334)); echo ' <br />';
        echo "<b>max(3,4,6,9,1,0.2)</b><br />";
        var_dump(max(3,4,6,9,1,0.2)); echo ' <br /><br />';
    ?>

<p>Minimum kiválasztása<br />
min(x,y, ..z);
</p>
    <?php
        echo "<b>min(3,4)</b><br />";
        var_dump(min(3,4)); echo ' <br />';
        echo "<b>min(3,-4)</b><br />";
        var_dump(min(3,-4)); echo ' <br />';
        echo "<b>min(3.333,3.334)</b><br />";
        var_dump(min(3.333,3.334)); echo ' <br />';
        echo "<b>min(3,4,6,9,1,0.2)</b><br />";
        var_dump(min(3,4,6,9,1,0.2)); echo ' <br />';
    ?>
</body>
</html>