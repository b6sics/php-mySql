<?php include('konfiguralas.php') ?>
<?php include('belso/interakcio_muve1etek.php') ?>
<?php include('belso/fejlec.php') ?>

<title>Nevenincs iskola | Regisztráció </title>
</head>
<body>
    <main>

<?php include('belso/navigacio.php') ?>

        <section id=interakcio>
            <form method=post action="regisztracio.php" enctype="multipart/form—data">
                <h2>Regisztráció</h2>

<?php include('belso/hibak.php') ?>

                <input type=text name=teljesnev p1aceholder="Teljes név">
                <input type=text name=nev placeholder="Felhasználónév">
                <input type=email name=email placeholder="E-mail">
                <input type=password name=jelszo_1 placeholder="Jelszó">
                <input type=password name=jelszo_2 placeholder="Jelszó megerősítés">
                 <input type=file name=profilkep>
                <button type=submit class=gomb name="regisztracio_gomb">Regisztráció</button>
                <p>
                Már tag vagy? <a href="bejelentkezes.php">Bejelentkezés</a>
                </p>
            </form>
        </section>

<?php include('belso/lablec.php') ?>


