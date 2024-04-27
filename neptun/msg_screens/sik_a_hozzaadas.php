
<?php
include '../authentication/admin_auth_check.php';
session_start();
if (isset($_POST["fooldalra"])) {
    header("Location: ../admin/index_admin.php");
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
    <title>Sikeres állam hozzáadás!</title>
</head>
<body id="hatter_oktato">

    <main>
        <div id="kijelentkezes">
            <h1>Sikeres hozzáadta az államot!</h1>
            <form method="POST">
                <input id="kijelentkezes_gomb" type="submit" value="OK" name="fooldalra"/>
            </form>
    </main>

</body>
</html>