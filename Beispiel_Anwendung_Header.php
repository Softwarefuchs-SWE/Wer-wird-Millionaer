<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wer wird Millionär</title>

    <link href="admin_panel/view/inputTemplate.css" rel="stylesheet">
    <link href="admin_panel/view/basics.css" rel="stylesheet">
    <link href="admin_panel/view/header.css" rel="stylesheet">
</head>

<script>
    function changeMusik() {
        var audio1 = document.getElementById("audio1");
        var audio2 = document.getElementById("audio2");

        if (audio1.paused && audio2.paused){
            audio1.play();
        }
        else if (!audio1.paused && audio2.paused){
            audio1.pause();
            audio2.play();
        }
        else
        {
            audio1.pause();
            audio2.pause();
        }
    }

    function play2() {
        var audio = document.getElementById("audio2");
        audio.play();
        var audio = document.getElementById("audio1");
        audio.pause();
    }
</script>

<body>

<?php include "Ressources/templates/header/full_header.php" ?>

<main>
    <form class="align-content-center" action="index.html" method="get">
        <input type="text" class="inputField">
    </form>

    <audio id="audio1" loop src="Ressources\music\music_lofi.mp3"></audio>
    <audio id="audio2" loop src="Ressources\music\music_dark.mp3"></audio>

    <button onclick="changeMusik()">Musik ändern </button>
</main>
</body>
</html>
