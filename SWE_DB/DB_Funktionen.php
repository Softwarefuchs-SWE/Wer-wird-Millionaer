<?php

/**
 * Funktion zur Herstellung einer Datenbankverbindung
 * @return mysqli - Gibt ein MySQLi-Verbindungsobjekt bei Erfolg oder false bei einem Fehler zurück
 */
function connect_to_db()
{
  $link = mysqli_connect("localhost", "root", "ihesp", "swe_db");

  if (!$link)
  {
    echo "Connection to swe_db failed: " . mysqli_connect_error();
    exit();
  }

  // Setzt das charset auf utf8.
  mysqli_set_charset($link, "utf8");

  return $link;
}



function monatsbester ($monat) {
  $link = connect_to_db();
  $link->query("UPDATE monat SET monat = '$monat'");
  $link->query("UPDATE Benutzerdaten SET Monats_Bester = Monats_Bester + 1 WHERE Punktzahl = (SELECT MAX(Punktzahl) FROM Benutzerdaten);");
  $link->query("UPDATE Benutzerdaten SET Punktzahl = 0;");
}


