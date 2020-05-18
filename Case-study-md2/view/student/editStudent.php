<div class="card">
    <h5 class="card-header">Thay đổi thông tin học viên</h5>
    <div class="card-body">
        <div class="col-md-6" style="margin-left: 25%;">

            <form method="post" enctype="multipart/form-data" action="./index.php?page=editSV">
                <?php if (isset($messageSt)): ?>
                    <script>alert('Chỉnh sửa thành công!'); window.location="index.php?page=Student";</script>
                <?php endif;?>
                <div class="form-group">
                    <label>Mã Sinh Viên</label>
                    <input type="text" class="form-control" name="maSV" value="<?php echo $students['MaSV'] ?>"
                           disabled>
                </div>
                <div class="form-group">
                    <label>Tên Sinh Viên</label>
                    <input type="text" class="form-control" name="tenSV" value="<?php echo $students['TenSV'] ?>">
                </div>
                <div class="form-group">
                    <label>Giới Tính</label>
                    <select class="custom-select" name="gioiTinh">
                        <option <?php if ($students['GioiTinh'] == 1) echo 'selected' ?>
                            value="1">Nam
                        </option>
                        <option <?php if ($students['GioiTinh'] == 0) echo 'selected' ?>
                            value="0">Nu
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày Sinh</label>
                    <input type="text" class="form-control" name="ngaySinh" value="<?php echo $students['NgaySinh'] ?>">
                </div>
                <div class="form-group">
                    <label>Quê Quán</label>
                    <input type="text" class="form-control" name="queQuan" value="<?php echo $students['QueQuan'] ?>">
                </div>
                <div class="form-group">
                    <label>Lớp</label>
                    <select class="custom-select" name="lop">
                        <?php foreach ($class as $classes): ?>
                            <option value="<?php echo $classes['MaLop'] ?>" <?php  if ($classes['MaLop'] == $room->maLop) {
                                echo "selected";
                            } ?>><?php echo $classes['TenLop'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh Đại Diện</label>
                    <img src="uploads/<?php echo $students['avatar']?>" style="width: 50px; height: 60px;">
                    <input type="file" class="form-control" name="image" value="<?php echo $students['avatar']?>">
                </div>
                <button type="submit" class="btn btn-primary" value="update">Update</button>
                <a href="./index.php?page=Student" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>
</div>