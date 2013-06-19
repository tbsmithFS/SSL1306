<?php

include_once "models/dbconnector.php";
include_once "models/salt.php";

class User_model {

    public function addUser($username='', $email='', $password='') {

        $con = new DBConnector();
        $db = $con->connect();

        // insert user
        $stmnt = $db->prepare("insert into user (username, email)
            values (:username, :email)");
        $stmnt->execute(array(
            ':username' => $username,
            ':email' => $email));
        
        // get userId
        $userId = $db->lastInsertId(); 

        // create salt
        $salter = new Salt();
        $salt = $salter->getRandomString(20);

        // insert salt
        $stmnt = $db->prepare("insert into salt (userId, salt)
            values (:userId, :salt)");
        $stmnt->execute(array(
            ':userId' => $userId,
            ':salt' => $salt));

        // insert hashed password
        $stmnt = $db->prepare("update user set passwordHash = :passwordHash where userId = :userId");
        $stmnt->execute(array(
            ':passwordHash' => md5($password.$salt),
            ':userId' => $userId));

    }

    public function getUserPassword($userId) {
        $con = new DBConnector();
        $db = $con->connect();

        $stmnt = $db->prepare("select passwordHash from user 
            where userId = :userId");
        $stmnt->execute(array(':userId'=>$userId));
        $rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            return $row['passwordHash'];
        }

    }

    public function getUserId($username='') {
        $con = new DBConnector();
        $db = $con->connect();

        $stmnt = $db->prepare("select userId from user where username = :username");
        $stmnt->execute(array(':username'=>$username));
        $rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            return $row['userId'];
        }
    }

}

?>
