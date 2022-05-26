<?php
include_once ('csatlakozas.php');

function telefonLeker($darab="all", $gyarto="all", $kepernyotipus = "all", $processzor= "all", $ram="all", $tarhely="all", $hatlapkamfelbontas="all", $ar="all", $leker="1")
{
    $conn =csatlakozas();

    $hanyadik_where=0;
    if($leker==1) {
        $sql_alap = 'SELECT   * FROM TELEFON LEFT JOIN TERMEK ON TELEFON.TELEFONTERMEKID=TERMEK.ID';
    }
    else{
        $sql_alap = 'SELECT  COUNT(*) AS DBSZAM FROM TELEFON LEFT JOIN TERMEK ON TELEFON.TELEFONTERMEKID=TERMEK.ID';
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
    if($processzor!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where PROCESSZOR = :processzor';
        }else {
            $sql_alap= $sql_alap . ' AND PROCESSZOR = :processzor';
        }
    }
    if($ram!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where RAM = :ram';
        }else {
            $sql_alap= $sql_alap . ' AND RAM = :ram';
        }
    }
    if($tarhely!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where TARHELY = :tarhely';
        }else {
            $sql_alap= $sql_alap . ' AND TARHELY = :tarhely';
        }
    }
    if($hatlapkamfelbontas!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where HATLAPKAMFELBONTAS <= :hatlapkamfelbontas ';
        }else {
            $sql_alap= $sql_alap . ' AND HATLAPKAMFELBONTAS <= :hatlapkamfelbontas ';
        }
    }
    if($ar!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where AR <= :ar ';
        }else {
            $sql_alap= $sql_alap . ' AND AR <= :ar ';
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
    if($processzor!="all") {
        oci_bind_by_name($stid, ":PROCESSZOR", $processzor);
    }
    if($ram!="all") {
        oci_bind_by_name($stid, ":RAM", $ram);
    }
    if($tarhely!="all") {
        oci_bind_by_name($stid, ":TARHELY", $tarhely);
    }
    if($hatlapkamfelbontas!="all") {
        oci_bind_by_name($stid, ":HATLAPKAMFELBONTAS", $hatlapkamfelbontas);
    }
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }

    oci_execute($stid);
    oci_close($conn);
    return $stid;
}
