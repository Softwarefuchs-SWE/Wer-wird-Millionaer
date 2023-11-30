//DROP DATABASE if exists swe_db;
CREATE DATABASE IF NOT EXISTS swe_db;
USE swe_db;

CREATE TABLE IF NOT EXISTS Benutzerdaten
(
  ID INT AUTO_INCREMENT PRIMARY KEY,
  Vorname VARCHAR(100),
  Nachname VARCHAR(100),
  Geburtstag VARCHAR(100),
  Name_erstes_Haustier VARCHAR(100),
  Nachname_Mutter VARCHAR(100),
  Lieblingszahl INT,
  Passwort VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS AdminID
(
  ID INT UNIQUE
);

CREATE TABLE IF NOT EXISTS Fragen
(
  Frage VARCHAR(100),
  Antwort_1 VARCHAR(100),
  Antwort_2 VARCHAR(100),
  Antwort_3 VARCHAR(100),
  Antwort_4 VARCHAR(100),
  Antwort_richtig int,
  Frage_schwierigkeit int
);
