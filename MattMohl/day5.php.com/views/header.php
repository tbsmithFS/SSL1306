<html>
<body>
	<h2>PHP Sessions</h2>

<?php

if(empty($_SESSION)) {
	$isLgdIn = False;
}else if(empty($_SESSION['isLoggedIn'])) {
	$isLgdIn = False;
}else if($_SESSION['isLoggedIn'] == True) {
	$isLgdIn = True;
}else {
	$isLgdIn = False;
}

if($isLgdIn == True) {
	echo "You are logged in. <a href=\"?controller=user&action=logout\">Logout</a>";
}else {
	echo "You are not logged in.";
}

?>

<hr>