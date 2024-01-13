<?php

/**
 * Verbindung zu DB wird aufgebaut
 */
function connect_to_db()
{
    $link = mysqli_connect("localhost", "root", "root", "swe_db");

    if (!$link)
    {
        echo "Connection to swe_db failed: " . mysqli_connect_error();
        exit();
    }

    mysqli_set_charset($link, "utf8");

    return $link;
}