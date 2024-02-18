<?php
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

<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-1">
    <div class="booking-form">
        <h3 class="text-center">Đăng nhập</h3>
        <?php
        if (isset($_SESSION['errorLogin'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['errorLogin'] . '</div>';
            unset($_SESSION['errorLogin']);
        }elseif (isset($_SESSION['success'])){
            echo '<div class="alert alert-success">'. $_SESSION['success']. '</div>';
            unset($_SESSION['success']);
        }
        ?>
        <form action="<?= ROOT_URL ?>?url=UserClientController/checkUser" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">Số chứng minh</label>
                <input type="text" class="form-control" name="userCard">
            </div>
            <button type="submit" name="submit">Đăng nhập</button>
        </form>
        <p>Bạn chưa có tài khoản ? <a href="<?= ROOT_URL ?>?url=UserClientController/register">Đăng ký</a></p>
        <a href="<?= ROOT_URL ?>?url=UserClientController/forgotPass">Quên mật khẩu</a>
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