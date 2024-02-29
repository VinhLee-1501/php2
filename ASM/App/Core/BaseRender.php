<?php

namespace App\Core;

use App\Controllers\client\BaseClientController;
use App\Models\admin\BookRoom;

class BaseRender extends BaseClientController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function renderClientFooter(){
        $this->load->render('client/component/footer');
    }

    public function renderClientHeader(){

        $this->load->render('client/component/header');
    }

    public function renderAdminHeader(){
        $table = new BookRoom('notifications');
        $data = $table->natifi();
        $this->load->render('admin/component/header', $data);
    }

    public function renderAdminNavBar(){
        $this->load->render('admin/component/navBar');
    }

    public function renderAdminFooter(){
        $this->load->render('admin/component/footer');
    }

}