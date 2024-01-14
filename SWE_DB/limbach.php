<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Popup Balkendiagramm</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php
// richtige antwort der vier fragen
$loesung = 0;
function joker_publikum ($loesung) : array
{
  $antworten_prozente = [0,0,0,0];
  $nicht_richtige_antworten = [0,0,0,0];

  for ($i = 0; $i < 4; $i++)
  {
    if ($i + 1 != $loesung)
    {
      $nicht_richtige_antworten[$i] = $i;
    }
    shuffle($nicht_richtige_antworten);
  }

  $rand_fav = random_int(0,3);

  if ($rand_fav == 1)
  {
    $temp = $loesung;
    $loesung = $nicht_richtige_antworten[0];
    $nicht_richtige_antworten[0] = $temp;
  }

  for ($i = 1; $i <= 100; $i++)
  {
    $rand_p = random_int(1,100);

    if ($rand_p <= 50)
    {
      $antworten_prozente[$loesung] ++;
    }
    else if ($rand_p <= 70)
    {
      $antworten_prozente[$nicht_richtige_antworten[0]] ++;
    }
    else if ($rand_p <= 80)
    {
      $antworten_prozente[$nicht_richtige_antworten[2]] ++;
    }
    else if ($rand_p > 80)
    {
      $antworten_prozente[$nicht_richtige_antworten[3]] ++;
    }
  }
  return $antworten_prozente;
}
$antworten = joker_publikum($loesung);

$antwort1 = $antworten[0];
$antwort2 = $antworten[1];
$antwort3 = $antworten[2];
$antwort4 = $antworten[3];

?>

<button onclick="openPopup()">Öffne Popup</button>

<!-- Das Popup -->
<div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: darkcyan; padding: 5px;">
  <button id="closeBtn" onclick="closePopup()">X</button> <!-- Der "X"-Button zum Schließen des Popups -->
  <h2 id="popupTitle" style="background-color: darkcyan; color: white; text-align: center;">Publikumsjoker</h2>
  <canvas id="balkendiagramm" width="300" height="300"></canvas> <!-- Kleineres Canvas-Element -->
</div>

<script>
  antwort1 = <?php echo $antwort1; ?>;
  antwort2 = <?php echo $antwort2; ?>;
  antwort3 = <?php echo $antwort3; ?>;
  antwort4 = <?php echo $antwort4; ?>;

  // Funktion, um das Popup zu öffnen
  function openPopup() {
    document.getElementById('popup').style.display = 'block';

    // Beschriftungen für die Balken von A bis D
    var labels = ["A", "B", "C", "D"];

    // Erstelle das Balkendiagramm im Popup
    var ctx = document.getElementById('balkendiagramm').getContext('2d');
    var meinDiagramm = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels, // Beschriftung von A bis D für die Balken
        datasets: [{
          label: 'Antworten',
          data: [antwort1, antwort2, antwort3, antwort4], // Beispielwerte für die Balken
          backgroundColor: 'rgb(0, 192, 180)',
          barThickness: 35, // Balkenbreite für Abstand
          borderRadius: 5
        }]
      },
      options: {
        scales: {
          y: {
            display: false
          },
          x: {
            grid: {
              display: false, // X-Achsen-Gitter ausblenden
              drawBorder: false, // Achsenlinie ausblenden
              drawTicks: false
            },
            ticks: {
              display: true, // Beschriftungen anzeigen
              color: 'white' // Schriftfarbe für die Beschriftungen
            },
          }
        },
        plugins: {
          legend: {
            display: false // Legende ausblenden
          }
        }
      }
    });
  }

  // Funktion, um das Popup zu schließen
  function closePopup() {
    document.getElementById('popup').style.display = 'none';
  }
</script>

</body>
</html>
