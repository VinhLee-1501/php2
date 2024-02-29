<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class OrderAdmin extends BaseModel
{
    function selectAll()
    {

    }
    function insertValue(array $data)
    {
        return $this->create($data);
    }

    function selectUserId($table2, $condition1, $condition2, $condition3, $condition4)
    {
        return $this->getJoinWhereOne($table2, $condition1, $condition2, $condition3, $condition4);
    }

    function selectData($table2, $table3, $table4, $table5, $condition1,
                        $condition2, $condition3, $condition4,
                        $condition5, $condition6, $condition7,
                        $condition8, $condition9, $condition10, $condition11)
    {
        return $this->getJoin5Tbale($table2, $table3, $table4, $table5, $condition1,
            $condition2, $condition3, $condition4,
            $condition5, $condition6, $condition7,
            $condition8, $condition9, $condition10, $condition11);
    }

    function orderConfirm(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }

    function deleteData($condition, int $id)
    {
        return $this->delete($condition, $id);
    }

    function totalPrice($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6)
    {
        return $this->total($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6);
    }

    function totalToday($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6)
    {
        return $this->totalMonth($table2, $table3, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6);
    }
}