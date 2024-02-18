<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Helpers\PHPMailer\Mailer;
use App\Models\admin\User;

class UserController extends BaseAdminController
{
    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }

    function createFunction()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/users/create');
        $this->_renderBase->renderAdminFooter();
    }

    function insertDataUser()
    {
        if (isset($_POST['userCard']) || isset($_POST['fullName']) || isset($_POST['email']) ||
            isset($_POST['phone']) || isset($_POST['password'])) {
            $user = new User('users');
            $mail = new Mailer();

            if (strlen($_POST['userCard']) > 0 && strlen($_POST['userCard']) !== 12) {
                $_SESSION['error'] = 'Số chứng minh 12 ký tự';
                header("Location:" . ROOT_URL . "?url=HomeAdminController/tableUser");
            } else {
                $selectUserCard = $user->selectOne('userCard', 'userCard', $_POST['userCard']);
                if ($selectUserCard) {
                    $_SESSION['error'] = 'Số chứng minh đã tồn tại';
                    header("Location:" . ROOT_URL . "?url=HomeAdminController/tableUser");
                } else {
                    $selectEmail = $user->selectOne('email', 'email', $_POST['email']);
                    if ($selectEmail) {
                        $_SESSION['error'] = 'Email đã tồn tại';
                        header("Location:" . ROOT_URL . "?url=HomeAdminController/tableUser");
                        exit();
                    } else {
                        $data = [
                            'userCard' => $_POST['userCard'],
                            'fullName' => $_POST['fullName'],
                            'email' => $_POST['email'],
                            'phone' => $_POST['phone'],
                            'address' => $_POST['address'],
                            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                        ];
                        var_dump($_POST['password']);
                        $result = $user->store($data);
                        var_dump($result);
//                exit();
                        if ($result) {
                            $_SESSION['success'] = 'Thêm thành công';
                            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableUser");
                            $mail->welcomeInsert($data['email'], $data['fullName'], $_POST['password']);
                        } else {
                            $_SESSION['error'] = 'Thêm thất bại';
                            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableUser");
                        }
                    }

                }
            }
        }
    }

    function hiddenData($userId)
    {
        $table = new User('users');
        $selectStatus = $table->selectConfition('status', 'userId', $userId, 'Active');
        if ($selectStatus){
            $data = [
                'status' => 'Inative'
            ];
        }else{
            $data = [
              'status' => 'Active'
            ];
        }
        $result = $table->hidden($userId, $data, 'userId');
        if ($result) {
            $_SESSION['success'] = 'Cập nhật thành công';
            header("Location:". ROOT_URL. "?url=HomeAdminController/tableUser");
        }else{
            $_SESSION['error'] = 'Cập nhật thất bại';
            header("Location:". ROOT_URL. "?url=HomeAdminController/tableUser");
        }
    }
}