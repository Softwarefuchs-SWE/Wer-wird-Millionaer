<?php

session_start();

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
?>

<head>
    <title>Frage</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/frage.css">
    <link rel="stylesheet" href="../css/inputTemplate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <article class="joker">
        <?php
            if(isset($_SESSION['fifty_joker']) && $_SESSION['fifty_joker'] === true){
                    echo '<button id="fifty_fifty" class="noCss"><img src="./img/50_50_Joker.png"></button>';
            } else
                echo '<button id="fifty_fifty" class="noCss disableJoker"><img src="./img/50_50_Joker.png"></button>';
        ?>
        <button id="viewer_joker" class="noCss"><img src="./img/Publikumsjoker.png"></button>
    </article>

    <article class="question_header">
        <h3><?php echo $questions[$question_nr - 1][0] ?? "Question not found" ?></h3>
    </article>

    <article>
        <form action="frage.php" method="POST" class="question">
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

            // Irgendsowas was ChatGPT - gesagt hat, ich aktualisiere in der SESSION variable eine variable die sagt ob der 50:50 Joker
            // Bereits benutz wurde oder nicht. Geht nur über diese Methode weil javaScript.
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_session.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('key=fifty_joker&value=false');

            document.getElementById('fifty_fifty').removeEventListener('click', hide_two_buttons);
        }
        document.getElementById('fifty_fifty').addEventListener('click', hide_two_buttons);

    </script>
</body>

