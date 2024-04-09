
<?php
session_start();
if (isset($_POST["k_mgh"])) {
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
    <title>Kurzus meghirdetés</title>
</head>
<body id="hatter_oktato">

    <main>
        <div id="k_megh">
            <h1>Kurzus meghirdetés</h1>
            <form method="POST" action="k_mgh_connect.php" accept-charset="utf-8">
                <p>A kurzus kód "K"-el kezdődjön, utána csak számok szerepeljenek!</p>
                <input type="text" size="40" name="kod" placeholder="Kurzus kód..." required/> <br/><br/>
                <input type="text" size="40" name="cim" placeholder="Cím..." required/> <br/>
                <p>Vagy "Tavaszi" vagy "Őszi" legyen!</p>
                <input type="text" size="40" name="szemeszter" placeholder="Szemeszter..." required/> <br/>
                <p>A  heti óraszámot egyetlen számként adja meg!</p>
                <input type="text" size="40" name="heti_oraszam" placeholder="Heti óraszám..." required/> <br/>
                <p>A férőhelyet egyetlen számként adja meg!</p>
                <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required/> <br/>
                <p>"Előadás" vagy "Gyakorlat" vagy egyéb.</p>
                <input type="text" size="40" name="jelleg" placeholder="Jelleg..." required/> <br/><br>
                <input id=alaphelyzet onclick=history.back(-1) type=button value=Mégsem />
                <input id="regisztracio" type="submit" value="Kész" name="k_mgh"/>
            </form>
        </div>
    </main>
</body>
</html>