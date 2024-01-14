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
    <link rel="stylesheet" type="text/css"  href="../Stylesheets/hauptmenü.css">
    <script src="../Ressources/audioManager.js"></script>
</head>

<body>

<?php
/*
 * Delete me
 */
$_SESSION["username"] = "Kevin";
$_SESSION["usertops"] = "2"; //Anzahl: Wie oft man schon an der Spitze der Bestenliste gewesen ist
?>

<header class="header_grid-container">
    <div class="header_item_name">
        <label id="nutzername" class="fontsize-20px"><?php echo $_SESSION["username"] .  " (" . $_SESSION["usertops"]?>&#9733;)</label>
    </div>

    <button id="Ton" class="knopfT3Rund" onclick="changeMusik()">
        <img id="Ton" src="/Ressources/Images/Ton%20Button.png" alt="Ton ändern">
    </button>

    <button id="Hilfe" class="knopfT3Rund" onclick="location.href = 'hilfe.php';">
        <img id="Hilfe" src="/Ressources/Images/Hilfe%20Button.png" alt="Hilfe anzeigen">
    </button>

    <div class="header_item_logo align-content-center">
        <img id="WWM-Logo" src="/Ressources/Images/Logo.png" alt="logo" width="185" height="150">
    </div>

    <div class="header_item_fhlogo align-content-right shadow-outset">
        <img id="fh-logo" src="/Ressources/Images/FH-Logo.png" alt="FH_Logo" width="60" height="150">
    </div>

    <audio id="background_music1" loop src="..\Ressources\music\music_lofi.mp3"></audio>
    <audio id="background_music2" loop src="..\Ressources\music\music_dark.mp3"></audio>
</header>
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

