<?php
include '../authentication/admin_auth_check.php';

$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$query = "SELECT * FROM allam";
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
    <title>Allam kezelés</title>
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
            <p id="focimszoveg">Kezelje<br>államait.</p>
        </div>
        <div id="focimkep">
            <img src="../img/widescreen-study.jpg" alt="könyvek" height="330">
        </div>
    </div>
</header>
<hr>

<main>
    <table align="center" class="lista_tablazat_terem">
        <tr>
            <th>Név</th>
            <th>Számlaszám</th>
            <th>Módosítás</th>
            <th>Törlés</th>
        </tr>
        <?php
        while ($row = oci_fetch_assoc($stid)) {
            $nev = $row['NEV'];
            $orszag = $row['SZAMLASZAM'];
            ?>
            <tr>
                <td><?php echo $nev ?></td>
                <td><?php echo $orszag ?></td>
                <td><a id="modosit_gomb" href="edit_allam.php?GetID=<?php echo $nev ?>">Módosít</a></td>
                <td><a id="torol_gomb" href="delete_a.php?Del=<?php echo $nev ?>">Töröl</a></td>
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
