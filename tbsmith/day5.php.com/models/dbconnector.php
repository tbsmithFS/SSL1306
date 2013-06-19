<?php

class DBConnector {

    public function connect() {
        $host = '127.0.0.1';
        $user = 'root';
        $pass = 'root';
        $port = '3306';
        $dbname = 'SSLusers';

        return new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    }

}

?>
