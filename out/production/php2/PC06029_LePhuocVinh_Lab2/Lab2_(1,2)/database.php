<?php
namespace PC06029_LePhuocVinh_Lab2\Lab2_3;

use mysqli;

class Database{
    public function __construct(){
        $conn = new mysqli('localhost','root','mysql', 'hotelmanagement');

        if(!$conn){
            die("Connection failed: ". $conn->connect_error());
        }

        echo "Connection successful";
    }
    public function HelloWord(){
        echo "Hello Word";
    }

}

?>