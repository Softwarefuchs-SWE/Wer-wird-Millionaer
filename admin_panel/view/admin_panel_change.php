<?php
include "admin_template.html";
include "C:\Users\herrd\OneDrive\Repository_Dennis\Taschenrechner2\Wer-wird-Millionaer\admin_panel\db_handling_adminpanel\db_handling.php";

  if(!empty($_POST['checkboxes'][0])){
      $question= get_question_by_id($_POST['checkboxes'][0]);
  }
  $fragentext = isset($_POST['checkboxes'][0]) ? $question[0]['Frage'] : "Sie müssen eine Frage auswählen";
  $ans1 =  isset($_POST['checkboxes'][0]) ? $question[0]['Antwort_1'] : "Sie müssen eine Frage auswählen";
  $ans2 =  isset($_POST['checkboxes'][0]) ? $question[0]['Antwort_2'] : "Sie müssen eine Frage auswählen";
  $ans3 =  isset($_POST['checkboxes'][0]) ? $question[0]['Antwort_3'] : "Sie müssen eine Frage auswählen";
  $ans4 =  isset($_POST['checkboxes'][0]) ? $question[0]['Antwort_4'] : "Sie müssen eine Frage auswählen";


?>


<main>
    <label  id="text"> Bestehende Frage ändern: </label>
    <div class="main_container">
        <form id="checkboxForm" action="admin_panel_change.php" method="post">

            <div class="questionHeader">

                <input id="inputQuestionText" type="text" name="" value="<?php echo $fragentext?>" style="word-wrap: break-word;">
            </div>

            <div class = "checkbox-container ">
                <input type="text" value="<?php echo $ans1?>">
                <input class="check" type="checkbox" name="checkbox[]" value="1">
            </div>

            <div class="checkbox-container ">
                <input type="text" value="<?php echo $ans2?>">
                <input class="check" type="checkbox" name="checkbox[]"  value="2">

            </div>

            <div class="checkbox-container ">
                <input type="text" value="<?php echo $ans3?>">
                <input class="check" type="checkbox" name="checkbox[]" value="3">
            </div>

            <div class="checkbox-container ">
                <input type="text" value="<?php echo $ans4?>">
                <input class="check" type="checkbox" name="checkbox[]" value="4">
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

    </div>

    <div class="buttonBottomContainer">

            <input class="knopfT2GrossAuswahl knopf" type="button" name="back" value="Zurück" onclick=" bacK_to_change_overview()" >
            <input class="knopfT2GrossAuswahl knopf"  type="submit" name="confirm" value="Ändern" >

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


