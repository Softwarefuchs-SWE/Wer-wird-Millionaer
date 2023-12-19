<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Wer wird Millionär</title>
    <script src="login.js"></script>
    <link href="../Stylesheets/inputTemplate.css" rel="stylesheet">
    <link href="../Stylesheets/basics.css" rel="stylesheet">
    <link href="../Stylesheets/login.css" rel="stylesheet">
</head>
<body>
<?php

?>
<div class="login-container">
    <div class="loginImg">
        <img src="../img_login/Logo.png" alt="Login Image">
        <img class="logoImg" src="../img_login/FH-Logo.png" alt="Login Image">
    </div>
    <?php
    session_start();
    /**
     * Meldung, dass der Account erfolgreich erstellt wurde. Mit dem gezeigten Nutzernamen und Passwort kann sich der User jetzt anmelden.
     */
        echo "<h1 class= überschriftPasswortZurücksetzen>Glückwunsch, dein Account wurde erfolgreich erstellt!</h1>";
        echo "<p>Dein Name:"; echo $_SESSION["nutzername"]; echo "</p>";
        echo "<p>Dein Passwort:"; echo $_SESSION["passwort"]; echo "</p>";

    ?>
    <button class="knopf anmeldeKnopf" type="button" onclick="zurAnmeldung()">Okay</button>
</div>

</body>
</html>
