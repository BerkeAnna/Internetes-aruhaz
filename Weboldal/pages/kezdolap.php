<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="kezdolap" method="post"> <!-- A szűrőknek az űrlapja -->
            <div id="szures-container" class="cimek"><i class="fa fa-filter" aria-hidden="true"></i> Szűrés</div> <!-- A "Szűrés" szöveg div-je -->

            <div class="mini-containers"> <!-- Kategória nevet és a szűrőit tartalmazza -->
                <div class="szurok"> <!-- A szűrőket tartalmazza, amiken a felhasználó módosít -->
                    <input type="checkbox" id="raktaron" name="raktaron" value="Raktaron">
                    <label for="raktaron"> Raktáron</label><br>
                    <?php
                    $raktaron="all";
                    if(isset($_POST['raktaron'])) {
                        $raktaron = "raktaron";
                    }
                    ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Ár</div>
                <div class="szurok">
                    </label><input type="number" id="max" name="maximumar" placeholder="Max">Ft
                    <?php
                    $maximumar="all";
                    if(isset($_POST['maximumar']) && !empty($_POST['maximumar']))   {
                        $maximumar=$_POST['maximumar'];
                    }
                    else{
                        $maximumar="all";
                    }
                    ?>

                    </div>
                 </div>

            <div class="kosar">
                <input type="submit" class="kosarba-gomb" name="kosarba" value="Szűrés">
            </div>
        </form>
    </div>
    <div id="products-container">
<!--        ide jön AZ A WHILE AMI A LEKÉRT MENNYISÉGET ÍRJA KI-->
        <?php

        try {
            if (isset($_POST["kosarba"])) {
                unset($_POST["kosarba"]);
                include_once "scripts/Muveletek.php";
                $kosarba_felvitel = new Muveletek();
                $kosarba_felvitel->valtozokTisztitas();
                $kosarba_felvitel->felvitel("INSERT INTO KOSAR2 VALUES(:vasarloid, :termekid, 1)");
            }
        } catch (Exception $e) {
            echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
        }

        include_once "scripts/termekeklistazasa.php";

        if(isset($_POST['kereso']) && !empty($_POST['kereso']))   {
            $kereso=$_POST['kereso'];
            $stid=keresofv($kereso);
        }
        else {
            $stid = termekLeker($raktaron, $maximumar);
        }
        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/termek.png" alt="tv" class="termek-kepe">
            </div>
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Kategória: '. $row['KATEGORIA'] .'<br>
                      
                    </div>
                </div>
                <div class="ar-kosar">
                    <div class="ar">
                        '. number_format($row['AR'], 0, '.', ' ') .' Ft
                    </div>
                    <div class="kosar">
            ';

            if (isset($_SESSION["adatok"]["id"])) {
                echo '
                    <form method="post">
                            <input type="hidden" name="vasarloid" value="' . $_SESSION["adatok"]["id"] . '">
                            <input type="hidden" name="termekid" value="' . $row['ID'] . '">
                            <input type="submit" class="kosarba-gomb" name="kosarba" value="Kosárba">
                    </form>
                ';
            }

            echo '
                    </div>
                </div>
            </div>
        </div>
            ';
        }
        oci_free_statement($stid);
        ?>

        <h2>Jelenleg elérhető termék típusok kategóriánként</h2>
        <div >
            <?php
            include_once "scripts/termekeklistazasa.php";
            $stid =termekkatlista();
            while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
                echo '
                <div class="kep">
                </div>
                <table>
                    <tr>
                        <th>Kategória</th>
                        <th>Mennyiség</th>
                    </tr>
                    <tr>
                        <td>' . $row['KATEGORIA'] . ' </td>
                        <td>' . $row['MENNYISEG'] . '</td>
                    </tr>
                </table>

                ';
            }
            ?>

        </div>
    </div>


</div>