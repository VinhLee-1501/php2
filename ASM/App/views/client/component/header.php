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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Css Styles -->
    <link rel="stylesheet" href="../../../../public/assets/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../../../public/assets/client/css/style.css" type="text/css">
<!--    <link rel="stylesheet" href="path/to/your/css.css">-->
</head>

<body>
<header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
                        <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <?php
                        $table = new \App\Models\client\User('users');
                        $userId = $_COOKIE['userId'] ?? null;
                        $result = $table->getInfoUser('userId', $userId);
                        if (!isset($_COOKIE['userId'])) {
                            echo ' <a href="' . ROOT_URL . '?url=UserClientController/loginUser" class="bk-btn">Đăng nhập</a>';
                        } else {
                            if (isset($result['fullName']) && !empty($result['fullName'])) {
                                $fullName = $result['fullName'];
                            } else {
                                $userId = $_COOKIE['userId'];
                                $result = $table->getInfoUser('userId', $userId);
                                $email = $result['email'];
                                $nameFromEmail = preg_replace('/@.*?$/', '', $email);
                                $fullName = $nameFromEmail;
                            }
                            $avatarPath = $result['avatar'] ?? "../../../../../public/uploads/user.jpg";

                            echo '<div class="language-option">
                                  <img src="../../../../../public/uploads/'.$avatarPath.'" alt="">
                                    <span>' . $fullName . ' <i class="fa fa-angle-down"></i></span>
                                    <div class="flag-dropdown w-auto">
                                        <ul>
                                            <li><a href="' . ROOT_URL . '?url=HomeClientController/profile">Thông tin</a></li>
                                            <li><a href="' . ROOT_URL . '?url=UserClientController/logoutUser">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                    </div>';

                        }
                        ?>

                        <div class="language-option">
                            <img src="../../../../public/assets/client/img/flag.jpg" alt="">
                            <span>EN <i class="fa fa-angle-down"></i></span>
                            <div class="flag-dropdown">
                                <ul>
                                    <li><a href="#">Zi</a></li>
                                    <li><a href="#">Fr</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="../../../../App/views/client/index.php">
                            <img src="../../../../public/assets/client/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class=""><a href="<?= ROOT_URL ?>?url=HomeClientController/homePage">Trang chủ</a>
                                </li>
                                <li><a href="<?= ROOT_URL ?>?url=HomeClientController/roomsPage">Phòng</a></li>
                                <li><a href="<?= ROOT_URL ?>?url=HomeClientController/aboutUsPage">Giới thiệu</a></li>
                                <li><a href="<?= ROOT_URL ?>?url=HomeClientController/blogPage">Tin tức</a></li>
                                <li><a href="<?= ROOT_URL ?>?url=HomeClientController/contactPage">Liên hệ</a></li>
                            </ul>
                        </nav>
                        <div class="nav-right">
<!--                            <i class="icon_search"></i>-->
<!--                            <form action="--><?php //=ROOT_URL?><!--?url=HomeClientController/homePage" method="get">-->
<!--                                <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>