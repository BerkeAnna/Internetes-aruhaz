<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">


<?php
try {
    if (isset($_POST["parfumid"])) {
        include_once "../scripts/Muveletek.php";
        $tisztitott_adatok2 = new Muveletek();
        $tisztitott_adatok2->valtozokTisztitas();
        $tisztitott_adatok2->felvitel("INSERT INTO ADMIN.PARFUM VALUES (:parfumid,  :targetGroup, :fragrance)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <label class="formlabel">ID - Termék neve:<br>
            <select name="parfumid">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $grillsutok = new Muveletek();
                    $stid = $grillsutok->leker("SELECT ID, NEV FROM TERMEK WHERE KATEGORIA = 'Parfum' ");
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

        <h3>Célcsoport</h3>
        <input type="text" name="targetGroup" placeholder="Pl.: Noi"><br>

        <h3>Illattípusa</h3>
        <input type="text" name="fragrance" placeholder="Pl.: Citrusos"><br>

        <input type="submit" value="Felvétel">
    </form>
</div>