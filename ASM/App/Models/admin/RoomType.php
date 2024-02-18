<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class RoomType extends BaseModel
{
    function getAllRoomType()
    {
        return $this->getAll();
    }

    function getInfoOne($condition, $id)
    {
        return $this->getOne($condition, $id);
    }

    function getConditionData($condition, $condition2, $id, $condition3)
    {
        return $this->getCondition_2($condition, $condition2, $id, $condition3);
    }

    function createData(array $data)
    {
        return $this->create($data);
    }

    function updateData(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }

    function hidden(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }
}