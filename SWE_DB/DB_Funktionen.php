<?php

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


