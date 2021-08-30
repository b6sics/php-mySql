<?php include('konfiguralas.php') ?>
<?php include('belso/nyilvanos_fuggvenyek.php') ?>
<?php include('belso/fejlec.php') ?>
<?php 
 // Visszaadja az adott kategória, adott író vagy 
 // a kereséshez illeszkedő találatok bejegyzéseit
 if (isset($_GET['kategoria'])) {
  $kateg_cimke = $_GET['kategoria'];
  $bejegyzesek = getKozzetettBejegyzesekKategoriaAlapjan($kateg_cimke);
 } else if (isset($_GET['iro'])) {
  $iro_nev = $_GET['iro'];
  $bejegyzesek = getKozzetettBejegyzesekIroAlapjan($iro_nev);
 } else if (isset($_GET['keresett'])) {
  $keresett = $_GET['keresett'];
  $bejegyzesek = getKeresettBejegyzesek($keresett);
 }
?>
  <?php if (isset($_GET['kategoria'])): ?>
  <title>Nevenincs iskola | Megadott kategória bejegyzései</title>
  <?php elseif (isset($_GET['iro'])): ?>
  <title>Nevenincs iskola | Adott szerző bejegyzései</title>
  <?php elseif (isset($_GET['keresett'])): ?>
  <title>Nevenincs iskola | Keresett szónak megfelelő bejegyzések</title>
  <?php endif ?>
 </head>
 <body>
  <main>
   <?php include('belso/navigacio.php') ?>
   <?php include('belso/banner.php') ?>
   <?php include('belso/uzenetek.php') ?>
   <section>
	<h2>
	 <?php if (isset($_GET['kategoria'])): ?>
	 Bejegyzések/események a következő témában/kategóriában: 
	 <u><?php echo getKategoriaCimkeURLAlapjan($kateg_cimke) ?></u>
	 <?php elseif (isset($_GET['iro'])): ?>
	 Bejegyzések/események a következő szerzőtől: 
	 <u onmouseover="profilkep_be(event,'iro_profilkep')"
		onmouseleave="profilkep_ki(event,'iro_profilkep')">
	  <?php echo getIroNevURLAlapjan($iro_nev) ?>
	 </u>
	 <img id=iro_profilkep src="statikus/kepek/<?php echo getIroProfilkepURLAlapjan($iro_nev) ?>">
	 <?php elseif (isset($_GET['keresett'])): ?>
	 Bejegyzések/események amelyek címeiben/tartalmában a következő keresőszó fellelhető: 
	 <u><?php echo $keresett ?></u>
	 <?php endif ?>
	</h2>
	
	<hr>
	<?php foreach ($bejegyzesek as $bejegyzes): ?>
	<article class=elolnezet>
	 <?php if (isset($bejegyzes['kep']) && $bejegyzes['kep'] != ""): ?>
	 <img src="statikus/kepek/<?php echo $bejegyzes['kep'] ?>">
	 <?php else: ?>
	 <div class=kep_helyett>Ehhez a bejegyzéshez/ eseményhez nem tartozik kép</div>
	 <?php endif ?>
	 <a href="teljes_bejegyzes.php?cim=<?php echo $bejegyzes['cim_url'] ?>">
	  <summary>
	   <h3><?php echo $bejegyzes['cim'] ?></h3>
	   <time>
		<span><?php echo date(" Y. F j. ", strtotime($bejegyzes["letrehozva"])) ?></span>
		<span class=tovabb>Tovább...</span>
	   </time>
	  </summary>
	 </a>
	</article>
	<?php endforeach ?>
   </section>
<?php include('belso/lablec.php') ?>