<?php
ob_start();
session_start();
//require_once 'vendor/autoload.php';

?>

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
        <?
        include '../admin/component/navBar.php';
        ?>
        <div id="main">
            <?php
            include '../admin/component/header.php';

            if (isset($_SERVER['admin'])) {
                require_once '../admin/page/login.php';
            } else {
                $action = 'home';
                if (isset($_GET['page'])) {
                    $action = $_GET['page'];
                }

                switch ($action) {
                    case 'home':
                        require_once '../admin/page/home.php';
                        break;
                    case 'login':
                        require_once '../admin/page/login.php';
                        break;
                    // Đặt phòng
                    case 'tableBookRoom':
                        require_once '../admin/page/bookRoom/tableBookRoom.php';
                        break;
                    // Khách hàng
                    case 'tableUser':
                        require_once '../admin/page/users/tableUser.php';
                        break;
                    // Hóa đơn
                    case 'tableOrder':
                        require_once '../admin/page/tableOrder.php';
                        break;
                    // phòng
                    case 'tableCateRoom':
                        require_once '../admin/page/rooms/tableCateRoom.php';
                        break;
                    case 'tableRoom':
                        require_once '../admin/page/rooms/tableRoom.php';
                        break;
                }
            }
            include '../admin/component/footer.php';

            ?>
        </div>
    </div>
    <script src="../../../public/assets/admin/js/feather-icons/feather.min.js"></script>
    <script src="../../../public/assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../../public/assets/admin/js/app.js"></script>

    <script src="../../../public/assets/admin/vendors/chartjs/Chart.min.js"></script>
    <script src="../../../public/assets/admin/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../../../public/assets/admin/js/pages/dashboard.js"></script>

    <script src="../../../public/assets/admin/js/main.js"></script>

    <script src="../../../public/assets/admin/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="../../../public/assets/admin/js/vendors.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>

    </body>
    </html>
<?php
ob_end_flush();
?>