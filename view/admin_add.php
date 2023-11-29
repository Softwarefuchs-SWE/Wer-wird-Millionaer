<?php
include "admin_template.html"

?>

<main>

    <div class="buttons">

        <div class="questionHeader">
        <label class="inputField" id="text"> Neue Frage eintragen: </label>
        <input class="inputField" id="inputQuestionText" type="text" name="" value="Bitte geben Sie hier die Fragen ein, die Sie einfügen möchten">
        </div>

        <form id="checkboxForm">

            <div class = "checkbox-container inputField">
                <input type="text" value="Antwort 1. eingeben">
                <input class="check" type="checkbox">
            </div>

            <div class="checkbox-container inputField">
                <input type="text" value="Antwort 2. eingeben">
                <input class="check" type="checkbox">

            </div>

            <div class="checkbox-container inputField">
                <input type="text" value="Antwort 3. eingeben">
                <input class="check" type="checkbox">
            </div>

            <div class="checkbox-container inputField">
                <input type="text" value="Antwort 4. eingeben">
                <input class="check" type="checkbox">
            </div>

            <div id="niv" >
                <select id="niveauDropdown" name="fragen">
                    <option value="frage1">Niveau 1</option>
                    <option value="frage2">Niveau 2</option>
                    <option value="frage3">Niveau 3</option>
                </select>

                <script> document.addEventListener("DOMContentLoaded", function () {
                        const checkboxes = document.querySelectorAll('#checkboxForm input[type="checkbox"]');

                        checkboxes.forEach(function (checkbox) {
                            checkbox.addEventListener('change', function () {
                                if (this.checked) {
                                    // Wenn eine Checkbox ausgewählt wurde, deaktiviere die anderen
                                    checkboxes.forEach(function (otherCheckbox) {
                                        if (otherCheckbox !== checkbox) {
                                            otherCheckbox.checked = false;
                                        }
                                    });
                                }
                            });
                        });
                    });
                </script>


            </div>
        </form>
    </div>

     <div class="buttonBottomContainer">
         <form >
             <input class="knopfT1Medium knopf" type="button" name="back" value="Zurück" onclick=" redirectToAdminPanel()" >
             <input class="knopfT1Medium knopf"  type="button" name="confirm" value="Eintragen" onclick=" redirectToAdminPanel()">

             <script>

                 function  redirectToAdminPanel() {
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

