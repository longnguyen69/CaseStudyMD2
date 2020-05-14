<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm Điểm Cho Sinh Viên</h1>
        </div>

        <div class="col-8" style="margin-left: 15%">
            <form method="post">
                <div class="form-group">
                    <label>Mã Sinh Viên</label>
                    <input type="text" class="form-control" name="maSV" value="<?php echo $student['MaSV'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tên Sinh Viên</label>
                    <input type="text" class="form-control" name="tenSV" value="<?php echo $student['TenSV'] ?>"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Module 1</label>
                    <input type="text" class="form-control" name="module1"
                           value="<?php echo $selectScore['Module1'] ?>" <?php if ($selectScore['Module1'] != null) {
                        echo 'readonly';
                    } ?> >
                </div>
                <div class="form-group">
                    <label>Module 2</label>
                    <input type="text" class="form-control" name="module2"
                           value="<?php echo $selectScore['Module2'] ?>" <?php if ($selectScore['Module2'] != null) {
                        echo 'readonly';
                    } ?>>
                </div>
                <div class="form-group">
                    <label>Module 3</label>
                    <input type="text" class="form-control" name="module3"
                           value="<?php echo $selectScore['Module3'] ?>" <?php if ($selectScore['Module3'] != null) {
                        echo 'readonly';
                    } ?>>
                </div>
                <button type="submit" class="btn btn-primary" name="create" >Thêm mới</button>

            </form>
        </div>
    </div>
</div>