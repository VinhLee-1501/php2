<?php
require_once 'model.php';

$email = $_POST['email'] ? $_POST['email'] : '';
if (isset($email)){
    echo 'Email '.$email.' cua: ';
}else{
    echo 'no email';
}
$user = getUser($email);

require_once 'view.php';