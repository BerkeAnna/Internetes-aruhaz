<?php
include_once ('csatlakozas.php');

function horgaszbotLeker($darab="all", $tipus="all", $dobosuly="all", $resz="all", $teljeshossz="all", $ar="all", $leker="1") {

    $conn =csatlakozas();

    $hanyadik_where=0;

    if($leker==1) {
        $sql_alap = 'SELECT * FROM HORGASZBOT LEFT JOIN TERMEK ON HORGASZBOT.HORGASZBOTTERMEKID = TERMEK.ID';
    }
    else{
        $sql_alap = 'SELECT COUNT(*) AS DBSZAM FROM HORGASZBOT LEFT JOIN TERMEK ON HORGASZBOT.HORGASZBOTTERMEKID = TERMEK.ID';
    }

    if($tipus!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where TIPUS = :tipus';
        }else {
            $sql_alap= $sql_alap . ' AND TIPUS = :tipus';
        }
    }
    if($dobosuly!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where DOBOSULY = :dobosuly';
        }else {
            $sql_alap= $sql_alap . ' AND DOBOSULY = :dobosuly';
        }
    }
    if($resz!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where RESZ = :resz';
        }else {
            $sql_alap= $sql_alap . ' AND RESZ = :resz';
        }
    }
    if($teljeshossz!="all" ){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where TELJESHOSSZ <= :teljeshossz';
        }else {
            $sql_alap= $sql_alap . ' AND TELJESHOSSZ <= :teljeshossz';
        }
    }
    if($ar!="all" ){
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
    if($tipus!="all") {
        oci_bind_by_name($stid, ":TIPUS", $tipus);
    }
    if($dobosuly!="all") {
        oci_bind_by_name($stid, ":DOBOSULY", $dobosuly);
    }
    if($resz!="all") {
        oci_bind_by_name($stid, ":RESZ", $resz);
    }
    if($teljeshossz!="all") {
        oci_bind_by_name($stid, ":TELJESHOSSZ", $teljeshossz);
    }
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }

    oci_execute($stid);
    oci_close($conn);
    return $stid;
}
