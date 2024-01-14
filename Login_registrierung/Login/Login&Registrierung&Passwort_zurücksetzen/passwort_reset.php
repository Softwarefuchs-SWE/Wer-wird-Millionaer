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
 * Überprüfen und Verarbeiten der Anmeldedaten aus dem POST-Formular
 * @var string $username Benutzername aus dem POST-Formular
 * @var string $antwort_frage1 Antwort auf die erste Sicherheitsfrage.
 * @var string $antwort_frage2 Antwort auf die zweite Sicherheitsfrage.
 * @var string $antwort_frage3 Antwort auf die dritte Sicherheitsfrage.
 * @var string $neues_password Neues Passwort aus dem POST-Formular.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $antwort_frage1 = $_POST["antwort_frage1"];
    $antwort_frage2 = $_POST["antwort_frage2"];
    $antwort_frage3 = $_POST["antwort_frage3"];
    $neues_password = $_POST["neues_password"];

    /**
     * SQL-Abfrage, um Benutzerdaten abzurufen und Antworten zu überprüfen.
     */
    $sql = "SELECT * FROM Benutzerdaten WHERE Benutzername = '$username' AND Name_erstes_Haustier = '$antwort_frage1' AND Nachname_Mutter = '$antwort_frage2' AND Lieblingszahl = '$antwort_frage3'";

    /**
     * Das Ergebnis der SQL-Abfrage.
     *
     * @var mysqli_result $result
     */
    $result = $conn->query($sql);

    /**
     * Überprüfen, ob ein Datensatz gefunden wurde
     * @var string $hashed_password Das gehashte Passwort mit dem bcrypt-Algorithmus.
     * @var string $update_sql SQL-Abfrage, um das Passwort zu aktualisieren.
     */
    if ($result->num_rows > 0) {
        // Alle Fragen korrekt beantwortet, jetzt das Passwort aktualisieren
        $hashed_password = password_hash($neues_password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE Benutzerdaten SET Passwort = '$neues_password' WHERE Benutzername = '$username'";
        if ($conn->query($update_sql) === TRUE) {
            // Passwort erfolgreich zurückgesetzt, Weiterleitung zur Erfolgsseite
            header("Location: passwort_aktualisiert.php?password=$neues_password");
            exit();
        } else {
            echo "Fehler beim Zurücksetzen des Passworts: " . $conn->error;
        }
    } else {
        // Antworten waren nicht korrekt
        header("Location: Passwort_vergessen.php?error=reset_failed");
        exit();
    }
}

/**
 * Schließt die Verbindung zur Datenbank.
 */
$conn->close();
?>
