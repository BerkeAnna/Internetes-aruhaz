<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="tvk" method="post"> <!-- A szűrőknek az űrlapja -->
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

            <div class="mini-containers">
                <div class="cimek">Gyártó</div>
                <div class="szurok">
                    <input type="checkbox" id="gyarto1" name="gyarto[]" value="Hitachi">
                    <label for="gyarto1">Hitachi</label><br>
                    <input type="checkbox" id="gyarto2" name="gyarto[]" value="Samsung">
                    <label for="gyarto2">Samsung</label><br>
                    <input type="checkbox" id="gyarto3" name="gyarto[]" value="LG">
                    <label for="gyarto3">LG</label><br>
                    <input type="checkbox" id="gyarto4" name="gyarto[]" value="Philips">
                    <label for="gyarto3">Philips</label><br>
                    <input type="checkbox" id="gyarto5" name="gyarto[]" value="Panasonic">
                    <label for="gyarto3">Panasonic</label><br>

                    <?php
                    include_once ('scripts/TV.php');
                    $gyarto="all";
                    if(isset($_POST['gyarto']) && in_array('Hitachi', $_POST['gyarto'])){
                        $gyarto="Hitachi";
                    }else if(isset($_POST['gyarto']) && in_array('Samsung', $_POST['gyarto'])){
                        $gyarto="Samsung";
                    }else if(isset($_POST['gyarto']) && in_array('LG', $_POST['gyarto'])){
                        $gyarto="LG";
                    }else if(isset($_POST['gyarto']) && in_array('Philips', $_POST['gyarto'])){
                        $gyarto="Philips";
                    }else if(isset($_POST['gyarto']) && in_array('Panasonic', $_POST['gyarto'])){
                        $gyarto="Panasonic";
                    }else{
                        $gyarto="all";
                    }
                    ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">TV képernyő típusa</div>
                <div class="szurok">
                    <input type="checkbox" id="kepernyotipus1" name="kepernyotipus[]" value="OLED">
                    <label for="kepernyotipus1">OLED</label><br>
                    <input type="checkbox" id="kepernyotipus2" name="kepernyotipus[]" value="LCD">
                    <label for="kepernyotipus2">LCD</label><br>
                    <input type="checkbox" id="kepernyotipus3" name="kepernyotipus[]" value="QLED">
                    <label for="kepernyotipus3">QLED</label><br>
                    <input type="checkbox" id="kepernyotipus4" name="kepernyotipus[]" value="LED">
                    <label for="kepernyotipus3">LED</label><br>

                    <?php
                    include_once ('scripts/TV.php');

                    if(isset($_POST['kepernyotipus']) && in_array('OLED', $_POST['kepernyotipus'])){
                        $kepernyotipus="OLED";
                    }else if(isset($_POST['kepernyotipus']) && in_array('LCD', $_POST['kepernyotipus'])){
                        $kepernyotipus="LCD";
                    }else if(isset($_POST['kepernyotipus']) && in_array('QLED', $_POST['kepernyotipus'])){
                        $kepernyotipus="QLED";
                    }else if(isset($_POST['kepernyotipus']) && in_array('LED', $_POST['kepernyotipus'])){
                        $kepernyotipus="LED";
                    }else{
                        $kepernyotipus="all";
                    }
                    ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">TV szélessége</div>
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
                <div class="cimek">TV magassága</div>
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

        include_once ('scripts/TV.php');

        $stid = tvLeker($raktaron, $gyarto,$kepernyotipus, $szelesseg, $magassag, $maximumar,0);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
            <p class="termek-nev">Találatok száma: </p>
            '. $row['DBSZAM'].'
            <p> db</p>
            ';
        }

        $stid = tvLeker($raktaron, $gyarto,$kepernyotipus, $szelesseg, $magassag, $maximumar);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/tv/stock-image.png" alt="tv" class="termek-kepe">
            </div>
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Képernyő típus: '. $row['KEPERNYOTIPUS'] .'<br>
                        Képernyő felbontás: '. $row['KEPERNYOFELBONTAS'] .'<br>
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
                            <input type="hidden" name="termekid" value="' . $row['TVTERMEKID'] . '">
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