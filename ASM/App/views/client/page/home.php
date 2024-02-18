<!-- Header End -->

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Sona A Luxury Hotel</h1>
                    <p>Dưới đây là các trang web đặt phòng khách sạn tốt nhất, bao gồm các đề xuất
                        về du lịch quốc tế và tìm phòng khách sạn giá rẻ.</p>
                    <a href="#" class="primary-btn">Khám phá ngay</a>
                </div>
            </div>
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
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Đặt phòng</h3>
                    <form action="<?=ROOT_URL?>?url=RoomClientController/bookRoom" method="post">
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
                        <div class="form-group">
                            <label for="">Khách</label>
                            <input type="number" class="form-control" id="date-in" value="1" name="qualityUser">
                        </div>
                        <div class="select-option">
                            <label for="room">Room:</label>
                            <select class="form-select" name="room" aria-label=".form-select-sm example">
                                <option value="" selected disabled>Vui lòng chọn dịch vụ</option>
                                <option value="1">Phòng đơn</option>
                                <option value="2">Phòng đôi</option>
                                <option value="3">Phòng Cao cấp</option>
                                <option value="4">Phòng nhỏ</option>
                                <option value="5">Phòng Deluxe</option>
                                <option value="6">Phòng Cao cấp ( King bed )</option>
                                <option value="7">Phòng có tầm nhìn</option>
                            </select>
                        </div>
                        <button type="submit">Kiểm tra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="../../../public/assets/client/img/hero/hero-1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="../../../public/assets/client/img/hero/hero-2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="../../../public/assets/client/img/hero/hero-3.jpg"></div>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Us Section Begin -->
<section class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <span>Giới thiệu</span>
                        <h2>Sona<br/>A Luxury Hotel</h2>
                    </div>
                    <p class="f-para">Sona.com là trang web cung cấp chỗ ở trực tuyến hàng đầu.
                        Chúng tôi đam mê du lịch. Mỗi ngày, chúng tôi truyền cảm hứng và tiếp cận hàng
                        triệu khách du lịch trên 90 trang web địa phương bằng 41 ngôn ngữ.</p>
                    <p class="s-para">Vì vậy, khi cần đặt phòng khách sạn, nhà nghỉ cho thuê,
                        khu nghỉ dưỡng, căn hộ, nhà khách hoặc nhà trên cây hoàn hảo, chúng tôi sẽ hỗ trợ bạn.</p>
                    <a href="#" class="primary-btn about-btn">Xem thêm</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="../../../public/assets/client/img/about/about-1.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="../../../public/assets/client/img/about/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>What We Do</span>
                    <h2>Khám phá dịch vụ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-036-parking"></i>
                    <h4>Kế hoạch</h4>
                    <p>"Hãy tạo lịch trình linh hoạt cho kỳ nghỉ của bạn với các gợi ý hoạt động
                        đa dạng và khám phá điểm đến đặc sắc dưới sự hỗ trợ của chúng tôi.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-033-dinner"></i>
                    <h4>Dịch vụ ăn uống</h4>
                    <p>Với sự đa dạng trong thực đơn hàng ngày và thực đơn đặc biệt, chúng tôi mang
                        đến trải nghiệm ẩm thực tuyệt vời ngay tại phòng nghỉ của bạn.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-026-bed"></i>
                    <h4>Trông trẻ</h4>
                    <p>Chúng tôi cung cấp dịch vụ chăm sóc trẻ đầy đủ và chu đáo, bao gồm cả các hoạt
                        động giải trí phù hợp với lứa tuổi của trẻ, giúp bạn có kỳ nghỉ không bị gián đoạn.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-024-towel"></i>
                    <h4>Giặc ủi</h4>
                    <p>Với dịch vụ giặt là chất lượng cao và tiện ích ủi quần áo, chúng tôi cam kết
                        mang lại sự thuận tiện và sạch sẽ cho quý khách hàng.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-044-clock-1"></i>
                    <h4>Thuê xe</h4>
                    <p>Khám phá địa điểm một cách an toàn và thoải mái hơn với dịch vụ đưa đón
                        riêng và hướng dẫn viên du lịch có kinh nghiệm.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-012-cocktail"></i>
                    <h4>Quầy Bar & đồ uống</h4>
                    <p>Tận hưởng thời gian thư giãn tại quầy bar với thực đơn đa dạng, từ
                        rượu vang cho đến các loại đồ uống được phục vụ chu đáo.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                <?php
//                global $data;
                foreach ($data as $value):
                    $services = explode(',', $value['describtion']);
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="../../../public/assets/client/img/room/<?=$value['img']?>">
                        <div class="hr-text">
                            <h3><?=$value['nameType']?></h3>
                            <h2><?=$value['price']?><span>/Một đêm</span></h2>
                            <table>
                                <tbody>
                                <?php
                                foreach ($services as $service):
                                ?>
                                <tr>
                                    <td class="r-o">Dịch vụ:</td>
                                    <td><?=$service?></td>
                                </tr>
                                <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                            <a href="<?=ROOT_URL?>?url=HomeClientController/roomDetailPage/<?= $value['roomId'] ?>" class="primary-btn">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>

            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Đánh giá</span>
                    <h2>Khách hàng đã đánh giá</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <div class="ts-item">
                        <p>After a construction project took longer than expected, my husband, my daughter and I
                            needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                            city, neighborhood and the types of housing options available and absolutely love our
                            vacation at Sona Hotel.</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Alexander Vasquez</h5>
                        </div>
                        <img src="../../../public/assets/client/img/testimonial-logo.png" alt="">
                    </div>
                    <div class="ts-item">
                        <p>After a construction project took longer than expected, my husband, my daughter and I
                            needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                            city, neighborhood and the types of housing options available and absolutely love our
                            vacation at Sona Hotel.</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Alexander Vasquez</h5>
                        </div>
                        <img src="../../../public/assets/client/img/testimonial-logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Tin tức</span>
                    <h2>Sự kiện</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="../../../public/assets/client/img/blog/blog-1.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="#">Tremblant In Canada</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="../../../public/assets/client/img/blog/blog-2.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="#">Choosing A Static Caravan</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="../../../public/assets/client/img/blog/blog-3.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="#">Copper Canyon</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog-item small-size set-bg"
                     data-setbg="../../../public/assets/client/img/blog/blog-wide.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="#">Trip To Iqaluit In Nunavut A Canadian Arctic City</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item small-size set-bg"
                     data-setbg="../../../public/assets/client/img/blog/blog-10.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel</span>
                        <h4><a href="#">Traveling To Barcelona</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 12th April, 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<!-- Footer Section Begin -->
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
<!-- Js Plugins -->
