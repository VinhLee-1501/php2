<?php
namespace App\controllers\admin;

class HomeController
{
    public function __construct()
    {
        require_once './App/views/admin/page/home.php';
    }
}