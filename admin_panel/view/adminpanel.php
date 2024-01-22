<?php
include "admin_template.html";
include "../db_handling_adminpanel/db_handling.php";
$fragen = get_question_label();
session_start();
$_SESSION['question_id']=2;
$_SESSION['admin_check'] = true;

if($_SESSION['admin_check']===false){
    header("Location: /Wer-wird-Millionaer/admin_panel/view/no_authorization.php");
    exit;
}
$fragen = get_question_label();

?>

<main>

     <div class="main_container">
         <input  class="knopfT1Klein knopf " type="button" value="Frage hinzufügen" onclick="callAddPanel()">
         <input class="knopfT1Klein knopf" type="button" value="Frage löschen" onclick="callDeletePanel()">
         <input class="knopfT1Klein knopf" type="button" value="Frage ändern" onclick="callChangePanel()">
         <input class="knopfT1Klein knopf" type="button" value="Zurück" onclick="back_login()">
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
           function back_login(){
               window.location.href= "/Login_registrierung/Login/Login&Registrierung&Passwort_zurücksetzen/Login.php";
           }



       </script>


</main>

<footer>

</footer>

</body>

</html>
