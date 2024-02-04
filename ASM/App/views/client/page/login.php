<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-1">
    <div class="booking-form">
        <h3 class="text-center">Đăng nhập</h3>
        <?php
        if (isset($_SESSION['errorLogin'])){
            echo '<div class="alert alert-danger">'.$_SESSION['errorLogin'].'</div>';
        }
        ?>
        <form action="<?=ROOT_URL?>?url=UserClientController/checkUser" method="post">
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" name="fullName">
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
        <p>Bạn chưa có tài khoản ? <a href="<?=ROOT_URL?>?url=UserClientController/register">Đăng ký</a></p>
        <a href="">Quên mật khẩu</a>
    </div>
</div>