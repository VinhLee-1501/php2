<?php

namespace App\Controllers\client;

use App\Core\BaseRender;
use App\Helpers\PHPMailer\Mailer;
use App\Models\client\RoomClient;

class RoomClientController extends BaseClientController
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

    function formUpdateBook($bookroomId)
    {
        $infoBook = new RoomClient('bookrooms');
        $data = $infoBook->selectInfoBookRoom('rooms', 'roomtypes', 'users',
            'roomId', 'roomId', 'roomTypeId',
            'roomTypeId', 'nameType', 'userId',
            'userId', $_SESSION['users']['userId'], 'bookroomId',
            $bookroomId);
//        echo '<pre>';
//        var_dump($data);
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/updateService', $data);
        $this->_renderBase->renderClientFooter();
    }

    function bookRoom()
    {
        date_default_timezone_set('Asia/Ho_Chi_minh');
        if (isset($_SESSION['users'])){
            if (!$_SESSION['users']['phone'] == ''){
                $mail = new Mailer();
                $selectType = new RoomClient('roomtypes');
                $checkStatus = new RoomClient('rooms');
                $dataBook = new RoomClient('bookrooms');

//                var_dump($roomDetailId);
                $roomTypeId = $selectType->selectType('roomTypeId', $_POST['room']);
                var_dump($roomTypeId['roomTypeId']);

                $slectId = $checkStatus->getRoomIdByRoomTypeId('roomtypes', 'roomTypeId',
                    'roomTypeId', $roomTypeId['roomTypeId'],
                    'status', 'Trống', 'roomId');
                var_dump($slectId['roomId']);
//                exit();

//                $roomId = $checkStatus->checkStatus('roomId', $slectId['roomId'], 'status', 'Trống', 'roomId');
//                var_dump($roomId);
                $userDayStart = date('Y-m-d H:i:s', strtotime($_POST['dayStart']));
                $userDayEnd = date('Y-m-d H:i:s', strtotime($_POST['dayEnd']));
                $today = date('Y-m-d H:i:s');

                if ($userDayStart < $today) {
                    $_SESSION['error'] = "Ngày bắt đầu phải lớn hơn hiện tại";
                    header("Location:".ROOT_URL."?url=HomeClientController/homePage");
                    exit();
                }

                if ($userDayEnd <= $userDayStart) {
                    $_SESSION['error'] = "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                    header("Location:".ROOT_URL."?url=HomeClientController/homePage");
                    exit();
                }
                $data = [
                    'dayStart' => $userDayStart,
                    'dayEnd' => $userDayEnd,
                    'qualityUser' => $_POST['qualityUser'],
                    'roomId' => $slectId['roomId'],
                    'userId' => $_SESSION['users']['userId']
                ];
                var_dump($data);

//        exit();
                if ($slectId) {
                    $_SESSION['success'] = 'Đặt phòng thành công';
                    $dataBook->insertBookRoom($data);
                    echo 'jds';
                    header("Location:".ROOT_URL."?url=HomeClientController/homePage");
                    $mail->BookRoom($_SESSION['users']['email'], $_SESSION['users']['fullName'], date('d-m-y'), $data['dayStart'], $data['dayEnd']);
                }else{
                    $_SESSION['error'] = 'Không có phòng trống loại này. Hãy chọn phòng khác';
                    header("Location:".ROOT_URL."?url=HomeClientController/homePage");
                }
            }else{
                $_SESSION['error'] = 'Xin cập nhật đầy đủ thông tin';
                header("Location:".ROOT_URL."?url=HomeClientController/profile");
            }
        }else{
            $_SESSION['error'] = 'Bạn chưa đăng nhập thông tin';
            header("Location:".ROOT_URL."?url=UserClientController/loginUser");
        }

    }

    function bookRoomPageDetail($roomDetailId)
    {
        date_default_timezone_set('Asia/Ho_Chi_minh');
        if (isset($_SESSION['users'])){
            if (!$_SESSION['users']['phone'] == ''){
                $mail = new Mailer();
                $selectType = new RoomClient('roomtypes');
                $checkStatus = new RoomClient('rooms');
                $dataBook = new RoomClient('bookrooms');

//                var_dump($roomDetailId);
                $roomTypeId = $selectType->selectType('roomTypeId', $_POST['room']);
                var_dump($roomTypeId['roomTypeId']);

                $slectId = $checkStatus->getRoomIdByRoomTypeId('roomtypes', 'roomTypeId',
                                                    'roomTypeId', $roomTypeId['roomTypeId'],
                    'status', 'Trống', 'roomId');
                var_dump($slectId['roomId']);
//                exit();

//                $roomId = $checkStatus->checkStatus('roomId', $slectId['roomId'], 'status', 'Trống', 'roomId');
//                var_dump($roomId);
                $userDayStart = date('Y-m-d H:i:s', strtotime($_POST['dayStart']));
                $userDayEnd = date('Y-m-d H:i:s', strtotime($_POST['dayEnd']));
                $today = date('Y-m-d H:i:s');

                if ($userDayStart < $today) {
                    $_SESSION['error'] = "Ngày bắt đầu phải lớn hơn hiện tại";
                    header("Location:".ROOT_URL."?url=HomeClientController/roomDetailPage/".$roomDetailId);
                    exit();
                }

                if ($userDayEnd <= $userDayStart) {
                    $_SESSION['error'] = "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                    header("Location:".ROOT_URL."?url=HomeClientController/roomDetailPage/".$roomDetailId);
                    exit();
                }
                $data = [
                    'dayStart' => $userDayStart,
                    'dayEnd' => $userDayEnd,
                    'qualityUser' => $_POST['qualityUser'],
                    'roomId' => $slectId['roomId'],
                    'userId' => $_SESSION['users']['userId']
                ];
                var_dump($data);

//        exit();
                if ($slectId) {
                    $_SESSION['success'] = 'Đặt phòng thành công';
                    $dataBook->insertBookRoom($data);
                    $bookDay = date('Y-m-d H:m:s');
                    header("Location:".ROOT_URL."?url=HomeClientController/roomsPage");
                    $mail->BookRoom($_SESSION['users']['email'], $_SESSION['users']['fullName'] , $data['dayStart'], $data['dayEnd'], $bookDay);
                }else{
                    $_SESSION['error'] = 'Không có phòng trống loại này. Hãy chọn phòng khác';
                    header("Location:".ROOT_URL."?url=HomeClientController/roomsPage");
                }
            }else{
                $_SESSION['error'] = 'Xin cập nhật đầy đủ thông tin';
                header("Location:".ROOT_URL."?url=HomeClientController/profile");
            }
        }else{
            $_SESSION['error'] = 'Bạn chưa đăng nhập thông tin';
            header("Location:".ROOT_URL."?url=UserClientController/loginUser");
        }

    }

    function InfoBookRoom($bookroomId)
    {
        $mail = new Mailer();
        $selectRTId = new RoomClient('roomtypes');
        $checkRooms = new RoomClient('rooms');
        $updateBookRoom = new RoomClient('bookrooms');

        $checkTypeRoom = $selectRTId->selectType('roomTypeId', $_POST['room']);
//        var_dump($checkTypeRoom);
//        echo '<br>';
        $roomId = $checkRooms->getRoomIdByRoomTypeId('roomtypes', 'roomTypeId',
            'roomTypeId', $checkTypeRoom['roomTypeId'],
            'status', 'Trống', 'roomId');
//        var_dump($roomId);
//        $checkRoom = $updateBookRoom->checkRoomId('rooms', 'roomId', 'roomId', $roomId['roomId']);
        echo '<pre>';
        var_dump($bookroomId);
//        $checkStatusRoom = $checkRooms->checkStatus('roomId', $roomId['roomId'], 'status', 'Trống', 'roomId');
//        var_dump($checkStatusRoom);

        $userDayStart = date('Y-m-d H:i:s', strtotime($_POST['dayStart']));
        $userDayEnd = date('Y-m-d H:i:s', strtotime($_POST['dayEnd']));

        // Check if user's dayStart is greater than or equal to dayStart in the database
        if ($userDayStart < $roomId[0]['dayStart']) {
            echo "Ngày bắt đầu phải lớn hơn: " . $roomId[0]['dayStart'];
            return;
        }

        // Check if user's dayEnd is less than or equal to user's dayStart
        if ($userDayEnd <= $userDayStart) {
            echo "Ngày kết thúc phải lớn hơn ngày bắt đầu";
            return;
        }

        $data = [
            'dayStart' => $userDayStart,
            'dayEnd' => $userDayEnd,
            'qualityUser' => $_POST['qualityUser'],
            'roomId' => $roomId['roomId'],
            'status' => 'Chờ xác nhận',
            'userId' => $_SESSION['users']['userId']
        ];
        echo '<pre>';
        var_dump($data);
        if ($roomId){
            $_SESSION['success'] = 'Thay đổi thông tin thành công';
            $updateBookRoom->updateBookRoom($bookroomId, $data, 'bookroomId');
            $bookDay = date('Y-m-d');
            header("Location:".ROOT_URL."?url=HomeClientController/service/".$bookroomId);
            $mail->updateBookRoom($_SESSION['users']['email'], $_SESSION['users']['fullName'], $bookDay,
                $data['dayStart'], $data['dayEnd'], $data['qualityUser']);
        }else{
            $_SESSION['error'] = 'Không có phòng trống loại này. Hãy chọn phòng khác';
            header("Location:".ROOT_URL."?url=HomeClientController/service");
        }

    }

    function deleteInfoService($bookroomId)
    {

        $bookroom = new RoomClient('bookrooms');
        $selectInfo = $bookroom->getOne('bookroomId', $bookroomId);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
//        $date = new \DateTime();
//        $dayStart = \DateTime::createFromFormat('Y-m-d H:i:s', $selectInfo['dayStart']);
            $date = date('y-m-d H:m:s');
            $selectDate = strtotime($date);
            $selectDayStar = strtotime($selectInfo['dayStart']);
        if ($selectDate >= $selectDayStar){
            $_SESSION['error'] = 'Đã quá ngày Check-In, dịch vụ đã được xử lý';
            header("Location:".ROOT_URL."?url=HomeClientController/service");
        }else{
            $bookroom->deleteService('bookroomId', $bookroomId);
            $_SESSION['success'] = 'Hủy thành công';
            header("Location:".ROOT_URL."?url=HomeClientController/service");
        }
    }
}