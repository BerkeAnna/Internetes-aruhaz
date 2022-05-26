<?php
if(empty($_SESSION["admin_id"])) {
    header("Location: adminkezdolap");
}

$adminadatok = $_SESSION["adminAdatok"];

if(isset($_POST["kijelentkezes"])) {
    header("Location: adminkezdolap");
    session_unset();
    session_destroy();
}
?>


<link href="CSS/adatszerkesztes.css" type="text/css" rel="stylesheet">
<div class="container">
    <form method="post" autocomplete="off">

        <?php
        try {
            if (isset($_POST["felhasznalonev"])) {
                include_once "../scripts/Muveletek.php";
                $tisztitott_adatok = new Muveletek($_SESSION["adminAdatok"]["felhasznalonev"], $_SESSION["adminAdatok"]["jelszo"]);
                $tisztitott_adatok->valtozokTisztitas();
                $tisztitott_adatok->userModositas("UPDATE ADMIN.ADMIN SET NEV=:nev, FELHASZNALONEV=:felhasznalonev,
                   JELSZO=:jelszo WHERE ID=:id", "admin_adatmodositas", "adminAdatok");
            }
        } catch (Exception $e) {
            echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
        }
        ?>

        <h2 style="text-align:center">Adataid</h2>

        <div class="col">

            <table>
                <?php
                    echo '<input type="hidden" name="id" value="'.$adminadatok["id"].'">';
                ?>

                <tr>
                        <h3>Neved</h3>
                        <input type="text" class="inputs" name="nev" value="<?php echo $adminadatok["nev"]; ?>">
                </tr>
                <tr>
                        <h3>Felhasználóneved</h3>
                        <input type="text" class="inputs" name="felhasznalonev" value="<?php echo $adminadatok["felhasznalonev"]; ?>">
                </tr>
                <tr>
                        <h3>Jelszavad</h3>
                        <input type="text" class="inputs" name="jelszo" value="<?php echo $adminadatok["jelszo"]; ?>">
                </tr>

            </table>

            <input type="submit" value="Adataim módosítása">
        </div>
    </form>
</div>