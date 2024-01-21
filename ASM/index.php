<?php
require_once 'vendor/autoload.php';

use App\models\User;

$user = new User('user');
$user->getOne(1, 1);