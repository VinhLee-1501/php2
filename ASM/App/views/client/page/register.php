<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-1">
    <div class="booking-form">
        <h3 class="text-center">Đăng ký</h3>
        <?php
        if (isset($_SESSION['errorRegister'])){
            echo '<div class="alert alert-danger">'.$_SESSION['errorRegister'].'</div>';
        };
        ?>
        <form action="<?=ROOT_URL?>?url=UserClientController/createUser" method="post">
            <div class="form-group">
                <label for="">email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" name="fullName">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="text" class="form-control" name="password1">
            </div>
            <div class="form-group">
                <label for="">Nhập mật khẩu</label>
                <input type="text" class="form-control" name="password2">
            </div>
            <div class="form-group">
                <label for="">Số chứng minh</label>
                <input type="text" class="form-control" name="userCard">
            </div>
            <button type="submit" name="submit">Đăng ký</button>
        </form>
        <p>Bạn chưa có tài khoản ? <a href="">Đăng ký</a></p>
        <a href="">Quên mật khẩu</a>
    </div>
</div>