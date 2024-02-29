<?php

namespace App\Models\client;

use App\Models\BaseModel;

class RoomClient extends BaseModel
{
    function getLimit($table2, $condition1, $condition2, $condition3,
                      $condition4, $condition5, $condition6, $condition7, $limit)
    {
        return $this->getGroupByLimit($table2, $condition1, $condition2, $condition3,
            $condition4, $condition5, $condition6, $condition7, $limit);
    }

    function Condition($condition)
    {
        return $this->getWhere_2($condition);
    }


    function selectType($condition, $id)
    {
        return $this->getOne($condition, $id);
    }

    function selectCondition($condition, $condition2, $id)
    {
        return $this->getCondition($condition, $condition2, $id);
    }

    function getInfoUnique($table2, $condition1, $condition2, $condition3,
                           $condition4, $condition5, $condition6, $condition7)
    {
        return $this->getGroupBy($table2, $condition1, $condition2, $condition3,
                                $condition4, $condition5, $condition6, $condition7);
    }

    function getInfoUniqueWhere($table2, $condition1, $condition2, $condition3,
                                $condition4, $condition5, $condition6, $condition7, $condition8)
    {
        return $this->getGroupByWhere($table2, $condition1, $condition2, $condition3,
            $condition4, $condition5, $condition6, $condition7, $condition8);
    }

    function getRoomIdByRoomTypeId($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6)
    {
        return $this->getJoicheck($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6);
    }

    function getRoomIdByRoomTypeId_2($table2, $condition1, $condition2, $condition3, $condition6)
    {
        return $this->getJoicheck_2($table2, $condition1, $condition2, $condition3, $condition6);
    }

    function checkStatus($condition, $id, $condition2, $condition3, $condition4)
    {
        return $this->check($condition, $id, $condition2, $condition3, $condition4);
    }

    function checkDay($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6)
    {
        return $this->getJoin2Table_2($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5,$condition6);
    }

    function insertBookRoom($array)
    {
        return $this->create($array);
    }

    function updateBookRoom(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }

    function selectInfoBookRoom($table2, $table3, $table4, $condition1,
                                $condition2, $condition3, $condition4,
                                $condition5, $condition6, $condition7,
                                $condition8, $condition9, $condition10, $condition11)
    {
        return $this->getJoin3Tbale($table2, $table3, $table4, $condition1,
                                $condition2, $condition3, $condition4,
                                $condition5, $condition6, $condition7,
                                $condition8, $condition9, $condition10, $condition11);
    }

    function checkRoomId($table2, $condition1, $condition2, $condition3)
    {
        return $this->getJoinWhere($table2, $condition1, $condition2, $condition3);
    }

    function getForm($table2, $condition1, $condition2, $condition3)
    {
        return $this->getJoinWhere_2($table2, $condition1, $condition2, $condition3);
    }

    function deleteService($condition, int $id)
    {
        return $this->delete($condition, $id);
    }

    function selectDesc($condition1, $condition2)
    {
        return $this->descSelect($condition1, $condition2);
    }

    function dataSearch($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6, $condition7, $keyword)
    {
        return $this->getDataSearch($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6, $condition7, $keyword);
    }

    function selectNoti($table2, $condition1, $condition2, $condition3)
    {
        return $this->getJoinWhere_2($table2, $condition1, $condition2, $condition3);
    }

    function deleteData($condition, int $id)
    {
        return $this->delete($condition, $id);
    }
}