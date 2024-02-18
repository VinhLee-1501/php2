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


    // //////////////Get All
    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->table";

        // return $this;

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ////////////////Get One
    public function getOne($condition,  $id)
    {
        $this->_query = "SELECT * FROM $this->table  WHERE $condition = '$id'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        //        return [];
    }

    public function getWhere($condition,  $id)
    {
        $this->_query = "SELECT * FROM $this->table  WHERE $condition = '$id'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //        return [];
    }

    public function getCondition($condition, $condition2, $id)
    {
        $this->_query = "SELECT $condition FROM $this->table  WHERE $condition2 = '$id'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        //        return [];
//        return $this->_query;
    }

    public function getCondition_2($condition, $condition2, $id, $condition3)
    {
        $this->_query = "SELECT $condition FROM $this->table  WHERE $condition2 = '$id' AND $condition = '$condition3'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        //        return [];
//        return $this->_query;
    }


    // /////////////////Get Join
    public function getJoin($table2, $condition1, $condition2, $condition3)
    {
        $this->_query = "SELECT t1.*, t2.$condition3 FROM $this->table AS t1 JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition2";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoinWhere($table2, $condition1, $condition2, $condition3)
    {
        $this->_query = "SELECT t1.*, t2.* FROM $this->table AS t1 
                        JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition2
                        WHERE t1.$condition1 = '$condition3'";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoinWhere_2($table2, $condition1, $condition2, $condition3)
    {
        $this->_query = "SELECT t1.*, t2.* FROM $this->table AS t1 
                        JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition1
                        WHERE t1.$condition2 = '$condition3'";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoinWhereOne($table2, $condition1, $condition2, $condition3, $condition4)
    {
        $this->_query = "SELECT t1.$condition1 FROM $this->table AS t1 
                        JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition2
                        WHERE t2.$condition3 = '$condition4'";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoin4Tbale($table2, $table3, $table4, $condition1,
                                  $condition2, $condition3, $condition4,
                                  $condition5, $condition6, $condition7,
                                  $condition8, $condition9, $condition10)
    {
        $this->_query = "SELECT t1.*, t2.$condition5, t4.$condition8 FROM $this->table AS t1
                        JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition2
                        JOIN $table3 AS t3 ON t3.$condition3 = t2.$condition4
                        JOIN $table4 AS t4 ON t4.$condition6 = t1.$condition7
                        WHERE t1.$condition9 = '$condition10'";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoin3Tbale($table2, $table3, $table4, $condition1,
                                  $condition2, $condition3, $condition4,
                                  $condition5, $condition6, $condition7,
                                  $condition8, $condition9, $condition10)
    {
        $this->_query = "SELECT t1.*, t4.*, t3.$condition5 FROM $this->table AS t1
                         JOIN $table2 AS t2 ON t2.$condition1 = t1.$condition2
                         JOIN $table3 AS t3 ON t3.$condition3 = t2.$condition4
                         JOIN $table4 AS t4 ON t4.$condition6 = t1.$condition7
                         WHERE t1.$condition6 = '$condition8' AND t1.$condition9 = '$condition10'";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoin5Tbale($table2, $table3, $table4, $table5, $condition1,
                                  $condition2, $condition3, $condition4,
                                  $condition5, $condition6, $condition7,
                                  $condition8, $condition9, $condition10, $condition11)
    {
        $this->_query = "SELECT t1.*, t2.$condition1, t2.$condition2, t3.$condition3,
                        t4.$condition4, t5.$condition5
                        FROM $this->table AS t1
                         JOIN $table2 AS t2 ON t2.$condition6 = t1.$condition6
                         JOIN $table3 AS t3 ON t3.$condition7 = t2.$condition7
                         JOIN $table4 AS t4 ON t4.$condition8 = t3.$condition8
                         JOIN $table5 AS t5 ON t5.$condition9 = t1.$condition9
                         WHERE t1.$condition10 = '$condition11'";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJoin4Tbale_2($table2, $table3, $table4, $condition1,
                                  $condition2, $condition3, $condition4,
                                  $condition5, $condition6, $condition7,
                                  $condition8, $condition9, $condition10)
    {
        $this->_query = "SELECT t1.*, t3.$condition5, t3.$condition3, t4.$condition8 FROM $this->table AS t1
                        JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition2
                        JOIN $table3 AS t3 ON t3.$condition3 = t2.$condition4
                        JOIN $table4 AS t4 ON t4.$condition6 = t1.$condition7
                        WHERE t1.$condition9 = '$condition10'";

        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    public function getJoin2Table($table2, $table3, $condition1, $condition2, $condition3, $condition4)
//    {
//        $this->_query = "SELECT t1.*, t2.*, t3.$condition1 FROM $this->table AS t1
//                        JOIN $table2 AS t2 ON t1.$condition1 = t2.$condition2
//                        JOIN $table3 AS t3 ON t1.$condition1 = t3.$condition3
//                        WHERE t1.$condition1 = '$condition4'";
//
//        $stmt = $this->_connection->PdO()->prepare($this->_query);
//        $stmt->execute();
//
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }

    function getJoicheck($table2, $condition1, $condition2, $condition3, $condition4, $condition5, $condition6)
    {
        $this->_query = "SELECT t1.$condition6 FROM $this->table AS t1
                        JOIN $table2 AS t2 ON t2.$condition1 = t1.$condition2
                        WHERE t2.$condition1 = '$condition3' AND t1.$condition4 = '$condition5'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
//        return $result;
    }

    // ////////////////////Get group by data
    function getGroupBy($table2, $condition1, $condition2, $condition3,
                        $condition4, $condition5, $condition6, $condition7)
    {
        $this->_query = "SELECT MIN(t1.$condition1) AS price, GROUP_CONCAT(t1.$condition2) AS describtion, 
                        GROUP_CONCAT(DISTINCT t1.$condition3) AS roomId, 
                        GROUP_CONCAT(DISTINCT t1.$condition4) AS img, t2.$condition7
                        FROM $this->table AS t1
                        JOIN $table2 AS t2 ON t2.$condition5 = t1.$condition6
                        GROUP BY t1.$condition6";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getGroupByWhere($table2, $condition1, $condition2, $condition3,
                        $condition4, $condition5, $condition6, $condition7, $condition8)
    {
        $this->_query = "SELECT MIN(t1.$condition1) AS price, GROUP_CONCAT(t1.$condition2) AS describtion, 
                        GROUP_CONCAT(DISTINCT t1.$condition3) AS roomId, 
                        GROUP_CONCAT(DISTINCT t1.$condition4) AS img, t2.$condition7,
                        t2.$condition5 AS roomTypeId
                        FROM $this->table AS t1
                        JOIN $table2 AS t2 ON t2.$condition5 = t1.$condition6
                        WHERE t1.$condition3 = '$condition8'
                        GROUP BY t1.$condition6
                       ";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // //////////////////Insert data
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

    public function update(int $id, array $data, $id2)
    {
        $this->_query = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $this->_query.= "$key = :$key, ";
        }
        $this->_query = rtrim($this->_query, ", ");

        $this->_query.= " WHERE $id2 = $id";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    function updateJoin(int $id, array $data, $id2, $table2, $condition)
    {
        $this->_query = "UPDATE $this->table AS t1";
        $this->_query.= " INNER JOIN $table2 AS t2 ON t1.$condition = t2.$condition";
        $this->_query.= " SET ";

        foreach ($data as $key => $value) {
            $this->_query.= "t2.$key = :$key, ";
        }

        $this->_query = rtrim($this->_query, ", ");
        $this->_query.= " WHERE t1.$id2 = $id";

        $stmt = $this->_connection->PdO()->prepare($this->_query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();

    }

    public function delete($condition, int $id): bool
    {
        $this->_query = "DELETE FROM $this->table WHERE $condition = '$id'";

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


    function getGroupByLimit($table2, $condition1, $condition2, $condition3,
                        $condition4, $condition5, $condition6, $condition7, $limit)
    {
        $this->_query = "SELECT MIN(t1.$condition1) AS price, GROUP_CONCAT(t1.$condition2) AS describtion, 
                        GROUP_CONCAT(DISTINCT t1.$condition3) AS roomId, 
                        GROUP_CONCAT(DISTINCT t1.$condition4) AS img, t2.$condition7
                        FROM $this->table AS t1
                        JOIN $table2 AS t2 ON t2.$condition5 = t1.$condition6
                        GROUP BY t1.$condition6 LIMIT $limit";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function limit(int $limit, $table2, $condition1, $condition2)
     {
         $this->_query = "SELECT * FROM $this->table JOIN $table2 ON $this->table.$condition1 = $table2.$condition2 limit $limit";
         $stmt   = $this->_connection->PdO()->prepare($this->_query);
         $stmt->execute();

         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

    public function emailExists($email) {
        $this->_query = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    function check($condition, $id, $condition2, $condition3, $condition4)
    {
        $this->_query = "SELECT $condition4 FROM $this->table  WHERE $condition = '$id' AND $condition2 = '$condition3'";
        $stmt = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result[$condition4];
    }

}
