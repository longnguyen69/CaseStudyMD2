<div class="card">
    <div class="card-header">
        Danh Học Sinh Toàn Trường
    </div>
    <br>
    <div class="col-md-2">
        <button type="submit" class="btn btn-outline-success"
                onclick="window.location.href='./index.php?page=createStudent'">Thêm Mới
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã Học Sinh</th>
                <th scope="col">Tên Học Viên</th>
                <th scope="col">Giới Tính</th>
                <th scope="col">Ngày Sinh</th>
                <th scope="col">Quê Quán</th>
                <th scope="col">Lớp Học</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $key => $values): ?>
                <tr>
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><?php echo $values['MaSV'] ?></td>
                    <td><?php echo $values['TenSV'] ?></td>
                    <?php if ($values['GioiTinh'] == 1): ?>
                        <td><?php echo 'Nam' ?></td>
                    <?php else: ?>
                        <td><?php echo 'Nữ' ?></td>
                    <?php endif; ?>
                    <td><?php echo $values['NgaySinh'] ?></td>
                    <td><?php echo $values['QueQuan'] ?></td>
                    <td><?php echo $values['TenLop'] ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm"
                           href="index.php?page=editSV&MaSV=<?php echo $values['MaSV'] ?>">Update</a>
                        <a class="btn btn-primary btn-sm"
                           href="index.php?page=detail&MaSV=<?php echo $values['MaSV'] ?>">Detail</a>
                        <a class="btn btn-success btn-sm"
                           href="index.php?page=AddScore&MaSV=<?php echo $values['MaSV'] ?>">Add Score</a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                           href="index.php?page=deleteSV&MaSV=<?php echo $values['MaSV'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>