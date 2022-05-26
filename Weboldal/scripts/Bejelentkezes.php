<?php
include_once ('csatlakozas.php');

class Bejelentkezes {
    private $felhasznalok;

    function __construct($sql) {
        $conn = csatlakozas();
        $lekerdezes = $sql;

        $this->felhasznalok = oci_parse($conn, $lekerdezes);
        oci_execute($this->felhasznalok);
        oci_close($conn);
    }

    function bejelentkezestEllenoriz() {
        $vaneIlyenFelhasznalo = false;

        try {
            if (empty($_POST["email"]) or empty($_POST["passw"])) {
                throw new Exception("Mindkét mezőt ki kell tölteni!");
            }

            while (($row = oci_fetch_array($this->felhasznalok, OCI_ASSOC + OCI_RETURN_NULLS))) {
                if ($_POST["email"] == $row['EMAIL'] and $_POST["passw"] == $row['JELSZO']) {
                    $vaneIlyenFelhasznalo = true;

                    /*$_SESSION["user_id"] = $_POST["email"];*/

                    $_SESSION["adatok"] = array(
                        "id" => $row['ID'],
                        "felhasznalonev" => $row['FELHASZNALONEV'],
                        "jelszo" => $row['JELSZO'],
                        "nev" => $row['NEV'],
                        "email" => $row['EMAIL'],
                        "szuldatum" => $row['SZULDATUM'],
                        "szallitasiCim" => $row['SZALLITASICIM'],
                        "szamlaszam" => $row['SZAMLASZAM'],
                    );

                    header("Location: felhasznalo_adatok");
                }
            }

            if (!$vaneIlyenFelhasznalo) {
                throw new Exception("Hibás email cím vagy jelszó!");
            }
        } catch (Exception $e) {
            echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
        }
    }

    function adminBejelentkezestEllenoriz() {
        $vaneIlyenFelhasznalo = false;

        try {
            if (empty($_POST["username"]) or empty($_POST["password"])) {
                throw new Exception("Mindkét mezőt ki kell tölteni!");
            }

            while (($row = oci_fetch_array($this->felhasznalok, OCI_ASSOC + OCI_RETURN_NULLS))) {
                if ($_POST["username"] == $row['FELHASZNALONEV'] and $_POST["password"] == $row['JELSZO']) {
                    $vaneIlyenFelhasznalo = true;

                    $_SESSION["admin_id"] = $_POST["username"];

                    $_SESSION["adminAdatok"] = array(
                        "id" => $row['ID'],
                        "nev" => $row['NEV'],
                        "felhasznalonev" => $row['FELHASZNALONEV'],
                        "jelszo" => $row['JELSZO']
                    );
                }
            }

            if (!$vaneIlyenFelhasznalo) {
                throw new Exception("Hibás felhasználónév cím vagy jelszó!");
            }
        } catch (Exception $e) {
            echo "<p id='errorMessage' style='color: white; background-color: #9f364e;'>" . $e->getMessage() . "</p>";
        }
    }

}



