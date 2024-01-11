<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

spl_autoload_register(function ($class) {
//    var_dump($class.'.php');
    require_once $class.'.php';
});

use \App\Database as Db;

$db = new Db();
?>

Home page
</body>
</html>