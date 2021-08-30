<?php include('../konfiguralas.php') ?>
<?php include('../hozzaferes_vezerles.php') ?>
<?php include('belso/szerk_fuggvenyek.php') ?>
<!-- Visszatér az összes hozzászólással -->
<?php $hozzaszolasok = getHozzaszolasok() ?>
<?php include('belso/szerk_fejlec.php') ?>
<title>Adminisztráció | Hozzászólások kezelés</title>
</head>
<body>
<?php include('belso/szerk_navigacio.php') ?>
<main id=tartalom>
<!-- Bal oldali menü -->
<?php include('belso/szerk_menu.php') ?>
<!-- Az adatbázis rekordjainak megjelenítése -->
<div id=tabla-tarolo class=tabla-szeles>
<h1>Hozzászólások kezelése</h1>
<?php include('../belso/uzenetek.php') ?>
<?php include('../belso/hibak.php') ?>
<?php if (empty($hozzaszolasok)): ?>
<h1>Nincsenek hozzászólások az adatbázisban!</h1>
<?php else: ?>
<table>
<thead>
<tr>
<th>Ssz.</th>
<th>Kommentelő</th>
<th>Bejegyzés</th>
<th>Szöveg</th>
<th>Törlés</th>
</tr>
</thead>
<tbody>
<?php foreach ($hozzaszolasok as $kulcs => $hozzaszolas): ?>
<tr>
<tdx?php echo $kulcs + 1 ?></td>
<td title="<?php echo $hozzaszolas['kommentelo']['jog'] ?>">
<?php echo $hozzaszolas['kommentelo']['teljesnev'] ?>
</td>
<td title="<?php echo $hozzaszolas['bejegyzés']['teljesnev'] ?>”>
<a href="../teljes_bejegyzes.php?cim=<?php echo $hozzaszolas['bejegyzes']['cim_url'] ?>">
<?php echo $hozzaszolas['bejegyzes']['cim'] ?>
</a>
</td>
<td>
<a href="../teljes_bejegyzes.php?cim=<?php echo $hozzaszolas['bejegyzes']['cim_url'] ?>#komment<?php echo $hozzaszolas['sorszám'] ?>"> 
<?php echo $hozzaszolas['szoveg'] ?>
</a>
</td>
<td>
<!-- Az admin minden hozzászólást törölhet., a szerző a saját bejegyzéseinek
összes hozzászólását törölheti., a tagok csak a saját hozzászólásaikat törölhetik --> 
<?php if ($admin ||
$hozzaszólás['bejegyzes']['felhaszn_azon'] == $_SESSION['felhasznalo']['azon'] ||
$hozzaszolas['kommentelo']['azon'] == $_SESSION['felhasznalo']['azon']) : ?>
<a class="gomb torlo" onclick="return rakerdez(this)"
href="hozzaszolasok.php?hozzaszolas_torol=<?php echo $hozzaszolas['azon'] ?>">&#9760; 
</a>
<?php endif ?>
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?php endif ?>
</div>
</main>
</body>
</html>