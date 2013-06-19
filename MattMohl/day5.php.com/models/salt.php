<?php

include_once 'models/DBConnector.php';

class Salt {
	function getRandomString($length=20) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()?:"{}_+-=[]|;,./`~';
		$randstring = '';
		for($i=0; $i<$length; $i++) {
			$randstring .= $characters[rand(0, strlen($characters)-1)];
		}
		return $randstring;
	}

	function getUserSalt($userId) {
		$con = new DBConnector();
		$db = $con->connect();
		$statement = $db->prepare('select salt from salt where userId = :userId');
		$statement->execute(array(':userId'=>$userId));
		$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $row) {
			return $row['salt'];
		}
	}
}

?>