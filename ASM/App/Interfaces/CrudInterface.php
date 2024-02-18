<?php

namespace App\Interfaces;

interface CrudInterface{

    /**
     * Phương thức getAll() dùng để lấy tất cả records
     */
    public function getAll();

    /**
     * Phương thức getOne() dùng để lấy một record
     * @param int $id
     * @return array $record
     */
    public function getOne($condition,  $id);

    /**
     * Phương thức create dùng để tạo mới dữ liệu
     * @return mixed
     */
    public function create(array $data);


    public function update(int $id, array $data, $id2);

    public function delete($condition, int $id): bool;
}