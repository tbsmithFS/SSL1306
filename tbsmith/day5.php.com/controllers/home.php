<?php

include_once "models/view.php";

class Home {
    function dispatch($action) {

        if ($action == 'homepage' 
            || $action == 'login' 
            || $action == 'register'
            || $action == 'loggedOut' 
            || $action == 'secret' 
        ) {

            $v = new View();
            $v->getView('header');
            $v->getView($action);
            $v->getView('footer');
        }

    }
}
?>
