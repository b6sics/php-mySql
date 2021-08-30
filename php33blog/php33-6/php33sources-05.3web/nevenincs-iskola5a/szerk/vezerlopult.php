<?php include('../konfiguralas.php') ?>
<?php include('../hozzaferes_vezerles.php') ?>
<?php include('belso/szerk_fuggvenyek.php') ?>
<?php $elemszamok=getElemszamok() ?>
<?php include('belso/szerk_fejlec.php') ?>

 <title>Adminisztráció | Vezérlőpult</title>
</head> 
<body> 
 <?php include('belso/szerk_navigacio.php') ?>
 
 <main id=vezerlopult>
 <?php include('../belso/uzenetek.php') ?>
 
 <h1>Üdvözlet</h1>
 <div class=statusz>
 
  <a href="felhasznalok.php">
  <span><?php echo $elemszamok['felhasznalo_fo'] ?></span> <br> 
  <span>Regisztrált felhasználó</span>
  </a>
  
  <a href="kategoriak.php">
  <span><?php echo $elemszamok['kategoria_db'] ?></span> <br> 
  <span>Létrehozott kategória</span>
  </a>
  
  <a href="bejegyzesek.php">
  <span><?php echo $elemszamok['bejegyzes_db'] ?></span> <br> 
  <span>Közzétett bejegyzés</span>
  </a>
  
  <a href="hozzaszolasok.php">
  <span><?php echo $elemszamok['hozzaszolas_db'] ?></span> <br> 
  <span>Elfogadott hozzászólás</span>
  </a>
  
 </div> 
 <br><br><br>
 
 <div class=gombok>
  <?php if ($admin): ?>
  <a href="felhasznalok.php">Felhasznalók kezelése</a>
  <a href="kategoriak.php">Kategóriak kezelése</a>
  <?php endif ?>
  <a href="bejegyzesek.php">Bejegyzések kezelése</a>
  <a href="hozzaszolasok.php">Hozzaszólasok kezelése</a>
 </div>
 
 </main> 
</body> 
</html>

