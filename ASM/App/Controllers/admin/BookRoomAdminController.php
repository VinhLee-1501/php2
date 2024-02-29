<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Helpers\PHPMailer\Mailer;
use App\Models\admin\BookRoom;
use App\Models\admin\OrderAdmin;
use App\Models\admin\RoomAdmin;
use App\Models\admin\RoomType;
use App\Models\admin\User;

class BookRoomAdminController extends BaseAdminController
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

    function store()
    {
        $table = new RoomType('roomtypes');
        $data = $table->getAllRoomType();
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/bookRoom/create', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function editValue($bookroomId)
    {
        $form = new BookRoom('bookrooms');
//        $user = new User('users');
        $data = $form->selectInfoBookRoom('rooms', 'roomtypes', 'users',
            'roomId', 'roomId', 'roomTypeId', 'roomTypeId',
            'nameType', 'userId', 'userId', 'userCard',
            'bookroomId', $bookroomId);
//        var_dump($data);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/bookRoom/update', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function updatStatusInfo($bookroomId)
    {
        $bookroom = new BookRoom('bookrooms');
        $room = new RoomAdmin('rooms');
        $roomId = $room->selectRoomId('bookrooms', 'roomId', 'roomId',
            'bookroomId', $bookroomId);
        var_dump($roomId[0]['roomId']);
        $value = [
            'status' => 'Đầy'
        ];
        $room->updateValue($roomId[0]['roomId'], $value, 'roomId');

//        exit();
        $data = [
            'status' => 'Xác nhận'
        ];
        $updateInfo = $bookroom->updateBookRoom($bookroomId, $data, 'bookroomId');
        if ($updateInfo) {
            $_SESSION['success'] = 'Thành công';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableBookRooms_CO");
        } else {
            $_SESSION['error'] = 'Thất bại';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableBookRooms");
        }
    }

    function updateCheckOut($bookroomId)
    {
        $bookroom = new BookRoom('bookrooms');
        $room = new RoomAdmin('rooms');
        $user = new User('users');
        $order = new OrderAdmin('orders');

        $roomId = $room->selectRoomId('bookrooms', 'roomId', 'roomId',
            'bookroomId', $bookroomId);
        $userInfo = $user->selectUserId('bookrooms', 'userId', 'userId', 'bookroomId', $bookroomId);
        var_dump($userInfo[0]);
        var_dump($roomId[0]['roomId']);
//        exit();
        $actualRoomId = $roomId[0]['roomId'];
        $value = [
            'status' => 'Trống'
        ];
        $room->updateValue($actualRoomId, $value, 'roomId');
        $data = [
            'status' => 'Hoàn thành'
        ];
        $updateInfo = $bookroom->updateBookRoom($bookroomId, $data, 'bookroomId');

        $data2 = [
            'bookroomId' => $bookroomId,
            'roomId' => $actualRoomId,
            'userId' => $userInfo[0]['userId']
        ];
        var_dump($data2);
//        var_dump($updateInfo);
//        exit();
        if ($updateInfo) {
            $_SESSION['success'] = 'Thành công';
            $order->insertValue($data2);
//            var_dump($ok);
//            exit();
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableBookRooms_CO");
        } else {
            $_SESSION['error'] = 'Thất bại';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableBookRooms_CO");
        }
    }

    function createData()
    {
        if (!$_POST['userCard'] == '' || !$_POST['dayStart'] == '' || !$_POST['dayEnd'] == '' || !$_POST['roomTypeId'] == '') {
            $mail = new Mailer();
            $selectType = new RoomAdmin('roomtypes');
            $checkStatus = new RoomAdmin('rooms');
            $dataBook = new RoomAdmin('bookrooms');
            $user = new User('users');

            $selectName = $user->selectOne('userId', 'userCard', $_POST['userCard']);
            var_dump($selectName);
            if ($selectName === false) {
                $_SESSION['error'] = 'Không tồn tại người dùng';
                header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
                exit();
            } else {
                $roomTypeId = $selectType->selectType('roomTypeId', $_POST['roomTypeId']);
                var_dump($roomTypeId['roomTypeId']);
                $selectDayEnd = $dataBook->checkDay('rooms', 'roomtypes',
                    'roomId', 'roomTypeId', 'roomTypeId',
                    $roomTypeId['roomTypeId'], 'dayEnd', 1);
                var_dump($selectDayEnd[0]['roomId']);
                var_dump($selectDayEnd[0]['dayEnd']);

                $dayStart = date('Y-m-d', strtotime($_POST['dayStart']));
                $dayEnd = date('Y-m-d', strtotime($selectDayEnd[0]['dayEnd']));
                $qualityRooms = $_POST['qualityRooms'];
                if ($dayStart >= $dayEnd) {
                    if ($qualityRooms > 0 && $qualityRooms < 3) {
                        $slectId = $checkStatus->getRoomIdByRoomTypeId_2('roomtypes', 'roomTypeId',
                            'roomTypeId', $roomTypeId['roomTypeId'], 'roomId');
                        var_dump($slectId);
                        $selectInfo = $checkStatus->selectType('roomId', $slectId['roomId']);
//                        var_dump($selectInfo);
                        $userDayStart = date('Y-m-d H:i:s', strtotime($_POST['dayStart']));
                        $userDayEnd = date('Y-m-d H:i:s', strtotime($_POST['dayEnd']));
                        $today = date('Y-m-d H:i:s');

                        if ($userDayStart < $today) {
                            $_SESSION['error'] = "Ngày bắt đầu phải lớn hơn hiện tại";
                            header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
                            exit();
                        }

                        if ($userDayEnd <= $userDayStart) {
                            $_SESSION['error'] = "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                            header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
                            exit();
                        }
                        $dayStart = new \DateTime($dayStart);
                        $dayEnd = new \DateTime($_POST['dayEnd']);
                        $interval = date_diff($dayStart, $dayEnd);
                        $numberOfNights = $interval->format('%a');
                        $totalPrice = ($numberOfNights * $selectInfo['price']) * $qualityRooms;
                        var_dump($totalPrice);
                        $data = [
                            'dayStart' => date('Y-m-d H:i:s', strtotime($_POST['dayStart'])),
                            'dayEnd' => date('Y-m-d H:i:s', strtotime($_POST['dayEnd'])),
                            'qualityUser' => $_POST['qualityUser'],
                            'qualityRooms' => $_POST['qualityRooms'],
                            'roomId' => $slectId['roomId'],
                            'payment' => $totalPrice,
                            'userId' => $selectName['userId']
                        ];
//                        var_dump($data);
//                        exit();
                    } else {
                        $_SESSION['error'] = "Hiện bên chúng tôi không cung cấp đủ số phòng";
                        header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
                        exit();
                    }
                } else {
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
                        header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
                        exit();
                    }

                    if ($userDayEnd <= $userDayStart) {
                        $_SESSION['error'] = "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                        header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
                        exit();
                    }
                    $data = [
                        'dayStart' => $userDayStart,
                        'dayEnd' => $userDayEnd,
                        'qualityUser' => $_POST['qualityUser'],
                        'qualityRooms' => $_POST['qualityRooms'],
                        'roomId' => $slectId['roomId'],
                        'userId' => $selectName['userId']
                    ];
                }

//        exit();
                if ($slectId) {
                    $_SESSION['success'] = 'Đặt phòng thành công';
                    $dataBook->insertBookRoom($data);
                    $bookDay = date('Y-m-d H:m:s');
                    header("Location:" . ROOT_URL . "?url=HomeAdminController/tableBookRooms");
                    $mail->BookRoom($_SESSION['users']['email'], $_SESSION['users']['fullName'], date('d-m-y'), $data['dayStart'], $data['dayEnd']);
                } else {
                    $_SESSION['error'] = 'Không có phòng trống loại này. Hãy chọn phòng khác';
                    header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
                }
            }
//                var_dump($roomDetailId);

        } else {
            $_SESSION['error'] = 'Xin nhập đầy đủ thông tin';
            header("Location:" . ROOT_URL . "?url=BookRoomAdminController/store");
        }
    }

    function updateData($bookroomId)
    {
        $mail = new Mailer();
        $selectRTId = new BookRoom('roomtypes');
        $checkRooms = new BookRoom('rooms');
        $updateBookRoom = new BookRoom('bookrooms');

        $checkTypeRoom = $selectRTId->selectType('roomTypeId', $_POST['roomTypeId']);
//        var_dump($checkTypeRoom['roomTypeId']);
//        exit();
//        echo '<br>';
//        var_dump($_POST['roomTypeId']);
        $selectDayEnd = $updateBookRoom->checkDay('rooms', 'roomtypes',
            'roomId', 'roomTypeId', 'roomTypeId',
            $checkTypeRoom['roomTypeId'], 'dayEnd', 1);
        $userDayStart = date('Y-m-d H:i:s', strtotime($_POST['dayStart']));
        $userDayEnd = date('Y-m-d H:i:s', strtotime($_POST['dayEnd']));
//        var_dump($selectDayEnd);
//        exit();
        if ($checkTypeRoom['roomTypeId'] == $_POST['roomTypeId']) {
            if ($_POST['qualityRooms'] >= 1 || $_POST['qualityRooms'] < 3) {
                $roomId = $checkRooms->getRoomIdByRoomTypeId_2('roomtypes', 'roomTypeId',
                    'roomTypeId', $checkTypeRoom['roomTypeId'], 'roomId');
                var_dump($roomId);

                $selectInfo = $checkRooms->selectType('roomId', $roomId['roomId']);
                var_dump('sấ', $selectInfo);

                if ($userDayStart < $roomId['dayStart']) {
                    echo "Ngày bắt đầu phải lớn hơn: " . $roomId['dayStart'];
                    header("Location:" . ROOT_URL . "?url=BookRoomAdminController/editValue/" . $bookroomId);
                }

                if ($userDayEnd <= $userDayStart) {
                    echo "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                    header("Location:" . ROOT_URL . "?url=BookRoomAdminController/editValue/" . $bookroomId);
                }
                $dayStart = new \DateTime($_POST['dayEnd']);
                $dayEnd = new \DateTime($_POST['dayEnd']);
                $interval = date_diff($dayStart, $dayEnd);
                $numberOfNights = $interval->format('%a');
                $total = ($numberOfNights * $selectInfo['price']) * $_POST['qualityRooms'];
                $totalPrice = $total / 2;
                $data1 = [
                    'status' => 'Trống'
                ];
                $updateBookRoom->updateStatus($bookroomId, $data1, 'bookroomId', 'rooms', 'roomId');
                var_dump($updateBookRoom);
//                exit();
                $data = [
                    'dayStart' => $userDayStart,
                    'dayEnd' => $userDayEnd,
                    'qualityUser' => $_POST['qualityUser'],
                    'qualityRooms' => $_POST['qualityRooms'],
                    'payment' => $totalPrice,
                    'roomId' => $roomId['roomId'],
                    'status' => 'Chờ xác nhận'
                ];
            } else {
                $_SESSION['error'] = "Hiện số lượng không đủ đáp ứng";
                header("Location:" . ROOT_URL . "?url=BookRoomAdminController/editValue/" . $bookroomId);
                exit();
            }

        } else {
            $roomId = $checkRooms->getRoomIdByRoomTypeId('roomtypes', 'roomTypeId',
                'roomTypeId', $checkTypeRoom['roomTypeId'],
                'status', 'Trống', 'roomId');
            $data = [
                'status' => 'Trống'
            ];
            $updateBookRoom->updateStatus($bookroomId, $data, 'bookroomId', 'rooms', 'roomId');
//            var_dump('sjahd', $roomId);
//            exit();
            $userDayStart = date('Y-m-d H:i:s', strtotime($_POST['dayStart']));
            $userDayEnd = date('Y-m-d H:i:s', strtotime($_POST['dayEnd']));

            if ($userDayStart < $roomId[0]['dayStart']) {
                echo "Ngày bắt đầu phải lớn hơn: " . $roomId[0]['dayStart'];
                header("Location:" . ROOT_URL . "?url=BookRoomAdminController/editValue/" . $bookroomId);
            }

            if ($userDayEnd <= $userDayStart) {
                echo "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                header("Location:" . ROOT_URL . "?url=BookRoomAdminController/editValue/" . $bookroomId);
            }
        }


//        $checkRoom = $updateBookRoom->checkRoomId('rooms', 'roomId', 'roomId', $roomId['roomId']);

//        $checkStatusRoom = $checkRooms->checkStatus('roomId', $roomId['roomId'], 'status', 'Trống', 'roomId');
//        var_dump($checkStatusRoom);




        echo '<pre>';
        var_dump($data);
//        exit();
        if ($roomId) {
            $_SESSION['success'] = 'Thay đổi thông tin thành công';
            $updateBookRoom->updateBookRoom($bookroomId, $data, 'bookroomId');
            $bookDay = date('Y-m-d');
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableBookRooms");
            $mail->updateBookRoom($_SESSION['users']['email'], $_SESSION['users']['fullName'], $bookDay,
                $data['dayStart'], $data['dayEnd'], $data['qualityUser']);
        } else {
            $_SESSION['error'] = 'Không có phòng trống loại này. Hãy chọn phòng khác';
            header("Location:" . ROOT_URL . "?url=BookRoomAdminController/editValue/" . $bookroomId);
        }

    }

}