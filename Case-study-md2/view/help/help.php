<div class="card">
    <h5 class="card-header">Gửi Câu Hỏi Của Bạn</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <p>Bạn nhập thắc mắc của bạn vào ô nhập và bấm gửi</p>
                <p style="color: blue;">- Chúng tối sẽ liên hệ với bạn sớm nhất có thể</p>
                <p style="color: blue;">- Cảm ơn bạn đã sử dụng dịch vụ</p>
            </div>
            <div class="col-md-8">
                <div class="col-md-6" >
                    <?php if (isset($message)){
                        echo "<p style='color: red;'>$message</p>";
                    } ?>
                    <form method="post">
                        <div class="form-group">
                            <label>Nhập Số Điện Thoại Của Bạn</label>
                            <input type="text" class="form-control" name="phone" placeholder="VD: 0987552685">
                        </div>
                        <div class="form-group">
                            <label>Nhập Câu Hỏi</label>
                            <textarea class="form-control" name="question" placeholder="Nhập thắc mắc của bạn vào đây" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" value="send">Gửi</button>
                        <a href="./index.php" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>