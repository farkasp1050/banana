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
    <title>Összes oktató</title>
</head>
<body>

<!-- Top main start ------------------------------------------------------------------------------->
    <header>
        <nav>
            <ul>
                <li>
                    <a aria-current="page" href="../admin/index_admin.php">Főoldal</a>
                </li>
                <li>
                    <a href="../admin/allam_hozzaadasa.php">Állam hozzáadása</a>
                </li>
                <li>
                    <a href="../admin/terem_hozzaadasa.php">Terem hozzáadása</a>
                </li>
                <li>
                    <a href="../authentication/kijelentkezes_admin.php">Kijelentkezés</a>
                </li>
            </ul>
        </nav>
        <br>
        <div id="alap">
            <div id="baloszlop">
                <p id="focimszoveg">Oktatók<br>listája.</p>
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
                <th>Név</th>
                <th>Felhasználó név</th>
                <th>Születési dátum</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "neptun");
            if ($conn->connect_error) {
                die("Sikertelen kapcsolódás: ".$conn->connect_error);
            }
            $sql = "SELECT nev, felhasznalo_nev, szuletesi_datum FROM felhasznalo ORDER BY szuletesi_datum DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (str_ends_with($row["felhasznalo_nev"], '_oktato'))
                    echo "<tr><td>". $row["nev"] ."</td><td>". $row["felhasznalo_nev"] ."</td><td>". $row["szuletesi_datum"] ."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "Nincs találat.";
            }

            $conn->close();
            ?>
        </table>
    </main>

</body>
</html>