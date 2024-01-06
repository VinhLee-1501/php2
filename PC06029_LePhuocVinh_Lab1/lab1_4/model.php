<?php

function getUserLab1_4()
{
    global $connection;
    require_once 'connect.php';
    $sql = "SELECT * FROM users";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}