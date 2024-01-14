<?php

session_start();

// Überprüfe, ob die POST-Parameter 'key' und 'value' gesetzt sind
if (isset($_POST['key']) && isset($_POST['value'])) {
    // Setze den Wert der Session-Variable basierend auf den POST-Parametern
    $_SESSION[$_POST['key']] = $_POST['value'];
}

