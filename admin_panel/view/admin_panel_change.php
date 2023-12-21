<?php
include '../controller/admin_change_controller.php';
include "admin_template.html";
include '../db_handling_adminpanel/db_handling.php';

$controller = new admin_change_controller();
$id =-1;
if(!empty($_POST['checkboxes'][0])){
    $controller->setId($_POST['checkboxes'][0]);
    $question = $controller->getQuestion();
     $id = $_POST['checkboxes'][0];
}

if(!empty($_POST['confirm_change_panel'])){
     $id = $_POST['id'];
     $controller->setId($_POST['id']);
     $update = $_POST;
     var_dump($update);
     $question = $controller->getQuestion();

    if($controller->insert_change_question($update,$id)){
        echo "Update erfolgreich!";
        $question = get_question_by_id($id);
    }

}

  $fragentext =  $question[0]['Frage'];
  $ans1 =  $question[0]['Antwort_1'] ;
  $ans2 =  $question[0]['Antwort_2'] ;
  $ans3 =   $question[0]['Antwort_3'] ;
  $ans4 =   $question[0]['Antwort_4'] ;


?>


<main>
    <label  id="text"> Bestehende Frage ändern: </label>
    <div class="main_container">
        <form id="checkboxForm" action="admin_panel_change.php" method="post" onsubmit="return validateForm()">

            <div class="questionHeader">

                <input id="inputQuestionText" type="text" name="frage" value="<?php echo $fragentext?>" style="word-wrap: break-word;">
            </div>

            <div class = "checkbox-container ">
                <input type="text" value="<?php echo $ans1?>" name="ans1">
                <input class="check" type="checkbox" name="checkbox" value="1">
            </div>

            <div class="checkbox-container ">
                <input type="text" value="<?php echo $ans2?>" name="ans2">
                <input class="check" type="checkbox" name="checkbox"  value="2">

            </div>

            <div class="checkbox-container ">
                <input type="text" value="<?php echo $ans3?>" name="ans3">
                <input class="check" type="checkbox" name="checkbox" value="3">
            </div>

            <div class="checkbox-container ">
                <input type="text" value="<?php echo $ans4?>" name="ans4">
                <input class="check" type="checkbox" name="checkbox" value="4">
            </div>

            <div id="niv" >
                <select id="niveauDropdown" name="dropdown">
                    <option value="1">Niveau 1</option>
                    <option value="2">Niveau 2</option>
                    <option value="3">Niveau 3</option>
                </select>

                <script>

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
                </script>


            </div>

    </div>

    <div class="buttonBottomContainer">
             <input type="hidden" name="id" value="<?php echo $id?>">
            <input class="knopfT2GrossAuswahl knopf" type="button" name="back" value="Zurück" onclick=" bacK_to_change_overview()" >
            <input class="knopfT2GrossAuswahl knopf"  type="submit" name="confirm_change_panel" value="Ändern"  >

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


