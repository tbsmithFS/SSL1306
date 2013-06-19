<?php

include_once 'models/DBConnector.php';
include_once 'models/salt.php';
include_once 'models/view.php';
include_once 'models/user.php';

class User {
	var $sessionLength = 5;

	public function dispatch($action='') {
		$user_m = new User_m();
		if($action =='register') {
			$q = $_POST;

			$con = new DBConnector();
			$db = $con->connect();

			$user_m->addUser($q['username'], $q['email'], $q['password']);

			$this->login($q['username'], $q['password']);

			$v = new View();
			$v->getView('header');
			$v->getView('userhome');
			$v->getView('footer');
		}else if($action == 'login') {
			$q = $_POST;

			$this->login($q['username'], $q['password']);
		}else if($action == 'logout') {
			$this->logout();
		}
	}

	public function login($username='', $password='') {
		$con = new DBConnector();
		$db = $con->connect();

		$user_m = new User_m();
		$userId = $user_m->getUserId($username);

		if(empty($userId)) {
			$data['username']['msg'] = 'No such username';
			$v = new View();
			$v->getView('header');
			$v->getView('login', $data);
			$v->getView('footer');
			exit();
		}

		$salter = new Salt();
		$salt = $salter->getUserSalt($userId);

		$hashedPassword = $user_m->getUserPassword($user_m->getUserId($username));

		$thisHash = md5($password . $salt);

		$v = new View();
		if($hashedPassword == $thisHash) {
			$_SESSION['isLoggedIn'] = True;
			$v->getView('header');
			$v->getView('userhome');
			exit();
		}else {
			$data['password']['msg'] = 'Bad password';
			$v->getView('header');
			$v->getView('login', data);
		}

		$v->getView('footer');
		exit();
	}

	public function logout() {
		session_destroy();
		$_SESSION['isLoggedIn'] = False;
		$v = new View();
		$v->getView('header');
		$v->getView('homepage');
		$v->getVeiw('footer');
	}

	public function recieveRegisterForm($form=array()) {
		$user_m = new User_model();
		$user_m->addUser($form['username'], $form['email'], $form['password']);

		$this->login($form['username'], $form['password']);
	}
}

?>