<?php
include '../authentication/oktato_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

if(isset($_POST['update']))
{
    $azonosito = $_GET['ID'];
    $ferohely = $_POST['ferohely'];
    $cim = $_POST['cim'];
    $emelet = $_POST['emelet'];
    $ajto = $_POST['ajto'];

    // Az Oracle adatbázis UPDATE parancsához szükséges SQL
    $query = "UPDATE terem SET ferohely = :ferohely, cim = :cim, emelet = :emelet, ajto = :ajto WHERE nev = :azonosito";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Paraméterek kötése
    oci_bind_by_name($stid, ':ferohely', $ferohely);
    oci_bind_by_name($stid, ':cim', $cim);
    oci_bind_by_name($stid, ':emelet', $emelet);
    oci_bind_by_name($stid, ':ajto', $ajto);
    oci_bind_by_name($stid, ':azonosito', $azonosito);

    $r = oci_execute($stid);
    if ($r) {
        header("Location: ../msg_screens/sik_t_modositas.php");
    } else {
        echo "Sikertelen módosítás!";
    }

    oci_free_statement($stid);
    oci_close($conn);
}
else
{
    header("Location: termek_modositasa_torlese.php");
}
?>
