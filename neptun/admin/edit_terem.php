<?php
include '../authentication/admin_auth_check.php';

$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    die("Sikertelen csatlakozás!");
}

if (isset($_GET['GetID'])) {
    $azonosito = $_GET['GetID'];
    $query = "SELECT * FROM terem WHERE nev=:azonosito";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_bind_by_name($stid, ':azonosito', $azonosito);

    $r = oci_execute($stid);
    if ($r) {
        while ($row = oci_fetch_assoc($stid)) {
            $nev = $row['NEV'];
            $ferohely = $row['FEROHELY'];
            $cim = $row['CIM'];
            $emelet = $row['EMELET'];
            $ajto = $row['AJTO'];
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
    <title>Terem módosítás</title>
</head>
<body id="hatter">

<main>
    <div id="terem_box_kicsi">
        <h1>Terem módosítás</h1>
        <form method="POST" action="update_t.php?ID=<?php echo $azonosito ?>" accept-charset="utf-8">
            <p>Név:</p>
            <input type="text" size="40" name="nev" placeholder="Terem neve.." required value="<?php echo $nev ?>" disabled> <br/>
            <p>A terem férőhelye:</p>
            <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required value="<?php echo $ferohely ?>"/> <br/>
            <p>A terem címe:</p>
            <input type="text" size="40" name="cim" placeholder="Cím..." required value="<?php echo $cim ?>"/> <br/>
            <p>A terem emelete:</p>
            <input type="text" size="40" name="emelet" placeholder="Emelet..." required value="<?php echo $emelet ?>"/> <br/>
            <p>A terem ajtaja:</p>
            <input type="text" size="40" name="ajto" placeholder="Ajto..." required value="<?php echo $ajto ?>"/> <br/><br>
            <input id=alaphelyzet onclick=history.back(-1) type=button value=Mégsem />
            <button id="regisztracio" name="update">Módosítás</button>
        </form>
    </div>
</main>
</body>
</html>
