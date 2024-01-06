<?php
function getUser($email)
{
    global $connection;
    require_once 'config.php';
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    /*Get the result*/
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;
    }

    $connection->close();
}