<?php
include '../authentication/admin_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

if(isset($_POST['update']))
{
    $email = $_GET['ID'];
    $nev = $_POST['nev'];
    $szuletesi_datum = $_POST['szuletesi_datum'];
    $szuletesi_hely = $_POST['szuletesi_hely'];
    $kar = $_POST['kar'];
    $szak = $_POST['szak'];
    $szemeszter = $_POST['szemeszter'];
    $atlag = $_POST['atlag'];
    $jogviszony = $_POST['jogviszony'];
    $statusz = $_POST['statusz'];
    $napszak = $_POST['napszak'];
    $beosztas = $_POST['beosztas'];
    $kepesites = $_POST['kepesites'];
    $tanszek = $_POST['tanszek'];

    // Az Oracle adatbázis UPDATE parancsához szükséges SQL
    $query = "UPDATE FELHASZNALO SET NEV = :nev, SZULETESI_DATUM = TO_DATE(:szuletesi_datum, 'YYYY-MM-DD'), 
              SZULETESI_HELY = :szuletesi_hely, KAR = :kar, SZAK = :szak, SZEMESZTER = :szemeszter, ATLAG = :atlag,
              JOGVISZONY = :jogviszony, STATUSZ = :statusz, NAPSZAK = :napszak, BEOSZTAS = :beosztas, 
              KEPESITES = :kepesites, TANSZEK = :tanszek WHERE EMAIL = :email";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Paraméterek kötése
    oci_bind_by_name($stid, ':nev', $nev);
    oci_bind_by_name($stid, ':szuletesi_datum', $szuletesi_datum);
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
    oci_bind_by_name($stid, ':email', $email);

    $r = oci_execute($stid);
    if ($r) {
        header("Location: ../msg_screens/sik_f_modositas.php");
    } else {
        echo "Sikertelen módosítás!";
    }

    oci_free_statement($stid);
    oci_close($conn);
}
else
{
    header("Location: felhasznalo_modositasa_torlese.php");
}
?>
