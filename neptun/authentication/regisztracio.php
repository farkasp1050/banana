<?php

    $errors = [];

    if (isset($_POST["elkuld"])) {
        $username = $_POST["username"];
        $password = $_POST["passwd"];
        $password_check = $_POST["passwd_check"];
        $birth_date = $_POST["date"];


        if (trim($username) === "")
            $errors[] = "empty_username";

        if (trim($password) === "")
            $errors[] = "empty_password";

        if (trim($password_check) === "")
            $errors[] = "empty_check_password";

        if (strlen($username) > 50)
            $errors[] = "long_username";

        if (get_user_by_username($username) != null)
            $errors[] = "exist_username";

        if ($password !== "" && strlen($password) < 5)
            $errors[] = "short_password";

        if ($password !== "" && strlen($password) >= 5 && (!preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)))
            $errors[] = "password_characters";

        if ($password_check !== "" && $password !== $password_check)
            $errors[] = "match_password";

        if ($birth_date > 2023 || $birth_date < 1900)
            $errors[] = "year_out_of_range";

        if (count($errors) === 0) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $user = [
                "username" => $username,
                "password" => $password,
                "birth_date" => $birth_date,

            ];
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/registration.css">
    <link rel="icon" href="../img/study-icon.png">
    <title>Regisztráció</title>
</head>
<body id="hatter">

    <main>
        <div id="bejelentkezes">
            <h1>Regisztráció</h1>
            <form method="POST" action="reg_connect.php" accept-charset="utf-8">
                <p>Amennyiben oktató, a felhasználóneve így végződjön: "_oktato"<br>Példa: nagy_sandor_oktato</p>
            <input type="text" size="40" name="username" placeholder="Felhasználónév..." value="<?php if (isset($_POST["username"])) echo $_POST["username"]; ?>" required/> <br/><br/>
            <div>
                <?php
                    if (in_array("empty_username", $errors)) echo "A mező kitöltése kötelező!";
                    if (in_array("long_username", $errors)) echo "A felhasználónév nem lehet hosszabb 50 karakternél!";
                    if (in_array("exist_username", $errors)) echo "A megadott felhasználónév foglalt!";
                ?>
            </div>
                <input type="text" size="40" name="name_of_user" placeholder="Név..." required/><br><br>
            <input type="password" size="40" name="passwd" placeholder="Jelszó..." required/> <br/><br/>
            <div >
                <?php
                    if (in_array("empty_password", $errors)) echo "A mező kitöltése kötelező!";
                    if (in_array("short_password", $errors)) echo "A jelszónak legalább 5 karakter hosszúnak kell lennie!";
                    if (in_array("password_characters", $errors)) echo "A jelszónak tartalmaznia kell betűt és számjegyet is!";
                ?>
            </div>
            <input type="password" size="40" name="passwd_check" placeholder="Jelszó újra..." required/><br>
            <div>
                <?php
                    if (in_array("empty_check_password", $errors)) echo "A mező kitöltése kötelező!";
                    if (in_array("match_password", $errors)) echo "A jelszavak nem egyeznek meg!";
                ?>
            </div>
                <p>Ha nem tanuló: "Nincs"</p>
                <input type="text" size="40" name="szak" placeholder="Szak..." required/><br>
                <p>"Aktív", "Passzív" vagy "Nincs"</p>
                <input type="text" size="40" name="statusz" placeholder="Státusz..." required/><br><br>
                <input type="text" size="40" name="szuletesi_hely"" placeholder="Születési hely..." required/><br><br>
            <p>Mikor születtél?</p>
            <input type="date" size="40" name="date" required/> <br/><br/>
            <div>
                <?php
                    if (in_array("year_out_of_range", $errors)) echo "Az évszámnak 1900 és 2023 között kell lennie!";
                ?>
            </div>
            <input id="alaphelyzet" type="reset" value="Alaphelyzet"/>
            <input id=regisztracio type="submit" value="Regisztráció" name="elkuld"/>
                <br>Van már fiókod? <a href="bejelentkezes.php">Bejelentkezés</a>
            </form>
        </div>
    </main>
</body>
</html>