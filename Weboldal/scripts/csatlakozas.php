<?php

/**
 * @param string $username - csak akkor kell beírni a paramétert, ha az adatbázisban lévő valamelyik adminnal
 * szeretnél csatlakozni az adatbázishoz
 * @param string $password - csak akkor kell beírni a paramétert, ha az adatbázisban lévő valamelyik adminnal
 * szeretnél csatlakozni az adatbázishoz
 * @return false|resource
 */
function csatlakozas(string $username = "ADMIN", string $password = "admin"){
    $conn = oci_connect($username, $password, 'localhost/XE');
    if(!$conn){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);

    }
    return $conn;
}
