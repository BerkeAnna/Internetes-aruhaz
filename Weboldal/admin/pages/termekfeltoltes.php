<link href="CSS/adatmodositas.css" type="text/css" rel="stylesheet">

<?php
try {
    if (isset($_POST["brand"])) {
        include_once "../scripts/Muveletek.php";
        $termek_adatok = new Muveletek($_SESSION["adminAdatok"]["felhasznalonev"], $_SESSION["adminAdatok"]["jelszo"]);
        $termek_adatok->valtozokTisztitas();
        $termek_adatok->felvitel("INSERT INTO ADMIN.TERMEK (ID, NEV, GYARTO, DARAB, AR, KATEGORIA) VALUES (:id, :productname, :brand, :stock, :price, :category)");
    }
} catch (Exception $e) {
    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
}
?>

<div class="container">
    <form method="post" autocomplete="off" enctype="multipart/form-data">
        <h3>ID</h3>
        <input type="text" name="id" placeholder="Pl.: 10"><br>

        <h3>Termék neve</h3>
        <input type="text" name="productname" placeholder="Pl.: Corelli"><br>

        <h3>Kategória</h3>
        <label class="formlabel"><br>
            <select name="category">
                <?php
                try {
                    include_once "../scripts/Muveletek.php";
                    $kategoriak = new Muveletek();
                    $stid = $kategoriak->leker("SELECT KATEGORIA FROM TERMEK GROUP BY KATEGORIA");
                    while (($egysor = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
                        echo '<option value="'.$egysor["KATEGORIA"].'">'.$egysor["KATEGORIA"].'</option>';
                    }
                    oci_free_statement($stid);
                } catch (Exception $e) {
                    echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
                }
                ?>
            </select>
        </label><br><br>

        <h3>Gyártó</h3>
        <input type="text" name="brand" placeholder="Pl.: Snoop"><br>

        <h3>Készlet</h3>
        <input type="text" name="stock" placeholder="Pl.: 50"><br>

        <h3>Ár</h3>
        <input type="text" name="price" placeholder="Pl.: 20000"><br>

        <input type="submit" value="Felvétel">
    </form>
</div>