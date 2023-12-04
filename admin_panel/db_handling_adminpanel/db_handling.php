<?php


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


function get_question_label() : array {

    $link = connect_to_db();
    $sql = "SELECT Frage FROM fragen";

    $result = mysqli_query($link,$sql);
    $fragen=[];
    while ( $row =mysqli_fetch_assoc($result)){

        $fragen[] = $row;
    }
    var_dump($fragen);
    mysqli_close($link);
    return $fragen;
}

function get_question_full(){


    $link = connect_to_db();
    $sql = "SELECT * FROM fragen";

    $result = mysqli_query($link,$sql);
    $fragen=[];
    while ( $row =mysqli_fetch_assoc($result)){

        $fragen[] = $row;
    }
    var_dump($fragen);
    mysqli_close($link);
    return $fragen;


}