<div class="card">
    <div class="card-header">
        <h3>Thông Tin Học Viên</h3>
    </div>
    <br>
    <div class="card-body col-10">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <img src="uploads/<?php echo $arr['avatar'] ?>" style="height: 550px; width: 360px;">
                </div>
                <div class="col-md-6">
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
                            <th scope="col">Xếp Loại</th>
                            <td>
                                <?php if (isset($error))
                                    echo "<p style='color: red'>$error</p>";
                                ?>
                                <?php if (isset($message))
                                    echo "<p style='color: blue'>$message</p>";
                                ?>
                            </td>
                        </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="./index.php?page=Student" class="btn btn-dark">Cancel</a>
    </div>
</div>