<?php
include "admin_template.html";
var_dump($$_POST);
?>


<main>
    <label  id="text"> Bestehende Frage ändern: </label>
    <div class="main_container">
        <form id="checkboxForm">

            <div class="questionHeader">

                <input class="inputField" id="inputQuestionText" type="text" name="" value="Bitte geben Sie hier die Fragen ein, die Sie einfügen möchten">
            </div>

            <div class = "checkbox-container ">
                <input type="text" value="Antwort 1. eingeben">
                <input class="check" type="checkbox">
            </div>

            <div class="checkbox-container ">
                <input type="text" value="Antwort 2. eingeben">
                <input class="check" type="checkbox">

            </div>

            <div class="checkbox-container ">
                <input type="text" value="Antwort 3. eingeben">
                <input class="check" type="checkbox">
            </div>

            <div class="checkbox-container ">
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
            <input class="knopfT2GrossAuswahl knopf" type="button" name="back" value="Zurück" onclick=" bacK_to_change_overview()" >
            <input class="knopfT2GrossAuswahl knopf"  type="button" name="confirm" value="Ändern" onclick=" redirectToAdminPanel()">

            <script>

                function  bacK_to_change_overview() {
                    window.location.href = "admin_change_overview.php";
                }
            </script>
        </form>

    </div>


</main>





<footer>

</footer>

</body>

</html>


