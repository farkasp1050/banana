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
    <title>Terem hozzáadása</title>
</head>
<body id="hatter_admin">

<main>
    <div id="terem">
        <h1>Terem hozzáadása</h1>
        <form method="POST" action="t_mgh_connect.php" accept-charset="utf-8">
            <p>A termek nevei létező emberek nevei!</p>
            <input type="text" size="40" name="nev" placeholder="Név..." required/> <br/>
            <p>A férőhelyet egyetlen számként adja meg!</p>
            <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required/> <br/>
            <p>elméleti | gyakorlati | tanműhely</p>
            <input type="text" size="40" name="jelleg" placeholder="Jelleg..." required/> <br/>
            <p>Irányítószám + Város + Utca + Házszám</p>
            <input type="text" size="40" name="cim" placeholder="Cím..." required/> <br/><br>
            <input type="text" size="40" name="emelet" placeholder="Emelet..." required/> <br/><br>
            <input type="text" size="40" name="ajto" placeholder="Ajtó..." required/> <br/><br>
            <input id="alaphelyzet" type="reset" value="Alaphelyzet"/>
            <input id="regisztracio" type="submit" value="Kész" name="v_mgh"/><br>
            <input id=megsem onclick=history.back(-1) type=button value=Mégsem />
        </form>
    </div>
</main>
</body>
</html>