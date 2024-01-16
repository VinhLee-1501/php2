<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../../public/assets/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../../public/assets/client/css/style.css" type="text/css">
</head>

<body>
<?php
include '../client/component/header.php';
?>
<!-- Header End -->

<!-- Hero Section Begin -->
<?php

if (isset($_SERVER['admin'])) {
    require_once 'App/views/admin/page/login.php';
} else {
    $action = 'home';
    if (isset($_GET['page'])) {
        $action = $_GET['page'];
    }

    switch ($action) {
        case 'home':
            require_once '../../../App/views/client/page/home.php';
            break;
        case 'login':
            require_once 'App/views/admin/page/login.php';
            break;
        case 'Rooms':
            require_once '../../../App/views/client/page/rooms.php';
            break;
        case 'detail_room':
            require_once '../../../App/views/client/page/room-details.php';
            break;
        case 'aboutUs':
            require_once '../../../App/views/client/page/about-us.php';
            break;
        case 'blogs':
            require_once '../../../App/views/client/page/blog.php';
            break;
        case 'detailBolg':
            require_once '../../../App/views/client/page/blog-details.php';
            break;
        case 'contact':
            require_once '../../../App/views/client/page/contact.php';
            break;
    }
}

?>
<!-- Blog Section End -->

<!-- Footer Section Begin -->
<?
require_once '../client/component/footer.php';
?>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="../../../public/assets/client/js/jquery-3.3.1.min.js"></script>
<script src="../../../public/assets/client/js/bootstrap.min.js"></script>
<script src="../../../public/assets/client/js/jquery.magnific-popup.min.js"></script>
<script src="../../../public/assets/client/js/jquery.nice-select.min.js"></script>
<script src="../../../public/assets/client/js/jquery-ui.min.js"></script>
<script src="../../../public/assets/client/js/jquery.slicknav.js"></script>
<script src="../../../public/assets/client/js/owl.carousel.min.js"></script>
<script src="../../../public/assets/client/js/main.js"></script>
</body>

</html>