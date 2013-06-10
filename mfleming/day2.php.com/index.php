<?php
	
	if (empty($_GET["controller"])) {
		$con = "home";
	} else {
		$con = $_GET["controller"];
	}
	
	if ($con == "home") {
		include "controllers/home.php";
		$controller = new Home();
		$controller->dispatch($_GET);
	} else if ($con == "user") {
		include "controllers/user.php";
		$controller = new User();
		$controller->dispatch($_GET);	
	} else {
		include "controllers/home.php";
		$controller = new Home();
		$controller->dispatch($_GET);
	}
	
?>