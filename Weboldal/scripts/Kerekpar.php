<?php
include_once ('csatlakozas.php');

function kerekparLeker($darab="all", $tipus="all", $celcsoport="all", $vazanyag="all", $vazmeret="all", $ar="all", $leker="1")
{
    $conn =csatlakozas();

    $hanyadik_where=0;
    if($leker==1) {
        $sql_alap = 'SELECT * FROM KEREKPAR  LEFT JOIN TERMEK ON KEREKPAR.KEREKPARTERMEKID = TERMEK.ID';
    }else{
        $sql_alap = 'SELECT COUNT(*) AS DBSZAM FROM KEREKPAR  LEFT JOIN TERMEK ON KEREKPAR.KEREKPARTERMEKID = TERMEK.ID';
    }
    //$stid = oci_parse($conn, $sql_alap);

    if($tipus!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where TIPUS = :tipus';
        }else {
            $sql_alap= $sql_alap . ' AND TIPUS = :tipus';
        }
    }

    if($celcsoport!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where CELCSOPORT = :celcsoport';
        }else {
            $sql_alap= $sql_alap . ' AND CELCSOPORT = :celcsoport';
        }
    }

    if($vazanyag!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where VAZANYAG = :vazanyag';
        }else {
            $sql_alap= $sql_alap . ' AND VAZANYAG = :vazanyag';
        }
    }

    if($vazmeret!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where VAZMERET = :vazmeret';
        }else {
            $sql_alap= $sql_alap . ' AND VAZMERET = :vazmeret';
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
    if($tipus!="all") {
        oci_bind_by_name($stid, ":TIPUS", $tipus);
    }
    if($celcsoport!="all") {
        oci_bind_by_name($stid, ":CELCSOPORT", $celcsoport);
    }
    if($vazanyag!="all") {
        oci_bind_by_name($stid, ":VAZANYAG", $vazanyag);
    }
    if($vazmeret!="all") {
        oci_bind_by_name($stid, ":VAZMERET", $vazmeret);
    }
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }
    oci_execute($stid);
    oci_close($conn);

    return $stid;

}