<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Phòng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Phòng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="<?= ROOT_URL?>?url=HomeAdminController/createRoom/" class="btn btn-success">Thêm</a>
                <table class='table table-striped' id="table1">
                    <thead>
                    <tr>
<!--                        <th>Mã</th>-->
                        <th>Loại</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Tiện nghi</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <?php
//                    global $data;
                    foreach ($data as $row):
                    ?>
                    <tbody>
                    <tr>
<!--                        <td>--><?php //=$row['roomId']?><!--</td>-->
                        <td><?=$row['nameType']?></td>
                        <td><?=$row['nameRoom']?></td>
                        <td><?=$row['price']?></td>
                        <td><?=$row['describe']?></td>
                        <td class="<?php if ($row['status'] === 'Đầy'){
                            echo 'text-danger';
                        }else{
                            echo 'text-success';
                        }?>"><?=$row['status']?></td>
                        <td class="row">
                            <button class="btn btn-info">Sửa</button>
                            <button class="btn btn-warning">Ẩn</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?= ROOT_URL?>?url=HomeAdminController/createRoom" class="btn btn-success">Thêm</a>
            </div>
        </div>
    </section>
</div>
