<?php
namespace App;

use mysqli;

class Database{
    public function __construct(){
        $conn = new mysqli('localhost','root','mysql', 'hotelmanagement');

        if(!$conn){
            die("Connection failed: ". $conn->connect_error());
        }

        echo "Connection successful<br/>";
    }
    public function HelloWord(){
        echo "Hello Word";
    }

}

?>