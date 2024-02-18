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
    echo '<div id="elementMessage" class="alert alert-danger mb-3 position-fixed top-0 end-0 mt-3 float-left" style="z-index: 9999;"">
               
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
                <h3>Bảng khách hàng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home.php">Thống kế</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bảng khách hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="<?=ROOT_URL?>?url=UserController/createFunction" class="btn btn-success">Thêm</a>
                <table class='table table-striped' id="table">
                    <thead>
                    <tr>
                        <th>Hình</th>
                        <th>Tên</th>
                        <th>SDT</th>
                        <th>email</th>
                        <th>Địa chỉ</th>
                        <th>CCCD</th>
                        <th>Trạng thái</th>
                        <th>Quyền</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <?php
                    foreach ($data as $value):
                        $avatar = $value['avatar'] ?? '../../../../../public/uploads/user.jpg';
                    ?>
                        <tbody>
                        <tr>
                            <td>
                                <img class="img-thumbnail rounded" src="../../../../../public/uploads/<?=$avatar?>" alt="">
                            </td>
                            <td><?=$value['fullName']?></td>
                            <td><?=$value['phone']?></td>
                            <td><?=$value['email']?></td>
                            <td><?=$value['address']?></td>
                            <td><?=$value['userCard']?></td>
                            <td>
                                <span class="<?php
                                if ($value['status'] === 'Active'){
                                    echo 'badge bg-green';
                                }else{
                                    echo 'badge bg-danger';
                                }
                                ?>"><?=$value['status']?></span>
                            </td>
                            <td>
                                <span class="<?php
                                if ($value['position'] === 'Admin'){
                                    echo 'badge bg-danger';
                                }else{
                                    echo 'badge bg-info';
                                }
                                ?>"><?=$value['position']?></span>
                            </td>
                            <td class="row">
<!--                                <button class="btn btn-info">Sửa</button>-->
                                <a href="<?=ROOT_URL?>?url=UserController/hiddenData/<?=$value['userId']?>" class="
                                <?php
                                if ($value['status'] === 'Active'){
                                    echo 'btn btn-warning';
                                }else{
                                    echo 'btn btn-success';
                                }
                                ?>">
                                    <?php
                                    if ($value['status'] === 'Active'){
                                        echo 'Ẩn';
                                    }else{
                                        echo 'Kích hoạt';
                                    }
                                    ?>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    <?php
                    endforeach;
                    ?>
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