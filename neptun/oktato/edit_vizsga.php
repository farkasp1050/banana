
<?php

    $conn = mysqli_connect("localhost", "root", "", "neptun");
    if ($conn->connect_error) {
        die("Sikertelen csatlakozás!");
    }

    $azonosito = $_GET['GetID'];
    $query = "SELECT * FROM vizsga WHERE azonosito='".$azonosito."'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result))
    {
        $azonosito = $row['azonosito'];
        $idopont = $row['idopont'];
        $ferohely = $row['ferohely'];
        $jelleg = $row['jelleg'];
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
<body id="hatter">

<main>
    <div id="vizsga_box_kicsi">
        <h1>Vizsga módosítás</h1>
        <form method="POST" action="update_v.php?ID=<?php echo $azonosito ?>" accept-charset="utf-8">
            <p>A férőhelyet egyetlen számként adja meg!</p>
            <input type="text" size="40" name="ferohely" placeholder="Férőhely..." required value="<?php echo $ferohely ?>"/> <br/>
            <p>"Írásbeli" vagy "Szóbeli" vagy egyéb.</p>
            <input type="text" size="40" name="jelleg" placeholder="Jelleg..." required value="<?php echo $jelleg ?>"/> <br/>
            <p>Adja meg a vizsga időpontját!</p>
            <input type="datetime-local" size="40" name="idopont" required value="<?php echo $idopont ?>"/> <br/><br/>
            <input id=alaphelyzet onclick=history.back(-1) type=button value=Mégsem />
            <button id="regisztracio" name="update">Módosítás</button>
        </form>
    </div>
</main>
</body>
</html>