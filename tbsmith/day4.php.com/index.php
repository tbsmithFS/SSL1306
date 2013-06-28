<?php

include "models/DBConnector.php";

header('Content-type: text/html');

$db = new DBConnector();

$result = $db->getRandomUser();

var_dump($result);

$db->addUser("25243t2t4", "qqqqqq", "999999 wrgsrg ave", "Orlando", "FL", "82321", "234-123-4231");

?>
