<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Wer wird Millionär</title>
    <script src="login.js"></script>
    <link href="../Stylesheets/inputTemplate.css" rel="stylesheet">
    <link href="../Stylesheets/basics.css" rel="stylesheet">
    <link href="../Stylesheets/login.css" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <div class="loginImg">
        <img src="../img_login/Logo.png" alt="Login Image">
        <img class="logoImg" src="../img_login/FH-Logo.png" alt="Login Image">
    </div>

    <h1 class="überschriftPasswortZurücksetzen">Setze dein <br> Passwort zurück</h1>

    <h5>Fülle dazu bitte folgende <br> Felder aus!</h5>

    <form class="inputContainer" action="passwort_reset.php" method="post">
        <div class="inputField inputFieldLessHeight">
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="Nutzername" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="frage1_zurücksetzen"></label>
            <input type="text" id="frage1_zurücksetzen" name="antwort_frage1" placeholder="Der Name des 1. Haustiers" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="frage2_zurücksetzen"></label>
            <input type="text" id="frage2_zurücksetzen" name="antwort_frage2" placeholder="Der Nachname der Mutter" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="frage3_zurücksetzen"></label>
            <input type="text" id="frage3_zurücksetzen" name="antwort_frage3" placeholder="Deine Lieblingszahl" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="neues_password"></label>
            <input type="password" id="neues_password" name="neues_password" placeholder="Dein gewünschtes Passwort" required>
        </div>
        <?php
        session_start();
        /**
         * Fehlermeldung ausgabe
         */
        if (isset($_GET['error']) && $_GET['error'] == 'reset_failed') {
            echo '<p class="error-message">Deine Antworten sind nicht korrekt</p>';
        }
        ?>
        <button class="knopf anmeldeKnopf" type="submit">Zurücksetzen</button>
        <button class="knopf anmeldeKnopf" type="button" onclick="zurAnmeldung()">Zur Anmeldung</button>
    </form>
</div>

<div class="footer">
    <a href="#">Datenschutz</a>
    <span class="separator">|</span>
    <a href="#">Impressum</a>
</div>
</body>
</html>