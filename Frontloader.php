<?php

function routeRequest(){


    $url =$_SERVER['REQUEST_URI'];


    if (strpos($url, '/adminpanel/') !== false){
        header('Location:/admin_panel/view/adminpanel.php');

    }else{
        header('Location:/index.html');
    }


}
routeRequest();
