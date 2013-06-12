<?php

$query = $_GET;

header('Content-type: text/html');

if (empty($query['controller'])) {
    $con = 'user';
} else {
    $con = $query['controller'];
}

if ($con == 'user') {
    include "controllers/user.php";
    $user = new User();
    $user->dispatch($query);
} else {
    echo "Didn't recognize the controller " . $con;
}

?>
