<div class="card">
    <div class="card-header">
        <h3>Danh Sách Lớp Học</h3>
    </div>
    <br>

    <div class="card-body">
        <div class="col-md-8" style="margin-left: 15%">
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-success"
                        onclick="window.location.href='./index.php?page=create'">
                    Thêm Mới
                </button>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Lớp</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($class as $key => $values): ?>
                    <tr>
                        <th scope="row"><?php echo ++$key ?></th>
                        <td><?php echo $values['TenLop'] ?></td>
                        <td><a href="index.php?page=edit&MaLop=<?php echo $values['MaLop'] ?>"
                               class="btn btn-warning btn-sm">Update</a></td>
                        <td><a class="btn btn-warning btn-sm"
                               href="index.php?page=delete&MaLop=<?php echo $values['MaLop'] ?>">Delete</a></td>
                        <td><a class="btn btn-warning btn-sm"
                               href="index.php?page=studentClass&MaLop=<?php echo $values['MaLop'] ?>">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>