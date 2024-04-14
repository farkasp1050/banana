<?php

include '../authentication/oktato_auth_check.php';

    $conn = mysqli_connect("localhost", "root", "", "neptun");
    if (!$conn) {
        die("Sikertelen csatlakozás!");
    }

    if(isset($_POST['update']))
    {
        $azonosito = $_GET['ID']   ;
        $idopont = $_POST['idopont'];
        $ferohely = $_POST['ferohely'];
        $jelleg = $_POST['jelleg'];

        $query = "UPDATE vizsga SET idopont = '".$idopont."', ferohely = '".$ferohely."', jelleg = '".$jelleg."' WHERE azonosito = '".$azonosito."'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: ../msg_screens/sik_v_modositas.php");
        } else {
            echo "Ellenőrizd a parancsot! (query)";
        }
    }
    else
    {
        header("Location: vizsgak_modositasa_torlese.php");
    }

?>
