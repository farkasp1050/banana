
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
    <title>Vizsga kezelés</title>
</head>
<body>

<!-- Top main start ------------------------------------------------------------------------------->
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index_oktato.php">Adatok</a>
                </li>
                <li>
                    <a href="kurzusok_kezelese.php">Kurzusok kezelése</a>
                </li>
                <li>
                    <a aria-current="page" href="vizsgak_kezelese.php">Vizsgák kezelése</a>
                </li>
                <li>
                    <a href="../authentication/kijelentkezes_oktato.php">Kijelentkezés</a>
                </li>
            </ul>
        </nav>
        <br>
        <div id="alap">
            <div id="baloszlop">
                <p id="focimszoveg">Kezelje<br>vizsgáit.</p>
            </div>
            <div id="focimkep"> 
                <img src="../img/widescreen-study.jpg" alt="könyvek" height="330">
            </div>
        </div>
    </header>
    <hr>

<!-- Top main end ------------------------------------------------------------------------------->

    <main>
        <h1>Válassza ki a kívánt műveletet!</h1>
        <table class="lista_tablazat_kicsi">
            <tr>
                <td>Vizsga meghirdetése.</td>
                <td><a href="vizsga_meghirdetes.php">Ugrás</a></td>
            </tr>
            <tr>
                <td>Vizsgák módosítása, törlése.</td>
                <td><a href="vizsgak_modositasa_torlese.php">Ugrás</a></td>
            </tr>
    </main>

</body>
</html>