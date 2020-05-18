<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Tạo Tài Khoản Mới</h1>
        </div>
        <div class="col-8" style="margin-left: 15%">
            <?php
            if (isset($message)){
                echo "<p class='alert-info'>$message</p>";
            }
            if (isset($errorCreateUser)){
                echo "<p style='color: red;'>$errorCreateUser</p>";
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label>Tên Đăng Nhập</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label>Mật Khẩu</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="create">Thêm mới</button>
                <a href="./index.php" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>
</div>