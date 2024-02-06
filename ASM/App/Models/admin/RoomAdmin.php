<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class RoomAdmin extends BaseModel
{
    function getAllRoom($table2, $condition1, $condition2)
    {
        return $this->getJoin($table2, $condition1, $condition2);
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