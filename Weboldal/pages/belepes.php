<?php
session_start();
if(isset($_SESSION["adatok"]["id"]))
    header("Location: felhasznalo_adatok");
?>

<link href="CSS/account.css" type="text/css" rel="stylesheet">
<div class="container">
    <form method="post" autocomplete="off">
        <div class="row">
            <?php
            if (isset($_POST["login"])) {
                include_once "scripts/Bejelentkezes.php";
                $bejelentkezes = new Bejelentkezes("SELECT ID, FELHASZNALONEV, JELSZO, NEV, EMAIL, TO_CHAR( SZULDATUM, 'YYYY-MM-DD' ) AS SZULDATUM, SZALLITASICIM, SZAMLASZAM FROM VASARLO");
                $bejelentkezes->bejelentkezestEllenoriz();
            }
            ?>

            <h2 style="text-align:center">Kérjük jelentkezzen be fiókjába</h2>

            <div class="col">
                <input type="text" class="inputs" name="email" placeholder="Email cím" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" required>
                <input type="password" class="inputs" name="passw" placeholder="Jelszó" required>
                <input type="submit" id="subbtn" name="login" value="Bejelentkezés">
                <p>Nincs még fiókja? <a id="atags" href="regisztracio" class="btn">Regisztráció</a></p>
            </div>

        </div>
    </form>
</div>
