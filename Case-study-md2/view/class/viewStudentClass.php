<div class="card">
    <?php if (isset($_SESSION['addST'])): ?>
        <script>alert("Add complete")</script>
    <?php endif; ?>
    <div class="card-header">
        Các Học Sinh Trong Lớp
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
                <th scope="col">Ảnh Đại Diện</th>
                <th scope="col">Mã SV</th>
                <th scope="col">Họ Và Tên</th>
                <th scope="col">Lớp</th>
                <th scope="col">Giới Tính</th>
                <th scope="col">Khóa Học</th>
                <th scope="col">Hệ Đào Tạo</th>
                <th scope="col">Điểm 1</th>
                <th scope="col">Điểm 2</th>
                <th scope="col">Điểm 3</th>
                <?php if (isset($_SESSION['user'])): ?>
                    <th scope="col">Action</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $key => $values): ?>
                <tr>
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><img src="uploads/<?php echo $values['avatar']?>" style="width: 50px; height: 60px; border-radius: 50%;" alt="Avatar"></td>
                    <td><?php echo $values['MaSV'] ?></td>
                    <td><?php echo $values['TenSV'] ?></td>
                    <td><?php echo $values['TenLop'] ?></td>
                    <?php if ($values['GioiTinh'] == 1): ?>
                        <td><?php echo 'Nam' ?></td>
                    <?php else: ?>
                        <td><?php echo 'Nữ' ?></td>
                    <?php endif; ?>
                    <td><?php echo $values['TenKH'] ?></td>
                    <td><?php echo $values['TenHe'] ?></td>
                    <td><?php echo $values['Module1'] ?></td>
                    <td><?php echo $values['Module2'] ?></td>
                    <td><?php echo $values['Module3'] ?></td>
                    <?php if (isset($_SESSION['user'])): ?>
                        <td><a class="btn btn-warning btn-sm"
                               href="index.php?page=edit&page=editSV&MaSV=<?php echo $values['MaSV'] ?>">Update</a>
                            <a class="btn btn-primary btn-sm"
                               href="index.php?page=detail&MaSV=<?php echo $values['MaSV'] ?>">Detail</a>
                            <a class="btn btn-success btn-sm"
                               href="index.php?page=AddScore&MaSV=<?php echo $values['MaSV'] ?>">Add Score</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                               href="index.php?page=deleteSVClass&MaSV=<?php echo $values['MaSV'] ?>">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>