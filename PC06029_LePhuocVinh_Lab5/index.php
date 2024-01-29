<?php
session_start();
require_once 'vendor/autoload.php';

// phpinfo();
use App\Core\Database;
use App\Core\Route;

$db = new Database();

$route = new Route();
?>


    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lab5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
              crossorigin="anonymous">
    </head>
    <body>
    <div class="container-md">
        <?php
        $route->get('/', [App\Core\HomeLab5::class, 'index'])
            ->post('/', [App\Core\HomeLab5::class, 'upload'])
            ->get('/login', [App\Core\LoginLab5::class, 'login'])
            ->post('/login', [App\Core\LoginLab5::class, 'submit'])
            ->get('/logout', [App\Core\LoginLab5::class, 'logout'])
            ->get('/BtnForgot', [App\Core\ForgotPassword::class, 'BtnForgot'])
            ->post('/ResetPassword', [App\Core\ForgotPassword::class, 'ResetPassword'])
            ->get('/newPassWord', [\App\Core\LoginLab5::class, 'newPassWord'])
            ->post('/updatePassword', [App\Core\ForgotPassword::class, 'updatePassword']);
        echo $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>
    </html>

<?php
ob_end_flush();
?>