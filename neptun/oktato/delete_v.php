<?php
include '../authentication/oktato_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

if (isset($_GET['Del'])) {
    $azonosito = $_GET['Del'];
    $query = "DELETE FROM vizsga WHERE azonosito = :azonosito";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_bind_by_name($stid, ':azonosito', $azonosito);

    $r = oci_execute($stid);
    if ($r) {
        header("Location: ../msg_screens/sik_v_torles.php");
    } else {
        echo "Ellenőrizd a parancsot!";
    }

    oci_free_statement($stid);
    oci_close($conn);
}
?>
