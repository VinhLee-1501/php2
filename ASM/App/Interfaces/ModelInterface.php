<?php

namespace App\Interfaces;

interface ModelInterface
{
    // Chứa các phương bắt buộc các hàm triển khai đều phải gọi (CRUD)
    public function create(array $data);

    public function getOne($id, $condition);

    public function update($id, array $data);

    public function delete($id);

    public function getAll();
}