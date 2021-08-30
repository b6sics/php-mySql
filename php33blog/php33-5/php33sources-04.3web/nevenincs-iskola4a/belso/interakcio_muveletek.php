<?php
// változó deklaráció
$nev = "";
$email = "";
$te1jesnev = "";
$profilkep = "";
$hibak = array();

// Felkésziti az űrlapról érkező adatokat a további műveletvégzésre
function felkeszit($karakterlanc) {
    global $kapcs;
    // eltávolítja a karakterláncot körülvevő üres helyeket
    $karakterlanc = trim($karakterlanc);
    $karakterlanc = mysqli_real_escape_string($kapcs, $karakterlanc);
    return $karakterlanc;
}

// Visszaadja a felhasználó adatait annak azonosítója alapján
function getFelhasznaloAzonositojaAlapjan($azon) {
    global $kapcs;
    $lekerdezes = "SELECT * FROM felhasznalok WHERE azon=$azon";
    $eredmeny = mysqli_query($kapcs, $lekerdezes);
    $felhasznalo = mysqli_fetch_assoc($eredmeny);
    // visszatér a felhasználóval tömb formátumban
    return $felhasznalo;
}
 
// FELHASZNÁLÓ REGISZTRÁCIÓ
if (isset($_POST['regisztracio_gomb'])) {

    // megkapja az űrlap összes beviteli elemének az értékét
    $teljesnev = felkeszit($_POST['teljesnev']);
    $nev = felkeszit($_POST['nev']);
    $emáil = felkeszit($_POST['email']);
    $jelszo_1 = felkeszit($_POST['jelszo_1']);
    $jelszo_2 = felkeszit($_POST['jelszo_2']);

    // űrlap értékvizsgálat: helyesen lettek—e bevíve az adatok
    if (empty($teljesnev)) { array_push($hibak, "Add meg a teljes nevedet!"); }
    if (empty($nev)) { array_push($hibak, "A felhasználónév megadása kötelezől"); }
    if (empty($email)) { array_push($hibak, "Hiányzik az e—mail ciml"); }
    if (empty($jelszo_1)) { array_push($hibak, "Kimaradt a jelszó!"); }
    if ($jelszo_1 != $jelszo_2) { array_push($hibak, "A két jelszó nem egyezik!"); }

    $profilkep = $_FILES['profilkep']['name'];
    if (!empty($profilkep)) {
        $hely = "./statikus/kepek/" . basename($profilkep);
        if (!move_uploaded_file($_FILES['profilkep']['tmp_name'], $hely)){
            array_push($hibak, "Képfeltöltési hiba!");
        }
    } else {
        array_push($hibak, "Tölts fel egy profilképet is!");
    }

    // a duplán történő regisztráció elkerüléséről való meggyőződés
    // az e—mailnek és a felhasználó névnek egyedinek kell lennie
    $felhasznalo_ellenorzes = "SELECT * FROM felhasznalok WHERE nev='$nev' OR email='$email'";
    $eredmeny = mysqli_query($kapcs, $felhasznalo_ellenorzes);
    $felhasznalo = mysqli_fetch_assoc($eredmeny);

    if ($felhasznalo) { // ha felhasználó létezik
        if ($felhasznalo['nev'] === $nev) {
            array_push($hibak, "Ez a felhasználónév már létezik!");
        }
        if ($felhasznalo['email'] === $email) {
            array_push($hibak, "Ez az e—mail cím már létezik!");
        }
    }

    // ha nem történt hiba a regisztrációs űrlapon
    if (count($hiba) == 0) {
        $jelszo = md5($jelszo_1); // a jelszó titkosítása mielőtt elmentjük az adatbázisba
        $beszuras = "INSERT INTO felhasznalok (teljesnev, nev, email, jelszo, jog, profilkep, létrehozva, modositva)
             VALUES('$teljesnev', '$nev', '$email', '$jelszo', 'tag', '$profilkep', now(), '0000—00—00 00:00:00')";
        mysqli_query($kapcs, $beszuras);

    // a regisztráció során generált felhasználó azonosító lekérése
    $reg_felhaszn_azon = mysqli_insert_id($kapcs);

    // a bejelentkezett felhasználó tárolása a session tömbben
    $_SESSION['felhasznalo'] = getFelhasznaloAzonositojaAlapjan($reg_felhaszn_azon);
    $_SESSION['uzenet'] = "Be vagy jelentkezve";

    // átirányítás nyílvános területre
    header('location: index.php');
    exit(0);
    }
}

// FELHASZNÁLÓ BELÉPTETÉS
if (isset($_POST['bejelentkezes_gomb'])) {
    $nev = felkeszit($_POST['nev']);
    $jelszo = felkeszit($_POST['jelszo']);

    if (empty($nev)) { array_push($hibak, "A felhasználó név szükséges!"); }
    if (empty($jelszo)) { array_push($hibak, "A jelszót kötelező megadni!"); }
    if (empty($hibak)) {
        $jelszo = md5($jelszo); // jelszó titkosítás
        $lekerdezes = "SELECT * FROM felhasznalok WHERE nev='$nev' AND jelszo='$jelszo'";
        $eredmeny = mysqli_query($kapcs, $lekerdezes);
        if (mysqli_num_rows($eredmeny) > 0) {
            // lekéri a felhasználó azonosítóját
            $reg_felhaszn_azon = mysqli_fetch_assoc($eredmeny)['azon'];
            // a bejelentkezett felhasználó tárolása a session tömbben
            $_SESSION['felhasznalo'] = getFelhasznaloAzonositojaAlapjan($reg_felhaszn_azon);
            // ha a felhasználó a szerkesztői jogosultsággal rendelkező csoport tagja,
            // akkor átkerül a vezérlőpultra
            if (in_array($_SESSION['felhasznalo']['jog'], ["admin", "szerzo"])) {
                $_SESSION['uzenet'] = "Be vagy jelentkezve " . $_SESSION['felhasznalo']['teljesnev'];

                // átirányítás weblapszerkesztőí területre
                header('location: ' . ALAP_URL . 'szerk/vezerlopult.php');
                exit(0);
            } else {
                $_SESSION['uzenet'] = "üdvözöllek " . $_SESSION['felhasznalo']['teljesnev'];
                // átirányítás nyilvános területre
                header('location: index.php');
                exit(0);
            }
        } else {
            array_push($hibak, 'Helytelen hitelesítő adatokl');
        }
    }
}


// PROEILADATOK MEGVÁLTOZTATÁSA
if (isset($_POST['profil_gomb'])) {
    $te1jesnev = felkeszit($_POST['teljesnev']);
    $nev = $_POST['nev'];
    $emai1 = felkeszit($_POST['email']);
    $jelszo_regi = felkeszit($_POST['jelszo_regi']);
    $jelszo_uj = felkeszit($_POST['jelszo_uj']);
    $jelszo_megerosites = felkeszit($_POST['jelszo_megerosites']);

    // űrlap értékvizsgálat= nelyesen lettek—e bevive az adatok
    if (empty($teljesnev)) { 
        array_push($hibak, "Ha változott a teljes neved, akkor ne hagyd üresen!"); 
    }
    if (empty($email)) {
        array_push($hibak, "üresen maradt az e-mail cím mező!"); 
    }
    if (empty($jelszo_regi)) {
        array_push($hibak, "Biztonsági okokból fontos megadnod a régi jelszodat!"); 
    }
    if (empty($jelszo_uj)) {
        array_push($hibak, "Az új jelszót okvetlenül be kell irnod!"); 
    }
    if ($jelszo_uj != $jelszo_megerosites) { 
        array_push($hibak, "Az újonnan megadott jelszavak nem egyeznek!"); 
    }

    $profilkep = $_FILES['profilkep']['name'];
    if (!empty($profilkep)) {
        $hely = "../statikus/kepek/" . basename($profilkep);
        if (!move_uploaded_fi1e($_FILES['profilkep']['tmp_name'], $hely))
        array_push($hibak, "Kepfeltöltési hiba!");
    } else {
        array_push($hibak, "Tölts fel egy profilképet is!");
    }

    // nem adott—e meg esetleg pont egy olyan e—mail cimet, ami már megtalálható az adatbázisban
    $jelszo = md5($je1szo_regi);

    $lekerdezes = "SELECT * FROM felhasznalok WHERE nev='$nev' AND jelszo='$jelszo'";
    $eredmeny = mysqli_query($kapcs, $lekerdezes);

    if (mysqli_num_rows($eredmeny) > 0) {                     // ha jól adta meg a régi jelszavát
        $lekerdezes = "SELECT azon,email FROM felhasznalok WHERE email='$email'";
        $eredmeny = mysqli_query($kapcs, $lekerdezes);
        $felhasznalo = mysq1i_fetch_assoc($eredmeny);

        if (mysqli_num_rows($eredmeny) > 0 && $fe1hasznalo['azon'] != $_SESSION['felhasznalo']['azon']) {
            array_push($hibak, "Ez az e-mail cím már létezik!");
        }
    } else {
        array_push($hibak, 'Helytelen hitelesítő adatokl');
    }

    // ha nem történt hiba a profiladatok megváltoztatásakor
    if (count($hibak) == 0) {

        $jelszo_uj = md5($jelszo_uj);      // a jelszó titkosítása mielőtt elmentjük az adatbázisba

        $modositas = "UPDATE felhasznalok SET teljesnev='$teljesnev', email='$email', 
                      jelszo='$jelszo_uj', profilkep='$profilkep', modositva=now() 
                      WHERE azon=" . $_SESSION['felhasznalo']['azon'];
        $eredmeny = mysqli_query($kapcs, $modositas);

        $_SESSION['felhasznalo']['email'] = $email;
        $_SESSION['uzenet'] = "A profiladataid módosultak!";
    }
}

// KAPCSOLATFELVÉTEL UZENETKULDÉSSEL
if (isset($_POST['kapcsolat_gomb'])) {
    // az elküldött űrlapadatok változókba mentése
    $teljesnev = $_POST['teljesnev'];
    $email = $_POST['email'];
    $targy = $_POST['targy'];
    $uzenet = $_POST['uzenet'];

    // formázott e—mail küldéséhez HTML típusúra kell állítani a tartalom típusát
    $fejlec[] = "MIME—Version: 1.0";
    $fejlec[] = "Content—type: text/html; charset:UTF—8";
    // további fejlécelémek: kinek, kitől, másolat és titkos másolat
    $fejlec[] = "To: Gránit Dávid (granit—david@gmail.com)";
    $fejlec[] = "From: $teljesnev ($email)";
    $fejlec[] = "Cc: Net Elek (netelek@hotmail.com)";
    $fejlec[] = "Bcc: Toldi Gábor (tolditanarur@gmail.com)";

    // az eredeti üzenet formázásitása, HTML kódba ágyazása
    $formazott_uzenet = "
    <html>
    <head>
    <title>Új üzenet a weboldal kapcsolat űrlapjáról</title>
    </head>
    <body>
    <h1>$teljesnev a következő témában ($targy) küldte az alábbi üzenetet:<h1>
    <p>$uzenet</p>
    </body>
    </html>";

    // az e—mail küldő függvény, amelynek utolsó paramétérül a fejléc tömb elemeit
    // sortörésekkél ellátva és karakterlánccá alakítva kapja meg
    mail('granit—david@gmail.com', $targy, $formazott_uzenet, implode("\r\n", $fejlec));
}
 
?>
