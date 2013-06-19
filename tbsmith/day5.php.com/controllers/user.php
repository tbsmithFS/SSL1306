<?php

include_once "models/dbconnector.php";
include_once "models/salt.php";
include_once "models/view.php";
include_once "models/user.php";

class User {

    var $sessionLength = 5; // minutes

    public function dispatch($action='') {

        $usermodel = new User_model();
        if ($action == 'register') {
            $q = $_POST;
            
            // validate form info

            // make sure the user doesn't already exist

            
            $usermodel->addUser($q['username'], $q['email'], $q['password']);

            $this->login($q['username'], $q['password']);        

            $view = new View();
            $view->getView('header');
            $view->getView('loggedIn');
            $view->getView('footer');
        } else if ($action == 'login') {
            $q = $_POST;

            // validate form info
            //
            
            $this->login($q['username'], $q['password']);        

        } else if ($action == 'logout') {
            $this->logout();
        }
        
    }

    public function login($username='', $password='') {
        $con = new DBConnector();
        $db = $con->connect();

        // get userId
        $usermodel = new User_model();
        $userId = $usermodel->getUserId($username);

        if (empty($userId)) {
            $data['username']['msg'] = "No such username";
            $v = new View();
            $v->getView("header");
            $v->getView("login", $data);
            $v->getView("footer");
            exit();
        }

        // get user's salt
        $salter = new Salt();
        $salt = $salter->getUserSalt($userId);

        // get hashed password
        $hashedPassword = $usermodel->getUserPassword($usermodel->getUserId($username));

        // create this hash
        $thisHash = md5($password . $salt);

        #echo "hashed: $hashedPassword<br/>";
        #echo "this: $thisHash<br/>";

        $v = new View();
        if ($hashedPassword == $thisHash) {
            $_SESSION['isLoggedIn'] = True;
            $v->getView('header');
            $v->getView('loggedIn');
            exit();
        } else {
            $data['password']['msg'] = "Bad Password";
            $v->getView('header');
            $v->getView('login', $data);
        }
        $v->getView('footer');
        exit();
        
    }

    public function logout() {

        session_destroy();
        $_SESSION['isLoggedIn'] = False;
        $v = new View();
        $v->getView('header');
        $v->getView('loggedOut');
        $v->getView('footer');

    }

    public function receiveRegisterForm($form=array()) {

        // do form verification here

        $usermodel = new User_model();
        $usermodel->addUser($form['username'], $form['email'], $form['password']);

        $this->login($form['username'], $form['password']);

    }

}

?>
