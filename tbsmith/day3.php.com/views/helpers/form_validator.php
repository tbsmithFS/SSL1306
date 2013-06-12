<?php

Class FormValidator {

    function validate($query) {

        $data['successful'] = true;

        // name
        if (!preg_match('/^[a-zA-Z ]+$/', $query['name'])) {
            $data['successful'] = false;
            $data['name']['has_error'] = true;
            $data['name']['error_message'] = "Name must contain only letters and spaces.";
        }   

        // email
        if (!preg_match('/^\w+@\w+\.\w+$/', $query['email'])) {
            $data['successful'] = false;
            $data['email']['has_error'] = true;
            $data['email']['error_message'] = "Email address must look like user@example.com.";
        }   

        // verify email
        if ($query['email'] != $query['verifyemail']) {
            $data['successful'] = false;
            $data['verifyemail']['has_error'] = true;
            $data['verifyemail']['error_message'] = "The email addresses did not match.";
        }   
        
        // password
        if (strlen($query['password']) < 8) {
            $data['successful'] = false;
            $data['password']['has_error'] = true;
            $data['password']['error_message'] = "The password must be at least 8 characters long.";
        }   

        //rating
        if (empty($query['rating'])) {
            $data['successful'] = false;
            $data['rating']['has_error'] = true;
            $data['rating']['error_message'] = "Rating must be set.";
        }   
    
        //fav number
        if (!preg_match('/^[0-9]+$/', $query['favNumber'])) {
            $data['successful'] = false;
            $data['favNumber']['has_error'] = true;
            $data['favNumber']['error_message'] = "Favnumber must be an integer.";
        }   

        return $data;

    }   

}

?>
