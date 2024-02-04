<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bảng quản lý phòng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Thống kế</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bảng quản lý phòng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
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
                        <td class="<?php
                        if ($row['status'] === 'Active'){
                            echo 'text-success';
                        }else{
                            echo 'text-danger';
                        }
                        ?>"><?=$row['status']?></td>

                        <td>
                            <span class="btn btn-danger">Ẩn</span>
                            <button class="btn btn-info">Sửa</button>
                        </td>
                    </tr>

                    </tbody>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </section>
</div>