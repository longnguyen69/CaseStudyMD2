
<div class="card">
    <div class="card-header">
        <h3>Thông Tin Học Viên</h3>
    </div>
    <br>

    <div class="col-12 col-md-6">
        <form class="form-inline my-2 my-lg-0" method="get">
            <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search"
                   aria-label="Search"
                   value="<?php echo isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '' ?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="card-body col-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Mã Học Sinh</th>
                <td><?php echo $arr['MaSV']; ?></td>
            </tr>
            <tr>
                <th scope="col">Tên Học Viên</th>
                <td><?php echo $arr['TenSV']?></td>
            </tr>
            <tr>
                <th scope="col">Giới Tính</th>
                <td><?php echo $arr['GioiTinh']?></td>
            </tr>
            <tr>
                <th scope="col">Ngày Sinh</th>
                <td><?php echo $arr['NgaySinh']?></td>
            </tr>
            <tr>
                <th scope="col">Quê Quán</th>
                <td><?php echo $arr['QueQuan']?></td>
            </tr>
            <tr>
                <th scope="col">Lớp Học</th>
                <td><?php echo $arr['TenLop']?></td>
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
            </thead>
            <tbody>
<!--            --><?php //foreach ($students as $key => $values): ?>
<!--                <tr>-->
<!--                    <th scope="row">--><?php //echo ++$key ?><!--</th>-->
<!--                    <td>--><?php //echo $values['MaSV'] ?><!--</td>-->
<!--                    <td>--><?php //echo $values['TenSV'] ?><!--</td>-->
<!--                    <td>--><?php //echo $values['GioiTinh'] ?><!--</td>-->
<!--                    <td>--><?php //echo $values['NgaySinh'] ?><!--</td>-->
<!--                    <td>--><?php //echo $values['QueQuan'] ?><!--</td>-->
<!--                    <td>--><?php //echo $values['TenLop'] ?><!--</td>-->
<!--                    <td>-->
<!--                        <a class="btn btn-warning btn-sm" href="index.php?page=editSV&MaSV=--><?php //echo $values['MaSV']?><!--">Update Info</a>-->
<!--                        <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure?')" href="index.php?page=deleteSV&MaSV=--><?php //echo $values['MaLop']?><!--">Delete</a>-->
<!--                        <a class="btn btn-warning btn-sm" href="index.php?page=detail&MaSV=--><?php //echo $values['MaSV']?><!--">Detail</a>-->
<!--                        <a class="btn btn-warning btn-sm" href="index.php?page=detail&UpScore=--><?php //echo $values['MaSV']?><!--">Update Score</a>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            --><?php //endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

