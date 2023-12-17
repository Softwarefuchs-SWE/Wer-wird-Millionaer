<?php

/**
 * Funktion die eine Verbindung zur Datenbank aufbaut
 */
function connect_to_db()
{
    $link = mysqli_connect("localhost", "root", "132874", "swe_db");

    if (!$link)
    {
        echo "Connection to swe_db failed: " . mysqli_connect_error();
        exit();
    }

    mysqli_set_charset($link, "utf8");

    return $link;
}

/**
 * Funktion die nur den Fragentext aus der Datenbank holt
 */
function get_question_label() : array {

    $link = connect_to_db();
    $sql = "SELECT Frage FROM fragen";

    $result = mysqli_query($link,$sql);
    if(!$result){
        die('Fehler in der Abfrage: ' . mysqli_error($link));
    }

    $fragen=[];

    while ( $row =mysqli_fetch_assoc($result)){

        $fragen[] = $row;
    }

    mysqli_close($link);
    return $fragen;
}
/**
 * Funktion die alle Fragen auf der Datenbank zurückgibt
 */
function get_question_full(){


    $link = connect_to_db();
    $sql = "SELECT * FROM fragen";

    $result = mysqli_query($link,$sql);

    if(!$result){
        die('Fehler in der Abfrage: ' . mysqli_error($link));
    }

    $fragen=[];
    while ( $row =mysqli_fetch_assoc($result)){

        $fragen[] = $row;
    }
    mysqli_close($link);
    return $fragen;


}
/**
 * Datenbankfunktion die über die ID (Primary-Key) die Fragen
 * zurückgibt.
 */
function get_question_by_id( $id) : array{

    //Verbindung zur Datenbank
    $link = connect_to_db();
    //Verhinderung von SQL-Injection
    $id = mysqli_real_escape_string($link, $id);

    $sql = "SELECT * FROM fragen WHERE id='$id'";

    $result = mysqli_query($link,$sql);
    if (!$result) {
        die('Fehler in der Abfrage: ' . mysqli_error($link));
    }
    $frage= [];
    while ($row = mysqli_fetch_assoc($result)){
        $frage[]= $row;
    }

    mysqli_close($link);
    return $frage;
}


function insert_question(array $fragen) {

    $link = connect_to_db();

    $fragentext = mysqli_real_escape_string($link, $fragen['fragetext']);
    $ans1 = mysqli_real_escape_string($link, $fragen['ans1']);
    $ans2 = mysqli_real_escape_string($link, $fragen['ans2']);
    $ans3 = mysqli_real_escape_string($link, $fragen['ans3']);
    $ans4 = mysqli_real_escape_string($link, $fragen['ans4']);
    $niv = mysqli_real_escape_string($link, $fragen['dropdown']);
    $richtigeAns = mysqli_real_escape_string($link, $fragen['checkbox']);


    $sql = "INSERT INTO fragen (Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit)
VALUES ('$fragentext', '$ans1', '$ans2', '$ans3', '$ans4', '$richtigeAns', '$niv')";

    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    // Überprüfen, ob die Abfrage erfolgreich war
    if ($result) {
        // Erfolgreich eingefügt
        return true;

    } else {
        // Fehler beim Einfügen
        echo "Fehler beim Einfügen: " . mysqli_error($link);
        return false;
    }

}

function delete_by_id( $id){

 $link = connect_to_db();
    // Überprüfen der Verbindung
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Deine DELETE-Abfrage
    $sql = "DELETE FROM fragen WHERE id = '$id'";

// Ausführen der SQL-Abfrage
    $result = mysqli_query($link, $sql);

// Überprüfen, ob die Abfrage erfolgreich war
    if ($result) {
        // Anzahl der gelöschten Zeilen abrufen
        $deletedRows = mysqli_affected_rows($link);
        mysqli_close($link);
        // Ausgabe oder Verwendung der Anzahl der gelöschten Zeilen
         return true;
    } else {
        // Fehler beim Löschen
        return false;
    }


}