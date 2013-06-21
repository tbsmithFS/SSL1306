<?php

include_once 'controllers/api.php';

$q = $_GET;

if(empty($q['controller'])) {
	$con = 'api';
}else {
	$con = $q['controller'];
}

if(empty($q['action'])) {
	$action = 'homepage';
}else {
	$action = $q['action'];
};

if($con == 'api') {
	$api = new API();
	$api->dispatch($action);
}else {
	echo "didn't recognize controller: " . $controller;
}

?>