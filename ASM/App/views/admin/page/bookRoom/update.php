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
                        <h4 class="card-title">Sửa dữ liệu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form" action="<?=ROOT_URL?>?url=BookRoomAdminController/updateData/<?=$data[0]['bookroomId']?>" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-12 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name-column">Số chứng minh</label>
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="Số chứng minh"
                                                       name="userCard" value="<?=$data[0]['userCard']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name-column">Số lượng khách</label>
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="Số lượng"
                                                       name="qualityUser" value="<?=$data[0]['qualityUser']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name-column">Check-In</label>
                                                <input type="date" id="last-name-column" class="form-control"
                                                       name="dayStart" value="<?= date('Y-m-d', strtotime($data[0]['dayStart'])) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name-column">Check-Out</label>
                                                <input type="date" id="last-name-column" class="form-control"
                                                       name="dayEnd" value="<?= date('Y-m-d', strtotime($data[0]['dayEnd'])) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-lg-12 col-12">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Loại</label>
                                                <select class="form-select" name="roomTypeId" aria-label=".form-select-sm example">
                                                    <option value="<?=$data[0]['roomTypeId']?>"><?=$data[0]['nameType']?></option>
                                                    <option value="1">Phòng đơn</option>
                                                    <option value="2">Phòng đôi</option>
                                                    <option value="3">Phòng Cao cấp</option>
                                                    <option value="4">Phòng Deluxe</option>
                                                    <option value="5">Phòng nhỏ</option>
                                                    <option value="6">Phòng Cao cấp ( King bed )</option>
                                                    <option value="7">Phòng có tầm nhìn</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Số phòng</label>
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="Số lượng"
                                                       name="qualityRooms" value="<?=$data[0]['qualityRooms']?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1" name="createRoom">Sửa</button>
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