<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class RoomAdmin extends BaseModel
{
    function getAllRoom($table2, $condition1, $condition2, $condition3)
    {
        return $this->getJoin($table2, $condition1, $condition2, $condition3);
    }

    function getOneInfo($condition, $condition2, $id, $condition3)
    {
        return $this->getCondition_2($condition, $condition2, $id, $condition3);
    }

    function crateDataRoom(array $data)
    {
        return $this->create($data);
    }

    function selectRoomId($table2, $condition1, $condition2, $condition3, $condition4)
    {
        return $this->getJoinWhereOne($table2, $condition1, $condition2, $condition3, $condition4);
    }

    function updateValue(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }

    function selectType($condition, $id)
    {
        return $this->getOne($condition, $id);
    }

    function getRoomIdByRoomTypeId($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6)
    {
        return $this->getJoicheck($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6);
    }

    function insertBookRoom($array)
    {
        return $this->create($array);
    }

    function getForm($table2, $condition1, $condition2, $condition3)
    {
        return $this->getJoinWhere_2($table2, $condition1, $condition2, $condition3);
    }

    function checkDay($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5)
    {
        return $this->getJoin2Table($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5);
    }

    function getRoomIdByRoomTypeId_2($table2, $condition1, $condition2, $condition3, $condition6)
    {
        return $this->getJoicheck_2($table2, $condition1, $condition2, $condition3, $condition6);
    }
}