<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Helpers\PHPMailer\Mailer;
use App\Models\admin\OrderAdmin;
use App\Models\admin\RoomAdmin;
use App\Models\admin\User;

class OrderAdminController extends BaseAdminController
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

    function confirm($orderId)
    {
        $order = new OrderAdmin('orders');
        $user = new User('users');
//        $room = new RoomAdmin('rooms');
//        $roomtype = new RoomAdmin('roomtypes');
        $mail = new Mailer();

        $roomId = $order->selectData('bookrooms', 'rooms', 'roomtypes',
            'users', 'dayStart', 'dayEnd',
            'price', 'nameType', 'fullName',
            'bookroomId', 'roomId', 'roomTypeId',
            'userId', 'orderId', $orderId);
        var_dump($roomId[0]['userId']);
        $emailUser = $user->selectOne('email', 'userId', $roomId[0]['userId']);
        var_dump($emailUser['email']);
        $dayStart = new \DateTime($roomId[0]['dayStart']);
        $dayEnd = new \DateTime($roomId[0]['dayEnd']);
        $interval = date_diff($dayStart, $dayEnd);
        $numberOfNights = $interval->format('%a');
        $totalPrice = $numberOfNights * $roomId[0]['price'];
        var_dump($numberOfNights);
        var_dump($totalPrice);
        var_dump($roomId[0]['dayStart']);
        var_dump($roomId[0]['dayEnd']);
        var_dump($roomId[0]['fullName']);
        var_dump($roomId[0]['nameType']);
        var_dump($roomId[0]['createDay']);

        $data = [
            'status' => 'Đã thanh toán'
        ];
        var_dump($data);

//        exit();
        $result = $order->orderConfirm($orderId, $data, 'orderId');
        if ($result == true){
            $_SESSION['success'] = 'Đã thanh toán';
            header("Location:".ROOT_URL."?url=HomeAdminController/tableOrder");
            $mail->MailThank($emailUser['email'], $roomId[0]['fullName'], $roomId[0]['nameType'], $totalPrice,
                $numberOfNights, $roomId[0]['dayStart'], $roomId[0]['createDay'], $roomId[0]['price']);
        }else{
            $_SESSION['error'] = 'Thất bại';
            header("Location:".ROOT_URL."?url=HomeAdminController/tableOrder");
        }
    }

    function delete($orderId)
    {
        $table = new OrderAdmin('orders');
        $data = $table->deleteData('orderId', $orderId);
        if ($data){
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
            header("Location:".ROOT_URL."?url=HomeAdminController/tableOrderFinish");
        }else{
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
            header("Location:".ROOT_URL."?url=HomeAdminController/tableOrderFinish");
        }
    }
}