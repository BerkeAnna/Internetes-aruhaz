<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">

<?php

try {
    if (isset($_POST["basketid"])) {
        include_once "../scripts/Muveletek.php";
        $tisztitott_adatok2 = new Muveletek();
        $tisztitott_adatok2->valtozokTisztitas();
        $tisztitott_adatok2->felvitel("INSERT INTO KOSAR (ID, VASARLOID, TERMEKID, MENNYISEG) 
                        VALUES (:basketid, :customerID, :productID, :quantity)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}

?>
<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">

        <h3>Kosár ID</h3>
        <input type="text" name="basketid" placeholder="Pl.: 150" value="1"><br>

        <label class="formlabel">Vásárló ID - Felhasználónév<br>
            <select name="customerID">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $kosar = new Muveletek();
                    $stid = $kosar->leker("SELECT ID, FELHASZNALONEV FROM VASARLO");
                    while (($egysor = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
                        echo '<option value="'.$egysor["ID"].'">'.$egysor["ID"].' - '.$egysor["FELHASZNALONEV"].'</option>';
                    }
                    oci_free_statement($stid);
                } catch (Exception $e) {
                    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
                }
                ?>
            </select>
        </label><br><br>

        <label class="formlabel">Termék ID - Név<br>
            <select name="productID">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $kosar = new Muveletek();
                    $stid = $kosar->leker("SELECT ID, NEV FROM TERMEK");
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

        <h3>Mennyiség</h3>
        <input type="text" name="quantity" placeholder="Pl.: 150" value="150"><br>

        <input type="submit" value="Felvétel">
    </form>
</div>