<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Impressum</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  type="text/css" href="../../../Stylesheets/basics.css">
    <link rel="stylesheet"  type="text/css" href="../../../Stylesheets/inputTemplate.css">
    <link rel="stylesheet" type="text/css"  href="../../../Stylesheets/hauptmenu.css">
    <link rel="stylesheet" type="text/css"  href="../../../admin_panel/view/header.css">
    <script src="../Ressources/audioManager.js"></script>
    <script src="login.js"></script>
</head>
<body>

<?php include ("../../../Ressources/templates/header/lite_header.php")?>

<div class="main_container">
    <h1>Impressum</h1>
    <h2>Angaben gemäß § 5 TMG:</h2>
    <p>Elysee & Arnold GmbH.<br>Student<br>Max Mustermann</p>
    <h3>Postanschrift:</h3>
    <p>Musterstraße 1<br>11111 Musterstadt<br></p>
    <h3>Kontakt:</h3>
    <p>Telefon: 1111111111111<br>Telefax: 1111111111111<br>E-Mail: example@example.com</p>
    <p></p><h3>Vertreten durch:</h3>
    <p>Elysee
        <br>Arnold<br></p>
    <p></p><h3>Urheberrechtliche Hinweise</h3>
    <p>alles meins<br></p>
    <p></p><h2>Information gemäß § 36 VSBG</h2>
</div>
<div class="sub_container">
    <section>
        <button class="knopfT2Gross" onclick=zurAnmeldung()>Zurück</button>
    </section>
</div>
</body>