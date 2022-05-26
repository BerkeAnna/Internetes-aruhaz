<?php
/*try {
    if (isset($_POST["adminid"])) {
        include_once "../scripts/Muveletek.php";
        $torles = new Muveletek();
        $torles->valtozokTisztitas();
        $torles->torles("DELETE FROM KARBANTART WHERE ADMINID = :adminid and TERMEKID = :termekid", "karbantart");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}*/
?>

<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">

<table border="1">
    <tr>
        <th>Admin ID</th>
        <th>Termék ID</th>
        <th>Termék feltöltés dátuma</th>
        <th>Mejegyzés</th>
    </tr>
    <?php
    include_once ('..\scripts\Karbantart.php');
    $stid = karbantartLeker();

    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
        echo '<form method="post">';
        echo '<tr>';
        echo '<td>' . $row['ADMINID'] . '</td>';
        echo '<td>' . $row['TERMEKID'] . '</td>';
        echo '<td>' . $row['MODOSITASDATUM'] . '</td>';
        echo '<td>' . $row['MEGJEGYZES'] . '</td>';
        /*echo '<td>
                <input type="submit" class="torles" value="Törlés">
              </td>';*/
        echo '</tr>';

        echo '<input type="hidden" name="adminid" value="' . $row['ADMINID'] . '">';
        echo '<input type="hidden" name="termekid" value="' . $row['TERMEKID'] . '">';

        echo '</form>';
    }
    oci_free_statement($stid);
    ?>
</table>
