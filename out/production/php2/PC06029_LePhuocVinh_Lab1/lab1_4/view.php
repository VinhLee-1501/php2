<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Thông tin tài khoản</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Họ tên</th>
            <th scope="col">CCCD</th>
            <th scope="col">SDT</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Quốc tịch</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        global $users;
        $count = 1;
        foreach ($users as $user) {
            $countPlus = $count++;
            ?>
            <tr>
                <th scope="row"><?=$countPlus?></th>
                <td><?=$user['fullName']?></td>
                <td><?=$user['userCard']?></td>
                <td><?=$user['phone']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['address']?></td>
                <td><?=$user['nationality']?></td>
                <td style="<? if($user['status'] == 'Active'){
                    echo 'color: green';
                }else{
                    echo 'color: warning';
                }?>"><?=$user['status']?></td>
                <td><button type="button" class="btn btn-primary">Sửa</button></td>
            </tr>
        <?}
        ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>