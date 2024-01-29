<?php

namespace App\Core;

class User extends Database
{
    public function getUserInfo($email, $userCard)
    {
        $stmt = $this->connect()->query("SELECT * FROM users WHERE email = '{$email}'");
        if ($stmt->num_rows == 0) {
            header("Location:/login?error=userNotFound");
            exit();
        }
        $user = $stmt->fetch_array(MYSQLI_ASSOC);
        $checkCardUser = password_verify($userCard, $user['userCard']);
        if ($checkCardUser == false) {
            header("Location:/login?error=invalidCardUser");
            exit();
        }

        foreach ($stmt as $row) {
            $_SESSION['user'] = $row['fullName'];
            header("Location:/login");
            exit();
        }
    }
}