<?php

include '../authentication/oktato_auth_check.php';


$conn = mysqli_connect("localhost", "root", "", "neptun");
    if ($conn->connect_error) {
        die("Sikertelen csatlakozás!");
    }

    if (isset($_GET['Del']))
    {
        $kod = $_GET['Del'];
        $query = "DELETE FROM kurzus WHERE kod = '".$kod."'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: sik_k_torles.php");
        } else {
            echo "Ellenőrizd a parancsot! (query)";
        }
    }
?>