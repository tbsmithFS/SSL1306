<?php
	
	require_once "models/view.php";
	
	class User {
	
		function dispatch($query = "") {
			if (empty($query["action"])) {
				$action = "home";
			} else {
				$action = $query["action"];
			}
		
			$v = new View();
			$v->printHeader();
			
			$data = array(
				"username" => "Joe",
				"controller" => "user"
			);
			
			
			$v->getView("header", $data);
			
			if ($action == "home") {
				$v->getView("user_home", $data);
			} else if ($action == "changePassword") {
				$v->getView("change_password", $data);
			} else {
				$v->getView("user_home", $data);
			}
			
			$v->getView("sidebar", $data);
			$v->getView("footer", $data);
	
		}
	}
	
?>