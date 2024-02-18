<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class BookRoom extends BaseModel
{
    function getAllBRTable($table2, $table3, $table4, $condition1,
                           $condition2, $condition3, $condition4,
                           $condition5, $condition6, $condition7,
                           $condition8, $condition9, $condition10)
    {
        return $this->getJoin4Tbale($table2, $table3, $table4, $condition1,
            $condition2, $condition3, $condition4,
            $condition5, $condition6, $condition7,
            $condition8, $condition9, $condition10);
    }

    function selectInfoBookRoom($table2, $table3, $table4, $condition1,
                                $condition2, $condition3, $condition4,
                                $condition5, $condition6, $condition7,
                                $condition8, $condition9, $condition10)
    {
        return $this->getJoin4Tbale_2($table2, $table3, $table4, $condition1,
            $condition2, $condition3, $condition4,
            $condition5, $condition6, $condition7,
            $condition8, $condition9, $condition10);
    }

    function updateBookRoom(int $id, array $data, $id2)
    {
        return $this->update ($id, $data, $id2);
    }

    function selectType($condition, $id)
    {
        return $this->getOne($condition, $id);
    }

    function updateStatus(int $id, array $data, $id2, $table2, $condition)
    {
        return $this->updateJoin($id, $data, $id2, $table2, $condition);
    }

    function getRoomIdByRoomTypeId($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6)
    {
        return $this->getJoicheck($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6);
    }


}