<?php
    $azonostio = $_POST['azonosito'];
    $idopont = $_POST['idopont'];
    $ferohely = $_POST['ferohely'];
    $jelleg = $_POST['jelleg'];

    // Datebase connection
    $conn = new mysqli('localhost', 'root', '', 'neptun');
    if($conn->connect_error) {
        die('Sikertelen csatlakozás: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO vizsga(azonosito, idopont, ferohely, jelleg)
            values(?, ?, ?, ?)");
        $stmt->bind_param("ssis", $azonostio, $idopont, $ferohely, $jelleg);
        $stmt->execute();
        header("Location: ../msg_screens/sik_v_meghirdetes.php");
        $stmt->close();
        $conn->close();
    }
?>
