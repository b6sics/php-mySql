<?php include('../konfiguralas.php') ?>
<?php include('../hozzaferes_vezerles.php') ?>
<?php include('nyilvanos_fuggvenyek.php') ?>
<?php include('interakcio_muveletek.php') ?>

<?php

    // Visszatér a bejelentkezett felhasználó adataival
$felhasznalo = getFelhasznaloAzonositojaAlapjan($_SESSION['felhasznalo']['azon']);
$nev = $felhasznalo['nev'];
$teljesnev = $felhasznalo['teljesnev'];
$email = $felhasznalo['email'];
$profilkep = $felhasznalo['profilkep'];
?>

<?php include('fejlec.php') ?>

<title>Nevenincs iskola ! Profil </title>
    </head>
        <body>
            <main>

<?php include('navigacio.php') ?>
<?php include('banner.php') ?>
<?php include('uzenetek.php') ?>
<?php include('menu.php') ?>

                <section id = interakcio>
                    <form method="post" action="profil.php" enctype="multipart/form-data">
                        <h2>Profil</h2>

<?php include('hibak.php') ?>

                        <input type="text" name="feltasznslorev" value="<?php echo $nev ?>"
                                placeholder="Felhasználórév" disabled>

<!——    Szükséges rejtett mezöként is elküldeni a felhasználó nevet, 
        mivel a disabled státuszú nem kerül át szerver oldalra         ——>

                        <input type:=hidden name=nev value="<?php echo $nev ?>">
                        <input type:=text name=teljesnev value="<?php echo $teljesnev ?>" placeholder="Teljes név">
                        <input type:=email name=emsil value="<?php echo $email ?>" placeholder="E-mail">
                        <input type:=password name=jelszo_regi placeholder="Régi jelszó">
                        <input type:=password name=jelszo_uj placeholder="Új jelszó">
                        <input type:=password name=jelszo_megeposites placeholder="Uj jelszó mégegyszer">
                        <img id=profilkep src="../statikus/kepek/<?php echo $profilkep ?>">
                        <input type:=file name=profilkep>
                        <button type:=submit class="gomb nodosit" name=ppofil_gowb onclick:"return ra(erdez(this)">
                            Küldés
                        </button>
                    </form>
                </section>

<?php include('lablec.php') ?>

