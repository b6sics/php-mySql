<?php include('../konfiguralas.php') ?>
<?php include('../hozzaferes_vezerles.php') ?>
<?php include('nyilvanos_fuggvenyek.php') ?>
<?php include('interakcio_muveletek.php') ?>

<?php include('fejlec.php') ?>

<title>Nevenincs iskola ! Profil </title>
    </head>
        <body>
            <main>

<?php include('navigacio.php') ?>
<?php include('banner.php') ?>
<?php include('uzenetek.php') ?>
<?php include('menu.php') ?>

                <div íd=tabla—tarolo class=tabla—szeles>
                    <h1>Hozzászólásaim kezelése</h1>

<?php if (empty($hozzaszolasok)): ?>

                    <h1>Nem szóltál még hozzá egyik eseményhez sem!</h1>

<?php else: ?>
                    <table>
                    <col><col><col><col width=150>
                    <thead>
                        <tr>
                            <th>Ssz.</th>
                            <th>Bejegyzés</th>
                            <th>Szöveg</th>
                            <th>Tevékenység</th>
                        </tr>
                    </thead>
                    <tbody>

<?php foreach ($hozzaszolasok as $kulcs => $hozzaszolas): ?>

                        <tr>
                            <td><?php echo $kulcs * 1 ?>.</td>
                            <td>
                                <a href="../teljes_bejegyzes.php?cim:
                                   <?php echo $hozzaszolas['bejegyzes']['cím_ur1'] ?>">
                                <?php echo $hozzaszolas['bejegyzes']['cim'] ?>
                                </a>
                            </td>
                            <td íd:hozzaszolas_szoveg<?php echo ++$kulcs ?> 
                                data—azon=<?php echo $hozzaszolas['azon'] ?>
                                data—sorszam=<?php echo $hozzaszolas['sorszam'] ?>
                                data—szint=<?php echo $hozzaszolas['szint'] ?>
                                data—valasza=<?php $valasza = is_null($hozzaszolas['valasza']) ? 
                                    "null" : $hozzaszolas['valasza']; echo $valasza ?>>
                                <a href="../teljes_bejegyzes.php?cim:
                                   <?php echo $hozzaszolas['bejegyzes']['cím_ur1'] ?>#komment
                                   <?php echo $hozzaszolas['sorszam'] ?>">
                                    <?php echo $hozzaszolas['szoveg'] ?>
                                </a>
                            </td>
                            <td>
                            <a íd=szerkeszto_gomb<?php echo $kulcs ?> class="gomb szerkeszto"
                               href="javascript: hozzaszolas_szerkesztes(<?php echo $kulcs ?>)">&#9999;
                            </a>
                            <a íd=modosito_gomb<?php echo $kulcs ?> class="gomb modosito"
                               onclick="return rakerdez(this)" href="javascript: hozzaszolas_modositas(
                               <?php echo $kulcs ?>)" name=modosit>&#10003;
                            </a>
                            <a íd=storlo_gomb<?php echo $kulcs ?> class="gomb torlo"
                               onclick="return rakerdez(this)" href="hozzaszolasaim.php?torol=
                               <?php echo $hozzaszolas['azon'] ?>">&#9760;
                            </a>
                            <a íd=megse_gomb<?php echo $kulcs ?> class="gomb megse"
                               href="hozzaszolasaim.php">&#10060;
                            </a>
                            </td>
                        </tr>

<?php endforeach ?>
                    </tbody>
                    </table>

                    <form name=hozzaszolas method=post action="hozzaszolasaim.php">
                    (input type=hidden name=cim value="<?php echo $hozzaszolas['bejegyzes']['cim_ur1'] ?>">
                    (input type=hidden name=bejegyz_azon value="<?php echo $hozzaszolas['bejegyzes']['azon'] ?>">
                    (input type=hidden name=hozzasz_azon>
                    (input type=hidden name=sorszam>
                    (input type=hidden name=színt>
                    (input type=hidden name=valasza>
                    (input type=hidden name=szoveg>
                    <button type=submit class="gomb frissito" name=frissit>Frissit</button>
                    </form)

<?php endif ?>

                </dív>

<?php include('lablec.php') ?>

