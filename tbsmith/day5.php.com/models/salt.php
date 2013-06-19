<?php

include_once "models/dbconnector.php";

class Salt {

    function getRandomString($length=20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFG'.
            'HIJKLMNOPQRSTUVWXYZ!@#$%^&*()?:"{}_+-=[]|;,./`~';
        $randstring = '';
        for ($i=0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }

    function getUserSalt($userId) {
        $con = new DBConnector();
        $db = $con->connect();
        $stmnt = $db->prepare("select salt from salt where userId = :userId");
        $stmnt->execute(array(':userId'=>$userId));
        $rows = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            return $row['salt'];
        }
    }

}

?>
