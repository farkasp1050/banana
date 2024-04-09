<?php
    $felhasznalo_nev = $_POST['username'];
    $jelszo = $_POST['passwd'];

    // Database connection
    $con = new mysqli("localhost", "root", "", "neptun");
    if ($con->connect_error) {
        die("Sikertelen csatlakozás: ".$con->connect_error);
    } else {
        $stmt = $con->prepare("SELECT * FROM felhasznalo WHERE felhasznalo_nev = ?");
        $stmt->bind_param("s", $felhasznalo_nev);
        $stmt->execute();   
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data['jelszo'] === $jelszo) {
                if (str_ends_with($felhasznalo_nev, '_oktato')) {
                header("Location: ../oktato/index_oktato.php");
                    } else {
                    header("Location: ../hallgato/index_hallgato.php");
                }
            } else {
                header("Location: helytelen_bejelentkezes.php");
            }
        } else {
            header("Location: helytelen_bejelentkezes.php");
        }
    }
?>
