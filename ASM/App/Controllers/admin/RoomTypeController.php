<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Models\admin\RoomType;

class RoomTypeController extends BaseAdminController
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

    function createPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/roomtype/create');
        $this->_renderBase->renderAdminFooter();
    }

    function updatePage($roomTypeId)
    {
        $table = new RoomType('roomtypes');
        $data = $table->getInfoOne('roomTypeId', $roomTypeId);
//        var_dump($data);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/roomtype/update', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function store()
    {
        if (!empty($_POST['nameType']) && !empty($_POST['utilities'])){
            $table = new RoomType('roomtypes');
            $data = [
                'nameType' => $_POST['nameType'],
                'utilities' => $_POST['utilities']
            ];
            $result = $table->createData($data);
            if ($result){
                $_SESSION['success'] = 'Thêm thành công';
                header("Location:". ROOT_URL. "?url=HomeAdminController/tableRoomType");
            }else{
                $_SESSION['error'] = 'Thêm thất bại';
                header("Location:". ROOT_URL. "?url=RoomTypeController/createPage");
            }
        }else{
            $_SESSION['error'] = 'Hãy điền đầy đủ thông tin';
            header("Location:". ROOT_URL. "?url=RoomTypeController/createPage");
        }
    }

    function updateData($roomTypeId)
    {
        if (!empty($_POST['nameType']) && !empty($_POST['utilities'])){
            $table = new RoomType('roomtypes');
            $data = [
                'nameType' => $_POST['nameType'],
                'utilities' => $_POST['utilities']
            ];
            $result = $table->updateData($roomTypeId, $data, 'roomTypeId');
            if ($result){
                $_SESSION['success'] = 'Cập nhật thành công';
                header("Location:". ROOT_URL. "?url=HomeAdminController/tableRoomType");
            }else{
                $_SESSION['error'] = 'Cập nhật thất bại';
                header("Location:". ROOT_URL. "?url=RoomTypeController/updatePage/".$roomTypeId);
            }
        }else{
            $_SESSION['error'] = 'Hãy điền đầy đủ thông tin';
            header("Location:". ROOT_URL. "?url=RoomTypeController/updatePage/".$roomTypeId);
        }
    }


    function hiddenData($roomTypeId)
    {
        $table = new RoomType('roomtypes');
        $status = $table->getConditionData('status', 'roomTypeId', $roomTypeId, 'Ẩn');
        if ($status){
            $data = [
                'status' => 'Hiện'
            ];
        }else{
            $data = [
                'status' => 'Ẩn'
            ];
        }
        $result = $table->hidden($roomTypeId, $data, 'roomTypeId');
        if ($result){
            $_SESSION['success'] = 'Thành công';
            header("Location:". ROOT_URL. "?url=HomeAdminController/tableRoomType");
        }else{
            $_SESSION['error'] = 'Xảy ra lỗi';
            header("Location:". ROOT_URL. "?url=RoomTypeController/updatePage/".$roomTypeId);
        }
    }
}