<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="grillsutok" method="post"> <!-- A szűrőknek az űrlapja -->
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
            <?php
            $uzemanyag="all";
            ?>

            <div class="mini-containers">
                <div class="cimek">Üzemanyag típusa</div>
                <div class="szurok">
                    <input type="checkbox" id="uzemanyag1" name="uzemanyag[]" value="elektromos">
                    <label for="uzemanyag1">Elektromos</label><br>
                    <input type="checkbox" id="uzemanyag2" name="uzemanyag[]" value="faszen">
                    <label for="uzemanyag2">Faszén</label><br>
                    <input type="checkbox" id="uzemanyag3" name="uzemanyag[]" value="gaz">
                    <label for="uzemanyag3">Gáz</label><br>

                        <?php
                            include_once ('scripts/Grillsuto.php');

                            if(isset($_POST['uzemanyag']) && in_array('elektromos', $_POST['uzemanyag'])){
                                $uzemanyag="elektromos";
                            }else if(isset($_POST['uzemanyag']) && in_array('faszen', $_POST['uzemanyag'])){
                                $uzemanyag="faszen";
                            }else if(isset($_POST['uzemanyag']) && in_array('gaz', $_POST['uzemanyag'])){
                                $uzemanyag="gaz";
                            }else{
                                $uzemanyag="all";
                            }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Grillező felület</div>
                <div class="szurok">
                    <input type="checkbox" id="grillfelulet1" name="grillfelulet[]" value="Acel">
                    <label for="grillfelulet1">Acél</label><br>
                    <input type="checkbox" id="grillfelulet2" name="grillfelulet[]" value="Fa">
                    <label for="grillfelulet2">Fa</label><br>
                    <input type="checkbox" id="grillfelulet3" name="grillfelulet[]" value="Krom">
                    <label for="grillfelulet3">Króm</label><br>
                    <input type="checkbox" id="grillfelulet4" name="grillfelulet[]" value="Ontottvas">
                    <label for="grillfelulet4">Öntöttvas</label><br>
                        <?php
                        include_once ('scripts/Grillsuto.php');

                        if(isset($_POST['grillfelulet']) && in_array('Acel', $_POST['grillfelulet'])){
                            $felulet="Acel";
                        }else if(isset($_POST['grillfelulet']) && in_array('Fa', $_POST['grillfelulet'])){
                            $felulet="Fa";
                        }else if(isset($_POST['grillfelulet']) && in_array('Krom', $_POST['grillfelulet'])){
                            $felulet="Krom";
                        }else if(isset($_POST['grillfelulet']) && in_array('Ontottvas', $_POST['grillfelulet'])){
                            $felulet="Ontottvas";
                        }else{
                            $felulet="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Grillsütő szélessége</div>
                <div class="szurok">
                    </label><input type="number" id="szelesseg" name="szelesseg" placeholder="Max">cm
                    <?php
                    $szelesseg="all";
                    if(isset($_POST['szelesseg']) && !empty($_POST['szelesseg']))   {
                        $szelesseg=$_POST['szelesseg'];
                    }
                    else{
                        $szelesseg="all";
                    }
                    ?>
                </div>
            </div>


            <div class="mini-containers">
                <div class="cimek">Grillsütő magassága</div>
                <div class="szurok">
                    </label><input type="number" id="magassag" name="magassag" placeholder="Max">cm
                    <?php
                    $magassag="all";
                    if(isset($_POST['magassag']) && !empty($_POST['magassag']))   {
                        $magassag=$_POST['magassag'];
                    }
                    else{
                        $magassag="all";
                    }
                    ?>
                </div>
            </div>

            <div class="kosar">
                <input type="submit" class="szures-gomb" name="szures" value="Szűrés">
            </div>
        </form>
    </div>


    <div id="products-container">
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
        include_once ('scripts/Grillsuto.php');

        $stid = grillsutoLeker($raktaron, $uzemanyag, $felulet, $szelesseg, $magassag, $maximumar, 0);
        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
            <p class="termek-nev">Találatok száma: </p>
            '. $row['DBSZAM'].'
            <p> db</p>
            ';
        }

        $stid = grillsutoLeker($raktaron, $uzemanyag, $felulet, $szelesseg, $magassag, $maximumar);


        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {

            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/grillsuto/grillsuto.png" alt="tv" class="termek-kepe">
            </div>
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Üzemanyag típus: '. $row['UZEMANYAGTIPUS'] .'<br>
                        Grillező felület: '. $row['GRILLEZOFELULET'] .'<br>
                        Szélesség: '. $row['SZELESSEG'] . ' cm<br>
                        Magasság: '. $row['MAGASSAG'] . ' cm
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
                            <input type="hidden" name="termekid" value="' . $row['GRILLSUTOTERMEKID'] . '">
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
    </div>
</div>