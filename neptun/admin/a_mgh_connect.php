<?php

include '../authentication/admin_auth_check.php';

$azonosito = $_POST['nev'];
$szamlaszam = $_POST['szamlaszam'];

if (!is_numeric($szamlaszam)) {
    // Ha a heti óraszám vagy a férőhely nem szám, akkor visszatérünk a regisztráció oldalra és kiírjuk egy hibaüzenetet
    header("Location: ../msg_screens/nem_szam.php");
    exit(); // Fontos, hogy a kód leálljon, és ne folytassa a következő lépéseket
}

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    echo "Sikeres csatlakozás!";
}

// SQL előkészítése
$sql = "INSERT INTO ALLAM(nev, szamlaszam)
        VALUES(:nev, :szamlaszam)";
$stid = oci_parse($conn, $sql);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Paraméterek bind-elése
oci_bind_by_name($stid, ':nev', $azonosito); // Itt használjuk az $azonosito változót
oci_bind_by_name($stid, ':szamlaszam', $szamlaszam);

// SQL lefuttatása
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    header("Location: ../msg_screens/sik_a_hozzaadas.php");
}

oci_free_statement($stid);
oci_close($conn);
?>
