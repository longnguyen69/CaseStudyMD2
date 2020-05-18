<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-3">
            <div class="container">
                <div class="col-12">
                    <h1>Thêm Sinh Viên Mới</h1>
                    <p>Chào mừng bạn <span style="color: red; font-size: 30px;"><?php echo  $_SESSION['user']; ?></span> !</p>
                    <p style="color: blue">Để thêm mới được sinh viên mời bạn nhập theo quy tắc sau:</p>
                    <p style="color: blue">- Mã sinh viên bao gồm 6 chữ số, các chữ trong mã sinh viên phải viết hoa.</p>
                    <p style="color: blue">- Tên sinh viên không được để trống và nhập đầy đủ các trường thông tin trước khi thêm mới.</p>
                </div>
            </div>
        </div>



        <div class="col-8">
            <?php
            if (isset($message)){
                echo "<p class='alert-info'>$message</p>";
            }
            if (isset($error)){
                echo "<p  style='color: red'>$error</p>";
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Mã Sinh Viên</label>
                    <input type="text" class="form-control" name="maSV"  placeholder="Nhập mã sinh viên" required>
                    <?php if (isset($msgID)){ echo "<p style='color: #fcf8f7;'>$msgID</p>"; }?>
                </div>
                <div class="form-group">
                    <label>Tên Sinh Viên</label>
                    <input type="text" class="form-control" name="tenSV" placeholder="Nhập tên sinh viên" required>
                    <?php if (isset($msgName)){ echo "<p style='color: #fcf8f7;'>$msgName</p>"; }?>
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
                    <?php if (isset($msgBirth)){ echo "<p style='color: #fcf8f7;'>$msgBirth</p>"; }?>
                </div>
                <div class="form-group">
                    <label>Quê Quán/Địa Chỉ</label>
                    <input type="text" class="form-control" name="queQuan">
                    <?php if (isset($msgCountry)){ echo "<p style='color: #fcf8f7;'>$msgCountry</p>"; }?>
                </div>
                <div class="form-group">
                    <label>Lớp</label>
                    <select class="custom-select" name="lop">
                        <?php foreach ($room as $key): ?>
                            <option value="<?php echo $key['MaLop']?>"><?php echo $key['TenLop'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh Đại Diện</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary" name="create">Thêm mới</button>
                <a href="./index.php?page=Student" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>