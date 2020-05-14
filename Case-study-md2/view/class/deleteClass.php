<h1>Bạn chắc chắn muốn xóa lớp này?</h1>
<h3><?php echo $room->tenLop; ?></h3>
<form action="./index.php?page=delete" method="post">
    <input type="hidden" name="maLop" value="<?php echo $room->maLop ?>"/>
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger"/>
        <a class="btn btn-default" href="./index.php?page=lop">Cancel</a>
    </div>
</form>