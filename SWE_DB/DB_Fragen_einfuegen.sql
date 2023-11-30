USE swe_db;

INSERT INTO Fragen (Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit)
VALUES
  ('Welche Farbe hat eine reife Banane?', 'Rot', 'Grün', 'Gelb', 'Blau', 3, 1),
  ('Wie viele Seiten hat ein Dreieck?', '2', '3', '4', '5', 2, 1),
  ('Wie nennt man den Fachmann für Zahnbehandlungen?', 'Optiker', 'Orthopäde', 'Zahnarzt', 'Chirurg', 1, 1),
  ('Was ist die Hauptstadt von Deutschland?', 'Berlin', 'München', 'Frankfurt', 'Hamburg', 1, 1),
  ('Wie viele Stunden hat ein Tag?', '1', '5', 'Keine', '24', 4, 1),

  ('Wer schrieb das Buch "Harry Potter"?', 'J.K. Rowling', 'Stephen King', 'George R.R. Martin', 'Charles Dickens', 1, 2),
  ('Welches ist das größte Säugetier der Welt?', 'Elefant', 'Blauwal', 'Giraffe', 'Nashorn', 2, 2),
  ('In welchem Land befindet sich die Stadt Rom?', 'Italien', 'Spanien', 'Griechenland', 'Frankreich', 1, 2),
  ('Welches ist das höchste Gebäude der Welt?', 'Empire State Building', 'Burj Khalifa', 'Shanghai Tower', 'Taipei 101', 2, 2),
  ('Welche ist die kleinste Primzahl?', '1', '2', '3', '4', 1, 2),

  ('Wie viele Spieler hat eine Lacrosse-Mannschaft auf dem Feld?', '8', '10', '12', '16', 3, 3),
  ('Wer schrieb das Buch "Die Göttliche Komödie"?', 'Dante Alighieri', 'Geoffrey Chaucer', 'Petrarch', 'Giovanni Boccaccio', 1, 3),
  ('Welches chemische Element hat das Symbol "W"?', 'Wolfram', 'Wismut', 'Wasserstoff', 'Wolframin', 1, 3),
  ('Welche Stadt wird als "Stadt der sieben Hügel" bezeichnet?', 'Istanbul', 'Rom', 'Athen', 'Jerusalem', 2, 3),
  ('In welchem Jahr wurde die erste E-Mail gesendet?', '1971', '1982', '1965', '1990', 1, 3);
