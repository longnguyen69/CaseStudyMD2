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
    <div class="col-12 col-md-6">
        <form class="form-inline my-2 my-lg-0" method="get">
            <input class="form-control mr-sm-2" name="keyword" type="text" placeholder="Search"
                   aria-label="Search"
                   value="<?php echo isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '' ?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
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
                    <td><?php echo $values['GioiTinh'] ?></td>
                    <td><?php echo $values['NgaySinh'] ?></td>
                    <td><?php echo $values['QueQuan'] ?></td>
                    <td><?php echo $values['TenLop'] ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm"
                           href="index.php?page=editSV&MaSV=<?php echo $values['MaSV'] ?>">Update Info</a>
                        <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure delete?')"
                           href="index.php?page=deleteSV&MaSV=<?php echo $values['MaSV'] ?>">Delete</a>
                        <a class="btn btn-warning btn-sm"
                           href="index.php?page=detail&MaSV=<?php echo $values['MaSV'] ?>">Detail</a>
                        <a class="btn btn-warning btn-sm"
                           href="index.php?page=AddScore&MaSV=<?php echo $values['MaSV'] ?>">Add Score</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>