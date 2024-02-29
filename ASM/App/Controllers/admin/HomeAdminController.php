<?php

namespace App\Controllers\admin;

use App\Core\BaseRender;
use App\Models\admin\BookRoom;
use App\Models\admin\OrderAdmin;
use App\Models\admin\RoomAdmin;
use App\Models\admin\RoomType;
use App\Models\admin\User;

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
            $table = new OrderAdmin('orders');
            $data = $table->totalPrice('bookrooms', 'rooms', 'createDay',
                'dayEnd', 'dayStart', 'price', 'bookroomId', 'roomId');
            $data2 = $table->totalToday('bookrooms', 'rooms', 'dayEnd',
                'dayStart', 'price', 'bookroomId', 'roomId',
            'createDay');

//            global $dataAll;
            $dataAll = [$data, $data2];
            $this->_renderBase->renderAdminHeader();
            $this->_renderBase->renderAdminNavBar();
            $this->load->render('admin/page/home', ['dataAll' => $dataAll]);
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
        $data = $tableRoom->getAllRoom('roomTypes', 'roomTypeId', 'roomTypeId', 'nameType');

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
        $this->load->render('admin/page/roomtype/tableCateRoom', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function tableBookRooms()
    {
        $tableBookRoom = new BookRoom('bookrooms');
        $data = $tableBookRoom->getAllBRTable('rooms', 'roomtypes', 'users',
            'roomId', 'roomId', 'roomTypeId', 'roomTypeId',
            'nameRoom', 'userId', 'userId', 'fullName',
                        'status', 'Chờ xác nhận');

        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/bookRoom/tableBookRoom', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function tableBookRooms_CO()
    {
        $tableBookRoom = new BookRoom('bookrooms');
        $data = $tableBookRoom->getAllBRTable('rooms', 'roomtypes', 'users',
            'roomId', 'roomId', 'roomTypeId', 'roomTypeId',
            'nameRoom', 'userId', 'userId', 'fullName',
            'status', 'Xác nhận');
//        var_dump($data);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/bookRoom/tableBookRoom_C-O', $data);
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
        $table = new OrderAdmin('orders');
        $user = new User('user');
        $data = $table->selectData('bookrooms', 'rooms', 'roomtypes',
                                    'users', 'dayStart', 'dayEnd',
                                'price', 'nameType', 'fullName',
                                    'bookroomId', 'roomId', 'roomTypeId',
                                    'userId', 'status', 'Chờ');


        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/order/tableOrder', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function tableOrderFinish()
    {
        $table = new OrderAdmin('orders');
        $user = new User('user');
        $data = $table->selectData('bookrooms', 'rooms', 'roomtypes',
            'users', 'dayStart', 'dayEnd',
            'price', 'nameType', 'fullName',
            'bookroomId', 'roomId', 'roomTypeId',
            'userId', 'status', 'Đã thanh toán');
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/order/tableOrderFinish', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function tableUser()
    {
        $tableUser = new User('users');
        $data = $tableUser->getAllInfo('status', 'Active');

        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderAdminNavBar();
        $this->load->render('admin/page/users/tableUser', $data);
        $this->_renderBase->renderAdminFooter();
    }
}