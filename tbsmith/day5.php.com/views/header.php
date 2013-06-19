<html>
<body>
Website title<br/>
<?php

if (empty($_SESSION)) {
    $loggedIn = False;
} else if (empty($_SESSION['isLoggedIn'])) {
    $loggedIn = False;
} else if ($_SESSION['isLoggedIn'] == True) {
    $loggedIn = True;
} else {
    $loggedIn = False;
}

if ($loggedIn == True) {
    echo "You are logged in. <a href=\"/user/logout\">Click here</a> to log out";
} else {
    echo "You are not logged in.";
}

?>

<hr>

