<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>

    <link rel="stylesheet" href="../../../public/assets/admin/css/bootstrap.css">

    <link rel="stylesheet" href="../../../public/assets/admin/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../../../public/assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../../public/assets/admin/css/app.css">
    <link rel="shortcut icon" href="../../../public/assets/admin/images/favicon.svg" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
<div id="app">
<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="../../../../public/assets/admin/images/logo.svg" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>

                <li class="sidebar-item  ">
                    <a href="<?=ROOT_URL?>?url=HomeAdminController/home" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Lượng check-in</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="<?=ROOT_URL?>?url=HomeAdminController/tableBookRooms" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Đặt phòng</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="<?=ROOT_URL?>?url=HomeAdminController/tableRoom" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Phòng</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="<?=ROOT_URL?>?url=HomeAdminController/tableRoomType" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Loại phòng</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="<?=ROOT_URL?>?url=HomeAdminController/tableOrder" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Hóa đơn</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="<?=ROOT_URL?>?url=HomeAdminController/tableUser" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Khách hàng</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<script>
    $(document).ready(function () {
        var url = window.location.href;
        $('.sidebar-link').filter(function () {
            return this.href == url;
        }).parent().addClass('active');
    });
</script>