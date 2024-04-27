<?php
include '../authentication/admin_auth_check.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/index_admin.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Adatok</title>
</head>
<body>

<!-- Top main start ------------------------------------------------------------------------------->
<header>
    <nav>
        <ul>
            <li>
                <a aria-current="page" href="index_admin.php">Főoldal</a>
            </li>
            <li>
                <a href="allamok_kezelese.php">Államok kezelése</a>
            </li>
            <li>
                <a href="termek_kezelese.php">Termek kezelése</a>
            </li>
            <li>
                <a href="../authentication/kijelentkezes_admin.php">Kijelentkezés</a>
            </li>
        </ul>
    </nav>
    <br>
    <div id="alap">
        <div id="baloszlop">
            <p id="focimszoveg">Műveleti<br>oldal.</p>
        </div>
        <div id="focimkep">
            <img src="../img/widescreen-study.jpg" alt="könyvek" height="330">
        </div>
    </div>
</header>
<hr>

<!-- Top main end ------------------------------------------------------------------------------->

<main>
    <h1>Az alábbi táblázatban kattintson arra a szegmensre, amelyet megszeretne tekinteni!</h1>
    <table class="lista_tablazat">
        <tr>
            <td>Új oktató hozzáadása.</td>
            <td><a href="oktato_hozzaadasa.php">Megtekintés</a></td>
        </tr>
        <tr>
            <td>Új hallgató hozzáadása.</td>
            <td><a href="hallgato_hozzaadasa.php">Megtekintés</a></td>
        </tr>
        <tr>
            <td>Felhasználók módosítása, törlése.</td>
            <td><a href="felhasznalok_modositasa_torlese.php">Megtekintés</a></td>
        </tr>
    </table>
</main>

</body>
</html>