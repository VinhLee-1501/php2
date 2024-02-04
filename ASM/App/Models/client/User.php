<?php

namespace App\Models\client;

use App\Models\BaseModel;

class User extends BaseModel
{
    function getInfoUser($condition, $id)
    {
        return $this->getOne($condition, $id);
    }

    function registerUser($array)
    {
        return $this->create($array);
    }
}