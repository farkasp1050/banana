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
    $idopont = $_POST['idopont'];
    $ferohely = $_POST['ferohely'];
    $jelleg = $_POST['jelleg'];

    // Az Oracle adatbázis UPDATE parancsához szükséges SQL
    $query = "UPDATE vizsga SET idopont = TO_DATE(:idopont, 'YYYY-MM-DD\"T\"HH24:MI:SS'), ferohely = :ferohely, jelleg = :jelleg WHERE azonosito = :azonosito";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Paraméterek kötése
    oci_bind_by_name($stid, ':idopont', $idopont);
    oci_bind_by_name($stid, ':ferohely', $ferohely);
    oci_bind_by_name($stid, ':jelleg', $jelleg);
    oci_bind_by_name($stid, ':azonosito', $azonosito);

    $r = oci_execute($stid);
    if ($r) {
        header("Location: ../msg_screens/sik_v_modositas.php");
    } else {
        echo "Sikertelen módosítás!";
    }

    oci_free_statement($stid);
    oci_close($conn);
}
else
{
    header("Location: vizsgak_modositasa_torlese.php");
}
?>
