<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Helpers\PHPMailer\Mailer;
use App\Models\admin\OrderAdmin;
use App\Models\admin\User;
use Dompdf\Dompdf;

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
        if ($result == true) {
            $_SESSION['success'] = 'Đã thanh toán';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableOrder");
            $mail->MailThank($emailUser['email'], $roomId[0]['fullName'], $roomId[0]['nameType'], $totalPrice,
                $numberOfNights, $roomId[0]['dayStart'], $roomId[0]['createDay'], $roomId[0]['price']);
        } else {
            $_SESSION['error'] = 'Thất bại';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableOrder");
        }
    }

    function delete($orderId)
    {
        $table = new OrderAdmin('orders');
        $data = $table->deleteData('orderId', $orderId);
        if ($data) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableOrderFinish");
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableOrderFinish");
        }
    }

    function outputOrder($orderId)
    {
        $table = new OrderAdmin('orders');
        $user = new User('user');
        $row = $table->selectData('bookrooms', 'rooms', 'roomtypes',
            'users', 'dayStart', 'dayEnd',
            'price', 'nameType', 'fullName',
            'bookroomId', 'roomId', 'roomTypeId',
            'userId', 'orderId', $orderId);
        var_dump($row);
        $dayStart = new \DateTime($row[0]['dayStart']);
        $dayEnd = new \DateTime($row[0]['dayEnd']);
        $interval = date_diff($dayStart, $dayEnd);
        $numberOfNights = $interval->format('%a');
        $createDay = date("d-m-y", strtotime($row[0]["createDay"]));
        $price = number_format($row[0]['price']);

        $totalPrice = $numberOfNights * $row[0]['price'];
        $totalPriceFormatted = number_format($totalPrice);

        $dompdf = new Dompdf();
        $dompdf->loadHtml("<div style='text-align: center; font-family: 'Times New Roman', sans-serif; color: #333;'>
                            <h1 style='color: #446688;'>Hóa đơn</h1>
                            <p style='font-size: 1.2em;'><strong>Mã hóa đơn:</strong> {$row[0]['orderId']}</p>
                            <p style='font-size: 1.2em;'><strong>Ngày:</strong> {$createDay}</p>
                            <p style='font-size: 1.2em;'><strong>Tên khách hàng:</strong> {$row[0]['fullName']}</p>
                            <p style='font-size: 1.2em;'><strong>Loại phòng:</strong> {$row[0]['nameType']}</p>
                            <p style='font-size: 1.2em;'><strong>Giá:</strong> {$price}/đêm</p>
                            <p style='font-size: 1.2em;'><strong>Thời gian sử dụng:</strong> {$numberOfNights} ngày</p>
                            <hr>
                            <p style='font-size: 1.4em; color: #884422;'><strong>Tổng tiền:</strong> {$totalPriceFormatted}</p>
                        </div>
                        ");
//            var_dump($dompdf);
//            exit();
        $dompdf->setPaper(array(0, 0, 526, 241), 'landscape');
        $dompdf->render();


        $file_location = "D:/Hoa_don_{$row[0]['orderId']}.pdf";
        file_put_contents($file_location, $dompdf->output());

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($file_location) . '"');
        readfile($file_location);

        unlink($file_location);
    }
}