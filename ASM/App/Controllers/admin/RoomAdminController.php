<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Models\admin\RoomAdmin;

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

    function tableRoom()
    {
        $tableRoom = new Room('rooms');
        $data = $tableRoom->getAllRoom();

        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/rooms/tableRoom', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function createInfoRoom()
    {

        $data = [
            'nameRoom' => $_POST['nameRoom'],
            'price' => $_POST['price'],
            'describe' => $_POST['describe'],
            'roomTypeId' => $_POST['roomTypeId'],
            'status' => $_POST['status']
        ];

        $tableRoom = new RoomAdmin('rooms');
        $result = $tableRoom->crateDataRoom($data);
        var_dump($result);
//        exit();
        if ($result) {
            header("Location:" . ROOT_URL . "?url=HomeAdminController/tableRoom");
        } else {
            header("Location:" . ROOT_URL . " ?url=HomeAdminController/Create");
        }
    }
}