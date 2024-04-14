
<?php
include '../authentication/oktato_auth_check.php';
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
            <form method="POST" action="k_mgh_connect.php" accept-charset="UTF-8">
                <p>Példa kódra: IB407E</p>
                <input type="text" size="40" name="kod" placeholder="Kurzus kód..." required/> <br/><br/>
                <input type="text" size="40" name="cim" placeholder="Cím..." required/> <br/><br>
                <input type="text" size="40" name="szemeszter" placeholder="Szemeszter..." required/> <br/>
                <p>A  heti óraszámot egyetlen számként adja meg!</p>
                <input type="text" size="40" name="heti_oraszam" placeholder="Heti óraszám..." required/> <br/>
                <p>A férőhelyet egyetlen számként adja meg!</p>
                <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required/> <br/>
                <p>előadás | gyakorlat | labor</p>
                <input type="text" size="40" name="jelleg" placeholder="Jelleg..." required/> <br/><br>
                <input id="alaphelyzet" type="reset" value="Alaphelyzet"/>
                <input id="regisztracio" type="submit" value="Kész" name="k_mgh"/><br>
                <input id=megsem onclick=history.back(-1) type=button value=Mégsem />
            </form>
        </div>
    </main>
</body>
</html>