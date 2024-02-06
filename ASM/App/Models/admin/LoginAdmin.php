<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class LoginAdmin extends BaseModel
{
    function getInfoAdmin($condition, $id)
    {
        return $this->getOne($condition, $id);
    }
}