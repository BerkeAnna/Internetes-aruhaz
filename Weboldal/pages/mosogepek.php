<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="mosogepek" method="post"> <!-- A szűrőknek az űrlapja -->
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
                <div class="cimek">Energiaosztály</div>
                <div class="szurok">
                    <input type="checkbox" id="eosztaly1" name="eosztaly[]" value="A">
                    <label for="eosztaly1">A</label><br>
                    <input type="checkbox" id="eosztaly2" name="eosztaly[]" value="B">
                    <label for="eosztaly2">B</label><br>
                    <input type="checkbox" id="eosztaly3" name="eosztaly[]" value="C">
                    <label for="eosztaly3">C</label><br>
                    <input type="checkbox" id="eosztaly4" name="eosztaly[]" value="D">
                    <label for="eosztaly4">D</label><br>
                    <input type="checkbox" id="eosztaly5" name="eosztaly[]" value="E">
                    <label for="eosztaly5">E</label><br>
                    <input type="checkbox" id="eosztaly6" name="eosztaly[]" value="F">
                    <label for="eosztaly6">F</label><br>

                    <?php
                    include_once ('scripts/Mosogep.php');

                    if(isset($_POST['eosztaly']) && in_array('A', $_POST['eosztaly'])){
                        $eosztaly="A";
                    }else if(isset($_POST['eosztaly']) && in_array('B', $_POST['eosztaly'])){
                        $eosztaly="B";
                    }else if(isset($_POST['eosztaly']) && in_array('C', $_POST['eosztaly'])){
                        $eosztaly="C";
                    }else if(isset($_POST['eosztaly']) && in_array('D', $_POST['eosztaly'])){
                        $eosztaly="D";
                    }else if(isset($_POST['eosztaly']) && in_array('E', $_POST['eosztaly'])){
                        $eosztaly="E";
                    }else if(isset($_POST['eosztaly']) && in_array('F', $_POST['eosztaly'])){
                        $eosztaly="F";
                    }else{
                        $eosztaly="all";
                    }
                    ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Kapacitás</div>
                <div class="szurok">
                    <input type="number" id="kapacitas" name="kapacitas" placeholder="maximum kapacitas"> E
                    <?php
                    $kapacitas="all";
                    if(isset($_POST['kapacitas']) && !empty($_POST['kapacitas']))   {
                        $kapacitas=$_POST['kapacitas'];
                    }
                    else{
                        $kapacitas="all";
                    }
                    ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Súlyozott energiafogyasztás</div>
                <div class="szurok">
                    <input type="checkbox" id="Efogyasztas1" name="efogyasztas[]" value="1">
                    <label for="Efogyasztas1">1 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas2" name="efogyasztas[]" value="2">
                    <label for="Efogyasztas2">2 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas3" name="efogyasztas[]" value="3">
                    <label for="Efogyasztas3">3 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas4" name="efogyasztas[]" value="4">
                    <label for="Efogyasztas4">4 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas5" name="efogyasztas[]" value="5">
                    <label for="Efogyasztas5">5 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas6" name="efogyasztas[]" value="6">
                    <label for="Efogyasztas6">6 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas7" name="efogyasztas[]" value="7">
                    <label for="Efogyasztas7">7 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas8" name="efogyasztas[]" value="8">
                    <label for="Efogyasztas8">8 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas9" name="efogyasztas[]" value="9">
                    <label for="Efogyasztas9">9 kWh/100 ciklusonként</label><br>
                    <input type="checkbox" id="Efogyasztas10" name="efogyasztas[]" value="10">
                    <label for="Efogyasztas10">10 kWh/100 ciklusonként</label><br>



                    <?php
                    include_once ('scripts/Mosogep.php');
                    $efogyasztas="all";
                    if(isset($_POST['efogyasztas']) && in_array('1', $_POST['efogyasztas'])){
                        $efogyasztas="1";
                    }else if(isset($_POST['efogyasztas']) && in_array('2', $_POST['efogyasztas'])){
                        $efogyasztas="2";
                    }else if(isset($_POST['efogyasztas']) && in_array('3', $_POST['efogyasztas'])){
                        $efogyasztas="3";
                    }else if(isset($_POST['efogyasztas']) && in_array('4', $_POST['efogyasztas'])){
                        $efogyasztas="4";
                    }else if(isset($_POST['efogyasztas']) && in_array('5', $_POST['efogyasztas'])){
                        $efogyasztas="5";
                    }else if(isset($_POST['efogyasztas']) && in_array('6', $_POST['efogyasztas'])){
                        $efogyasztas="6";
                    }else if(isset($_POST['efogyasztas']) && in_array('7', $_POST['efogyasztas'])){
                        $efogyasztas="7";
                    }else if(isset($_POST['efogyasztas']) && in_array('8', $_POST['efogyasztas'])){
                        $efogyasztas="8";
                    }else if(isset($_POST['efogyasztas']) && in_array('9', $_POST['efogyasztas'])){
                        $efogyasztas="9";
                    }else if(isset($_POST['efogyasztas']) && in_array('10', $_POST['efogyasztas'])){
                        $efogyasztas="10";
                    }else{
                        $efogyasztas="all";
                    }
                    ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Súlyozott vízfogyasztás</div>
                <div class="szurok">
                    <input type="checkbox" id="sulyvizfogyasztas1" name="sulyvizfogyasztas[]" value="1">
                    <label for="sulyvizfogyasztas1">1 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas2" name="sulyvizfogyasztas[]" value="2">
                    <label for="sulyvizfogyasztas2">2 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas3" name="sulyvizfogyasztas[]" value="3">
                    <label for="sulyvizfogyasztas3">3 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas4" name="sulyvizfogyasztas[]" value="4">
                    <label for="sulyvizfogyasztas4">4 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas5" name="sulyvizfogyasztas[]" value="5">
                    <label for="sulyvizfogyasztas5">5 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas6" name="sulyvizfogyasztas[]" value="6">
                    <label for="sulyvizfogyasztas6">6 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas7" name="sulyvizfogyasztas[]" value="7">
                    <label for="sulyvizfogyasztas7">7 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas8" name="sulyvizfogyasztas[]" value="8">
                    <label for="sulyvizfogyasztas8">8 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas9" name="sulyvizfogyasztas[]" value="9">
                    <label for="sulyvizfogyasztas9">9 l</label><br>
                    <input type="checkbox" id="sulyvizfogyasztas10" name="sulyvizfogyasztas[]" value="10">
                    <label for="sulyvizfogyasztas10">10 l</label><br>

                    <?php
                    include_once ('scripts/Mosogep.php');

                    if(isset($_POST['sulyvizfogyasztas']) && in_array('1', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="1";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('2', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="2";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('3', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="3";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('4', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="4";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('5', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="5";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('6', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="6";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('7', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="7";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('8', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="8";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('9', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="9";
                    }else if(isset($_POST['sulyvizfogyasztas']) && in_array('10', $_POST['sulyvizfogyasztas'])){
                        $sulyvizfogyasztas="10";
                    }else{
                        $sulyvizfogyasztas="all";
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

        include_once ('scripts/Mosogep.php');

        $stid = mosogepLeker($raktaron, $eosztaly, $kapacitas, $efogyasztas, $sulyvizfogyasztas, $maximumar, 0);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
            <p class="termek-nev">Találatok száma: </p>
            '. $row['DBSZAM'].'
            <p> db</p>
            ';
        }


        $stid = mosogepLeker($raktaron, $eosztaly, $kapacitas, $efogyasztas, $sulyvizfogyasztas, $maximumar);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/mosogep/mosogep.png" alt="tv" class="termek-kepe">
            </div>
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Energiaosztály: '. $row['ENERGIAOSZTALY'] .'<br>
                        Kapacitás: '. $row['KAPACITAS'] .' kg<br>
                        Súlyozott energiafogyasztás: '. $row['SULYENERGIAFOGYASZTAS'] . ' kWh/100 ciklusonként<br>
                        Súlyozott vízfogyasztás: '. $row['SULYVIZFOGYASZTAS'] . ' l <br>
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
                            <input type="hidden" name="termekid" value="' . $row['MOSOGEPTERMEKID'] . '">
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