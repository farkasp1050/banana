<?php
include '../authentication/admin_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

$query = "SELECT * FROM FELHASZNALO";
$stid = oci_parse($conn, $query);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index_admin.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Felhasználók kezelése</title>
</head>
<body>

<header>
    <nav>
        <ul>
            <li>
                <a href="index_admin.php">Adatok</a>
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
            <p id="focimszoveg">Felhasználók kezelése</p>
        </div>
        <div id="focimkep">
            <img src="../img/widescreen-study.jpg" alt="felhasználók" height="330">
        </div>
    </div>
</header>
<hr>

<main>
    <table align="center" class="lista_tablazat_terem">
        <tr>
            <th>Email</th>
            <th>Név</th>
            <th>Születési dátum</th>
            <th>Születési hely</th>
            <th>Kar</th>
            <th>Szak</th>
            <th>Szemeszter</th>
            <th>Átlag</th>
            <th>Jogviszony</th>
            <th>Státusz</th>
            <th>Napszak</th>
            <th>Beosztás</th>
            <th>Képesítés</th>
            <th>Tanszék</th>
            <th>Módosítás</th>
            <th>Törlés</th>
        </tr>
        <?php
        while ($row = oci_fetch_assoc($stid)) {
            $email = $row['EMAIL'];
            $nev = $row['NEV'];
            $szuletesi_datum = $row['SZULETESI_DATUM'];
            $szuletesi_hely = $row['SZULETESI_HELY'];
            $kar = $row['KAR'];
            $szak = $row['SZAK'];
            $szemeszter = $row['SZEMESZTER'];
            $atlag = $row['ATLAG'];
            $jogviszony = $row['JOGVISZONY'];
            $statusz = $row['STATUSZ'];
            $napszak = $row['NAPSZAK'];
            $beosztas = $row['BEOSZTAS'];
            $kepesites = $row['KEPESITES'];
            $tanszek = $row['TANSZEK'];
            ?>
            <tr>
                <td><?php echo $email ?></td>
                <td><?php echo $nev ?></td>
                <td><?php echo $szuletesi_datum ?></td>
                <td><?php echo $szuletesi_hely ?></td>
                <td><?php echo $kar ?></td>
                <td><?php echo $szak ?></td>
                <td><?php echo $szemeszter ?></td>
                <td><?php echo $atlag ?></td>
                <td><?php echo $jogviszony ?></td>
                <td><?php echo $statusz ?></td>
                <td><?php echo $napszak ?></td>
                <td><?php echo $beosztas ?></td>
                <td><?php echo $kepesites ?></td>
                <td><?php echo $tanszek ?></td>
                <td><a id="modosit_gomb" href="edit_felhasznalo.php?GetID=<?php echo $email ?>">Módosít</a></td>
                <td><a id="torol_gomb" href="delete_f.php?Del=<?php echo $email ?>">Töröl</a></td>
            </tr>
            <?php
        }
        oci_free_statement($stid);
        oci_close($conn);
        ?>
    </table>
</main>

</body>
</html>
