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
            $bookroomId, 'roomTypeId');
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

                $roomTypeId = $selectType->selectType('roomTypeId', $_POST['room']);
                var_dump($roomTypeId['roomTypeId']);

                $selectDayEnd = $dataBook->checkDay('rooms', 'roomtypes',
                    'roomId', 'roomTypeId', 'roomTypeId',
                    $roomTypeId['roomTypeId'], 'dayEnd');
                var_dump($selectDayEnd[0]['roomId']);
                var_dump($selectDayEnd[0]['dayEnd']);
//                exit();
                $dayStart = date('Y-m-d', strtotime($_POST['dayStart']));
                $dayEnd = date('Y-m-d', strtotime($selectDayEnd[0]['dayEnd']));
                $qualityRooms = $_POST['qualityRooms'];
                if ($dayStart >= $dayEnd){
                    if ($qualityRooms >= 1 && $qualityRooms < 3){
                        $slectId = $checkStatus->getRoomIdByRoomTypeId_2('roomtypes', 'roomTypeId',
                            'roomTypeId', $roomTypeId['roomTypeId'], 'roomId');
                        $data = [
                            'dayStart' => date('Y-m-d H:i:s', strtotime($_POST['dayStart'])),
                            'dayEnd' => date('Y-m-d H:i:s', strtotime($_POST['dayEnd'])),
                            'qualityUser' => $_POST['qualityUser'],
                            'qualityRooms' => $qualityRooms,
                            'roomId' => $slectId['roomId'],
                            'userId' => $_SESSION['users']['userId']
                        ];

                    }else{
                        $_SESSION['error'] = "Hiện bên chúng tôi không cung cấp đủ số phòng";
                        header("Location:".ROOT_URL."?url=HomeClientController/homePage");
                        exit();
                    }
                }else{
                    $slectId = $checkStatus->getRoomIdByRoomTypeId('roomtypes', 'roomTypeId',
                        'roomTypeId', $roomTypeId['roomTypeId'],
                        'status', 'Trống', 'roomId');
                    var_dump($slectId['roomId']);
//                exit();
                    $selectDayEnd = $dataBook->selectCondition('dayEnd', 'roomId', $slectId['roomId']);
                    var_dump($selectDayEnd);
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
                        'qualityRooms' => $_POST['qualityRooms'],
                        'roomId' => $slectId['roomId'],
                        'userId' => $_SESSION['users']['userId']
                    ];
                }
//                exit();

                $data2 = [
                    'status' => 'Đầy',
                ];
                var_dump($data);
                var_dump($data2);

//                exit();
                if ($slectId) {
                    $_SESSION['success'] = 'Đặt phòng thành công';
                    $dataBook->insertBookRoom($data);
                    $checkStatus->updateBookRoom($slectId['roomId'], $data2, 'roomId');
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
                $nati = new RoomClient('notifications');
                $roomTypeId = $selectType->selectType('roomTypeId', $_POST['room']);
                var_dump($roomTypeId['roomTypeId']);

                $selectDayEnd = $dataBook->checkDay('rooms', 'roomtypes',
                    'roomId', 'roomTypeId', 'roomTypeId',
                    $roomTypeId['roomTypeId'], 'dayEnd');
                var_dump($selectDayEnd[0]['roomId']);
                var_dump($selectDayEnd[0]['dayEnd']);
//                exit();
                $dayStart = date('Y-m-d', strtotime($_POST['dayStart']));
                $dayEnd = date('Y-m-d', strtotime($selectDayEnd[0]['dayEnd']));
                $qualityRooms = $_POST['qualityRooms'];
                if ($dayStart >= $dayEnd){
                    if ($qualityRooms >= 1 && $qualityRooms < 3){
                        $slectId = $checkStatus->getRoomIdByRoomTypeId_2('roomtypes', 'roomTypeId',
                            'roomTypeId', $roomTypeId['roomTypeId'], 'roomId');
                        $data = [
                            'dayStart' => date('Y-m-d H:i:s', strtotime($_POST['dayStart'])),
                            'dayEnd' => date('Y-m-d H:i:s', strtotime($_POST['dayEnd'])),
                            'qualityUser' => $_POST['qualityUser'],
                            'qualityRooms' => $qualityRooms,
                            'roomId' => $slectId['roomId'],
                            'userId' => $_SESSION['users']['userId']
                        ];

                    }else{
                        $_SESSION['error'] = "Hiện bên chúng tôi không cung cấp đủ số phòng";
                        header("Location:".ROOT_URL."?url=HomeClientController/homePage");
                        exit();
                    }
                }else{
                    $slectId = $checkStatus->getRoomIdByRoomTypeId('roomtypes', 'roomTypeId',
                        'roomTypeId', $roomTypeId['roomTypeId'],
                        'status', 'Trống', 'roomId');
                    var_dump($slectId['roomId']);
//                exit();
                    $selectDayEnd = $dataBook->selectCondition('dayEnd', 'roomId', $slectId['roomId']);
                    var_dump($selectDayEnd);
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
                        'qualityRooms' => $_POST['qualityRooms'],
                        'roomId' => $slectId['roomId'],
                        'userId' => $_SESSION['users']['userId']
                    ];
                }
//                exit();

                $data2 = [
                    'status' => 'Đầy',
                ];
                var_dump($data);
                var_dump($data2);

//                exit();
                if ($slectId) {
                    $_SESSION['success'] = 'Đặt phòng thành công';
                    $dataBook->insertBookRoom($data);
                    $checkStatus->updateBookRoom($slectId['roomId'], $data2, 'roomId');
                    header("Location:".ROOT_URL."?url=HomeClientController/homePage");
                    $mail->BookRoom($_SESSION['users']['email'], $_SESSION['users']['fullName'] , date('d-m-y'), $data['dayStart'], $data['dayEnd']);
                }else{
                    $_SESSION['error'] = 'Không có phòng trống loại này. Hãy chọn phòng khác';
                    header("Location:".ROOT_URL."?url=HomeClientController/roomDetailPage/".$roomDetailId);
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
        $roomTypeId = $_GET['id'];
        $mail = new Mailer();
        $selectRTId = new RoomClient('roomtypes');
        $checkRooms = new RoomClient('rooms');
        $updateBookRoom = new RoomClient('bookrooms');
        $checkTypeRoom = $selectRTId->selectType('roomTypeId', $_POST['room']);

        var_dump($checkTypeRoom);
        var_dump($roomTypeId);
//        exit();
//        echo '<br>';
        if ($checkTypeRoom['roomTypeId'] === $roomTypeId){
            $roomId = $checkRooms->getRoomIdByRoomTypeId_2('roomtypes', 'roomTypeId',
                'roomTypeId', $checkTypeRoom['roomTypeId'],
                'roomId');
            var_dump('12'.$roomId['roomId']);
            exit();
        }else{
            $roomId = $checkRooms->getRoomIdByRoomTypeId('roomtypes', 'roomTypeId',
                'roomTypeId', $checkTypeRoom['roomTypeId'],
                'status', 'Trống', 'roomId');
            var_dump('a'.$roomId['roomId']);

            $selectRoomID = $updateBookRoom->selectCondition('roomId', 'bookroomId', $bookroomId);
            var_dump($selectRoomID);
            $dataRoom = [
                'status' => 'Trống'
            ];
            $updateIdRoom = $checkRooms->updateBookRoom($selectRoomID['roomId'], $dataRoom, 'roomId');
            var_dump($updateIdRoom);
//            exit();
        }

        echo '<pre>';
        var_dump($bookroomId);

        $userDayStart = date('Y-m-d H:i:s', strtotime($_POST['dayStart']));
        $userDayEnd = date('Y-m-d H:i:s', strtotime($_POST['dayEnd']));

        if ($userDayStart < $roomId[0]['dayStart']) {
            $_SESSION['error'] = "Ngày bắt đầu phải lớn hơn hiện tại";
            header("Location:".ROOT_URL."?url=HomeClientController/service");
            exit();
        }

        if ($userDayEnd <= $userDayStart) {
            $_SESSION['error'] = "Ngày kết thúc phải lớn hơn ngày bắt đầu";
            header("Location:".ROOT_URL."?url=HomeClientController/service");
            exit();
        }

        $data = [
            'dayStart' => $userDayStart,
            'dayEnd' => $userDayEnd,
            'qualityUser' => $_POST['qualityUser'],
            'roomId' => $roomId['roomId'],
            'status' => 'Chờ xác nhận',
            'userId' => $_SESSION['users']['userId']
        ];

        $data2 = [
            'status' => 'Đầy'
        ];
        echo '<pre>';
        var_dump($data);
        if ($roomId){
            $_SESSION['success'] = 'Thay đổi thông tin thành công';
            $updateBookRoom->updateBookRoom($bookroomId, $data, 'bookroomId');
            $checkRooms->updateBookRoom($roomId['roomId'], $data2, 'roomId');
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