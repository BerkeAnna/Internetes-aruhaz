<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">

<?php
try {
    if (isset($_POST["kerekparid"])) {
        include_once "../scripts/Muveletek.php";
        $kerekpar_adatok = new Muveletek();
        $kerekpar_adatok->valtozokTisztitas();
        $kerekpar_adatok->felvitel("INSERT INTO ADMIN.KEREKPAR VALUES (:kerekparid, :tipus, :csopi, :vaz, :meret)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">

        <label class="formlabel">ID - Termék neve:<br>
            <select name="kerekparid">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $grillsutok = new Muveletek();
                    $stid = $grillsutok->leker("SELECT ID, NEV FROM TERMEK WHERE KATEGORIA = 'Kerekpar' ");
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

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <h3>Típus</h3>
        <input type="text" name="tipus" placeholder="Pl.: BMX"><br>

        <h3>Célcsoport</h3>
        <input type="text" name="csopi" placeholder="Pl.: Gyermek"><br>

        <h3>Váz anyaga</h3>
        <input type="text" name="vaz" placeholder="Pl.: alumínium"><br>

        <h3>Váz mérete</h3>
        <input type="text" name="meret" placeholder="Pl.: XL"><br>

        <input type="submit" value="Felvétel">
    </form>
</div>