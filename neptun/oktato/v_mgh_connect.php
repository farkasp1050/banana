<?php
$azonostio = $_POST['azonosito'];
$idopont = date("Y-m-d H:i:s", strtotime($_POST['idopont']));
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
$sql = "INSERT INTO vizsga(azonosito, idopont, ferohely, jelleg)
        VALUES(:azonosito, TO_TIMESTAMP(:idopont, 'YYYY-MM-DD HH24:MI:SS'), :ferohely, :jelleg)";
$stid = oci_parse($conn, $sql);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Paraméterek bind-elése
oci_bind_by_name($stid, ':azonosito', $azonostio);
oci_bind_by_name($stid, ':idopont', $idopont);
oci_bind_by_name($stid, ':ferohely', $ferohely);
oci_bind_by_name($stid, ':jelleg', $jelleg);

// SQL lefuttatása
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    header("Location: ../msg_screens/sik_v_meghirdetes.php");
}

oci_free_statement($stid);
oci_close($conn);
?>
