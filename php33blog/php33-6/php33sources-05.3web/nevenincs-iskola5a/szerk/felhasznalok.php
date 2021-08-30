<?php include('../konfiguralas.php') ?>
<?php include('../hozzaferes_vezerles.php') ?> 
<?php include('belso/szerk_fuggvenyek.php') ?> 
<?php
// Visszatér az összes felhasználóval
$felhasznalok = getFelhasznalok();
$jogok = ['admin', 'szerzo', 'tag'];
?>

<?php include('belso/szerk_fejlec.php') ?> 
 <title>Adminisztráció | Felhasználó kezelés</title> 
</head>

<body>
 <?php include('belso/szerk_navigacio.php') ?> 
 <main id=tartalom>
 <!-- Bal oldali menü -->
 <?php include('belso/szerk_menu.php') ?>
 
 <?php if (!empty($profilkep)): ?>
 <img id=profilkep src="../statikus/kepek/<?php echo $profilkep ?>">
 <?php endif ?>
 
 <?php if ($admin): ?>
 <!-- A középső űrlap a létrehozáshoz és szerkesztéshez -->
 <section id=tevekenyseg>
  <?php if ($felhasznSzerkMod === false): ?> 
  <h1>Felhasználó létrehozása</hl>
  <?php else: ?>
  <h1>Felhasználó szerkesztése</hl>
  <?php endif ?>
  <form method=post action="felhasznalok.php" enctype="multipart/form-data">
  <?php if ($felhasznSzerkMod === true): ?>
  <input type=hidden name=felhaszn_azon value="<?php echo $felhaszn_azon ?>">
  <?php endif ?>
  
  <input type=text name=teljesnev value="<?php echo $teljesnev ?>" placeholder="Teljes név">
  <input type=text name=nev value="<?php echo $nev ?>" placeholder="Felhasználónév">
  <input type=email name=email value="<?php echo $email ?>" placeholder="E-mail">
  <input type=password name=jelszo placeholder="jelszó">
  <input type=password name=jelszoMegerosites placeholder="Jelszó megerősítés">
  
  <select name=jog>
   <option value="" selected disabled>Jogosultság</option>
   <?php foreach ($jogok as $kulcs => $jogosultsag): ?>
   <?php if ($jog == $jogosultsag): ?>
   <option value="<?php echo $jog ?>" selected><?php echo $jog ?></option>
   <?php else: ?>
   <option value="<?php echo $jogosultsag ?>"><?php echo $jogosultsag ?></option>
   <?php endif ?>
   <?php endforeach ?>
  </select>
  
  <input type=file name=profilkep>
  <?php if ($felhasznSzerkMod === true): ?>
  <button type=submit class=gomb name=modosit onclick="return rakerdez(this)">Módosít</button> 
  <?php else: ?>
  <button type=submit class=gomb name=letrehoz>Létrehoz</button>
  <?php endif ?>
  </form>
 </section>
 <?php endif ?>

 <!-- Az adatbázis rekordjainak megjelenítése -->
 <div id=tabla-tarolo class=tabla-keskeny>
 
  <!-- Megjeleníti a tájékoztató üzeneteket
  <?php include('../belso/uzenetek.php') ?>
  
  <!-- Felsorolja a hibákat -->
  <?php include('../belso/hibak.php') ?>
  
  <table> 
  <thead> 
   <tr>
   <th>Ssz.</th>
   <th>Felhasználó</th>
   <th>Jog</th>
   <?php if ($admin): ?>
   <th colspan=2>Tevékenység</th>
   <?php endif ?>
   </tr>
  </thead> 
  <tbody> 
   <?php foreach ($felhasznalok as $kulcs => $felhasznalo): ?>
   <tr>
   <td><?php echo $kulcs + 1 ?></td>
   <td title="<?php echo $felhasznalo['nev'] ?> | <?php echo $felhasznalo['email'] ?>">
    <?php echo $felhasznalo['teljesnev'] ?>
   </td>
   <td><?php echo $felhasznalo['jog'] ?></td>
   <?php if ($admin): ?>
   <td>
    <a class="gomb szerkeszto"
     href="felhasznalok.php?szerkeszt=<?php echo $felhasznalo['azon'] ?>">&#9999;
    </a> 
   </td> 
   <td>
    <a class="gomb torlo" onclick="return rakerdez(this)"
     href="felhasznalok.php?torol=<?php echo $felhasznalo['azon'] ?>">&#9760;
    </a> 
   </td> 
   <?php endif ?>
   </tr>
   <?php endforeach ?>
  </tbody> 
  </table> 
 </div>
 </main>
</body>
</html>

