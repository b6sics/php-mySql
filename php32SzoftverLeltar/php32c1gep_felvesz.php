<?php

$hely = $_GET['gep_hely'];
$tipus = $_GET['gep_tipus'];
$ip = $_GET['gep_ip'];
if ($lekerdezes = mysqli_query($kapcs, "INSERT INTO gep VALUES (NULL,'$hely','$tipus','$ip');")) {
?>
    <details open>
        <summary>A 'gep' tábla tartalma a következő rekorddal bővült:</summary>
        <table>
            <tr>
                <th>Id</th>
                <th>Hely</th>
                <th>Tipus</th>
                <th>IP-cím</th>
            </tr>

            <?php
            echo "  <tr>\n";
            echo "  <td>" . 'NULL' . "</td>\n";
            echo "  <td>" . $hely . "</td>\n";
            echo "  <td>" . $tipus . "</td>\n";
            echo "  <td>" . $ip . "</td>\n";
            echo "  </tr>\n";
            ?>

        </table>
    </details>
<?php
} else {
?>
    <details open>
        <summary>A 'gep' tábla tartalma nem változott:</summary>
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