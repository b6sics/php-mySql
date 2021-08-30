<?php if (!isset($_SESSION['felhasznalo'])): ?>

<!-- Ha nincs bejelentkezve felhasználó -->

<?php include(GYOKER_UTVONAL . '/belso/fejlec.php') ?> 
 <title>Nevenincs iskola | Kérlek lépj be a hozzáféréshez</title> 
</head>
<body>
 <main>
 <?php include(GYOKER_UTVONAL . '/belso/navigacio.php') ?> 
 <section>
  <center>
  <br>
  <hl>Belépés szükséges</hl>
  <br>
  <p>Be kell lépned, ahhoz, hogy a weboldal bizonyos területeit elérd!</p>
  </center>
 </section>
<?php include(GYOKER_UTVONAL . '/belso/lablec.php') ?> 
<?php exit(0) ?>

<?php else: ?>
<?php if (strpos($_SERVER['PHP_SELF'],"szerk") !== false &&
					$_SESSION['felhasznalo']['jog'] == "tag"): ?>
					
<!-- Ha egy tag jogosultságú felhasználó szerkesztői területre téved
  (az URL elérési útvonalában ez szerepel) -->
  
<?php include(GYOKER_UTVONAL . '/belso/fejlec.php') ?>
 <title>Nevenincs iskola | Hozzáférés megtagadva</title>
</head>
<body>
 <main>
 <?php include(GYOKER_UTVONAL . '/belso/navigacio.php') ?>
 <section>
  <center>
  <br>
  <hl>Hozzáférés megtagadva</hl>
  <br>
  <p>Ahhoz, hogy a weboldal ezen területét elérd, szerkesztői jogosultságú
    felhasználói csoport tagja kellene, hogy legyél!</p>
  </center> 
 </section>
<?php include(GYOKER_UTVONAL . '/belso/lablec.php') ?>
<?php exit(0) ?> 
<?php endif ?> 
<?php endif ?>

