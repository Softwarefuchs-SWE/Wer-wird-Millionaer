<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Impressum</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/basics.css">
    <link rel="stylesheet"  type="text/css" href="../Stylesheets/inputTemplate.css">
    <link rel="stylesheet" type="text/css"  href="../Stylesheets/hauptmenü.css">
    <script src="../Ressources/audioManager.js"></script>
</head>
<body>
<?php
    include ("../Ressources/templates/header/onlyName_header.php")
?>

<div class="main_container">
    <h2>Angaben gemäß § 5 TMG:</h2>
    <p>Elysee & Arnold GmbH.<br>Student<br>Max Mustermann</p>
    <h3>Postanschrift:</h3>
    <p>Musterstraße 1<br>11111 Musterstadt<br></p>
    <h3>Kontakt:</h3>
    <p>Telefon: 1111111111111<br>Telefax: 1111111111111<br>E-Mail: example@example.com</p>
    <h3>Vertreten durch:</h3>
    <p>Elysee<br>Arnold<br></p>
    <h3>Urheberrechtliche Hinweise</h3>
    <p>alles meins<br></p>
</div>
<div class="sub_container">
    <section>
        <button class="knopfT2Gross" onclick="location.href = 'hauptmenü.php';">Zurück</button>
    </section>
</div>
</body>