<?php
include '../authentication/admin_auth_check.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/registration.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Vizsga meghirdetés</title>
</head>
<body id="hatter_admin">

<main>
    <div id="allam">
        <h1>Állam hozzáadása</h1>
        <form method="POST" action="a_mgh_connect.php" accept-charset="utf-8">
            <p>Az állam neve nagy betűvel kezdődjön!</p>
            <input type="text" size="40" name="nev" placeholder="Állam neve..." required/> <br/>
            <p>A számlaszám csak számokból álljon!</p>
            <input type="text" size="40" name="szamlaszam" placeholder="Számlaszám..." required/> <br/><br>
            <input id="alaphelyzet" type="reset" value="Alaphelyzet"/>
            <input id="regisztracio" type="submit" value="Kész"/>
            <input id=megsem onclick=history.back(-1) type=button value=Mégsem />
        </form>
    </div>
</main>
</body>
</html>