<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-1">
    <div class="booking-form">
        <h3 class="text-center">Đổi mật khẩu</h3>
        <?php
        if (isset($_SESSION['errorLogin'])){
            echo '<div class="alert alert-danger">'.$_SESSION['errorLogin'].'</div>';
            unset($_SESSION['errorLogin']);
        }
        ?>
        <form action="<?= ROOT_URL ?>?url=UserClientController/newPass" method="post">
            <div class="form-group">
                <label for="">Mật khẩu mới</label>
                <input type="text" class="form-control" name="password1">
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input type="text" class="form-control" name="password2">
            </div>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
</div>