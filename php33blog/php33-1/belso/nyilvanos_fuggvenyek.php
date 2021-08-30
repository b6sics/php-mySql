<?php
$hibak = [];
$url = $_SERVER['PHP_SELF'];
$kezd = strrpos($url, '/') + 1;
$veg = strpos($url, '.');
$kuldo_fajl = substr($url, $kezd, $veg - $kezd);

if (isset($_SESSION['felhasznalo'])) {
    $admin = $_SESSION['felhasznalo']['jog'] == "admin";
}

function getBejegyzesKategoria($bejegyz_azon)
{
    global $kapcs;
    $lekerdezes = "SELECT * FROM kategoriak WHERE azon=
        (SELECT kateg_azon FROM bejegyzes_kategoria WHERE bejegyz_azon=$bejegyz_azon) LIMIT 1";

    $eredmeny = mysqli_query($kapcs, $lekerdezes);
    $kategoria = mysqli_fetch_assoc($eredmeny);
    return $kategoria;
}

function getBejegyzesIro($bejegyz_azon)
{
    global $kapcs;
    $lekerdezes = "SELECT teljesnev,nev,azon FROM felhasznalok WHERE azon=
        (SELECT felhaszn_azon FROM bejegyzesek WHERE azon=$bejegyz_azon) LIMIT 1";

    $eredmeny = mysqli_query($kapcs, $lekerdezes);
    $iro = mysqli_fetch_assoc($eredmeny);
    return $iro;
}

function getKozzetettBejegyzesek()
{
    global $kapcs;
    $lekerdezes = "SELECT * FROM bejegyzesek WHERE kozzetett=true";
    $eredmeny = mysqli_query($kapcs, $lekerdezes);

    $bejegyzesek = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC);
    $bovitett_bejegyzesek = array();
    foreach ($bejegyzesek as $bejegyzes) {
        $bejegyzes['kategoria'] = getBejegyzesKategoria($bejegyzes['azon']);
        $bejegyzes['iro'] = getBejegyzesIro($bejegyzes['azon']);

        array_push($bovitett_bejegyzesek, $bejegyzes);
    }
    return $bovitett_bejegyzesek;
}
