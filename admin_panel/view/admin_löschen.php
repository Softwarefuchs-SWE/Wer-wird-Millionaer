<?php
include "admin_template.html";
include "C:\Users\herrd\OneDrive\Repository_Dennis\Taschenrechner2\Wer-wird-Millionaer\admin_panel\db_handling_adminpanel\db_handling.php";
$fragen = get_question_full();

if (!empty($_POST)) {

    $id = $_POST['checkboxes'][0];
    if (delete_by_id($id)) {
        echo "Löschen erfolgreich!";
        $fragen = get_question_full();
    } else {
        echo "Fehler beim Löschen!";
    }
}


?>


<main>
    <label id="text"> Wählen Sie eine Frage zum Löschen aus </label>

    <div class="main_container">

        <form method="post" action="admin_löschen.php" name="form_delete">
            <div class="scroll-menu">

                <div class="options round-checkbox">
                    <?php

                    foreach ($fragen as $value => $item) {

                        echo "<div class='option'>";
                        echo "<label class='labelQuestion'>" . $item['Frage'] . "</label>";
                        echo "<input type='checkbox' class='checkScroll' name='checkboxes[]' value='" . $item['id'] . "'>";
                        echo "</div>";

                    }
                    ?>

                </div>

            </div>


    </div>

    <div class="buttonBottomContainer">
        <input class="knopfT2GrossAuswahl knopf" type="button" name="back" value="Zurück" onclick="back_()">
        <input class="knopfT2GrossAuswahl knopf " type="submit" name="confirm" value="Löschen">
    </div>
    </form>


</main>

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

        const form = document.querySelector('form[name="form_delete"]');
        form.addEventListener('submit', function (event) {
            if (!isAnyCheckboxSelected(checkboxArray)) {
                console.log("Fehler!")
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
    }

    function isAnyCheckboxSelected(checkboxArray) {
        return checkboxArray.some(function (checkbox) {
            return checkbox.checked;
        });
    }

    function back_  (){

        window.location.href = "adminpanel.php";
    }


    function back_() {
        window.location.href = "adminpanel.php";
    }

</script>

<footer>

</footer>

</body>

</html>

