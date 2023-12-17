<?php
session_start();
include "../SWE_DB/DB_Funktionen.php";
$link = connect_to_db();

mysqli_set_charset($link, "utf8");

$sql = "SELECT Benutzername FROM benutzerdaten LIMIT 10";

$topuser_data = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Bestenliste</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/basics.css">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/inputTemplate.css">
    <link rel="stylesheet" type="text/css"  href="../Stylesheets/hauptmenü.css">
    <script src="../Ressources/audioManager.js"></script>
</head>

<body>
<header class="header_grid-container">
    <div class="header_item_name">
        <label id="nutzername" class="fontsize-20px"><?php echo $_SESSION["username"] .  " (" . $_SESSION["usertops"]?>&#9733;)</label>
    </div>

    <button id="Ton" class="knopfT3Rund" onclick="changeMusik()">
        <img id="Ton" src="/Ressources/Images/Ton%20Button.png" alt="Ton ändern">
    </button>
    <audio id="background_music1" loop src="..\Ressources\music\music_lofi.mp3"></audio>
    <audio id="background_music2" loop src="..\Ressources\music\music_dark.mp3"></audio>
</header>

<div class="main_container" id="bestenliste">
    <div>Bestenliste (Monat)</div>
    <table>
        <?php
        /*
         * Gibt die 10 bestplatzierten User in einer Tabelle bestehen aus Platzierung, Usernamen und erreichter Punktzahl aus.
         * Gibt es weniger als 10 Spieler bleiben die entsprechenden Zeilen abgesehen von der Inexierung leer.
         */
        for($i = 1; $i <= 10; $i++)
        {
            if ($i <= mysqli_num_rows($topuser_data))
            {
                $user = mysqli_fetch_assoc($topuser_data);
                echo "<tr><td>$i</td><td>".$user['Benutzername']."</td><td>punktzahl</td></tr>";
            } else
            {
                echo "<tr><td>$i</td><td></td><td></td></tr>";
            }
        }
        ?>
    </table>
</div>
<div class="sub_container">
    <section>
        <button class="knopfT2Gross" onclick="location.href = 'hauptmenü.php';">Spielen</button>
        <button class="knopfT2GrossAuswahl">Bestenliste</button>
    </section>
</div>
</body>
