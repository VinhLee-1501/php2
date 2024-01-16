<?php

class Database
{
    public function __construct()
    {
        $conn = new mysqli('localhost','root','mysql','hotelmanagement');
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        echo 'Connection';
    }
}