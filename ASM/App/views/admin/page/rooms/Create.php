<div class="main-content container-fluid">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm dữ liệu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?=ROOT_URL?>?url=RoomAdminController/createInfoRoom" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tên phòng</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                   placeholder="Tên phòng"
                                                   name="nameRoom">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Giá</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                   placeholder="Giá"
                                                   name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Loại</label>
                                            <select class="form-select" name="roomTypeId" aria-label=".form-select-sm example">
                                                <option value=" " selected disabled>Vui lòng chọn dịch vụ</option>
                                                <option value="1">Phòng đơn</option>
                                                <option value="2">Phòng đôi</option>
                                                <option value="3">Phòng Cao cấp</option>
                                                <option value="4">Phòng Deluxe</option>
                                                <option value="5">Phòng nhỏ</option>
                                                <option value="6">Phòng Cao cấp ( King bed )</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Trạng thái</label>
                                            <select class="form-select" name="describe" aria-label=".form-select-sm example">
                                                <option value="Active">Trống</option>
                                                <option value="Inactive">Đầy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Tiện ích</label>
                                            <textarea class="form-control" name="describtion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1" name="createRoom">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>