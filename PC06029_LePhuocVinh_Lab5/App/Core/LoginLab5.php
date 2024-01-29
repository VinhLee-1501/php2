<?php

namespace App\Core;

class LoginLab5 extends Database
{

    public function __construct()
    {
        $this->user = new User();
        $this->val = new ValidatorLab5();
        $this->db = new Database();
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            $fullName = $_SESSION['user'];
            return "{$fullName}<a href='/logout'>Logout</a>";
        } else {
            return '
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>CCCD</label>
                            <input type="text" name="userCard" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        <a href="/BtnForgot" class="btn btn-warning">Forgot password</a>
                    </form>
                    ';

        }

    }


    public function loginUser($email, $userCard)
    {

        if ($this->val->emptyInput($email, $userCard)) {
            echo "Vui lòng nhập đầy đủ thông tin";
            header("Location:/register?error=emptyInput");
            exit();
        }
        if ($this->val->validEmail($email)) {
            header("Location:/register?error=validEmail");
            exit();
        }
        var_dump($email, $userCard);
//        exit();
        $this->getUser($email, $userCard);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location:/");
    }

    public function submit()
    {
        $email = $_POST['email'];
        $userCard = $_POST['userCard'];

//            var_dump($email, userCard);
//            exit();
        $this->loginUser($email, $userCard);
//        $this->getUser($email, $userCard);
    }

    public function getUser($email, $userCard)
    {
        $this->user->getUserInfo($email, $userCard);
    }


}