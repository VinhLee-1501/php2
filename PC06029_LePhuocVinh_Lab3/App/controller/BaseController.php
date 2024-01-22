<?php

namespace App\controller;

use App\model\BaseModel;

class BaseController extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        echo BaseModel::create() . '<br>';
        echo BaseModel::read() . '<br>';
        echo BaseModel::update() . '<br>';
        echo BaseModel::delete();
    }
}