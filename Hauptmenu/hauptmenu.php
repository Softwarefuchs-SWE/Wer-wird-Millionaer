<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Hauptmenü</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/basics.css">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/inputTemplate.css">
    <link rel="stylesheet" type="text/css"  href="../Stylesheets/hauptmenu.css">
    <link rel="stylesheet" type="text/css"  href="../admin_panel/view/header.css">
    <script src="../Ressources/audioManager.js"></script>
</head>

<body>

<?php include ("../Ressources/templates/header/full_header.php")?>
<div class="main_container">
    <button class="knopfT1Gross" onclick="location.href = '../frage/load_questions.php';">Schnelles Spiel</button>
    <button class="knopfT1Gross" onclick="location.href = '../frage/load_questions.php?gamemode=spiel_des_tages';">Spiel des Tages</button>
    <button class="knopfT1Gross" onclick="location.href = '../frage/load_questions.php?gamemode=letzte_sendung';">Letzte Sendung</button>
    <button class="knopfT1Gross" onclick="location.href = '../frage/load_questions.php?gamemode=training';">Training</button>
</div>

<div class="sub_container">
    <section>
        <a class="foot_singleline" href="impressum.php">Impressum</a>
        <a class="foot_singleline" href="datenschutz.php">Datenschutz</a>
    </section>
    <section id="bottom_buttons">
        <button class="knopfT2GrossAuswahl">Spielen</button>
        <button class="knopfT2Gross" onclick="location.href = 'bestenliste.php';">Bestenliste</button>
    </section>
</div>
</body>

