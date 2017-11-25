<?php
switch ($routes[2]) {
    case "app":
        include(dirname(__FILE__) . '/app.php');
        break;    
    case "":
        $title = 'Крупные тендеры';
        include($_SERVER['DOCUMENT_ROOT'] . "/core/view/pages/header.php");

        include(dirname(__FILE__)  . "/../view/index.html");
        include($_SERVER['DOCUMENT_ROOT'] . "/core/view/pages/footer.php");

        if (isset($myFuter)){
            echo $myFuter;
        }
        break;

    default:
        not_found::show();
        break;
}
