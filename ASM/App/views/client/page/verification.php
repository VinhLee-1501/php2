<div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-1">
    <div class="booking-form">
        <h3 class="text-center">Nhập mã xác minh</h3>
        <?php
        if (isset($_SESSION['errorLogin'])){
            echo '<div class="alert alert-danger">'.$_SESSION['errorLogin'].'</div>';
            unset($_SESSION['errorLogin']);
        }
        ?>
        <form action="<?= ROOT_URL ?>?url=UserClientController/checkCode" method="post">
            <div class="form-group">
                <label for="">Nhập mã</label>
                <input type="text" class="form-control" name="text">
            </div>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
</div>