<?php

namespace App\models;

class BaseModel implements \App\Interfaces\ModelInterface
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        echo $table . '<br>';
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function getOne($id, $condition)
    {
        echo 'THis is getOne';
        // TODO: Implement getOne() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }
}