<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">


<?php
try {
    if (isset($_POST["telefonid"])) {
        include_once "../scripts/Muveletek.php";
        $telefon_adatok = new Muveletek($_SESSION["adminAdatok"]["felhasznalonev"], $_SESSION["adminAdatok"]["jelszo"]);
        $telefon_adatok->valtozokTisztitas();
        $telefon_adatok->felvitel("INSERT INTO ADMIN.TELEFON  VALUES (:telefonid, :screentype, :screenresolution, :processor, :ram, :storage, :cam)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <label class="formlabel">ID - Termék neve:<br>
            <select name="telefonid">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $grillsutok = new Muveletek();
                    $stid = $grillsutok->leker("SELECT ID, NEV FROM TERMEK WHERE KATEGORIA = 'Telefon' ");
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

        <h3>Képrnyő típusa</h3>
        <input type="text" name="screentype" placeholder="Pl.: OLED"><br>

        <h3>Képernyő felbontás</h3>
        <input type="text" name="screenresolution" placeholder="Pl.: 2159x2132"><br>

        <h3>Processzor magszám</h3>
        <input type="text" name="processor" placeholder="Pl.: procinev"><br>

        <h3>RAM</h3>
        <input type="text" name="ram" placeholder="Pl.: 8"><br>

        <h3>Tárhely</h3>
        <input type="text" name="storage" placeholder="Pl.: 512"><br>

        <h3>Hátlapi kamera felbontása</h3>
        <input type="text" name="cam" placeholder="Pl.: 50"><br>

        <input type="submit" value="Felvétel">
    </form>
</div>