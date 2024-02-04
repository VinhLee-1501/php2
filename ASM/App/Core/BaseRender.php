<?php

namespace App\Core;

use App\Controllers\client\BaseClientController;

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
        $this->load->render('admin/component/header');
    }

    public function renderAdminNavBar(){
        $this->load->render('admin/component/navBar');
    }

    public function renderAdminFooter(){
        $this->load->render('admin/component/footer');
    }

}