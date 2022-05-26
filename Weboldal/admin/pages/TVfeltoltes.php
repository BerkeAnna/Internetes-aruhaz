<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">


<?php
try {
    if (isset($_POST["tvid"])) {
        include_once "../scripts/Muveletek.php";
        $tv_feltoltes = new Muveletek();
        $tv_feltoltes->valtozokTisztitas();
        $tv_feltoltes->felvitel("INSERT INTO ADMIN.TV VALUES (:tvid, :screentype, :screenresolution, :width, :height)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <label class="formlabel">ID - Termék neve:<br>
            <select name="tvid">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $grillsutok = new Muveletek();
                    $stid = $grillsutok->leker("SELECT ID, NEV FROM TERMEK WHERE KATEGORIA = 'TV' ");
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

        <h3>Szélesség</h3>
        <input type="text" name="width" placeholder="Pl.: 150"><br>

        <h3>Magasság</h3>
        <input type="text" name="height" placeholder="Pl.: 70"><br>

        <input type="submit" value="Felvétel">
    </form>
</div>