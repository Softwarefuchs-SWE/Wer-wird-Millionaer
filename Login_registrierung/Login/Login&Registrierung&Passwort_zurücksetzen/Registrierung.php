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
session_start();
include ('../../db_handling_login/db_login.php');

$conn = connect_to_db();


// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $geburtsdatum = $_POST["geburtsdatum"];
    $name_erstes_haustier = $_POST["frage1_regestrierung"];
    $nachname_mutter = $_POST["frage2_regestrierung"];
    $lieblingszahl = $_POST["frage3_regestrierung"];
    $passwort = $_POST["password_regestrierung"];

    /*$servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "swe_db";

    $conn = new mysqli($servername, $username, $password, $dbname);*/

    try {
        $geburtsdatumObj = new DateTime($geburtsdatum);
        $heute = new DateTime();
        $alter = $heute->diff($geburtsdatumObj)->y;
    } catch (Exception $e) {
        // Fehler bei der Berechnung des Alters
        header("Location: Registrierung.php?error=age_failed");
        exit();
    }

    if ($alter >= 15) {
        // Benutzer ist alt genug, um sich zu registrieren

        // Erstellen des Benutzernamens (kleingeschriebener Anfangsbuchstabe des Vornamens + Nachnamen)
        $baseUsername = strtolower(substr($vorname, 0, 1)) . ucfirst(strtolower($nachname));
        $benutzername = $baseUsername;
        $counter = 1;

        function benutzernameExistiert($conn, $benutzername): bool
        {
            $query = "SELECT * FROM Benutzerdaten WHERE Benutzername = '$benutzername'";
            $result = $conn->query($query);
            return ($result->num_rows > 0);
        }

        while (benutzernameExistiert($conn, $benutzername)) {
            $benutzername = $baseUsername . $counter;
            $counter++;
        }

        $_SESSION['nutzername']= $benutzername;
        $_SESSION['passwort']= $passwort;



        // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
        if ($conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
        }

        // SQL-Abfrage, um den neuen Benutzer in die Datenbank einzufügen
        $sql = "INSERT INTO Benutzerdaten (Vorname, Nachname, Geburtstag, Name_erstes_Haustier, Nachname_Mutter, Lieblingszahl, Passwort, Benutzername) VALUES ('$vorname', '$nachname', '$geburtsdatum', '$name_erstes_haustier', '$nachname_mutter', $lieblingszahl, '$passwort', '$benutzername')";

        if ($conn->query($sql) === TRUE) {
            // Erfolgreich eingefügt
            header("Location: account_erstellt.php");
            exit();
        } else {
            // Fehler beim Einfügen
            header("Location: Registrierung.php?error=age_failed");
            exit();
        }

        $conn->close();
    } else {
        // Benutzer ist nicht alt genug
        header("Location: Registrierung.php?error=age_failed");
        exit();
    }
}
?>

<div class="login-container">
    <div class="loginImg">
        <img src="../img_login/Logo.png" alt="Login Image">
        <img class="logoImg" src="../img_login/FH-Logo.png" alt="Login Image">
    </div>

    <form class="inputContainer" method="post" action="#" >
        <div class="inputField inputFieldLessHeight">
            <label for="vorname"></label>
            <input type="text" id="vorname" name="vorname" placeholder="Vorname" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="nachname"></label>
            <input type="text" id="nachname" name="nachname" placeholder="Nachname" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="geburtsdatum"></label>
            <input type="text" id="geburtsdatum" name="geburtsdatum" placeholder="Geburtsdatum (D.M.Y)" required>
        </div>
        <?php
        // Überprüfe, ob ein Fehler aufgetreten ist (z.B., Anmeldung fehlgeschlagen)
        if (isset($_GET['error']) && $_GET['error'] == 'age_failed') {
            echo '<p class="error-message2 inputField inputFieldLessHeight">Du musst äter als 15 jahre sein</p>';
        }
        ?>
        <div class="inputField inputFieldLessHeight">
            <label for="frage1_regestrierung"></label>
            <input type="text" id="frage1_regestrierung" name="frage1_regestrierung" placeholder="Der Name des 1. Haustiers" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="frage2_regestrierung"></label>
            <input type="text" id="frage2_regestrierung" name="frage2_regestrierung" placeholder="Der Nachname der Mutter" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="frage3_regestrierung"></label>
            <input type="text" id="frage3_regestrierung" name="frage3_regestrierung" placeholder="Deine Lieblingszahl" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="password_regestrierung"></label>
            <input type="password" id="password_regestrierung" name="password_regestrierung" placeholder="Dein gewünschtes Passwort" required>
        </div>


        <button class="knopf anmeldeKnopf" type="submit">Registrieren</button>
        <button class="knopf anmeldeKnopf" type="button" onclick=zurAnmeldung()>zur Anmeldung</button>
    </form>
</div>

<div class="footer">
    <a href="#">Datenschutz</a>
    <span class="separator">|</span>
    <a href="#">Impressum</a>
</div>
</body>
</html>