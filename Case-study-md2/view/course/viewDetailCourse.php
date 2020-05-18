<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Chi Tiết Thông Tin Về Khóa Học</h1>
        </div>

        <div class="col-8" style="margin-left: 15%">

            <form method="post">
                <table class="table table-striped">

                    <tbody>
                    <tr>
                        <th scope="row">Mã Khóa Học</th>
                        <td><?php echo $detailCourse['MaKH'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tên Khóa Học</th>
                        <td><?php echo $detailCourse['TenKH'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Mô Tả Chi Tiết</th>
                        <td><?php echo $detailCourse['MoTa'] ?></td>
                    </tr>

                    </tbody>
                </table>
                <a href="./index.php?page=course" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>