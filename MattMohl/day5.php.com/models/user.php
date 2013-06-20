<?php

class User_m {
	public function adduser($username='', $email='', $password='') {
		$con = new DBConnector();
		$db = $con->connect();

		var_dump($username, $email, $password);

		$statement = $db->prepare('insert into users(username, email) values(:username, :email)');
		$statement->execute(array(
			':username'=>$username,
			':email'=>$email));

		$userId = $db->lastInsertId();

		$salter = new Salt();
		$salt = $salter->getRandomString(20);

		$statement = $db->prepare('insert into salt(userId, salt) values(:userId, :salt)');
		$statement->execute(array(
			':userId'=>$userId,
			':salt'=>$salt));

		$statement = $db->prepare('update users set passwordHash = :passwordHash where userId = :userId');
		$statement->execute(array(
			':passwordHash'=>md5($password.$salt),
			':userId'=>$userId));
	}

	public function getUserPassword($userId) {
		$con = new DBConnector();
		$db = $con->connect();

		$statement = $db->prepare('select passwordHash from users where userId = :userId');
		$statement->execute(array(':userId'=>$userId));
		$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $row) {
			return $row['passwordHash'];
		}
	}

	public function getUserId($username='') {
		$con = new DBConnector();
		$db = $con->connect();

		$statement = $db->prepare('select userId from users where username = :username');
		$statement->execute(array(':username'=>$username));
		$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $row) {
			return $row['userId'];
		}
	}
}

?>