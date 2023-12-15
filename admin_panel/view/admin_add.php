<?php
include "admin_template.html";
include '../controller/validate_input_string.php';
include "../db_handling_adminpanel/db_handling.php";

$frageerfolgreich = false;
if(!empty($_POST)){
       if(validate_string($_POST)){

           if(insert_question($_POST)){
               echo "Frage erfolgreich eingefügt!";}
           else{
               echo "Fehler beim Frage einfügen!";
           }
       }
          else{
           echo "Fehler beim Frage einfügen!";}

}

?>

<main>
    <label id="text"> Neue Frage eintragen: </label>
    <div class="main_container">

        <form id="checkboxForm" name="fragen_form" method="post" action="admin_add.php" onsubmit="return validateForm()">
            <input id="inputQuestionText"  type="text" name="fragetext" onfocus="clearDefault(this,'Bitte geben Sie hier die Fragen ein, die Sie einfügen möchten')" value="Bitte geben Sie hier die Fragen ein, die Sie einfügen möchten">
            <div class = "checkbox-container round-checkbox ">
                <input type="text" value="Antwort 1. eingeben" onfocus="clearDefault(this,'Antwort 1. eingeben')" name="ans1">
                <input   type="checkbox" name="checkbox" value="1">

            </div>

            <div class="checkbox-container round-checkbox ">
                <input type="text" value="Antwort 2. eingeben" onfocus="clearDefault(this,'Antwort 2. eingeben')" name="ans2">
                <input  type="checkbox" name="checkbox" value="2">

            </div>

            <div class="checkbox-container round-checkbox">
                <input type="text" value="Antwort 3. eingeben" onfocus="clearDefault(this,'Antwort 3. eingeben')" name="ans3">
                <input  type="checkbox" name="checkbox" value="3">
            </div>

            <div class="checkbox-container round-checkbox ">
                <input type="text" value="Antwort 4. eingeben" onfocus="clearDefault(this,'Antwort 4. eingeben')" name="ans4">
                <input  type="checkbox" name="checkbox" value="4">
            </div>

            <div id="niv" >
                <select id="niveauDropdown" name="dropdown">
                    <option value="1">Niveau 1</option>
                    <option value="2">Niveau 2</option>
                    <option value="3">Niveau 3</option>
                </select>

                <script>
                    /**
                     * Listener der verhindert, dass mehrere Checkboxen angewählt sind.
                     */
                    document.addEventListener("DOMContentLoaded", function () {
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

                    /**
                     * Einfache Funktion die jede Checkbox überprüft, ob die eine Checkbox nicht
                     * angeklickt wurde.
                     * @returns {boolean}, true wenn eine gechecked ist, false keine gechecked
                     */
                    function validateForm() {
                        const checkboxes = document.querySelectorAll('#checkboxForm input[type="checkbox"]');
                        let isChecked = false;

                        checkboxes.forEach(function (checkbox) {
                            if (checkbox.checked) {
                                isChecked = true;
                            }
                        });

                        if (!isChecked) {
                            alert("Bitte wählen Sie mindestens eine Checkbox aus.");
                            return false;
                        }

                        return true;
                    }

                    /**
                     *
                     *@param input das HTML Element, wo der Value-Default Text ausgeblendet werden soll,
                     * wenn der User draufklickt.
                     * @param placeholder String von HTML Element zur überprüfung.
                     */
                    function clearDefault(input, placeholder) {
                        if (input.value === placeholder) {
                            input.value = "";
                        }
                    }
                    src="script.js";
                </script>

            </div>

    </div>


         <div class="buttonBottomContainer">
             <input class="knopfT2GrossAuswahl knopf" type="button" name="back" value="Zurück" onclick=" back_('adminpanel.php')" >
             <input class="knopfT2GrossAuswahl knopf"  type="submit" name="confirm" value="Eintragen" >


         </div>
    </form>

</main>

<footer>

</footer>

</body>

</html>

