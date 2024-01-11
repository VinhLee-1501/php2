<?php
require_once 'model.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
if (isset($email)){
    echo 'Email '.$email.' cua: ';
}else{
    echo '';
}
$user = getUser($email);

require_once 'view.php';