<?php
	
	require_once "models/view.php";
	
	class Home {
	
		function dispatch($query = "") {
			if (empty($query["action"])) {
				$action = "home";
			} else {
				$action = $query["action"];
			}
		
			$v = new View();
			$v->printHeader();
			
			$data = array(
				"username" => "Guest",
				"controller" => "home"
			);
			
			
			$v->getView("header", $data);
			
			if ($action == "home") {
				$v->getView("home", $data);
			} else if ($action == "aboutUs") {
				$v->getView("about", $data);
			} else {
				$v->getView("home", $data);
			}
			
			$v->getView("sidebar", $data);
			$v->getView("footer", $data);
	
		}
	}
	
?>