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
        if ($result['status'] === 'Active'){
            if (password_verify($data['password'], $result['password']) && $data['userCard'] == $result['userCard']) {
                $_SESSION['users'] = $result;
                header("Location:" . ROOT_URL . "?url=HomeClientController/homePage");
            } else {
                $_SESSION['errorLogin'] = 'Thông tin đăng nhập không đúng';
                header("Location:" . ROOT_URL . "?url=UserClientController/loginUser");
            }
        }else{
            $_SESSION['errorLogin'] = 'Tài khoản của bạn đã tạm ngưng';
            header("Location:" . ROOT_URL . "?url=UserClientController/loginUser");
        }
    }

    function createUser()
    {
        $mail = new Mailer();
        if (isset($_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['userCard'], $_POST['fullName'])) {
            $user = new User('users');
            if ($user->emailExists($_POST['email'])) {
                $_SESSION['errorRegister'] = 'Email đã tồn tại';
                header("Location:" . ROOT_URL . "?url=UserClientController/register");
            } elseif ($_POST['password2'] != $_POST['password1']) {
                $_SESSION['errorRegister'] = 'Mật khẩu nhập lại không đúng';
                header("Location:" . ROOT_URL . "?url=UserClientController/register");
            } else {
                $data = [
                    'email' => $_POST['email'],
                    'fullName' => $_POST['fullName'],
                    'password' => password_hash($_POST['password1'], PASSWORD_DEFAULT),
                    'userCard' => $_POST['userCard'],
                ];

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

            if ($result) {
//                var_dump($result);
//                exit();
                $_SESSION['success'] = 'Đổi mật khẩu thành công';
                header("Location:" . ROOT_URL . "?url=UserClientController/loginUser");
            } else {
                $_SESSION['errorLogin'] = 'Đổi mật khẩu thất bại';
                header("Location:" . ROOT_URL . "?url=UserClientController/resetPass");
            }
        }
    }


    // change personal information

    function changeInfoPsn($userId)
    {
        $mail = new Mailer();
        $update = new User('users');

        $_SESSION['users'] = [
            'userId' => $_SESSION['users']['userId'],
            'fullName' => $_POST['fullName'],
            'email' => $_POST['email'],
            'userCard' => $_POST['userCard'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
        ];

        $data = $_SESSION['users'];
        $result = $update->updateInfoPsn($userId, $data, 'userId');
        if ($result) {
            $_SESSION['success'] = 'Cập nhật thông tin thành công';
            header("Location:" . ROOT_URL . "?url=HomeClientController/profile", $userId);
            $mail->changeInfo($data['email'], $data['fullName']);
        } else {
            $_SESSION['error'] = 'Cập nhật thông tin thất bại';
            header("Location:" . ROOT_URL . "?url=HomeClientController/profile", $userId);
        }
    }

    function updateImg($userId)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $old_name = $_FILES['avatar']['name'];
        $file_extension = pathinfo($old_name, PATHINFO_EXTENSION);
        $new_name = date('YmdHis') . '.' . $file_extension;
//        echo $new_name;
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/uploads/' . $new_name)) {
            $_SESSION['success'] = 'Cập nhật thông tin thành công';
        } else {
            $_SESSION['error'] = 'Cập nhật thông tin thất bại';
        }

        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

            $_SESSION['users'] = [
                'userId' => $_SESSION['users']['userId'],
                'avatar' => $new_name,
                'fullName' => $_SESSION['users']['fullName'],
                'email' => $_SESSION['users']['email'],
                'userCard' => $_SESSION['users']['userCard'],
                'address' => $_SESSION['users']['address'],
                'phone' => $_SESSION['users']['phone'],
            ];
            $data = $_SESSION['users'];
            $update = new User('users');
            $result = $update->updateImg($userId, $data, 'userId');
            var_dump($result);
//        exit();
            if ($result) {
                $_SESSION['success'] = 'Cập nhật thông tin thành công';
                header("Location:" . ROOT_URL . "?url=HomeClientController/profile");
            } else {
                $_SESSION['error'] = 'Cập nhật thông tin thất bại';
                header("Location:" . ROOT_URL . "?url=HomeClientController/profile", $userId);
            }
        } else {
            $_SESSION['errorImg'] = 'Chưa có dữ liệu truyền vào';
            header("Location:" . ROOT_URL . "?url=HomeClientController/profile", $userId);
        }
    }

    function sendTheConcact()
    {
        $mail = new Mailer();

        $title = $_POST["title"];
        $content = $_POST["content"];
        $email = $_POST["email"];
        if ($email == '' || $title == '' || $content == ''){
            $_SESSION['error'] = 'Xin hãy nhập đầy đủ thông tin';
            header("Location:".ROOT_URL."?url=HomeClientController/contactPage");
        }else{
            $_SESSION['success'] = 'Gửi thành công. Cảm ơn bạn đã góp ý';
            header("Location:".ROOT_URL."?url=HomeClientController/contactPage");
            $mail->sendContact($email, $title, $content, $_SESSION['users']['fullName']);
        }

    }

    function marketingEmail()
    {
        $mail = new Mailer();
        if (isset($_SESSION['users'])){
            $email = $_POST['email'];
            $_SESSION['success'] = 'Gửi thành công';
            $mail->marketing($email);
//            exit();
            header("Location:".ROOT_URL."?url=HomeClientController/homePage");
        }else{
            $_SESSION['error'] = 'Xin hãy nhập đầy đủ thông tin';
            header("Location:".ROOT_URL."?url=UserClientController/loginUser");
        }
    }
}

