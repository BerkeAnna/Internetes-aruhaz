<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">

<?php
try {
    if (isset($_POST["horgaszbotid"])) {
        include_once "../scripts/Muveletek.php";
        $tisztitott_adatok2 = new Muveletek();
        $tisztitott_adatok2->valtozokTisztitas();
        $tisztitott_adatok2->felvitel("INSERT INTO ADMIN.HORGASZBOT VALUES (:horgaszbotid, :type, :throwingweight, :part, :length)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <label class="formlabel">ID - Termék neve:<br>
            <select name="horgaszbotid">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $horgaszbotok = new Muveletek();
                    $stid = $horgaszbotok->leker("SELECT ID, NEV FROM TERMEK WHERE KATEGORIA = 'Horgaszbot' ");
                    while (($egysor = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
                        echo '<option value="'.$egysor["ID"].'">'.$egysor["ID"].' - '.$egysor["NEV"].'</option>';
                    }
                    oci_free_statement($stid);
                } catch (Exception $e) {
                    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
                }
                ?>
            </select>
        </label><br><br>

        <h3>Típusa</h3>
        <input type="text" name="type" placeholder="Pl.: Feeder"><br>

        <h3>Dobósúly</h3>
        <input type="text" name="throwingweight" placeholder="Pl.: 5"><br>

        <h3>Részek száma</h3>
        <input type="text" name="part" placeholder="Pl.: 5"><br>

        <h3>Teljes hossza</h3>
        <input type="text" name="length" placeholder="Pl.: 150"><br>

        <!--        <input type="file" name="pizzakep" value="Kép kiválasztása" accept="image/*" required><br>-->
        <input type="submit" value="Felvétel">
    </form>
</div>