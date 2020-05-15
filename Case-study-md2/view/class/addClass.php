
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm Lớp Học Mới</h1>
        </div>
        <?php
        if (isset($message)){
            echo "<p class='alert-info'>$message</p>";
        }
        ?>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Mã Lớp</label>
                    <input type="text" class="form-control" name="maLop"  placeholder="Nhập mã lớp" required>
                    <?php if (isset($msgID)): ?>
                        <span style="color: red"><?php echo $msgID ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Tên Lớp</label>
                    <input type="text" class="form-control" name="tenLop" placeholder="Nhập tên lớp" required>
                    <?php if (isset($msgName)): ?>
                        <span style="color: red"><?php echo $msgName ?></span>
                    <?php endif; ?>
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