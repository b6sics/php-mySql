<?php include('konfiguralas.php') ?>
<?php include('belso/nyilvanos_fuggvenyek.php') ?>
<?php include('belso/interakcio_muveletek.php') ?>
<?php include('belso/fejlec.php') ?>

    <title>Nevenincs iskola | Keresés </title>
<head>
    <body>
        <main>

<?php include('belso/navigacio.php') ?>
<?php include('belso/banner.php') ?>

            <section id=interakcio>
                <form method=get action="szurt_bejegyzesek.php">
                    <h2>Keresés</h2>
                    <input type=search name=keresett reguired placeholder="Keresőszó">
                    <button type=submit class=gomb name=kereses_gomb>Küldés</button>
                </form>
            </section>

<?php include('belso/lablec.php') ?>

