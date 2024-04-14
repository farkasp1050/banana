<?php
include '../authentication/general_auth_check.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Sikeres regisztráció!</title>
</head>
<body id="hatter">

    <main>
        <div class="cim">
            <p>Sikeres regisztráció!</p>
        </div>
    
        <div id="bejelentkezes">
            <h1>Bejelentkezés</h1>
            <form method="POST" action="login.php" accept-charset="utf-8">
            <input type="text" size="40" name="email" placeholder="Felhasználónév..." required/> <br/><br/>
            <input type="password" size="40" name="jelszo" placeholder="Jelszó..." required/> <br/><br/>
            <input class="bejelentkezes_gomb" type="submit" value="Bejelentkezés" name="bejelentike"/>
            <br><br>Nincs még fiókod? <a href="regisztracio.php">Regisztráció</a>
            </form>
        </div>
    </main>
</body>
</html>