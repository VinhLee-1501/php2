<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Models\admin\RoomAdmin;
use App\Models\client\Room;

class RoomAdminController extends BaseAdminController
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

    function updateData($roomId)
    {
        $form = new RoomAdmin('rooms');
        $data = $form->getForm('roomtypes', 'roomTypeId', 'roomId', $roomId);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/rooms/update', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function hidden($roomId)
    {
        $hidden = new RoomAdmin('rooms');
        $status = $hidden->getOneInfo('status', 'roomId', $roomId, 'Bảo trì');
        $status2 = $hidden->getOneInfo('status', 'roomId', $roomId, 'Đầy');
        if ($status2){
            $_SESSION['error'] = 'Dịch vụ đang được sử dụng';
            header("Location:".ROOT_URL."?url=HomeAdminController/tableRoom");
            exit();
        }else{
            if ($status){
                $data = [
                    'status' => 'Trống'
                ];
            }else{
                $data = [
                    'status' => 'Bảo trì'
                ];
            }
        }

        var_dump($data);
        var_dump($roomId);
//        exit();
        $result = $hidden->updateValue($roomId, $data,'roomId');
        if ($result) {
            $_SESSION['success'] = 'Cập nhật thành công';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableRoom");
        } else {
            $_SESSION['error'] = 'Cập nhật thất bại';
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableRoom");
        }
    }

    function updateInfoRoom($roomId)
    {
        $table = new RoomAdmin('rooms');

        if (!empty($_POST['nameRoom']) && !empty($_POST['price']) && !empty($_POST['roomTypeId'])){
            $data = [
                'nameRoom' => $_POST['nameRoom'],
                'price' => $_POST['price'],
                'roomTypeId' => $_POST['roomTypeId'],
                'describtion' => $_POST['describtion']
            ];
            var_dump($data);
//        exit();
            $result = $table->updateValue($roomId, $data, 'roomId');
            if ($result) {
                $_SESSION['success'] = 'Cập nhật thành công';
                header("Location:" . ROOT_URL . "?url=HomeAdminController/tableRoom");
            } else {
                $_SESSION['error'] = 'Cập nhật thất bại';
                header("Location:" . ROOT_URL . "?url=RoomAdminController/updateData/".$roomId);
            }
        }else{
            $_SESSION['error'] = 'Hãy điền đầy đủ thông tin';
            header("Location:" . ROOT_URL . "?url=RoomAdminController/updateData/".$roomId);
        }
    }


    function createInfoRoom()
    {

        if (empty($_POST['nameRoom']) && empty($_POST['price']) && empty($_POST['description']) && empty($_POST['roomTypeId'])){
            $data = [
                'nameRoom' => $_POST['nameRoom'],
                'price' => $_POST['price'],
                'describtion' => $_POST['describtion'],
                'roomTypeId' => $_POST['roomTypeId']
            ];

            $tableRoom = new RoomAdmin('rooms');
            var_dump($data);
            exit();
            $result = $tableRoom->crateDataRoom($data);
            var_dump($result);

            if ($result) {
                header("Location:" . ROOT_URL . "?url=HomeAdminController/tableRoom");
            } else {
                header("Location:" . ROOT_URL . " ?url=HomeAdminController/Create");
            }
        }
    }

}