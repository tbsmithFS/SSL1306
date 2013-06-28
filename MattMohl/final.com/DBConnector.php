<?php

class DBConnector {
	public $db;

	public function __construct() {
		$host = '127.0.0.1';
		$user = 'root';
		$pass = 'root';
		$port = '8889';
		$dbname = 'translationResults';

		$this->db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);
	}

	public function addData($word, $transWord, $def, $transLanguage) {
		$statement = $this->db->prepare("insert into result (word, transWord, definition, transLanguage) values(:word, :transWord, :def, :transLanguage)");
		$statement->execute(array(
			':word'=>$word,
			':transWord'=>$transWord,
			':def'=>$def,
			':transLanguage'=>$transLanguage));


	}
}

?>