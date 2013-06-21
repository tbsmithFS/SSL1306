<?php

include_once "models/view.php";
include_once "models/DBConnector.php";

class API {
	function dispatch($action='') {
		if($action != '') {
			if($action == 'homepage'
			|| $action == 'results') {
				$v = new View();
				$v->printHeader();
				$v->getView($action);
			}else if($action == 'random') {
				$db = new DBConnector();
				$db->connect();
				$db->getRandomUser();
			}else if($action == 'advanced') {
				$q = $_POST;

				$db= new DBConnector();
				$db->connect();
				$db->get($q['searchField'], $q['searchTerm']);
			}
		}
	}
}

?>