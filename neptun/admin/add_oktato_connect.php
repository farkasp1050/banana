<?php

include '../authentication/admin_auth_check.php';

// A formról beérkező adatok feldolgozása
$email = $_POST['email'];
$jelszo = $_POST['jelszo'];
$nev = $_POST['nev'];
$szuletesi_datum = $_POST['szuletesi_datum'];
$szuletesi_hely = $_POST['szuletesi_hely'];
$kar = NULL;
$szak = NULL;
$szemeszter = NULL;
$atlag = NULL;
$jogviszony = NULL;
$statusz = NULL;
$napszak = NULL;
$beosztas = $_POST['beosztas'];
$kepesites = $_POST['kepesites'];
$tanszek = $_POST['tanszek'];

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    echo "Sikeres csatlakozás!";
}

// Dátum konvertálása az Oracle formátumára (YYYY-MM-DD)
$szuletesi_datum_oracle_format = date('Y-m-d', strtotime($szuletesi_datum));

// SQL előkészítése
$sql = "INSERT INTO FELHASZNALO(email, jelszo, nev, szuletesi_datum, szuletesi_hely, kar, szak, szemeszter, atlag, jogviszony, statusz, napszak, beosztas, kepesites, tanszek) 
        VALUES(:email, :jelszo, :nev, TO_DATE(:szuletesi_datum, 'YYYY-MM-DD'), :szuletesi_hely, :kar, :szak, :szemeszter, :atlag, :jogviszony, :statusz, :napszak, :beosztas, :kepesites, :tanszek)";

$stid = oci_parse($conn, $sql);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Paraméterek bind-elése
oci_bind_by_name($stid, ':email', $email);
oci_bind_by_name($stid, ':jelszo', $jelszo);
oci_bind_by_name($stid, ':nev', $nev);
oci_bind_by_name($stid, ':szuletesi_datum', $szuletesi_datum_oracle_format); // Konvertált dátum használata
oci_bind_by_name($stid, ':szuletesi_hely', $szuletesi_hely);
oci_bind_by_name($stid, ':kar', $kar);
oci_bind_by_name($stid, ':szak', $szak);
oci_bind_by_name($stid, ':szemeszter', $szemeszter);
oci_bind_by_name($stid, ':atlag', $atlag);
oci_bind_by_name($stid, ':jogviszony', $jogviszony);
oci_bind_by_name($stid, ':statusz', $statusz);
oci_bind_by_name($stid, ':napszak', $napszak);
oci_bind_by_name($stid, ':beosztas', $beosztas);
oci_bind_by_name($stid, ':kepesites', $kepesites);
oci_bind_by_name($stid, ':tanszek', $tanszek);

// SQL lefuttatása
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    header("Location: ../msg_screens/sik_oktato_hozzaadas.php");
}

oci_free_statement($stid);
oci_close($conn);
?>
