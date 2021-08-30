<?php include('../konfiguralas.php') ?>
<?php include('../hozzaferes_vezerles.php') ?>
<?php include('belso/szerk_fuggvenyek.php') ?>
<!-- Visszatér az összes bejegyzéssel -->
<?php 
$bejegyzesek = getBejegyzesek(); 
$kategoriak = getKategoriak() 
?>
<?php if ($bejegyzSzerkMod === true) 
	$bejegyz_iro_azon = getBejegyzesIro($_GET['szerkeszt'])['azon'] ?>
<?php include('belso/szerk_fejlec.php') ?>
<title>Adminisztráció | Bejegyzések kezelés</title>
</head>
<body>
<?php include('belso/szerk_navigacio.php') ?> 
<main id=tartalom>

<!-- Bal oldali menü -->
<?php include('belso/szerk_menu.php') ?>
<!-- A bejegyzések táblát jelenítse meg, ha nem űrlapmódban vagyunk vagy valamelyik szerző nem a saját bejegyzését próbálná szerkeszteni -->
<?php if ($bejegyzUrlapMod === false || 
	($bejegyzSzerkMod === true 
	&& $bejegyz_iro_azon !== $_SESSION['felhasználó']['azon']) && 
	!$admin): ?>
<!-- Az adatbázis rekordjainak megjelenítése -->
<div id=tabla-tarolo class=tabla-szeles>
<h1>Bejegyzések kezelése</h1>
<form id=uj_bejegyzes method=post action="bejegyzesek.php">
<button type=submit class=gomb name=urlapmod>Új bejegyzés létrehozása</button>
</form>
<?php include('../belso/uzenetek.php') ?>
<?php include('../belso/hibak.php') ?>
<?php if (empty($bejegyzesek)): ?>
<h1>Nincsenek bejegyzések/események az adatbázisba!</h1>
<?php else: ?>
<table>
<thead>
<tr>
<th>Ssz.</th>
<th>író</th>
<th>Cím</th>
<th>Megtekintve</th>
<!-- Csak adminisztrátori jogosultsággal lehet egy elkészített bejegyzését a nyilvánosság számára közzétenni. -->
<?php if ($admin): ?>
<th>Közzétéve</th>
<?php endif ?>
<th>Szerkesztés</th>
<th>Törlés</th>
</tr>
</thead>
<tbody>
<?php foreach ($bejegyzesek as $kulcs => $bejegyzes): ?>
<tr>
<td><?php echo $kulcs + 1 ?></td>
<td><?php echo $bejegyzes['iro'] ?></td>
<td>
<a href="../teljes_bejegyzes.php?cim=<?php echo $bejegyzes['cim_url'] ?>">
<?php echo $bejegyzes['cim'] ?>
</a>
</td>
<td><?php echo $bejegyzes['megtekintve' ] ?></td>
<?php if ($admin): ?>
<td>
<?php if ($bejegyzes['kozzetett'] == true): ?>
<a class="gomb publikalatlan”
href="bejegyzesek.php?publikalatlan=<?php echo $bejegyzes['azon'] ?>">&#128077;
</a>
<?php else: ?>
<a class="gomb publikus”
href="bejegyzesek.php?publikus=<?php echo $bejegyzes['azon'] ?>">&#128078;
</a>
<?php endif ?>
</td>
<?php endif ?>
<td>
<?php if ($admin || $bejegyzes['felhaszn_azon'] == $_SESSION['felhasznalo']['azon']): ?>
<!-- Csak az admin vagy a bejegyzés saját szerzője szerkesztheti a bejegyzést -->
<a class="gomb szerkeszto"
href="bejegyzesek.php?szerkeszt=<?php echo $bejegyzes['azon'] ?>">&#9999;
</a>
<?php endif ?>
</td>
<td>
<?php if ($admin || $bejegyzes['felhaszn_azon'] == $_SESSION['felhasznalo']['azon']): ?>
<!-- Csak az admin vagy a bejegyzés saját szerzője törölheti a bejegyzést -->
<a class="gomb torlo" onclick="return rakerdez(this)"
href="bejegyzesek.php?torol=<?php echo $bejegyzes['azon'] ?>">&#9760;
</a>
<?php endif ?>
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?php endif ?>
</div>
<?php else: ?>

<!-- Űrlap a létrehozáshoz és a szerkesztéshez -->
<section id=tevekenyseg class=bejegyzes-letrehozasi-terulet>
<?php if ($bejegyzSzerkMod === false): ?>
<h1>Bejegyzés létrehozása</h1>
<?php else: ?>
<h1>Bejegyzés szerkesztése</h1>
<?php endif ?>
<form method=post enctype="multipart/form-data" action="bejegyzesek.php">
<!-- Felsorolja a hibákat -->
<?php include('../belso/hibak.php') ?>
<?php if ($bejegyzSzerkMod === true): ?>
<input type=hidden name=bejegyz_azon value="<?php echo $bejegyz_azon ?>">
<?php endif ?>
<input type=text name=cim value="<?php echo $cim ?>" placeholder="Cím">
<label class=kep>Bejegyzéshez tartozó kép: </label>
<?php if (isset($kep) && $kep != ""): ?>
<img src = "../statikus/kepek/< ?php echo $kep ?>" width=15% align=left><br><br>
<?php endif ?>
<input type=file name=kep>
<textarea name=szoveg id=torzs cols=30 rows=10><?php echo $szoveg ?></textarea>
<select name=kateg_azon>
<?php if (!isset($cimke) || $cimke == ""): ?>
<option value="" selected disabled>Válassz egy kategóriát</option>
<?php endif ?>
<?php foreach ($kategoriak as $kategoria): ?>
<?php if ($cimke == $kategoria['címke']): ?>
<option value="<?php echo $kategoria['azon'] ?>" selected>
<?php else: ?>
<option value="<?php echo $kategoria['azon'] ?>">
<?php endif ?>

<?php echo $kategoria['címke'] ?>
</option>
<?php endforeach ?>

</select>

<!-- Csak adminisztrátori jogosultságú felhasználók láthatják ezt a beviteli mezőt. -->
<?php if ($admin): ?>
<!-- megjeleníti a jelölőnégyzetet, attól függően, hogy a bejegyzést közzétették vagy sem -->
<label for=kozzetett>
Közzétett
<?php if ($kozzetett == true): ?>
<input type=checkbox value=1 name=kozzetett checked>&nbsp;
<?php else: ?>
<input type=checkbox value=1 name=kozzetett>&nbsp; 
<?php endif ?>
</label>
<?php endif ?>
<?php if ($bejegyzSzerkMod === true): ?>
<button type=submit class=gomb name=modosit onclick="return rakerdez(this)">Módosít</button>
<?php else: ?>
<button type=submit class=gomb name=letrehoz>Létrehoz</button>
<?php endif ?>
</form>
</section>
<?php endif ?>
</main>
</body>
</html>

<script>
 CKEDITOR.replace('torzs'); 
</script>
