<div class="card">
    <div class="card-header">
        Các Khóa Học Trong Trung Tâm
    </div>
    <br>
    <div class="col-md-2">
        <button type="submit" class="btn btn-outline-success"
                onclick="window.location.href='./index.php?page=addCourse'">Thêm Mới
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã KH</th>
                <th scope="col">Tên Khóa Họ</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($viewCourse as $key => $values): ?>
                <tr>
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><?php echo $values['MaKH'] ?></td>
                    <td><?php echo $values['TenKH'] ?></td>

                    <td><a class="btn btn-warning btn-sm"
                           href="index.php?page=editCourse&MaKH=<?php echo $values['MaKH'] ?>">Update</a></td>
                    <td><a class="btn btn-primary btn-sm"
                           href="index.php?page=detailCourse&MaKH=<?php echo $values['MaKH'] ?>">Detail</a></td>
                    <td><a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn xóa?')"
                           href="index.php?page=deleteCourse&MaKH=<?php echo $values['MaKH'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>