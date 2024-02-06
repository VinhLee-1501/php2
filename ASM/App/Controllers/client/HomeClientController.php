<?php

namespace App\Controllers\client;

use App\Core\BaseRender;

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
        $data = [
            "products" => [
                [
                    "id" => 1,
                    "name" => "Sản phẩm"
                ]
            ]
        ];

        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/home', $data);
        $this->_renderBase->renderClientFooter();
    }

    public function roomsPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/rooms');
        $this->_renderBase->renderClientFooter();
    }

    function roomDetailPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('client/page/room-details');
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

}