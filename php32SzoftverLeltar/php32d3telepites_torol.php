<?php

$gepid = $_GET['telepites_gepid'];
$szoftverid = $_GET['telepites_szoftverid'];
$verzio = $_GET['telepites_verzio'];
$datum = $_GET['telepites_datum'];

if ($lekerdezes = mysqli_query($kapcs, "SELECT id FROM telepites 
                  WHERE gepid = '$gepid' AND szoftverid = '$szoftverid' AND verzio = '$verzio' AND datum = '$datum';")) {
    $rekord = mysqli_fetch_array($lekerdezes);
    $id = $rekord['id'];
}

if ($lekerdezes = mysqli_query($kapcs, "DELETE FROM telepites 
                  WHERE gepid = '$gepid' AND szoftverid = '$szoftverid' AND verzio = '$verzio' AND datum = '$datum';")) {

    if (mysqli_affected_rows($kapcs) > 0) {
?>
        <details open>
            <summary>A 'telepites' táblból a következő rekord törlődött:</summary>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Gép Id</th>
                    <th>Sziftver Id</th>
                    <th>Verzió</th>
                    <th>Dátum</th>
                </tr>

                <?php
                echo "  <tr>\n";
                echo "  <td>" . $id . "</td>\n";
                echo "  <td>" . $gepid . "</td>\n";
                echo "  <td>" . $szoftverid . "</td>\n";
                echo "  <td>" . $verzio . "</td>\n";
                echo "  <td>" . $datum . "</td>\n";
                echo "  </tr>\n";
                ?>

            </table>
        </details>
    <?php
    } else {
    ?>
        <details open>
            <summary>A 'telepites' tábla tartalma nem változott!</summary>
        </details>
    <?php
    }
} else {
    ?>
    <details open>
        <summary>A 'telepites' tábla tartalma nem változott:</summary>
        <table>
            <?php
            echo "  <tr>\n";
            echo "  <td>" . "MySqli hiba (" . mysqli_errno($kapcs) . "): " . mysqli_error($kapcs) . "</td>\n";
            echo "  </tr>\n";
            ?>
        </table>
    </details>
<?php
}
?>

<p>

</p>