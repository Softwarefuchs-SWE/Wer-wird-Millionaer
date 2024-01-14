<?php
include "admin_template.html";
include "../db_handling_adminpanel/db_handling.php";

$fragen = get_question_full();
session_start();
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
                        echo "<input type='checkbox' class='checkScroll' name='checkboxes[]' value='" . $item['ID'] . "'>";
                        echo "</div>";

                    }
                    ?>

                </div>

            </div>



        </div>

           <div  class="buttonBottomContainer">
            <input class="knopfT2GrossAuswahl knopf" type="button" name="back" value="Zurück" onclick="back_('adminpanel.php')">
            <input class="knopfT2GrossAuswahl knopf"  type="submit" name="confirm" value="Ändern" >
           </div>
               </form>

        <script>
            /**
             * Fügt das Scrollmenü ein und überprüft per Event-listener, ob keine Checkboxen angewählten wurden.
             *
             */
            document.addEventListener("DOMContentLoaded", function () {
                const checkboxes = document.querySelectorAll('.scroll-menu .option input[type="checkbox"]');
                const checkboxArray = Array.from(checkboxes);

                checkboxArray.forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        handleCheckboxChange(this, checkboxArray);
                    });
                });

                const form = document.querySelector('form[name="checkboxes"]');
                form.addEventListener('submit', function (event) {
                    if (!isAnyCheckboxSelected(checkboxArray)) {
                        alert("Bitte wählen Sie mindestens eine Checkbox aus.");
                        event.preventDefault(); // Verhindert das Absenden des Formulars
                    }
                });
            });

            function handleCheckboxChange(checkbox, checkboxes) {
                if (checkbox.checked) {
                    checkboxes.forEach(function (otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            }ü

            function isAnyCheckboxSelected(checkboxArray) {
                return checkboxArray.some(function (checkbox) {
                    return checkbox.checked;
                });
            }

            src="script.js";

            </script>


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