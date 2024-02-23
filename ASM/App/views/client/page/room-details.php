
<!-- Header End -->

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Phòng</h2>
                    <div class="bt-option">
                        <a href="<?=ROOT_URL?>?url=HomeClientController/homePage">Trang chủ</a>
                        <span>Chi tiết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
<?php
if (isset($_SESSION['success'])){
    echo '<div id="elementMessage" class="alert alert-success mb-3 position-fixed top-0 end-0 mt-3" style="z-index: 9999;">
             
               <span class="glyphicon glyphicon-ok"></span> <strong>Thông báo!</strong>
                <hr class="message-inner-separator">
                <p>
                    '.$_SESSION['success'].'</p>
            </div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])){
    echo '<div id="elementMessage" class="alert alert-danger mb-3 position-fixed top-0 end-0 mt-3" style="z-index: 9999;"">
               
                <span class="glyphicon glyphicon-hand-right"></span> <strong>Cảnh báo</strong>
                <hr class="message-inner-separator">
                <p>
                    '.$_SESSION['error'].'</p>
            </div>';
    unset($_SESSION['error']);
}
//        var_dump($dataId);


?>
<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="../../../../public/assets/client/img/room/<?=$data[0]['img']?>" alt="" class="w-50">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3><?=$data[0]['nameType']?></h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <a href="">Đặt ngay</a>
                            </div>
                        </div>
                        <h2><?=number_format($data[0]['price'])?><span>/Đêm</span></h2>
                        <table>
                            <tbody>
                            <tr>
                                <td class="r-o">Số lượng:</td>
                                <td>Số người tối đa 5</td>
                            </tr>
                            <tr>
                                <td class="r-o">Giường:</td>
                                <td>Cỡ lớn (King bed)</td>
                            </tr>
                            <tr>
                                <td class="r-o">Dịch vụ:</td>
                                <td>Wifi, Tivi, Phòng tắm,...</td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="f-para">Motorhome hay Trailer đó chính là câu hỏi dành cho bạn. Dưới đây là một số ưu
                            điểm và nhược điểm của cả hai, vì vậy bạn sẽ tự tin khi mua một chiếc RV. Khi so sánh Rvs,
                            motorhome hay xe moóc du lịch, bạn nên mua motorhome hay xe thứ năm? Những ưu điểm và nhược
                            điểm của cả hai đều được nghiên cứu để bạn có thể đưa ra lựa chọn sáng suốt khi mua RV. Sở
                            hữu một chiếc xe máy hoặc bánh xe thứ năm là thành tựu của cả cuộc đời. Nó có thể tương tự
                            như việc tạm trú tại nơi cư trú của bạn khi bạn tìm kiếm các địa điểm khác nhau trên vùng
                            đất
                            vĩ đại của chúng ta, nước Mỹ.
                        </p>
                        <p>
                            Hai loại phương tiện giải trí thường được biết đến là loại có động cơ và loại có thể kéo
                            được.
                            Những chiếc rv có thể kéo được là xe kéo du lịch và bánh xe thứ năm. Xe moóc du lịch rv hoặc
                            bánh xe thứ năm có sức hấp dẫn khi được xe bán tải hoặc ô tô kéo, do đó mang lại khả năng
                            thích
                            ứng trong việc sở hữu phương tiện di chuyển cho bạn khi bạn đỗ xe tại khu cắm trại của mình
                        </p>
                    </div>
                </div>
                <div class="rd-reviews">
                    <h4>Nhận xét</h4>
                    <div class="review-item">
                        <div class="ri-pic">
                            <img src="../../../public/assets/client/img/room/avatar/avatar-1.jpg" alt="">
                        </div>
                        <div class="ri-text">
                            <span>27 Aug 2019</span>
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5>Brandon Kelley</h5>
                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                magnam.</p>
                        </div>
                    </div>
                    <div class="review-item">
                        <div class="ri-pic">
                            <img src="../../../public/assets/client/img/room/avatar/avatar-2.jpg" alt="">
                        </div>
                        <div class="ri-text">
                            <span>27 Aug 2019</span>
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5>Brandon Kelley</h5>
                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                magnam.</p>
                        </div>
                    </div>
                </div>
                <div class="review-add">
                    <h4>Thêm nhận xét</h4>
                    <form action="#" class="ra-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Tên*">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Email*">
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <h5>Đánh giá của bạn:</h5>
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                </div>
                                <textarea placeholder="Nội dung"></textarea>
                                <button type="submit">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Thông tin đặt phòng</h3>

                    <form action="<?=ROOT_URL?>?url=RoomClientController/bookRoomPageDetail/<?=$data[0]['roomId']?>" method="post">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" class="date-input" id="date-in" name="dayStart">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" class="date-input" id="date-out" name="dayEnd">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Khách:</label>
                            <input type="number"  value="1" class="form-control" id="date-out" name="qualityUser">
                        </div>
                        <div class="form-group">
                            <label for="">Phòng</label>
                            <input type="number" class="form-control" id="date-in" value="1" name="qualityRooms">
                        </div>
                        <div class="select-option">
                            <label for="room">Room:</label>
                            <select class="form-select" name="room" aria-label=".form-select-sm example">
                                <option value="<?=$data[0]['roomTypeId']?>"><?=$data[0]['nameType']?></option>
                            </select>
                        </div>
                        <button type="submit">Kiểm tra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->
<!-- Footer Section Begin -->
<script>
    setTimeout(function () {
        var element = document.getElementById("elementMessage");
        var opacity = 1; // bắt đầu với opacity là 1
        var timer = setInterval(function () {
            if (opacity <= 0.1){
                clearInterval(timer);
                element.style.display = 'none';
            }
            element.style.opacity = opacity;
            opacity -= opacity * 0.1;
        }, 50);
    }, 3000);
</script>