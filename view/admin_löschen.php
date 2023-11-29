<?php
include "admin_template.html";

$fragen = array(
    "Wie lautet die Hauptstadt von Frankreich?",
    "In welchem Jahr wurde die Berliner Mauer errichtet?",
    "Wie viele Kontinente gibt es?",
    "Wer schrieb 'Romeo und Julia'?",
    "Was ist die Hauptzutat in Guacamole?",
    "Wie nennt man die kleinste Einheit eines Elements?",
    "Welches ist das am meisten gesprochene Sprache der Welt?",
    "Wie viele Planeten hat unser Sonnensystem?",
    "Wer war der erste Präsident der Vereinigten Staaten?",
    "Was ist die Hauptstadt von Australien?"
);


?>



<main>

    <div class="buttons">
    <label class="inputField" id="text"> Wählen Sie eine Fragen zum löschen aus </label>

        <div class="scroll-menu">

            <div class="options">


                <?php

                for($i =0; $i < count($fragen); $i++){

                    echo "<div class='option'>";
                    echo "<label class='labelQuestion knopf'>$fragen[$i]</label>";
                    echo " <input type='checkbox' class='checkScroll'>";
                    echo "</div>";

                }
                ?>

            </div>

        </div>

        <script>

            document.addEventListener("DOMContentLoaded", function () {
                const options = document.querySelectorAll('.scroll-menu .option');

                options.forEach(function (option) {
                    option.addEventListener('click', function () {
                        // Hier kannst du die gewünschte Aktion für die ausgewählte Option durchführen
                        console.log("Ausgewählte Option:", option.textContent);
                    });
                });
            });

        </script>

    </div>


    <div class="buttonBottomContainer">
        <form >
            <input class="knopfT1Medium knopf" type="button" name="back" value="Zurück">
            <input class="knopfT1Medium knopf"  type="button" name="confirm" value="Löschen">
        </form>

    </div>

</main>


<footer>

</footer>

</body>

</html>

