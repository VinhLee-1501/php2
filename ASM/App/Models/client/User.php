<?php

namespace App\Models\client;

use App\Models\BaseModel;

class User extends BaseModel
{
    function getInfoUser($condition, $id)
    {
        return $this->getOne($condition, $id);
    }

    function registerUser($array)
    {
        return $this->create($array);
    }

    function updatePass($email, $data)
    {
        return $this->updateFromEmail($email, $data);
    }

    function updateInfoPsn(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }

    function updateImg(int $id, array $data, $id2)
    {
        return $this->update($id, $data, $id2);
    }

}