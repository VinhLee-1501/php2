<?php

namespace App\Models;

class User extends BaseModel{

    protected $table = 'users';


    public function getAllUser(){
        return $this->getAll();
    }

    public function getInfo($userId)
    {
        return $this->getOne($userId);
    }
}