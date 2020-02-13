<!DOCTYPE html>
<html lang="hu">

<head>
	<title>függvények 10</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <h2>Függvények 10</h2>
<p>Karakterlánc széleinek megtisztitása<br />
trim(), ltrim(), rtrim();
</p>
	<?php
		$s = "A felhasználó által beírt szöveg!>' ";
		echo "A szöveg: $s <br />";

		echo "trim: ".trim($s,"!>' ")." <br />";
		echo "ltrim: ".ltrim($s)." <br />";
		echo "rtrim: ".rtrim($s,"!>' ")." <br />";
    ?>

<p>Karakterlánc tördelése<br />
wordwrap();
</p>
	<?php
		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";

		echo '<br /> wordwrap($s, 15, "&lt;br /&gt;") <br />';
		echo wordwrap($s,15,"<br />");
		echo '<br /> wordwrap($s ,8, "&lt;br /&gt;") <br />';
		echo wordwrap($s,8,"<br />");
		echo '<br /> wordwrap($s, 8, "&lt;br /&gt;" ,true) <br />';
		echo wordwrap($s, 8, "<br />", true);
    ?>

<p>HTML-entitások karakterré alakítása<br />
html_entity_decode();
</p>
	<?php
		$s = "A &lt;b&gt; felhasználó &lt;/b&gt; által &quot;beírt&quot; &rsquo;szöveg&rsquo;! &#039;";
		echo "A szöveg: A &amp;lt;b&gt; felhasználó &amp;lt;/b&amp;gt; által &amp;quot;beírt&amp;quot; &amp;rsquo;szöveg&amp;rsquo;! &amp;#039; <br />";

		echo "A szöveg megjelenítése: <br />";
		echo $s."<br /><br />";
		echo "A szöveg megjelenítése átalakítás után: <br />";
		echo html_entity_decode($s)."<br />";
		echo html_entity_decode($s, ENT_QUOTES)."<br />";
		echo html_entity_decode($s, ENT_NOQUOTES)."<br />";
		echo "Érdemes megnézni az oldal forrását! <br />";
    ?>

<p>HTML- karakterek entitásokká alakítása<br />
htmlentities();
</p>
	<?php
		$s = "A <b> felhasználó </b> által beírt szöveg! ";
		echo "A szöveg megjelenítése: <br />";
		echo $s."<br /><br />";

		echo "A szöveg megjelenítése átalakítás után: <br />";
		echo htmlentities($s)."<br />";
		echo htmlentities($s, ENT_COMPAT, "UTF-8")."<br />";
		echo "Érdemes megnézni az oldal forrását! <br />";
    ?>

<p>Entitások megjelenítése<br />
get_html_translation_table();
</p>
	<?php
		echo "<br /><br />";
		print_r (get_html_translation_table());
		echo "<br /><br />";
		print_r (get_html_translation_table(HTML_SPECIALCHARS));
		echo "<br /><br />";
		print_r (get_html_translation_table(HTML_ENTITIES, ENT_QUOTES, "UTF-8"));
		echo "<br /><br />";
    ?>

<p>Különleges karakterek entitásokká alakítása<br />
htmlspecialchars();
</p>
	<?php
		$s = 'A <b> felhasználó </b> által "beírt" szöveg! ';
		echo "A szöveg megjelenítése: <br />";
		echo $s."<br /><br />";

		echo "A szöveg megjelenítése átalakítás után: <br />";
		echo htmlspecialchars($s)."<br />";
		echo htmlspecialchars($s, ENT_NOQUOTES, "UTF-8")."<br />";
		echo "Érdemes megnézni az oldal forrását! <br />";
    ?>

<p>HTML soremelés címkék beszúrása<br />
nl2br();
</p>
	<?php
		$s = "A felhasználó \n által beírt \n szöveg! ";
		echo "A szöveg megjelenítése: <br />";
		echo 'A felhasználó \n által beírt \n szöveg! <br /><br />';

		echo "A szöveg megjelenítése átalakítás után: <br />";
		echo nl2br($s)."<br />";
		echo nl2br("One line.\nAnother Line.<br />");
    ?>

<p>HTML és PHP címkék eltávolítása<br />
strip_tags() ;
</p>
	<?php
		$s = "A <b><i>felhasználó</i></b> által <em>beírt</em> <ezmi>szöveg</ezmi>! ";
		echo "A szöveg megjelenítése: <br />";
		echo htmlentities($s)."<br />";
		echo $s."<br /><br />";

		echo "A szöveg megjelenítése átalakítás után: <br />";
		echo strip_tags($s)."<br />";
		echo strip_tags($s,"<i>")."<br />";
    ?>

<p>Addcslashes<br />
addcslashes();
</p>
	<?php
		$s = "A felhasználó által beírt szöveg! ";
		echo "A szöveg: $s <br />";

		echo "A szöveg megjelenítése átalakítás után 1: <br />";
		echo addcslashes($s, 'l')."<br />";
		echo "A szöveg megjelenítése átalakítás után 1: <br />";
		echo addcslashes($s, 'a..p')."<br />";
    ?>

<p>Addslashes<br />
addslashes();
</p>
	<?php
		$s = 'A "felhasználó" által beírt szöveg! \ ';
		echo "A szöveg: $s <br />";

		echo "A szöveg megjelenítése átalakítás után: <br />";
		echo addslashes($s)."<br />";
    ?>

</body>
</html>