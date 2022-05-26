<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="horgaszbotok" method="post"> <!-- A szűrőknek az űrlapja -->
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
            $dobosuly="all";
            $reszszam="all";
            ?>

            <div class="mini-containers">
                <div class="cimek">Típus</div>
                <div class="szurok">
                    <input type="checkbox" id="tipus1" name="tipus[]" value="Feeder">
                    <label for="tipus1">Feeder</label><br>
                    <input type="checkbox" id="tipuso2" name="tipus[]" value="Gyermek">
                    <label for="tipus2">Gyermek</label><br>
                    <input type="checkbox" id="tipus3" name="tipus[]" value="Harcsazo">
                    <label for="tipus3">Harcsázó</label><br>
                    <input type="checkbox" id="tipus4" name="tipus[]" value="Pergeto">
                    <label for="tipus4">Pergető</label><br>
                    <input type="checkbox" id="tipus5" name="tipus[]" value="Pontyozo">
                    <label for="tipus5">Pontyozó</label><br>
                    <input type="checkbox" id="tipus6" name="tipus[]" value="Sosvizi">
                    <label for="tipus6">Sósvízi</label><br>
                    <input type="checkbox" id="tipus7" name="tipus[]" value="Uszos">
                    <label for="tipus7">Úszós</label><br>
                    <input type="checkbox" id="tipus8" name="tipus[]" value="Utazos">
                    <label for="tipus8">Utazós</label><br>
                        <?php
                        include_once ('scripts/Telefon.php');

                        if(isset($_POST['tipus']) && in_array('Feeder', $_POST['tipus'])){
                            $tipus="Feeder";
                        }else if(isset($_POST['tipus']) && in_array('Gyermek', $_POST['tipus'])){
                            $tipus="Gyermek";
                        }else if(isset($_POST['tipus']) && in_array('Harcsazo', $_POST['tipus'])){
                            $tipus="Harcsazo";
                        }else if(isset($_POST['tipus']) && in_array('Pergeto', $_POST['tipus'])){
                            $tipus="Pergeto";
                        }else if(isset($_POST['tipus']) && in_array('Pontyozo', $_POST['tipus'])){
                            $tipus="Pontyozo";
                        }else if(isset($_POST['tipus']) && in_array('Sosvizi', $_POST['tipus'])){
                            $tipus="Sosvizi";
                        }else if(isset($_POST['tipus']) && in_array('Uszos', $_POST['tipus'])){
                            $tipus="Uszos";
                        }else if(isset($_POST['tipus']) && in_array('Utazos', $_POST['tipus'])){
                            $tipus="Utazos";
                        }else{
                            $tipus="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Dobósúly</div>
                <div class="szurok">
                    <input type="checkbox" id="dobosuly1" name="dobosuly[]" value="1">
                    <label for="tipus1">1 g</label><br>
                    <input type="checkbox" id="dobosuly2" name="dobosuly[]" value="2">
                    <label for="tipus2">2 g</label><br>
                    <input type="checkbox" id="dobosuly3" name="dobosuly[]" value="3">
                    <label for="tipus3">3 g</label><br>
                    <input type="checkbox" id="dobosuly4" name="dobosuly[]" value="4">
                    <label for="dobosuly4">4 g</label><br>
                    <input type="checkbox" id="dobosuly5" name="dobosuly[]" value="5">
                    <label for="dobosuly5">5 g</label><br>
                    <input type="checkbox" id="dobosuly6" name="dobosuly[]" value="6">
                    <label for="dobosuly6">6 g</label><br>
                    <input type="checkbox" id="dobosuly7" name="dobosuly[]" value="7">
                    <label for="dobosuly7">7 g</label><br>
                    <input type="checkbox" id="dobosuly8" name="dobosuly[]" value="8">
                    <label for="dobosuly8">8 g</label><br>
                    <input type="checkbox" id="dobosuly9" name="dobosuly[]" value="9">
                    <label for="dobosuly9">9 g</label><br>
                        <?php
                        include_once ('scripts/Telefon.php');

                        if(isset($_POST['dobosuly']) && in_array('1', $_POST['dobosuly'])){
                            $dobosuly="1";
                        }else if(isset($_POST['dobosuly']) && in_array('2', $_POST['dobosuly'])){
                            $dobosuly="2";
                        }else if(isset($_POST['dobosuly']) && in_array('3', $_POST['dobosuly'])){
                            $dobosuly="3";
                        }else if(isset($_POST['dobosuly']) && in_array('4', $_POST['dobosuly'])){
                            $dobosuly="4";
                        }else if(isset($_POST['dobosuly']) && in_array('5', $_POST['dobosuly'])){
                            $dobosuly="5";
                        }else if(isset($_POST['dobosuly']) && in_array('6', $_POST['dobosuly'])){
                            $dobosuly="6";
                        }else if(isset($_POST['dobosuly']) && in_array('7', $_POST['dobosuly'])){
                            $dobosuly="7";
                        }else if(isset($_POST['dobosuly']) && in_array('8', $_POST['dobosuly'])){
                            $dobosuly="8";
                        }else if(isset($_POST['dobosuly']) && in_array('9', $_POST['dobosuly'])){
                            $dobosuly="9";
                        }else{
                            $dobosuly="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Részek száma</div>
                <div class="szurok">
                    <input type="checkbox" id="reszszam1" name="reszszam[]" value="1">
                    <label for="reszszam1">1</label><br>
                    <input type="checkbox" id="reszszam2" name="reszszam[]" value="2">
                    <label for="reszszam2">2</label><br>
                    <input type="checkbox" id="reszszam3" name="reszszam[]" value="3">
                    <label for="reszszam3">3</label><br>
                    <input type="checkbox" id="reszszam4" name="reszszam[]" value="4">
                    <label for="reszszam4">4</label><br>
                    <input type="checkbox" id="reszszam5" name="reszszam[]" value="5">
                    <label for="reszszam5">5</label><br>
                    <input type="checkbox" id="reszszam6" name="reszszam[]" value="6">
                    <label for="reszszam6">6</label><br>
                    <input type="checkbox" id="reszszam7" name="reszszam[]" value="7">
                    <label for="reszszam7">7</label><br>
                    <input type="checkbox" id="reszszam8" name="reszszam[]" value="8">
                    <label for="reszszam8">8</label><br>
                    <input type="checkbox" id="reszszam9" name="reszszam[]" value="9">
                    <label for="reszszam9">9</label><br>

                        <?php
                        include_once ('scripts/Horgaszbot.php');

                        if(isset($_POST['reszszam']) && in_array('1', $_POST['reszszam'])){
                            $reszszam="1";
                        }else if(isset($_POST['reszszam']) && in_array('2', $_POST['reszszam'])){
                            $reszszam="2";
                        }else if(isset($_POST['reszszam']) && in_array('3', $_POST['reszszam'])){
                            $reszszam="3";
                        }else if(isset($_POST['reszszam']) && in_array('4', $_POST['reszszam'])){
                            $reszszam="4";
                        }else if(isset($_POST['reszszam']) && in_array('5', $_POST['reszszam'])){
                            $reszszam="5";
                        }else if(isset($_POST['reszszam']) && in_array('6', $_POST['reszszam'])){
                            $reszszam="6";
                        }else if(isset($_POST['reszszam']) && in_array('7', $_POST['reszszam'])){
                            $reszszam="7";
                        }else if(isset($_POST['reszszam']) && in_array('8', $_POST['reszszam'])){
                            $reszszam="8";
                        }else if(isset($_POST['reszszam']) && in_array('9', $_POST['reszszam'])){
                            $reszszam="9";
                        }else{
                            $reszszam="all";
                        }
                        ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Maximális hossz</div>
                <div class="szurok">
                    <input type="float" id="teljhossz1" name="teljeshossz" placeholder="maximum hossz méterben"> m

                    <?php
                    if(isset($_POST['teljeshossz']) && !empty($_POST['teljeshossz']))   {
                    $teljeshossz=$_POST['teljeshossz'];
                    }
                    else{
                        $teljeshossz="all";
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

        include_once ('scripts/Horgaszbot.php');

        $stid = horgaszbotLeker($raktaron, $tipus, $dobosuly, $reszszam, $teljeshossz, $maximumar, 0);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
            <p class="termek-nev">Találatok száma: </p>
            '. $row['DBSZAM'].'
            <p> db</p>
            ';
        }

        $stid = horgaszbotLeker($raktaron, $tipus, $dobosuly, $reszszam, $teljeshossz, $maximumar);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/horgaszbot/horgaszbot.png" alt="tv" class="termek-kepe">
            </div>
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Típus: '. $row['TIPUS'] .' <br>
                        Dobósúly: '. $row['DOBOSULY'] .' g<br>
                        Részek száma: '. $row['RESZ'] .' <br>
                        Teljes hossz: '. $row['TELJESHOSSZ'] . ' m<br>
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
                            <input type="hidden" name="termekid" value="' . $row['HORGASZBOTTERMEKID'] . '">
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