<?php
include "admin_template.html";
include "C:\Users\herrd\OneDrive\Repository_Dennis\Taschenrechner2\Wer-wird-Millionaer\admin_panel\db_handling_adminpanel\db_handling.php";
$fragen = get_question_full();

?>


<main>

    <main>
        <label id="text"> Bitte wählen Sie eine Fragen zum ändern aus: </label>
        <div class="main_container">
            <form name='checkboxes' method='post' action="admin_panel_change.php">
            <div class="scroll-menu">

                <div class="options">


                    <?php

                    foreach ($fragen as  $value => $item) {

                        echo "<div class=' round-checkbox option'>";
                        echo "<label class='labelQuestion'>" . $item['Frage'] . "</label>";
                        echo "<input type='checkbox' class='checkScroll' value='" . $item['id'] . "'>";

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



           <div  class="buttonBottomContainer">
            <input class="knopfT2GrossAuswahl knopf" type="button" name="back" value="Zurück" onclick="back_()">
            <input class="knopfT2GrossAuswahl knopf"  type="submit" name="confirm" value="Ändern" >
            <script>

                function back_  (){

                    window.location.href = "adminpanel.php";
                }

            </script></div>
        </form>


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