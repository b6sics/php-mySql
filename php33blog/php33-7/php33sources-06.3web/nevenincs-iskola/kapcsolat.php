<?php include('konfiguralas.php') ?>
<?php include('belso/interakcio_muveletek.php') ?>
<?php include('belso/fejlec.php') ?>

<title>Nevenincs iskola ! Kapcsolat </title>
    </head>
        <body>
            <main>

<?php include('belso/navigacio.php') ?>
<?php include('belso/banner.php') ?>

                <section id=interakcio>
                    <form method="post" action="kapcsolat.php">
                        <h2>Kapcsolat</h2>

                        <?php include('belso/hibak.php') ?>

                        <input type=text name=teljesnev placeholder="Teljes név">
                        <input type=email name=email placeholder="E—mail">
                        <input type=text name=targy placeholder="Tárgy">
                        <textarea name=uzenet cols=96 rows=7 placeholder="üzenet")></textarea>
                        <button type=submit class=gomb name=kapcsolat_gomb>Küldés</button>
                    </form>
                </section>

<?php include('belso/lablec.php') ?>

