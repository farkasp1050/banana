
<?php
session_start();
if (isset($_POST["kijelentike"])) {
    header("Location: kijelentkezes_to_bejelentkezes.php");
    session_unset();
    session_destroy();
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
    <title>Kijelentkezés</title>
</head>
<body id="hatter_hallgato">

    <main>
        <div id="kijelentkezes">
            <h1>Biztosan kijelentkezne?</h1>
            <form method="POST">
                <input id=vissza_gomb onclick=history.back(-1) type=button value=Mégsem />
                <input id="kijelentkezes_gomb" type="submit" value="Kijelentkezés" name="kijelentike"/>
            </form>
    </main>

</body>
</html>