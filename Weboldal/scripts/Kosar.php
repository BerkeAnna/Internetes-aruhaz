<?php
include_once('csatlakozas.php');

function kosarosszeg()
{
    $conn =csatlakozas();
    //$hanyadik_where=0;
        $sql_alap = 'SELECT SUM(MENNYISEG*AR) AS OSSZEG FROM KOSAR LEFT JOIN TERMEK ON KOSAR.TERMEKID=TERMEK.ID';



    $stid = oci_parse($conn, $sql_alap);

    oci_execute($stid);
    oci_close($conn);
    return $stid;
}


?>