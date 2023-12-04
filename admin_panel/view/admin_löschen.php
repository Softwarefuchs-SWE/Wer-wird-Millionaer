<?php
include "admin_template.html";

include "C:\Users\herrd\OneDrive\Repository_Dennis\Taschenrechner2\Wer-wird-Millionaer\admin_panel\db_handling_adminpanel\db_handling.php";
$fragen = get_question_label();


?>



<main>
    <label id="text"> Wählen Sie eine Frage zum Löschen aus </label>

    <div class="main_container">


        <div class="scroll-menu">

            <div class="options round-checkbox">
                <?php

                foreach($fragen as $value => $item){

                    echo "<div class='option'>";
                    echo "<label class='labelQuestion'>" . $item['Frage'] . "</label>";
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

