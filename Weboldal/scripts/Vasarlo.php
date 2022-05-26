<?php
include_once ('csatlakozas.php');

function termekLeker() {
    $stid = oci_parse(csatlakozas(), 'SELECT * FROM VASARLO');
    oci_execute($stid);
    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>Felhasználónév</td>
            <td>Jelszó</td>
            <td>Név</td>
            <td>Email</td>
            <td>Születési dátum</td>
            <td>Szállítási cím</td>
            <td>Számlaszám</td>
        </tr>
        <?php
        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo "<tr>";
            echo "<td>" . sprintf('<p>%s</p>', $row['ID']) . "</td>";
            echo "<td>" . sprintf('<p>%s</p>', $row['FELHASZNALONEV']) . "</td>";
            echo "<td>" . sprintf('<p>%s</p>', $row['JELSZO']) . "</td>";
            echo "<td>" . sprintf('<p>%s</p>', $row['NEV']) . "</td>";
            echo "<td>" . sprintf('<p>%s</p>', $row['EMAIL']) . "</td>";
            echo "<td>" . sprintf('<p>%s</p>', $row['SZULDATUM']) . "</td>";
            echo "<td>" . sprintf('<p>%s</p>', $row['SZALLITASICIM']) . "</td>";
            echo "<td>" . sprintf('<p>%d</p>', $row['SZAMLASZAM']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    oci_free_statement($stid);
}
?>
<?php
termekLeker();
?>