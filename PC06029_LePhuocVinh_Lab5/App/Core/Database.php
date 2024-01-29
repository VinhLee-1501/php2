<?php

namespace App\Core;

use mysqli;

class Database
{

    protected function connect()
    {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'mysql';
        $database = 'hotelmanagement';
        try {
            $conn = new mysqli($hostname, $username, $password, $database);
            if (!$conn) {
                die("Connection failed: " . $conn->connect_error());
            }
            return $conn;
        } catch (\Exception $e) {
            print "Connection failed: " . $e->getMessage();
            die();
        }
    }


}