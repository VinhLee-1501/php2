<?php

namespace App\Models;

use App\Interfaces\CrudInterface;
use PDO;

abstract class BaseModel implements CrudInterface
{

    protected $table;


    private $_connection;

    private $_query;

    public function __construct($table)
    {
        $this->table = $table;
        $this->_connection = new Database();
    }

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->table";

        // return $this;

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoin($table2, $condition1, $condition2)
    {
        $this->_query = "SELECT * FROM $this->table AS t1 JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition2";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOne($condition,  $id)
    {
        $this->_query = "SELECT * FROM $this->table  WHERE $condition = '$id'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
        //        return [];
    }

    public function create(array $data)
    {
        $this->_query = "INSERT INTO $this->table (";
        foreach ($data as $key => $value) {
            $this->_query .= "$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= " ) VALUES (";
        foreach ($data as $key => $value) {
            $this->_query .= "'$value', ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query .= ")";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        return $stmt->execute();
//        return $stmt;
    }

    public function update(int $id, array $data)
    {
        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query.= "$key = :$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query.= " WHERE id = $id";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function delete($condition, int $id): bool
    {
        $this->_query = "DELETE FROM $this->table WHERE $condition='$id'";

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }

    public function updateFromEmail($email, array $data) {

        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query.= "$key = :$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query.= " WHERE email = :email";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":email", $email);
        return $stmt->execute();
    }



    // public function orderBy(string $order = 'ASC')
    // {
    //     $this->_query = $this->_query . "order by " . $order;

    //     return $this;
    // }

    // public function get()
    // {
    //     $stmt   = $this->_connection->PdO()->prepare($this->_query);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }


    // public function limit(int $limit = 10)
    // {
    //     $stmt   = $this->_connection->PdO()->prepare($this->_query);
    //     $result = $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

}
