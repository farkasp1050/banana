<?php
    $felhasznalo_nev = $_POST['username'];
    $jelszo = $_POST['passwd'];
    $nev = $_POST['name_of_user'];
    $szuletesi_datum = $_POST['date'];
    $szuletesi_hely = $_POST['szuletesi_hely'];
    $statusz = $_POST['statusz'];
    $szak = $_POST['szak'];

    // Datebase connection
    $conn = new mysqli('localhost', 'root', '', 'neptun');
    if($conn->connect_error) {
        die('Sikertelen csatlakozás: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO felhasznalo(felhasznalo_nev, jelszo, nev, szuletesi_datum, szuletesi_hely, statusz, szak)
            values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $felhasznalo_nev, $jelszo, $nev, $szuletesi_datum, $szuletesi_hely, $statusz, $szak);
        $stmt->execute();
        header("Location: regisztracio_to_bejelentkezes.php");
        $stmt->close();
        $conn->close();
    }
?>
