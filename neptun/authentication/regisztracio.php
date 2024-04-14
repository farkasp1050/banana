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
                    <input type="text" size="40" name="email" placeholder="Egytemi Email-cím..."><br><br>
                    <input type="text" size="40" name="nev" placeholder="Név..." required/><br><br>
                    <input type="password" size="40" name="jelszo" placeholder="Jelszó..." required/> <br/><br/>
                    <input type="password" size="40" name="jelszo_ujra" placeholder="Jelszó újra..." required/><br><br>
                    <input type="text" size="40" name="szuletesi_hely"" placeholder="Születési hely..." required/><br>
                    <p>Mikor születtél?</p>
                    <input type="date" size="40" name="szuletesi_datum" required/> <br/>
                    <h4>Kötelező mezők hallgatóknak:</h4>
                    <input type="text" size="40" name="kar" placeholder="Kar..."/><br><br>
                    <input type="text" size="40" name="szak" placeholder="Szak..."/><br><br>
                    <input type="text" size="40" name="szemeszter" placeholder="Hanyadik szemeszter..."/><br>
                    <p>Állami | Önköltséges</p>
                    <input type="text" size="40" name="jogviszony" placeholder="Jogviszony..."/><br>
                    <p>Aktív | Passzív</p>
                    <input type="text" size="40" name="statusz" placeholder="Státusz..."/><br>
                    <p>Nappali | Esti | Levelező</p>
                    <input type="text" size="40" name="napszak" placeholder="Napszak..."/><br><br>
                    <h4>Kötelező mezők oktatóknak:</h4>
                    <p>Dr | Adjunktus | Demonstrátor</p>
                    <input type="text" size="40" name="beosztas" placeholder="Beosztás..."/><br>
                    <p>Legmagasabb releváns iskolai végzettség</p>
                    <input type="text" size="40" name="kepesites" placeholder="Képesítés..."/><br><br>
                    <input type="text" size="40" name="tanszek" placeholder="Tanszék..."/><br><br>
                    <input id="alaphelyzet" type="reset" value="Alaphelyzet"/>
                    <input id=regisztracio type="submit" value="Regisztráció" name="elkuld"/><br>
                    Van már fiókod? <a href="bejelentkezes.php">Bejelentkezés</a>
                </form>
            </div>
        </main>
    </body>
    </html>