<!DOCTYPE html>
<html lang="hu">

<head>
	<title>Armstrong-szám</title>
	<link rel="icon" type="image/gif" href="favicon.ico">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<h2>Armstrong-szám</h2>
<p>
Az a szám, melynek minden számjegyét az n-edik hatványra emelve 
és összeadva, az eredeti számot kapjuk az egy Armstrong-szám.<br />
</p>

<?php
    $x0=0;
    $x1=100000;
    $armstrong=0;
    for($ii=$x0; $ii<=$x1;$ii++){
        $dummy=$ii;
        $n = strlen("$ii");
        //echo $n."-".$dummy;
        $sum=0;
        for($jj=1;$jj<=$n;$jj++){
            $sum += pow(($dummy % 10), $n);
            $dummy = floor($dummy / 10);
            //echo "-->".$sum."..".$dummy."<br />";
        }
        if ($ii == $sum){
            $armstrong++;
        }
    }
?>

<p> Az Armstrong-számok számossága a <?php echo "[".$x0."..".$x1."]" ?> halmazban:<br />
<?php echo $armstrong."db" ?>.
</p>

</body>
</html>