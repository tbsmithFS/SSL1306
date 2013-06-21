<?php

include_once 'models/view.php';
$view = new View();

if(empty($_SESSION)
   || !empty($_SESSION)
   && !empty($_SESSION['isLoggedIn'])
   && $_SESSION['isLoggedIn'] == False
) {
	$view->getView('homepage');
	$view->getView('footer');
	exit();
} else if($_SESSION['isLoggedIn'] == True) {
	// nothing
}

?>