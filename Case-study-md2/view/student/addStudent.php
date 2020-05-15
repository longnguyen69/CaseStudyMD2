<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm Sinh Viên Mới</h1>
        </div>

        <div class="col-8" style="margin-left: 15%">
            <?php
            if (isset($message)){
                echo "<p class='alert-info'>$message</p>";
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label>Mã Sinh Viên</label>
                    <input type="text" class="form-control" name="maSV"  placeholder="Nhập mã sinh viên" required>
                    <?php if (isset($msgID)): ?>
                        <span style="color: red"><?php echo $msgID ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Tên Sinh Viên</label>
                    <input type="text" class="form-control" name="tenSV" placeholder="Nhập tên sinh viên" required>
                    <?php if (isset($msgName)): ?>
                        <span style="color: red"><?php echo $msgName ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Giới Tính</label>
                    <select class="custom-select" name="gioiTinh">
                        <option value="1">Nam</option>
                        <option value="0">Nu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày Sinh</label>
                    <input type="date" class="form-control" name="ngaySinh">
                    <?php if (isset($msgBirth)): ?>
                        <span style="color: red"><?php echo $msgBirth ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Quê Quán/Địa Chỉ</label>
                    <input type="text" class="form-control" name="queQuan">
                    <?php if (isset($msgCountry)): ?>
                        <span style="color: red"><?php echo $msgCountry ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Lớp</label>
                    <select class="custom-select" name="lop">
                        <?php foreach ($room as $key): ?>
                            <option value="<?php echo $key['MaLop']?>"><?php echo $key['TenLop'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="create">Thêm mới</button>
                <a href="./index.php?page=Student" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>