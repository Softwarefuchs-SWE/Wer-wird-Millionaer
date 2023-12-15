<?php
<<<<<<< Updated upstream
include "admin_template.html";
include "..\db_handling_adminpanel\db_handling.php";
$fragen = get_question_label();
=======
include "../db_handling_adminpanel/db_handling.php";
session_start();
$_SESSION['question_id']=2;
$_SESSION['admin_check'] = true;
>>>>>>> Stashed changes

if($_SESSION['admin_check']===false){
    header("Location: /Wer-wird-Millionaer/admin_panel/view/no_authorization.php");
    exit;
}
$fragen = get_question_label();
include "admin_template.html";
?>

<main>

     <div class="main_container">
         <input  class="knopfT1Klein knopf " type="button" value="Frage hinzufügen" onclick="callAddPanel()">
         <input class="knopfT1Klein knopf" type="button" value="Frage löschen" onclick="callDeletePanel()">
         <input class="knopfT1Klein knopf" type="button" value="Frage ändern" onclick="callChangePanel()">
     </div>

       <script>
           function callDeletePanel(){
                window.location.href="admin_löschen.php";
           }
           function callChangePanel(){
               window.location.href="admin_change_overview.php";
           }
           function callAddPanel(){
               window.location.href="admin_add.php";
           }


       </script>


</main>

<footer>

</footer>

</body>

</html>
