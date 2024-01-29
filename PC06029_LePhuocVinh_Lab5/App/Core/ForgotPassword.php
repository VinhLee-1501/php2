<?php

namespace App\Core;

class ForgotPassword extends Database
{
    public function __construct()
    {
        $this->db = new Database();
    }


    public function BtnForgot()
    {
        return '<form action="/ResetPassword" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <button type="submit" class="btn btn-primary" name="forotPassword">Đặt lại mật khẩu</button>
                </div>
            </form>';
    }

    public function ResetPassword()
    {
        if (isset($_POST['forotPassword']) == true) {
            $email = $_POST['email'];
            $conn = $this->connect();
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute([$email]);
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
//                var_dump($row);
                echo $this->newPassWord($email);
                return $row;
            } else {
                echo 'Email không tồn tại trong cơ sở dữ liệu.';
            }
        } else {
            echo 'Không có dl POST.';
        }

    }

    public function newPassWord($email)
    {
        return '
        <form action="/updatePassword" method="post">
            <input type="hidden" name="email" value="' . $email . '">
            <div class="form-group">
            <label for="password">Mật khẩu mới</label>
            <input type="text" name="userCard" id="userCard" class="form-control">
            <button type="submit" class="btn btn-primary" name="done">Lưu</button>
            </div>
        </form>
        ';
    }

    public function updatePassword()
    {
        if (isset($_POST['done']) == true) {
            $email = $_POST['email'];
            $userCard = $_POST['userCard'];
            $conn = $this->connect();
            $sql = "UPDATE users SET userCard = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $userCard, $email);
            $stmt->execute([$userCard, $email]);
            if ($stmt) {
                echo 'Cập nhật thành công';
            } else {
                echo 'Cập nhật thất bại';
            }
        } else {
            echo 'Không có dl POST.';
        }
    }

}