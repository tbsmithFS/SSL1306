<?php

Class FormBuilder {

    private $validation_data;
    private $form_data;

    function __construct($validation_data = array(), $form_data = array()) {
        $this->validation_data = $validation_data;
        $this->form_data = $form_data;
    }

    function formHeader($action) {
        echo '<form action="'.$action.'" '.
             'enctype="multipart/form-data"
             method="post">' . "\n";
    }

    function formCloser() {
        echo "</form>\n";
    }

    function errorRow($name) {
        echo '<div class="error_row">' . $this->validation_data[$name]['error_message'] . "</div>\n";
    }

    function textInput($name, $password=false) {
        $type = $password ? 'password' : 'text';
        if (!empty($this->validation_data[$name]) && $this->validation_data[$name]['has_error'] == true) {
            $this->errorRow($name);
        }

        if (!empty($this->form_data[$name])) {
            $current_value = $this->form_data[$name];
        } else {
            $current_value = '';
        }

        echo "<div class=\"input_row\">\n" . 
            "<div class=\"input_left\">\n" .
            ucfirst($name) . 
            '</div>' .
            "<div class=\"input_right\">\n" .
            "<input name=\"$name\" type=\"$type\" value=\"" .
                $current_value . "\">" .
            "</div>\n".
            "</div>\n";
    }

    function radio($name, $options) {
        if (!empty($this->validation_data[$name]) && $this->validation_data[$name]['has_error'] == true) {
            $this->errorRow($name);
        }       
        echo "<div class=\"input_row\">\n";
        echo "<div class=\"input_left\">\n";
        echo ucfirst($name) . "\n";
        echo "</div>\n";
        echo "<div class=\"input_right\">\n";
        foreach ($options as $option) {
            if (!empty($this->form_data[$name]) && $this->form_data[$name] == $option) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            echo $option . "<input name=\"$name\" type=\"radio\" $checked value=\"$option\"/>\n";
        }
        echo "</div>\n";
        echo "</div>\n";
    }

    function submit() {
        echo "<div class=\"input_row\">\n";
        echo "<input type=\"submit\">\n";
        echo "</div>\n";
    }

}

?>
