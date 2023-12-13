<script src="Ressources/audioManager.js"></script>

<!--
Ein Haupt-Header der nur den Nutzernamen anzeigt. Des Weiter wird auch schon die Hintergrundmusik verwaltet.

Anleitung: Einfach diese Datei, header.css und basics.css includieren.

Achtung: Der header-Tag (HTML) und der audioManager.js sind bereist integriert.
-->
<header class="header_grid-container">
    <div class="header_item_name">
        <label id="nutzername" class="fontsize-20px"><?php echo $_SESSION["username"] .  " (" . $_SESSION["usertops"]?>&#9733;)</label>
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