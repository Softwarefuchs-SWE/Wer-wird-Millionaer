<?php

/**
 * Funktion die eine Verbindung zur Datenbank aufbaut
 */
function connect_to_db()
{
    $link = mysqli_connect("localhost", "root", "ihesp", "swe_db");

    if (!$link)
    {
        echo "Connection to swe_db failed: " . mysqli_connect_error();
        exit();
    }

    mysqli_set_charset($link, "utf8");

    return $link;
}

function update_question($fragen , $id) : bool{

    $link = connect_to_db();
    var_dump($fragen);
    $fragentext = mysqli_real_escape_string($link, $fragen["frage"]);
    $ans1 = mysqli_real_escape_string($link, $fragen["ans1"]);
    $ans2 = mysqli_real_escape_string($link, $fragen["ans2"]);
    $ans3 = mysqli_real_escape_string($link, $fragen["ans3"]);
    $ans4 = mysqli_real_escape_string($link, $fragen["ans4"]);
    $niv = mysqli_real_escape_string($link, $fragen['dropdown']);
    $richtigeAns = mysqli_real_escape_string($link, $fragen['checkbox']);


    $sql = "UPDATE fragen SET 
            Frage = '$fragentext',
            Antwort_1 = '$ans1',
            Antwort_2 = '$ans2',
            Antwort_3 = '$ans3',
            Antwort_4 = '$ans4',
            Antwort_richtig = '$niv',
            Frage_schwierigkeit = '$richtigeAns'
            WHERE id = '$id'";


     $result = mysqli_query($link, $sql);

    if($result){
        mysqli_close($link);
        return true;
    }else{
        echo "Fehler beim Update: " . mysqli_error($link);
        return false;

    }

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

/**
 * Funktion die eine Frage in der DB einfügt, SQL Injection wird hier verhindert.
 * @param array $fragen enthält die Fragen aus der Maske
 * @return bool gibt zurück, ob das Einfügen in der DB erfolgreich war
 */
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

/**
 * @param $id, fragen id, anand die Frage aus der DB gelöcscht wird
 * @return bool, true, wennn die Frage erfolgreich gelöscht
 */
function delete_by_id( $id) {

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