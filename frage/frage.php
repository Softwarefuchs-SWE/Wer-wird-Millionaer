<?php

session_start();

include "../Ressources/templates/header/full_header.php";

// Erhöhe die Nummer der Frage im SESSION Array, falls die erste frage generiert wurde oder eine Antwortmöglichkeit ausgewählt wurde
if(isset($_POST['selectedOption']) || $_SESSION['question_nr'] == 0)
    $_SESSION['question_nr']++;

$question_nr = $_SESSION['question_nr'];    // Hole die aktuelle Nummer der Frage aus dem SESSION Array

$questions = $_SESSION['questions'] ?? [];  // Hole das Frage-Array aus dem SESSION Array

/* Verarbeitung der Antwort */
if(isset($_POST['selectedOption'])){
    // Prüfe ob die antwort richtig ist
    if(($questions[$question_nr - 2][5] != $_POST['selectedOption']) || $question_nr == 16) {
        header("Location:punktzahl.php");   // Die question_nr wurde bereits oben inkrementiert, deswegen hier wieder abziehen falls falsch oder letzte Frage.
        $_SESSION['question_nr']--;
    }
}
/*
if(sizeof($_SESSION['questions']) != 15){
    throw new Error("Could not load questions.");
}
*/
// PHP Code fuer Publikumsjoker

// richtige antwort der vier fragen
$loesung = $questions[$question_nr - 1][5] - 1;
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

<head>
    <title>Frage</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/frage.css">
    <link rel="stylesheet" href="../Stylesheets/inputTemplate.css">
    <link rel="stylesheet" href="../Stylesheets/basics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <article class="joker">
        <?php
            if(isset($_SESSION['fifty_joker']) && $_SESSION['fifty_joker'] === true){
                    echo '<button id="fifty_fifty" class="noCss"><img src="./img/50_50_Joker.png"></button>';
            } else
                echo '<button id="fifty_fifty" class="noCss disableJoker"><img src="./img/50_50_Joker.png"></button>';

            if(isset($_SESSION['viewer_joker']) && $_SESSION['viewer_joker'] === true){
                echo '<button id="viewer_joker" class="noCss" onclick="openPopup()"><img src="./img/Publikumsjoker.png"></button>';
            } else
                echo '<button id="viewer_joker" class="noCss disableJoker " onclick="openPopup()"><img src="./img/Publikumsjoker.png"></button>';
        ?>


        <!-- Das Popup -->
        <div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: darkcyan; padding: 5px;">
            <button id="closeBtn" onclick="closePopup()">X</button> <!-- Der "X"-Button zum Schließen des Popups -->
            <h2 id="popupTitle" style="background-color: darkcyan; color: white; text-align: center;">Publikumsjoker</h2>
            <canvas id="balkendiagramm" width="300" height="300"></canvas> <!-- Kleineres Canvas-Element -->
        </div>

    </article>

    <article class="question_header" id="frage_text">
        <h3><?php echo $questions[$question_nr - 1][0] ?? "Question not found" ?></h3>
    </article>

    <article>
        <form action="#frage_text" method="POST" class="question">
            <ul class="options">
                <?php
                    for($i = 1; $i <= 4; $i++ ){
                        echo '<li><input type="radio" id="option'. $i . '" name="selectedOption" class="radio_input" value=' . $i . '>';
                        echo '<label for="option' . $i . '" class="option knopf">' . $questions[$question_nr - 1][$i] . '</label></li>';
                    }
                ?>
            </ul>
            <button type="submit" id="submitButton" class="knopfT1Medium">Abschicken</button>
        </form>
    </article>
    <script>
        function hide_two_buttons() {
            // Verstecke die ersten beiden Optionen
            let hide = [];
            while (hide.length <= 2) {
                let zufallszahl = Math.floor(Math.random() * 4) + 1;
                if (zufallszahl !== <?php echo $questions[$question_nr - 1][5] ?>) {
                    if(!hide.includes(zufallszahl, 0))
                    hide.push(zufallszahl);
                }
            }
            for (let i = 1; i <= 2; i++) {
                let optionElement = document.getElementById('option' + hide[i - 1]);
                let labelElement = document.querySelector('label[for=option' + hide[i - 1] + ']');
                if (optionElement && labelElement) {
                    optionElement.style.opacity = '0';
                    optionElement.style.pointerEvents = 'none';
                    labelElement.style.opacity = '0';
                    labelElement.style.pointerEvents = 'none';
                }
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_session.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('key=fifty_joker&value=false');

            document.getElementById('fifty_fifty').removeEventListener('click', hide_two_buttons);
        }

        document.getElementById('fifty_fifty').addEventListener('click', hide_two_buttons);

        // Publikumsjoker ab hier

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

            // Publikumsjoker nur einmal verwendbar machen
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_session.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('key=viewer_joker&value=false');
        }

        // Funktion, um das Popup zu schließen
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

    </script>
</body>

