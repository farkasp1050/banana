<?php

include '../authentication/oktato_auth_check.php';

$kod = $_POST['kod'];
$cim = $_POST['cim'];
$szemeszter = $_POST['szemeszter'];
$heti_oraszam = $_POST['heti_oraszam'];
$ferohely = $_POST['ferohely'];
$jelleg = $_POST['jelleg'];

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    echo "Sikeres csatlakozás!";
}

// SQL előkészítése
$sql = "INSERT INTO KURZUS(kod, cim, szemeszter, heti_oraszam, ferohely, jelleg)
        VALUES(:kod, :cim, :szemeszter, :heti_oraszam, :ferohely, :jelleg)";
$stid = oci_parse($conn, $sql);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Paraméterek bind-elése
oci_bind_by_name($stid, ':kod', $kod);
oci_bind_by_name($stid, ':cim', $cim);
oci_bind_by_name($stid, ':szemeszter', $szemeszter);
oci_bind_by_name($stid, ':heti_oraszam', $heti_oraszam);
oci_bind_by_name($stid, ':ferohely', $ferohely);
oci_bind_by_name($stid, ':jelleg', $jelleg);

// SQL lefuttatása
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    header("Location: ../msg_screens/sik_k_meghirdetes.php");
}

oci_free_statement($stid);
oci_close($conn);
?>
