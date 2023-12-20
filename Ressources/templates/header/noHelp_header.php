<script src="Ressources/audioManager.js"></script>

<!--
Ein Haupt-Header den Ton-Knopf und Nutzernamen anzeigt. Des Weiter wird auch schon die Hintergrundmusik verwaltet.

Anleitung: Einfach diese Datei, header.css, inputTemplate.css und basics.css includieren.

Achtung: Der header-Tag (HTML) und der audioManager.js sind bereist integriert.
-->
<header class="header_grid-container">
    <div class="header_item_name">
        <label id="nutzername" class="fontsize-20px"><?php echo ($_SESSION["nutzername"]??"Gast") .  " (" . ($_SESSION["usertops"]??"...")?>&#9733;)</label>
    </div>

    <div class="header_item_knöpfe align-content-right">
        <button class="knopfT3Rund" onclick="changeMusik()">
            <img src="/Ressources/Images/Ton%20Button.png" alt="Ton ändern" width="60" height="60">
        </button>
    </div>

    <div class="header_item_logo align-content-center">
        <img id="WWM-Logo" src="/Ressources/Images/Logo.png" alt="logo" width="185" height="150">
    </div>

    <div class="header_item_fhlogo align-content-right shadow-outset">
        <img id="fh-logo" src="/Ressources/Images/FH-Logo.png" alt="FH_Logo" width="60" height="150">
    </div>

    <audio id="background_music1" loop src="Ressources\music\music_lofi.mp3"></audio>
    <audio id="background_music2" loop src="Ressources\music\music_dark.mp3"></audio>
</header>