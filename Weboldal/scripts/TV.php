<?php
include_once('csatlakozas.php');

function tvLeker($darab="all",$gyarto="all", $kepernyotipus = "all", $szelesseg= "all", $magassag="all", $ar="all", $leker="1") {
    $conn =csatlakozas();

    $hanyadik_where=0;

    if($leker==1) {
        $sql_alap = 'SELECT * FROM TV LEFT JOIN TERMEK ON TV.TVTERMEKID = TERMEK.ID';
    }else{
        $sql_alap = 'SELECT COUNT(*) AS DBSZAM FROM TV LEFT JOIN TERMEK ON TV.TVTERMEKID = TERMEK.ID';
    }

    if($gyarto!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where GYARTO = :gyarto';
        }else {
            $sql_alap= $sql_alap . ' AND GYARTO = :gyarto';
        }
    }
    if($kepernyotipus!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where KEPERNYOTIPUS = :kepernyotipus';
        }else {
            $sql_alap= $sql_alap . ' AND KEPERNYOTIPUS = :kepernyotipus';
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

    if($gyarto!="all") {
        oci_bind_by_name($stid, ":GYARTO", $gyarto);
    }
    if($kepernyotipus!="all") {
        oci_bind_by_name($stid, ":KEPERNYOTIPUS", $kepernyotipus);
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