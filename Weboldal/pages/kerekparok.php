<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="kerekparok" method="post"> <!-- A szűrőknek az űrlapja -->
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
                $celcsoport="all";
                $vazanyag="all";
                $vazmeret="all";
            ?>

            <div class="mini-containers">
                <div class="cimek">Típus</div>
                <div class="szurok">
                    <input type="checkbox" id="tipus1" name="tipus[]" value="BMX">
                    <label for="tipus1">BMX</label><br>
                    <input type="checkbox" id="tipuso2" name="tipus[]" value="City">
                    <label for="tipus2">City</label><br>
                    <input type="checkbox" id="tipus3" name="tipus[]" value="Fixi">
                    <label for="tipus3">Fixi</label><br>
                    <input type="checkbox" id="tipus4" name="tipus[]" value="Orszaguti">
                    <label for="tipus4">Országúti</label><br>
                    <input type="checkbox" id="tipus5" name="tipus[]" value="Osszecsukhato">
                    <label for="tipus5">Összecsukható</label><br>
                    <input type="checkbox" id="tipus6" name="tipus[]" value="Trekking">
                    <label for="tipus6">Trekking</label><br>
                    <input type="checkbox" id="tipus7" name="tipus[]" value="Tricikli">
                    <label for="tipus7">Tricikli</label><br>
                        <?php
                        include_once ('scripts/Kerekpar.php');

                        if(isset($_POST['tipus']) && in_array('BMX', $_POST['tipus'])){
                            $tipus="BMX";
                        }else if(isset($_POST['tipus']) && in_array('City', $_POST['tipus'])){
                            $tipus="City";
                        }else if(isset($_POST['tipus']) && in_array('Fixi', $_POST['tipus'])){
                            $tipus="Fixi";
                        }else if(isset($_POST['tipus']) && in_array('Orszaguti', $_POST['tipus'])){
                            $tipus="Orszaguti";
                        }else if(isset($_POST['tipus']) && in_array('Osszecsukhato', $_POST['tipus'])){
                            $tipus="Osszecsukhato";
                        }else if(isset($_POST['tipus']) && in_array('Trekking', $_POST['tipus'])){
                            $tipus="Trekking";
                        }else if(isset($_POST['tipus']) && in_array('Tricikli', $_POST['tipus'])){
                            $tipus="Tricikli";
                        }else{
                            $tipus="all";
                        }
                        ?>
                </div>
            </div>
            <div class="mini-containers">
                <div class="cimek">Célcsoport</div>
                <div class="szurok">
                    <input type="checkbox" id="celcsoport1" name="celcsoport[]" value="Noi">
                    <label for="celcsoport">Női</label><br>
                    <input type="checkbox" id="celcsoport2" name="celcsoport[]" value="Ferfi">
                    <label for="celcsoport2">Férfi</label><br>
                    <input type="checkbox" id="celcsoport3" name="celcsoport[]" value="Gyermek">
                    <label for="celcsoport3">Gyermek</label><br>

                        <?php
                        include_once ('scripts/Kerekpar.php');

                        if(isset($_POST['celcsoport']) && in_array('Noi', $_POST['celcsoport'])){
                            $celcsoport="Noi";
                        }else if(isset($_POST['celcsoport']) && in_array('Ferfi', $_POST['celcsoport'])){
                            $celcsoport="Ferfi";
                        }else if(isset($_POST['celcsoport']) && in_array('Gyermek', $_POST['celcsoport'])){
                            $celcsoport="Gyermek";
                        }else{
                            $celcsoport="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Váz anyaga</div>
                <div class="szurok">
                    <input type="checkbox" id="vazanyag1" name="vazanyag[]" value="Acel">
                    <label for="vazanyag1">Acél</label><br>
                    <input type="checkbox" id="vazanyag2" name="vazanyag[]" value="Aluminium">
                    <label for="vazanyag2">Aluminium</label><br>
                    <input type="checkbox" id="vazanyag3" name="vazanyag[]" value="Karbon">
                    <label for="vazanyag3">Karbon</label><br>
                    <input type="checkbox" id="vazanyag4" name="vazanyag[]" value="Magnezium">
                    <label for="vazanyag4">Magnézium</label><br>

                        <?php
                        include_once ('scripts/Kerekpar.php');

                        if(isset($_POST['vazanyag']) && in_array('Acel', $_POST['vazanyag'])){
                            $vazanyag="Acel";
                        }else if(isset($_POST['vazanyag']) && in_array('Aluminium', $_POST['vazanyag'])){
                            $vazanyag="Aluminium";
                        }else if(isset($_POST['vazanyag']) && in_array('Karbon', $_POST['vazanyag'])){
                            $vazanyag="Karbon";
                        }else if(isset($_POST['vazanyag']) && in_array('Magnezium', $_POST['vazanyag'])){
                            $vazanyag="Magnezium";
                        }else{
                            $vazanyag="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Váz mérete</div>
                <div class="szurok">
                    <input type="checkbox" id="vazmeret1" name="vazmeret[]" value="XS">
                    <label for="vazmeret1">XS</label><br>
                    <input type="checkbox" id="vazmeret2" name="vazmeret[]" value="S">
                    <label for="vazmeret2">S</label><br>
                    <input type="checkbox" id="vazmeret3" name="vazmeret[]" value="M">
                    <label for="vazmeret3">M</label><br>
                    <input type="checkbox" id="vazmeret4" name="vazmeret[]" value="L">
                    <label for="vazmeret4">L</label><br>
                    <input type="checkbox" id="vazmeret5" name="vazmeret[]" value="XL">
                    <label for="vazmeret5">XL</label><br>
                    <input type="checkbox" id="vazmeret6" name="vazmeret[]" value="XXL">
                    <label for="vazmeret6">XXL</label><br>

                        <?php
                        include_once ('scripts/Kerekpar.php');

                        if(isset($_POST['vazmeret']) && in_array('XS', $_POST['vazmeret'])){
                            $vazmeret="XS";
                        }else if(isset($_POST['vazmeret']) && in_array('S', $_POST['vazmeret'])){
                            $vazmeret="S";
                        }else if(isset($_POST['vazmeret']) && in_array('M', $_POST['vazmeret'])){
                            $vazmeret="M";
                        }else if(isset($_POST['vazmeret']) && in_array('L', $_POST['vazmeret'])){
                            $vazmeret="L";
                        }else if(isset($_POST['vazmeret']) && in_array('XL', $_POST['vazmeret'])){
                            $vazmeret="XL";
                        }else if(isset($_POST['vazmeret']) && in_array('XXL', $_POST['vazmeret'])) {
                            $vazmeret = "XXL";
                        }else{
                            $vazmeret="all";
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

        include_once ('scripts/Kerekpar.php');

        $stid = kerekparLeker($raktaron, $tipus, $celcsoport, $vazanyag, $vazmeret, $maximumar, 0);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
            <p class="termek-nev">Találatok száma: </p>
            '. $row['DSZAM'].'
            <p> db</p>
            ';
        }

        $stid = kerekparLeker($raktaron, $tipus, $celcsoport, $vazanyag, $vazmeret, $maximumar);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {

            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/kerekpar/kerekpar.png" alt="tv" class="termek-kepe">
            </div>
            
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Típus: '. $row['TIPUS'] .'<br>
                        Célcsoport: '. $row['CELCSOPORT'] .'<br>
                        Váz anyaga: '. $row['VAZANYAG'] . '<br>
                        Váz mérete: '. $row['VAZMERET'] . ' 
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
                            <input type="hidden" name="termekid" value="' . $row['KEREKPARTERMEKID'] . '">
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