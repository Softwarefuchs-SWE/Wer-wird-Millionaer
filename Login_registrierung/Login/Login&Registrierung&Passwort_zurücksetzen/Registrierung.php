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


/**
 * Überprüft, ob das Formular abgesendet wurde.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $geburtsdatum = $_POST["geburtsdatum"];
    $name_erstes_haustier = $_POST["frage1_regestrierung"];
    $nachname_mutter = $_POST["frage2_regestrierung"];
    $lieblingszahl = $_POST["frage3_regestrierung"];
    $passwort = $_POST["password_regestrierung"];


    /**
     * Versucht das Alter des users herrauszufinden.
     */
    try {
        $geburtsdatumObj = new DateTime($geburtsdatum);
        $heute = new DateTime();
        $alter = $heute->diff($geburtsdatumObj)->y;
    } catch (Exception $e) {
        // Fehler bei der Berechnung des Alters
        header("Location: Registrierung.php?error=age_failed");
        exit();
    }


    /**
     * Überprüft, ob der User alt genug ist.
     * Wenn ja, wird ein uniquer benutzername aus generiert und der Benutzername mit dem entsprechenden Passwort wird in einer Session gespeichert.
     * Wenn alles geklappt hat, wird der Benutzer der DB hinzugefügt
     * Sonst wird ein Fehler ausgegeben
     */
    if ($alter >= 15) {

        /**
         * Generiert Usernamen und prüft ob die Eingaben korrekt sind
         */
        function generateBaseUsername($vorname, $nachname) {
            if (!ctype_alpha($vorname)) {
                header("Location: Registrierung.php?error=name_failed");
                exit();
            }

            // Überprüfen, ob der Nachname nur Buchstaben enthält
            if (!ctype_alpha($nachname)) {
                header("Location: Registrierung.php?error=name_failed");
                exit();
            }
            $vornameLetters = preg_replace("/[^a-zA-Z]/", "", $vorname); // Nur Buchstaben im Vornamen zulassen
            $nachnameLetters = preg_replace("/[^a-zA-Z]/", "", $nachname); // Nur Buchstaben im Nachnamen zulassen

            $baseUsername = strtolower(substr($vornameLetters, 0, 1)) . ucfirst(strtolower($nachnameLetters));

            return $baseUsername;
        }

        $baseUsername = generateBaseUsername($vorname, $nachname);
        $benutzername = $baseUsername;
        $counter = 1;


        /**
         * Prüft, ob der Username existiert
         */
        function benutzernameExistiert($conn, $benutzername): bool
        {
            $query = "SELECT * FROM Benutzerdaten WHERE Benutzername = '$benutzername'";
            $result = $conn->query($query);
            return ($result->num_rows > 0);
        }

        /**
         * MAcht den Usernamen unique
         */
        while (benutzernameExistiert($conn, $benutzername)) {
            $benutzername = $baseUsername . $counter;
            $counter++;
        }

        $_SESSION['nutzername']= $benutzername;


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

    } else {
        // Benutzer ist nicht alt genug
        header("Location: Registrierung.php?error=age_failed");
        exit();
    }
}
$conn->close();
?>

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

    <form class="inputContainer" method="post" action="#" >
        <div class="inputField inputFieldLessHeight">
            <label for="vorname"></label>
            <input type="text" id="vorname" name="vorname" placeholder="Vorname" required>
        </div>
        <div class="inputField inputFieldLessHeight">
            <label for="nachname"></label>
            <input type="text" id="nachname" name="nachname" placeholder="Nachname" required>
        </div>
        <?php
        /**
         * Fehlermeldung name
         */
        if (isset($_GET['error']) && $_GET['error'] == 'name_failed') {
            echo '<p class="error-message2 inputField inputFieldLessHeight">Vorname oder Nachname beinhaltet nicht erlaubte Zeichen</p>';
        }
        ?>
        <div class="inputField inputFieldLessHeight">
            <label for="geburtsdatum"></label>
            <input type="text" id="geburtsdatum" name="geburtsdatum" placeholder="Geburtsdatum (D.M.Y)" required>
        </div>
        <?php
        /**
         * Fehlermeldung age
         */
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
            <input type="text" id="frage3_regestrierung" name="frage3_regestrierung" pattern="[0-9]+" placeholder="Deine Lieblingszahl" required>
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