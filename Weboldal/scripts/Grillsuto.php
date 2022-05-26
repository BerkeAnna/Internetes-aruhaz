<?php
include_once ('csatlakozas.php');

function grillsutoLeker($darab="all", $uzemanyag="all", $felulet="all", $szelesseg="all", $magassag="all", $ar="all", $leker="1")
{

    $conn =csatlakozas();

    $hanyadik_where=0;

    if($leker==1) {
        $sql_alap = 'SELECT * FROM GRILLSUTO LEFT JOIN TERMEK ON GRILLSUTO.GRILLSUTOTERMEKID = TERMEK.ID';
    }else{
        $sql_alap = 'SELECT COUNT(*) AS DBSZAM FROM GRILLSUTO LEFT JOIN TERMEK ON GRILLSUTO.GRILLSUTOTERMEKID = TERMEK.ID';
    }

    if($uzemanyag!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where UZEMANYAGTIPUS = :uzemanyagtipus';
        }else {
            $sql_alap= $sql_alap . ' AND UZEMANYAGTIPUS = :uzemanyagtipus';
        }
    }
    if($felulet!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where GRILLEZOFELULET = :grillezofelulet';
        }else {
            $sql_alap= $sql_alap . ' AND GRILLEZOFELULET = :grillezofelulet';
        }
    }
    if($szelesseg!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where SZELESSEG <= :szelesseg';
        }else {
            $sql_alap= $sql_alap . ' AND SZELESSEG <= :szelesseg';
        }
    }
    if($magassag!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where MAGASSAG <= :magassag';
        }else {
            $sql_alap= $sql_alap . ' AND MAGASSAG <= :magassag';
        }
    }
    if($ar!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where AR <= :ar';
        }else {
            $sql_alap= $sql_alap . ' AND AR <= :ar';
        }
    }
    if($darab!="all"){
        $hanyadik_where=$hanyadik_where+1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where DARAB > 0';
        }else{
            $sql_alap = $sql_alap . ' and DARAB > 0';
        }
    }
    if($leker!=1) {
        $sql_alap = $sql_alap . ' group by KATEGORIA';
    }


    $stid = oci_parse($conn, $sql_alap);
    if($uzemanyag!="all") {
        oci_bind_by_name($stid, ":UZEMANYAGTIPUS", $uzemanyag);
    }
    if($felulet!="all") {
        oci_bind_by_name($stid, ":GRILLEZOFELULET", $felulet);
    }
    if($szelesseg!="all") {
        oci_bind_by_name($stid, ":SZELESSEG", $szelesseg);
    }
    if($magassag!="all") {
        oci_bind_by_name($stid, ":MAGASSAG", $magassag);
    }
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }

    oci_execute($stid);
    oci_close($conn);
    return $stid;
}
