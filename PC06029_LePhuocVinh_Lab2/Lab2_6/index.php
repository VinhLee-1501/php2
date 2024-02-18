<?php
require 'vendor/autoload.php';

spl_autoload_register(function ($class_name){
    require_once $class_name.'tableOrderFinish.php';
});

use App\Controller\BaseControl as con;
use App\Core\Router as Rou;
use App\Model\BaseModel as Md;

$con = new con();
$rou = new Rou();
$md = new Md();
$con->ControlClass();
echo '<br/>';
$rou->myClassRoute();
echo '<br/>';
$md->myClass();