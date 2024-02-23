<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bảng quản lý phòng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home.php">Thống kế</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bảng quản lý phòng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
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
    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="<?=ROOT_URL?>?url=RoomTypeController/createPage" class="btn btn-success">Thêm</a>
                <table class='table table-striped' id="table">
                    <thead>
                    <tr>
                        <th>Mã phòng</th>
                        <th>Loại phòng</th>
                        <th>Tiện nghi</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <?php
                    foreach ($data as $row):
                    ?>
                    <tbody>
                    <tr>
                        <td><?=$row['roomTypeId']?></td>
                        <td><?=$row['nameType']?></td>
                        <td><?=$row['utilities']?></td>
                        <td><span class="<?php
                            if ($row['status'] === 'Hiện'){
                                echo 'badge bg-success';
                            }else{
                                echo 'badge bg-danger';
                            }
                            ?>"><?=$row['status']?></span></td>

                        <td>
                            <a href="<?=ROOT_URL?>?url=RoomTypeController/hiddenData/<?=$row['roomTypeId']?>" class="btn btn-danger">
                                <?php
                                    if ($row['status'] === 'Ẩn'){
                                        echo 'Hiện';
                                    }else{
                                        echo 'Ẩn';
                                    }
                                ?>
                            </a>
                            <a href="<?=ROOT_URL?>?url=RoomTypeController/updatePage/<?=$row['roomTypeId']?>" class="btn btn-info">Sửa</a>
                        </td>
                    </tr>

                    </tbody>
                    <?php endforeach;?>
                </table>
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