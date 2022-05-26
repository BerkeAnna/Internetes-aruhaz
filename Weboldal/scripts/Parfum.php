<?php
include_once('csatlakozas.php');

function parfumLeker($darab="all", $celcsoport="all", $illata="all", $ar="all", $leker="1" )
{
    $conn =csatlakozas();
    $hanyadik_where=0;
    if($leker==1) {
        $sql_alap = 'SELECT * FROM PARFUM LEFT JOIN TERMEK ON PARFUM.PARFUMTERMEKID=TERMEK.ID';
    }
    else{
        $sql_alap='SELECT count(*) AS DBSZAM FROM PARFUM LEFT JOIN TERMEK ON PARFUM.PARFUMTERMEKID=TERMEK.ID';
    }
   // $stid = oci_parse($conn, $sql_alap);

    if($celcsoport!="all"){
        $hanyadik_where = $hanyadik_where + 1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where CELCSOPORT = :celcsoport';
        }else {
            $sql_alap= $sql_alap . ' AND CELCSOPORT = :celcsoport';
        }
    }
    if($illata!="all"){
        $hanyadik_where=$hanyadik_where+1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where ILLATFAJTA = :illatfajta';
        }else{
            $sql_alap = $sql_alap . ' and ILLATFAJTA = :illatfajta';
        }
    }
    if($ar!="all"){
        $hanyadik_where=$hanyadik_where+1;
        if($hanyadik_where<2) {
            $sql_alap = $sql_alap . ' where AR <= :ar';
        }else{
            $sql_alap = $sql_alap . ' and AR <= :ar';
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
    if($celcsoport!="all") {
        oci_bind_by_name($stid, ":CELCSOPORT", $celcsoport);
    }
    if($illata!="all") {
        oci_bind_by_name($stid, ":ILLATFAJTA", $illata);
    }
    if($ar!="all") {
        oci_bind_by_name($stid, ":AR", $ar);
    }

    oci_execute($stid);
    oci_close($conn);
    return $stid;
}


?>