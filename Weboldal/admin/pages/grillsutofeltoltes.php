<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">

<?php
/*if(isset($_POST["felvetel"]))
    include "scripts/grillsutofeltoltes.php";*/

try {
    if (isset($_POST["sutoid"])) {
        include_once "../scripts/Muveletek.php";
        $tisztitott_adatok2 = new Muveletek();
        $tisztitott_adatok2->valtozokTisztitas();
        $tisztitott_adatok2->felvitel("INSERT INTO ADMIN.GRILLSUTO VALUES (:sutoid, :fuel, :surface, :width, :height)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}

?>
<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">

        <label class="formlabel">ID - Termék neve:<br>
            <select name="sutoid">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $grillsutok = new Muveletek();
                    $stid = $grillsutok->leker("SELECT ID, NEV FROM TERMEK WHERE KATEGORIA = 'Grillsuto' ");
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

        <h3>Üzemanyag típusa</h3>
        <input type="text" name="fuel" placeholder="Pl.: gaz"><br>

        <h3>Grillezőfelület</h3>
        <input type="text" name="surface" placeholder="Pl.: acel"><br>

        <h3>Szélesség</h3>
        <input type="text" name="width" placeholder="Pl.: 150"><br>

        <h3>Magasság</h3>
        <input type="text" name="height" placeholder="Pl.: 150"><br>

        <input type="submit" value="Felvétel">
    </form>
</div>