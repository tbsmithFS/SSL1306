<?php

class DBConnector {

	public function connect() {
		$host = '127.0.0.1';
		$user = 'root';
		$pass = 'root';
		$port = '8889';
		$dbname = 'secretUsers';

		return new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);
	}
}

?>