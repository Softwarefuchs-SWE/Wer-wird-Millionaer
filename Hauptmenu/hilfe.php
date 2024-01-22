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
    <script src="../Ressources/audioManager.js"></script>
</head>
<body>
<header class="header_grid-container">
    <div class="header_item_name">
        <label id="nutzername" class="fontsize-20px"><?php echo $_SESSION["username"] .  " (" . $_SESSION["usertops"]?>&#9733;)</label>
    </div>
    <div class="header_item_logo align-content-center">
        <h1 id="headline">Hilfe</h1>
    </div>
</header>
<div class="main_container">
    <blockquote>
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
        dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    </blockquote>
</div>
<div class="sub_container">
    <section>
        <button class="knopfT2Gross" onclick="location.href = 'hauptmenü.php';">Zurück</button>
    </section>
</div>
</body>