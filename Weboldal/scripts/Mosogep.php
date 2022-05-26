<?php
include_once ('csatlakozas.php');

function mosogepLeker($darab="all", $energiaosztaly="all", $kapacitas="all", $sulyenergiafogyasztas="all", $sulyvizfogyasztas="all" , $ar="all", $leker="1") {
    $conn =csatlakozas();

    $hanyadik_where=0;
    if($leker==1) {
        $sql_alap = 'SELECT * FROM MOSOGEP LEFT JOIN TERMEK ON MOSOGEP.MOSOGEPTERMEKID=TERMEK.ID';
    }
    else{
        $sql_alap= 'SELECT COUNT(*) AS DBSZAM FROM MOSOGEP LEFT JOIN TERMEK ON MOSOGEP.MOSOGEPTERMEKID=TERMEK.ID';
    }
    if($energiaosztaly!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where ENERGIAOSZTALY = :energiaosztaly';
        }else {
            $sql_alap= $sql_alap . ' AND ENERGIAOSZTALY = :energiaosztaly';
        }
    }
    if($kapacitas!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where KAPACITAS <= :kapacitas';
        }else {
            $sql_alap= $sql_alap . ' AND KAPACITAS <= :kapacitas';
        }
    }
    if($sulyenergiafogyasztas!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where SULYENERGIAFOGYASZTAS = :sulyenergiafogyasztas';
        }else {
            $sql_alap= $sql_alap . ' AND SULYENERGIAFOGYASZTAS = :sulyenergiafogyasztas';
        }
    }
    if($sulyvizfogyasztas!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where SULYVIZFOGYASZTAS = :sulyvizfogyasztas';
        }else {
            $sql_alap= $sql_alap . ' AND SULYVIZFOGYASZTAS = :sulyvizfogyasztas';
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

    if($leker!=1){
        $sql_alap = $sql_alap . ' group by KATEGORIA';
    }

    $stid = oci_parse($conn, $sql_alap);
    if($energiaosztaly!="all") {
        oci_bind_by_name($stid, ":ENERGIAOSZTALY", $energiaosztaly);
    }
    if($kapacitas!="all") {
        oci_bind_by_name($stid, ":KAPACITAS", $kapacitas);
    }
    if($sulyenergiafogyasztas!="all") {
        oci_bind_by_name($stid, ":SULYENERGIAFOGYASZTAS", $sulyenergiafogyasztas);
    }
    if($sulyvizfogyasztas!="all") {
        oci_bind_by_name($stid, ":SULYVIZFOGYASZTAS", $sulyvizfogyasztas);
    }
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }

    oci_execute($stid);
    oci_close($conn);
    return $stid;
}


