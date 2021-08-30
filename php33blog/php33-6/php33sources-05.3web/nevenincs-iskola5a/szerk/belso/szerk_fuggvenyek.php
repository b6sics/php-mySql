<?php include('../belso/nyilvanos_fuggvenyek.php') ?> 
<?php

// általános változók

$ur1 = $_SERVER['PHP_SELF']; 
$kezd = strrpos($url,'/')+1; 
$veg = strpos($url,'.'); 
$kuldo_fajl = substr($url,$kezd,$veg-$kezd);

function getElemszamok() {
	
 // a fontosabb táblák rekordjainak számát lekérdezzük
 // az eredményeket felsorolásos (sorszámával hivatkozható) tömbben tároljuk
 // a létrejött 1 elemű tömbök 0. elemeit egységesen egy asszociatív tömbbe másoljuk 
 
 global $kapcs;
 $szamok = array();
 $lekerdezes = mysqli_query($kapcs, "SELECT COUNT(*) FROM felhasznalok"); 
 $felhasznalo_fo = mysqli_fetch_row($lekerdezes); 
 $szamok['felhasznalo_fo'] = $felhasznalo_fo[0];
 
 $lekerdezes = mysqli_query($kapcs, "SELECT COUNT(*) FROM kategoriak");
 $kategoria_db = mysqli_fetch_row($lekerdezes); 
 $szamok['kategoria_db'] = $kategoria_db[0];
 
 $lekerdezes = mysqli_query($kapcs, "SELECT COUNT(*) FROM bejegyzesek"); 
 $bejegyzes_db = mysqli_fetch_row($lekerdezes);
 $szamok['bejegyzes_db'] = $bejegyzes_db[0];
 
 $lekerdezes = mysqli_query($kapcs, "SELECT COUNT(*) FROM hozzaszolasok"); 
 $hozzaszolas_db = mysqli_fetch_row($lekerdezes); 
 $szamok['hozzaszolas_db'] = $hozzaszolas_db[0];
 
 return $szamok;
}


// Felhasználói változók 

$felhaszn_azon = 0;
$felhasznSzerkMod = false; 
$teljesnev = "";
$nev = "";
$jog = "";
$email = "";
$profilkep = "";

// Kategória változók 
$kateg_azon = 0;
$kategSzerkMod = false; 
$cimke = "";

// Bejegyzés változók 
$bejegyz_azon = 0; 
$bejegyzSzerkMod = false;
$bejegyzUrlapMod = isset($_POST['urlapmod']) ? true : false; 
$kozzetett = 0;
$cim = "";
$cim_url = ""; 
$szoveg = "";
$kep = "";
$bejegyzes_kategoria = "";


// FELHASZNÁLÓI MŰVELETEK VÉGREHAJTÁSA
if ($kuldo_fajl=="felhasznalok") {
 // ha a látogató rákattint egy felhasználót létrehozó gombra 
 if (isset($_POST['letrehoz'])) {
  felhasznaloLetrehoz($_POST);
 }
 // ha a látogató rákattint egy felhasználót szerkesztő gombra 
 if (isset($_GET['szerkeszt'])) {
  $felhasznSzerkMod = true;
  $felhaszn_azon = $_GETUszerkesztl;
  felhasznaloSzerkeszt($felhaszn_azon);
 }
 // ha a látogató rákattint egy felhasználót módosító gombra 
 if (isset($_POST['modosit'])) {
  felhasznaloModosit($_POST);
 }
 // ha a látogató rákattint egy felhasználót törlő gombra 
 if (isset($_GET['torol'])) {
  $felhaszn_azon = $_GET['torol'];
  felhasznaloTorol($felhaszn_azon);
 }
}

// FELHASZNÁLÓI FÜGGVÉNYEK
// Visszatér az összes felhasználóval
function getFelhasznalok() {
 global $kapcs;
 $lekerdezes = "SELECT * FROM felhasznalok";
 $eredmeny = mysqli_query($kapcs, $lekerdezes);
 $felhasznalok = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC); 
 return $felhasznalok;
}

// - Fogadja az új felhasználó adatait az űrlapról 
// - Létrehoz egy új felhasználót
// - Visszatér a felhasználó jogosultságaival 
function felhasznaloLetrehoz($felhasznalo) { 
 global $kapcs, $hibak, $teljesnev, $nev, $email, $jog, $profilkep;
 $teljesnev = tisztit($felhasznalo['teljesnev']); 
 $nev = tisztit($felhasznalo['nev']);
 $email = tisztit($felhasznalo['email']); 
 $jelszo = tisztit($felhasznalo['jelszo']);
 $jelszoMegerosites = tisztit($felhasznalo['jelszoMegerosites']);
 if (isset($felhasznalo['jog']))
  $jog = tisztit($felhasznalo['jog']);

  // űrlap ellenőrzés: az űrlap megfelelően lett-e kitöltve
 if (empty($teljesnev)) array_push($hibak, "A teljes név mezőt is töltsd ki!");
 if (empty($nev)) array_push($hibak, "A felhasználónév megadása kötelező!");
 if (empty($email)) array_push($hibak, "Hiányzik az e-mail cím!");
 if (empty($jelszo)) array_push($hibak, "Kimaradt a jelszó!");
 if ($jelszo != $jelszoMegerosites) array_push($hibak, "A két jelszó nem egyezik!");
 if (empty($jog)) array_push($hibak, "A jogkör megadása szükséges!");
 $profilkep = $_FILES['profilkep']['name']; 
 if (!empty($profilkep)) {
  $hely = "../statikus/kepek/" . basename($profilkep);
  if (!move_uploaded_file($_FILES['profilkep']['tmp_name'], $hely))
  array_push($hibak, "Képfeltöltési hiba!");
 }
 else
  array_push($hibak, "Tölts fel egy profilképet is!");
 // a duplán történő létrehozás elkerüléséről való meggyőződés 
 // az e-mailnek és a felhasználó névnek egyedinek kell lennie
 $felhasznalo_ellenorzes = "SELECT * FROM felhasznalok WHERE nev='$nev' OR email='$email'";
 $eredmeny = mysqli_query($kapcs, $felhasznalo_ellenorzes); 
 $felhasznalo = mysqli_fetch_assoc($eredmeny);
 if ($felhasznalo) { // ha a felhasználó létezik
  if ($felhasznalo['nev'] === $nev)
  array_push($hibak, "Ez a felhasználónév már létezik!"); 
  if ($felhasznalo['email'] === $email)
  array_push($hibak, "Ez az e-mail cím már létezik!");
 }
 // ha a felhasználó létrehozása során az űrlapon nem fordultak elő hibák
 if (count($hibak) == 0) {
  $jelszo = md5($jelszo); // a jelszó titkosítása mielőtt elmentjük az adatbázisba
  $beszuras = "INSERT INTO felhasznalok (teljesnev, nev, email, jelszo, jog, profilkep, letrehozva, modositva) 
     VALUES('$teljesnev', '$nev', '$email', '$jelszo', '$jog', '$profilkep', now(), '0000-00-00 00:00:00')"; 
  mysqli_query($kapcs, $beszuras);
  $_SESSION['uzenet'] = "A felhasználó létrejött!";
  header('location: felhasznalok.php');
  exit(0);
 }
}

// - Egy felhasználó azonosító paraméterként való átadása megtörténik
// - Lekéri a felhasználót az adatbázisból
// - Beállítja a felhasználó adatmezőit a szerkesztő űrlap alapján
function felhasznaloSzerkeszt($felhaszn_azon) {
 // globálisan definiáljuk az alábbi változókat, hogy az űrlap beviteli elemeknél is hivatkozhassunk rájuk 
 // és az itt a függvény végén nekik adott értékek megjelenhessenek ott a mezőkben, ahol kiíratjuk értéküket 
 global $kapcs, $hibak, $admin, $teljesnev, $nev, $jog, $email, $profilkep, $felhasznSzerkMod;
 if ($admin) {
  $lekerdezes = "SELECT * FROM felhasznalok WHERE azon=$felhaszn_azon";
  $eredmeny = mysqli_query($kapcs, $lekerdezes);
  $felhasznalo = mysqli_fetch_assoc($eredmeny);
  // beállítja az űrlap értékeként (felhasználó név és e-mail) az adatbázisbeli adatokkal a beviteli mezőket 
  $teljesnev = $felhasznalo['teljesnev'];
  $nev = $felhasznalo['nev'];
  $email = $felhasznalo['email'];
  $jog = $felhasznalo['jog'];
  $profilkep = $felhasznalo[' profilkep'];
 } else array_push($hibak, "Nincs jogosultságod a felhasználók adatait szerkeszteni!");
}

// Az űrlapon beállított értékek alapján módosítja a felhasználó adatait az adatbázisban
function felhasznaloModosit($felhasznalo) {
 global $kapcs, $hibak, $jog, $teljesnev, $nev, $felhasznSzerkMod, $felhaszn_azon, $email, $profilkep;
 // változóba menti a felhasználó azonosítóját a módosításhoz
 
 $felhaszn_azon = $felhasznalo['felhaszn_azon']; 
 $felhasznSzerkMod = false;
 $teljesnev = tisztit($felhasznalo['teljesnev']); 
 $nev = tisztit($felhasznalo['nev']);
 $email = tisztit($felhasznalo['email']); 
 $jelszo = tisztit($felhasznalo['jelszo']);
 $jelszoMegerosites = tisztit($felhasznalorjelszoMegerosites1);
 if ($jelszo != $jelszoMegerosites) array_push($hibak, "A két jelszó nem egyezik!");
 $profilkep = $_FILES['profilkep']['name']; 
 if (!empty($profilkep)) {
  $hely = "../statikus/kepek/" . basename($profilkep);
  if (!move_uploaded_file($_FILES['profilkep']['tmp_name'], $hely))
  array_push($hibak, "Képfeltöltési hiba!");
 }
 else
  array_push($hibak, "Tölts fel egy profilképet is!");
 if(isset($felhasznalo['jog'])) 
  $jog = $felhasznalo['jog'];
 // a felhasználó adatainak módosítása, ha nem volt hiba az űrlapon
 if (count($hibak) == 0) {
  $jelszo = md5($jelszo); // a jelszó titkosítása mielőtt elmentjük az adatbázisba
  $modositas = "UPDATE felhasznalok SET teljesnev='$teljesnev', nev='$nev', 
		email='$email', jelszo='$jelszo', jog='$jog', profilkep='$profilkep',
		modositva=now() WHERE azon=$felhaszn_azon"; 
  mysqli_query($kapcs, $modositas); 
  $_SESSION['uzenet'] = "A felhasználó adatai módosultak!";
  header('location: felhasznalok.php'); 
  exit(0);
 }
}

// a felhasználó törlése
function felhasznaloTorol($felhaszn_azon) {
 global $kapcs, $hibak, $admin;
 if ($admin) {
  $torles = "DELETE FROM felhasznalok WHERE azon=$felhaszn_azon"; 
  if (mysqli_query($kapcs, $torles)) {
  $_SESSION['uzenet'] = "A felhasználó törölve lett!"; 
  header("location: felhasznalok.php");
  exit(0);
  }
 } else array_push($hibak, "Nincs jogosultságod felhasználókat törölni!");
}

// KATEGÓRIA MŰVELETEK VÉGREHAJTÁSA 
if ($kuldo_fajl=="kategoriak") {
// ha a látogató rákattint a kategória létrehozás gombra 
if (isset($_POST['létrehoz'])) { 
	kategoriaLetrehoz($_POST);
}
// ha a látogató rákattint a kategória szerkesztés gombra 
if (isset($_GET['szerkeszt'])) {
	$kategSzerkMod = true;
	$kateg_azon = $_GET['szerkeszt']; 
	kategoriaSzerkeszt($kateg_azon);
}
// ha a látogató rákattint a kategória módosítás gombra 
if (isset($_POST['modosit'])) {
	kategoriaModosit($_POST);
}
// ha a látogató rákattint a kategória törlés gombra 
if (isset($_GET['torol'])) {
$kateg_azon = $_GET['torol']; 
kategoriaTorol($kateg_azon);
}
}
/*----------------------
Kategória függvények
---------------------*/
// Visszatér az összes kategóriával 
function getKategoriak() { 
global $kapcs;
$lekerdezes = "SELECT * FROM kategoriak";
$eredmeny = mysqli_query($kapcs, $lekerdezes); 
$kategoriak = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC); 
return $kategoriak;
}

function kategoriaLetrehoz($kategoria) { 
global $kapcs, $hibak, $cimke;
$cimke = tisztit($kategoria['címke']);
// létrehoz egy URL-képes karakterláncot a címkéből 
$cimke_url = keszitURLbe($cimke);
// űrlapérvényességi vizsgálat 
if (empty($cimke))
array_push($hibak, "A kategória címke üres maradt!");
// a duplán létrehozott kategória címke elkerüléséről való meggyőződés 
$kategoria_ellenorzes = "SELECT * FROM kategóriák WHERE cimke_url='$cimke_url’";
$eredmeny = mysqli_query($kapcs, $kategoria_ellenorzes); 
if (mysqli_num_rows($eredmeny) > 0) // ha a kategória létezik 
array_push($hibak, "Ilyen kategória már előbb létre lett hozva!");
// elmenti a kategóriát ha nem volt hiba az űrlapon 
if (count($hibak) == 0) {
$beszuras = "INSERT INTO kategóriák (címke, cimke_url) VALUES ('$cimke', '$cimke_url')"; 
mysqli_query($kapcs, $beszuras);
$_SESSION['üzenet'] = "A kategória sikeresen létrejött!";
header('location: kategoriak.php');
exit(0);
}
}

function kategoriaSzerkeszt($kateg_azon) {
// globálisan definiáljuk az alábbi változókat, hogy az űrlap beviteli elemeknél is hivatkozhassunk rájuk 
// és az itt a függvény végén nekik adott értékek megjelenhessenek ott a mezőkben, ahol kiíratjuk értéküket 
global $kapcs, $hibak, $admin, $cimke, $kategSzerkMod; 
if ($admin) {
$lekerdezes = "SELECT * FROM kategóriák WHERE azon=$kateg_azon";
$eredmeny = mysqli_query($kapcs, $lekerdezes);
$kategoria = mysqli_fetch_assoc($eredmeny);
// beállítja az űrlap értékeként (címke) az adatbázisbeli adatokkal a beviteli mezőt 
$cimke = $kategoria['címke'];
} else array_push($hibak, "Nincs jogosultságod egy kategória címkéjét megváltoztatni!");
}

function kategoriaModosit($kategoria) { 
global $kapcs, $hibak, $cimke, $kateg_azon;
$cimke = tisztit($kategoria['címke']);
$kateg_azon = tisztit($kategoria['kateg_azon']);
// létrehoz egy URL-képes karakterláncot a címkéből 
$cimke_url = keszitURLbe($cimke);
// az űrlap ellenőrzése if (empty($cimke))
array_push($hibak, "A kategória címke üres maradt!");
// eltárolja a kategóriát, ha nincs hiba az űrlapon 
if (count($hibak) == 0) {
$modositas = "UPDATE kategóriák SET cimke='$cimke', cimke_url='$cimke_url' WHERE azon=$kateg_azon"; 
mysqli_query($kapcs, $modositas);
$_SESSION['üzenet'] = "A kategória sikeresen módosult!"; 
header('location: kategóriák.php'); 
exit(0);
}
}
function kategoriaTorol($kateg_azon) { 
global $kapcs, $hibak, $admin; 
if ($admin) {
$torles = "DELETE FROM kategóriák WHERE azon=$kateg_azon"; 
if (mysqli_query($kapcs, $torles)) {
$_SESSION['üzenet'] = "A kategória törlésre került!"; 
header("location: kategóriák.php"); 
exit(0);
}
} else array_push($hibak, "Nincs jogosultságod kategóriatörlésre!");
}


// BEJEGYZÉSMŰVELETEK VÉGREHAJTÁSA 
if ($kuldo_fajl=="bejegyzesek") {
// ha a felhasználó rákattint a bejegyzés létrehozás gombra 
if (isset($_POST['létrehoz'])) {
$bejegyzUrlapMod = true; 
bejegyzesLetrehoz($_POST);
}
// ha a felhasználó rákattint a bejegyzés szerkesztés gombra 
if (isset($_GET['szerkeszt'])) {
$bejegyzSzerkMod = true;
$bejegyzUrlapMod = true;
$bejegyz_azon = $_GET['szerkeszt']; 
bejegyzésSzerkeszt($bejegyz_azon);
}
// ha a felhasználó rákattint a bejegyzés módosítás gombra 
if (isset($_POST['modosit'])) { 
bejegyzesModosit($_POST);
}
// ha a felhasználó rákattint a bejegyzés törlés gombra 
if (isset($_GET['torol'])) {
$bejegyz_azon = $_GET['torol']; 
bejegyzesTorol($bejegyz_azon);
}
}

// BEJEGYZÉS FÜGGVÉNYEK
// Visszaadja az összes bejegyzést az adatbázisból 
function getBejegyzesek() { 
global $kapcs, $admin;
$lekerdezes = "SELECT * FROM bejegyzesek";
$eredmeny = mysqli_query($kapcs, $lekerdezes);
$bejegyzesek = mysqli_fetch_all($eredmeny, MYSQLI_ASSOC);
$veglegesitett_bejegyzesek = array(); 
foreach ($bejegyzesek as $bejegyzes) {
$bejegyzes['iro'] = getBejegyzesIrojaAzonositojaAlapjan($bejegyzes['felhaszn_azon']); 
array_push($veglegesitett_bejegyzesek, $bejegyzes);
}
return $veglegesitett_bejegyzesek;
}

function bejegyzesLetrehoz($bejegyzes) { 
global $kapcs, $hibak, $cim, $kep, $bejegyz_azon, $szoveg, $kozzetett;
$cim = tisztit($bejegyzes['cim']); 
$szoveg = tisztit($bejegyzes['szöveg']); 
if (isset($bejegyzés['kateg_azon']))
$kateg_azon = tisztit($bejegyzés['kateg_azon']); 
if (isset($bejegyzés['közzétett']))
$kozzetett = tisztit($bejegyzes['közzétett']);
// létrehoz egy URL-képes karakterláncot a címből 
$cim_url = keszitURLbe($cim);
$felhaszn_azon=$_SESSION['felhasználó']['azon'];
// űrlapérvényességi vizsgálat
if (empty($cim)) array_push($hibak, "A bejegyzés címének megadása kötelező!"); 
if (empty($szoveg)) array_push($hibak, "A bejegyzésnek nem írtál semmit!"); 
if (empty($kateg_azon)) array_push($hibak, "A bejegyzés kategóriához rendelése szükséges!");
$kep = $_FILES['kép']['name']; 
if (!empty($kep)) {
$hely = "../statikus/kepek/" . basename($kep); 
if (!move_uploaded_file($_FILES['kép']['tmp_name'], $hely)) 
	array_push($hibak, "Képfeltöltési hiba!");
}
// a duplán történő bejegyzésrögzítés elkerüléséről való meggyőződés 
$bejegyzes_ellenorzes = "SELECT * FROM bejegyzések WHERE cim_url='$cim_url'";
$eredmeny = mysqli_query($kapcs, $bejegyzes_ellenorzes); 
if (mysqli_num_rows($eredmeny) > 0) // ha a bejegyzés létezik 
array_push($hibak, "Ilyen című bejegyzés már létezik!");
// ha a bejegyzés létrehozása során az űrlapon nem fordultak elő hibák 
if (count($hibak) == 0) {
$beszuras = "INSERT INTO bejegyzések (felhaszn_azon, cim, cim_url, kép, szöveg, közzétett, létrehozva, módosítva)
VALUES ($felhaszn_azon, '$cim', '$cim_url', '$kep', '$szoveg', $kozzetett, now(), '0000-00-00 00:00:00')"; 
if (mysqli_query($kapcs, $beszuras)){ // ha a bejegyzés sikeresen létrejött 
$bejegyz_azon = mysqli_insert_id($kapcs);
// kapcsolat létrehozása a bejegyzés és a kategória között
$beszuras = "INSERT INTO bejegyzes_kategoria (bejegyz_azon, kateg_azon) VALUES($bejegyz_azon, $kateg_azon)"; 
mysqli_query($kapcs, $beszuras);
$_SESSION['üzenet'] = "A bejegyzés sikeresen létrejött!"; 
header('location: bejegyzések.php'); 
exit(0);
}
}
}

// - Egy bejegyzés azonosító paraméterként való átadása megtörténik 
// - Lekéri a bejegyzést az adatbázisból
// - Beállítja a bejegyzés adatmezőit a szerkesztő űrlap alapján 
function bejegyzesSzerkeszt($bejegyz_azon) {
// globálisan definiáljuk az alábbi változókat, hogy az űrlap beviteli elemeknél is hivatkozhassunk rájuk 
// és az itt a függvény végén nekik adott értékek megjelenhessenek ott a mezőkben, ahol kiíratjuk értéküket 
global $kapcs, $hibak, $admin, $cim, $cim_url, $szoveg, $kozzetett, $bejegyzSzerkMod, $kep, $cimke;
$lekerdezes = "SELECT bejegyzések.cim, bejegyzések.kép, bejegyzések.szöveg, bejegyzések.közzétett, bejegyzések.felhaszn_azon, kategóriák.címke
	FROM kategóriák INNER JÓIN (bejegyzések INNER JÓIN bejegyzes_kategoria ON bejegyzések.azon = bejegyzes_kategoria.bejegyz_azon)
	ON kategóriák.azon = bejegyzes_kategoria.kateg_azon WHERE bejegyzések.azon=$bejegyz_azon";
$eredmeny = mysqli_query($kapcs, $lekerdezes);
$bejegyzes = mysqli_fetch_assoc($eredmeny);
if ($admin || $bejegyzes['felhaszn_azon'] == $_SESSION['felhasznalo']['azon']) {
// beállítja az űrlap értékeként az adatbázisbeli adatokkal a beviteli mezőket 
$cim = $bejegyzés['cim'];
$kep = $bejegyzés['kép'];
$szoveg = $bejegyzés['szöveg'];
$kozzetett = $bejegyzes['kozzetett'];
$cimke= $bejegyzés['címke'];
} else array_push($hibak, "Csak a saját bejegyzéseidet szerkesztheted!");
}

function bejegyzesModosit($bejegyzes) {
global $kapcs, $hibak, $bejegyz_azon, $cim, $kep, $kateg_azon, $szoveg, $kozzetett;
$cim = tisztit($bejegyzes['cim']); 
$szoveg = tisztit($bejegyzes['szoveg']);
$bejegyz_azon = tisztit($bejegyzes['bejegyz_azon']);
$kateg_azon = tisztit($bejegyzes['kateg_azon']); 
$kozzetett = isset($bejegyzes['kozzetett']) ? 1 : 0;
// létrehoz egy URL-képes karakterláncot a címből 
if (empty($cim))
array_push($hibak, "A bejegyzésnek kötelező címet adni!");
$cim_url = keszitURLbe($cim); 
if (empty($szoveg))
array_push($hibak, "A bejegyzésbe nem írtál semmit!");
// ha a kiemelt kép átküldésre került 
$kep = $_FILES['kep']['name']; 
if (!empty($kep)) {
$hely = "../statikus/kepek/" . basename($kep); 
if (!move_uploaded_file($_FILES['kep']['tmp_name'], $hely)) 
	array_push($hibak, "Képfeltöltési hiba!");
}
// elmenti a bejegyzést ha nem volt hiba az űrlapon 
if (count($hibak) == 0) {
$modositas = "UPDATE bejegyzések SET cim='$cim', cim_url='$cim_url', kep='$kep', szoveg='$szoveg', kozzetett=$kozzetett, modositva=now() WHERE azon=$bejegyz_azon"; 
// hozzácsatolja a kategóriához a bejegyzést bejegyzes_kategoria táblában 
if(mysqli_query($kapcs, $modositas)){ // ha a lekérdezés eredményes volt 
if (isset($kateg_azon)) {
// kapcsolat létrehozása a bejegyzés és a kategória között
$modositas = "UPDATE bejegyzes_kategoria SET kateg_azon=$kateg_azon WHERE bejegyz_azon=$bejegyz_azon"; 
mysqli_query($kapcs, $modositas);
$_SESSION['üzenet'] = "A bejegyzés sikeresen módosult!"; 
header('location: bejegyzések.php'); 
exit(0);
}
}
}
}

function bejegyzesTorol($bejegyz_azon) { 
global $kapcs, $hibak, $admin;
$felhaszn_azon = getBejegyzesIro($bejegyz_azon)['azon'];
if ($admin || $felhaszn_azon == $_SESSION['felhasznalo']['azon']) {
$torles = "DELETE FROM bejegyzések WHERE azon=$bejegyz_azon"; 
if (mysqli_query($kapcs, $torles)) {
$_SESSION['üzenet'] = "A bejegyzés törlésre került!"; 
header("location: bejegyzések.php"); 
exit(0);
}
} else array_push($hibak, "Csak a saját bejegyzéseidet törölheted!");
}

// visszaadja bejegyzés írójának nevét
function getBejegyzesIrojaAzonositojaAlapjan($felhaszn_azon) { 
global $kapcs;
$lekerdezes = "SELECT teljesnev FROM felhasználok WHERE azon=$felhaszn_azon";
$eredmeny = mysqli_query($kapcs, $lekerdezes); 
if ($eredmeny)
return mysqli_fetch_assoc($eredmeny)['teljesnev']; 
else
return null;
}

// ha a felhasználó rákattint a bejegyzés közzétesz gombra 
if (isset($_GET['publikus']) || isset($_GET['publikalatlan'])) {
$uzenet = "";
if (isset($_GET['publikus'])) {
$uzenet = "A bejegyzés nyilvánossá téve!";
$bejegyz_azon = $_GET['publikus'];
} else if (isset($_GET['publikalatlan'])) {
$uzenet = "A bejegyzés a nyilvánosságtól elvonva!";
$bejegyz_azon = $_GET['publikalatlan'];
}
bejegyzesNyilvanossagiKapcsolo($bejegyz_azon, $uzenet);
}


// bejegyzés nyilvánossági kapcsoló
function bejegyzesNyilvanossagiKapcsolo($bejegyz_azon, $uzenet) { 
global $kapcs, $hibak, $admin; 
if ($admin) {
$modositas = "UPDATE bejegyzések SET közzétett = !közzétett WHERE azon=$bejegyz_azon"; 
if (mysqli_query($kapcs, $modositas)) {
$_SESSION['üzenet'] = $uzenet; 
header("location: bejegyzések.php"); 
exit(0);
}
} else 
array_push($hibak, "Nincs jogosultságod ahhoz, hogy a bejegyzést a nyilvánosság elé tárd!");
}

// létrehoz egy URL-képes láncot
function keszitURLbe($karakterlanc) {
$karakterlanc = mb_strtolower($karakterlanc, 'UTF-8');
$magyar = array('/é/','/É/','/á/','/Á/','/ó/','/Ó/','/ö/','/Ö/','/ő/','/Ő/','/ú/','/Ú/','/ű/','/Ű/','/ü/','/Ü/','/í/','/Í/','/ /');
$angol = array('e','E','a','A','o','O','o','O','o','O','u','U','u','U','u','U','i','i','-');
$url_kepes = preg_replace($magyar,$angol,$karakterlanc);
return $url_kepes;
}

?>