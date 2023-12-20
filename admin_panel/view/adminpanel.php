<?php
include "admin_template.html";
include "..\db_handling_adminpanel\db_handling.php";
$fragen = get_question_label();

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
