<?php include('../konfiguralas.php') ?>
<?php include('../hozzaferes_vezerles.php') ?>
<?php include('belso/szerk_fuggvenyek.php') ?>

<!-- Visszatér az összes kategóriával -->
<?php $kategoriak = getKategoriak() ?>
<?php include('belso/szerk_fejlec.php') ?>
	<title>Adminisztráció | Kategória kezelés</title>
</head>
<body>

<?php include('belso/szerk_navigacio.php') ?>
<main id=tartalom>

<!-- Bal oldali menü -->
<?php include('belso/szerk_menu.php') ?>

<!-- Csak admin jogosultsággal lehet létrehozni új kategóriát vagy módosítani egy meglévőt --> 
<?php if ($admin): ?>
<!-- A középső űrlap a létrehozáshoz és szerkesztéshez -->

<section id=tevekenyseg>
<?php if ($kategSzerkMod === false): ?>
<h1>Kategória létrehozása</h1>
<?php else: ?>
<h1>Kategória szerkesztése</h1>
<?php endif ?>

<form method=post action="kategoriak.php">
<?php if ($kategSzerkMod === true): ?>
<input type=hidden name=kateg_azon value="<?php echo $kateg_azon ?>">
<?php endif ?>
<input type=text name=cimke value="<?php echo $cimke ?>" placeholder="Kategória">
<?php if ($kategSzerkMod === true): ?>
<button type=submit class=gomb name=modosit onclick="return rakerdez(this)">Módosít</button> 
<?php else: ?>
<button type=submit class=gomb name=letrehoz>Létrehoz</button>
<?php endif ?>
</form>
</section>
<?php endif ?>

<!-- Az adatbázis rekordjainak megjelenítése -->
<div id=tabla-tarolo class=tabla-keskeny>
<?php include('../belso/uzenetek.php') ?>
<?php include('../belso/hibak.php') ?>
<?php if (empty($kategoriak)): ?>
<hl>Nincsenek kategóriák az adatbázisban!</hl>
<?php else: ?>
<table>
	<thead>
		<tr>
			<th>Ssz.</th>
			<th>Kategória</th>
			<?php if ($admin): ?>
			<th colspan=2>Tevékenység</th>
			<?php endif ?>
		</tr>
	</thead>
<tbody>

<?php foreach ($kategoriak as $kulcs => $kategoria): ?>
<tr>
<td><?php echo $kulcs + 1 ?></td>
<td><?php echo $kategoria['cimke' ] ?></td>
<?php if ($admin): ?>
<td>
	<a class="gomb szerkesztő"
	href="kategoriak.php?szerkeszt=<?php echo $kategoria['azon'] ?>">&#9999;
	</a>
</td>
<td>
	<a class="gomb torlo" onclick="return rakerdez(this)"
		href="kategoriak.php?torol=<?php echo $kategoria['azon'] ?>">&#9760j 
	</a>
</td>
<?php endif ?>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?php endif ?>
</div>
</main>
</body>
</html>
