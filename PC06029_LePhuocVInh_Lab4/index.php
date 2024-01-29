<?php
require_once 'vendor/autoload.php';

//use App\Core\Router;
//$router = new Router();
//$router->register('/', function (){
//    echo 'home';
//});
// echo $router->resolve($_SERVER['REQUEST_URI']);

use App\Core\Router as Router;

$route = new Router();
$route->register('/', function () {
    echo 'Home';
});
$route->register('/Invoices', function () {
    echo 'Invoices';
});
$route->register('/Invoices/create', function () {
    echo 'Create Invoices';
});

$route->register('/', [App\HomeLab4::class, 'index'])
    ->register('/Invoices', [App\Invoices::class, 'index'])
    ->register('/Invoices/create', [App\Invoices::class, 'create']);
echo $route->resolve($_SERVER['REQUEST_URI']);


$str = "Visit Microsoft!";
$pattern = "/microsoft/i";
echo preg_replace($pattern, "W3Schools", $str); // Outputs "Visit W3Schools!"




