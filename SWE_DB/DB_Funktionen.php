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

$sql = "SELECT Frage, Antwort_1, Antwort_2, Antwort_3, Antwort_4, Antwort_richtig, Frage_schwierigkeit
        FROM Fragen
        WHERE Frage_schwierigkeit = 1
        LIMIT 1";

//$result = mysqli_fetch_assoc(mysqli_query($link, $sql));

$result1 = mysqli_query($link, $sql);

if (!$result1)
{
  echo "Fehler während der Abfrage:  ", mysqli_error($link);
  exit();
}

while ($row = mysqli_fetch_assoc($result1))
{
  foreach ($row as $value)
  {
    echo "<td>" . $value . "</td>";
  }
  echo "</tr>";
}
/*
echo "Frage: " . $row['Frage'] . "<br>";
echo "Antwort 1: " . $row['Antwort_1'] . "<br>";
echo "Antwort 2: " . $row['Antwort_2'] . "<br>";
echo "Antwort 3: " . $row['Antwort_3'] . "<br>";
echo "Antwort 4: " . $row['Antwort_4'] . "<br>";
echo "Richtige Antwort: " . $row['Antwort_richtig'] . "<br>";
echo "Frage Schwierigkeit: " . $row['Frage_schwierigkeit'] . "<br>";
*/
mysqli_close($link);
