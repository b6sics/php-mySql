<?php
// általános változók
$hibak = [];
$url = $_SERVER['PHP_SELF'];
$kezd = strrpos($url, '/') + 1;
$veg = strpos($url, '.');
$kuldo_fajl = substr($url, $kezd, $veg - $kezd);

// Ha be van jelentkezve valaki
if (isset($_SESSION['felhasznalo']))
  $admin = $_SESSION['felhasznalo']['jog'] == "admin";

// Visszatér az összes közzétett bejegyzéssel
function getKozzetettBejegyzesek()
{
  // a globális $kapcs objektum használata
  global $kapcs;
  $lekerdezes = "SELECT * FROM bejegyzesek WHERE kozzetett=true";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  // lekéri az összes bejegyzést egy asszociatív tömbbe
  $bejegyzesek = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC);
  $bovitett_bejegyzesek = array();
  foreach ($bejegyzesek as $bejegyzes) {
    $bejegyzes['kategoria'] = getBejegyzesKategoria($bejegyzes['azon']);
    $bejegyzes['iro'] = getBejegyzesIro($bejegyzes['azon']);
    // Felvesszük a tömmbe a bejegyzés kategóriájának és szerzőjének adatait
    array_push($bovitett_bejegyzesek, $bejegyzes);
  }
  return $bovitett_bejegyzesek;
}

// A keresőszót tartalmazó bejegyzésekkel tér vissza
function getKeresettBejegyzesek($keresett)
{
  global $kapcs, $hibak;
  $szoveg = trim($keresett, " "); // a feleslegesen beütött üres karaktereket törli
  if (!empty($szoveg)) {  // ha nem üres szöveget küldött
    $lekerdezes = "SELECT * FROM bejegyzesek WHERE kozzetett=true AND
		  (cim LIKE '%$szoveg%' OR szoveg LIKE '%$szoveg%')";
    $lekerdezes = mysqli_query($kapcs, $lekerdezes);
    $talalat_db = mysqli_num_rows($lekerdezes);
    if ($talalat_db > 0) {
      $_SESSION['uzenet'] = "Találatok száma: $talalat_db";
      return $lekerdezes;
    } else
      array_push($hibak, "Egyetlen bejegyzés címében vagy tartalmában sem található meg a keresett szó!");
  } else
	array_push($hibak, "Nem adtál meg keresőszót!");
}

// A bejegyzés azonosítóját megkapva visszatér 
// a bejegyzéshez tartozó kategória adataival
function getBejegyzesKategoria($bejegyz_azon)
{
  global $kapcs;
  $lekerdezes = "SELECT * FROM kategoriak WHERE azon=
		(SELECT kateg_azon FROM bejegyzes_kategoria WHERE bejegyz_azon=$bejegyz_azon) LIMIT 1";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $kategoria = mysqli_fetch_assoc($eredmeny);
  return $kategoria;
}

// A bejegyzés azonosítóját megkapva visszatér 
// a bejegyzés szerzőjének adataival
function getBejegyzesIro($bejegyz_azon)
{
  global $kapcs;
  $lekerdezes = "SELECT teljesnev,nev,azon FROM felhasznalok WHERE azon=
		(SELECT felhaszn_azon FROM bejegyzesek WHERE azon=$bejegyz_azon) LIMIT 1";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $iro = mysqli_fetch_assoc($eredmeny);
  return $iro;
}

// Visszaadja az összes bejegyzését a megadott kategóriának
function getKozzetettBejegyzesekKategoriaAlapjan($kateg_cimke)
{
  global $kapcs;
  $lekerdezes = "SELECT * FROM bejegyzesek bj 
		 WHERE bj.azon IN 
		 (SELECT bk.bejegyz_azon FROM bejegyzes_kategoria bk 
		  WHERE bk.kateg_azon=
		  (SELECT kt.azon FROM kategoriak kt 
		   WHERE cimke_url='$kateg_cimke') 
		  GROUP BY bk.bejegyz_azon
		  HAVING COUNT(1) = 1)";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  // lekéri az összes bejegyzést egy asszociatív tömbbe
  $bejegyzesek = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC);
  $bovitett_bejegyzesek = array();
  foreach ($bejegyzesek as $bejegyzes) {
    $bejegyzes['kategoria'] = getBejegyzesKategoria($bejegyzes['azon']);
    array_push($bovitett_bejegyzesek, $bejegyzes);
  }
  return $bovitett_bejegyzesek;
}

// Visszaadja az összes bejegyzését a megadott kategóriának
function getKozzetettBejegyzesekIroAlapjan($iro_nev)
{
  global $kapcs;
  $lekerdezes = "SELECT bejegyzesek.*
		 FROM felhasznalok,bejegyzesek
		 WHERE felhasznalok.azon = bejegyzesek.felhaszn_azon and felhasznalok.nev='$iro_nev'";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  // lekéri az összes bejegyzést egy asszociatív tömbbe
  $bejegyzesek = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC);
  $bovitett_bejegyzesek = array();
  foreach ($bejegyzesek as $bejegyzes) {
    $bejegyzes['iro'] = getBejegyzesIro($bejegyzes['azon']);
    array_push($bovitett_bejegyzesek, $bejegyzes);
  }
  return $bovitett_bejegyzesek;
}

// Visszatér a kategória címkéjével annak azonosítója alapján
function getKategoriaCimkeURLAlapjan($kateg_cimke)
{
  global $kapcs;
  $lekerdezes = "SELECT cimke FROM kategoriak WHERE cimke_url='$kateg_cimke'";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $kategoria = mysqli_fetch_assoc($eredmeny);
  return $kategoria['cimke'];
}

function getIroNevURLAlapjan($iro_nev)
{
  global $kapcs;
  $lekerdezes = "SELECT teljesnev FROM felhasznalok WHERE nev='$iro_nev'";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $felhasznalo = mysqli_fetch_assoc($eredmeny);
  return $felhasznalo['teljesnev'];
}

function getIroProfilkepURLAlapjan($iro_nev)
{
  global $kapcs;
  $lekerdezes = "SELECT profilkep FROM felhasznalok WHERE nev='$iro_nev'";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $felhasznalo = mysqli_fetch_assoc($eredmeny);
  return $felhasznalo['profilkep'];
}

function getBejegyzes($cim_url)
{
  global $kapcs;
  $lekerdezes = "SELECT * FROM bejegyzesek WHERE cim_url='$cim_url'";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  // a lekérdezés eredményét egy asszociatív tömbben tárolja
  $bejegyzes = mysqli_fetch_assoc($eredmeny);
  if ($bejegyzes) {
    // Felvesszük a tömmbe az ezen bejegyzéshez tartozó kategóriát is
    $bejegyzes['kategoria'] = getBejegyzesKategoria($bejegyzes['azon']);
  }
  return $bejegyzes;
}

function megtekintveNovel($cim_url, $megtekintve)
{
  global $kapcs;
  $modositas = "UPDATE bejegyzesek SET megtekintve=$megtekintve+1 WHERE cim_url='$cim_url'";
  $eredmeny = mysqli_query($kapcs, $modositas);
  if (!$eredmeny) {
    $hiba = "MySQL hiba (" . mysqli_errno($kapcs) . "): " . mysqli_error($kapcs);
  }
}

function getHozzaszolasBejegyzesCimAlapjan($cim_url)
{
  global $kapcs;
  $lekerdezes = "SELECT hozzaszolasok.* FROM bejegyzesek 
        INNER JOIN hozzaszolasok ON bejegyzesek.azon = hozzaszolasok.bejegyz_azon
        WHERE bejegyzesek.cim_url='$cim_url'";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);

  $hozzaszolasok = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC);
  $bovitett_hozzaszolasok = array();

  $ssz = 0;
  foreach ($hozzaszolasok as $hozzaszolas) {
    $hozzaszolas['szelesseg'] = 100 - ($hozzaszolas['szint'] - 1);
    $hozzaszolas['iro'] = getHozzaszolasIro($hozzaszolas['azon']);

    // Felvesszük a tömbbe a hozzászólások írójának az adatait
    array_push($bovitett_hozzaszolasok, $hozzaszolas);
  }
  return $bovitett_hozzaszolasok;
}

function getHozzaszolasIro($hozzasz_azon)
{
  global $kapcs;
  $lekerdezes = "SELECT azon, teljesnev, profilkep FROM felhasznalok WHERE 
	azon=(SELECT felhaszn_azon FROM hozzaszolasok WHERE azon=$hozzasz_azon) LIMIT 1";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $iro = mysqli_fetch_assoc($eredmeny);
  return $iro;
}

// Hozzászólás változók
$hozzasz_azon = 0;
$hozzaszSzerkMod = false;
$felhaszn_azon = 0;
$bejegyz_azon = 0;
$valasz_azon = 0;
$sorszam = 0;
$szint = 0;
$szoveg = "";

// HOZZÁSZÓLÁSMÚVELETEK VÉGREHAJTÁSA
if (
  $kuldo_fajl == "hozzaszolasok" ||
  $kuldo_fajl == "hozzaszolasaim" ||
  $kuldo_fajl == "teljes_bejegyzes"
) {

  // ha a felhasználó rákattint a hozzászolás létrehozás gombra
  if (isset($_POST['hozzaszolas_letrehoz'])) {
    hozzaszolasLetrehoz($_POST);
  }

  // ha a felhasználó rákattint a hozzászolás szerkesztés gombra
  if (isset($_GET['hozzaszolas_szerkeszt']) || isset($_GET['szerkeszt'])) {
    $hozzaszSzerkMod = true;
    $hozzasz_sorszam = isset($_GET['hozzaszolas_szerkeszte']) ? $_GET['hozzaszolas_szerkeszt'] : $_GET['szerkeszt'];
    $bejegyz_cim = $_GET['cim'];
    hozzaszolasSzerkeszt($hozzasz_sorszam, $bejegyz_cim);
  }

  // ha a felhasználó rákattint a hozzászolás módositás gombra
  if (isset($_GET['hozzaszolas_modosit']) || isset($_GET['frissit'])) {
    hozzaszolasModosit($_POST);
  }


  // ha a felhasználó rákattint a hozzászolás törlés gombra
  if (isset($_GET['hozzaszolas_torol']) || isset($_GET['torol'])) {
    $hozzasz_azon = isset($_GET['hozzaszolas_torol']) ? $_GET['hozzaszolas_torol'] : $_GET['torol'];
    hozzaszolasTorol($hozzasz_azon);
  }
}

// HOZZÁSZÓLÁSFÜGGVÉNYEK
// Visszatér az összes hozzászólással vagy egy adott felhasználó hozzászólásaival
// attól függően, hogy adtunk—e meg paraméterül egy felhasználó azonosítót

function getBejegyzesHozzaszolasAzonositoAlapjan($hozzasz_azon) {
    global $kapcs;
    $lekerdezes = "SELECT bejegyzesek.azon, bejegyzesek.felhaszn_azon, bejegyzes_szerzo.teljesnev, 
                    bejegyzesek.cim, bejegyzesek.cim_url
                    FROM felhasznalok AS bejegyzes_szerzo INNER JOIN
                    (bejegyzesek INNER JOIN
                    (felhasznalok INNER JOIN hozzaszolasok ON felhasznalok.azon = hozzaszolasok.felhaszn_azon) ON
                    bejegyzesek.azon = hozzaszolasok.bejegyz_azon ) ON 
                    bejegyzes_szerzo.azon = bejegyzesek.felhaszn_azon
                    WHERE hozzaszolasok.azon=$hozzasz_azon;";
    $eredmeny = mysqli_query($kapcs, $lekerdezes);
    $bejegyzes = mysqli_fetch_assoc($eredmeny);
    return $bejegyzes;
}

function getKommenteloHozzaszolasAzonositoAlapjan($hozzasz_azon) {
    global $kapcs;
    $lekerdezes = "SELECT felhasznalok.azon, felhasznalok.teljesnev, felhasznalok.jog FROM felhasznalok
        INNER JOIN hozzaszolasok ON felhasznalok.azon = hozzaszolasok.felhaszn_azon
        WHERE hozzaszolasok.azon=$hozzasz_azon;";
    $eredmeny = mysqli_query($kapcs, $lekerdezes);
    $kommentelo = mysqli_fetch_assoc($eredmeny);
    return $kommentelo;
}

function getHozzaszolasok($felhaszn_azon = null) {
  global $kapcs;
  if (is_null($felhaszn_azon)) {
    $lekerdezes = "SELECT * FROM hozzaszolasok";
  } else {
    $lekerdezes = "SELECT * FROM hozzaszolasok WHERE felhaszn_azon=$felhaszn_azon";
  }
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $hozzaszolasok = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC);
  $bovitett_hozzaszolasok = array();
  foreach ($hozzaszolasok as $hozzaszolas) {
    $hozzaszolas['bejegyzes'] = getBejegyzesHozzaszolasAzonositoAlapjan($hozzaszolas['azon']);
    $hozzaszolas['kommentelo'] = getKommenteloHozzaszolasAzonositoAlapjan($hozzaszolas['azon']);
    // Felvesszük a tőmmbe a hozzászóláshoz tartozó bejegyzés, valamint hozzászólás írójának adatait
    array_push($bovitett_hozzaszolasok, $hozzaszolas);
  }
  return $bovitett_hozzaszolasok;
}


// Megtisztitja az űrlapról érkező értékeket
function tisztit($karakterlanc) {
    global $kapcs;
    $tisztitott = trim($karakterlanc); // eltávolítja a karakterláncot körülvevő üres helyeket
    $tisztitott = mysqli_real_escape_string($kapcs, $tisztitott);
    return $tisztitott;
}

function hozzaszolasLetrehoz($hozzaszolas) {
  global $kapcs, $hibak, $felhaszn_azon, $bejegyz_azon, $hozzasz_azon, $sorszam, $szint, $valasza, $szoveg;
  $felhaszn_azon = $_SESSION['felhasznalo']['azon'];
  $bejegyz_azon = $hozzaszolas['bejegyz_azon'];
  $hozzasz_azon = $hozzaszolas['hozzasz_azon'];
  $sorszam = $hozzaszolas['sorszam'];
  $szint = $hozzaszolas['szint'];
  $valasza = $hozzaszolas['valasza'];
  $szoveg = tisztit($hozzaszolas['szoveg']);
  if (empty($szoveg)) {
    array_push($hibak, "A hozzászólás szövegének nem adtál meg semmit");
  }
  if (count($hibak) == 0) {
    $beszuras = "INSERT INTO hozzaszolasok (felhaszn_azon, bejegyz_azon, hozzasz_azon, sorszam,
                    szint, valasza, szoveg, letrehozva, modositva)
                 VALUES ($felhaszn_azon, $bejegyz_azon, $hozzasz_azon, $sorszam,
                    $szint, $valasza, '$szoveg', now(), '0000-00-00 00:00:00')";
    if (mysqli_query($kapcs, $beszuras)) {  // ha a hozzászólás sikeresen létrejött
      header('location: teljes_bejegyzes.php?cim=' . $hozzaszolas['cim'] . '#komment' . $hozzaszolas['sorszam']);
      exit(0);
    }
  }
}

function hozzaszolasSzerkeszt($hozzasz_sorszam, $bejegyz_cim) {
    // globálisan definiáljuk az alábbi változókat, hogy az űrlap beviteli elemeknél is hivatkozhassunk rájuk
    // és az itt a függvény végén nekik adott értékek megjelenhessenek ott a mezőkben, ahol kíiratjuk értéküket
    global $kapcs, $szoveg, $hozzaszSzerkMod;

    $lekerdezes = "SELECT * FROM hozzaszolasok WHERE sorszam=$hozzasz_sorszam AND bejegyz_azon=
                  (SELECT azon FROM bejegyzesek WHERE cim_url='$bejegyz_cim');";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $hozzaszolas = mysqli_fetch_assoc($eredmeny);
  $szoveg = $hozzaszolas['szoveg'];
}

function hozzaszolasModosit($hozzaszolas) {
  global $kapcs, $hibak, $hozzasz_azon, $sorszam, $szoveg, $kuldo_fajl;
  $bejegyz_cim = $hozzaszolas['cim'];
  $sorszam = $hozzaszolas['sorszam'];
  $hozzasz_azon = $hozzaszolas['hozzasz_azon'];
  $szoveg = tisztit($hozzaszolas['szoveg']);

  if (empty($szoveg)) {
    array_push($hibak, "A hozzászólás szövegének nem adtál meg semmit");
  }

  if (count($hibak) == 0) {
    $modositas = "UPDATE hozzaszolasok SET szoveg='$szoveg', modositva=now() WHERE azon=$hozzasz_azon";

    mysqli_query($kapcs, $modositas);

    if ($kuldo_fajl == "hozzaszolas") {
        header("location: hozzaszolasaim.php");
    } else {
        header('location: teljes_bejegyzes.php?cim=' . $bejegyz_cim . '#komment' . $sorszam);
    }
    exit(0);
  }
}


function getBejegyzesIrojaHozzaszolasAzonositoAlapjan($hozzasz_azon) {
    global $kapcs;

    $lekerdezes = "SELECT bejegyzesek.felhaszn_azon FROM bejegyzesek INNER JOIN
                   (felhasznalok INNER JOIN hozzaszolasok ON felhasznalok.azon = hozzaszolasok.felhaszn_azon)
                   ON bejegyzesek.azon = hozzaszolasok.bejegyz_azon WHERE hozzaszolasok.azon=$hozzasz_azon";
    $eredmeny = mysqli_query($kapcs, $lekerdezes);
    $szerzo_azon = mysqli_fetch_assoc($eredmeny);
    return $szerzo_azon['felhaszn_azon'];
}

function getHozzaszolasIrojaAzonositojaAlapjan($hozzasz_azon) {
    global $kapcs;
    $lekerdezes = "SELECT felhaszn_azon FROM hozzaszolasok WHERE azon=$hozzasz_azon";
    $eredmeny = mysqli_query($kapcs, $lekerdezes);
    $hozzaszolo_azon = mysqli_fetch_assoc($eredmeny);
    return $hozzaszolo_azon['felhaszn_azon'];
}

function hozzaszolasTorol($felhaszn_azon) {
    global $kapcs, $hibak, $admin, $kuldo_fajl;
    $bejegyzesiro_azon = getBejegyzesIrojaHozzaszolasAzonositoAlapjan($hozzasz_azon);
    $hozzaszolo_azon = getHozzaszolasIrojaAzonositojaAlapjan($hozzasz_azon);

    // Csak az admin, az adott bejegyzés szerzője és a saját hozzászólók törölhetik kommentjeíket
    if ($admin || 
        $bejegyzesiro_azon == $_SESSION['felhasznalo']['azon'] || 
        $hozzaszolo_azon == $_SESSION['felhasznalo']['azon']) {

        $torles = "DELETE FROM hozzaszolasok WHERE azon=$hozzasz_azon";
        if (mysqli_query($kapcs, $torles)) {
            $_SESSION['uzenet'] = "A hozzászólás és a hozzá tartozó válasz(ok) (ha volt ilyen) törlésre kerültek!";
        // A hivatkozási integritás, kaszkádolt törlés miatt a törlendő hozzászólás válaszai is törlésre kerülnek

            if (isset($_SESSION['felhasznalo'])){

                if (strpos($_SERVER['PHP_SELF'],"szerk") === false) { // ha nem szerkesztői területrészen van

                    if ($kuldo_fajl == "hozzaszolasaim"){
                        header("location: hozzaszolasaim.php");
                    } else {

                        $url = $_SERVER['OUERY_STRING'];
                            // A bejegyzés címét a query—stringből nyerjük ki
                        $kezd = strpos($url, '=') + 1;
                        $veg = strpos($url, '&');
                        $bejegyzes_cim = substr($url, $kezd, $veg - $kezd);
                        $hozzaszolas_elozmenye = substr($url,strrpos($url, '=') +1 );
                        header('location: teljes_bejegyzes.php?cim:'.$bejegyzes_cim.'#komment'.$hozzaszolas_elozmenye);

                    }

                } else {
                    header("location: " . ALAP_URL . "szerk/hozzaszolasok.php");
                }

            }

            exit(0);
        }

    } else {
        array_push($hibak, "Csak a saját hozzászólásaidat, vagy az általad írt bejegyzések hozzászólásait törölheted");
    }
}

