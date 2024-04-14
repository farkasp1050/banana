<?php
// Oracle adatbázis csatlakozás
$conn = oci_connect('whitefalcon', 'test123', 'localhost/XE');

if (!$conn) {
    $e = oci_error();
    $error_message = htmlentities($e['message'], ENT_QUOTES);
} else {
    $success_message = "Sikeres csatlakozás az adatbázishoz!";
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/logout.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Jogosulstág megtagadva!</title>
</head>
<body id="oracle_hatter">

<main>
    <div id="kijelentkezes">
        <?php if (isset($success_message)): ?>
            <h1><?= $success_message ?></h1>
        <?php endif; ?>
        <?php if (isset($error_message)): ?>
            <h1><?= $error_message ?></h1>
        <?php endif; ?>
        <form method="POST">
            <input id="kijelentkezes_gomb" onclick=history.back(-1) type="submit" value="OK"/>
        </form>
    </div>
</main>

</body>
</html>
