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



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    /**
     * Führt eine SQL-Abfrage aus, um Benutzerdaten basierend auf Benutzername und Passwort abzurufen.
     *
     * @param string $username Der Benutzername, der in der Abfrage verwendet wird.
     * @param string $password Das Passwort, das in der Abfrage verwendet wird.
     * @param mysqli $conn Die Datenbankverbindungsinstanz, auf der die Abfrage ausgeführt wird.
     *
     * @return mysqli_result|false Gibt das Ergebnis der SQL-Abfrage zurück, das ein mysqli_result-Objekt mit den abgerufenen Daten sein kann,
     * oder false, wenn ein Fehler bei der Ausführung der Abfrage aufgetreten ist.
     */
    $sql = "SELECT * FROM Benutzerdaten WHERE Benutzername = '$username' AND Passwort = '$password'";
    $result = $conn->query($sql);

    /**
     * Überprüft, ob ein Datensatz gefunden wurde
     */
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

        /**
         * Überprüft, ob der User ein Admin ist
         */
        if ($adminResult->num_rows > 0) {
            $_SESSION['admin_check'] = true;
        } else {
            $_SESSION['admin_check'] = false;
        }

        /**
         * Weiterleiten zur Quizseite
         */
        header("Location: ../../../admin_panel/view/adminpanel.php");
        exit();

        /**
         * Wenn die Anmeldung fehlschlägt, wird ein Fehler ausgegeben.
         */
    } else {
        header("Location: login.php?error=login_failed");
        exit();
    }
}
/**
 * Schließt die Verbindung zur Datenbank.
 */
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
        /**
         * Ausgabe der Fehlermeldung auf der Seite
         */
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