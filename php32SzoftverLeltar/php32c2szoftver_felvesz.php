<?php

$id = $_GET['szoftver_id'];
$nev = $_GET['szoftver_nev'];
$kategoria = $_GET['szoftver_kategoria'];
if ($lekerdezes = mysqli_query($kapcs, "INSERT INTO szoftver VALUES ('$id','$nev','$kategoria');")) {
?>
    <details open>
        <summary>A 'szoftver' tábla tartalma a következő rekorddal bővült:</summary>
        <table>
            <tr>
                <th>Id</th>
                <th>Név</th>
                <th>Kategória</th>
            </tr>

            <?php
            echo "  <tr>\n";
            echo "  <td>" . $id . "</td>\n";
            echo "  <td>" . $nev . "</td>\n";
            echo "  <td>" . $kategoria . "</td>\n";
            echo "  </tr>\n";
            ?>

        </table>
    </details>
<?php
} else {
?>
    <details open>
        <summary>A 'szofver' tábla tartalma nem változott:</summary>
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