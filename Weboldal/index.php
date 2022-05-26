<?php
$page = "";
if (isset($_GET['page']))
    $page = $_GET['page'];
else
    header("Location: kezdolap");

$title = "Webáruház | ".$page;
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8" />
    <link href="CSS/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.png">
</head>
<body>
    <header>

    <div id="header">
        <div id="upper-nav">
            <ul id="upper-icons">
                <li class="upper-menu-element"><a class="icons" href="kosar"><i class="fa fa-shopping-cart" aria-hidden="true"
                                                     style="font-size: 20px;"></i></a></li>
                <li class="upper-menu-element"><a class="icons" href="belepes"><i class='fa fa-user'
                                                             style="font-size: 20px;"></i></a></li>
            </ul>
        </div>

        <img src="images/logo.png" alt="logo" id="logo">
        <form action="kezdolap" method="post">
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" name="kereso" placeholder="Termék keresése..">
                    <?php
                    $kereso="all";
                    if(isset($_POST['kereso']) && !empty($_POST['kereso']))   {
                        $kereso=$_POST['kereso'];
                    }
                    else{
                        $kereso="all";
                    }

                    include_once ('scripts/Kereso.php');
                    keresofv($kereso);

                    ?>

                    <button type="submit" class="searchButton">
                        <i class="fa fa-search" style="color: white"></i>
                    </button>
                </div>
            </div>
        </form>

        <nav>
            <ul class="menu">
                <div class="dropdown <?php echo $page == "kezdolap" ? "kijelolt" : "" ?>">
                    <li class="normal"><a href="kezdolap">Kezdőlap</a></li>
                </div>

                <div class="dropdown <?php echo $page == "tvk" || $page == "telefonok" ? "kijelolt" : ""?>">
                    <li class="normal"><a>Műszaki cikkek</a></li>
                    <div class="dropdown-content" style="width: 160px">
                        <a href="tvk">TV-k</a>
                        <a href="telefonok">Telefonok</a>
                    </div>
                </div>

                <div class="dropdown <?php echo $page == "mosogepek" ? "kijelolt" : "" ?>">
                    <li class="normal"><a>Háztartási gépek</a></li>
                    <div class="dropdown-content" style="width: 181.41px">
                        <a href="mosogepek">Mosógépek</a>
                    </div>
                </div>

                <div class="dropdown <?php echo $page == "horgaszbotok" || $page == "grillsutok" ? "kijelolt" : "" ?>">
                    <li class="normal"><a>Hobbi-szabadidő</a></li>
                    <div class="dropdown-content" style="width: 172.5px">
                        <a href="kerekparok">Kerékpárok</a>
                        <a href="horgaszbotok">Horgászbotok</a>
                        <a href="grillsutok">Grillsütők</a>
                    </div>
                </div>

                <div class="dropdown <?php echo $page == "parfumok" ? "kijelolt" : "" ?>">
                    <li class="normal"><a>Drogéria</a></li>
                    <div class="dropdown-content">
                        <a href="parfumok">Parfümök</a>
                    </div>
                </div>
            </ul>
        </nav>
    </div>
    </header>

    <main>

            <?php
            switch($page) {
                case "kezdolap": include("pages/kezdolap.php"); break;
                case "tvk": include("pages/tvk.php"); break;
                case "telefonok": include("pages/telefonok.php"); break;
                case "mosogepek": include("pages/mosogepek.php"); break;
                case "kerekparok": include("pages/kerekparok.php"); break;
                case "horgaszbotok": include("pages/horgaszbotok.php"); break;
                case "grillsutok": include("pages/grillsutok.php"); break;
                case "parfumok": include("pages/parfumok.php"); break;

                case "belepes": include("pages/belepes.php"); break;
                case "felhasznalo_adatok": include("pages/felhasznalo_adatok.php"); break;
                case "kosar": include("pages/kosar.php"); break;
            }
            ?>

    </main>

    <footer>
        <table id="footer_table">
            <tr>
                <th>Közösségi média</th>
                <th>Oldalak</th>
                <th>Légy törzsvásárló!</th>
                <th>Kapcsolat</th>
            </tr>
            <tr>
                <td><a href="https://www.facebook.com">https://www.facebook.com/webshop</a></td>
                <td><a href="kezdolap">Kezdőlap</a></td>
                <td><a href="">Regisztrálok</a></td>
                <td>Szeged, Ady tér 10, 6722</td>
            </tr>
            <tr>
                <td><a href="https://instagram.com">https://instagram.com/webshop</a></td>
                <td><a href="">Műszaki cikkek</a></td>
                <td></td>
                <td>+3670 123-4567</td>
            </tr>
            <tr>
                <td><a href="https://twitter.com">https://twitter.com/webshop</a></td>
                <td><a href="">Háztartási gépek</a></td>
                <td></td>
                <td>webshop@gmail.com</td>
            </tr>
            <tr>
                <td></td>
                <td><a href="">Hobbi-szabadidő</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="">Drogéria</a></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </footer>

</body>
</html>