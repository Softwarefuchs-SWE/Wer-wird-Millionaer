USE swe_db;

INSERT INTO Benutzerdaten (Vorname, Nachname, Geburtstag, Name_erstes_Haustier, Nachname_Mutter, Lieblingszahl, Passwort)
VALUES
  ('Max', 'Mustermann', '1990-05-15', 'Bello', 'Mustermann', 7, 'passwort123'),
  ('Anna', 'Schmidt', '1985-09-22', 'Whiskers', 'Schmidt', 5, 'geheim123'),
  ('Lena', 'Müller', '1998-11-30', 'Fluffy', 'Müller', 3, '12345pass'),
  ('Tom', 'Meier', '1982-07-10', 'Rex', 'Meier', 9, 'sicher456'),
  ('Sophie', 'Wagner', '2000-03-25', 'Mittens', 'Wagner', 8, 'pass123wort');

ALTER TABLE Benutzerdaten
  ADD COLUMN Benutzername VARCHAR(255);

-- Max Mustermann
UPDATE Benutzerdaten
SET Benutzername = CONCAT(LOWER(SUBSTRING(Vorname, 1, 1)), Nachname)
WHERE ID = 1;

-- Anna Schmidt
UPDATE Benutzerdaten
SET Benutzername = CONCAT(LOWER(SUBSTRING(Vorname, 1, 1)), Nachname)
WHERE ID = 2;

-- Lena Müller
UPDATE Benutzerdaten
SET Benutzername = CONCAT(LOWER(SUBSTRING(Vorname, 1, 1)), Nachname)
WHERE ID = 3;

-- Tom Meier
UPDATE Benutzerdaten
SET Benutzername = CONCAT(LOWER(SUBSTRING(Vorname, 1, 1)), Nachname)
WHERE ID = 4;

-- Sophie Wagner
UPDATE Benutzerdaten
SET Benutzername = CONCAT(LOWER(SUBSTRING(Vorname, 1, 1)), Nachname)
WHERE ID = 5;
