<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class RoomType extends BaseModel
{
    function getAllRoomType()
    {
        return $this->getAll();
    }
}