<?php
include '../authentication/admin_auth_check.php';

$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if (isset($_GET['GetID'])) {
    $email = $_GET['GetID'];
    $query = "SELECT * FROM FELHASZNALO WHERE EMAIL=:email";

    $stid = oci_parse($conn, $query);
    if (!$stid) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_bind_by_name($stid, ':email', $email);

    $r = oci_execute($stid);
    if ($r) {
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
        }
    } else {
        echo "Hiba a lekérdezés során!";
    }

    oci_free_statement($stid);
    oci_close($conn);

    // Dátum formátumának átalakítása DateTime objektummá
    $szuletesi_datum_obj = new DateTime($szuletesi_datum);
    $formatted_szuletesi_datum = $szuletesi_datum_obj->format('Y-m-d');
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/registration.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Felhasználó módosítás</title>
</head>
<body id="hatter">

<main>
    <div id="felhasznalo_box_kicsi">
        <h1>Felhasználó módosítása</h1>
        <form method="POST" action="update_f.php?ID=<?php echo $email ?>" accept-charset="utf-8">
            <p>Email:</p>
            <input type="email" size="40" name="email" placeholder="Email cím..." required value="<?php echo $email ?>" disabled> <br/>
            <p>Név:</p>
            <input type="text" size="40" name="nev" placeholder="Név..." required value="<?php echo $nev ?>"> <br/>
            <p>Születési dátum:</p>
            <input type="date" name="szuletesi_datum" required value="<?php echo $formatted_szuletesi_datum ?>"> <br/>
            <p>Születési hely:</p>
            <input type="text" size="40" name="szuletesi_hely" placeholder="Születési hely..." required value="<?php echo $szuletesi_hely ?>"> <br/>
            <p>Kar:</p>
            <input type="text" size="40" name="kar" placeholder="Kar..." value="<?php echo $kar ?>"> <br/>
            <p>Szak:</p>
            <input type="text" size="40" name="szak" placeholder="Szak..." value="<?php echo $szak ?>"> <br/>
            <p>Szemeszter:</p>
            <input type="text" size="40" name="szemeszter" placeholder="Szemeszter..." value="<?php echo $szemeszter ?>"> <br/>
            <p>Átlag:</p>
            <input type="text" size="40" name="atlag" placeholder="Átlag..." value="<?php echo $atlag ?>"> <br/>
            <p>Jogviszony:</p>
            <input type="text" size="40" name="jogviszony" placeholder="Jogviszony..." value="<?php echo $jogviszony ?>"> <br/>
            <p>Státusz:</p>
            <input type="text" size="40" name="statusz" placeholder="Státusz..." value="<?php echo $statusz ?>"> <br/>
            <p>Napszak:</p>
            <input type="text" size="40" name="napszak" placeholder="Napszak..." value="<?php echo $napszak ?>"> <br/>
            <p>Beosztás:</p>
            <input type="text" size="40" name="beosztas" placeholder="Beosztás..." value="<?php echo $beosztas ?>"> <br/>
            <p>Képesítés:</p>
            <input type="text" size="40" name="kepesites" placeholder="Képesítés..." value="<?php echo $kepesites ?>"> <br/>
            <p>Tanszék:</p>
            <input type="text" size="40" name="tanszek" placeholder="Tanszék..." value="<?php echo $tanszek ?>"> <br/><br/>
            <input id="alaphelyzet" onclick="history.back(-1)" type="button" value="Mégsem" />
            <button id="regisztracio" name="update">Módosítás</button>
        </form>
    </div>
</main>
</body>
</html>
