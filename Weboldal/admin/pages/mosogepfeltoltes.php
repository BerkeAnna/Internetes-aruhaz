<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">


<?php
try {
    if (isset($_POST["mosogepid"])) {
        include_once "../scripts/Muveletek.php";
        $tisztitott_adatok2 = new Muveletek();
        $tisztitott_adatok2->valtozokTisztitas();
        $tisztitott_adatok2->felvitel("INSERT INTO ADMIN.MOSOGEP VALUES (:mosogepid, :energyclass, :capacity, :energy, :water)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <label class="formlabel">ID - Termék neve:<br>
            <select name="mosogepid">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $grillsutok = new Muveletek();
                    $stid = $grillsutok->leker("SELECT ID, NEV FROM TERMEK WHERE KATEGORIA = 'Mosogep' ");
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

        <h3>Energiaosztály</h3>
        <input type="text" name="energyclass" placeholder="Pl.: A" ><br>

        <h3>Kapacitás</h3>
        <input type="text" name="capacity" placeholder="Pl.: 50" ><br>

        <h3>Súlyozott energiafogyasztás</h3>
        <input type="text" name="energy" placeholder="Pl.: 50" ><br>

        <h3>Súlyozott vízfogyasztás</h3>
        <input type="text" name="water" placeholder="Pl.: 50" ><br>

        <input type="submit" value="Felvétel">
    </form>
</div>