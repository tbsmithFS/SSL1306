<?php

class User {

    function dispatch($query) {

            if (empty($query['action'])) {
                $action = 'show_register_form';
            } else {
                $action = $query['action'];
            }

            if ($action == 'show_register_form') {
                $this->show_register_form();
            } else if ($action == 'perform_register') {
                $validation_data = $this->perform_register($_POST);
                if ($validation_data['successful'] == true) {
                    $this->show_success_page();
                } else {
                    $this->show_register_form($_POST, $validation_data);
                }
            } else {
                echo "Didn't recognize the action " . $action;
            }
    }

    function show_register_form($form_data=array(), $validation_data=array()) {
        require_once "views/register.php";
    }

    function perform_register($form_data) {
        require_once "views/helpers/form_validator.php";
        $form_validator = new FormValidator();
        $validation_data = $form_validator->validate($form_data);
        return $validation_data;
    }

    function show_success_page() {
        require_once "views/register_success.php";
    }

}

?>
