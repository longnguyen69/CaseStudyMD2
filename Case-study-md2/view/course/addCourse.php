
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm Khóa Học Mới</h1>
        </div>

        <div class="col-8" style="margin-left: 15%">
            <?php
            if (isset($result)){
                echo "<p class='alert-info'>$result</p>";
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label>Mã Khóa Học</label>
                    <input type="text" class="form-control" name="maKH"  placeholder="Nhập mã khóa học" required>
                </div>
                <div class="form-group">
                    <label>Tên Khóa Học</label>
                    <input type="text" class="form-control" name="tenKH" placeholder="Nhập tên khóa học" required>
                </div>
                <div class="form-group">
                    <label>Mô Tả</label>
                    <textarea class="form-control" rows="15" placeholder="Viết mô tả" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create">Thêm mới</button>
            </form>
        </div>
    </div>