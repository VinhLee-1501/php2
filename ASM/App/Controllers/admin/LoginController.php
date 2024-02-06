<?php

namespace App\Controllers\admin;

use App\Models\admin\LoginAdmin;
use App\Models\client\User;

class LoginController extends BaseAdminController
{
    function checkAccount()
    {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $checkLogin = new LoginAdmin('users');
        $result = $checkLogin->getInfoAdmin('email', $data['email']);
        var_dump($result['position']);
//        exit();
        if (password_verify($data['password'], $result['password'])) {
            if ($result['position'] === 'Admin'){
                $_SESSION['admin'] = $result;
                header("Location:" . ROOT_URL . "?url=HomeAdminController/home");
            }else{
                $_SESSION['errorLogin'] = 'Bạn không được quyền truy cập vào';
                header("Location:" . ROOT_URL . "?url=HomeAdminController/loginAdmin");
            }
        } else {
            $_SESSION['errorLogin'] = 'Thông tin đăng nhập không đúng';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/loginAdmin");
        }
    }
}