<div class="card">
    <?php if (isset($_SESSION['addST'])):?>
    <script>alert("Add complete")</script>
    <?php endif;?>
    <div class="card-header">
        Các Lớp Học Trong Lớp
    </div>
    <br>
    <div class="col-md-2"><button type="submit" class="btn btn-outline-success" onclick="window.location.href='./index.php?page=create'">Thêm Mới</button></div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã SV</th>
                <th scope="col">Họ Và Tên</th>
                <th scope="col">Lớp</th>
                <th scope="col">Giới Tính</th>
                <th scope="col">Khóa Học</th>
                <th scope="col">Hệ Đào Tạo</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $key => $values): ?>
                <tr>
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><?php echo $values['MaSV'] ?></td>
                    <td><?php echo $values['TenSV'] ?></td>
                    <td><?php echo $values['TenLop'] ?></td>
                    <td><?php echo $values['GioiTinh'] ?></td>
                    <td><?php echo $values['TenKH'] ?></td>
                    <td><?php echo $values['TenHe'] ?></td>
                    <td><a href="index.php?page=edit&MaLop=<?php echo $values['MaLop']?>" class="btn btn-warning btn-sm">Update</a></td>
                    <td><a class="btn btn-warning btn-sm" href="index.php?page=delete&MaLop=<?php echo $values['MaLop']?>">Delete</a></td>
                    <td><a class="btn btn-warning btn-sm" href="index.php?page=studentClass&MaLop=<?php echo $values['MaLop']?>">Detail</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>