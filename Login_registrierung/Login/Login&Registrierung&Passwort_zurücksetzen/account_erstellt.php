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
<div class="login-container">
    <div class="loginImg">
        <img src="../img_login/Logo.png" alt="Login Image">
        <img class="logoImg" src="../img_login/FH-Logo.png" alt="Login Image">
    </div>
    <?php
    /**
     * Startet die PHP-Sitzung für die Verwaltung von Benutzersitzungsdaten.
     */
    session_start();
    /**
     * Stellt die Verbindung zur Datenbank her und gibt die Verbindungsinstanz zurück.
     *
     * @return mysqli Die Verbindungsinstanz zur Datenbank.
     */
    include ('../../db_handling_login/db_login.php');
    $conn = connect_to_db();

    $benutzername = $_SESSION['nutzername'];
    $passwortAusDatenbank ="";

    /**
     * Hier wird sich das Passwort des gerade erstellten Benutzers geholt und in der Variablen $passwortAusDatenbank gespeichert.
     * Damit das Passwort nicht in der session übergeben werden muss. -> Sicherheitsgründe
     */
    $sql = "SELECT Passwort FROM Benutzerdaten WHERE Benutzername = '$benutzername'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Datensatz gefunden
        $row = $result->fetch_assoc();
        $passwortAusDatenbank = $row['Passwort'];
    }

    /**
     * Meldung, dass der Account erfolgreich erstellt wurde. Mit dem gezeigten Nutzernamen und Passwort kann sich der User jetzt anmelden.
     */
        echo "<h1 class= überschriftPasswortZurücksetzen>Glückwunsch, dein Account wurde erfolgreich erstellt!</h1>";
        echo "<p>Dein Name:"; echo $_SESSION["nutzername"]; echo "</p>";
        echo "<p>Dein Passwort:"; echo $passwortAusDatenbank; echo "</p>";

    ?>
    <button class="knopf anmeldeKnopf" type="button" onclick="zurAnmeldung()">Okay</button>
</div>

</body>
</html>
