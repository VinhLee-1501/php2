<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Models\admin\RoomAdmin;
use App\Models\admin\RoomType;

class HomeAdminController extends BaseAdminController
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

    function home()
    {
        if (!isset($_SESSION['admin'])) {
            $this->load->render('admin/page/login');
            exit();
        }else {
            $this->_renderBase->renderAdminHeader();
            $this->_renderBase->renderAdminNavBar();
            $this->load->render('admin/page/home');
            $this->_renderBase->renderAdminFooter();
        }

    }

    function loginAdmin()
    {
//        $this->_renderBase->renderAdminHeader();
//        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/login');
        $this->_renderBase->renderAdminFooter();
    }

    function tableRoom()
    {
        $tableRoom = new RoomAdmin('rooms');
        $data = $tableRoom->getAllRoom('roomTypes', 'roomTypeId', 'roomTypeId');

        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/rooms/tableRoom', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function tableRoomType()
    {
        $tableRoomType = new RoomType('roomtypes');
        $data = $tableRoomType->getAllRoomType();
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/tableCateRoom', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function tableBookRooms()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/bookRoom/tableBookRoom');
        $this->_renderBase->renderAdminFooter();
    }

    function createRoom()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/rooms/Create');
        $this->_renderBase->renderAdminFooter();
    }

    function tableOrder()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/tableOrder');
        $this->_renderBase->renderAdminFooter();
    }

    function tableUser()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/users/tableUser');
        $this->_renderBase->renderAdminFooter();
    }
}