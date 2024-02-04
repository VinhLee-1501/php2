<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-1">
    <div class="booking-form">
        <h3 class="text-center">Đăng nhập</h3>
        <form action="<?=ROOT_URL?>?url=UserClientController/checkUser/" method="post">
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
                <input type="text" class="form-control" name="cardUser">
            </div>
            <button type="submit" name="submit">Đăng ký</button>
        </form>
        <p>Bạn chưa có tài khoản ? <a href="">Đăng ký</a></p>
        <a href="">Quên mật khẩu</a>
    </div>
</div>