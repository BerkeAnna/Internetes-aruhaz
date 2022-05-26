<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="telefonok" method="post"> <!-- A szűrőknek az űrlapja -->
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
                $tipus="all";
                $kepernyotipus="all";
                $proc="all";
                $ram="all";
                $belsomemoria="all";
                ?>

            <div class="mini-containers">
                <div class="cimek">Gyártó</div>
                <div class="szurok">
                    <input type="checkbox" id="Apple" name="gyarto[]" value="Apple">
                    <label for="Apple1">Apple</label><br>
                    <input type="checkbox" id="Sony" name="gyarto[]" value="Sony">
                    <label for="Sony">Sony</label><br>
                    <input type="checkbox" id="Samsung" name="gyarto[]" value="Samsung">
                    <label for="Samsung">Samsung</label><br>
                    <input type="checkbox" id="Xiaomi" name="gyarto[]" value="Xiaomi">
                    <label for="Xiaomi">Xiaomi</label><br>
                    <input type="checkbox" id="Honor" name="gyarto[]" value="Honor">
                    <label for="Honor">Honor</label><br>

                        <?php
                        include_once ('scripts/Telefon.php');

                        if(isset($_POST['gyarto']) && in_array('Apple', $_POST['gyarto'])){
                            $tipus="Apple";
                        }else if(isset($_POST['gyarto']) && in_array('Sony', $_POST['gyarto'])){
                            $tipus="Sony";
                        }else if(isset($_POST['gyarto']) && in_array('Samsung', $_POST['gyarto'])){
                            $tipus="Samsung";
                        }else if(isset($_POST['gyarto']) && in_array('Xiaomi', $_POST['gyarto'])){
                            $tipus="Xiaomi";
                        }else if(isset($_POST['gyarto']) && in_array('Honor', $_POST['gyarto'])){
                            $tipus="Honor";
                        }else{
                            $tipus="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">TV képernyő típusa</div>
                <div class="szurok">
                    <input type="checkbox" id="kepernyotipus1" name="kepernyotipus[]" value="AMOLED">
                    <label for="kepernyotipus1">AMOLED</label><br>
                    <input type="checkbox" id="kepernyotipus2" name="kepernyotipus[]" value="LED">
                    <label for="kepernyotipus2">LED</label><br>
                    <input type="checkbox" id="kepernyotipus3" name="kepernyotipus[]" value="LTPS">
                    <label for="kepernyotipus3">LTPS</label><br>
                    <input type="checkbox" id="kepernyotipus4" name="kepernyotipus[]" value="OLED">
                    <label for="kepernyotipus4">OLED</label><br>
                    <input type="checkbox" id="kepernyotipus5" name="kepernyotipus[]" value="P-OLED">
                    <label for="kepernyotipus5">P-OLED</label><br>
                    <input type="checkbox" id="kepernyotipus6" name="kepernyotipus[]" value="TFT">
                    <label for="kepernyotipus6">TFT</label><br>
                    <input type="checkbox" id="kepernyotipus7" name="kepernyotipus[]" value="TN">
                    <label for="kepernyotipus7">TN</label><br>

                        <?php
                        include_once ('scripts/Telefon.php');

                        if(isset($_POST['kepernyotipus']) && in_array('AMOLED', $_POST['kepernyotipus'])){
                            $kepernyotipus="AMOLED";
                        }else if(isset($_POST['kepernyotipus']) && in_array('LED', $_POST['kepernyotipus'])){
                            $kepernyotipus="LED";
                        }else if(isset($_POST['kepernyotipus']) && in_array('LTPS', $_POST['kepernyotipus'])){
                            $kepernyotipus="LTPS";
                        }else if(isset($_POST['kepernyotipus']) && in_array('P-OLED', $_POST['kepernyotipus'])){
                            $kepernyotipus="P-OLED";
                        }else if(isset($_POST['kepernyotipus']) && in_array('TFT', $_POST['kepernyotipus'])){
                            $kepernyotipus="TFT";
                        }else if(isset($_POST['kepernyotipus']) && in_array('TN', $_POST['kepernyotipus'])) {
                            $kepernyotipus = "TN";
                        }else{
                            $kepernyotipus="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Processzormagok száma</div>
                <div class="szurok">
                    <input type="checkbox" id="proc1" name="proc[]" value="2">
                    <label for="proc1">2 magos</label><br>
                    <input type="checkbox" id="proc2" name="proc[]" value="4">
                    <label for="proc2">4 magos</label><br>
                    <input type="checkbox" id="proc3" name="proc[]" value="5">
                    <label for="proc3">6 magos</label><br>
                    <input type="checkbox" id="proc4" name="proc[]" value="6">
                    <label for="proc4">8 magos</label><br>
                    <?php
                    include_once ('scripts/Telefon.php');

                    if(isset($_POST['proc']) && in_array('2', $_POST['proc'])){
                        $proc="2";
                    }else if(isset($_POST['proc']) && in_array('4', $_POST['proc'])){
                        $proc="4";
                    }else if(isset($_POST['proc']) && in_array('6', $_POST['proc'])){
                        $proc="6";
                    }else if(isset($_POST['proc']) && in_array('8', $_POST['proc'])){
                        $proc="8";
                    }else{
                        $proc="all";
                    }
                    ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">RAM</div>
                <div class="szurok">
                    <input type="checkbox" id="ram1" name="ram[]" value="1">
                    <label for="ram1">1 GB</label><br>
                    <input type="checkbox" id="ram2" name="ram[]" value="2">
                    <label for="ram2">2 GB</label><br>
                    <input type="checkbox" id="ram3" name="ram[]" value="3">
                    <label for="ram3">3 GB</label><br>
                    <input type="checkbox" id="ram4" name="ram[]" value="4">
                    <label for="ram4">4 GB</label><br>
                    <input type="checkbox" id="ram5" name="ram[]" value="8">
                    <label for="ram5">8 GB</label><br>
                    <input type="checkbox" id="ram6" name="ram[]" value="12">
                    <label for="ram6">12 GB</label><br>
                    <input type="checkbox" id="ram7" name="ram[]" value="16">
                    <label for="ram7">16 GB</label><br>
                    <input type="checkbox" id="ram8" name="ram[]" value="32">
                    <label for="ram8">32 GB</label><br>
                    <input type="checkbox" id="ram9" name="ram[]" value="64">
                    <label for="ram9">64 GB</label><br>
                    <input type="checkbox" id="ram10" name="ram[]" value="128">
                    <label for="ram10">128 GB</label><br>
                    <input type="checkbox" id="ram11" name="ram[]" value="521">
                    <label for="ram11">521 GB</label><br>

                        <?php
                        include_once ('scripts/Telefon.php');

                        if(isset($_POST['ram']) && in_array('1', $_POST['ram'])){
                            $ram="1";
                        }else if(isset($_POST['ram']) && in_array('2', $_POST['ram'])){
                            $ram="2";
                        }else if(isset($_POST['ram']) && in_array('3', $_POST['ram'])){
                            $ram="3";
                        }else if(isset($_POST['ram']) && in_array('4', $_POST['ram'])){
                            $ram="4";
                        }else if(isset($_POST['ram']) && in_array('8', $_POST['ram'])){
                            $ram="8";
                        }else if(isset($_POST['ram']) && in_array('12', $_POST['ram'])) {
                            $ram = "12";
                        }else if(isset($_POST['ram']) && in_array('16', $_POST['ram'])){
                            $ram="16";
                        }else if(isset($_POST['ram']) && in_array('32', $_POST['ram'])){
                            $ram="32";
                        }else if(isset($_POST['ram']) && in_array('64', $_POST['ram'])){
                            $ram="64";
                        }else if(isset($_POST['ram']) && in_array('128', $_POST['ram'])){
                            $ram="128";
                        }else if(isset($_POST['ram']) && in_array('521', $_POST['ram'])) {
                            $ram = "521";
                        }else{
                            $ram="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Belső memória</div>
                <div class="szurok">
                    <input type="checkbox" id="belsomem1" name="belsomem[]" value="1">
                    <label for="belsomem1">1 GB</label><br>
                    <input type="checkbox" id="belsomem2" name="belsomem[]" value="2">
                    <label for="belsomem2">2 GB</label><br>
                    <input type="checkbox" id="belsomem3" name="belsomem[]" value="3">
                    <label for="belsomem3">3 GB</label><br>
                    <input type="checkbox" id="belsomem4" name="belsomem[]" value="4">
                    <label for="belsomem4">4 GB</label><br>
                    <input type="checkbox" id="belsomem5" name="belsomem[]" value="8">
                    <label for="belsomem5">8 GB</label><br>
                    <input type="checkbox" id="belsomem6" name="belsomem[]" value="12">
                    <label for="belsomem6">12 GB</label><br>
                    <input type="checkbox" id="belsomem7" name="belsomem[]" value="16">
                    <label for="belsomem7">16 GB</label><br>
                    <input type="checkbox" id="belsomem8" name="belsomem[]" value="32">
                    <label for="belsomem8">32 GB</label><br>
                    <input type="checkbox" id="belsomem9" name="belsomem[]" value="64">
                    <label for="belsomem9">64 GB</label><br>
                    <input type="checkbox" id="belsomem10" name="belsomem[]" value="128">
                    <label for="belsomem10">128 GB</label><br>
                    <input type="checkbox" id="belsomem11" name="belsomem[]" value="521">
                    <label for="belsomem11">521 GB</label><br>

                        <?php
                        include_once ('scripts/Telefon.php');

                        if(isset($_POST['belsomem']) && in_array('1', $_POST['belsomem'])){
                            $belsomemoria="1";
                        }else if(isset($_POST['belsomem']) && in_array('2', $_POST['belsomem'])){
                            $belsomemoria="2";
                        }else if(isset($_POST['belsomem']) && in_array('3', $_POST['belsomem'])){
                            $belsomemoria="3";
                        }else if(isset($_POST['belsomem']) && in_array('4', $_POST['belsomem'])){
                            $belsomemoria="4";
                        }else if(isset($_POST['belsomem']) && in_array('8', $_POST['belsomem'])){
                            $belsomemoria="8";
                        }else if(isset($_POST['belsomem']) && in_array('12', $_POST['belsomem'])) {
                            $belsomemoria = "12";
                        }else if(isset($_POST['belsomem']) && in_array('16', $_POST['belsomem'])){
                            $belsomemoria="16";
                        }else if(isset($_POST['belsomem']) && in_array('32', $_POST['belsomem'])){
                            $belsomemoria="32";
                        }else if(isset($_POST['belsomem']) && in_array('64', $_POST['belsomem'])){
                            $belsomemoria="64";
                        }else if(isset($_POST['belsomem']) && in_array('128', $_POST['belsomem'])){
                            $belsomemoria="128";
                        }else if(isset($_POST['belsomem']) && in_array('521', $_POST['belsomem'])) {
                            $belsomemoria = "521";
                        }else{
                            $belsomemoria="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Hátlapi kamera felbontása</div>
                <div class="szurok">
                    </label><input type="number" id="hatlapkam" name="hatlapkam" placeholder="Max">MPx
                    <?php
                    $hatlapkam="all";
                    if(isset($_POST['hatlapkam']) && !empty($_POST['hatlapkam']))   {
                        $hatlapkam=$_POST['hatlapkam'];
                    }
                    else{
                        $hatlapkam="all";
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

        $stid = telefonLeker($raktaron, $tipus, $kepernyotipus, $proc, $ram, $belsomemoria, $hatlapkam, $maximumar, 0);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
            <p class="termek-nev">Találatok száma: </p>
            '. $row['DBSZAM'].'
            <p> db</p>
            ';
        }

        $stid = telefonLeker($raktaron, $tipus, $kepernyotipus, $proc, $ram, $belsomemoria, $hatlapkam, $maximumar);


        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/telefon/telefon.png" alt="tv" class="termek-kepe">
            </div>
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Képernyő típus: '. $row['KEPERNYOTIPUS'] .'<br>
                        Képernyő felbontás: '. $row['KEPERNYOFELBONTAS'] .'<br>
                        Processzormagok száma: '. $row['PROCESSZOR'] . ' magos<br>
                        RAM: '. $row['RAM'] . ' GB<br>
                        Belső memória mérete: '. $row['TARHELY'] . ' GB<br>
                        Hátlapi kamera felbontása: '. $row['HATLAPKAMFELBONTAS'] .' MPx
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
                            <input type="hidden" name="termekid" value="' . $row['TELEFONTERMEKID'] . '">
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