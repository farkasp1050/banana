
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/index_oktato.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Adatok</title>
</head>
<body>

<!-- Top main start ------------------------------------------------------------------------------->
    <header>
        <nav>
            <ul>
                <li>
                    <a aria-current="page" href="index_oktato.php">Adatok</a>
                </li>
                <li>
                    <a href="kurzusok_kezelese.php">Kurzusok kezelése</a>
                </li>
                <li>
                    <a href="vizsgak_kezelese.php">Vizsgák kezelése</a>
                </li>
                <li>
                    <a href="../authentication/kijelentkezes_oktato.php">Kijelentkezés</a>
                </li>
            </ul>
        </nav>
        <br>
        <div id="alap">
            <div id="baloszlop">
                <p id="focimszoveg">Linkek a<br>listákhoz.</p>
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
            <td>Tantermek, előadótermek.</td>
            <td><a href="../listazasok-lekerdezesek/termek.php">Megtekintés</a></td>
        </tr>
        <tr>
            <td>Összes oktató megtekintése (legfiatalabbtól legidősebbig).</td>
            <td><a href="../listazasok-lekerdezesek/oktatok.php">Megtekintés</a></td>
        </tr>
    </table>
</main>

</body>
</html>