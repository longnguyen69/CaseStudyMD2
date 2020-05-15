<div class="card">
    <div class="card-header">
        <h3>Thông Tin Học Viên</h3>
    </div>
    <br>
    <div class="card-body col-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Mã Học Sinh</th>
                <td><?php echo $arr['MaSV']; ?></td>
            </tr>
            <tr>
                <th scope="col">Tên Học Viên</th>
                <td><?php echo $arr['TenSV'] ?></td>
            </tr>
            <tr>
                <th scope="col">Giới Tính</th>
                <?php if ($arr['GioiTinh'] == 1): ?>
                    <td><?php echo 'Nam' ?></td>
                <?php else: ?>
                    <td><?php echo "Nữ" ?></td>
                <?php endif; ?>


            </tr>
            <tr>
                <th scope="col">Ngày Sinh</th>
                <td><?php echo $arr['NgaySinh'] ?></td>
            </tr>
            <tr>
                <th scope="col">Quê Quán</th>
                <td><?php echo $arr['QueQuan'] ?></td>
            </tr>
            <tr>
                <th scope="col">Lớp Học</th>
                <td><?php echo $arr['TenLop'] ?></td>
            </tr>
            <tr>
                <th scope="col">Khóa Học</th>
                <td><?php echo $arr['TenKH']; ?></td>
            </tr>
            <tr>
                <th scope="col">Điểm Module 1</th>
                <td><?php echo $arr['Module1']; ?></td>
            </tr>
            <tr>
                <th scope="col">Điểm Module 2</th>
                <td><?php echo $arr['Module2']; ?></td>
            </tr>
            <tr>
                <th scope="col">Điểm Module 3</th>
                <td><?php echo $arr['Module3']; ?></td>
            </tr>
            <tr>
                <th scope="col">Điểm Trung Bình</th>
                <td>
                    <?php

                    ?>
                </td>
            </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
        <a href="./index.php?page=Student" class="btn btn-dark">Cancel</a>
    </div>
</div>

