<?php
require_once('konfiguralas.php');
require_once('belso/nyilvanos_fuggvenyek.php');
require_once('belso/interakcio_muveletek.php');

$bejegyzesek = getKozzetettBejegyzesek();

require_once('belso/fejlec.php');?>

    <title>Nevenincs iskola | Kezdőlap</title>
</head>

<body>
    <main>
        <?php
        include('belso/navigacio.php');
        include('belso/banner.php');
        include('belso/uzenetek.php');
        ?>
        <section>
            <h2>Friss bejegyzések/események</h2>
            <hr />
            <div id='cikkek'>
                <?php
                    foreach ($bejegyzesek as $bejegyzes):                
                ?>
                <article class='elonezet'>
                    <?php
                    if(isset($bejegyzes['kep']) && $bejegyzes['kep'] != ""):
                    ?>
                    <img src="statikus/kepek/<?php echo $bejegyzes['kep'] ?>" />
                    <?php else: ?>
                    <div class="kep_helyett">Ehhez a bejegyzéshez/eseményhez nem tartozik kép</div>
                    <?php endif ?>
                    <a href="szurt_bejegyzesek.php?kategoria=<?php echo $bejegyzes['kategoria']['cimke_url'] ?>"
                        class="gomb felirat kategoria" >
                        <?php echo $bejegyzes['kategoria']['cimke'] ?>
                    </a>
                    <a href="szurt_bejegyzesek.php?iro=<?php echo $bejegyzes['iro']['nev'] ?>"
                        class="gomb felirat iro" >
                        <?php echo $bejegyzes['iro']['teljesnev'] ?>
                    </a>
                    <a href="teljes_bejegyzes.php?cim=<?php echo $bejegyzes['cim_url'] ?>" >
                        <summary>
                            <h3><?php echo $bejegyzes['cim'] ?></h3>
                            <time>
                                <span><?php echo date(" Y. F j. ", strtotime($bejegyzes['letrehozva'])) ?></span>
                                <span class="tovabb">Tovább...</span>
                            </time>
                        </summary>
                    </a>
                </article>
                <?php endforeach ?>
            </div>
        </section>
        <?php include('belso/lablec.php') ?>
