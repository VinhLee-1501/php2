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
                        <li class="breadcrumb-item"><a href="#">Thông tin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thông tin của <?=$data['fullName']?></li>
                        <a class="ml-auto" href="<?=ROOT_URL?>?url=HomeClientController/service&userId=<?=$data['userId']?>">Thông tin dịch vụ</a>
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
            <div class="col-lg-4">
                <div class="card mb-4">
                    <form method="post" action="<?=ROOT_URL?>?url=UserClientController/updateImg/<?=$data['userId']?>" enctype="multipart/form-data">
                        <div class="card-body text-center">
                            <img src="../../../public/uploads/<?=$ava?>" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?=$data['fullName']?></h5>
                            <p class="text-muted mb-1"><?=$data['phone'] ?? 'Thêm thông tin'?></p>
                            <p class="text-muted mb-4"><?=$data['address'] ?? 'Thêm thông tin'?></p>
                            <input type="file" name="avatar" class="form-control w-50 border-0 centered <?php echo isset($_SESSION['errorImg']) ? 'border-danger' : ''; ?>">
                            <?php if (isset($_SESSION['errorImg'])){
                                echo '<div class="text-danger">'.$_SESSION['errorImg'].'</div>';
                                unset($_SESSION['errorImg']);
                            }?>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="submit" class="btn btn-outline-primary ms-1" name="submit">Đổi ảnh</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="<?=ROOT_URL?>?url=UserClientController/changeInfoPsn/<?=$data['userId']?>">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border-0" name="fullName" value="<?=$data['fullName']?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border-0 disabled" name="email" value="<?=$data['email']?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border-0" name="phone" value="<?=$data['phone']?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">CCCD</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border-0" name="userCard" type="password" value="<?=$data['userCard']?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Địa chỉ</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="text-muted mb-0 border-0" name="address" value="<?=$data['address']?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="change">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>