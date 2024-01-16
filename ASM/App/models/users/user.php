<?php

namespace models\users\listUsers;

class User
{
    public function getUser()
    {
        global $conn;
        require_once '../database/Database.php';
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

}