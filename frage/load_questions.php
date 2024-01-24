<?php

session_start();

/* DB-Link erstellen */
$link = mysqli_connect("localhost", "root", "123", "swe_db");
mysqli_set_charset($link, "utf8");

// ---- Feststellung des Spielmodus:

// Wenn training ist, dann wird die Session variable gesetzt, weil dann Punkte nicht gespeichert werden
if(isset($_GET['gamemode']) && $_GET['gamemode'] == 'training'){
    $_SESSION['training'] = true;
} else $_SESSION['training'] = false;

if(isset($_GET['gamemode']) && $_GET['gamemode'] != 'training'){

    if($_GET['gamemode'] == 'spiel_des_tages'){
        $statement = "(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 1 ORDER BY RAND(DAY(CURRENT_DATE())) LIMIT 5)
UNION
(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 2 ORDER BY RAND(DAY(CURRENT_DATE())) LIMIT 5)
UNION
(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 3 ORDER BY RAND(DAY(CURRENT_DATE()))LIMIT 5)
ORDER BY Frage_schwierigkeit";
    } else if($_GET['gamemode'] == 'letzte_sendung'){
        $statement = "(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 1 LIMIT 5)
UNION
(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 2 LIMIT 5)
UNION
(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 3 LIMIT 5)
ORDER BY Frage_schwierigkeit";
    }

} else {
    $statement = "(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 1 ORDER BY RAND() LIMIT 5)
UNION
(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 2 ORDER BY RAND() LIMIT 5)
UNION
(SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit FROM fragen WHERE Frage_schwierigkeit = 3 ORDER BY RAND() LIMIT 5)
ORDER BY Frage_schwierigkeit";
}


$result = mysqli_query($link, $statement);

$questions = [];
while($row = mysqli_fetch_row($result)){
    $questions[] = $row;
}



$_SESSION['questions'] = $questions;
$_SESSION['question_nr'] = 0;
$_SESSION['fifty_joker'] = true;
$_SESSION['viewer_joker'] = true;

header("Location: frage.php");
exit();
