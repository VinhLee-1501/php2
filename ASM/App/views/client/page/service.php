<style>
    .border-danger {
        border-color: red !important;
    }
</style>

<?php
$ava = $data['avatar'] ?? '../../../public/uploads/user.jpg';
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>?url=HomeClientController/homePage">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?=ROOT_URL?>?url=HomeClientController/profile">Thông tin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thông tin dịch vụ</li>
                    </ol>
                </nav>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title m-b-0">Thông tin dịch vụ</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Check - In</th>
                                <th scope="col">Check - Out</th>
                                <th scope="col">Số người</th>
                                <th scope="col">Lọai phòng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <?php
                            foreach ($data as $row):
                            ?>
                            <tbody class="customtable">
                            <tr>
                                <td><?=$row['fullName']?></td>
                                <td><?=date('d-m-y', strtotime($row['bookDay']))?></td>
                                <td><?=date('d-m-y', strtotime($row['dayStart']))?></td>
                                <td><?=date('d-m-y', strtotime($row['dayEnd']))?></td>
                                <td><?=$row['qualityUser']?></td>
                                <td><?=$row['nameType']?></td>
                                <td class="text-info"><?=$row['status']?></td>
                                <td>
                                    <a href="<?=ROOT_URL?>?url=RoomClientController/formUpdateBook/<?=$row['bookroomId']?>" class="btn btn-info">Thay đổi</a>
                                    <a href="<?=ROOT_URL?>?url=RoomClientController/deleteInfoService/<?=$row['bookroomId']?>" class="btn btn-danger">Hủy</a>
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
        </div>

    </div>
</section>