
<!-- Header End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
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
                <div class="contact-text">
                    <h2>Contact Info</h2>
                    <p>Chăm sóc khách hàng luôn được đặc lên hàng đầu khi khách hàng đến với Sona</p>
                    <table>
                        <tbody>
                        <tr>
                            <td class="c-o">Địa chỉ:</td>
                            <td>Số 22, Thường Thạnh, Cái Răng, Cần Thơ</td>
                        </tr>
                        <tr>
                            <td class="c-o">SDT:</td>
                            <td>(+84) 345 67890</td>
                        </tr>
                        <tr>
                            <td class="c-o">Email:</td>
                            <td>sonafpoly@gmail.com</td>
                        </tr>
                        <tr>
                            <td class="c-o">Fax:</td>
                            <td>+(84) 345 67890</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

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
            <div class="col-lg-7 offset-lg-1">
                <form action="<?=ROOT_URL?>?url=UserClientController/sendTheConcact" class="contact-form" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Tiêu đề" name="title">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" placeholder="Email" name="email">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Nội dung" name="content"></textarea>
                            <button type="submit" name="send">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.4204309702077!2d105.75565247368486!3d9.982086773345412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1707140646644!5m2!1svi!2s"
                    width="700" height="470" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Footer Section Begin -->
