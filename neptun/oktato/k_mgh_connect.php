<?php
    $kod = $_POST['kod'];
    $cim = $_POST['cim'];
    $szemeszter = $_POST['szemeszter'];
    $heti_oraszam = $_POST['heti_oraszam'];
    $ferohely = $_POST['ferohely'];
    $jelleg = $_POST['jelleg'];

    // Datebase connection
    $conn = new mysqli('localhost', 'root', '', 'neptun');
    if($conn->connect_error) {
        die('Sikertelen csatlakozás: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO kurzus(kod, cim, szemeszter, heti_oraszam, ferohely, jelleg)
            values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiis", $kod, $cim, $szemeszter, $heti_oraszam, $ferohely, $jelleg);
        $stmt->execute();
        header("Location: ../msg_screens/sik_k_meghirdetes.php");
        $stmt->close();
        $conn->close();
    }
?>
