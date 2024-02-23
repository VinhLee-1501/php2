<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-text">
                    <h2>Thay đổi thông tin dịch vụ</h2>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">

                <form action="<?= ROOT_URL ?>?url=RoomClientController/InfoBookRoom/<?=$data[0]['bookroomId']?>&id=<?= $data[0]['roomTypeId'] ?>" class="contact-form" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="date" class="date-input" id="date-in" name="dayStart"
                                   value="<?= date('Y-m-d', strtotime($data[0]['dayStart'])) ?>">
                        </div>

                        <div class="col-lg-6">
                            <input type="date" class="date-input" id="date-in" name="dayEnd"
                                   value="<?= date('Y-m-d', strtotime($data[0]['dayEnd'])) ?>">
                        </div>
                        <div class="col-lg-12">
                            <input type="number" class="date-input" id="date-in" name="qualityUser"
                                   value="<?=$data[0]['qualityUser'] ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <select class="" name="room" aria-label=".form-select-sm example">
                            <?= $data[0]['roomTypeId'] ?>
                            <option value="<?= $data[0]['roomTypeId'] ?>"><?= $data[0]['nameType'] ?></option>
                            <option value="1">Phòng đơn</option>
                            <option value="2">Phòng đôi</option>
                            <option value="3">Phòng Cao cấp</option>
                            <option value="5">Phòng Deluxe</option>
                            <option value="4">Phòng nhỏ</option>
                            <option value="6">Phòng Cao cấp ( King bed )</option>
                            <option value="7">Phòng có tầm nhìn</option>
                        </select>
                    </div>

                    <button type="submit" name="send">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Footer Section Begin -->
