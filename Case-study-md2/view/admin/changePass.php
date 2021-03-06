<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Đổi Mật Khẩu</h1>
        </div>
        <div class="col-8" style="margin-left: 15%">
            <?php if (isset($message)): ?>
                <script>alert('Đổi mật khẩu thành công!');
                    window.location = "index.php?page=logout";</script>
            <?php endif; ?>
            <form method="post" action="./index.php?page=changePass">
                <div class="form-group">
                    <label>Xác nhận mật khẩu cũ:</label>
                    <input type="password" class="form-control" name="oldPass" required>
                    <?php if (isset($error)): ?>
                        <span style="color: red"><?php echo $error ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Mật khẩu mới:</label>
                    <input type="password" class="form-control" name="newPass" required>
                    <?php if (isset($error2)): ?>
                        <span style="color: red"><?php echo $error2 ?></span>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary" name="updatePass">Cập nhập</button>
            </form>
        </div>
    </div>
</div>