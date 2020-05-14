<div class="card">
    <h5 class="card-header">Thay đổi thông tin lớp</h5>
    <div class="card-body">
        <div class="col-md-6" style="margin-left: 25%;">

            <form method="post" >
                <?php if (isset($message)) echo $message; ?>
                <div class="form-group" >
                    <label>Mã Lớp</label>
                    <input type="text" class="form-control" name="maLop" value="<?php echo $room['MaLop'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Tên Lớp</label>
                    <input type="text" class="form-control" name="tenLop" value="<?php echo $room['TenLop'] ?>">
                </div>
                <div class="form-group">
                    <label>Khoa</label>
                    <select class="custom-select" name="khoa">
                        <?php foreach ($khoa as $key): ?>
                            <option
                                <?php if ($key['MaKhoa'] == $room['Khoa']): ?>
                                    selected
                                <?php endif; ?>
                                    value="<?php echo $key['MaKhoa'] ?>"><?php echo $key['TenKhoa'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Khóa Học</label>
                    <select class="custom-select" name="khoaHoc">
                        <?php foreach ($khoaHocs as $khoahoc): ?>
                            <option
                                <?php if ($khoahoc['MaKH'] == $room['KhoaHoc']): ?>
                                    selected
                                <?php endif; ?>
                                    value="<?php echo $khoahoc['MaKH'] ?>"><?php echo $khoahoc['TenKH'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Hệ Đào Tạo</label>
                    <select class="custom-select" name="heDT">
                        <?php foreach ($heDTs as $heDT): ?>
                            <option
                                <?php if ($heDT['MaHe'] == $room['HeDT']): ?>
                                    selected
                                <?php endif; ?>
                                    value="<?php echo $heDT['MaHe'] ?>"><?php echo $heDT['TenHe'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" value="update">Update</button>
                <a href="./index.php?page=lop" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>
</div>