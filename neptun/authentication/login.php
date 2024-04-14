<?php
session_start();
$email = $_POST['email'];
$jelszo = $_POST['jelszo'];

if (!preg_match('/@(stud|teach)\.hu$/', $email) && $email !== 'admin') {
    // Ha nem megfelelő a domain, akkor visszatérünk a regisztráció oldalra és kiírjuk egy hibaüzenetet
    header("Location: ../msg_screens/hibas_email.php");
    exit(); // Fontos, hogy a kód leálljon, és ne folytassa a következő lépéseket
}

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE');

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    $sql = "SELECT * FROM FELHASZNALO WHERE email = :email";
    $stmt = oci_parse($conn, $sql);
    if (!$stmt) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    } else {
        oci_bind_by_name($stmt, ':email', $email);
        $r = oci_execute($stmt);
        if (!$r) {
            $e = oci_error($stmt);
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        } else {
            $row = oci_fetch_assoc($stmt);
            if ($row) {
                // Jelszó ellenőrzése
                if (password_verify($jelszo, $row['JELSZO'])) {
                    $_SESSION['user_email'] = $email; // Felhasználó email-jének tárolása session változóban.
                    if (strpos($email, '@teach.hu') !== false) {
                        $_SESSION['user_type'] = 'oktato'; // Felhasználó email típusának tárolása session változóban.
                        header("Location: ../msg_screens/sik_oktatoi_bejelentkezes.php");
                    } else if (strpos($email, '@stud.hu') !== false) {
                        $_SESSION['user_type'] = 'hallgato'; // Felhasználó email típusának tárolása session változóban.
                        header("Location: ../msg_screens/sik_hallgatoi_bejelentkezes.php");
                    } else if ($email === 'admin') {
                        $_SESSION['user_type'] = 'admin'; // Felhasználó email típusának tárolása session változóban.
                        header("Location: ../msg_screens/sik_admini_bejelentkezes.php");
                    }
                } else {
                    header("Location: helytelen_bejelentkezes.php");
                }
            } else {
                header("Location: helytelen_bejelentkezes.php");
            }
        }
    }
    oci_free_statement($stmt);
    oci_close($conn);
}
?>