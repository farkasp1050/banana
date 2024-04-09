<?php

    $conn = mysqli_connect("localhost", "root", "", "neptun");
    if ($conn->connect_error) {
        die("Sikertelen csatlakozás!");
    }

    if (isset($_GET['Del']))
    {
        $azonosito = $_GET['Del'];
        $query = "DELETE FROM vizsga WHERE azonosito = '".$azonosito."'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: sik_v_torles.php");
        } else {
            echo "Ellenőrizd a parancsot! (query)";
        }
    }
?>