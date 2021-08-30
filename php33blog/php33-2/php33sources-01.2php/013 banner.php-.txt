<?php if (isset($_SESSION['felhasznalo']['nev'])) { ?>
<!-- Ha be van jelentkezve valamelyik felhasználó -->
   <aside id=bejelentkezett>
	<span><a href="<?php echo ALAP_URL . 'belso/profil.php' ?>">
	<?php echo $_SESSION['felhasznalo']['nev'] ?></a></span>
	|
	<span><a href="<?php echo ALAP_URL ?>kijelentkezes.php">kijelentkezes</a></span>
   </aside>
<?php }else{ ?>
   <banner>
	<div id=udvozlo_kep>
	 <h1>Nevenincs iskola</h1>
	 <p>
	  Várja szeretettel leendő tanulóinkat,<br>
	  a Nevenincs iskola oktatói.<br>
	  A nappali informatikai és sport,<br>
	  ágazati képzések mellett.<br>
	  Az esti OKJ-s végzettség meg-<br>
	  szerzéséhez is hozzásegítjük;<br>
	  sőt akár ECDL vizsgát,<br>
	  is tehetnek tanulóink.<br>
	 </p>
	 <a href="regisztracio.php" class=gomb>Regisztrálás</a>
	</div>
	<aside id=interakcio>
	 <form action="<?php echo ALAP_URL . 'index.php' ?>" method=post>
	  <h2>Bejelentkezés</h2>
	  <div id=hiba-tarolo>
	   <?php include(GYOKER_UTVONAL . '/belso/hibak.php') ?>
	  </div>
	  <input type=text name=nev placeholder="Felhasználónév">
	  <input type=password name=jelszo placeholder="Jelszó">
	  <button class=gomb type=submit name=bejelentkezes_gomb>Bejelentkezés</button>
	 </form>
	</aside>
   </banner>
<?php } ?>