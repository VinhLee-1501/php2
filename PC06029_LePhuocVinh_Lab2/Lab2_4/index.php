<?
require_once __DIR__.'/vendor/autoload.php';
spl_autoload_register(function ($class){
   require_once $class.'tableOrderFinish.php';
});

use App\Home as home;
$objHome = new home();
?>

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

</body>
</html>
