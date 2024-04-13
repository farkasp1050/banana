<?php
$nev = $_POST['nev'];
$ferohely = $_POST['ferohely'];
$jelleg = $_POST['jelleg'];
$cim = $_POST['cim'];
$emelet = $_POST['emelet'];
$ajto = $_POST['ajto'];

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    echo "Sikeres csatlakozás!";
}

// SQL előkészítése
$sql = "INSERT INTO TEREM(nev, ferohely, jelleg, cim, emelet, ajto)
        VALUES(:nev, :ferohely, :jelleg, :cim, :emelet, :ajto)";
$stid = oci_parse($conn, $sql);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Paraméterek bind-elése
oci_bind_by_name($stid, ':nev', $nev); // Módosítottuk az $azonosito-t $nev-re
oci_bind_by_name($stid, ':ferohely', $ferohely);
oci_bind_by_name($stid, ':jelleg', $jelleg);
oci_bind_by_name($stid, ':cim', $cim);
oci_bind_by_name($stid, ':emelet', $emelet);
oci_bind_by_name($stid, ':ajto', $ajto);

// SQL lefuttatása
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    header("Location: ../msg_screens/sik_t_hozzaadas.php");
}

oci_free_statement($stid);
oci_close($conn);
?>
