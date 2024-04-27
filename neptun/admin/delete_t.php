<?php
include '../authentication/admin_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

if(isset($_GET['Del'])) {
    $nev = $_GET['Del'];

    // Az Oracle adatbázis DELETE parancsához szükséges SQL
    $query = "DELETE FROM terem WHERE nev = :nev";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Paraméterek kötése
    oci_bind_by_name($stid, ':nev', $nev);

    $r = oci_execute($stid);
    if ($r) {
        header("Location: ../msg_screens/sik_t_torles.php");
    } else {
        echo "Sikertelen törlés!";
    }

    oci_free_statement($stid);
    oci_close($conn);
} else {
    header("Location: termek_modositasa_torlese.php");
}
?>
