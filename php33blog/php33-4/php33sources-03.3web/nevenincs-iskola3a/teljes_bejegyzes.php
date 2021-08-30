<?php include('konfiguralas.php') ?>
<?php include('belso/nyilvanos_fuggvenyek.php') ?>
<?php 
 $szuperglobalis_tomb = $_SERVER['REQUEST_METHOD'] == 'GET'  ? $_GET  :
					   ($_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : "");
 // Ennek az aloldalnak hol az URL-en keresztül, hol a háttérben küldünk paramétereket:
 // lekérdezzük, hogy épp melyiket használjuk, majd eltároljuk egy új tömbben
 if ($szuperglobalis_tomb) {
  $cim = $szuperglobalis_tomb['cim'];
  $bejegyzes = getBejegyzes($cim);
  // Az adott bejegyzés meglátogatásra került, így a megtekintve értékét növelje 1-gyel
  megtekintveNovel($cim,$bejegyzes['megtekintve']);
  $hozzaszolasok = getHozzaszolasBejegyzesCimAlapjan($cim);
 }
?>
<?php include('belso/fejlec.php') ?>
  <title> <?php echo $bejegyzes['cim'] ?> | Nevenincs iskola</title>
 </head>
 <body>
  <main>
   <?php include('belso/navigacio.php') ?>
   <?php include('belso/banner.php') ?>
   <?php include('belso/uzenetek.php') ?>
   <section>
	<div id=bejegyzes-tarolo>
	 <article class=teljes>
	  <h2><?php echo $bejegyzes['cim'] ?></h2>
	  <?php if (isset($bejegyzes['kep']) && $bejegyzes['kep'] != ""): ?>
	  <img src="statikus/kepek/<?php echo $bejegyzes['kep'] ?>">
	  <?php endif ?>
	  <div id=bejegyzes-torzs>
	   <?php echo html_entity_decode($bejegyzes['szoveg']) ?>
	  </div>
	  <br>
	 </article>
	 <div class=balra>Létrehozva: <?php echo $bejegyzes['letrehozva'] ?></div>
	 <?php if ($bejegyzes['modositva'] != '0000-00-00 00:00:00'): ?>
	 <div class=jobbra>Módosítva: <?php echo $bejegyzes['modositva'] ?></div>
	 <?php endif ?>
	</div>
	<!-- Megjelenik az általános hozzászólást biztosító többsoros szövegbeviteli mező, 
		 ha be van jelentkezve felhasználó, nem valakinek válaszol és nem szerkeszti a sajátját -->
	<?php if (isset($_SESSION['felhasznalo']) && !isset($_GET['valasz']) && !isset($_GET['hozzaszolas_szerkeszt'])): ?>
	<div id=interakcio>
	 <form method=post action="teljes_bejegyzes.php">
	  <input type=hidden name=cim value="<?php echo $cim ?>">
	  <input type=hidden name=bejegyz_azon value=<?php echo $bejegyzes['azon'] ?>>
	  <input type=hidden name=hozzasz_azon value=NULL>
	  <input type=hidden name=sorszam value=<?php echo count($hozzaszolasok)+1 ?>>
	  <input type=hidden name=szint value=1>
	  <input type=hidden name=valasza value=NULL>
	  <textarea name=szoveg cols=90 rows=7 placeholder="Hozzászólás"></textarea>
	  <button type=submit class=gomb name=hozzaszolas_letrehoz>Küldés</button>
	 </form>
	</div>
	<?php endif ?>
	<div id=hozzaszolas-tarolo>
	 <?php foreach ($hozzaszolasok as $index => $hozzaszolas): ?>
	 <komment id=komment<?php echo $hozzaszolas['sorszam'] ?> class=hozzaszolas style="width: <?php echo $hozzaszolas['szelesseg'] ?>%">
	  <komment class=hozzaszolas-fejlec>
	   <div class=balra>
		<?php echo $hozzaszolas['sorszam'] . ".&nbsp;&nbsp;&nbsp;&nbsp;" ?>
		<span onmouseover="profilkep_be(event,'felhaszn<?php echo $hozzaszolas['iro']['azon'] ?>')"
			  onmouseleave="profilkep_ki(event,'felhaszn<?php echo $hozzaszolas['iro']['azon'] ?>')">
		<?php echo $hozzaszolas['iro']['teljesnev'] . "&nbsp;&nbsp;&nbsp;&nbsp;" ?>
		</span>
		<?php if (isset($hozzaszolas['valasza'])): ?>
		 válasza a(z) <?php echo $hozzaszolas['valasza'] ?>. hozzászólásra.
		<?php endif ?>
		<img id=felhaszn<?php echo $hozzaszolas['iro']['azon'] ?> src="statikus/kepek/<?php echo $hozzaszolas['iro']['profilkep'] ?>">
	   </div>
	   <!-- Hozzászólni csak az tud, aki be van jelentkezve -->
	   <?php if (isset($_SESSION['felhasznalo'])): ?>
	   <div class=jobbra>
		<a href="teljes_bejegyzes.php?cim=<?php echo $cim ?>&valasz=<?php echo $hozzaszolas['sorszam'] ?>#komment<?php echo $hozzaszolas['sorszam'] ?>">
		 <img src="statikus/kepek/valaszol.png">
		</a>
		<!-- Szerkeszteni mindenki csak a saját hozzászólását tudja -->
		<?php if ($hozzaszolas['felhaszn_azon'] == $_SESSION['felhasznalo']['azon']): ?>
		<a href="teljes_bejegyzes.php?cim=<?php echo $cim ?>&hozzaszolas_szerkeszt=<?php echo $hozzaszolas['sorszam'] ?>#komment<?php echo $hozzaszolas['sorszam'] ?>">
		 <img src="statikus/kepek/szerkeszt.png">
		</a>
		<?php endif ?>
		<!-- Az admin bármit törölhet, a szerző minden hozzászólást, de csak akkor ha tőle származik a bejegyzés
			 a tag csak a saját hozzászólásait -->
		<?php if ($_SESSION['felhasznalo']['jog'] == "admin" || 
				  $bejegyzes['felhaszn_azon'] == $_SESSION['felhasznalo']['azon'] ||
				  $hozzaszolas['felhaszn_azon'] == $_SESSION['felhasznalo']['azon']): ?>
		 <a href="teljes_bejegyzes.php?cim=<?php echo $cim ?>&hozzaszolas_torol=<?php echo $hozzaszolas['azon'] ?>&elozmeny=<?php echo $hozzaszolas['valasza'] ?>"
			class=torlo onclick="return rakerdez(this)">
		  <img src="statikus/kepek/torol.png">
		 </a>
		<?php endif ?>
	   </div>
	   <?php endif ?>
	  </komment>
	  <komment class=hozzaszolas-torzs>
	  <?php echo $hozzaszolas['szoveg'] ?>
	  </komment>
	  <komment class=hozzaszolas-lablec>
	   <div class=balra>Létrehozva: <?php echo $hozzaszolas['letrehozva'] ?></div>
	   <?php if ($hozzaszolas['modositva'] != '0000-00-00 00:00:00'): ?>
	   <div class=jobbra>Módosítva: <?php echo $hozzaszolas['modositva'] ?></div>
	   <?php endif ?>
	  </komment>
	 </komment>
	 <!-- A szövegdoboz a komment alatt jelenik meg, ha épp erre válaszolnak vagy ezt akarják módosítani -->
	 <?php if ((isset($_GET['valasz']) && $hozzaszolas['sorszam'] == $_GET['valasz']) || 
			   (isset($_GET['hozzaszolas_szerkeszt']) && $hozzaszolas['sorszam'] == $_GET['hozzaszolas_szerkeszt'])): ?>
	 <div id=interakcio>
	  <form method=post action="teljes_bejegyzes.php">
	   <input type=hidden name=cim value="<?php echo $cim ?>">
	   <input type=hidden name=bejegyz_azon value=<?php echo $bejegyzes['azon'] ?>>
	   <input type=hidden name=hozzasz_azon value=<?php echo $hozzaszolas['azon'] ?>>
	   <?php if ($hozzaszSzerkMod === true): ?> 
	   <input type=hidden name=sorszam value=<?php echo count($hozzaszolasok) ?>>
	   <input type=hidden name=szint value=<?php echo $hozzaszolas['szint'] ?>>
	   <?php else: ?>
	   <input type=hidden name=sorszam value=<?php echo count($hozzaszolasok)+1 ?>>
	   <input type=hidden name=szint value=<?php echo $hozzaszolas['szint']+1 ?>>
	   <?php endif ?>
	   <input type=hidden name=valasza value=<?php echo $hozzaszolas['sorszam'] ?>>
	   <textarea name=szoveg cols=90 rows=7 placeholder="Hozzászólás"><?php echo $szoveg ?></textarea>
	   <?php if ($hozzaszSzerkMod === true): ?> 
	   <button type=submit class=gomb name=hozzaszolas_modosit onclick="return rakerdez(this)">Módosít</button>
	   <?php else: ?>
	   <button type=submit class=gomb name=hozzaszolas_letrehoz>Válaszol</button>
	   <?php endif ?>
	   <button type=button class=gomb name=megse 
			   onclick="betolt('teljes_bejegyzes.php?cim=<?php echo $cim ?>#komment<?php echo $hozzaszolas['sorszam'] ?>')">Mégse</button>
	  </form>
	 </div>
	 <?php endif ?>
	 <?php endforeach ?>
	</div>
   </section>
<?php include('belso/lablec.php') ?>