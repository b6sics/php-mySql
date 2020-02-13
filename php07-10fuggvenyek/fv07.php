<!DOCTYPE html>
<html lang="hu">

<head>
	<title>függvények 7</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>Függvények 7</h2>
<p>strtolower()<br />
$str=strtolower($str);<br />
echo $str."&lt;br /&gt;" ; 
</p>
	<?php
		$str="NAGYBETŰS VOLTAM";
        $str=strtolower($str);
        echo $str;        
        echo ' <br /><br />';
	?>

<p>Függvények készítése<pre>
	function osszegki($a, $b){
		echo ($a + $b);
	}</pre>
</p>
	<?php
        function osszegki($a, $b){
            echo ($a + $b);        
        }
        osszegki(1, 1);
        echo ' <br /><br />';
	?>

<p>A függvény visszatérési értéke<pre>
	function osszeg($a, $b){
		return $a + $b;        
	}</pre>
</p>
	<?php
        function osszeg($a, $b){
            return $a + $b;        
        }
        $vissza = osszeg(1, 1);
        var_dump($vissza);
        echo ' <br /><br />';
	?>

<p>A változók hatóköre (scope)<br />
globális változó, lokális változó;
</p>
	<?php
        $v="globális változó";
        function Teszt01(){
            $v="lokális változó";
            echo $v."<br />";        
        }
        Teszt01();
        echo $v;
        echo ' <br /><br />';
	?>

<p>A global kulcsszó 1<pre>
	function teszt(){
		global $v; 
		echo $v;
	}</pre>
</p>
	<?php
        $v1=1;
        $v2=2;
        function Teszt02(){
            global $v1;
            echo $v1;
            var_dump($v2);
        }
        Teszt02();
        echo ' <br /><br />';
	?>

<p>A global kulcsszó 2<pre>
	function teszt(){
		global $v1, $v2; 
		echo $v1 + $v2;
	}</pre>
</p>
	<?php
        $v1=1;
        $v2=2;
        function Teszt03(){
            global $v1, $v2;
            $v1 = $v1 + $v2;
            echo $v1."<br />";
        }
        Teszt03();
        echo $v1;
        echo ' <br /><br />';
	?>

<p>A GLOBALS tömb használata<pre>
	function teszt(){
		$GLOBALS["v1"] = $GLOBALS["v2"] + $GLOBALS["v1"];
	}</pre>
</p>
	<?php
        $v1=1;
        $v2=2;
        function Teszt04(){
            $GLOBALS["v1"] = $GLOBALS["v2"] + $GLOBALS["v1"];
        }
        Teszt04();
        echo $v1;
        echo ' <br /><br />';
	?>

<p>A static kulcsszó<pre>
	function teszt(){
		static $v = 1;
		echo $v."&lt;br /&gt;";
	}
	teszt();
	teszt();
	teszt();</pre>
</p>
	<?php
        function Teszt05(){
            static $v = 1;
            echo $v."<br />";
        }
        Teszt05();
        Teszt05();
        Teszt05();
        echo ' <br />';
	?>

<p>Paraméterátadás<pre>
	function teszt($v){
		$v = $v + 1;
	}</pre>
</p>
	<?php
        function Teszt06($v){
			$v = $v + 1;
            echo 'belső $v:'.$v."<br />";
        }
        $v = 10;
        Teszt06($v);
        echo 'külső $v:'.$v;
        echo ' <br /><br />';
	?>

</body>
</html>
