<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Hilfe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/basics.css">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/inputTemplate.css">
    <link rel="stylesheet" type="text/css"  href="../Stylesheets/hauptmenu.css">
    <link rel="stylesheet" type="text/css"  href="../admin_panel/view/header.css">

    <script src="../Ressources/audioManager.js"></script>
</head>
<body>

<?php include ("../Ressources/templates/header/noHelp_header.php")?>

<div class="main_container">
    <blockquote>

        <br>
        <br>
        <br>
        <br><br>
        <br>
        <br><br>

        <br>

    </blockquote>
    <blockquote>

        Anmeldung
        Nach erfolgreicher Anmeldung können Sie einen Spielmodus auswählen. Detaillierte Informationen
        zu den verschiedenen Spielmodi finden Sie im Hilfemenü. Hier haben Sie außerdem die Möglichkeit,
        zur Bestenliste zu wechseln und einzusehen, welche Spieler bereits wie viele Punkte erreicht haben.
    </blockquote>
        <blockquote>
            Joker
            Es stehen Ihnen zwei Joker zur Verfügung, die jeweils einmal im Spiel eingesetzt werden können. Der
            Publikumsjoker zeigt an, wie das virtuelle Publikum die Frage beantworten würde. Der 50-50 Joker
            entfernt hingegen zwei falsche Antworten, um die Auswahl zu erleichtern
        </blockquote>


    <blockquote>
        Bestenliste
        Wenn ein Spiel beendet wurden, gelangen Sie automatisch in die Bestenliste. Dort werden alle
        Spieler mit Punkten angezeigt. Beim Spielmodus „Training“ wird die Bestenliste geleitet, aber die
        Punkte werden Ihnen angezeigt.
    </blockquote>
</div>
<div class="sub_container">
    <section>
        <button class="knopfT2Gross" onclick="location.href = 'hauptmenu.php';">Zurück</button>
    </section>
</div>
</body>