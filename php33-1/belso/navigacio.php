<nav>
    <logo>
        <?php if (
            isset($_SESSION['felhasznalo']) &&
            in_array($_SESSION['felhasznalo']['jog'], ['admin']['szerzo'])
        ) : ?>
            <a href="<?php echo ALAP_URL ?>szerk/vezerlopult.php">
            <?php else : ?>
                <a href="<?php echo ALAP_URL ?>index.php">
                <?php endif ?>
                <h1>Nevenincs iskola</h1>
                </a>
    </logo>
    <ul>
        <li><a href="<?php echo ALAP_URL ?>index.php">Kezdőlap</a></li>
        <li><a href="<?php echo ALAP_URL ?>kereses.php">Keresés</a></li>
        <li><a href="<?php echo ALAP_URL ?>kapcsolat.php">Kapcsolat</a></li>
        <li><a href="#">Magunkról</a></li>
    </ul>
</nav>