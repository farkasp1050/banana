<?php
include '../authentication/oktato_auth_check.php';

$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

$query = 'SELECT * FROM kurzus ORDER BY heti_oraszam ASC';
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
    <link rel="stylesheet" href="../style/index_oktato.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Vizsga kezelés</title>
</head>
<body>

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

<main>
    <table align="center" class="lista_tablazat_terem">
        <tr>
            <th>Kód</th>
            <th>Cím</th>
            <th>Szemeszter</th>
            <th>Heti óraszám</th>
            <th>Férőhely</th>
            <th>Jelleg</th>
            <th>Módosítás</th> <!-- Új oszlop hozzáadása -->
            <th>Törlés</th>
        </tr>
        <?php
        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            $kod = $row['KOD'];
            $cim = $row['CIM'];
            $szemeszter = $row['SZEMESZTER'];
            $heti_oraszam = $row['HETI_ORASZAM'];
            $ferohely = $row['FEROHELY'];
            $jelleg = $row['JELLEG'];
            ?>
            <tr>
                <td><?php echo $kod ?></td>
                <td><?php echo $cim ?></td>
                <td><?php echo $szemeszter ?></td>
                <td><?php echo $heti_oraszam ?></td>
                <td><?php echo $ferohely ?></td>
                <td><?php echo $jelleg ?></td>
                <td><a id="modosit_gomb" href="edit_kurzus.php?GetID=<?php echo $kod ?>">Módosít</a></td> <!-- Módosítás link hozzáadása -->
                <td><a id="torol_gomb" href="delete_k.php?Del=<?php echo $kod ?>">Töröl</a></td>
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
