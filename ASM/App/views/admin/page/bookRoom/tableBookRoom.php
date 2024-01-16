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
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Check-in
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Check-out
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="card tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                 tabindex="0">
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Phòng</th>
                            <th>Ngày đặt</th>
                            <th>Ngày đến</th>
                            <th>Ngày đi</th>
                            <th>Số lượng phòng</th>
                            <th>Khách hàng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Phòng Cao cấp có Giường cỡ lớn</td>
                            <td>12/01/2024</td>
                            <td>13/01/2024</td>
                            <td>15/01/2024</td>
                            <td>2</td>
                            <td>Nguyễn A</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                            <td>
                                <button class="btn btn-info">Nhận</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!--Check-out-->
            <div class="card tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                 tabindex="0">
                <div class="card-body">
                    <table class='table table-striped' id="table2">
                        <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Phòng</th>
                            <th>Ngày đặt</th>
                            <th>Ngày đến</th>
                            <th>Ngày đi</th>
                            <th>Số lượng phòng</th>
                            <th>Khách hàng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Phòng Cao cấp có Giường cỡ lớn</td>
                            <td>12/01/2024</td>
                            <td>13/01/2024</td>
                            <td>15/01/2024</td>
                            <td>2</td>
                            <td>Nguyễn A</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                            <td>
                                <button class="btn btn-info">Trả phòng</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>