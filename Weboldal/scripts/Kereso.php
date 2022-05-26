<?php
include_once ('csatlakozas.php');

function keresofv($nev="all")
{
    $conn =csatlakozas();

    $hanyadik_where=0;
    $sql_alap='SELECT * FROM TERMEK ';
    //$stid = oci_parse($conn, $sql_alap);

    if($nev!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where NEV = :nev';
        }
    }


    $stid = oci_parse($conn, $sql_alap);

    if($nev!="all") {
        oci_bind_by_name($stid, ":NEV", $nev);
    }

    oci_execute($stid);
    oci_close($conn);

    return $stid;

}