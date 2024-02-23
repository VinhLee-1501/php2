<?php

namespace App\Controllers\client;

use App\Core\BaseRender;
use App\Models\client\RoomClient;
use App\Models\client\User;


class HomeClientController extends BaseClientController
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

    function homePage()
    {
        // dữ liệu ở đây lấy từ repositories hoặc model
        $table = new RoomClient('rooms');
        $data = $table->getLimit('roomtypes', 'price', 'describtion',
            'roomId', 'img', 'roomTypeId', 'roomTypeId', 'nameType', 4);
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/home', $data);
        $this->_renderBase->renderClientFooter();
    }

    public function roomsPage()
    {
        $table = new RoomClient('rooms');
        $data = $table->getInfoUnique('roomtypes', 'price', 'describtion',
                        'roomId', 'img', 'roomTypeId', 'roomTypeId', 'nameType');
//        var_dump($data);
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/rooms', $data);
        $this->_renderBase->renderClientFooter();
    }

    function roomDetailPage($roomId)
    {
        $table = new RoomClient('rooms');
        $data = $table->getInfoUniqueWhere('roomtypes', 'price', 'describtion',
                        'roomId', 'img', 'roomTypeId', 'roomTypeId',
                        'nameType', $roomId);
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/room-details', $data);
        $this->_renderBase->renderClientFooter();
    }

    function aboutUsPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/about-us');
        $this->_renderBase->renderClientFooter();
    }

    function contactPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/contact');
        $this->_renderBase->renderClientFooter();
    }

    function blogPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/blog');
        $this->_renderBase->renderClientFooter();
    }

    function blogDetailPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/blog-details');
        $this->_renderBase->renderClientFooter();
    }

    function profile()
    {
        if (isset($_SESSION['users'])){
            $Info = new User('users');
            $data = $Info->getInfoUser('email', $_SESSION['users']['email']);
        }
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/profile', $data);
        $this->_renderBase->renderClientFooter();
    }

    function service()
    {
       if (isset($_SESSION['users'])){
           $getInfoPsn = new RoomClient('bookrooms');
           $data = $getInfoPsn->selectInfoBookRoom('rooms', 'roomtypes', 'users',
                                        'roomId', 'roomId', 'roomTypeId',
                                        'roomTypeId', 'nameType', 'userId',
                                        'userId', $_SESSION['users']['userId'], 'status',
                                        'Chờ xác nhận', 'roomTypeId');
       }

        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/service', $data);
        $this->_renderBase->renderClientFooter();
    }

}