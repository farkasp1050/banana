<?php
include '../authentication/admin_auth_check.php';

$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if (isset($_GET['GetID'])) {
    $nev = $_GET['GetID'];
    $query = "SELECT * FROM allam WHERE nev=:nev";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_bind_by_name($stid, ':nev', $nev);

    $r = oci_execute($stid);
    if ($r) {
        while ($row = oci_fetch_assoc($stid)) {
            $nev = $row['NEV'];
            $szamlaszam = $row['SZAMLASZAM'];
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
    <title>Allam módosítás</title>
</head>
<body id="hatter">

<main>
    <div id="allam_box_kicsi">
        <h1>Állam módosítása</h1>
        <form method="POST" action="update_a.php?ID=<?php echo $nev ?>" accept-charset="utf-8">
            <p>Név:</p>
            <input type="text" size="40" name="nev" placeholder="Állam neve.." required value="<?php echo $nev ?>" disabled> <br/>
            <p>Az államhoz tartozó számlaszám módosítása:</p>
            <input type="text" size="40" name="szamlaszam" placeholder="Számlaszám..." required value="<?php echo $szamlaszam ?>"/> <br/><br/>
            <input type="hidden" name="nev" value="<?php echo $nev ?>">
            <input id="alaphelyzet" onclick="history.back(-1)" type="button" value="Mégsem" />
            <button id="regisztracio" name="update">Módosítás</button>
        </form>
    </div>
</main>
</body>
</html>
