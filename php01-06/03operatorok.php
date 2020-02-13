<!DOCTYPE html>
<html lang="hu">

<head>
	<title>harmadik.php - Operátotok</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>Aritmetikai operátorok</h2>
<pre><code><?php	
    $a = 10 + 5; echo "$a = 10 + 5; <br />";
    $a = 5 - 2; echo "$a = 5 - 2; <br />";
    $a = 5 * 2 ; echo "$a = 5 * 2; <br />";
    $a = 15 / 5; echo "$a = 15 / 5; <br />";
    $a = 10 % 7; echo "$a = 10 % 7; <br />";
    $a = -2; echo "$a = -2; <br />";
    $a = 'Ez'.'Az'; echo "$a = 'Ez'.'Az'; <br />";       
   ?>
</code></pre>
<h2>Értékadó operátorok</h2>
<pre><code><?php	
    $b = 11; echo "$b = 11; <br />";
    $a = $b; echo '$a = $b; // $a = '.$a.' <br />';
    $a += $b; echo '$a += $b; // $a = '.$a.' <br />';
    $a -= $b; echo '$a -= $b; // $a = '.$a.' <br />';
    $a *= $b; echo '$a *= $b; // $a = '.$a.' <br />';
    $a /= $b; echo '$a /= $b; // $a = '.$a.' <br />';
    $a %= 3; echo '$a %= 3; // $a = '.$a.' <br />';
    $a = 'szám:';
    $a .= $b; echo '$a = "szám:"; $a .= $b // $a = '.$a.' <br />';
?>
</code></pre>
<h2>Összehasonlító operátorok</h2>
<pre><code><?php
    echo '<b>$a = 3 $b = "3"; </b><br />';
    $a = 3; $b = "3"; echo '$a===$b  '; var_dump($a===$b);
    $a = 3; $b = "3"; echo '$a==$b  '; var_dump($a==$b);
    $a = 3; $b = "3"; echo '$a > $b  '; var_dump($a>$b);
    $a = 3; $b = "3"; echo '$a < $b  '; var_dump($a<$b);
    $a = 3; $b = "3"; echo '$a >= $b  '; var_dump($a>=$b);
    $a = 3; $b = "3"; echo '$a <= $b  '; var_dump($a<=$b);
    $a = 3; $b = "3"; echo '$a!=$b  '; var_dump($a!=$b);
    echo '<b>$a = "Jóska" $b = "Pista"; </b><br />';
    $a = "Jóska"; $b = "Pista"; echo '$a===$b  '; var_dump($a===$b);
    $a = "Jóska"; $b = "Pista"; echo '$a==$b  '; var_dump($a==$b);
    $a = "Jóska"; $b = "Pista"; echo '$a > $b  '; var_dump($a>$b);
    $a = "Jóska"; $b = "Pista"; echo '$a < $b  '; var_dump($a<$b);
    $a = "Jóska"; $b = "Pista"; echo '$a >= $b  '; var_dump($a>=$b);
    $a = "Jóska"; $b = "Pista"; echo '$a <= $b  '; var_dump($a<=$b);
    $a = "Jóska"; $b = "Pista"; echo '$a!=$b  '; var_dump($a!=$b);
?>
</code></pre>
<h2>növelő csökkentő operátorok</h2>
<pre><code><?php	
    $a = 8; echo '$a = 8; echo ++$a; >> '.++$a.'<br />';
    echo '$a >> '.$a.'<br />';
    $a = 8; echo '$a = 8; echo $a++; >> '.$a++.'<br />';
    echo '$a >> '.$a.'<br />';
    $a = 8; echo '$a = 8; echo --$a; >> '.--$a.'<br />';
    echo '$a >> '.$a.'<br />';
    $a = 8; echo '$a = 8; echo $a--; >> '.$a--.'<br />';
    echo '$a >> '.$a.'<br />';
?>
</code></pre>
<h2>Logikai operátorok</h2>
<pre><code><?php	
    echo '<b>$a and $b </b><br />';
    $y = (false and false); echo "false and false ="; var_dump($y); 
    $y = (false and true); echo "false and true ="; var_dump($y); 
    $y = (true and false); echo "true and false ="; var_dump($y); 
    $y = (true and true); echo "true and true ="; var_dump($y); 
    echo '<b>$a or $b </b><br />';
    $y = (false or false); echo "false or false ="; var_dump($y); 
    $y = (false or true); echo "false or true ="; var_dump($y); 
    $y = (true or false); echo "true or false ="; var_dump($y); 
    $y = (true or true); echo "true or true ="; var_dump($y); 
    echo '<b>$a xor $b </b><br />';
    $y = (false xor false); echo "false xor false ="; var_dump($y); 
    $y = (false xor true); echo "false xor true ="; var_dump($y); 
    $y = (true xor false); echo "true xor false ="; var_dump($y); 
    $y = (true xor true); echo "true xor true ="; var_dump($y); 
    echo '<b>!$a </b><br />';
    $y = !(false); echo "!(false) = "; var_dump($y); 
    $y = !(true); echo "!(true) = "; var_dump($y); 
    echo '<b>$a || $b </b><br />';
    $y = (false || false); echo "false || false ="; var_dump($y); 
    $y = (false || true); echo "false || true ="; var_dump($y); 
    $y = (true || false); echo "true || false ="; var_dump($y); 
    $y = (true || true); echo "true || true ="; var_dump($y); 
    echo '<b>$a && $b </b><br />';
    $y = (false && false); echo "false && false ="; var_dump($y); 
    $y = (false && true); echo "false && true ="; var_dump($y); 
    $y = (true && false); echo "true && false ="; var_dump($y); 
    $y = (true && true); echo "true && true ="; var_dump($y); 
?>
</code></pre>
<h2>bitorientált operátorok</h2>
<pre><code><?php	
    $a = 67; $b = 5; 
    echo '$a = '.decbin($a).' $b = '.decbin($b).'<br />';
    echo '$a & $b = '.decbin($a&$b).'<br />';
    echo '$a | $b = '.decbin($a|$b).'<br />';
    echo '$a ^ $b = '.decbin($a^$b).'<br />';
    echo '$a << $b = '.decbin($a<<$b).'<br />';
    echo '$a >> $b = '.decbin($a>>$b).'<br />';
    echo '~$a = '.decbin(~$a).'<br />';
?>
</code></pre>
</body>
</html>