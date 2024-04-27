<?php
include '../authentication/oktato_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

if (isset($_GET['GetID'])) {
    $azonosito = $_GET['GetID'];
    $query = "SELECT * FROM kurzus WHERE kod=:azonosito";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_bind_by_name($stid, ':azonosito', $azonosito);

    $r = oci_execute($stid);
    if ($r) {
        while ($row = oci_fetch_assoc($stid)) {
            $azonosito = $row['KOD'];
            $cim = $row['CIM'];
            $szemeszter = $row['SZEMESZTER'];
            $heti_oraszam = $row['HETI_ORASZAM'];
            $ferohely = $row['FEROHELY'];
            $jelleg = $row['JELLEG'];
        }
    } else {
        echo "Hiba a lekérdezés során!";
    }

    oci_free_statement($stid);
    oci_close($conn);
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/registration.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Kurzus módosítás</title>
</head>
<body id="hatter">

<main>
    <div id="kurzus_box_kicsi">
        <h1>Kurzus módosítás</h1>
        <form method="POST" action="update_k.php?ID=<?php echo $azonosito ?>" accept-charset="utf-8">
            <p>Kurzuskód:</p>
            <input type="text" size="40" name="azonosito" placeholder="Kurzus kódja..." required value="<?php echo $azonosito ?>" disabled> <br/>
            <p>A kurzus címe:</p>
            <input type="text" size="40" name="cim" placeholder="Cím..." required value="<?php echo $cim ?>"/> <br/>
            <p>A kurzus szemesztere:</p>
            <input type="text" size="40" name="szemeszter" placeholder="Szemeszter..." required value="<?php echo $szemeszter ?>"/> <br/>
            <p>A kurzus heti óraszáma:</p>
            <input type="text" size="40" name="heti_oraszam" placeholder="Heti óraszám..." required value="<?php echo $heti_oraszam ?>"/> <br/>
            <p>A kurzus férőhelye:</p>
            <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required value="<?php echo $ferohely ?>"/> <br/>
            <p>előadás | gyakorlat | labor</p>
            <input type="text" size="40" name="jelleg" placeholder="Jelleg..." required value="<?php echo $jelleg ?>"/> <br/><br>
            <input id=alaphelyzet onclick=history.back(-1) type=button value=Mégsem />
            <button id="regisztracio" name="update">Módosítás</button>
        </form>
    </div>
</main>
</body>
</html>
