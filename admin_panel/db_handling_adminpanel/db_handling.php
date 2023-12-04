<?php

/**
Funktion die eine Verbindung zur Datenbank aufbaut
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

/**
Funktion die nur den Fragentext aus der Datenbank holt
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
Funktion die alle Fragen auf der Datenbank zurückgibt
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
 Datenbankfunktion die über die ID (Primary-Key) die Fragen
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