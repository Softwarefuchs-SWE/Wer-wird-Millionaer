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
    <label id="text"> Wählen Sie eine Frage zum Löschen aus </label>

    <div class="main_container">


        <div class="scroll-menu">

            <div class="options round-checkbox">
                <?php

                for($i =0; $i < count($fragen); $i++){

                    echo "<div class='option'>";
                    echo "<label class='labelQuestion' >$fragen[$i]</label>";
                    echo " <input type='checkbox' class='checkScroll'>";
                    echo "</div>";

                }
                ?>

            </div>

        </div>

        <script>

            document.addEventListener("DOMContentLoaded", function () {
                const options = document.querySelectorAll('.options .option');
            });

        </script>

    </div>



        <form class="buttonBottomContainer">
            <input class="knopfT2GrossAuswahl knopf"  type="button" name="back" value="Zurück" onclick="back_()">
            <input class="knopfT2GrossAuswahl knopf " type="button" name="confirm" value="Löschen">

            <script>

                function back_(){

                    window.location.href = "adminpanel.php";
                }

            </script>
        </form>



</main>


<footer>

</footer>

</body>

</html>

