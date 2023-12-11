/**
 * Wechselt zyklisch die Hintergrundmusik die abgespielt wird2.
 * **/
function changeMusik() {
    var audio1 = document.getElementById("background_music1");
    var audio2 = document.getElementById("background_music2");

    if (audio1.paused && audio2.paused){ // Musik 1 spielt
        audio1.play();
    }
    else if (!audio1.paused && audio2.paused){ // Musik 2 spielt
        audio1.pause();
        audio2.play();
    }
    else // keine Musik spielt
    {
        audio1.pause();
        audio2.pause();
    }

    /*song.currentTime = song.currentTime;*/
}
