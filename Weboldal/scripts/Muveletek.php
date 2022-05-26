<?php
include_once ('csatlakozas.php');

class Muveletek {
    private $adatok;
    private $conn;

    /**
     * @param string $username - csak akkor kell beírni a paramétert, ha az adatbázisban lévő valamelyik adminnal
     * szeretnél csatlakozni az adatbázishoz
     * @param string $password - csak akkor kell beírni a paramétert, ha az adatbázisban lévő valamelyik adminnal
     * szeretnél csatlakozni az adatbázishoz
     * @throws Exception
     */
    public function __construct(string $username = "user", string $password = "user") {
        if (strcmp($username, "user") !== 0) {
            if (!(csatlakozas($username, $password))) {
                throw new Exception("Nem sikerült csatlakozni az adatbázishoz!");
            } else {
                $this->conn = csatlakozas($username, $password);
            }
        } else {
            if (!(csatlakozas())) {
                throw new Exception("Nem sikerült csatlakozni az adatbázishoz!");
            } else {
                $this->conn = csatlakozas();
            }
        }

        $this->adatok = $_POST;
    }

    /**
     * @throws Exception
     */
    public function leker($query) {
        $stmt = oci_parse($this->conn, $query);
        $result = oci_execute($stmt);
        oci_close($this->conn);

        if (!$result) {
            throw new Exception(oci_error());
        }
        return $stmt;
    }

    /**
     * @throws Exception
     */
    public function felvitel($query) {
        $stmt = oci_parse($this->conn, $query);

        // Tömb elemenként binding-olok
        foreach ($this->adatok as $key => $val) {
            oci_bind_by_name($stmt, ":".$key, $this->adatok[$key]);
        }

        $result = oci_execute($stmt);

        if (!$result) {
            throw new Exception("HIBA!".oci_error());
        }
    }

    /**
     * @throws Exception
     */
    public function torles($query, $link) {
        $stmt = oci_parse($this->conn, $query);

        // Tömb elemenként binding-olok
        foreach ($this->adatok as $key => $val) {
            oci_bind_by_name($stmt, ":".$key, $this->adatok[$key]);
        }

        $result = oci_execute($stmt);

        if (!$result) {
            throw new Exception(oci_error());
        }

        header("Location: ".$link);
    }

    /**
     * @throws Exception
     */
    public function modositas($query, $link) {
        $stmt = oci_parse($this->conn, $query);

        // Tömb elemenként binding-olok
        foreach ($this->adatok as $key => $val) {
            oci_bind_by_name($stmt, ":".$key, $this->adatok[$key]);
        }

        $result = oci_execute($stmt);

        if (!$result) {
            throw new Exception(oci_error());
        }

        header("Location: ".$link);
    }

    /*public function modositas() {
        $query = "UPDATE VASARLO SET FELHASZNALONEV=:felhasznalonev, NEV=:nev, EMAIL=:email, 
                   SZALLITASICIM=:szallitasicim, SZAMLASZAM=:szamlaszam WHERE ID=:id";
        $stmt = oci_parse($this->conn, $query);
        oci_bind_by_name($stmt, ':felhasznalonev', $this->adatok["felhasznalonev"]);
        oci_bind_by_name($stmt, ':nev', $this->adatok["nev"]);
        oci_bind_by_name($stmt, ':email', $this->adatok["email"]);
        oci_bind_by_name($stmt, ':szallitasicim', $this->adatok["szallitasiCim"]);
        oci_bind_by_name($stmt, ':szamlaszam', $this->adatok["szamlaszam"]);
        oci_bind_by_name($stmt, ':id', $this->adatok["id"]);
        $result = oci_execute($stmt);

        if (!$result) {
            throw new Exception(oci_error());
        }

        foreach ($this->adatok as $key => $value) {
            if ($value != $_SESSION["adatok"][$key]) {
                $_SESSION["adatok"][$key] = $value;
            }
        }
        header("Location: felhasznalo_adatok");
    }*/

    /**
     * @param $query - Update sql parancs.<br>
     * Először is másolat kell a $_SESSION["adatok"] tömbről. Ennek a másolat tömb kulcsait kell ":" előtaggal ellátni
     * a binding miatt. Pl.: $adatok["kulcs"] -> :kulcs <br>
     * Ez a tömb az a tömb kell hogy legyen, amit post metódussal akarunk továbbítani az űrpapban. <br>
     * Nem térhet el a ":" utáni kifejezés a kulcstól semennyire, mert akkor nem fog módosulni az adat!
     * @param $link - sikeres módosítás után erre az oldalra irányít át az algoritmus.
     * @throws Exception
     */
    public function userModositas($query, $link, $session_name) {
        $stmt = oci_parse($this->conn, $query);

        // Tömb elemenként binding-olok
        foreach ($this->adatok as $key => $val) {
            oci_bind_by_name($stmt, ":".$key, $this->adatok[$key]);
        }

        $result = oci_execute($stmt);

        if (!$result) {
            throw new Exception(oci_error());
        }

        /*
         * A módosított adatok tömbjében keresek olyan elemet, ami különbözik a $_SESSION ugyanazon kulcsú elemétől.
         * A session-ben az előző adatok vannak még, ezért kell annak elemét is módosítani, hogy az adatoknál a
         * módosítottat lássuk. Ezután újra kell irányítani az oldalra a felhasználót, hogy frissüljön is a session.
        */
        foreach ($this->adatok as $key => $value) {
            if ($value != $_SESSION[$session_name][$key]) {
                $_SESSION[$session_name][$key] = $value;
            }
        }
        header("Location: ".$link);
    }


    /**
     * Segéd metódusok
     * @throws Exception
     */

    public function valtozokTisztitas() {
        foreach ($this->adatok as $adat) {
            if (empty($adat)) {
                throw new Exception("Nem lehet üres egyik adat sem!");
            }
        }

        foreach ($this->adatok as $adat) {
            htmlspecialchars($adat);
        }
    }

}