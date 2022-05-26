<?php
include_once('csatlakozas.php');

function karbantartLeker()
{
    $conn = csatlakozas();

    $sql_alap = "SELECT * FROM KARBANTART";
    $stid = oci_parse($conn, $sql_alap);

    oci_execute($stid);
    oci_close($conn);
    return $stid;
}