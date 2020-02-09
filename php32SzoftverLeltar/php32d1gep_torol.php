<?php

$hely = $_GET['gep_hely'];
$tipus = $_GET['gep_tipus'];
$ip = $_GET['gep_ip'];

if ($lekerdezes = mysqli_query($kapcs, "SELECT id FROM gep WHERE hely = '$hely' AND tipus = '$tipus' AND ipcim = '$ip';")) {
    $rekord = mysqli_fetch_array($lekerdezes);
    $id = $rekord['id'];
}

if ($lekerdezes = mysqli_query($kapcs, "DELETE FROM gep WHERE hely = '$hely' AND tipus = '$tipus' AND ipcim = '$ip';")) {

    if (mysqli_affected_rows($kapcs) > 0) {
?>
        <details open>
            <summary>A 'gep' táblból a következő rekord törlődött:</summary>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Hely</th>
                    <th>Tipus</th>
                    <th>IP-cím</th>
                </tr>

                <?php
                echo "  <tr>\n";
                echo "  <td>" . $id . "</td>\n";
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
            <summary>A 'gep' tábla tartalma nem változott!</summary>
        </details>
    <?php
    }
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