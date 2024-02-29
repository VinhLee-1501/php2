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
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bảng đặt phòng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home.php">Thống kế</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bảng đặt phòng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Check-out
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="card tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                 tabindex="0">
                <div class="card-body">
                    <table class='table table-striped' id="table">
                        <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Phòng</th>
                            <th>Ngày đặt</th>
                            <th>Ngày đến</th>
                            <th>Ngày đi</th>
                            <th>Số lượng khách</th>
                            <th>Tiền cọc trước</th>
                            <th>Khách hàng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($data as $value):
                            ?>
                            <tbody>
                            <tr>

                                <td><?=$value['bookroomId']?></td>
                                <td><?=$value['nameRoom']?></td>
                                <td><?=date('Y-m-d', strtotime($value['bookDay']))?></td>
                                <td><?=date('Y-m-d', strtotime($value['dayStart']))?></td>
                                <td><?=date('Y-m-d', strtotime($value['dayEnd']))?></td>
                                <td><?=$value['qualityUser']?></td>
                                <td><?=number_format($value['payment'])?></td>
                                <td><?=$value['fullName']?></td>
                                <td>
                                <span class="<?php
                                if ($value['status'] == 'Xác nhận'){
                                    echo 'badge bg-info';
                                }else{
                                    echo 'badge bg-warning';
                                }
                                ?>"><?=$value['status']?></span>
                                </td>
                                <td>
                                    <a href="<?=ROOT_URL?>?url=BookRoomAdminController/editValue/<?=$value['bookroomId']?>" class="btn btn-warning">Sửa thông tin</a>
                                    <a href="<?=ROOT_URL?>?url=BookRoomAdminController/updateCheckOut/<?=$value['bookroomId']?>" class="btn btn-info">Xác nhận</a>
                                </td>
                            </tr>

                            </tbody>

                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
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