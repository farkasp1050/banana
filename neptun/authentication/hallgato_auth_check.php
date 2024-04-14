<?php
session_start();

// Ellenőrizd, hogy a felhasználó be van-e jelentkezve
if (!isset($_SESSION['user_email'])) {
    // Ha nincs bejelentkezve, átirányítsd a felhasználót a bejelentkezési oldalra
    header("Location: ../authentication/bejelentkezes.php");

} else if ($_SESSION['user_type'] !== 'hallgato') {
    header("Location: ../msg_screens/jogosultsag_megtagadva.php");
}
exit; // Fontos, hogy a kód futása itt véget érjen
?>
