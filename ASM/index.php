<?php
session_start();
//ob_start();
require_once 'vendor/autoload.php';
require_once 'App/Helpers/PHPMailer/Mailer.php';
define ("ROOT_URL", "http://localhost:8000/");

//use App\Controllers\client\HomeClientController;
use App\Core\Route;
$route = new Route();
use App\Helpers\PHPMailer\Mailer;
//use Dompdf\Dompdf;
new Mailer();
//use App\Models\User;
//$user = new User();
//var_dump($user->getInfo(1));


ob_end_flush();