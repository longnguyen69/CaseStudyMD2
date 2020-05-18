<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-5">
        <div class="container">

            <div class="col-md-8" style="margin-left: 10%">
                <h2>Thêm Lớp Học Mới</h2>
                <br>
                <p style="color: blue">- Mã lớp bao gốm ít nhất 6 ký tự và phải viết hoa</p>
                <p style="color: blue">- Tên lớp bạn không được để trống</p>
            </div>
        </div>
        <?php
        if (isset($message)){
            echo "<p class='alert-info'>$message</p>";
        }
        if (isset($error)){
            echo "<p  style='color: red'>$error</p>";
        }
        ?>
        </div>
        <div class="col-6">
            <form method="post">
                <div class="form-group">
                    <label>Mã Lớp</label>
                    <input type="text" class="form-control" name="maLop"  placeholder="Nhập mã lớp" required>
                    <?php if (isset($msgID)){ echo "<p style='color: #fcf8f7;'>$msgID</p>"; }?>
                </div>
                <div class="form-group">
                    <label>Tên Lớp</label>
                    <input type="text" class="form-control" name="tenLop" placeholder="Nhập tên lớp" required>
                    <?php if (isset($msgName)){ echo "<p style='color: #fcf8f7;'>$msgName</p>";; }?>
                </div>
                <div class="form-group">
                    <label>Khóa Học</label>
                    <select class="custom-select" name="khoaHoc">
                        <?php foreach ($kH as $key): ?>
                            <option value="<?php echo $key['MaKH']?>"><?php echo $key['TenKH'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hệ Đào Tạo</label>
                    <select class="custom-select" name="heDT">
                        <?php foreach ($heDaoTao as $key): ?>
                            <option value="<?php echo $key['MaHe']?>"><?php echo $key['TenHe'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="create">Thêm mới</button>
                <a href="./index.php?page=lop" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>