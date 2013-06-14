<?php

	$query = $_GET;
	$action = $query['action'];

	include "models/DBConnector.php";

	header('Content-type: text/html');

	$db = new DBConnector();

	$randomUser = $db->getRandomUser();

	var_dump($randomUser);

	include "views/form.html";

	if($action == new_user_submit) {
		$userData = $_POST;
		$db->addUser($userData['firstname'],
					 $userData['lastname'],
					 $userData['address'],
					 $userData['city'],
					 $userData['state'],
					 $userData['zip'],
					 $userData['phone']);
	}else {
		echo 'non-recognized action ' . $action;
	}

	// $db->addUser('Matt', 'Mohl', '1234 Road Ln', 'Avon', 'OH', '44011', '4404404440');

?>