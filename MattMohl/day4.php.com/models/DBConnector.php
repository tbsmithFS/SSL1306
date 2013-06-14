<?php

	class DBConnector {

		public $db;

		function __construct() {
			$host = '127.0.0.1';
			$user = 'root';
			$pass = 'root';
			$port = '8889';
			$dbname = 'fakeUsers';
			$this->db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
		}

		public function getRandomUser() {
			$id = rand(58246, 1182386);
			$statement = $this->db->prepare("select * from address where id = :id");
			$statement->execute(array(
				':id' => $id));
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}

		public function addUser($firstname='',
								$lastname='',
								$address='',
								$city='',
								$state='',
								$zip='',
								$phone='') {

			if($firstname!='' && $lastname!='' && $address!='' && $city!='' && $state!='' && $zip!='' && $phone!='') {

				$statement = $this->db->prepare('insert into address(firstname, lastname, address, city, state, zip, phone) values (:firstname, :lastname, :address, :city, :state, :zip, :phone)');

				$statement->execute(array(
					':firstname' => $firstname,
					':lastname'  => $lastname,
					':address'   => $address,
					':city'      => $city,
					':state'     => $state,
					':zip'       => $zip,
					':phone'     => $phone));

				echo 'NEW USER CREATED';
			}else {
				echo 'INVALID USER DATA';
			}
		}
	}

?>