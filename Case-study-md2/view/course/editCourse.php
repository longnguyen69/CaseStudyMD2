
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Chỉnh Sửa Thông Tin Về Khóa Học</h1>
        </div>

        <div class="col-8" style="margin-left: 15%">

            <form method="post">
                <div class="form-group">
                    <label>Mã Khóa Học</label>
                    <input type="text" class="form-control" name="maKH" value="<?php echo $course['MaKH']?>"  readonly>
                </div>
                <div class="form-group">
                    <label>Tên Khóa Học</label>
                    <input type="text" class="form-control" name="tenKH" value="<?php echo $course['TenKH']?>">
                </div>
                <div class="form-group">
                    <label>Mô Tả</label>
                    <textarea class="form-control" rows="15" name="text"><?php echo $course['MoTa']?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create">Thêm mới</button>
                <a href="./index.php?page=Student" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>