<?php session_start() ?>

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

<?php
    $_SESSION["username"] = "Kevin";
    $_SESSION["usertops"] = "2"; //Anzahl: Wie oft man schon an der Spitze der Bestenliste gewesen ist
?>

<?php include "Ressources/templates/header/full_header.php" ?>

<body>
    <main class="align-content-center">
        Hallo Welt!
    </main>
</body>
</html>
