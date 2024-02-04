<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class RoomAdmin extends BaseModel
{
    function getAllRoom()
    {
        return $this->getAll();
    }

    function getOneInfo($condition, $id)
    {
        return $this->getOne($condition, $id);
    }

    function crateDataRoom(array $data)
    {
        return $this->create($data);
    }
}