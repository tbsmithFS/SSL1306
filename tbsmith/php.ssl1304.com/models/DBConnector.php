<?php

class DBConnector {

    public $db;

    function __construct() {
        $host = '127.0.0.1';
        $user = 'root';
        $pass = 'root';
        $port = '3306';
        $dbname = 'fakeUsers';
        $this->db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    }

    public function getRandomUser() {
        $stmnt = $this->db->query("select * from address order by rand() limit 1");
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($firstname='', $lastname='', $address='', $city='', $state='', $zip='', $phone='') {
        $stmnt = $this->db->prepare("insert into address (firstname, lastname, address, city, state, zip, phone) values (:firstname, :lastname, :address, :city, :state, :zip, :phone)");
        $stmnt->execute(array(
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':phone' => $phone,
            ':zip' => $zip));
    }

?>
