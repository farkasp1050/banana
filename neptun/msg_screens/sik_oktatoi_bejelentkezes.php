
<?php
include '../authentication/oktato_auth_check.php';
if (isset($_POST["fooldalra"])) {
    header("Location: ../oktato/index_oktato.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/logout.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Sikeres belépés!</title>
</head>
<body id="hatter_oktato">

    <main>
        <div id="kijelentkezes">
            <h1>Sikeres oktatói bejelentkezés!</h1>
            <form method="POST">
                <input id="kijelentkezes_gomb" type="submit" value="OK" name="fooldalra"/>
            </form>
    </main>

</body>
</html>