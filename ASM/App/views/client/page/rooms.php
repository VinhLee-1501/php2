<!-- Header Section Begin -->
<!-- Header End -->

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Phòng</h2>
                    <div class="bt-option">
                        <a href="ROOT_URL?url=HomeClientController/homePage">Trang chủ</a>
                        <span>Phòng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
<?php
if (isset($_SESSION['success'])) {
    echo '<div id="elementMessage" class="alert alert-success mb-3 position-fixed top-0 end-0 mt-3" style="z-index: 9999;">
             
               <span class="glyphicon glyphicon-ok"></span> <strong>Thông báo!</strong>
                <hr class="message-inner-separator">
                <p>
                    ' . $_SESSION['success'] . '</p>
            </div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo '<div id="elementMessage" class="alert alert-danger mb-3 position-fixed top-0 end-0 mt-3" style="z-index: 9999;"">
               
                <span class="glyphicon glyphicon-hand-right"></span> <strong>Cảnh báo</strong>
                <hr class="message-inner-separator">
                <p>
                    ' . $_SESSION['error'] . '</p>
            </div>';
    unset($_SESSION['error']);
}
//        var_dump($dataId);


?>
<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            <?php
            foreach ($data as $value):
                if (strpos($value['roomId'], ',') !== false) {
                    $roomIds = explode(',', $value['roomId']);
                    $strRoomId = implode(',', $roomIds);
                } else {
                    $strRoomId = ($value['roomId']);
                }

                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="../../../../public/assets/client/img/room/<?= $value['img'] ?>" alt="" class="h-3">
                        <div class="ri-text">
                            <h4><?= $value['nameType'] ?></h4>
                            <h3><?= number_format($value['price']) ?><span>/Một đêm</span></h3>
                            <a href="<?=ROOT_URL?>?url=HomeClientController/roomDetailPage/<?= $strRoomId ?>"
                               class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
            <div class="col-lg-12">
                <div class="room-pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Rooms Section End -->
<script>
    setTimeout(function () {
        var element = document.getElementById("elementMessage");
        var opacity = 1; // bắt đầu với opacity là 1
        var timer = setInterval(function () {
            if (opacity <= 0.1) {
                clearInterval(timer);
                element.style.display = 'none';
            }
            element.style.opacity = opacity;
            opacity -= opacity * 0.1;
        }, 50);
    }, 3000);
</script>