<?php

$gepid = $_GET['telepites_gepid'];
$szoftverid = $_GET['telepites_szoftverid'];
$verzio = $_GET['telepites_verzio'];
$datum = $_GET['telepites_datum'];
if ($lekerdezes = mysqli_query($kapcs, "INSERT INTO telepites VALUES (NULL,'$gepid','$szoftverid','$verzio','$datum');")) {
?>
    <details open>
        <summary>A 'telepites' tábla tartalma a következő rekorddal bővült:</summary>
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
            echo "  <td>" . 'NULL' . "</td>\n";
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