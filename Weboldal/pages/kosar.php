<?php
session_start();
if(empty($_SESSION["adatok"]["id"])) {
    header("Location: kezdolap");
}
$adatok = $_SESSION["adatok"];

try {
    if (isset($_POST["delete"])) {
        unset($_POST["delete"]);
        unset($_POST["mennyiseg"]);
        include_once "scripts/Muveletek.php";
        $torles = new Muveletek();
        $torles->valtozokTisztitas();
        $torles->torles("DELETE FROM KOSAR WHERE VASARLOID=:vasarloid AND TERMEKID=:termekid", "kosar");
    }

    if (isset($_POST["modify"])) {
        unset($_POST["modify"]);
        include_once "scripts/Muveletek.php";
        $modositas = new Muveletek();
        $modositas->valtozokTisztitas();
        $modositas->modositas("UPDATE KOSAR SET MENNYISEG=:mennyiseg WHERE VASARLOID=:vasarloid AND TERMEKID=:termekid", "kosar");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<link href="CSS/kosar.css" type="text/css" rel="stylesheet">
<div class="container">
    <form method="post" autocomplete="off">
        <div class="row">
            <table border="1">
                <tr>
                    <th>Termék</th>
                    <th>Mennyiség</th>
                </tr>
                <?php
                include_once "scripts/Muveletek.php";
                $stmt = new Muveletek();
                $stid = $stmt->leker("SELECT KOSAR.VASARLOID, KOSAR.TERMEKID, NEV, MENNYISEG FROM TERMEK LEFT JOIN KOSAR ON TERMEK.ID = KOSAR.TERMEKID 
                                    WHERE VASARLOID = " . $adatok["id"]);

                while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
                    echo '<form method="post">';
                    echo '<tr>';
                    echo '<td>' . $row['NEV'] . '</td>';
                    echo '<td><input type="text" name="mennyiseg" value="'.$row['MENNYISEG'].'"></td>';
                    echo '<td>
                            <input type="submit" class="torles" name="delete" value="Törlés">
                          </td>';
                    echo '<td>
                            <input type="submit" class="modositas" name="modify" value="Módosítás">
                          </td>';
                    echo '</tr>';

                    echo '<input type="hidden" name="vasarloid" value="' . $row['VASARLOID'] . '">';
                    echo '<input type="hidden" name="termekid" value="' . $row['TERMEKID'] . '">';

                    echo '</form>';
                }

                include_once "scripts/Muveletek.php";
                $stmt = new Muveletek();
                $stid = $stmt->leker("SELECT SUM(MENNYISEG*AR) AS OSSZEG FROM KOSAR LEFT JOIN TERMEK ON KOSAR.TERMEKID=TERMEK.ID ");

                while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
                    echo '
                            <div class="termek-nev">Teljes összeg: </div>
                            '. $row['OSSZEG'].'FT
                    ';
                    }

                oci_free_statement($stid);

                ?>
            </table>
        </div>
    </form>
</div>