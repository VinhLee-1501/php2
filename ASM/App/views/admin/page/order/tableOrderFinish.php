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
                <h3>Bảng hóa đơn</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home.php">Thống kế</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bảng hóa đơn</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table">
                    <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Ngày lập</th>
                        <th>Phòng</th>
                        <th>Tên khách hàng</th>
                        <th>Thời gian sử dụng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>

                    <?php
                    foreach ($data as $row):
                        $dayStart = new DateTime($row['dayStart']);
                        $dayEnd = new DateTime($row['dayEnd']);
                        $interval = date_diff($dayStart, $dayEnd);
                        $numberOfNights = $interval->format('%a');

                        // Tính tổng tiền dựa trên số đêm và giá mỗi đêm
                        $totalPrice = $numberOfNights * $row['price'];
                        ?>
                        <tbody>
                        <tr>
                            <td><?=$row['orderId']?></td>
                            <td><?=date('d-m-y', strtotime($row['createDay']))?></td>
                            <td><?=$row['nameType']?></td>
                            <td><?=$row['fullName']?></td>
                            <td><?=$numberOfNights?></td>
                            <td><?=number_format($totalPrice)?></td>
                            <td>
                                <span class="badge bg-danger"><?=$row['status']?></span>
                            </td>
                            <td>
                                <a href="<?=ROOT_URL?>?url=OrderAdminController/delete/<?=$row['orderId']?>" class="btn btn-info">Xóa</a>
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