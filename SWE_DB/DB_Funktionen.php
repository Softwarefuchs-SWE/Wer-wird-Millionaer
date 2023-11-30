<?php

function connect_to_db()
{
  $link = mysqli_connect("localhost", "root", "123", "swe_db");

  if (!$link)
  {
    echo "Connection to swe_db failed: " . mysqli_connect_error();
    exit();
  }

  mysqli_set_charset($link, "utf8");

  return $link;
}


$link = connect_to_db();

$sql = "SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4
        FROM Fragen
        WHERE Frage_schwierigkeit = 1
        LIMIT 3";

$result = mysqli_query($link, $sql);

if (!$result)
{
  echo "Fehler während der Abfrage:  ", mysqli_error($link);
  exit();
}

while ($row = mysqli_fetch_assoc($result))
{
  foreach ($row as $value)
  {
    echo "<td>" . $value . "</td>" . "<br>";
  }
  echo "</tr>" . "<br>";
}

mysqli_close($link);
