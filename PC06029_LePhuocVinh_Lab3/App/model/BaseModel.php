<?php

namespace App\model;

use App\Interfaces\ModelInterfaces;

abstract class BaseModel implements ModelInterfaces
{
    public function __construct()
    {
        echo '<h3>Bài tập thêm Lab3</h3>';
    }

    public function create()
    {
        return 'This is create';
        // TODO: Implement create() method.
    }

    public function read()
    {
        return 'This is read';
        // TODO: Implement read() method.
    }

    public function update()
    {
        return 'This is update';
        // TODO: Implement update() method.
    }

    public function delete()
    {
        return 'This is delete';
        // TODO: Implement delete() method.
    }
}