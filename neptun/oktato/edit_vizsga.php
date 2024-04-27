<?php

include '../authentication/oktato_auth_check.php';

// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE', 'UTF8');
if (!$conn) {
die("Sikertelen csatlakozás!");
}

if (isset($_GET['GetID'])) {
$azonosito = $_GET['GetID'];
$query = "SELECT * FROM vizsga WHERE azonosito=:azonosito";

$stid = oci_parse($conn, $query);
if (!$stid) {
$e = oci_error($conn);
trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

oci_bind_by_name($stid, ':azonosito', $azonosito);

$r = oci_execute($stid);
if ($r) {
while ($row = oci_fetch_assoc($stid)) {
$azonosito = $row['AZONOSITO'];
$ferohely = $row['FEROHELY'];
$jelleg = $row['JELLEG'];
// Az Oracle dátum formátumát figyelembe véve megfelelően formázzuk az időpontot
function formatOracleDate($oracleDate) {
$dateParts = explode(' ', $oracleDate);
$day = $dateParts[0];
$time = $dateParts[1] . ' ' . $dateParts[2];
$dateTime = date_create_from_format('d-M-y h.i.s A', $day . ' ' . $time);
return $dateTime ? $dateTime->format('Y-m-d\TH:i:s') : '';
}
$idopont = formatOracleDate($row['IDOPONT']);
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
    <link rel = "stylesheet" href="../style/registration.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Vizsga módosítás</title>
</head>
<body id="hatter">

<main>
    <div id="vizsga_box_kicsi">
        <h1>Vizsga módosítás</h1>
        <form method="POST" action="update_v.php?ID=<?php echo $azonosito ?>" accept-charset="utf-8">
            <p>Azonosító:</p>
            <input type="text" size="40" name="azonosito" placeholder="Azonosító..." required value="<?php echo $azonosito ?>" disabled> <br/>
            <p>A férőhelyet egyetlen számként adja meg!</p>
            <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required value="<?php echo $ferohely ?>"/> <br/>
            <p>szóbeli | írásbeli</p>
            <input type="text" size="40" name="jelleg" placeholder="Jelleg..." required value="<?php echo $jelleg ?>"/> <br/>
            <p>Adja meg a vizsga időpontját!</p>
            <input type="datetime-local" size="40" name="idopont" required value="<?php echo $idopont ?>"/> <br/><br/>
            <input id=alaphelyzet onclick=history.back(-1) type=button value=Mégsem />
            <button id="regisztracio" name="update">Módosítás</button>
        </form>
    </div>
</main>
</body>
</html>
