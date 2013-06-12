<?php

include "models/DBConnector.php";

header('Content-type: text/html');

$db = new DBConnector();

$result = $db->getRandomUser();

var_dump($result);

$db->addUser("joe", "smith", "123 main ave", "Orlando", "FL", "32825", "234-123-4231");

?>
