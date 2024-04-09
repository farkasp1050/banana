
<?php
session_start();
if (isset($_POST["v_mgh"])) {
    header("Location: index_oktato.php");
    exit();
}
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
<body id="hatter_oktato">

    <main>
        <div id="vizsga_box">
            <h1>Vizsga meghirdetés</h1>
                <form method="POST" action="v_mgh_connect.php" accept-charset="utf-8">
                <p>A vizsga azonosító "V"-vel kezdődjön, utána csak számok szerepeljenek! Figyelem, az azonosító egyedi, később nem módosítható!</p>
                <input type="text" size="40" name="azonosito" placeholder="Vizsga azonosító..." required/> <br/><br/>
                <p>A férőhelyet egyetlen számként adja meg!</p>
                <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required/> <br/>
                <p>"Írásbeli" vagy "Szóbeli" vagy egyéb.</p>
                <input type="text" size="40" name="jelleg" placeholder="Jelleg..." required/> <br/>
                <p>Adja meg a vizsga időpontját!</p>
                <input type="datetime-local" size="40" name="idopont" required/> <br/><br/>
                <input id=alaphelyzet onclick=history.back(-1) type=button value=Mégsem />
                <input id="regisztracio" type="submit" value="Kész" name="v_mgh"/>
            </form>
        </div>
    </main>
</body>
</html>