<?php
session_start();
$page = "";
if (!empty($_GET['page']) || $page) 
    $page = $_GET['page'];

$title = "Webáruház | ".$page;

if (isset($_POST["bejelentkezes"])) {
    include_once "../scripts/Bejelentkezes.php";
    $bejelentkezes = new Bejelentkezes('SELECT ID, NEV, FELHASZNALONEV, JELSZO FROM ADMIN');
    $bejelentkezes->adminBejelentkezestEllenoriz();
}

if(isset($_GET["kijelentkezes"]))
{
    header("Location: ../admin");
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8" />
    <link href="CSS/admin.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.png">
</head>

<body>

    <main>
        <?php
        if(isset($_SESSION["admin_id"]))
        {
        ?>
        <div id="menu">
            <nav>
                <!--<a href="admin_adatmodositas">Admin</a>
                <hr>
                <a href="kosarfeltoltes">Kosár</a>-->
                <a href="termekfeltoltes">Termékek</a>
                <a href="grillsutofeltoltes">Grillsütő</a>
                <a href="telefonfeltoltes">Telefon</a>
                <a href="TVfeltoltes">TV</a>
                <a href="mosogepfeltoltes">Mosógép</a>
                <a href="kerekparfeltoltes">Kerékpár</a>
                <a href="horgaszbotfeltoltes">Horgászbot</a>
                <a href="parfumfeltoltes">Parfüm</a>
                <hr>
                <a href="karbantart">Karbantartás</a>

            </nav>
        </div>

        <div id="container">
            <?php
            switch($page)
            {
                case "adminkezdolap": include("pages/adminkezdolap.php"); break;

                /*case "admin_adatmodositas": include("pages/admin_adatmodositas.php"); break;

                case "kosarfeltoltes": include("pages/kosarfeltoltes.php"); break;*/
                case "termekfeltoltes": include("pages/termekfeltoltes.php"); break;
                case "grillsutofeltoltes": include("pages/grillsutofeltoltes.php"); break;
                case "telefonfeltoltes": include("pages/telefonfeltoltes.php"); break;
                case "TVfeltoltes": include("pages/TVfeltoltes.php"); break;
                case "mosogepfeltoltes": include("pages/mosogepfeltoltes.php"); break;
                case "kerekparfeltoltes": include("pages/kerekparfeltoltes.php"); break;
                case "horgaszbotfeltoltes": include("pages/horgaszbotfeltoltes.php"); break;
                case "parfumfeltoltes": include("pages/parfumfeltoltes.php"); break;

                case "karbantart": include("pages/karbantart.php"); break;
            }
            ?>
        </div>

    </main>
    <a class="bejelentkezes" href="?kijelentkezes=true">Kijelentkezés</a>
    <?php
        }
        else
        {
    ?>

    <form id="form" method="post" autocomplete="off">
        <h2 id="h2">Admin bejelentkezés</h2>

        <input type="text" class="input" id="username" name="username" placeholder="Felhasználónév" required><br>
        <input type="password" class="input" id="password" name="password" placeholder="Jelszó" required><br>
        <input type="submit" value="Bejelentkezés" class="input" id="bejelentkezes" name="bejelentkezes"><br>
    </form>


    <?php
        }
    ?>

</body>
</html>