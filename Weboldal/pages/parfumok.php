<?php
session_start();
?>

<link href="CSS/tv.css" type="text/css" rel="stylesheet">

<div id="container">
    <div id="filters-container"> <!-- A szűrők nagy div-je. Konkrétan az egész bal oldali rész. -->
        <form action="parfumok" method="post"> <!-- A szűrőknek az űrlapja -->
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
<!--            külön fájlba függvény onclick-el ami belerakja "" közé a value-t és utána pakolja a lekerbe-->

            <?php
            $celcsoport="all";
            $illatfajta="all";
            ?>
            <div class="mini-containers">
                <div class="cimek">Célcsoport</div>
                <div class="szurok">
                    <input type="checkbox" id="celcsoport1" name="celcsoport[]" value="Noi" >
                    <label for="celcsoport1" >Női</label><br>
                    <input type="checkbox" id="celcsoport2" name="celcsoport[]" value="Ferfi">
                    <label for="celcsoport2">Férfi</label><br>
                    <input type="checkbox" id="celcsoport3" name="celcsoport[]" value="Unisex">
                    <label for="celcsoport3">Unisex</label><br>
                            <?php
                                include_once ('scripts/Parfum.php');

                                if(isset($_POST['celcsoport']) && in_array('Noi', $_POST['celcsoport'])){
                                   $celcsoport="Noi";
                                }else if(isset($_POST['celcsoport']) && in_array('Ferfi', $_POST['celcsoport'])){
                                   $celcsoport="Ferfi";
                                }else if(isset($_POST['celcsoport']) && in_array('Unisex', $_POST['celcsoport'])){
                                   $celcsoport="Unisex";
                                }else{
                                   $celcsoport="all";
                                }
                            ?>
                </div>
            </div>

            <div class="mini-containers">
                <div class="cimek">Illatfajta</div>
                <div class="szurok">
                    <input type="checkbox" id="illatfajta1" name="illatfajta[]" value="Aromas">
                    <label for="illatfajta1">Aromás</label><br>
                    <input type="checkbox" id="illatfajta2" name="illatfajta[]" value="Boros">
                    <label for="illatfajta2">Boros</label><br>
                    <input type="checkbox" id="illatfajta3" name="illatfajta[]" value="Citrusos">
                    <label for="illatfajta3">Citrusos</label><br>
                    <input type="checkbox" id="illatfajta4" name="illatfajta[]" value="Fas">
                    <label for="illatfajta4">Fás</label><br>
                    <input type="checkbox" id="illatfajta5" name="illatfajta[]" value="Fuszeres">
                    <label for="illatfajta5">Fűszeres</label><br>
                    <input type="checkbox" id="illatfajta6" name="illatfajta[]" value="Keleti">
                    <label for="illatfajta6">Keleti</label><br>
                    <input type="checkbox" id="illatfajta7" name="illatfajta[]" value="Viragos">
                    <label for="illatfajta7">Virágos</label><br>
                    <input type="checkbox" id="illatfajta8" name="illatfajta[]" value="Ciprusos">
                    <label for="illatfajta8">Ciprusos</label><br>

                    <?php
                    include_once ('scripts/Parfum.php');

                    if(isset($_POST['illatfajta']) && in_array('Aromas', $_POST['illatfajta'])){
                    $illatfajta="Aromas";
                    }else if(isset($_POST['illatfajta']) && in_array('Citrusos', $_POST['illatfajta'])){
                    $illatfajta="Citrusos";
                    }else if(isset($_POST['illatfajta']) && in_array('Fas', $_POST['illatfajta'])){
                    $illatfajta="Fas";
                    }else if(isset($_POST['illatfajta']) && in_array('Borsos', $_POST['illatfajta'])){
                    $illatfajta="Borsos";
                    }else if(isset($_POST['illatfajta']) && in_array('Fuszeres', $_POST['illatfajta'])){
                    $illatfajta="Fuszeres";
                    }else if(isset($_POST['illatfajta']) && in_array('Keleti', $_POST['illatfajta'])){
                    $illatfajta="Keleti";
                    }else if(isset($_POST['illatfajta']) && in_array('Viragos', $_POST['illatfajta'])){
                    $illatfajta="Viragos";
                    }else if(isset($_POST['illatfajta']) && in_array('Ciprusos', $_POST['illatfajta'])){
                        $illatfajta="Ciprusos";
                    }else{
                    $illatfajta="all";
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


        $stid = parfumleker($raktaron, $celcsoport, $illatfajta, $maximumar, 2);
        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
            <p class="termek-nev">Találatok száma: </p>
            '. $row['DBSZAM'].'
            <p> db</p>
            ';
        }

        $stid = parfumLeker($raktaron, $celcsoport, $illatfajta, $maximumar);

        while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))) {
            echo '
                <div class="termek">
            <div class="kep">
                <img src="./images/parfum/parfum.png" alt="tv" class="termek-kepe">
            </div>
            <div class="szoveg-main">
                <div class="szoveg">
                    <div class="termek-nev"><a href="">'. $row['GYARTO'] .' '. $row['NEV'] .'</a></div>
                    <div class="termek-jellemzok">
                        Célcsoport: '. $row['CELCSOPORT'] .'<br>
                        Illatfajta: '. $row['ILLATFAJTA'] .'<br>
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
                            <input type="hidden" name="termekid" value="' . $row['PARFUMTERMEKID'] . '">
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