<?php
include '../authentication/admin_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

if(isset($_GET['Del']))
{
    // Az URL-ből kapott felhasználó email címének lekérése
    $email = $_GET['Del'];

    // Az Oracle adatbázis DELETE parancsához szükséges SQL
    $query = "DELETE FROM FELHASZNALO WHERE EMAIL = :email";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Paraméter kötése
    oci_bind_by_name($stid, ':email', $email);

    $r = oci_execute($stid);
    if ($r) {
        header("Location: ../msg_screens/sik_f_torles.php");
    } else {
        echo "Sikertelen törlés!";
    }

    oci_free_statement($stid);
    oci_close($conn);
}
else
{
    header("Location: felhasznalok_modositasa_torlese.php");
}
?>
