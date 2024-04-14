
<?php

include '../authentication/oktato_auth_check.php';

    $conn = mysqli_connect("localhost", "root", "", "neptun");
    if ($conn->connect_error) {
        die("Sikertelen csatlakozás!");
    }
    $query = "SELECT * FROM vizsga";
    $result = mysqli_query($conn, $query);

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
        <table align="center" class="lista_tablazat_terem">
            <tr>
                <th>Azonosító</th>
                <th>Időpont</th>
                <th>Férőhely</th>
                <th>Jelleg</th>
                <th>Módosítás</th>
                <th>Törlés</th>
            </tr>
            <tr>
            <?php
                while($row=mysqli_fetch_assoc($result)) {
                    $azonosito = $row['azonosito'];
                    $idopont = $row['idopont'];
                    $ferohely = $row['ferohely'];
                    $jelleg = $row['jelleg'];
            ?>
                <tr>
                    <td><?php echo $azonosito ?></td>
                    <td><?php echo $idopont ?></td>
                    <td><?php echo $ferohely ?></td>
                    <td><?php echo $jelleg ?></td>
                    <td><a id="modosit_gomb" href="edit_vizsga.php?GetID=<?php echo $azonosito ?>">Módosít</a></td>
                    <td><a id="torol_gomb" href="delete_v.php?Del=<?php echo $azonosito ?>">Töröl</a></td>
                </tr>
            <?php
                }
            ?>
        </table>
    </main>

</body>
</html>