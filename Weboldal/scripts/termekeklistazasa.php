<?php
include_once('csatlakozas.php');

function termekLeker($darab="all", $ar="all", $nev="all") {
    $conn =csatlakozas();

    $hanyadik_where=0;


    $sql_alap= 'SELECT * FROM TERMEK';

    if($ar!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where AR < :ar';
        }else {
            $sql_alap= $sql_alap . ' AND AR < :ar';
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
    if($nev!="all"){
        $hanyadik_where=$hanyadik_where+1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where NEV = :nev';
        }else{
            $sql_alap = $sql_alap . ' and NEV = :nev';
        }
    }

    $stid = oci_parse($conn, $sql_alap);
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }
    if($nev!="all") {
        oci_bind_by_name($stid, ":NEV", $nev);
    }

    oci_execute($stid);
    oci_close($conn);
    return $stid;

}

function termekkatlista(){

    $stid = oci_parse(csatlakozas(), 'SELECT KATEGORIA, COUNT(ID) AS MENNYISEG FROM TERMEK GROUP BY KATEGORIA');
    oci_execute($stid);

    return $stid;


}

function mennyitermek($ar){
    $conn =csatlakozas();

    $hanyadik_where=0;

    $sql_alap= 'SELECT COUNT(*) AS MENNYI FROM TERMEK';

    if($ar!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where AR < :ar';
        }else {
            $sql_alap= $sql_alap . ' AND AR < :ar';
        }
    }





    $stid = oci_parse($conn, $sql_alap);
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }
    oci_execute($stid);
    oci_close($conn);
    return $stid;


    return $stid;
}