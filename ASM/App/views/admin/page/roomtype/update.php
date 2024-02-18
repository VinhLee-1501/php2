<div class="main-content container-fluid">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
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
                    <div class="card-header">
                        <h4 class="card-title">Thêm dữ liệu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?=ROOT_URL?>?url=RoomTypeController/updateData/<?=$data['roomTypeId']?>" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-12 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name-column">Tên loại</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="Số chứng minh"
                                                       name="nameType" value="<?=$data['nameType']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name-column">Tiện nghi</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="Tên"
                                                       name="utilities" value="<?=$data['utilities']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1" name="create">Sửa</button>
                                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
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