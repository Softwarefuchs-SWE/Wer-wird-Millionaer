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

    <main>

        <div class="buttons">
            <label class="inputField" id="text"> Bitte wählen Sie eine Fragen zum ändern aus: </label>

            <div class="scroll-menu">

                <div class="options">


                    <?php

                    for($i =0; $i < count($fragen); $i++){

                        echo "<div class='option'>";
                        echo "<label class='labelQuestion '>$fragen[$i]</label>";
                        echo " <input type='checkbox' class='checkScroll' onchange=''handleCheckboxChange(this)''>";
                        echo "</div>";
                   }
                    ?>

                </div>

            </div>

            <script>


                document.addEventListener("DOMContentLoaded", function () {
                     document.querySelectorAll('.scroll-menu .option');
                });

            </script>

        </div>


        <div class="buttonBottomContainer">
            <form >
                <input class="knopfT1Medium knopf" type="button" name="back" value="Zurück" onclick="back_()">
                <input class="knopfT1Medium knopf"  type="button" name="confirm" value="Ändern">

                <script>

                    function back_  (){

                        window.location.href = "adminpanel.php";
                    }

                </script>
            </form>

        </div>

    </main>


    <footer>

    </footer>

    </body>

    </html>



</main>


<footer>

</footer>

</body>

</html>

