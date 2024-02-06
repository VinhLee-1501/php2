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


    function createInfoRoom()
    {

        $data = [
            'nameRoom' => $_POST['nameRoom'],
            'price' => $_POST['price'],
            'describtion' => $_POST['describtion'],
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