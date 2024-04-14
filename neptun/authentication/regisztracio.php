<?php

    $errors = [];

    if (isset($_POST["elkuld"])) {
        $email = $_POST["email"];
        $jelszo = $_POST["jelszo"];
        $jelszo_ujra = $_POST["jelszo_ujra"];
        $szuletesi_datum = $_POST["szuletesi_datum"];


        if (trim($email) === "")
            $errors[] = "empty_email";

        if (trim($jelszo) === "")
            $errors[] = "empty_password";

        if (trim($jelszo_ujra) === "")
            $errors[] = "empty_check_password";

        if (strlen($email) > 50)
            $errors[] = "long_email";

        if ($email != null)
            $errors[] = "exist_email";

        if ($jelszo !== "" && strlen($jelszo) < 5)
            $errors[] = "short_password";

        if ($jelszo !== "" && strlen($jelszo) >= 5 && (!preg_match("/[A-Za-z]/", $jelszo) || !preg_match("/[0-9]/", $jelszo)))
            $errors[] = "password_characters";

        if ($jelszo_ujra !== "" && $jelszo !== $jelszo_ujra)
            $errors[] = "match_password";

        if ($szuletesi_datum > 2023 || $szuletesi_datum < 1900)
            $errors[] = "year_out_of_range";

        if (count($errors) === 0) {
            $password = password_hash($jelszo, PASSWORD_DEFAULT);

            $user = [
                "email" => $email,
                "password" => $password,
                "szuletesi_datum" => $szuletesi_datum,
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
        <div id="registration">
            <h1>Regisztráció</h1>
            <form method="POST" action="reg_connect.php" accept-charset="utf-8">
                <p>Hallgató: ...@stud.hu | Oktató: ...@teach.hu</p>
            <input type="text" size="40" name="email" placeholder="Egytemi Email-cím..." value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>" required/> <br/><br/>
            <div>
                <?php
                    if (in_array("empty_email", $errors)) echo "A mező kitöltése kötelező!";
                    if (in_array("long_email", $errors)) echo "A felhasználónév nem lehet hosszabb 50 karakternél!";
                    if (in_array("exist_email", $errors)) echo "A megadott felhasználónév foglalt!";
                ?>
            </div>
                <input type="text" size="40" name="nev" placeholder="Név..." required/><br><br>
            <input type="password" size="40" name="jelszo" placeholder="Jelszó..." required/> <br/><br/>
            <div >
                <?php
                    if (in_array("empty_password", $errors)) echo "A mező kitöltése kötelező!";
                    if (in_array("short_password", $errors)) echo "A jelszónak legalább 5 karakter hosszúnak kell lennie!";
                    if (in_array("password_characters", $errors)) echo "A jelszónak tartalmaznia kell betűt és számjegyet is!";
                ?>
            </div>
            <input type="password" size="40" name="jelszo_ujra" placeholder="Jelszó újra..." required/><br>
            <div>
                <?php
                    if (in_array("empty_check_password", $errors)) echo "A mező kitöltése kötelező!";
                    if (in_array("match_password", $errors)) echo "A jelszavak nem egyeznek meg!";
                ?>
            </div><br>
                <input type="text" size="40" name="szuletesi_hely"" placeholder="Születési hely..." required/><br>
                <p>Mikor születtél?</p>
                <input type="date" size="40" name="szuletesi_datum" required/> <br/>
                <div>
                    <?php
                    if (in_array("year_out_of_range", $errors)) echo "Az évszámnak 1900 és 2023 között kell lennie!";
                    ?>
                </div><br>
                <p>Kötelező mezők hallgatóknak:</p>
                <input type="text" size="40" name="kar" placeholder="Kar..."/><br><br>
                <input type="text" size="40" name="szak" placeholder="Szak..."/><br><br>
                <input type="text" size="40" name="szemeszter" placeholder="Hanyadik szemeszter..."/><br>
                <p>Állami | Önköltséges</p>
                <input type="text" size="40" name="jogviszony" placeholder="Jogviszony..."/><br>
                <p>Aktív | Passzív</p>
                <input type="text" size="40" name="statusz" placeholder="Státusz..."/><br>
                <p>Nappali | Esti | Levelező</p>
                <input type="text" size="40" name="napszak" placeholder="Napszak..."/><br><br>
                <p>Kötelező mezők oktatóknak:</p>
                <p>Dr | Adjunktus | Demonstrátor</p>
                <input type="text" size="40" name="beosztas" placeholder="Beosztás..."/><br>
                <p>Legmagasabb releváns iskolai végzettség</p>
                <input type="text" size="40" name="kepesites" placeholder="Képesítés..."/><br><br>
                <input type="text" size="40" name="tanszek" placeholder="Tanszék..."/><br><br>
            <input id="alaphelyzet" type="reset" value="Alaphelyzet"/>
            <input id=regisztracio type="submit" value="Regisztráció" name="elkuld"/>
                <br>Van már fiókod? <a href="bejelentkezes.php">Bejelentkezés</a>
            </form>
        </div>
    </main>
</body>
</html>