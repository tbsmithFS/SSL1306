<?php

class DBConnector {

	public $db;

	public function connect() {
		$host = '127.0.0.1';
		$user = 'root';
		$pass = 'root';
		$port = '8889';
		$dbname = 'fakeUsers';

		$this->db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);
	}

	function getRandomUser() {
		$id = rand(58246, 1182386);
		$statement = $this->db->prepare("select * from address where id=:id");
		$statement->execute(array(
			':id' => $id));

		$json = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo "ENCODED: <br/>";
		var_dump(json_encode($json));
	}

	public function get($field='', $term='') {
		if($field != '' && $term != '') {
			var_dump($field);
			echo '<br>';
			var_dump($term);
			if($field == 'firstname' || 'lastname' || 'city' || 'state' || 'phone') {
				$term = strtoupper($term);
				$statement = $this->db->prepare("select * from address where ".$field."="."'".$term."'");
			}else if($field == 'address') {
				$statement = $this->db->prepare("select * from address where ".$field."="."'".$term."'");
			}else {
				$statement = $this->db->prepare("select * from address where ".$field."=".$term);
			}

			$statement->execute();

			$json = $statement->fetchAll(PDO::FETCH_ASSOC);
			echo "<br><h3>ENCODED:</h3> <br/>";
			var_dump(json_encode($json));
		}
	}
}

?>