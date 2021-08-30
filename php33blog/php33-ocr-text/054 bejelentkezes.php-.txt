<?php include('konfiguralas.php') ?>
<?php include('belso/interakcio_muve1etek.php') ?>
<?php include('belso/fejlec.php') ?>

<title>Nevenincs iskola | Bejelentkezés </title>
</head>
<body>
    <main>

<?php include('belso/navigacio.php') ?>

        <section id=interakcio>
            <form method=post action="bejelentkezes.php">
                <h2>Bejelentkezés</h2>

<?php include('belso/hibak.php') ?>

                <input type=text name=nev placeholder="Felhasználónév">
                <input type=password name=jelszo placeholder="Jelszó">
                <button type=submit class=gomb name="bejelentkezes_gomb">Bejelentkezés</button>
                <p>
                Még nem vagy tag? <a href="regisztracio.php">Regisztráció</a>
                </p>
            </form>
        </section>

<?php include('belso/lablec.php') ?>

