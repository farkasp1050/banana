<?php
session_start();
// Ellenőrizd, hogy a felhasználó be van-e jelentkezve
if (!isset($_SESSION['user_email'])) {
    // Ha nincs bejelentkezve, átirányítsd a felhasználót a bejelentkezési oldalra
    header("Location: ../authentication/bejelentkezes.php");
}
?>
