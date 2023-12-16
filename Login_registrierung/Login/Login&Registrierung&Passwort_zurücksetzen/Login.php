<?php
session_start();

// Verbindung zur Datenbank herstellen (ersetze die Platzhalter durch deine tatsächlichen Daten)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "swe_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// Überprüfen der Anmeldedaten
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL-Abfrage, um Benutzerdaten abzurufen
    $sql = "SELECT * FROM Benutzerdaten WHERE Benutzername = '$username' AND Passwort = '$password'";
    $result = $conn->query($sql);

    // Überprüfen, ob ein Datensatz gefunden wurde
    if ($result->num_rows > 0) {
        // Anmeldung erfolgreich
        // Spielerdaten aus dem Resultat extrahieren
        $row = $result->fetch_assoc();
        $spielerId = $row['ID'];

        // Spielerdaten in Session-Variablen speichern
        $_SESSION['spielerId'] = $spielerId;
        $_SESSION['nutzername'] = $username;

        // Überprüfen, ob der Benutzer ein Admin ist
        $adminQuery = "SELECT * FROM AdminID WHERE ID = " . $row['ID'];
        $adminResult = $conn->query($adminQuery);

        if ($adminResult->num_rows > 0) {
            $_SESSION['admin'] = true;
        } else {
            $_SESSION['admin'] = false;
        }

        // Weiterleiten zur Quizseite
        header("Location: ../../../admin_panel/view/adminpanel.php");
        exit();
    } else {
        // Anmeldung fehlgeschlagen
        header("Location: login.php?error=login_failed");
        exit();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Wer wird Millionär</title>
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

    <form class="inputContainer" action="login.php" method="post">
        <div class="inputField">
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="Nutzername" required>
        </div>
        <div class="inputField">
            <label for="password_anmeldung"></label>
            <input type="password" id="password_anmeldung" name="password" placeholder="Passwort" required>
        </div>

        <?php
        // Überprüfe, ob ein Fehler aufgetreten ist (z.B., Anmeldung fehlgeschlagen)
        if (isset($_GET['error']) && $_GET['error'] == 'login_failed') {
            echo '<p class="error-message">Nutzername/Passwort ist falsch</p>';
        }
        ?>

        <button class="knopf anmeldeKnopf" type="submit">Anmelden</button>
    </form>

    <div class="links">
        <a href="Passwort_vergessen.php">Passwort vergessen</a>
        <a href="Registrierung.php">Konto erstellen</a>
    </div>
</div>

<div class="footer">
    <a href="#">Datenschutz</a>
    <span class="separator">|</span>
    <a href="#">Impressum</a>
</div>
</body>
</html>