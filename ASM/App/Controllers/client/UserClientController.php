<?php

namespace App\Controllers\client;

use App\Core\BaseRender;
use App\Models\client\User;

class UserClientController extends BaseClientController
{
    private $_renderBase;

    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }

    function loginUser()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/login');
        $this->_renderBase->renderClientFooter();
    }

    function register()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/register');
        $this->_renderBase->renderClientFooter();
    }


    function checkUser()
    {
        $data = [
            'fullName' => $_POST['fullName'],
            'password' => $_POST['password'],
            'userCard' => $_POST['userCard']
        ];

        $checkLogin = new User('users');
        $result = $checkLogin->getInfoUser('fullName', $data['fullName']);
        var_dump($result);
//        exit();
        if (password_verify($data['password'] === $result['password'])) {
            $_SESSION['user'] = $result;
            header("Location:" . ROOT_URL . "?url=HomeClientController/homePage");
        } else {
            $_SESSION['errorLogin'] = 'Thông tin đăng nhập không đúng';
            header("Location:" . ROOT_URL . "?url=UserClientController/loginUser");
        }
    }


    function createUser()
    {
        $data = [
            'fullName' => $_POST['fullName'],
            'password' => $_POST['password1'],
            'cardUser' => $_POST['cardUser'],
        ];
        if ($_POST['password2'] != $_POST['password1']) {
            $_SESSION['errorLogin'] = 'Mật khẩu nhập lại không đúng';
            return $this->_renderBase->render('client/login');
        } else {
            $user = new User('users');
            $result = $user->registerUser($data);
            if ($result) {
                $_SESSION['user'] = $data;
                $_SESSION['errorLogin'] = 'Đăng ký thành công';
                return $this->_renderBase->render('client/login');
            } else {
                $_SESSION['errorLogin'] = 'Đăng ký thất bại';
                return $this->_renderBase->render('client/login');
            }
        }
    }


    function logoutUser()
    {
        unset($_SESSION['user']);
        header("Location:" . ROOT_URL . "?url=HomeClientController/homePage'");
    }

}

