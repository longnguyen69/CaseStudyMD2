<div class="card">
    <div class="card-header">
        Danh Học Sinh Toàn Trường
    </div>
    <br>
    <div class="row">
        <div class="col-md-2" style="margin-left: 50px">
            <?php if (isset($_SESSION['user'])): ?>
                <button type="submit" class="btn btn-outline-success"
                        onclick="window.location.href='./index.php?page=createStudent'">Thêm Mới
                </button>
            <?php endif; ?>
        </div>
        <br>
        <div class="col-md-4" style="margin-left: 400px;">
            <form class="form-inline mr-auto" method="get">
                <input class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search" name="keyword">
                <input class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search" name="page" value="search" hidden>
                <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh Đại Diện</th>
                <th scope="col">Mã Học Sinh</th>
                <th scope="col">Tên Học Viên</th>
                <th scope="col">Giới Tính</th>
                <th scope="col">Ngày Sinh</th>
                <th scope="col">Quê Quán</th>
                <th scope="col">Lớp Học</th>
                <?php if (isset($_SESSION['user'])): ?>
                    <th scope='col'>Action</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $key => $values): ?>
                <tr>
                    <th scope="row"><?php
                        echo ++$key ?></th>
                    <td scope="row"><img src="uploads/<?php echo $values->getImage() ?>" alt="Avatar"
                                         style="height: 60px; width: 50px;border-radius: 50%;"></td>
                    <td><?php echo $values->getMaSV() ?></td>
                    <td><?php echo $values->getTenSV() ?></td>
                    <?php if ($values->getGioiTinh() == 1): ?>
                        <td><?php echo 'Nam' ?></td>
                    <?php else: ?>
                        <td><?php echo 'Nữ' ?></td>
                    <?php endif; ?>
                    <td><?php echo $values->getNgaySinh() ?></td>
                    <td><?php echo $values->getQueQuan() ?></td>
                    <td><?php echo $values->getLop() ?></td>
                    <?php if (isset($_SESSION['user'])): ?>
                        <td>
                            <a class="btn btn-warning btn-sm"
                               href="index.php?page=editSV&MaSV=<?php echo $values->getMaSV() ?>">Update</a>
                            <a class="btn btn-primary btn-sm"
                               href="index.php?page=detail&MaSV=<?php echo $values->getMaSV() ?>">Detail</a>
                            <a class="btn btn-success btn-sm"
                               href="index.php?page=AddScore&MaSV=<?php echo $values->getMaSV() ?>">Add Score</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                               href="index.php?page=deleteSV&MaSV=<?php echo $values->getMaSV() ?>">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>