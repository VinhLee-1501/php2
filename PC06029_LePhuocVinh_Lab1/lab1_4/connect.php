<?php
$connection = new mysqli('localhost', 'root', 'mysql', 'hotelmanagement');

if ($connection->connect_errno) {
    die('Erro: ' . $connection->connect_errno);
}
echo '';