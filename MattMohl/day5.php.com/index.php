<?php

session_start();

include_once 'controllers/home.php';
include_once 'controllers/user.php';

$q = $_GET;

if(empty($q['controller'])) {
	$con = 'home';
}else {
	$con = $q['controller'];
}

if(empty($q['action'])) {
	$action = 'homepage';
}else {
	$action = $q['action'];
}

var_dump($action);

if($con == 'home') {
	$home = new Home();
	$home->dispatch($action);
}else if($con == 'user') {
	$user = new User();
	$user->dispatch($action);
}

?>