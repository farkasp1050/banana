
<?php

$conn = mysqli_connect("localhost", "root", "", "neptun");
if ($conn->connect_error) {
    die("Sikertelen csatlakozás!");
}
$query = "SELECT * FROM kurzus ORDER BY heti_oraszam ASC";
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
                <a aria-current="page" href="kurzusok_kezelese.php">Kurzusok kezelése</a>
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
            <p id="focimszoveg">Kezelje<br>kurzusait.</p>
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
            <th>Kód</th>
            <th>Cím</th>
            <th>Szemeszter</th>
            <th>Heti óraszám</th>
            <th>Férőhely</th>
            <th>Jelleg</th>
            <th>Törlés</th>
        </tr>
        <tr>
            <?php
            while($row=mysqli_fetch_assoc($result)) {
            $kod = $row['kod'];
            $cim = $row['cim'];
            $szemeszter = $row['szemeszter'];
            $heti_oraszam = $row['heti_oraszam'];
            $ferohely = $row['ferohely'];
            $jelleg = $row['jelleg'];
            ?>
        <tr>
            <td><?php echo $kod ?></td>
            <td><?php echo $cim ?></td>
            <td><?php echo $szemeszter ?></td>
            <td><?php echo $heti_oraszam ?></td>
            <td><?php echo $ferohely ?></td>
            <td><?php echo $jelleg ?></td>
            <td><a id="torol_gomb" href="delete_k.php?Del=<?php echo $kod ?>">Töröl</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</main>

</body>
</html>