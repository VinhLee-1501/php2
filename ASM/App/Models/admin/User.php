<?php

namespace App\Models\admin;

use App\Models\BaseModel;

class User extends BaseModel
{
    function getAllInfo()
    {
        return $this->getAll();
    }

    function store(array $data)
    {
        return $this->create($data);
    }

    function selectUserId($table2, $condition1, $condition2, $condition3, $condition4)
    {
        return $this->getJoinWhereOne($table2, $condition1, $condition2, $condition3, $condition4);
    }

    function selectOne($condition, $condition2, $id)
    {
        return $this->getCondition($condition, $condition2, $id);
    }

    function selectConfition($condition, $condition2, $id, $condition3)
    {
        return $this->getCondition_2($condition, $condition2, $id, $condition3);
    }

    function hidden(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }
}