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
    <?php
    session_start();
    /**
     * Ausgabe des neuen Passworts
     */
    if (isset($_GET['password'])) {
        $neues_passwort = htmlspecialchars($_GET['password']);
        echo "<h1 class= überschriftPasswortZurücksetzen>Glückwunsch, dein Passwort wurde aktualisiert!</h1>";
        echo "<p>Neues Passwort: $neues_passwort</p>";
    } else {
        echo "<p>Ungültige Anfrage.</p>";
    }
    ?>
    <button class="knopf anmeldeKnopf" type="button" onclick="zurAnmeldung()">Okay</button>
</div>

</body>
</html>