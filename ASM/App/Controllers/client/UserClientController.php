<?php

namespace App\Controllers\client;

use App\Core\BaseRender;
use App\Helpers\PHPMailer\Mailer;
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

    function forgotPass()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/forgotPass');
        $this->_renderBase->renderClientFooter();
    }

    function verification()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/verification');
        $this->_renderBase->renderClientFooter();
    }

    function resetPass()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/resetPass');
        $this->_renderBase->renderClientFooter();
    }

    function checkUser()
    {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'userCard' => $_POST['userCard']
        ];

        $checkLogin = new User('users');
        $result = $checkLogin->getInfoUser('email', $data['email']);
        var_dump($result);
//        exit();
        if (password_verify($data['password'], $result['password'])) {
            $_SESSION['users'] = $result;
            header("Location:" . ROOT_URL . "?url=HomeClientController/homePage");
        } else {
            $_SESSION['errorLogin'] = 'Thông tin đăng nhập không đúng';
            header("Location:" . ROOT_URL . "?url=UserClientController/loginUser");
        }
    }

    function createUser()
    {
        $mail = new Mailer();
        if (isset($_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['userCard'], $_POST['fullName'])) {
            if ($_POST['password2'] != $_POST['password1']) {
                $_SESSION['errorRegister'] = 'Mật khẩu nhập lại không đúng';
                header("Location:" . ROOT_URL . "?url=UserClientController/register");
            } else {
                $data = [
                    'email' => $_POST['email'],
                    'fullName' => $_POST['fullName'],
                    'password' => password_hash($_POST['password1'], PASSWORD_DEFAULT),
                    'userCard' => $_POST['userCard'],
                ];
                $user = new User('users');
                $result = $user->registerUser($data);
                if ($result) {
                    $_SESSION['user'] = $data;
                    $_SESSION['success'] = 'Đăng ký thành công';
                    header("Location:" . ROOT_URL . "?url=UserClientController/loginUser");
                    $mail->welcome($data['email'], $data['fullName']);
                } else {
                    $_SESSION['errorLogin'] = 'Đăng ký thất bại';
                    header("Location:" . ROOT_URL . "?url=UserClientController/register");
                }
            }
        } else {
            $_SESSION['errorRegister'] = 'Nhập đầy đủ thông tin';
            header("Location:" . ROOT_URL . "?url=UserClientController/register");
        }
    }

    function logoutUser()
    {
        session_unset();
        session_destroy();
        header("Location:" . ROOT_URL . "?url=HomeClientController/homePage");
    }

    function checkEmail()
    {
        $mail = new Mailer();
        $data = [
            'email' => $_POST['email']
        ];
        if ($_POST['email'] == '') {
            $_SESSION['errorLogin'] = 'Nhập đầy đu thông tin';
            header("Location:" . ROOT_URL . "?url=UserClientController/forgotPass");
        } else {
            $check = new User('users');
            $result = $check->getInfoUser('email', $data['email']);
            if ($result) {
                $random_number = rand(0, 999999);
                $code = substr($random_number, 0, 6);
                $title = 'Quên mật khẩu';
                $content = "Mã của bạn là: <span class='text-green'>" . $code . "</span>";
                $mail->sendMail($title, $content, $data['email']);
                $_SESSION['email'] = $data['email'];
                $_SESSION['code'] = $code;
                header("Location:" . ROOT_URL . "?url=UserClientController/verification");

            } else {
                $_SESSION['errorLogin'] = 'Email khong ton tai';
                header("Location:" . ROOT_URL . "?url=UserClientController/forgotPass");
            }
        }

    }

    function checkCode()
    {
        if ($_POST['text'] !== $_SESSION['code']) {
            $_SESSION['errorLogin'] = 'Mã nhập lại không đúng';
            header("Location:" . ROOT_URL . "?url=UserClientController/verification");
        } else {
            header("Location:" . ROOT_URL . "?url=UserClientController/resetPass");
        }
    }

    function newPass()
    {
        if ($_POST['password2'] !== $_POST['password1']) {
            $_SESSION['errorLogin'] = 'Mật khẩu nhập lại không đúng';
            header("Location:" . ROOT_URL . "?url=UserClientController/resetPass");
        } else {
            $data = [
                'password' => password_hash($_POST['password1'], PASSWORD_DEFAULT),
            ];
            $user = new User('users');
            $result = $user->updatePass($_SESSION['email'], $data);
//            var_dump($result);
//            exit();
            if ($result) {
//                var_dump($result);
//                exit();
                $_SESSION['success'] = 'Đổi mật khẩu thành công';
                header("Location:" . ROOT_URL . "?url=UserClientController/loginUser");
            } else {
                $_SESSION['errorLogin'] = 'Đổii mật khẩu thất bại';
                header("Location:" . ROOT_URL . "?url=UserClientController/resetPass");
            }
        }
    }


}

