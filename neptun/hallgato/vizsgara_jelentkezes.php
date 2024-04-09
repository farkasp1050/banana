
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/index_hallgato.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Vizsgajelentkezés</title>
</head>
<body>

<!-- Top main start ------------------------------------------------------------------------------->
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index_hallgato.php">Adatok</a>
                </li>
                <li>
                    <a href="kurzusra_jelentkezes.php">Kurzusra jelentkezés</a>
                </li>
                <li>
                    <a aria-current="page" href="vizsgara_jelentkezes.php">Vizsgára jelentkezés</a>
                </li>
                <li>
                    <a href="../authentication/kijelentkezes_hallgato.php">Kijelentkezés</a>
                </li>
            </ul>
        </nav>
        <br>
        <div id="alap">
            <div id="baloszlop">
                <p id="focimszoveg">Vegye fel<br>vizsgáit.</p>
            </div>
            <div id="focimkep">
                <img src="../img/widescreen-study.jpg" alt="könyvek" height="330">
            </div>
        </div>
    </header>
    <hr>

<!-- Top main end ------------------------------------------------------------------------------->

    <main>
        <p>vizsgák felvétele</p>
    </main>

</body>
</html>